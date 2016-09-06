<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Designer;
use App\Models\EconomicActivities;
use App\Models\Investor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\User;
use Illuminate\Support\Facades\Mail;

class InvestorController extends Controller
{

    public function __construct()
    {
        $this->middleware('owner:investor', ['only' => ['edit', 'update', 'delete']]);
        $this->middleware('published:investor', ['only' => ['edit', 'update', 'delete']]);
    }

    public function index()
    {
        $investProjects = Investor::orderBy('id', 'desc')->where(['status_id'=>2])->take(10)->get();

        $problems       = Customer::where([
            'status_id' => 2,
        ])->orderBy('id', 'desc')->take(10)->get();
        $projects       = Designer::where([
            'status_id' => 2,
        ])->orderBy('id', 'desc')->take(10)->get();

        return view('frontend.investor.index')->with([
            'investProjects' => $investProjects,
            'problems'       => $problems,
            'projects'       => $projects,
        ]);
    }

    public function create()
    {
        $economicActivities = EconomicActivities::where(['parent_id' => null])->get();

        return view('frontend.investor.create', compact('economicActivities'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'investor_name'     => 'required',
            'investor_contacts' => 'required',
            'investor_cost'     => 'numeric',
            'email'             => Auth::check() ? '' : 'required|email|unique:users',
        ], [
            'investor_name.required'     => "Поле Назва інвестування  обов'язкове для заповнення;",
            'investor_contacts.required' => "Поле Контактні дані  обов'язкове для заповнення;",
            "investor_cost.numeric"      => "Поле суми інвестицій повинно бути числов та обов'язково вказано;",
            "email"                      => "Гості мають обовязково вказати свою пошту для рєстрації;",
            'unique'                     => "Ви вже зареєстровані. Спершу ви маєте авторизуватися за допомогою свого логіна і пароля;",
        ]);

        $model = new Investor();
        $model->fill($request->all());

        if (!File::exists(storage_path('app/investor/images'))) {
            File::makeDirectory(storage_path('app/investor/images'), 0755, true);
        }

        if ($request->file('logo_img_file')) {
            $filename    = uniqid() . '.' . $request->file('logo_img_file')->getClientOriginalExtension();
            $image       = Image::make($request->file('logo_img_file'))->resize(250,
                300)->save(storage_path('app/investor/images/' . $filename));
            $model->logo = $filename;
        }

        $email = $request->get('email');
        $pass  = str_random(10);

        if (isset($email) && ! empty($email)) {
            $user = User::firstOrNew([
                'email' => $email,
            ]);

            $user->password = bcrypt($pass);
            $user->save();

            Mail::send('auth.emails.register', ['email' => $email, 'password' => $pass], function ($m) use ($user) {
                $m->from('incube.zp.ua@gmail.com', 'Incube');
                $m->to($user->email)->subject('Приветствуем');
            });
        }

        $model->author_id = Auth::check() ? Auth::user()->id : $user->id;
        $model->save();

        if ( ! Auth::check() && Auth::attempt(['email' => $email, 'password' => $pass])) {
            return redirect(route('personal_area.index'));
        }

        return redirect(route('investor.index'));
    }

    public function edit(Investor $investor)
    {
        $economicActivities = EconomicActivities::where(['parent_id' => null])->get();
        return view('frontend.investor.edit', compact('investor', 'economicActivities'));
    }

    public function update(Request $request, Investor $investor)
    {
        $this->validate($request, [
            'investor_name'     => 'required',
            'investor_contacts' => 'required',
            'investor_cost'     => 'numeric',
        ], [
            'investor_name.required'     => "Поле Назва інвестування  обов'язкове для заповнення;",
            'investor_contacts.required' => "Поле Контактні дані  обов'язкове для заповнення;",
            "investor_cost.numeric"      => "Поле суми інвестицій повинно бути числов та обов'язково вказано;",
        ]);

        $investor->fill($request->all());
        if ($request->file('logo_img_file')) {
            $filename       = uniqid() . '.' . $request->file('logo_img_file')->getClientOriginalExtension();
            $image          = Image::make($request->file('logo_img_file'))->resize(250,
                300)->save(storage_path('app/investor/images/' . $filename));
            $investor->logo = $filename;
        }

        $investor->save();

        return back()->with(['message' => 'Edit successful']);
    }

    public function show(Investor $investor)
    {
        if(Auth::check()){
            $id = Auth::user()->id;
        }else{
            $id = 0;
        }


        $avaibleProjects = Designer::where(['author_id'=>$id, 'status'=>1])->get();

        return view('frontend.investor.show', compact('investor','avaibleProjects'));
    }

    public function delete(Investor $investor)
    {
        $investor->delete();

        return redirect(route('investor.index'));
    }
}
