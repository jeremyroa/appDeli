<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Cliente;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:cliente');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:clientes'],
            'password' => ['required', 'string', 'min:2', 'confirmed'],
            'dni' => 'required|unique:clientes|min:8|numeric|string',
            'address' => 'max:255|required|string',
            'phone' => 'required|min:10|numeric|string',
            'question' => 'required|string|max:255',
            'answer' => 'required|string|max:255',
        ]);
    }
    protected function validatorUser(array $data)
    {

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:2', 'confirmed'],
            'dni' => 'required|unique:users|min:8|numeric|string',
            'address' => 'max:255|required|string',
            'phone' => 'required|min:10|numeric|string',
            'question' => 'required|string|max:255',
            'answer' => 'required|string|max:255',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $this->validatorUser($data)->validate();
        return User::create([
            'dni' => $data['dni'],
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'address' => $data['address'],
            'phone' => $data['phone'],
            'question' => $data['question'],
            'answer' => $data['answer'],
            'is_admin' => $data['is_admin'] == "on" ? true : null,
        ]);
    }
    protected function createCliente(Request $request)
    {
        $this->validator($request->all())->validate();
        $user = Cliente::create([
            'dni' => $request['dni'],
            'name' => $request['name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'address' => $request['address'],
            'phone' => $request['phone'],
            'question' => $request['question'],
            'answer' => $request['answer'],
        ]);
        
        return redirect()->intended('login/cliente');
    }
    public function showClienteRegisterForm()
    {
        return view('auth.register', ['url' => 'cliente']);
    }
}
