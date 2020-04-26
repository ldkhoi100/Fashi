<?php

use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);
// Auth::routes();

//Log in with google and facebook account
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');

//Reset password
Route::post('reset-password', 'ResetPasswordController@sendMail');
Route::put('reset-password/{token}', 'ResetPasswordController@reset')->name('reset.password');

//Change password
Route::resource('/details', 'ChangePasswordController');
Route::get('/user/account/profile', 'ChangePasswordController@edit')->name('details');
Route::get('/password', 'ChangePasswordController@index')->name('password');
Route::post('/user/changaddress', 'ChangePasswordController@postChangeAddress')->name('change_address');

//Change email
Route::get('/user/account/email/', 'ChangePasswordController@getEmailVerify')->name('email')->middleware('password.confirm');
Route::post('/user/account/email/', 'ChangePasswordController@postEmailVerify')->name('verifyemail');

//Change phone
Route::get('/user/account/phone/', 'ChangePasswordController@getUpdatePhone')->name('phoneNumber')->middleware('password.confirm');
Route::post('/user/account/phone/', 'ChangePasswordController@postUpdatePhone')->name('verifyPhone');

//Logout
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

//Change language
Route::group(['middleware' => 'locale'], function () {
    Route::get('change-language/{language}', 'HomeController@changeLanguage')
        ->name('user.change-language');
});

//Users
Route::resource('/users', 'UserControllers');
Route::get('block/users/{id}', 'UserControllers@block')->name('users.block');

//Fashion layouts
Route::get('/', 'FashionControllers@home')->name('home');
Route::get('/products', 'FashionControllers@product')->name('product');
Route::get('/shop', 'FashionControllers@shop')->name('shop');
Route::get('/contact', 'FashionControllers@contact')->name('contact');
Route::get('/faq', 'FashionControllers@faq')->name('faq');
Route::post('/subscribe', 'FashionControllers@subscribe')->name('subscribe.post');
Route::post('/contact', 'FashionControllers@contactPost')->name('contact.post');

//Your order
Route::get('/user/purchase', 'FashionControllers@your_order')->name('your.order');

//Cancle order
Route::get('/order/cancle/{id}', 'FashionControllers@cancleOrder')->name('cancle.order');

//Find bill in page your order
Route::get('/bills/search/{id}', 'FashionControllers@find_bill')->name('find.bills');

//Blogs
Route::get('/blog', 'FashionControllers@blog')->name('blog');
Route::get('/blog/search', 'FashionControllers@blog')->name('blog.search');
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

//Detail products
Route::get('/shop/detail/{slug}', 'FashionControllers@getDetailProduct')->name('getDetailProductMen');
//Ajax load more data button for database detail product
Route::post('/loadmore/load_data/{id}', 'AjaxProductController@load_data_product')->name('loadmore.load_data');
//Search products
Route::get('/search', 'FashionControllers@shop')->name('shop.search');

//Sort
Route::get('/shop/sort/low&to&high', 'SortFashionController@shopSortLowToHigh')->name('shopSortLowToHigh');
Route::get('/shop/sort/high&to&low', 'SortFashionController@shopSortHighToLow')->name('shopSortHighToLow');
Route::get('/shop/sort/price', 'SortFashionController@shopSortPrice')->name('shopSortPrice');
Route::get('/men/sort/low&to&high', 'SortFashionController@menSortLowToHigh')->name('menSortLowToHigh');
Route::get('/men/sort/high&to&low', 'SortFashionController@menSortHighToLow')->name('menSortHighToLow');
Route::get('/men/sort/price', 'SortFashionController@menSortPrice')->name('menSortPrice');
Route::get('/women/sort/low&to&high', 'SortFashionController@womenSortLowToHigh')->name('womenSortLowToHigh');
Route::get('/women/sort/high&to&low', 'SortFashionController@womenSortHighToLow')->name('womenSortHighToLow');
Route::get('/women/sort/price', 'SortFashionController@womenSortPrice')->name('womenSortPrice');
Route::get('/kid/sort/low&to&high', 'SortFashionController@kidSortLowToHigh')->name('kidSortLowToHigh');
Route::get('/kid/sort/high&to&low', 'SortFashionController@kidSortHighToLow')->name('kidSortHighToLow');
Route::get('/kid/sort/price', 'SortFashionController@kidSortPrice')->name('kidSortPrice');

//Cart
Route::resource('/cart', 'CartController');
Route::post('/cart', 'CartController@store')->name('cart.store')->middleware('verified');
Route::get('/addCart/{id}', 'CartController@addCart')->name('addCart');
Route::get('/saveCart/{id}/{quantity}', 'CartController@saveListItemCart')->name('saveListItemCart');
Route::get('/addCart/{id}/{qty}/{check}/{size}', 'CartController@addCartPost')->name('addCartPost');
Route::get('/deleteCart/{id}', 'CartController@deleteCart')->name('deleteCart');
Route::get('/updatedeleteCart', 'CartController@updatedeleteCart')->name('updatedeleteCart');
Route::get('/deleteListCart/{id}', 'CartController@deleteListCart')->name('deleteListCart');
Route::get('/updateDeleteListCart', 'CartController@updateDeleteListCart')->name('updateDeleteListCart');
// Route::post('/addCart/{id}', 'CartController@addCart')->name('addCartPost');
Route::post('/checkout', 'CartController@formCheckout')->name('formCheckout');

//Wish List
// Route::get('/wishList', 'WishListController@wishList')->name('wishList');
// Route::get('/addWishList/{id}', 'WishListController@addWishList')->name('addWishList');

//Coupons apply
Route::get('/coupons/apply/{code}', 'CartController@coupons')->name('coupons');

//Admin manager
Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
Route::get('/errors', 'AdminController@error404')->name('error404');

Route::get('/notifications', 'AdminController@your_notifications')->name('notifications');
Route::get('/mark/read/{id}', 'AdminController@mark_read')->name('mark.read');
Route::get('/mark/all/read', 'AdminController@mark_all_read')->name('mark.all.read');
Route::get('/mark/unread/{id}', 'AdminController@mark_unread')->name('mark.unread');
Route::get('/delete/notifications/{id}', 'AdminController@delete_notifications')->name('delete.notifications');

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

//Alert message
Route::get('/bills/read/{id}', 'AdminController@bills_read')->name('bills.read');
Route::get('/shop/details/{id}', 'AdminController@reviews_read')->name('reviews.read');

//Dashboard warehouse add quantity
Route::get('/add/quantity/{id}/{quantity}', 'AdminController@addQuantity')->name('add.quantity');

//Product
Route::resource('/product', 'ProductsController');
Route::get('/product/destroy/{id}', 'ProductsController@destroy');
Route::get('/trash-product', 'ProductsController@trashed')->name('product.trash');
Route::get('/product/restore/{id}', 'ProductsController@restore')->name('product.restore');
Route::get('/product-restore-all', 'ProductsController@restoreAll')->name('product.restore-all');
Route::get('/product/delete/{id}', 'ProductsController@delete')->name('product.delete');
Route::get('/product-delete-all', 'ProductsController@deleteAll')->name('product.delete-all');
Route::get('/highlight/{id}', 'ProductsController@highlights')->name('product.highlights');
Route::get('/highlight/trash/{id}', 'ProductsController@highlightsTrash')->name('product.highlightsTrash');
Route::get('/new/{id}', 'ProductsController@news')->name('product.new');
Route::get('/new/trash/{id}', 'ProductsController@newsTrash')->name('product.newTrash');
Route::get('/bill/product/{id}', 'ProductsController@qtySizeGet')->name('product.qtySizeGet');
Route::post('/bill/product/{id}', 'ProductsController@qtySizePost')->name('product.qtySizePost');

//Bills
Route::resource('/bills', 'BillsController');
Route::get('/bills/delete/{id}', 'BillsController@destroy');
Route::get('/trash-bills', 'BillsController@trashed')->name('bills.trash');
Route::get('/bills-restore-all', 'BillsController@restoreAll')->name('bills.restore-all');
Route::get('/bills/destroy/{id}', 'BillsController@delete')->name('bills.delete');
Route::get('/bills/restore/{id}', 'BillsController@restore')->name('bills.restore');
Route::get('/bills-delete-all', 'BillsController@deleteAll')->name('bills.delete-all');
Route::get('/bills/paymoney/{id}', 'BillsController@pay_money')->name('bills.pay_money');
Route::get('/bills/paymoney/trash/{id}', 'BillsController@pay_money_trash')->name('bills.pay_money.trash');
Route::get('/bills/status/{id}', 'BillsController@status')->name('bills.status');
Route::get('/bills/status/trash/{id}', 'BillsController@status_trash')->name('bills.status.trash');
Route::get('/bills/detail/status/{id}', 'BillsController@statusDetailBills')->name('bills.statusDetailBills');
Route::get('/bills/detail/status/trash/{id}', 'BillsController@statusDetailBillsTrash')->name('bills.statusDetailBills.trash');
Route::get('/bills/detail/{id}', 'BillsController@detailBills')->name('bills.details');

//Bill detail
Route::resource('/billDetail', 'BillDetailController');
Route::get('/billDetail/destroy/{id}', 'BillDetailController@destroy');
Route::get('/trash/billDetail/{id}', 'BillDetailController@trashed')->name('billDetail.trash');
Route::get('/billDetail/restore/{id}', 'BillDetailController@restore')->name('billDetail.restore');
Route::get('/billDetail-restore-all', 'BillDetailController@restoreAll')->name('billDetail.restore-all');
Route::get('/billDetail/delete/{id}', 'BillDetailController@delete')->name('billDetail.delete');
Route::get('/billDetail-delete-all', 'BillDetailController@deleteAll')->name('billDetail.delete-all');

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
// Route::resource('/comment', 'BlogCommentsController');
Route::get('/comment/{id}', 'BlogCommentsController@show')->name('comment.show');
Route::get('/comment/delete/{id}', 'BlogCommentsController@destroy')->name('comment.destroy');

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

// Customers
Route::resource('/customers', 'CustomersController');
Route::get('/trash-customers', 'CustomersController@trashed')->name('customers.trash');
Route::get('/customers/{id}/restore', 'CustomersController@restore')->name('customers.restore');
Route::get('/customers-restore-all', 'CustomersController@restoreAll')->name('customers.restore-all');
Route::get('/customers/{id}/delete', 'CustomersController@delete')->name('customers.delete');
Route::get('/customers-delete-all', 'CustomersController@deleteAll')->name('customers.delete-all');
Route::get('/active-customers/{id}', 'CustomersController@active')->name('customers.active');

//Contact managerment
Route::resource('contacts', 'ContactController');
Route::post('/reply-contacts/{id}', 'ContactController@update')->name('contacts.reply.post');
Route::get('/trash-contacts', 'ContactController@trashed')->name('contacts.trash');
Route::get('/contacts/{id}/restore', 'ContactController@restore')->name('contacts.restore');
Route::get('/contacts-restore-all', 'ContactController@restoreAll')->name('contacts.restore-all');
Route::get('/contacts/{id}/delete', 'ContactController@delete')->name('contacts.delete');
Route::get('/contacts-delete-all', 'ContactController@deleteAll')->name('contacts.delete-all');

//Coupons
Route::resource('/coupons', 'CouponsController');
Route::get('/create-coupons/{number}/{percent}', 'CouponsController@store')->name('coupons.store');
Route::get('/trash-coupons', 'CouponsController@trashed')->name('coupons.trash');
Route::get('/coupons/{id}/restore', 'CouponsController@restore')->name('coupons.restore');
Route::get('/coupons-restore-all', 'CouponsController@restoreAll')->name('coupons.restore-all');
Route::get('/coupons/{id}/delete', 'CouponsController@delete')->name('coupons.delete');
Route::get('/coupons-delete-all', 'CouponsController@deleteAll')->name('coupons.delete-all');
Route::get('/used-coupons/{id}', 'CouponsController@used')->name('coupons.used');
Route::get('/used-coupons-trash/{id}', 'CouponsController@usedTrash')->name('coupons.usedTrash');

//User management
Route::resource('/users', 'UserControllers');

//Messenger admin dashboard
Route::resource('/messenger', 'MessengeUserController');
Route::get('/mailbox', 'MessengeUserController@inbox')->name('mailbox');
Route::get('/mailbox/sent', 'MessengeUserController@message_sent')->name('message.sent');
Route::get('/message/remove/{id}', 'MessengeUserController@remove_message')->name('remove.message');
Route::get('/mark/message/read/{id}', 'MessengeUserController@mark_read')->name('mark.read.mailbox');
Route::get('/mark/message/all/read', 'MessengeUserController@mark_all_read')->name('mark.all.read.mailbox');
Route::get('/mark/message/unread/{id}', 'MessengeUserController@mark_unread')->name('mark.unread.mailbox');
Route::get('/delete/message/{id}', 'MessengeUserController@delete_message')->name('delete.message.mailbox');
Route::post('/reply', 'MessengeUserController@reply')->name('reply.message');

//Ajax check
Route::post('/checkemail', 'CheckAjaxController@checkEmail');
Route::post('/checkusername', 'CheckAjaxController@checkUsername');
Route::post('/checkname', 'CheckAjaxController@checkFullname');
Route::post('/checkaddress', 'CheckAjaxController@checkAddress');
Route::post('/checkphone', 'CheckAjaxController@checkPhone');
Route::post('/checkpassword', 'CheckAjaxController@checkPassword');
Route::post('/passwordconfirm', 'CheckAjaxController@checkOldPassword');
Route::post('/loginusername', 'CheckAjaxController@loginUsername');