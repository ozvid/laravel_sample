<?php
/**
 *@copyright : OZVID Technologies Pvt. Ltd. < www.ozvid.com >
 *@author    : Shiv Charan Panjeta < shiv@ozvid.com >
 */
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\URL;
use App\components\TAuthenticable;

class User extends TAuthenticable
{
    use Notifiable;
    
    const ROLE_ADMIN = 1;
    const ROLE_USER = 2;
    
    const STATE_ACTIVE = 1;
    const STATE_INACTIVE = 2;
    const STATE_DELETED = 3;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function getResetUrl() {
        $key = '';
        $keys = array_merge(range(0, 9), range('a', 'z'));
        
        for ($i = 0; $i < 16; $i++) {
            $key .= $keys[array_rand($keys)];
        }
        
        $this->password_reset_token = $key;
        if($this->save()){
            return true;
        }else{
            return false;
        }
    }
    
    public function getProfileFileAttribute($value) {
        if($value != ''){
            return url('/') . '/public/uploads/' . $value;
        }
        return $value;
    }
    
    public static function getStatus($id = null)
    {
        $list = array(
            self::STATE_ACTIVE => "Active",
            self::STATE_INACTIVE => "Inactive",
            self::STATE_DELETED => "Deleted"
        );
        if ($id === null)
            return $list;
        return isset($list[$id]) ? $list[$id] : 'Not Defined';
    }
    
    public static function getRole($id = null)
    {
        $list = array(
            self::ROLE_ADMIN => "Admin",
            self::ROLE_USER => "User"
        );
        if ($id === null)
            return $list;
        return isset($list[$id]) ? $list[$id] : 'Not Defined';
    }
    
    public static function getState($id = null)
    {
        $list = array(
            self::STATE_ACTIVE => "Active",
            self::STATE_INACTIVE => "Inactive",
            self::STATE_DELETED => "Deleted"
        );
        if ($id === null)
            return $list;
        return isset($list[$id]) ? $list[$id] : 'Not Defined';
    }
    
}
