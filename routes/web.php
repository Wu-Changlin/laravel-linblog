<?php


// Home 模块
Route::namespace('Home')->name('home.')->group(function () {

    //博客首页展示  http://192.168.164.134:1133/
    Route::get('/', 'IndexController@showIndex');

    //显示文章内容  http://192.168.164.134:1133/article/1
    Route::get('article/{id}/', 'ArticleController@showArticle');

    //显示标签下的文章 http://192.168.164.134:1133/showTag/1/1
    Route::get('showTag/{category_id}/{id}', 'TagController@showTag');

    //显示指定类型下的标签、文章  http://192.168.164.134:1133/category/1
    Route::get('category/{id}/', 'CategoryController@showCategory')->name('category.show');

    //显示友链 http://192.168.164.134:1133/friend
    Route::get('friend', 'FriendshipLinkController@showFirend');
    //添加友链
    Route::post('addFriend', 'FriendshipLinkController@addFriend');

    //显示资源库  http://192.168.164.134:1133/resource
    Route::get('resource', 'ResourceStockController@showResource');
    //添加资源  http://192.168.164.134:1133/addResource
    Route::post('addResource', 'ResourceStockController@addResource');
});



// 用户登录后台
Route::namespace('Admin')->prefix('admin')->group(function () {
    Route::prefix('login')->group(function () {
        //登录页面  http://192.168.164.134:1133/admin/login/index
        Route::get('index','LoginController@index')->name("login.index");
        // 登录     http://192.168.164.134:1133/admin/login/logIn
        Route::post('logIn', 'LoginController@logIn')->name("admin.login");
    });

});


// 用户注册
//Route::namespace('Admin')->prefix('register')->group(function () {
//        //注册页面  http://192.168.164.134:1133/register
//        Route::get('/','RegisterController@showRegisterUserIndex' );
//        // 注册     http://192.168.164.134:1133/register/registerUser
//        Route::post('registerUser', 'RegisterController@registerUser');
//});


// Admin 模块
Route::namespace('Admin')->prefix('admin')->middleware('admin.login','checkrbac')->group(function () {
    // 后台首页     http://192.168.164.134:1133/admin/index
    Route::get('index', 'AdminController@showIndex')->name("admin.index");
    // 退出      http://192.168.164.134:1133/admin/logOut
    Route::get('logOut', 'AdminController@logOut')->name('admin.logout');
    //6 管理员控制器
    Route::prefix('adminUser')->group(function () {
        // 管理员列表    http://192.168.164.134:1133/admin/adminUser/showAdminUser
        Route::get('index', 'AdminController@index')->name("adminUser.index");

        // 显示新增管理员页面    http://192.168.164.134:1133/admin/adminUser/store
        Route::get('store', 'AdminController@store');
        // 新增管理员    http://192.168.164.134:1133/admin/adminUser/create
        Route::post('create', 'AdminController@create')->name("adminUser.create");

        // 显示编辑管理员页面    http://192.168.164.134:1133/admin/adminUser/edit/1
        Route::get('edit/{id}', 'AdminController@edit');
        // 编辑管理员    http://192.168.164.134:1133/admin/adminUser/update/1
        Route::post('update', 'AdminController@update')->name("adminUser.update");

        // 删除管理员    http://192.168.164.134:1133/admin/adminUser/delete/1
        Route::get('delete/{id}', 'AdminController@delete');
    });



    //1 分类管理
    Route::prefix('category')->group(function () {
        // 分类列表     http://192.168.164.134:1133/admin/category/index
        Route::get('index', 'CategoryController@index')->name('category.index');
        //显示添加分类页面 http://192.168.164.134:1133/admin/category/store
        Route::get('store', 'CategoryController@store');
        // 添加分类     http://192.168.164.134:1133/admin/category/create
        Route::post('create', 'CategoryController@create')->name('category.create');

        // 显示编辑分类     http://192.168.164.134:1133/admin/category/edit/1
        Route::get('edit/{id}', 'CategoryController@edit');
        // 编辑分类   http://192.168.164.134:1133/admin/category/update
        Route::post('update', 'CategoryController@update')->name('category.update');

        // 排序         http://192.168.164.134:1133/admin/category/sortCategory
        Route::get('sortCategory', 'CategoryController@sortCategory');
        // 删除分类     http://192.168.164.134:1133/admin/category/delete/1
        Route::get('delete/{id}', 'CategoryController@delete');
    });



    //2 标签管理
    Route::prefix('tag')->group(function () {
        // 标签列表     http://192.168.164.134:1133/admin/tag/index
        Route::get('index', 'TagController@index')->name('tag.index');
        // 添加标签     http://192.168.164.134:1133/admin/tag/store
        Route::get('store', 'TagController@store');
        Route::post('create', 'TagController@create')->name('tag.create');

        // 编辑标签     http://192.168.164.134:1133/admin/tag/edit/1
        Route::get('edit/{id}', 'TagController@edit');
        Route::post('update', 'TagController@update')->name('tag.update');;

        // 删除标签     http://192.168.164.134:1133/admin/tag/delete/1
        Route::get('delete/{id}', 'TagController@delete');
    });



    //3 文章管理
    Route::prefix('article')->group(function () {
        // 文章列表     http://192.168.164.134:1133/admin/article/index
        Route::get('index', 'ArticleController@index')->name('article.index');

        // 显示发布文章页面     http://192.168.164.134:1133/admin/article/store
        Route::get('store', 'ArticleController@store');
        // 执行发布文章操作     http://192.168.164.134:1133/admin/article/create
        Route::post('create', 'ArticleController@create')->name('article.create');

        // 编辑文章     http://192.168.164.134:1133/admin/article/edit/1
        Route::get('edit/{id}', 'ArticleController@edit');
        Route::post('update', 'ArticleController@update')->name('article.update');
        // 上传图片     http://192.168.164.134:1133/admin/article/uploadArticleImage
        Route::post('uploadArticleImage', 'ArticleController@uploadArticleImage');
        // 删除文章     http://192.168.164.134:1133/admin/article/delete/3
        Route::get('delete/{id}', 'ArticleController@delete');
    });



    //5 网站配置管理
    Route::prefix('web')->group(function () {
        // 网站配置列表   http://192.168.164.134:1133/admin/web/index
        Route::get('index', 'WebConfigController@index')->name('webconfig.index');
        // 网站配置启动项视图
        Route::get('configView', 'WebConfigController@configView')->name('webconfig.configView');
        // 修改网站配置启动项
        Route::post('updateConfigView', 'WebConfigController@updateConfigview')->name('webconfig.updateConfigview');
        // 添加网站配置    http://192.168.164.134:1133/admin/web/store
        Route::get('store', 'WebConfigController@store');
        Route::post('create', 'WebConfigController@create')->name('webconfig.create');
        // 更新网站配置   http://192.168.164.134:1133/admin/web/edit/1
        Route::get('edit/{id}', 'WebConfigController@edit');
        Route::post('update', 'WebConfigController@update')->name('webconfig.update');
        // 删除网站配置   http://192.168.164.134:1133/admin/web/delete/1
        Route::get('delete/{id}', 'WebConfigController@delete');
    });



    //7 资源管理
    Route::prefix('resource')->group(function () {
        // 资源分类列表     http://192.168.164.134:1133/admin/resource/index
        Route::get('index', 'ResourceStockController@index')->name('resource.index');
        //显示添加资源分类页面 http://192.168.164.134:1133/admin/resource/store
        Route::get('store', 'ResourceStockController@store');
        // 添加资源分类     http://192.168.164.134:1133/admin/resource/create
        Route::post('create', 'ResourceStockController@create')->name('resource.create');

        // 显示编辑资源分类     http://192.168.164.134:1133/admin/resource/edit/1
        Route::get('edit/{id}', 'ResourceStockController@edie');
        // 编辑资源分类   http://192.168.164.134:1133/admin/resource/update
        Route::post('update', 'ResourceStockController@update')->name('resource.update');
        // 删除资源分类     http://192.168.164.134:1133/admin/resource/delete/1
        Route::get('delete/{id}', 'ResourceStockController@delete');
        // 检测资源分类地址        http://192.168.164.134:1133/admin/resource/isResource
        Route::get('isResource', 'ResourceStockController@isResource');
        //导入资源分类        http://192.168.164.134:1133/admin/resource/importResource
        Route::post('importResource', 'ResourceStockController@importResource')->name('resource.importResource');
        //导出资源分类        http://192.168.164.134:1133/admin/resource/exportResource
        Route::get('exportResource', 'ResourceStockController@exportResource');
    });



    //8 友情链接管理
    Route::prefix('friendshipLink')->group(function () {
        // 友情链接列表  http://192.168.164.134:1133/admin/friendshipLink/index
        Route::get('index', 'FriendshipLinkController@index')->name('friendshipLink.index');
        // 添加友情链接   http://192.168.164.134:1133/admin/friendshipLink/store
        Route::get('store', 'FriendshipLinkController@store');
        Route::post('create', 'FriendshipLinkController@create')->name('friendshipLink.create');
        // 编辑友情链接
        Route::get('edit/{id}', 'FriendshipLinkController@edit');
        Route::post('update', 'FriendshipLinkController@update')->name('friendshipLink.update');
        // 删除友情链接
        Route::get('delete/{id}', 'FriendshipLinkController@delete');
    });



    //9 权限管理
    Route::prefix('rule')->group(function () {
        // 权限列表  http://192.168.164.134:1133/admin/rule/index
        Route::get('index', 'AuthRuleController@index')->name('rule.index');
        // 添加权限 http://192.168.164.134:1133/admin/rule/store
        Route::get('store', 'AuthRuleController@store');
        Route::post('create', 'AuthRuleController@create')->name('rule.create');
        // 编辑权限 http://192.168.164.134:1133/admin/rule/edit/1
        Route::get('edit/{id}', 'AuthRuleController@edit');
        Route::post('update', 'AuthRuleController@update')->name('rule.update');
        // 删除权限 http://192.168.164.134:1133/admin/rule/delete/1
        Route::get('delete/{id}', 'AuthRuleController@delete');

    });



    //10 角色管理
    Route::prefix('group')->group(function () {
        // 权限列表  http://192.168.164.134:1133/admin/group/index
        Route::get('index', 'AuthGroupController@index')->name('group.index');
        // 添加权限 http://192.168.164.134:1133/admin/group/store
        Route::get('store', 'AuthGroupController@store');
        Route::post('create', 'AuthGroupController@create')->name('group.create');
        // 编辑权限 http://192.168.164.134:1133/admin/group/edit/1
        Route::get('edit/{id}', 'AuthGroupController@edit');
        Route::post('update', 'AuthGroupController@update')->name('group.update');
        // 删除权限 http://192.168.164.134:1133/admin/group/delete/1
        Route::get('delete/{id}', 'AuthGroupController@delete');

    });



});


?>
