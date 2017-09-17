<?php 

	namespace App\Http\Controllers\Admin;

	use Illuminate\Http\Request;
	use App\Http\Requests;
	use View;
	use App\User;
	use Redirect;
	use Input;
	use Image;
	use Hash;

	use App\Http\Controllers\Controller;

	// Request validation .
	use App\Http\Requests\createUserRequest;
	use App\Http\Requests\updateUserRequest;
	use App\Http\Requests\updateProfileUserRequest;
	use App\Http\Requests\changePasswordRequest;
	use App\Http\Requests\changeImgRequest;
	
	class UsersController extends Controller {

		// get view page index home && return list user where search .
		
		public function getIndex($search = null, Request $request) {

			try {

				$user = $request->session()->get('profile', 'default');

     			$user = User::where('username', 'LIKE', '%'.$request->search.'%')->
     						  where('username', '!=', $user->username)->paginate(5);
     						  
				return View::make('admin.users.index', array('users' => $user, 'search' => route('users.getIndex')));

		    } catch (Exception $e) {

		        report($e);
		        return false;

		    }
			
		}

		// get page view && return object user where id .

		public function getView($id, Request $request) {

			try {

     			$user = User::find($request->id);
				return View::make('admin.users.view', array('user' => $user));

		    } catch (Exception $e) {

		        report($e);
		        return false;

		    }
	
		}

		// get view page create .

		public function getCreate() {

			return View::make('admin.users.create');

		}

		// set add object user in database user .

		public function setCreate(createUserRequest $request) {

			try {

     			$user  = new User();
				$image = null;

				// upload file image
				if (Input::hasFile('fileImage'))
				{
				    $photo 			 = $request->file('fileImage');
			        $imagename 		 = time().'.'.$photo->getClientOriginalExtension(); 
			        $destinationPath = public_path('/uploads/avatar');
			        $thumb_img 	     = Image::make($photo->getRealPath())->resize(150, 150);
			        $thumb_img->save($destinationPath.'/'.$imagename,80);
			        $image = 'public/uploads/avatar/'.$imagename;
				}

				// Set input in value object user
				$user->f_name   = $request->f_name;
				$user->l_name   = $request->l_name;
				$user->username = $request->username;
				$user->email    = $request->email;
				$user->password = Hash::make($request->password);
				$user->level	= $request->level;
				$user->image    = $image;
				$user->remember_token = str_random(60);
				$user->save();

				$request->session()->flash('fcreate', 'create success !');

				return Redirect::to('admin/users/create');

		    } catch (Exception $e) {

		        report($e);
		        return false;

		    }
			
		}

		// get return object in page update && view page update .

		public function getUpdate($id, Request $request) {

			try {

     			$users = User::find($request->id);
				return View::make('admin.users.update', array('users' => $users));

		    } catch (Exception $e) {

		        report($e);
		        return false;

		    }
			
		}

		// set update object user in database where id .

		public function setUpdate($id, updateUserRequest $request) {

			try {

				$user = User::find($id);

				$image = null;

				if(!empty($request->fimage)) 
					$image = $request->fimage;

				// upload file image
				if (Input::hasFile('fileImage'))
				{
				    $photo 			 = $request->file('fileImage');
			        $imagename 		 = time().'.'.$photo->getClientOriginalExtension(); 
			        $destinationPath = public_path('/uploads/avatar');
			        $thumb_img 	     = Image::make($photo->getRealPath())->resize(150, 150);
			        $thumb_img->save($destinationPath.'/'.$imagename,80);
			        $image = 'public/uploads/avatar/'.$imagename;
				}

				// Set input in value object user
				$user->f_name   = $request->f_name;
				$user->l_name   = $request->l_name;
				$user->username = $request->username;
				$user->email    = $request->email;
				$user->level	= $request->level;
				$user->image    = $image;
				$user->save();

				$request->session()->flash('fmessages', 'update success !');

				return redirect()->route('users.getUpdate', $id);

		    } catch (Exception $e) {

		        report($e);
		        return false;

		    }

		}

		// get page ResetPass && update password default (123456) in database user where id .

		public function getResetPass($id, Request $request) { 
			
			try {

     			$user = User::find($id);
				$user->password = Hash::make(123456);
				$user->save();
				$request->session()->flash('fmessages', 'Reset password success !');
				return redirect()->route('users.getUpdate', $id);

		    } catch (Exception $e) {

		        report($e);
		        return false;

		    }

		}

		// get update column image = null where id .

		public function getDeleteImg($id, Request $request) { 
			
			try {

     			$user = User::find($id);
				$user->image = null;
				$user->save();
				$request->session()->flash('fmessages', 'Delete image success !');
				return redirect()->route('users.getUpdate', $id);

		    } catch (Exception $e) {

		        report($e);
		        return false;

		    }

		}

		// get delete object in database where id .

		public function getDelete($id, Request $request) {

			try {

     			User::find($id)->delete();
				return Redirect::to('admin/users');

		    } catch (Exception $e) {

		        report($e);
		        return false;

		    }
			
		}

		// get delete all object muti in database .

		public function getDeleteAll(Request $request) {

			try {

     			if($request->exists('checked')) {

					foreach ($request->checked as $value) {

						User::find($value)->delete();

					}

				} 

				return Redirect::to('admin/users');

		    } catch (Exception $e) {

		        report($e);
		        return false;

		    }
		
		}

		// get profile object user && include session user .

		public function getProfile(Request $request) {

			try {

     			$user = $request->session()->get('profile', 'default');
				return View::make('admin.users.profile', array('user' => $user));

		    } catch (Exception $e) {

		        report($e);
		        return false;

		    }

		}

		// set update profile in database where id .

		public function setProfile($id, updateProfileUserRequest $request) {

			try {

     			$user = $request->session()->get('profile', 'default');

				$image = null;

				if(!empty($request->fimage)) 
					$image = $request->fimage;

				// upload file image
				if (Input::hasFile('fileImage'))
				{

				    $photo 			 = $request->file('fileImage');
			        $imagename 		 = time().'.'.$photo->getClientOriginalExtension(); 
			        $destinationPath = public_path('/uploads/avatar');
			        $thumb_img 	     = Image::make($photo->getRealPath())->resize(150, 150);
			        $thumb_img->save($destinationPath.'/'.$imagename,80);
			        $image = 'public/uploads/avatar/'.$imagename;

				}

				// Set input in value object user
				$user->f_name   = $request->f_name;
				$user->l_name   = $request->l_name;
				$user->username = $request->username;
				$user->email    = $request->email;
				$user->image    = $image;
				$user->save();

				$request->session()->flash('fmessages', 'update success !');

				return redirect()->route('users.getProfile');

		    } catch (Exception $e) {

		        report($e);
		        return false;

		    }

		}

		// get view page ChangePassword

		public function getChangePassword(Request $request) {

			return View::make('admin.users.changePassword');

		}

		// set ChangePassword .

		public function setChangePassword(changePasswordRequest $request) {

			try {

				$user = $request->session()->get('profile', 'default');

				if(Hash::check($request->currentPassword, $user->password)) {

					$user->password = Hash::make($request->password);
					$user->save();
					$request->session()->flash('fmessages', 'change password success !');
					return View::make('admin.users.changePassword');

				}
				else {

					return Redirect::back()->withErrors('Password current incorrect');

				}
				
		    } catch (Exception $e) {

		        report($e);
		        return false;

		    }

		}

		// set ChangeImage change img in database .

		public function setChangeImage(changeImgRequest $request) {

			try {

     			$user = $request->session()->get('profile', 'default');

     			$image = null;

     			// upload file image
				if (Input::hasFile('fileImage'))
				{

				    $photo 			 = $request->file('fileImage');
			        $imagename 		 = time().'.'.$photo->getClientOriginalExtension(); 
			        $destinationPath = public_path('/uploads/avatar');
			        $thumb_img 	     = Image::make($photo->getRealPath())->resize(150, 150);
			        $thumb_img->save($destinationPath.'/'.$imagename,80);
			        $image = 'public/uploads/avatar/'.$imagename;

				}

     			$user->image = $image;
     			$user->save();

				return redirect()->route('users.getIndex');

		    } catch (Exception $e) {

		        report($e);
		        return false;

		    }
	
		}

	}

?>