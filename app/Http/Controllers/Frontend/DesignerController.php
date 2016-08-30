<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\EconomicActivities;
use App\Models\Designer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\User;
use Illuminate\Support\Facades\Mail;

class DesignerController extends Controller
{

    public function __construct()
    {
        $this->middleware('owner:designer', ['only' => ['edit', 'update']]);
    }

    public function index()
    {
        $designerProjects = Designer::orderBy('id', 'desc')->take(10)->get();

        return view('frontend.designer.index')->with([
            'designerProjects' => $designerProjects,
        ]);
    }

    public function create()
    {
        $economicActivities = EconomicActivities::pluck('name', 'id');

        return view('frontend.designer.create', compact('economicActivities'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'project_manager'      => 'required',
            'project_contacts'     => 'required',
            'phone'                => 'required',
            'email'                => 'required',
            'web_site'             => 'required',
            'project_name'         => 'required',
            'project_goal'         => 'required',
            'project_aspects'      => 'required',
            'project_beneficaries' => 'required',
            'description'          => 'required',
            'project_cost'         => 'required',
            'project_duration'     => 'required',
            'region'               => 'required',
            'project_stage'        => 'required',
            'available_funding'    => 'required',
            'reg_email'             => Auth::check() ? '' : 'required|email|unique:users',
        ], [
            'project_manager.required'      => "Поле Керівник проекту обов'язкове для заповнення;",
            'project_contacts.required'     => "Поле Контактні дані обов'язкове для заповнення;",
            'phone.required'                => "Поле Телефон обов'язкове для заповнення;",
            'email.required'                => "Поле Контактна пошта обов'язкове для заповнення;",
            'web_site.required'             => "Поле Веб-сайт обов'язкове для заповнення;",
            'project_name.required'         => "Поле Назва проекту обов'язкове для заповнення;",
            'project_goal.required'         => "Поле Мета проекту обов'язкове для заповнення;",
            'project_aspects.required'      => "Поле Іноваційні аспекти та переваги проекту обов'язкове для заповнення;",
            'project_beneficaries.required' => "Поле Отримувачі вигоди обов'язкове для заповнення;",
            'description.required'          => "Поле Стислий опис проекту обов'язкове для заповнення;",
            'project_cost.required'         => "Поле Вартість проекту обов'язкове для заповнення;",
            'project_duration.required'     => "Поле Період реалізації проекту обов'язкове для заповнення;",
            'region.required'               => "Поле Географія проекту обов'язкове для заповнення;",
            'project_stage.required'        => "Поле Стадія проекту обов'язкове для заповнення;",
            'available_funding.required'    => "Поле Джерела фінансування обов'язкове для заповнення;",
            'reg_email'                      => "Гості мають обовязково вказати свою пошту для рєстрації;",
            'unique' => "Ви вже зареєстровані. Спершу ви маєте авторизуватися за допомогою свого логіна і пароля;",
        ]);

        $model = new Designer();
        $model->fill($request->all());
        if ($request->file('logo_img_file')) {
            $filename    = uniqid() . '.' . $request->file('logo_img_file')->getClientOriginalExtension();
            $image       = Image::make($request->file('logo_img_file'))->resize(250,
                300)->save(storage_path('app/designer/images/' . $filename));
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

        return redirect(route('designer.index'));
    }

    public function edit(Designer $designer)
    {
        $economicActivities = EconomicActivities::pluck('name', 'id');
        return view('frontend.designer.edit', compact('designer', 'economicActivities'));
    }

    public function update(Request $request, Designer $designer)
    {
        $this->validate($request, [
            'project_manager'      => 'required',
            'project_contacts'     => 'required',
            'phone'                => 'required',
            'email'                => 'required',
            'web_site'             => 'required',
            'project_name'         => 'required',
            'project_goal'         => 'required',
            'project_aspects'      => 'required',
            'project_beneficaries' => 'required',
            'description'          => 'required',
            'project_cost'         => 'required',
            'project_duration'     => 'required',
            'region'               => 'required',
            'project_stage'        => 'required',
            'available_funding'    => 'required',
        ], [
            'project_manager.required'      => "Поле Керівник проекту обов'язкове для заповнення;",
            'project_contacts.required'     => "Поле Контактні дані обов'язкове для заповнення;",
            'phone.required'                => "Поле Телефон обов'язкове для заповнення;",
            'email.required'                => "Поле Контактна пошта обов'язкове для заповнення;",
            'web_site.required'             => "Поле Веб-сайт обов'язкове для заповнення;",
            'project_name.required'         => "Поле Назва проекту обов'язкове для заповнення;",
            'project_goal.required'         => "Поле Мета проекту обов'язкове для заповнення;",
            'project_aspects.required'      => "Поле Іноваційні аспекти та переваги проекту обов'язкове для заповнення;",
            'project_beneficaries.required' => "Поле Отримувачі вигоди обов'язкове для заповнення;",
            'description.required'          => "Поле Стислий опис проекту обов'язкове для заповнення;",
            'project_cost.required'         => "Поле Вартість проекту обов'язкове для заповнення;",
            'project_duration.required'     => "Поле Період реалізації проекту обов'язкове для заповнення;",
            'region.required'               => "Поле Географія проекту обов'язкове для заповнення;",
            'project_stage.required'        => "Поле Стадія проекту обов'язкове для заповнення;",
            'available_funding.required'    => "Поле Джерела фінансування обов'язкове для заповнення;",
        ]);

        $designer->fill($request->all());
        // Нужно удалять файл
        if ($request->file('logo_img_file')) {
            $filename       = uniqid() . '.' . $request->file('logo_img_file')->getClientOriginalExtension();
            $image          = Image::make($request->file('logo_img_file'))->resize(250,
                300)->save(storage_path('app/designer/images/' . $filename));
            $designer->logo = $filename;
        }
        $designer->save();

        return back()->with(['message' => 'Редагування завершено']);
    }

    public function show(Designer $designer)
    {
        return view('frontend.designer.show', compact('designer'));
    }
}
