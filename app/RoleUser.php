<?php
/**
 * Created by PhpStorm.
 * User: lipeng
 * Date: 16/3/10
 * Time: 下午11:52
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
class RoleUser extends Model
{
    protected $table = "role_user";
    public $timestamps = false;
}