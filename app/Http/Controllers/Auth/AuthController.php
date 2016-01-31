<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use App\User;
use DB;
use App\Student;
use App\Expertise;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

    protected $redirectPath = '/profile';
	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)

	{

		$this->auth = $auth;
		$this->registrar = $registrar;
		
		$this->middleware('guest', ['except' => 'getLogout']);
	}


	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{


		return Validator::make($data, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		return User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),

		]);
	}




	public function postRegister(Request $request)
	{
		$validator = $this->registrar->validator($request->all());

		if ($validator->fails())
		{
			$this->throwValidationException(
				$request, $validator
			);
		}


		$this->auth->login($this->registrar->create($request->all()));

		$id = DB::getPdo()->lastInsertId();
		$user = \Auth::user();
		if (Input::get('state') === 'company')
		{
			$user->isCompany = 1;
			$user->save();
			return Redirect('company/project');

		}
		else if  (Input::get('state') === 'student')
		{
			$user->isStudent = True;
			$user->save();
			return Redirect('profile');
		}

		else if  (Input::get('state') === 'expertise')
		{
			$user->isExpertise = True;
			$user->save();
			return Redirect('profile');
		}
	}
}
