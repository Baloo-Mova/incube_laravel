<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\EconomicActivities;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\User;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller {

    public function index() {
        $customerProblems = Customer::orderBy('id', 'desc')->take(10)->get();

        return view('frontend.customer.index')->with([
                    'customerProblems' => $customerProblems,
        ]);
    }

    public function create() {
        $economicActivities = EconomicActivities::pluck('name', 'id');

        return view('frontend.customer.create', compact('economicActivities'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'problem_name' => 'required',
            'problem_description' => 'required',
            'email' => Auth::check() ? '' : 'required|email|unique:users',
                ], [
            'problem_name.required' => 'Поле Назва проблеми обов`язкове для заповнення ;',
            'problem_description.required' => 'Поле Опис проблеми  обов`язкове для заповнення;',
            'email' => "Email обязателен для пользователей не прошедших авторизацию",
            'unique' => 'Ви вже зареєстровані. Спершу Ви маєте авторизуватися за допомогою свого логіна та пароля.',
        ]);

        $model = new Customer();
        $model->fill($request->all());
        if ($request->file('logo_img_file')) {
            $filename = uniqid() . '.' . $request->file('logo_img_file')->getClientOriginalExtension();
            $image = Image::make($request->file('logo_img_file'))->resize(250, 300)->save(storage_path('app/customer/images/' . $filename));
            $model->logo = $filename;
        }

        $email = $request->get('email');
        $pass = str_random(10);

        if (isset($email) && !empty($email)) {
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

        if (!Auth::check() && Auth::attempt(['email' => $email, 'password' => $pass])) {
            return redirect(route('personal_area.index'));
        }

        return redirect(route('customer.index'));
    }

    public function edit($id) {
        $customer = Customer::findOrFail($id);
        $economicActivities = EconomicActivities::pluck('name', 'id');

        return view('frontend.customer.edit', compact('customer', 'economicActivities'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'problem_name' => 'required',
            'problem_description' => 'required',
                ], [
            'problem_name.required' => 'Поле Назва проблеми обов`язкове для заповнення ;',
            'problem_description.required' => 'Поле Опис проблеми  обов`язкове для заповнення;',
        ]);
        

        $customer = Customer::findOrFail($id);
        $customer->fill($request->all());
        // Нужно удалять файл
        if ($request->file('logo_img_file')) {
            $filename = uniqid() . '.' . $request->file('logo_img_file')->getClientOriginalExtension();
            $image = Image::make($request->file('logo_img_file'))->resize(250, 300)->save(storage_path('app/customer/images/' . $filename));
            $customer->logo = $filename;
        }
        $customer->save();

        return back()->with(['message' => 'Ваша заявка оновлена']);
    }

    public function show($id) {
        $model = Customer::findOrFail($id);

        return view('frontend.customer.show', compact('model'));
    }

}
