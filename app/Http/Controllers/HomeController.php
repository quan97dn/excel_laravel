<?php

	namespace App\Http\Controllers;
	
	use App\User;
	use App\Mail\UserEmail;
	use View;
	use Redirect;
	use Cookie;
	use Hash;
	use Mail;

	use Illuminate\Http\Request;
	use Illuminate\Http\Response;
	use Illuminate\Support\Facades\Input;
	use App\Http\Requests;
	use App\Http\Controllers\Controller;

	// Request validation .
	use App\Http\Requests\loginRequest;
	use App\Http\Requests\registerRequest;
	use App\Http\Requests\sendEmailRequest;
	use App\Http\Requests\changPasswordEmailRequest;

	class HomeController extends Controller {

		// get controller login and register
		
		function getLogin() {

			return View::make('login');

		}

		// check login && create session user .

		function setLogin(loginRequest $request, Response $response) {	

			try {

     			$remember   = (Input::has('remember')) ? true : false;
			
				if($remember) {

					$username_cookie = cookie('username', $request->username, 60);
					$password_cookie = cookie('password', $request->password, 60);
					Cookie::queue($username_cookie);
					Cookie::queue($password_cookie);

				} 
				else {

					Cookie::queue(Cookie::forget('username'));
					Cookie::queue(Cookie::forget('password'));

				}

				$user = User::where(array('username' => $request->username))->first();
				

				if(Hash::check($request->password, $user->password)) {

					$request->session()->put('username', $request->username);
					$request->session()->put('level', $user->level);

					if($user->level == 0) {

						return Redirect::to('admin/');

					}
					else {

						return Redirect::to('member/');

					}

				}
				else {

					$request->session()->flash('flogin', 'Login faild !');
					return Redirect::to('/');

				}


		    } catch (Exception $e) {

		        report($e);
		        return false;

		    }

		}

		// set Logout user .

		function logout(Request $request) {

			try {

     			$request->session()->flush();
				return Redirect::to('/');

		    } catch (Exception $e) {

		        report($e);
		        return false;

		    }

		}

		// get view page register

		function getRegister() {

			return View::make('register');

		}


		// set register user .

		function setRegister(registerRequest $request) {

			try {

     			$user = new User();

				if(isset($request)) {

					$user->f_name   = $request->f_name;
					$user->l_name   = $request->l_name;
					$user->username = $request->username;
					$user->email    = $request->email;
					$user->password = Hash::make($request->password);
					$user->level	= 1;
					$user->remember_token = str_random(60);
					$user->save();

					$request->session()->flash('fregister', 'Register success !');
					return Redirect::to('register');
					
				}	

		    } catch (Exception $e) {

		        report($e);
		        return false;

		    }
			
		}

		// get view page sendchangepassword

		public function getSendChangePassword(Request $request) {

	        return View::make('sendChangePassword');

	    }

	    // check email current && send mail .

	    public function setSendChangePassword(sendEmailRequest $request) {

	    	try {

				$email   = User::where('email', '=', $request->email)->get();

				if(count($email)) {

					$user = User::findOrFail($email[0]['id']);
		        	Mail::to($user)->send(new UserEmail($user));
					$request->session()->flash('fmessages', 'send mail change password success !');
					return Redirect::back();

				}
				else {

					return Redirect::back()->withErrors('Email current incorrect');

				}

				
			} catch (Exception $e) {

		        report($e);
		        return false;

		    }
	    
	    }

	    // check token current && return variable user && view page changepasswordemail

	    public function getChangePasswordEmail($token, Request $request) {

	    	try {

				$user = User::where('remember_token', '=', $token)->get();

		    	if(count($user) == 0) 
		    		return Redirect::to('/');

		        return View::make('changePassword', ['user' => $user]);
				
			} catch (Exception $e) {

		        report($e);
		        return false;

		    }

	    }

	    // set new password && change token current .

	    public function setChangePasswordEmail($id, changPasswordEmailRequest $request) {

	    	try {

				$user = User::find($id);

		        $user->password = Hash::make($request->password);
		        $user->remember_token = str_random(60);
		        $user->save();

		        return Redirect::to('/');
				
			} catch (Exception $e) {

		        report($e);
		        return false;

		    }
	        
	    }

	    // get view page index admin && return count .

		function getIndexAdmin() {

			try {

				$count = [
				    "user" => User::get()->count(),
				];

				return View::make('admin.index', ['count' => $count]);
				
			} catch (Exception $e) {

		        report($e);
		        return false;

		    }

		}

		// get view page index member .

		function getIndexMember() {

			return View::make('member.index', array('search' => route('getIndexMember')));

		}
		
	}
 ?>