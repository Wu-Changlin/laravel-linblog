<?php
namespace App\Models;


class User extends Base
{
    protected $primaryKey = 'user_id'; //创建的表字段中主键ID的名称不为id，则需要通过 $primaryKey 来指定一下设定主键id
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
