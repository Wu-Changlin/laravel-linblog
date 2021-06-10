<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article as ArticleModel;

use Image;
class ArticleController extends Controller
{
    /**
     * 显示所有文章
     * showArticle_show_code 1：显示所有文章失败  2：显示所有文章成功
     */
    public function showArticle()
    {

        $data= ArticleModel::lists();
        $assign=compact('data');
        foreach($data as $key){
            if($key->is_pull == 1){
                $str='是';
                $key->is_pull=$str;
            }elseif ($key->is_pull == 2){
                $str='否';
                $key->is_pull=$str;
            }else{
                $str='默认';
                $key->is_pull=$str;
            }
        }
        return view('admin.article.article_list',$assign);
    }

    /**
     * 显示发布文章页
     * @return
     *
     */
    public function showAddarticleWeb()
    {
        $categorys=ArticleModel::categorys();  //分类
        $tags=ArticleModel::tags();            //标签
        $author=session('admin_user')['name'];  //session('admin_user')是一个一维数组
        $assign   = compact('categorys', 'tags', 'author');
        return view('admin.article.article_add',$assign);
    }

    /**
     * 发布文章
     * @return  addArticle_add_code  0：默认  1：发布失败  2：发布成功  3：保存中
     * post
     */
    public function addArticle(Request $request)
    {
        if($request->isMethod('post')){
            $input = $request->except('s','_token');  //去除 s：路由地址 ，_token： 表单中包含一个隐藏的 CSRF 令牌字段
            $data['category_id'] = intval($input['category_id']) ? intval($input['category_id']) : 0;
            $data['tag_id'] = intval($input['tag_id']) ? intval($input['tag_id']) : 0;
            $data['title'] = isset($input['title']) ? $input['title'] : "";
            $data['author'] = isset($input['author']) ? $input['author'] : "";
            $data['description'] = isset($input['desc']) ? $input['desc'] : "";
            $data['keywords'] = isset($input['keywords']) ? $input['keywords']: "";
            $data['markdown'] = isset($input['markdown']) ? $input['markdown'] : "";
            $data['is_pull'] = intval($input['rec_index']) ? intval($input['rec_index']) : 0;
            $data['cover'] = isset($input['cover']) ? $input['cover'] : "";
            if ($request->hasFile('cover')) {
                $data['cover'] = '/' . $request->file('cover')->store('uploads/article/' . date('Ymd', time()), 'public');
            }
            $res=ArticleModel::addArticle($data);
            switch ($res) { //判断新增返回值
                case 0:
                    return redirect()->back()->withInput()->with('msg', '数据为空');
                    break;
                case 1:
                    return redirect()->back()->withInput()->with('msg', '文章已存在');
                    break;
                case 2:
                    return redirect()->route("article.showArticle")->with('msg', "新增文章成功");
                    break;
                default:
                    return redirect()->back()->withInput()->with('msg', '数据写入失败,新增文章失败');
            }
        }else{
            return  redirect()->back()->withInput()->with('msg',非法访问);
        }



    }

    /**
     * 显示更改文章页
     * @param $article_id 更改文章
     * update
     */
    public function showUpdatearticleWeb($article_id)
    {
        return view('admin.article.article_update');
    }

    /**
     * 更改文章
     * @param $article_id 更改文章
     * updateArticle_update_code  0：默认  1：更改失败  2：更改成功  3：保存中
     */
    public function updateArticle($article_id)
    {
        dd('updateArticle.后台更改文章');
    }

    /**
     * 删除文章
     * @param $article_id 文章id
     *deleteArticle_delete_code  0：默认  1：删除失败  2：删除成功
     */
    public function deleteArticle($article_id)
    {
        dd('deleteArticle.后台删除文章');
    }

    /**
     * 排序文章
     *sortArticle__sort_code 1：排序文章失败  2：排序文章成功
     *
     */
    public function sortArticle()
    {
        dd('uploadArticleImage.后台排序文章');
    }

    /**
     * 上传文章图片
     *uploadArticleImage__upload_code 1：上传失败  2：上传成功
     *
     */
    public function uploadArticleImage()
    {
        dd('uploadArticleImage.后台上传文章图片');
    }



}
