<?php
/* Store Controller
------------------*/
Route::get('/', 'StoreController@StoreAction');
Route::get('Runningshoes', 'StoreController@StoreAction');
Route::get('Runningshoes.se/{createsubje}', 'StoreController@sublink');
Route::get('/Blogg', 'StoreController@BloggView');

Route::get('Terms-Condition', 'StoreController@Terms_ConditionView');
Route::get('/about-us', 'StoreController@aboutUsView');


Route::get('contact-us', 'StoreController@contactUsView');
Route::get('contact-us/email', 'StoreController@sendEmail');
Route::post('contact-us/email', 'StoreController@sendEmail');

/* Categories & Brands
---------------------*/
Route::get('cat&{id}', 'StoreController@cat');
Route::get('Brand&{id}', 'StoreController@brand');


/* Products Controller
------------------*/

Route::get('Products&{order}', 'ProductsController@ProductsAction');
Route::get('Products/{pid}', 'ProductsController@ProductsPage');
Route::post('Products', 'ProductsController@ProductsAction');
Route::post('Search', 'ProductsController@Search');
Route::get('Shoes', 'ProductsController@ShoesView');


/* User Controller
-----------------*/	
Route::get('Login', 'UserController@showLogIn');
Route::post('Login', 'UserController@showLogIn');
Route::post('makelogin', 'UserController@makeLogin');
Route::get('Logout', 'UserController@logout');
Route::post('reguser', 'UserController@reguser');
Route::get('Account', 'UserController@AccountView');
Route::post('updateAcc', 'UserController@updateAcc');



/* Left Bar
----------*/
Route::get('header', 'GlobalController@header');



/* Cart
-------*/
Route::get('Shoppingcart', 'StoreController@CartView');
Route::post('Shoppingcart/addCart', 'StoreController@addCart');
Route::get('Shoppingcart/removeCartspro', 'StoreController@removeCartspro');

/* Wishlist
----------*/
Route::get('Wishlist-{username}', 'StoreController@WishlistView');


/* PAYMENT
---------*/
Route::get('paypal_success', 'PaymentController@paypal_success');
Route::get('paypal_cancel', 'PaymentController@paypal_cancel');


/* Forum
-------*/
Route::get('Forum', 'SubjectsController@ForumView');
Route::get('Forum/{id}', 'SubjectsController@showSubjectsID');
Route::get('Forum/create/Subjects', 'SubjectsController@createSubjectView');
Route::post('create/subject', 'SubjectsController@createSubject');
Route::get('Forum/Games/{id}', 'SubjectsController@postSubjectid');
Route::post('reply', 'SubjectsController@reply');

Route::get('Forum/Games/reply/{id}', 'SubjectsController@replyView');
Route::post('Forum/Games/reply/{id}', 'SubjectsController@replyView');

Route::post('Forum/reply/createReply', 'SubjectsController@createreply');
Route::get('/Aktuella-Subjects', 'SubjectsController@Aktuella_Subjects');
Route::get('Forum/Name/{Username}', 'SubjectsController@forumUserView');


/* Render Var On all Views */

View::composer('Runningshoes.includes.header', 'App\Composers\HeaderComposer');
View::composer('Runningshoes.includes.head', 'App\Composers\HeaderComposer');
View::composer('Runningshoes.includes.aside', 'App\Composers\AsideComposer');


//Route::get('payment', 'PaymentController@store');
//resource('payment', 'PaymentController');











use App\Models\testmongodb;
/* Test File
-----------*/

Route::get('P', 'TestController@TestAction');
Route::get('/mongodb', function () {
    phpinfo();
    /*$user = testmongodb::all();
    print_r($user);*/
});




/*------ ------ ------ ------ ------- ------- ------*/

/* Default Laravel install
.........................s*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/

