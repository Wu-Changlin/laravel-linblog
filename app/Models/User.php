<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class User extends Model
{
    //
    public function add(){
        //查询所有记录
        $users = User::count(); //或 all()
        return [$users];
    }
    public function up(){
        //查询所有记录
        $users = new User(); //或 all()
        $users-> name ='nfaff';
        $users-> email ='nfaff';
        $users-> password ='nfaff';
        $a=$users->save();
        return [$a];
    }
}
