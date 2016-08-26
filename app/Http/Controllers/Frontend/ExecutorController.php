<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Executor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

use App\User;
use Illuminate\Support\Facades\Mail;

class ExecutorController extends Controller
{

    public function __construct()
    {
        $this->middleware('owner:executor', ['only' => ['edit', 'update']]);
    }

    public function index()
    {
        $executorProjects = Executor::orderBy('id', 'desc')->take(10)->get();

        return view('frontend.executor.index')->with([
            'executorProjects' => $executorProjects,
        ]);
    }

    public function create()
    {
        return view('frontend.executor.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'executor_fname'    => 'required',
            'executor_sname'    => 'required',
            //'date_birth'        => 'required',
            //'experience'        => 'reguired' 
           // 'education'         => 'reguired',
            //'description'       => 'reguired',
            //'adress'            => 'reguired',
            //'phone'             => 'reguired',
            'email'             => Auth::check() ? '' : 'required|email|unique:users',
        ], [
            'executor_fname'    => "Поле Ім'я обов'язкове для заповнення",
            'executor_sname'    => "Поле Прізвище обов'язкове для заповнення",
            //'date_birth'        => "Поле Дата Народження обов'язкове для заповнення",
           //'experience'        => "Поле Досвід роботи обов'язкове для заповнення",
           //'education'         => "Поле Освіта обов'язкове для заповнення",
            //'description'       => "Поле Особисті дані обов'язкове для заповнення",
            //'adress'            => "Поле Адреса обов'язкове для заповнення",
            //'phone'             => "Поле Телефон обов'язкове для заповнення",
            'email'             => "Гості мають обовязково вказати свою пошту",
            'unique' => "Ви вже зареэстровані. Спершу ви маєте авторизуватися за допомогою свого логіна і пароля",
        ]);

        $model = new Executor();
        $model->fill($request->all());
        if ($request->file('logo_img_file')) {
            $filename    = uniqid() . '.' . $request->file('logo_img_file')->getClientOriginalExtension();
            $image       = Image::make($request->file('logo_img_file'))->resize(250,
                300)->save(storage_path('app/executor/images/' . $filename));
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

        return redirect(route('executor.index'));
    }

    public function edit(Executor $executor)
    {
        return view('frontend.executor.edit');
    }

    public function update(Request $request, Executor $executor)
    {
        $this->validate($request, [
            'executor_fname'    => 'required',
            'executor_sname'    => 'required',
            //'date_birth'        => 'required',
            //'experience'         => 'required',
            //'education'         => 'reguired',
            //'description'       => 'reguired',
            //'adress'            => 'reguired',
            //'phone'             => 'reguired',
            
        ], [
            'executor_fname'    => "Поле Ім'я обов'язкове для заповнення",
            'executor_sname'    => "Поле Прізвище обов'язкове для заповнення",
           // 'date_birth'        => "Поле Дата Народження обов'язкове для заповнення",
            //'experience'        => "Поле Досвід роботи обов'язкове для заповнення",
            ////'education'         => "Поле Освіта обов'язкове для заповнення",
           // 'description'       => "Поле Особисті дані обов'язкове для заповнення",
            //'adress'            => "Поле Адреса обов'язкове для заповнення",
            //'phone'             => "Поле Телефон обов'язкове для заповнення",
            
        ]);

        $executor->fill($request->all());
        // Нужно удалять файл
        if ($request->file('logo_img_file')) {
            $filename       = uniqid() . '.' . $request->file('logo_img_file')->getClientOriginalExtension();
            $image          = Image::make($request->file('logo_img_file'))->resize(250,
                300)->save(storage_path('app/executor/images/' . $filename));
            $executor->logo = $filename;
        }
        $executor->save();

        return back()->with(['message' => 'Заявка оновлена']);
    }

    public function show(Executor $executor)
    {
        return view('frontend.executor.show', compact('executor'));
    }
}
