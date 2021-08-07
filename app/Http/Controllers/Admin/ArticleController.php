<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Article as ArticleModel;
use Illuminate\Support\Str;


class ArticleController extends Controller
{
    /**
     * 显示所有文章
     * showArticle_show_code 1：显示所有文章失败  2：显示所有文章成功
     */
    public function index()
    {
        $data= ArticleModel::lists();
        $assign=compact('data');
        foreach($data as $key){
            $key->is_pull = ArticleModel::mate_is_pull($key->is_pull);
        }
        return view('admin.article.article_list',$assign);
    }

    /**
     *
     * @return
     *
     */
    public function store()
    {
        $categorys=ArticleModel::categorys();  //分类
        $tags=ArticleModel::tags();            //标签
        $author=session('admin_user')['name'];  //session('admin_user')是一个一维数组
        $assign   = compact('categorys', 'tags', 'author');

        return view('admin.article.article_add',$assign);
    }

    /**
     *  新增文章
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse  0:数据为空, 1:文章已存在, 2:新增文章成功,其他：数据写入失败,新增文章失败
     */
    public function create(Request $request )
    {
        if($request->isMethod('post')){
            $input = $request->except('s','_token');  //去除 s：路由地址 ，_token： 表单中包含一个隐藏的 CSRF 令牌字段
            $data['category_id'] = intval($input['category_id']) ? intval($input['category_id']) : 0;
            $data['tag_id'] = intval($input['tag_id']) ? intval($input['tag_id']) : 0;
            $data['title'] = isset($input['title']) ? $input['title'] : "";
            $data['author'] = isset($input['author']) ? $input['author'] : "";
            $data['description'] = isset($input['description']) ? $input['description'] : "";
            $data['keywords'] = isset($input['keywords']) ? $input['keywords']: "";
            $data['markdown'] = isset($input['markdown']) ? $input['markdown']: "";
            $data['is_pull'] = intval($input['is_pull']) ? intval($input['is_pull']) : 0;
            $data['is_top'] = intval($input['is_top']) ? intval($input['is_top']) : 0;
            $data['cover'] = isset($input['cover']) ? $input['cover'] : "";
            if ($request->hasFile('cover')) {
                $data['cover']=$this->uploadCover($data['cover']);
            }
            if($author=session('admin_user')['name']== $data['author']){
                $data['author_id']=session('admin_user')['admin_id'];
            }else{
                $data['author_id']=0;
            }
            $res=ArticleModel::addArticle($data);
            switch ($res) { //判断新增返回值
                case 0:
                    return redirect()->back()->withInput()->with('err', '数据为空');
                    break;
                case 1:
                    return redirect()->back()->withInput()->with('err', '文章已存在');
                    break;
                case 2:
                    return redirect()->route("article.index")->with('msg', "新增文章成功");
                    break;
                default:
                    return redirect()->back()->withInput()->with('err', '数据写入失败,新增文章失败');
            }
        }else{
            return  redirect()->back()->withInput()->with('err','非法访问');
        }



    }

    /**
     * 显示更改文章页
     * @param $article_id 更改文章id
     *
     */
    public function edit($article_id)
    {

        if(empty($article_id)){
            return  redirect()->back()->withInput()->with('err','非法访问');
        }
        $categorys=ArticleModel::categorys();  //分类
        $tags=ArticleModel::tags();            //标签
        $articles=ArticleModel::find($article_id);            //文章
        $assign   = compact('categorys', 'tags', 'articles');
        return view('admin.article.article_update',$assign);
    }

    /**
     * 更改文章
     * @param $article_id 更改文章id
     * updateArticle_update_code
     */
    public function update(Request $request)
    {
        if($request->isMethod('post')){
            $input = $request->except('s','_token');  //去除 s：路由地址 ，_token： 表单中包含一个隐藏的 CSRF 令牌字段
            $data['category_id'] = intval($input['category_id']) ? intval($input['category_id']) : 0;
            $data['tag_id'] = intval($input['tag_id']) ? intval($input['tag_id']) : 0;
            $data['article_id'] = intval($input['article_id']) ? intval($input['article_id']) : 0;
            $data['title'] = isset($input['title']) ? $input['title'] : "";
            $data['author'] = isset($input['author']) ? $input['author'] : "";
            $data['description'] = isset($input['description']) ? $input['description'] : "";
            $data['keywords'] = isset($input['keywords']) ? $input['keywords']: "";
            $data['markdown'] = isset($input['markdown']) ? $input['markdown']: "";
            $data['is_pull'] = intval($input['is_pull']) ? intval($input['is_pull']) : 0;
            $data['is_top'] = intval($input['is_top']) ? intval($input['is_top']) : 0;
            $data['cover'] = isset($input['cover']) ? $input['cover'] : "";
            if ($request->hasFile('cover')) {
                $data['cover']=$this->uploadCover($data['cover']);
            }
            if($author=session('admin_user')['name']== $data['author']){
                $data['author_id']=session('admin_user')['admin_id'];
            }else{
                $data['author_id']=0;
            }
            $res=ArticleModel::updateArticle($data);
            switch ($res) { //判断新增返回值
                case 0:
                    return redirect()->back()->withInput()->with('err', '数据为空');
                    break;
                case 1:
                    return redirect()->back()->withInput()->with('msg', "保留，没有修改内容");
                    break;
                case 2:
                    return redirect()->back()->withInput()->with('msg', "修改文章成功");
                    break;
                case 3:
                    return redirect()->back()->withInput()->with('err', "标题已存在");
                    break;
                case 4:
                    return redirect()->back()->withInput()->with('err', "文章所属标签已下架；如需修改请先上架文章所属标签");
                    break;
                default:
                    return redirect()->back()->withInput()->with('err', '数据写入失败,新增文章失败');
            }
        }else{
            return  redirect()->back()->withInput()->with('err','非法访问');
        }

    }

    /**
     * 删除文章
     * @param $article_id 文章id
     *deleteArticle_delete_code  0：默认  1：删除失败  2：删除成功
     */
    public function delete($article_id)
    {

        if(empty($article_id)){
            return redirect()->back()->withInput()->with('err', '非法访问');
        }
        $res=ArticleModel::deleteArticle($article_id);//执行删除
        switch ($res) { //判断删除返回值
            case 0:
                return redirect()->back()->withInput()->with('err', '数据为空');
                break;
            case 1:
                return redirect()->back()->withInput()->with('err', '文章不存在');
                break;
            case 2:
                return redirect()->route("article.index")->with('msg', "删除文章成功");
                break;
            default:
                return redirect()->back()->withInput()->with('err', '网络错误,删除文章失败');
        }
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
     * 上传文章中的图片
     * @param Request $request    上传文章中的图片
     * @return \Illuminate\Http\JsonResponse   上传成功信息（1）
     */

    public function uploadArticleImage(Request $request)
    {
        //editormd的上传图片返回格式
        $data = [
            'success' => 1,
            'message' => 'success',
            'url'     => '',
        ];
        //判断上传图片是否存在
        if ($request->hasFile('editormd-image-file')) {
            $file = $request->file('editormd-image-file');
            //值例如 /uploads/images/article/20210613
            $folder_name = "uploads/images/article/".date('Ymd/',time());
            $upload_path = public_path() . "/" . $folder_name;
            $extension = strtolower($file->getClientOriginalExtension()) ?: 'png';
            $filename = Str::random(10).time().'.'. $extension;
            //将图片移动到我们目标存储路径中
            $file->move($upload_path , $filename);
            //return "/".$folder_name.$filename;  //   /uploads/images/article/20210613
            $data['url']= "/".$folder_name.$filename;  //   /uploads/images/article/20210613
        }
        return response()->json($data);
    }

    /**
     *上传文章封面图
     * @param $file    上传封面图
     * @return string  图片路径
     */
    public function uploadCover ($file)
    {
        //值例如 /uploads/images/article/20210613
        $folder_name = "uploads/images/article/".date('Ymd/',time());
        $upload_path = public_path() . "/" . $folder_name;
        $extension = strtolower($file->getClientOriginalExtension()) ?: 'png';
        $filename = Str::random(10).time().'.'. $extension;
        //将图片移动到我们目标存储路径中
        $file->move($upload_path , $filename);
        //return "/".$folder_name.$filename;  //   /uploads/images/article/20210613
        $path= "/".$folder_name.$filename;  //   /uploads/images/article/20210613
        return $path;
    }

}
