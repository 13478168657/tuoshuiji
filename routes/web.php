<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|{account}.xaxq365.com.cn scleanchina
*/
Route::group(['domain' => '{account}.tsj.com'], function () {
//    dd($_SERVER['REQUEST_URI']);
    Route::get('/', function ($account) {
//        dd($account);
        $home = new App\Http\Controllers\Home\HomeController();
        if($account == 'm'){
            return $home->hindex();
//            return view('h5.home.index');
        }else{
            return $home->index();
        }
    });
    Route::get('/en.html','Home\EnHomeController@index');
    Route::get('/en/thread-{id}.html','Home\EnHomeController@detail');
    Route::get('/index{id}.html', function ($account,$id) {

        $home = new App\Http\Controllers\Home\HomeController();
        if($account == 'm'){
            return $home->hlist($id);

        }else{
            return $home->lists($id);
        }
    });
    Route::get('en/index{id}.html', function ($account,$id) {

        $home = new App\Http\Controllers\Home\EnHomeController();
        if($account == 'm'){
            return $home->hlist($id);

        }else{
            return $home->lists($id);
        }
    });
    Route::get('/search.html', function ($account) {

        $home = new App\Http\Controllers\Home\HomeController();
        if($account == 'm'){
            return $home->hslist();
        }else{
            return $home->slists();
        }
    });
    Route::get('/thread-{id}.html', function ($account,$id) {
        $home = new App\Http\Controllers\Home\HomeController();
        if($account == 'm'){
            return $home->hdetail($id);
        }else{
            return $home->detail($id);
        }
    });
    Route::get('en/thread-{id}.html', function ($account,$id) {
        $home = new App\Http\Controllers\Home\EnHomeController();
        if($account == 'm'){
            return $home->hdetail($id);
        }else{
            return $home->detail($id);
        }
    });
    Route::get('single/{id}.html', function ($account,$id) {
        $home = new App\Http\Controllers\Consult\ConsultController();
        if($account == 'm'){
            return $home->index($id);
        }else{
            return $home->index($id);
        }
    });
    Route::get('en/single/{id}.html', function ($account,$id) {
        $home = new App\Http\Controllers\Consult\ConsultController();
        if($account == 'm'){
            return $home->eindex($id);
        }else{
            return $home->eIndex($id);
        }
    });
//    Route::get('single/{id}.html','Consult\ConsultController@index');
    Route::get('instruction','Instruction\InstructionController@index');
    Route::get('notice','Notice\NoticeController@index');
    Route::get('payment','Payment\PaymentController@index');
    Route::get('about','About\AboutController@index');
    Route::group(['middleware'=>['guest']],function() {


        Route::group(['namespace' => 'Admin'], function () {
            /*
             * 用户登录
             */
            Route::get('admini','Auth\LoginController@login');
            Route::post('auth/login','Auth\LoginController@postLogin');
            Route::get('logout','Auth\LoginController@logout');

            Route::get('/home', 'Home\HomeController@index');
            Route::get('manage/info', 'Article\ArticleController@index');
            Route::get('manage/add', 'Article\ArticleController@add');
            Route::post('manage/postCreate', 'Article\ArticleController@postCreate');
            Route::get('manage/edit', 'Article\ArticleController@edit');
            Route::post('manage/postEdit', 'Article\ArticleController@postEdit');
            Route::post('manage/del', 'Article\ArticleController@del');

            Route::post('article/upload', 'Article\ArticleController@upload');
            Route::post('article/editUpload', 'Article\ArticleController@editUpload');
            Route::get('position/list', 'Article\ClassifyController@index');
            Route::get('position/add', 'Article\ClassifyController@add');
            Route::post('position/postCreate', 'Article\ClassifyController@postCreate');
            Route::post('position/postEdit', 'Article\ClassifyController@postEdit');
            Route::get('position/edit', 'Article\ClassifyController@edit');
            Route::post('position/del', 'Article\ClassifyController@del');
            Route::get('user/list', 'User\UserController@index');
            Route::get('user/add', 'User\UserController@add');
            Route::get('user/edit', 'User\UserController@edit');
            Route::post('user/postEdit', 'User\UserController@postEdit');
            Route::post('user/del', 'User\UserController@del');
            Route::post('user/postCreate', 'User\UserController@postCreate');
            Route::get('permission/index', 'User\PermissionController@index');
            Route::get('permission/add', 'User\PermissionController@add');
            Route::post('permission/postCreate', 'User\PermissionController@postCreate');
            Route::post('permission/postEdit', 'User\PermissionController@postEdit');
            Route::get('permission/edit', 'User\PermissionController@edit');
            Route::get('perm/classify/index', 'User\PermissionClassifyController@index');
            Route::get('perm/classify/add', 'User\PermissionClassifyController@add');
            Route::post('perm/classify/postCreate', 'User\PermissionClassifyController@postCreate');
            Route::get('perm/classify/edit', 'User\PermissionClassifyController@edit');
            Route::post('perm/classify/postEdit', 'User\PermissionClassifyController@postEdit');
            Route::get('group/index', 'User\GroupController@index');
            Route::get('group/add', 'User\GroupController@add');
            Route::post('group/postCreate', 'User\GroupController@postCreate');
            Route::get('group/edit', 'User\GroupController@edit');
            Route::post('group/postEdit', 'User\GroupController@postEdit');
            Route::get('left/column/index', 'User\ActionColumnController@index');
            Route::get('left/column/add', 'User\ActionColumnController@add');
            Route::get('left/column/edit', 'User\ActionColumnController@edit');
            Route::post('left/column/postCreate', 'User\ActionColumnController@postCreate');
            Route::post('left/column/postEdit', 'User\ActionColumnController@postEdit');

            /*
             * 链接管理
             */
            Route::get('link/list', 'Link\LinkController@index');
            Route::get('link/create', 'Link\LinkController@create');
            Route::post('link/postCreate', 'Link\LinkController@postCreate');
            Route::get('link/edit', 'Link\LinkController@edit');
            Route::post('link/postEdit', 'Link\LinkController@postEdit');
            Route::post('link/del', 'Link\LinkController@delete');

            /*
             * 广告位管理
             */
            Route::get('adSpace/list', 'Ad\AdSpaceController@index');
            Route::get('adSpace/create', 'Ad\AdSpaceController@create');
            Route::post('adSpace/postCreate', 'Ad\AdSpaceController@postCreate');
            Route::get('adSpace/edit', 'Ad\AdSpaceController@edit');
            Route::post('adSpace/postEdit', 'Ad\AdSpaceController@postEdit');
            Route::post('adSpace/del', 'Ad\AdSpaceController@del');
            /*
             * 广告管理
             */
            Route::get('ad/list', 'Ad\AdController@index');
            Route::get('ad/create', 'Ad\AdController@create');
            Route::post('ad/postCreate', 'Ad\AdController@postCreate');
            Route::get('ad/edit', 'Ad\AdController@edit');
            Route::post('ad/postEdit', 'Ad\AdController@postEdit');
            Route::post('ad/del', 'Ad\AdController@delete');
            /*
             * 分类管理
             */
            Route::get('category/list', 'Category\CategoryController@index');
            Route::get('category/create', 'Category\CategoryController@create');
            Route::post('category/postCreate', 'Category\CategoryController@postCreate');
            Route::get('category/edit', 'Category\CategoryController@edit');
            Route::post('category/postEdit', 'Category\CategoryController@postEdit');
            Route::post('category/del', 'Category\CategoryController@del');

            /*
             * 联系我们
             */
            Route::get('consult/list', 'Article\SingleArticleController@index');
            Route::get('consult/create', 'Article\SingleArticleController@create');
            Route::post('consult/postCreate', 'Article\SingleArticleController@postCreate');
            Route::get('consult/edit', 'Article\SingleArticleController@edit');
            Route::post('consult/postEdit', 'Consult\ConsultController@postEdit');
            Route::post('consult/del', 'Article\SingleArticleController@del');
            /*
             *付款方式
             */
            Route::get('payment/list', 'Payment\PaymentController@index');
            Route::get('payment/create', 'Payment\PaymentController@create');
            Route::post('payment/postCreate', 'Payment\PaymentController@postCreate');
            Route::get('payment/edit', 'Payment\PaymentController@edit');
            Route::post('payment/postEdit', 'Payment\PaymentController@postEdit');
            Route::post('payment/del', 'Payment\PaymentController@del');
            /*
             *发货须知
             */
            Route::get('notice/list', 'Notice\NoticeController@index');
            Route::get('notice/create', 'Notice\NoticeController@create');
            Route::post('notice/postCreate', 'Notice\NoticeController@postCreate');
            Route::get('notice/edit', 'Notice\NoticeController@edit');
            Route::post('notice/postEdit', 'Notice\NoticeController@postEdit');
            Route::post('notice/del', 'Notice\NoticeController@del');

            /*
             *批发说明
             */
            Route::get('instruction/list', 'Instruction\InstructionController@index');
            Route::get('instruction/create', 'Instruction\InstructionController@create');
            Route::post('instruction/postCreate', 'Instruction\InstructionController@postCreate');
            Route::get('instruction/edit', 'Instruction\InstructionController@edit');
            Route::post('instruction/postEdit', 'Instruction\InstructionController@postEdit');
            Route::post('instruction/del', 'Instruction\InstructionController@del');

            /*
             * 关于我们
             */
            Route::get('about/list', 'About\AboutController@index');
            Route::get('about/create', 'About\AboutController@create');
            Route::post('about/postCreate', 'About\AboutController@postCreate');
            Route::get('about/edit', 'About\AboutController@edit');
            Route::post('about/postEdit', 'About\AboutController@postEdit');
            Route::post('about/del', 'About\AboutController@del');
            /*
             *葡萄商品管理
            */
            Route::get('goods/list', 'Good\GoodController@index');
            Route::get('goods/create', 'Good\GoodController@create');
            Route::post('goods/postCreate', 'Good\GoodController@postCreate');
            Route::get('goods/edit', 'Good\GoodController@edit');
            Route::post('goods/postEdit', 'Good\GoodController@postEdit');
            Route::post('goods/del', 'Good\GoodController@del');
            /*
             * 基本配置
             */
            Route::get('base/config', 'Base\BaseConfigController@index');
            Route::get('base/create', 'Base\BaseConfigController@create');
            Route::post('base/postCreate', 'Base\BaseConfigController@postCreate');
            Route::get('base/edit', 'Base\BaseConfigController@edit');
            Route::post('base/postEdit', 'Base\BaseConfigController@postEdit');
            Route::post('base/del', 'Base\BaseConfigController@del');

            Route::get('base/change','Base\BaseConfigController@change');
            Route::post('base/model/change','Base\BaseConfigController@modelChange');
        });
    });

});
