<?php
/**
 *@copyright : OZVID Technologies Pvt. Ltd. < www.ozvid.com >
 *@author	 : Shiv Charan Panjeta < shiv@ozvid.com >
 */
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /*
     |--------------------------------------------------------------------------
     | User Controller
     |--------------------------------------------------------------------------
     |
     | This controller handles authenticating users for the application and
     | redirecting them to your home screen. The controller uses a trait
     | to conveniently provide its functionality to your applications.
     |
     */
    
    public function all() {
        $users = User::where('role_id', User::ROLE_USER)->paginate(20);
        return view('admin.users.index',[
            'users' => $users
        ]);
    }
    
    public function view($id) {
        $user = User::where('role_id', User::ROLE_USER)->where('id', $id)->first();
        if(!empty($user)){
            return view('admin.users.view',[
                'user' => $user
            ]);
        }else{
            abort(404, 'User does not exist');
        }
    }
    
    public function save(Request $request) {
        $rules = array(
            'full_name'=>'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
            'contact_no' => 'integer|digits_between:8,13|nullable',
            'state_id' => 'required|integer',
            'profile_file' => 'image|mimes:jpeg,png,jpg|max:10000'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }else{
            $user = new User();
            $user->full_name = $request->input('full_name');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->state_id = $request->input('state_id');
            $user->role_id = User::ROLE_USER;
            if(!empty($request->input('contact_no'))){
                $user->contact_no = $request->input('contact_no');
            }
            if(!empty($request->input('address'))){
                $user->address = $request->input('address');
            }
            if($request->hasFile('profile_file')) {
                $icon = date('Ymd') . '_' . time() . '.' . $request->file('profile_file')->getClientOriginalExtension();
                $request->profile_file->move(public_path('uploads'), $icon);
                $user->profile_file = $icon;
            }
            if($user->save()){
                return redirect('admin/user/'.$user->id)->with('success', 'User added succesfully');
            }else{
                return Redirect::back()->withInput()->with('error', 'Some error occured. Please try again later');
            }
        }
    }
    
    public function edit($id) {
        $user = User::where('id', $id)->first();
        if(!empty($user)){
            return view('admin.users.edit',[
                'user' => $user
            ]);
        }else{
            abort(404);
        }
    }
    
    public function update(Request $request, $id) {
        $user = User::where('id', $id)->first();
        if(!empty($user)){
            $rules = array(
                'full_name'=>'required',
                'contact_no' => 'numeric|digits_between:8,13|nullable',
                'state_id' => 'required|integer'
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return Redirect::back()->withInput()->withErrors($validator);
            }else{
                $user->full_name = $request->input('full_name');
                $user->state_id = $request->input('state_id');
                if(!empty($request->input('contact_no'))){
                    $user->contact_no = $request->input('contact_no');
                }
                if(!empty($request->input('address'))){
                    $user->address = $request->input('address');
                }
                if($user->save()){
                    if($user->id == Auth::id()){
                        return redirect('admin/profile')->with('success', 'User updated succesfully');
                    }
                    return redirect('admin/user/'.$user->id)->with('success', 'User updated succesfully');
                }else{
                    return Redirect::back()->withInput()->with('error', 'Some error occured. Please try again later');
                }
            }
        }else{
            abort(404);
        }
    }
    
    public function delete($id) {
        $user = User::where('role_id', User::ROLE_USER)->where('id', $id)->first();
        if(!empty($user)){
            if($id != Auth::id()){
                if($user->delete()){
                    return redirect('admin/users')->with('success', 'User deleted succesfully');
                }
            }else{
                return Redirect::back()->with('error', 'You can not delete your own account');
            }
        }else{
            abort(404);
        }
    }
    
    public function changePassword($id){
        $user = User::where('id', $id)->first();
        if(!empty($user)){
            return view('admin.users.change-password');
        }else{
            abort(404);
        }
    }
    
    public function updatePassword(Request $request, $id){
        $user = User::where('id', $id)->first();
        if(!empty($user)){
            $rules = array(
                'password' => 'required|min:8',
                'confirm_password' => 'required|same:password',
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return Redirect::back()->withInput()->withErrors($validator);
            }else{
                $user->password = bcrypt($request->input('password'));
                if($user->save()){
                    if($user->id == Auth::id()){
                        return redirect('admin/profile')->with('success', 'Password updated succesfully');
                    }
                    return redirect('admin/user/'.$user->id)->with('success', 'Password updated succesfully');
                }else{
                    return Redirect::back()->withInput()->with('error', 'Some error occured. Please try again later');
                }
            }
        }else{
            abort(404);
        }
    }
    
    public function myProfile(){
        $user = Auth::user();
        return view('admin.users.view',[
            'user' => $user
        ]);
    }
    
}
