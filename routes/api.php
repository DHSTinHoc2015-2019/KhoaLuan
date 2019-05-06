<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

/*=========Login-Resgister============*/
Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');
Route::get('showuser/{id}', 'UserController@showWithId');
Route::get('finduserwithemail/{email}', 'UserController@findEmailResetPassword');
Route::post('checktokenreset/{email}', 'UserController@checkResetPassword');
Route::post('changeforgetpassword', 'UserController@changeForgetPassword');
Route::get('checktoken/{email}/{token}', 'UserController@checkTokenPassword');
Route::get('active/{id}/{activation_code}', 'UserController@activateUser');
Route::get('demolike/{like}', 'DemoLikeController@index');

Route::get('/redirect/{social}', 'SocialAuthController@redirect');
Route::get('/callback/{social}', 'SocialAuthController@callback');

/*=========Homepage============*/
Route::get('listhometpack', 'HomeTpackController@index');
Route::get('/introduction','IntroductionController@index');

Route::group(['prefix'=>'news'], function(){
    Route::get('','NewsController@index');
	Route::get('paginate', 'NewsController@paginate');
	Route::get('showall','NewsController@showAll');
	Route::get('readmore/{id}','NewsController@show');
	Route::get('featured','NewsController@showFeatured');
});

Route::group(['prefix'=>'blog'], function(){
    Route::get('','BlogController@index');
	Route::get('paginate', 'BlogController@paginate');
	Route::get('readmore/{id}','BlogController@show');
	Route::get('new','BlogController@new');
	Route::get('bloghighlight','BlogController@bloghighlight');
	Route::get('mostview','BlogController@mostView');
	Route::get('{id}','BlogController@showWithId');
	Route::get('incrementview/{id}','BlogController@incrementView');
	//Chi tiết Blog với comment
	Route::get('user/{id}','BlogController@userBlogWithComment');
});


Route::get('/discussionwithtype/{id_discussion_type}/paginate', 'DiscussionController@paginate');
Route::get('/discussiontype','DiscussionTypeController@index');
Route::get('/discussion','DiscussionController@index');
Route::get('/discussion/incrementview/{id}','DiscussionController@incrementView');
Route::get('/newdiscussion','DiscussionController@newDiscussion');
//Lấy thảo luận biết đề tài thảo luận + id thảo luận
Route::get('/discussion/user/{id_type}/{id_discussion}','DiscussionController@userDiscussionWithType');

Route::get('/likediscussion/user/{id_discussion}','LikeDiscussionController@indexUser');

Route::get('/likeblog/user/{id}','LikeBlogController@indexUser');

Route::group(['prefix'=>'library/paginate'], function(){
    Route::get('image','LibraryController@imagePaginate');
	Route::get('video','LibraryController@videoPaginate');
	Route::get('document','LibraryController@documentPaginate');
});

Route::group(['prefix'=>'contact'], function(){
    Route::post('create','ContactController@create');
	Route::get('index','ContactController@index');
	Route::get('delete/{id}','ContactController@delete');
});

Route::get('/libraryimage', 'LibraryController@getDataLibraryImage');
Route::get('/libraryvideo', 'LibraryController@getDataLibraryVideo');
Route::get('/librarydocument', 'LibraryController@getDataLibraryDocument');

Route::get('/help','RuleController@index');

Route::group(['prefix'=>'usermanual'], function(){
   	Route::get('show/{id}', 'UserManualController@show');
});

Route::group(['prefix'=>'rule'], function(){
   	Route::get('show/{id}', 'RuleController@show');
   	Route::get('getlist', 'RuleController@getList');
});
Route::get('/demoemail', 'DemoEmailController@index');
Route::get('/demosendemail', 'DemoEmailController@sendEmail');

Route::get('/search/{keyword}', 'HomeController@search');

Route::get('/listhomeinfo', 'HomeController@listInfo');

Route::group(['middleware' => 'auth:api'], function(){
	Route::get('/homeadmin', 'HomeController@index');
	
	Route::group(['prefix'=>'hometpack'], function(){
	    Route::post('update/{id}', 'HomeTpackController@update');
		Route::post('create', 'HomeTpackController@create');
		Route::get('delete/{id}', 'HomeTpackController@delete');
		Route::get('{id}', 'HomeTpackController@show');
	});
	
	Route::group(['prefix'=>'news'], function(){
	    Route::get('edit/{id}','NewsController@showedit');
		Route::post('update/{id}','NewsController@update');
		Route::post('create','NewsController@create');
		Route::get('delete/{id}','NewsController@delete');
	});
	
	Route::group(['prefix'=>'blog'], function(){
	    Route::post('create','BlogController@create');
		Route::get('delete/{id}','BlogController@delete');
		Route::get('show/{id}','BlogController@show');
		Route::post('update/{id}','BlogController@update');
		Route::post('updateuser/{id}','BlogController@updateUser');
		//Lấy toàn bộ comment, commentdetai, blog với id_blog
		Route::get('showwithcomment/{id}','BlogController@showWithComment');
	});
	
	Route::group(['prefix'=>'discussiontype'], function(){
	    Route::post('create', 'DiscussionTypeController@create');
		Route::get('delete/{id}', 'DiscussionTypeController@delete');
		Route::get('show/{id}','DiscussionTypeController@show');
		Route::post('update/{id}','DiscussionTypeController@update');
	});

	Route::group(['prefix'=>'discussion'], function(){
	    Route::get('showall','DiscussionController@showAll');
		Route::post('create', 'DiscussionController@create');
		Route::get('delete/{id}', 'DiscussionController@delete');
		Route::get('show/{id}','DiscussionController@show');
		Route::get('showwithtype/{id}','DiscussionController@showWithType');
		Route::post('update/{id}','DiscussionController@update');
		//Lấy toàn bộ comment, commentdetai, dicussion với id_discussion
		Route::get('showwithcomment/{id}','DiscussionController@showWithComment');
	});

	Route::group(['prefix'=>'commentdiscussion'], function(){
	    Route::post('create', 'CommentDiscussionController@create');
		Route::get('delete/{id}','CommentDiscussionController@delete');
		Route::post('update','CommentDiscussionController@update');
	});

	Route::group(['prefix'=>'commentblog'], function(){
	    Route::post('create', 'CommentBlogController@create');
		Route::get('delete/{id}','CommentBlogController@delete');
		Route::post('update','CommentBlogController@update');
	});

	Route::group(['prefix'=>'likediscussion/admin'], function(){
	    Route::get('{id_user}/{id_discussion}','LikeDiscussionController@indexAdmin');
		Route::post('change','LikeDiscussionController@change');
	});

	Route::group(['prefix'=>'commentdetaildiscussion'], function(){
	    Route::post('create','CommentDetailDiscussionController@create');
		Route::post('update','CommentDetailDiscussionController@update');
		Route::get('delete/{id}','CommentDetailDiscussionController@delete');
	});

	Route::group(['prefix'=>'commentdetailblog'], function(){
	    Route::post('create','CommentDetailBlogController@create');
		Route::post('update','CommentDetailBlogController@update');
		Route::get('delete/{id}','CommentDetailBlogController@delete');
	});

	Route::group(['prefix'=>'likeblog/admin'], function(){
	    Route::get('{id_user}/{id_blog}','LikeBlogController@indexAdmin');
		Route::post('change','LikeBlogController@change');
	});


	Route::post('/introduction/update','IntroductionController@update');

	Route::post('/changepassword/{id}', 'UserController@changePassword');

	Route::group(['prefix'=>'library'], function(){
	   	Route::post('image/create', 'LibraryController@createImage');
		Route::post('video/create', 'LibraryController@createVideo');
		Route::post('document/create', 'LibraryController@createDocument');
		Route::get('show/{id}', 'LibraryController@showLibrary');
	});

	Route::group(['prefix'=>'libraryimage'], function(){
	   	Route::post('edit/{id}', 'LibraryController@updateLibraryImage');
		Route::get('delete/{id}', 'LibraryController@deleteLibraryImage');
	});

	Route::group(['prefix'=>'libraryvideo'], function(){
	   	Route::post('edit/{id}', 'LibraryController@updateLibraryVideo');
		Route::get('delete/{id}', 'LibraryController@deleteLibraryVideo');
	});

	Route::group(['prefix'=>'librarydocument'], function(){
	   	Route::post('edit/{id}', 'LibraryController@updateLibraryDocument');
		Route::get('delete/{id}', 'LibraryController@deleteLibraryDocument');
	});
	
	Route::group(['prefix'=>'users'], function(){
	   	Route::get('index', 'UserController@index');
		Route::post('create', 'UserController@create');
		Route::post('edit/{id}', 'UserController@edit');
		Route::get('showid/{id}', 'UserController@showid');
		Route::get('delete/{id}', 'UserController@delete');
	});

	Route::group(['prefix'=>'homes/edit'], function(){
	   	Route::post('headers', 'HomeController@editHeader');
		Route::post('contact', 'HomeController@editContact');
		Route::post('social', 'HomeController@editSocial');
		Route::post('linknodejs', 'HomeController@editLinkNodejs');
	});

	Route::group(['prefix'=>'links'], function(){
	   	Route::post('create', 'LinkController@create');
		Route::get('delete/{id}', 'LinkController@delete');
	});

	Route::group(['prefix'=>'rules'], function(){
	   	Route::post('create', 'RuleController@create');
	   	Route::post('update/{id}', 'RuleController@update');
	   	Route::get('show/{id}', 'RuleController@show');
		Route::get('delete/{id}', 'RuleController@delete');
	});

});

/*=========Demo============*/
Route::get('/userAll', 'UsersController@UsersAll');
Route::get('/userAll/edit/{id}', 'UsersController@getEdit');
Route::post('/userAll/update/{id}', 'UsersController@postUpdate');


Route::get('/demo1', 'UsersController@UsersAll1');