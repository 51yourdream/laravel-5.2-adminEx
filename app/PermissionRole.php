<?php
/**
 * Created by PhpStorm.
 * User: lipeng
 * Date: 16/3/10
 * Time: 下午11:52
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Permission;
use App\Role;
class PermissionRole extends Model
{
    protected $table = "permission_role";

    public function hasOnePermission(){
        return $this->hasOne('App\Permission','id','permission_id');
    }
    public function hasOneRole(){
        return $this->hasOne('App\Role','id','role_id');
    }
}