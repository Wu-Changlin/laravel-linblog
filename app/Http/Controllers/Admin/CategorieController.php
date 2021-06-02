<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class CategorieController extends Controller
{
    /**
     * 显示所有分类
     * @return array
     */
    public function showCategory()
    {
        dd('showCategory.后台显示所有分类');

    }

    /**
     * 新增分类
     * @return  addCategory_add_code  0：默认  1：新增分类失败    2：新增分类成功  3：保存
     *
     */
    public function addCategory()
    {
        dd('addCategory.后台新增分类');
    }

    /**
     * 更改分类     下架分类 该分类下的所有文章也会下架
     *@param $category_id 分类id
     *status_code  0：默认不可见  1：更改分类失败   2：更改分类成功  3：保存
     */
    public function updateCategory($category_id)
    {
        dd('updateCategory.后台更改分类');
    }

    /**
     * 删除分类    该分类下的所有文章也会删除
     * @param $category_id 分类id
     *deleteCategory_delete_code  0：默认 1：删除失败   2：成功删除
     */
    public function deleteCategory($category_id)
    {
        dd('deleteCategory.后台删除分类');
    }


    /**
     * 排序分类    后台调整前台分类显示位置   (按字符长度、字母、新建分类时间)
     * @param
     *sortCategory_sort_code
     */
     public function sortCategory(){
         dd('sortCategory.后台调整前台分类显示位置');
     }





}
