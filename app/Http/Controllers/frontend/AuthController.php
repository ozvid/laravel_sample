<?php
/**
 *@copyright : OZVID Technologies Pvt. Ltd. < www.ozvid.com >
 *@author    : Shiv Charan Panjeta < shiv@ozvid.com >
 */
namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailFromAdmin;
use App\Http\models\EmailQueue;
use App\Http\models\LoginHistory;

class AuthController extends Controller
{
    /*
     |--------------------------------------------------------------------------
     | Login Controller
     |--------------------------------------------------------------------------
     |
     | This controller handles authenticating users for the application and
     | redirecting them to your home screen. The controller uses a trait
     | to conveniently provide its functionality to your applications.
     |
     */
    
    public function addAdmin() {
        $user = User::all();
        if($user->isEmpty()) {
            return view('frontend.auth.add-admin');
        }else{
            return redirect('login');
        }
    }
    
    public function saveAdmin(Request $request) {
        $user = User::all();
        if($user->isEmpty()) {
            $rules = array(
                'email'=>'required|email',
                'password' => 'required|min:8',
                'confirm_password' => 'required|same:password',
                'full_name' => 'required'
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return Redirect::back()->withInput()->withErrors($validator);
            }else{
                $user = new User();
                $user->email = $request->input('email');
                $user->password = bcrypt($request->input('password'));
                $user->full_name = $request->input('full_name');
                $user->role_id = User::ROLE_ADMIN;
                $user->state_id = User::STATE_ACTIVE;
                if($user->save()) {
                    return redirect('login')->with('success', 'Please login');
                }else{
                    return Redirect::back()->withInput()->with('error', 'Some error occured. Please try again later');
                }
            }
        }else{
            return redirect('login')->with('error', 'Admin already exist');
        }
    }
    
    public function saveUser(Request $request) {
        $rules = array(
            'email'=>'required|email|unique:users,email',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
            'full_name' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }else{
            $user = new User();
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->full_name = $request->input('full_name');
            $user->role_id = User::ROLE_USER;
            $user->state_id = User::STATE_ACTIVE;
            if($user->save()) {
                return redirect('login')->with('success', 'Please login');
            }else{
                return Redirect::back()->withInput()->with('error', $user->getErrorSummary());
            }
        }
    }
    
    public function actionLogin(Request $request) {
        $rules = array(
            'email'=>'required|email',
            'password' => 'required|min:8'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }else{
            $user = User::where('email', $request->input('email'))->first();
            if(!empty($user)) {
                $credentials = $request->only('email', 'password');
                if (Auth::attempt($credentials)) {
                    if($user->role_id == User::ROLE_ADMIN) {
                        return redirect('admin')->with('success', 'Login succesfully');
                    }
                    return redirect('/')->with('success', 'Login succesfully');
                }else{
                    $error = 'username or password is incorrect';
                    return Redirect::back()->withInput()->with('error', $error);
                }
            }else{
                $error = 'Email does not exist';
                return Redirect::back()->withInput()->with('error', $error);
            }
        }
    }
    
    public function forgotPassword(Request $request) {
        $rules = array(
            'email'=>'required|email'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }else{
            $user = User::where('email', $request->input('email'))->first();
            if(!empty($user)) {
                $url = $user->getResetUrl();
                $res = EmailQueue::add([
                    'to' => $user->email,
                    'from' => 'admin@toxsl.in',
                    'subject' => 'Reset Password Email',
                    'view' => 'email.forgot-password',
                    'model' => [
                        'user' => $user
                    ]
                ]);
                if($res) {
                    return Redirect::back()->with('success', 'Mail has been sent to you with a reset link.');
                }else{
                    return Redirect::back()->with('error', 'Some error occured. Please try again later');
                }
            }else{
                return Redirect::back()->withInput()->with('error', 'Email does not exist');
            }
        }
    }
    
    public function resetPassword(Request $request, $token) {
        $user = User::where('password_reset_token', $token)->first();
        if(!empty($user)) {
            return view('frontend.auth.update-password');
        }else{
            return view('frontend.auth.update-password',[
                'error' => 'This URL is expired'
            ]);
        }
    }
    
    public function updateUserPassword(Request $request, $token) {
        $request->session()->forget('danger');
        $rules = array(
            'password'=>'required|min:8',
            'confirm_password' => 'required|same:password'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }else{
            $user = User::where('password_reset_token', $token)->first();
            if(!empty($user)) {
                $user->password = bcrypt($request->input('password'));
                $user->password_reset_token = '';
                if($user->save()) {
                    return Redirect::back()->with('success', 'Password updated succesfully');
                }else{
                    return Redirect::back()->with('error', 'Some error occured. Please try again later');
                }
            }else{
                return Redirect::back()->with('danger', 'This URL is expired');
            }
        }
    }
    
}
