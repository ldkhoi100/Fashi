<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home', 'HomeController@index');

//Change password
Route::resource('/details', 'ChangePasswordController');
Route::get('/password', 'ChangePasswordController@index')->name('password');
Route::get('/user/account/profile', 'ChangePasswordController@edit')->name('details');
Route::post('/user/changaddress', 'ChangePasswordController@postChangeAddress')->name('change_address');


//Change email
Route::get('/user/account/email/', 'ChangePasswordController@getEmailVerify')->name('email');
Route::post('/user/account/email/', 'ChangePasswordController@postEmailVerify')->name('verifyemail');

//Change phone
Route::get('/user/account/phone/', 'ChangePasswordController@getUpdatePhone')->name('phoneNumber');
Route::post('/user/account/phone/', 'ChangePasswordController@postUpdatePhone')->name('verifyPhone');

//Logout
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

//Change language
Route::group(['middleware' => 'locale'], function () {
    Route::get('change-language/{language}', 'HomeController@changeLanguage')
        ->name('user.change-language');
});

Auth::routes();

//Users
Route::resource('/users', 'UserControllers');

//Fashion layouts
Route::get('/', 'FashionControllers@home')->name('home');
Route::get('/products', 'FashionControllers@product')->name('product');
Route::get('/shop', 'FashionControllers@shop')->name('shop');
Route::get('/shoppingcart', 'FashionControllers@shoppingcart')->name('shoppingcart');
Route::get('/contact', 'FashionControllers@contact')->name('contact');
Route::get('/faq', 'FashionControllers@faq')->name('faq');

//Blogs
Route::get('/blog', 'FashionControllers@blog')->name('blog');
Route::get('/blog/categories/{id}', 'FashionControllers@getCategoriesBlog')->name('categories.blog');
Route::get('/blog/detail/{id}', 'FashionControllers@blogdetail')->name('blogdetail');

//Comment blogs
// Route::post('/comments', 'FashionControllers@comments')->name('comments');

//Review post products
Route::post('/reviews', 'FashionControllers@reviews')->name('reviews');

//Ajax load more data button for database detail blogs
Route::post('/loadingmore/load_data/{id}', 'AjaxBlogsController@load_data_product')->name('loadingmore.load_data');

//Men product
Route::get('/shop/men', 'FashionControllers@men')->name('men');
Route::get('/shop/women', 'FashionControllers@women')->name('women');
Route::get('/shop/kid', 'FashionControllers@kid')->name('kid');

Route::get('/shop/men/{id}', 'FashionControllers@getProductMen')->name('getProductMen');
Route::get('/shop/women/{id}', 'FashionControllers@getProductWomen')->name('getProductWomen');
Route::get('/shop/kid/{id}', 'FashionControllers@getProductKid')->name('getProductKid');
//Ajax load more data button for database detail product
Route::post('/loadmore/load_data/{id}', 'AjaxProductController@load_data_product')->name('loadmore.load_data');

//Detail products
Route::get('/shop/detail/{id}', 'FashionControllers@getDetailProduct')->name('getDetailProductMen');


//Cart
Route::resource('/cart', 'CartController');
Route::get('/addCart/{id}', 'CartController@addCart')->name('addCart');
Route::post('/addCart/{id}', 'CartController@addCart')->name('addCartPost');
Route::get('/deleteCart/{id}', 'CartController@deleteCart')->name('deleteCart');
Route::post('/addCart/{id}', 'CartController@addCart')->name('addCartPost');
Route::post('/checkout', 'CartController@formCheckout')->name('formCheckout');

//Admin manager
Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
Route::get('/errors', 'AdminController@error404')->name('error404');
Route::get('/blank', 'AdminController@blank')->name('blank');
Route::get('/button', 'AdminController@button')->name('button');
Route::get('/card', 'AdminController@card')->name('card');
Route::get('/chart', 'AdminController@chart')->name('chart');
Route::get('/table', 'AdminController@table')->name('table');
Route::get('/forgot-password', 'AdminController@forgotpassword')->name('forgotpassword');
Route::get('/loginadmin', 'AdminController@loginadmin')->name('loginadmin');
Route::get('/signup', 'AdminController@register')->name('signup');
Route::get('/animation', 'AdminController@animation')->name('animation');
Route::get('/border', 'AdminController@border')->name('border');
Route::get('/color', 'AdminController@color')->name('color');
Route::get('/orther', 'AdminController@orther')->name('orther');

//Product
Route::resource('/product', 'ProductsController');
Route::get('/trash-product', 'ProductsController@trashed')->name('product.trash');
Route::get('/product/{id}/restore', 'ProductsController@restore')->name('product.restore');
Route::get('/product-restore-all', 'ProductsController@restoreAll')->name('product.restore-all');
Route::get('/product/{id}/delete', 'ProductsController@delete')->name('product.delete');
Route::get('/product-delete-all', 'ProductsController@deleteAll')->name('product.delete-all');
Route::get('/highlight/{id}', 'ProductsController@highlights')->name('product.highlights');
Route::get('/new/{id}', 'ProductsController@news')->name('product.new');

//Bills
Route::resource('/bills', 'BillsController');
Route::get('/trash-bills', 'BillsController@trashed')->name('bills.trash');
Route::get('/bills/{id}/restore', 'BillsController@restore')->name('bills.restore');
Route::get('/bills-restore-all', 'BillsController@restoreAll')->name('bills.restore-all');
Route::get('/bills/{id}/delete', 'BillsController@delete')->name('bills.delete');
Route::get('/bills-delete-all', 'BillsController@deleteAll')->name('bills.delete-all');
Route::get('/bills/paymoney/{id}', 'BillsController@pay_money')->name('bills.pay_money');
Route::get('/bills/status/{id}', 'BillsController@status')->name('bills.status');
Route::get('/bills/detail/status/{id}', 'BillsController@statusDetailBills')->name('bills.statusDetailBills');
Route::get('/bills/detail/{id}', 'BillsController@detailBills')->name('bills.details');

//Bill detail
Route::resource('/billDetail', 'BillDetailController');
Route::get('/trash/billDetail/{id}', 'BillDetailController@trashed')->name('billDetail.trash');

//Reviews Products table
Route::resource('/reivew', 'ReviewsController');

//Categories products
Route::resource('/categories', 'CategoriesController');
Route::get('/trash-categories', 'CategoriesController@trashed')->name('categories.trash');
Route::get('/categories/{id}/restore', 'CategoriesController@restore')->name('categories.restore');
Route::get('/categories-restore-all', 'CategoriesController@restoreAll')->name('categories.restore-all');
Route::get('/categories/{id}/delete', 'CategoriesController@delete')->name('categories.delete');
Route::get('/categories-delete-all', 'CategoriesController@deleteAll')->name('categories.delete-all');

//Blogs
Route::resource('/blogs', 'BlogsController');
Route::get('/trash-blogs', 'BlogsController@trashed')->name('blogs.trash');
Route::get('/blogs/{id}/restore', 'BlogsController@restore')->name('blogs.restore');
Route::get('/blogs-restore-all', 'BlogsController@restoreAll')->name('blogs.restore-all');
Route::get('/blogs/{id}/delete', 'BlogsController@delete')->name('blogs.delete');
Route::get('/blogs-delete-all', 'BlogsController@deleteAll')->name('blogs.delete-all');

// Comment blogs
Route::resource('/comment', 'BlogCommentsController');

//Categories blogs
Route::resource('/categories-blogs', 'BlogCategoriesController');
Route::get('/trash-categories-blogs', 'BlogCategoriesController@trashed')->name('categories-blogs.trash');
Route::get('/categories-blogs/{id}/restore', 'BlogCategoriesController@restore')->name('categories-blogs.restore');
Route::get('/categories-blogs-restore-all', 'BlogCategoriesController@restoreAll')->name('categories-blogs.restore-all');
Route::get('/categories-blogs/{id}/delete', 'BlogCategoriesController@delete')->name('categories-blogs.delete');
Route::get('/categories-blogs-delete-all', 'BlogCategoriesController@deleteAll')->name('categories-blogs.delete-all');

//Slide on home page
Route::resource('/slide', 'SlideController');
Route::get('/trash-slide', 'SlideController@trashed')->name('slide.trash');
Route::get('/slide/{id}/restore', 'SlideController@restore')->name('slide.restore');
Route::get('/slide-restore-all', 'SlideController@restoreAll')->name('slide.restore-all');
Route::get('/slide/{id}/delete', 'SlideController@delete')->name('slide.delete');
Route::get('/slide-delete-all', 'SlideController@deleteAll')->name('slide.delete-all');

//Banner home page
Route::resource('/banner', 'BannerController');
Route::get('/trash-banner', 'BannerController@trashed')->name('banner.trash');
Route::get('/banner/{id}/restore', 'BannerController@restore')->name('banner.restore');
Route::get('/banner-restore-all', 'BannerController@restoreAll')->name('banner.restore-all');
Route::get('/banner/{id}/delete', 'BannerController@delete')->name('banner.delete');
Route::get('/banner-delete-all', 'BannerController@deleteAll')->name('banner.delete-all');

//Large image home page
Route::resource('/large', 'ImageLargepProductsController');
Route::get('/trash-large', 'ImageLargepProductsController@trashed')->name('large.trash');
Route::get('/large/{id}/restore', 'ImageLargepProductsController@restore')->name('large.restore');
Route::get('/large-restore-all', 'ImageLargepProductsController@restoreAll')->name('large.restore-all');
Route::get('/large/{id}/delete', 'ImageLargepProductsController@delete')->name('large.delete');
Route::get('/large-delete-all', 'ImageLargepProductsController@deleteAll')->name('large.delete-all');

//Instagram home page
Route::resource('/instagram', 'InstagramsController');
Route::get('/trash-instagram', 'InstagramsController@trashed')->name('instagram.trash');
Route::get('/instagram/{id}/restore', 'InstagramsController@restore')->name('instagram.restore');
Route::get('/instagram-restore-all', 'InstagramsController@restoreAll')->name('instagram.restore-all');
Route::get('/instagram/{id}/delete', 'InstagramsController@delete')->name('instagram.delete');
Route::get('/instagram-delete-all', 'InstagramsController@deleteAll')->name('instagram.delete-all');