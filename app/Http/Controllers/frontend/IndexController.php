<?php
/**
 *@copyright : OZVID Technologies Pvt. Ltd. < www.ozvid.com >
 *@author    : Shiv Charan Panjeta < shiv@ozvid.com >
 */
namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class IndexController extends Controller
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
    
    public function index() {
        return view('frontend.index');
    }
    
}
