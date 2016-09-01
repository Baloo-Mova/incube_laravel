<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\EconomicActivities;
use App\Models\Investor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\User;
use Illuminate\Support\Facades\Mail;

class InvestorController extends Controller
{

    public function __construct()
    {
        $this->middleware('owner:investor', ['only' => ['edit', 'update']]);
    }

    public function index()
    {
        $investProjects = Investor::orderBy('id', 'desc')->take(10)->get();

        return view('frontend.investor.index')->with([
            'investProjects' => $investProjects,
        ]);
    }

    public function create()
    {
        $economicActivities = EconomicActivities::pluck('name', 'id');

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
            'unique' =>"Ви вже зареєстровані. Спершу ви маєте авторизуватися за допомогою свого логіна і пароля;",
        ]);

        $model = new Investor();
        $model->fill($request->all());
        if ($request->file('logo_img_file')) {
            $filename    = uniqid() . '.' . $request->file('logo_img_file')->getClientOriginalExtension();
            $image       = Image::make($request->file('logo_img_file'))->resize(250,
                300)->save(storage_path('app/investor/images/' . $filename));
            $model->logo = $filename;
        }

        $email = $request->get('email');
        $pass  = str_random(10);

        if(isset($email) && !empty($email)) {
            $user = User::firstOrNew([
                'email' => $email,
            ]);

            $user->password = bcrypt($pass);
            $user->save();

            Mail::send('auth.emails.register', ['email' => $email, 'password'=>$pass], function ($m) use ($user) {
                $m->from('incube.zp.ua@gmail.com', 'Incube');
                $m->to($user->email)->subject('Приветствуем');
            });
        }

        $model->author_id = Auth::check() ? Auth::user()->id : $user->id;
        $model->save();

        if (!Auth::check() && Auth::attempt(['email' => $email, 'password' => $pass])) {
            return redirect(route('personal_area.index'));
        }

        return redirect(route('investor.index'));
    }

    public function edit(Investor $investor)
    {
        $economicActivities = EconomicActivities::pluck('name', 'id');
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
        // Нужно удалять файл
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
        return view('frontend.investor.show', compact('investor'));
    }
}
