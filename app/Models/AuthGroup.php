<?php

namespace App\Models;



class AuthGroup extends Base
{
    protected $primaryKey = 'group_id'; //创建的表字段中主键ID的名称不为id，则需要通过 $primaryKey 来指定一下设定主键id




    /**
     * 新增角色
     * @param $data 新增角色数据
     * @return int 0：$data为空，1：角色已存在，2：成功新增分类
     */
    public static function addGroup ($data) {
        if(empty($data)){ //如果$data为空直接返回
            return 0;
        }
        $admin_count = self::where('title',$data['title'])->count(); //根据用户输入角色查询数据库角色名称信息
        if($admin_count){//如果有数据说明角色已存在
            return 1;
        }
        $res=self::create($data);//使用create方法新增角色
        //本次新增角色信息写入log
        self::addAadminLog(10,2,$res->group_id,$res->created_at);
        return 2;
    }

    /**
     * 修改角色信息
     * @param $data 角色新数据
     * @return int  0：$data为空，1：无需修改，保留原样，2：成功修改分类，3：角色邮箱已存在
     */
    public static function  updateGroup($data){
        if(empty($data)){ //如果$data为空直接返回
            return 0;
        }

        $rule_res = self::find($data['group_id'],["group_id","title","status"]); //查询该权限信息
        $rule_info=$rule_res->toArray(); //集合转数组

        //判断字段是否需要修改
        $edit_info = array_diff_assoc($data,$rule_info); //1:返回[]空数组，说明2个数组相同 2:返回非空数组（数据相同字段已去除，剩下需要修改的字段数据），说明$data数据和数据库数据不一致，需要执行修改
        if (!$edit_info){//空数组说明没有修改字段值，返回1
            return 1;
        }

        if(!empty($edit_info['title'])){//如果有新角色
            $rule_count = self::where('title',$data['title'])->count();  //根据用户输入角色查询数据库角色信息
            if($rule_count){//如果有数据说明角色已存在
                return 3;
            }
        }

        self::where('group_id',$data['group_id'])->update($edit_info);
        //本次修改权限信息写入log 执行操作对象 10：角色  执行操作类型1：删除， 2：添加， 3：修改，
        self::addAadminLog(10,3,$data['group_id'],date('Y-m-d H:i:s', time()));
        return 2;
    }
//
//
//    /**
//     * 删除角色
//     * @param $admin_id 角色id
//     * @return int 0：$admin_id为空，1：已删除角色，2：成功删除
//     * @throws \Exception
//     */
//    public static function deleteAdmin ($admin_id) {
//        if(empty($admin_id)){
//            return 0;
//        }
//        //查询数据库中是否存在该角色  0：没有  1：存在
//        $admin_count = self::where('admin_id','=',$admin_id)->count();
//        if(!$admin_count){ //不存在说明已删除
//            return 1;
//        }
//        //删除角色发布的文章
//        $article_ids=Article::where('author_id','=',$admin_id)->get(['article_id']);
//        $article_id_count=$article_ids->count();
//        if($article_id_count>0){
//            for ($i=1;$i<=$article_id_count;$i++){
//                $article_info = Article::find($article_ids[$i-1]->article_id,["markdown","cover"]); //查询包含图片路径的信息
//                $preg = '/(?<=\()+\/uploads\/images\/article\/+[^\)]+/';// 匹配括号里面的内容的正则表达式 markdown里的图片路径：(/uploads/images/article/20210616/DkCGWaGQTm1623848364.png)
//                preg_match_all($preg, $article_info->markdown, $allImg);//这里匹配指定文章/uploads/images/article/的img
//                $allImg=array_flatten($allImg); //多维数组转一维
//                array_push($allImg,$article_info->cover);//把封面图入栈
//                Article::deletedCover($allImg,2); //删除图片
//                //本次删除文章信息写入log
//                Article::addAadminLog(3,1,$article_ids[$i-1]->article_id,date('Y-m-d H:i:s', time()));
//            }
//        }
////
//        Article::where('author_id','=',$admin_id)->delete();//执行删除角色所有文章
//
//        self::where('admin_id','=',$admin_id)->delete();//执行删除角色
//        //本次删除角色信息写入log
//        self::addAadminLog(6,1,$admin_id,date('Y-m-d H:i:s', time()));
//        return 2;
//    }
//

    
}
