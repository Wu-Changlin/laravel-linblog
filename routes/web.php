<?php


// Home 模块
Route::namespace('Home')->name('home.')->group(function () {

    //博客首页展示  http://192.168.164.134:1133/
    Route::get('/', 'IndexController@showIndex');

    //显示文章内容+文章评论  http://192.168.164.134:1133/article/1
    Route::get('article/{id}/', 'ArticleController@showArticle');

    //显示指定类型下的所有文章  http://192.168.164.134:1133/category/1
    Route::get('category/{id}/', 'categoryController@showCategory')->name('category.show');;

    //评论文章+回复评论  http://192.168.164.134:1133/comment   测试阶段  get  应用post 表单提交 $article_id 文章id  $user_id用户id, comment_id 评论id ,$comment_content评论内容  $parent_id评论父项id  0：默认  1：不可见 2：父项
    Route::get('comment', 'CommentController@showComment');

});



// 用户登录后台
Route::namespace('Admin')->prefix('admin')->group(function () {
//    http://192.168.164.134:1133/admin/login/logIn
    Route::prefix('login')->group(function () {
        //登录页面  http://192.168.164.134:1133/admin/login/index
        Route::get('index','LoginController@index')->name("login.index");
        // 登录     http://192.168.164.134:1133/admin/login/logIn
        Route::post('logIn', 'LoginController@logIn')->name("admin.login");

    });

});


//// 后台登录页面
//Route::namespace('Admin')->prefix('admin')->group(function () {
//    Route::redirect('/', url('admin/login/index'));
//    Route::prefix('login')->group(function () {
//        // 登录页面
//        Route::get('index', 'LoginController@index')->middleware('admin.login');
//        // 退出
//        Route::get('logout', 'LoginController@logout');
//    });
//});


// 用户注册
Route::namespace('Admin')->prefix('register')->group(function () {
        //注册页面  http://192.168.164.134:1133/register
        Route::get('/','RegisterController@showRegisterUserIndex' );
        // 注册     http://192.168.164.134:1133/register/registerUser
        Route::post('registerUser', 'RegisterController@registerUser');
});



// Admin 模块
Route::namespace('Admin')->prefix('admin')->middleware('admin.login')->group(function () {
    // 后台首页     http://192.168.164.134:1133/admin/index
    Route::get('index', 'AdminController@showIndex')->name("admin.index");
    // 退出      http://192.168.164.134:1133/admin/logOut
    Route::get('logOut', 'AdminController@logOut')->name('admin.logout');
    // 管理员控制器
    Route::prefix('adminUser')->group(function () {
        // 管理员列表    http://192.168.164.134:1133/admin/adminUser/showAdminUser
        Route::get('showAdminUser', 'AdminController@showAdminUser')->name("admin.showAdminUser");

        // 显示新增管理员页面    http://192.168.164.134:1133/admin/adminUser/showAddadminWeb
        Route::get('showAddadminWeb', 'AdminController@showAddadminWeb');
        // 新增管理员    http://192.168.164.134:1133/admin/adminUser/addAdminUser
        Route::post('addAdminUser', 'AdminController@addAdminUser')->name("admin.addAdminUser");

        // 显示编辑管理员页面    http://192.168.164.134:1133/admin/adminUser/showUpdateAdminWeb/1
        Route::get('showUpdateAdminWeb/{id}', 'AdminController@showUpdateAdminWeb');
        // 编辑管理员    http://192.168.164.134:1133/admin/adminUser/updateAdminUser/
        Route::post('updateAdminUser', 'AdminController@updateAdminUser')->name("admin.updateAdminUser");

        // 删除管理员    http://192.168.164.134:1133/admin/adminUser/deleteAdminUser/1
        Route::get('deleteAdminUser/{id}', 'AdminController@deleteAdminUser');
    });

    // 分类管理
    Route::prefix('category')->group(function () {
        // 分类列表     http://192.168.164.134:1133/admin/category/index
        Route::get('index', 'CategoryController@index')->name('category.index');
        //显示添加分类页面 http://192.168.164.134:1133/admin/category/showAddcategoryWeb
        Route::get('showAddcategoryWeb', 'CategoryController@showAddcategoryWeb');
        // 添加分类     http://192.168.164.134:1133/admin/category/addCategory
        Route::post('addCategory', 'CategoryController@addCategory')->name('category.addCategory');

        // 显示编辑分类     http://192.168.164.134:1133/admin/category/showUpdatecategoryWeb/1
        Route::get('showUpdatecategoryWeb/{id}', 'CategoryController@showUpdatecategoryWeb');
        // 编辑分类   http://192.168.164.134:1133/admin/category/updateCategory
        Route::post('updateCategory', 'CategoryController@updateCategory')->name('category.updateCategory');

        // 排序         http://192.168.164.134:1133/admin/category/sortCategory
        Route::get('sortCategory', 'CategoryController@sortCategory');
        // 删除分类     http://192.168.164.134:1133/admin/category/deleteCategory/1
        Route::get('deleteCategory/{id}', 'CategoryController@deleteCategory');
    });


    // 标签管理
    Route::prefix('tag')->group(function () {
        // 标签列表     http://192.168.164.134:1133/admin/tag/showTag
        Route::get('showTag', 'TagController@showTag')->name('tag.showTag');
        // 添加标签     http://192.168.164.134:1133/admin/tag/showAddtagWeb
        Route::get('showAddtagWeb', 'TagController@showAddtagWeb');
        Route::post('addTag', 'TagController@addTag')->name('tag.addTag');

        // 编辑标签     http://192.168.164.134:1133/admin/tag/showUpdatetagWeb/1
        Route::get('showUpdatetagWeb/{id}', 'TagController@showUpdatetagWeb');
        Route::post('updateTag', 'TagController@updateTag')->name('tag.updateTag');;

        // 删除标签     http://192.168.164.134:1133/admin/tag/deleteTag/1
        Route::get('deleteTag/{id}', 'TagController@deleteTag');
    });


    // 文章管理
    Route::prefix('article')->group(function () {
        // 文章列表     http://192.168.164.134:1133/admin/article/showArticle
        Route::get('showArticle', 'ArticleController@showArticle')->name('article.showArticle');

        // 显示发布文章页面     http://192.168.164.134:1133/admin/article/showAddarticleWeb
        Route::get('showAddarticleWeb', 'ArticleController@showAddarticleWeb');
        // 执行发布文章操作     http://192.168.164.134:1133/admin/article/addArticle
        Route::post('addArticle', 'ArticleController@addArticle')->name('article.addArticle');

        // 编辑文章     http://192.168.164.134:1133/admin/article/showUpdatearticleWeb/1
        Route::get('showUpdatearticleWeb/{id}', 'ArticleController@showUpdatearticleWeb');
        Route::post('updateArticle', 'ArticleController@updateArticle')->name('article.updateArticle');
        // 上传图片     http://192.168.164.134:1133/admin/article/uploadArticleImage
        Route::get('uploadArticleImage', 'ArticleController@uploadArticleImage');
        // 删除文章     http://192.168.164.134:1133/admin/article/deleteArticle/3
        Route::get('deleteArticle/{id}', 'ArticleController@deleteArticle');
    });



    // 友情链接管理
    Route::prefix('friendshipLink')->group(function () {
        // 友情链接列表  http://192.168.164.134:1133/admin/friendshipLink/showFriendshipLink
        Route::get('showFriendshipLink', 'FriendshipLinkController@showFriendshipLink');
        // 添加友情链接
        Route::get('create', 'FriendshipLinkController@create');
        Route::post('store', 'FriendshipLinkController@store');
        // 编辑友情链接
        Route::get('edit/{id}', 'FriendshipLinkController@edit');
        Route::post('update/{id}', 'FriendshipLinkController@update');
        // 排序
        Route::post('sort', 'FriendshipLinkController@sort');
        // 删除友情链接
        Route::get('destroy/{id}', 'FriendshipLinkController@destroy');
        // 恢复删除的友情链接
        Route::get('restore/{id}', 'FriendshipLinkController@restore');
        // 彻底删除友情链接
        Route::get('forceDelete/{id}', 'FriendshipLinkController@forceDelete');
    });


    // 网站配置管理
    Route::prefix('web')->group(function () {
        // 网站配置列表   http://192.168.164.134:1133/admin/web/showWebConfig
        Route::get('showWebConfig', 'WebController@showWebConfig');
        //添加网站配置    http://192.168.164.134:1133/admin/web/addWebConfig
        Route::get('addWebConfig', 'WebController@addWebConfig');
        // 更新网站配置   http://192.168.164.134:1133/admin/web/updateWebConfig/1
        Route::get('updateWebConfig/{id}', 'WebController@updateWebConfig');
        // 删除网站配置   http://192.168.164.134:1133/admin/web/deleteWebConfig/1
        Route::get('deleteWebConfig/{id}', 'WebController@deleteWebConfig');
    });



});


?>
