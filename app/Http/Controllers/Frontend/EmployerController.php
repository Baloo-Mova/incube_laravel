<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\EconomicActivities;
use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\User;
use Illuminate\Support\Facades\Mail;

class EmployerController extends Controller
{

    public function __construct()
    {
        $this->middleware('owner:employer', ['only' => ['edit', 'update']]);
    }

    public function index()
    {
        $employerProjects = Employer::orderBy('id', 'desc')->take(10)->get();

        return view('frontend.employer.index')->with([
            'employerProjects' => $employerProjects,
        ]);
    }

    public function create()
    {
        $economicActivities = EconomicActivities::pluck('name', 'id');

        return view('frontend.employer.create', compact('economicActivities'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            //'short_name'   => 'required',
            'org_name'     => 'required',
            'phone'        => 'required',
            'email'        => 'required',
            'web_site'     => 'required',
            'org_info'     => 'required',
            'org_type'     => 'required',
            'description'  => 'required',
            'adress'       => 'required',
            
            'reg_email'             => Auth::check() ? '' : 'required|email|unique:users',
        ], [
            //'short_name.required'       => "Поле Коротка Назва організації обов'язкове для заповнення;",
            'org_name.required'         => "Поле Назва організації обов'язкове для заповнення;",
            'phone.required'            => "Поле Телефон обов'язкове для заповнення;",
            'email.required'            => "Поле Контактна пошта обов'язкове для заповнення;",
            'web_site.required'         => "Поле Веб-сайт обов'язкове для заповнення;",
            'org_info.required'         => "Поле Коротка характеристика діяльності організації обов'язкове для заповнення;",
            'org_type.required'         => "Поле Тип організації обов'язкове для заповнення;",
            'description.required'      => "Поле Загальна інформація (звернення компанії) обов'язкове для заповнення;",
            'adress.required'           => "Поле Адресса  обов'язкове для заповнення;",
            
            'reg_email'                 => "Гості мають обовязково вказати свою пошту для рєстрації;",
            'unique' => "Ви вже зареєстровані. Спершу ви маєте авторизуватися за допомогою свого логіна і пароля;",
        ]);

        $model = new Employer();
        $model->fill($request->all());
        if ($request->file('logo_img_file')) {
            $filename    = uniqid() . '.' . $request->file('logo_img_file')->getClientOriginalExtension();
            $image       = Image::make($request->file('logo_img_file'))->resize(250,
                300)->save(storage_path('app/employer/images/' . $filename));
            $model->logo = $filename;
        }

        $reg_email = $request->get('reg_email');
        $pass  = str_random(10);

        if(isset($reg_email) && !empty($reg_email)) {
            $user = User::firstOrNew([
                'email' => $reg_email,
            ]);

            $user->password = bcrypt($pass);
            $user->save();

            Mail::send('auth.emails.register', ['email' => $reg_email, 'password'=>$pass], function ($m) use ($user) {
                $m->from('incube.zp.ua@gmail.com', 'Incube');
                $m->to($user->email)->subject('Приветствуем');
            });
        }

        $model->author_id = Auth::check() ? Auth::user()->id : $user->id;
        $model->save();

        if (!Auth::check() && Auth::attempt(['email' => $reg_email, 'password' => $pass])) {
            return redirect(route('personal_area.index'));
        }

        return redirect(route('employer.index'));
    }

    public function edit(Employer $employer)
    {
        $economicActivities = EconomicActivities::pluck('name', 'id');
        return view('frontend.employer.edit', compact('employer', 'economicActivities'));
    }

    public function update(Request $request, Employer $employer)
    {
        $this->validate($request, [
            //'short_name'   => 'required',
            'org_name'     => 'required',
            'phone'        => 'required',
            'email'        => 'required',
            'web_site'     => 'required',
            'org_info'     => 'required',
            'org_type'     => 'required',
            'description'  => 'required',
            'adress'       => 'required',
        ], [
            //'short_name.required'       => "Поле Коротка Назва організації обов'язкове для заповнення;",
            'org_name.required'         => "Поле Назва організації обов'язкове для заповнення;",
            'phone.required'            => "Поле Телефон обов'язкове для заповнення;",
            'email.required'            => "Поле Контактна пошта обов'язкове для заповнення;",
            'web_site.required'         => "Поле Веб-сайт обов'язкове для заповнення;",
            'org_info.required'         => "Поле Коротка характеристика діяльності організації обов'язкове для заповнення;",
            'org_type.required'         => "Поле Тип організації обов'язкове для заповнення;",
            'description.required'      => "Поле Загальна інформація (звернення компанії) обов'язкове для заповнення;",
            'adress.required'           => "Поле Адресса  обов'язкове для заповнення;",
            
        ]);

        $employer->fill($request->all());
        // Нужно удалять файл
        if ($request->file('logo_img_file')) {
            $filename       = uniqid() . '.' . $request->file('logo_img_file')->getClientOriginalExtension();
            $image          = Image::make($request->file('logo_img_file'))->resize(250,
                300)->save(storage_path('app/employer/images/' . $filename));
            $employer->logo = $filename;
        }
        $employer->save();

        return back()->with(['message' => 'Редагування завершено']);
    }

    public function show(Employer $employer)
    {
        return view('frontend.employer.show', compact('employer'));
    }
}
