<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::group(['prefix' => 'backend'], function(){
	//Root
	Route::get('/', [
	'uses' 				=> 'BackendController@index',
	'as' 					=> 'backend.root',
	'middleware' 	=> 'roles',
	'roles'				=>['Superadmin']
	]);
	//Users
	Route::get('/users', [
	'uses' 				=> 'UsersController@viewUsers',
	'as' 					=> 'backend.users.view',
	'middleware' 	=> 'roles',
	'roles'				=>['Superadmin','Frontend']
	]);
	Route::get('/users/edit', [
	'uses' 				=> 'UsersController@editUsers',
	'as' 					=> 'backend.users.edit',
	'middleware' 	=> 'roles',
	'roles'				=>['Superadmin']
	]);
	Route::post('/users/update', [
	'uses' 				=> 'UsersController@updateUsers',
	'as' 					=> 'backend.users.update',
	'middleware' 	=> 'roles',
	'roles'				=>['Superadmin']
	]);
	//Notes
	Route::get('/notes', [
	'uses' 				=> 'NotesController@index',
	'as' 					=> 'backend.notes',
	'middleware' 	=> 'roles',
	'roles'				=>['Superadmin']
	]);
	Route::get('/notes/new', [
	'uses' 				=> 'NotesController@newNote',
	'as' 					=> 'backend.notes.new',
	'middleware' 	=> 'roles',
	'roles'				=>['Superadmin']
	]);
	Route::post('/notes', [
	'uses' 				=> 'NotesController@create',
	'as' 					=> 'backend.notes.create',
	'middleware' 	=> 'roles',
	'roles'				=>['Superadmin']
	]);
	//Categories
	Route::get('/categories', [
	'uses' 				=> 'CategoriesController@index',
	'as' 					=> 'backend.categories',
	'middleware' 	=> 'roles',
	'roles'				=>['Superadmin']
	]);
	Route::get('/categories/new', [
	'uses' 				=> 'CategoriesController@newcategory',
	'as' 					=> 'backend.categories.new',
	'middleware' 	=> 'roles',
	'roles'				=>['Superadmin']
	]);
	Route::post('/categories', [
	'uses' 				=> 'CategoriesController@create',
	'as' 					=> 'backend.categories.create',
	'middleware' 	=> 'roles',
	'roles'				=>['Superadmin']
	]);
	Route::get('/categories/edit/{id}', [
	'uses' 				=> 'CategoriesController@edit',
	'as' 					=> 'backend.categories.edit',
	'middleware' 	=> 'roles',
	'roles'				=>['Superadmin']
	]);
	Route::post('/categories/update', [
	'uses' 				=> 'CategoriesController@update',
	'as' 					=> 'backend.categories.update',
	'middleware' 	=> 'roles',
	'roles'				=>['Superadmin']
	]);
	Route::get('/categories/destroy/{id}', [
	'uses' 				=> 'CategoriesController@destroy',
	'as' 					=> 'backend.categories.destroy',
	'middleware' 	=> 'roles',
	'roles'				=>['Superadmin']
	]);

	//SubCategories
	Route::get('/subcategories', [
	'uses' 				=> 'SubcategoriesController@index',
	'as' 					=> 'backend.subcategories',
	'middleware' 	=> 'roles',
	'roles'				=>['Superadmin']
	]);
	Route::get('/subcategories/new', [
	'uses' 				=> 'SubcategoriesController@newsubcategory',
	'as' 					=> 'backend.subcategories.new',
	'middleware' 	=> 'roles',
	'roles'				=>['Superadmin']
	]);
	Route::post('/subcategories', [
	'uses' 				=> 'SubcategoriesController@create',
	'as' 					=> 'backend.subcategories.create',
	'middleware' 	=> 'roles',
	'roles'				=>['Superadmin']
	]);
	Route::get('/subcategories/edit/{id}', [
	'uses' 				=> 'SubcategoriesController@edit',
	'as' 					=> 'backend.subcategories.edit',
	'middleware' 	=> 'roles',
	'roles'				=>['Superadmin']
	]);
	Route::post('/subcategories/update', [
	'uses' 				=> 'SubcategoriesController@update',
	'as' 					=> 'backend.subcategories.update',
	'middleware' 	=> 'roles',
	'roles'				=>['Superadmin']
	]);
	Route::get('/subcategories/destroy/{id}', [
	'uses' 				=> 'SubcategoriesController@destroy',
	'as' 					=> 'backend.subcategories.destroy',
	'middleware' 	=> 'roles',
	'roles'				=>['Superadmin']
	]);

		//Products
	Route::get('/products', [
	'uses' 				=> 'ProductsController@index',
	'as' 					=> 'backend.products',
	'middleware' 	=> 'roles',
	'roles'				=>['Superadmin']
	]);
	Route::get('/products/new', [
	'uses' 				=> 'ProductsController@newProduct',
	'as' 					=> 'backend.products.new',
	'middleware' 	=> 'roles',
	'roles'				=>['Superadmin']
	]);
	Route::post('/products', [
	'uses' 				=> 'ProductsController@create',
	'as' 					=> 'backend.products.create',
	'middleware' 	=> 'roles',
	'roles'				=>['Superadmin']
	]);
	Route::get('/products/destroy/{id}', [
	'uses' 				=> 'ProductsController@destroy',
	'as' 					=> 'backend.products.destroy',
	'middleware' 	=> 'roles',
	'roles'				=>['Superadmin']
	]);
	Route::get('/products/edit/{id}', [
	'uses' 				=> 'ProductsController@edit',
	'as' 					=> 'backend.products.edit',
	'middleware' 	=> 'roles',
	'roles'				=>['Superadmin']
	]);
	Route::post('/products/update', [
	'uses' 				=> 'ProductsController@update',
	'as' 					=> 'backend.products.update',
	'middleware' 	=> 'roles',
	'roles'				=>['Superadmin']
	]);
	Route::get('/products/destroy/{id}', [
	'uses' 				=> 'ProductsController@destroy',
	'as' 					=> 'backend.products.destroy',
	'middleware' 	=> 'roles',
	'roles'				=>['Superadmin']
	]);
	Route::get('/products/images/{id}', [
	'uses' 				=> 'ProductsController@images',
	'as' 					=> 'backend.products.images',
	'middleware' 	=> 'roles',
	'roles'				=>['Superadmin']
	]);
	Route::post('/products/upload_image', [
	'uses' 				=> 'ProductsController@fileUpload',
	'as' 					=> 'backend.products.upload_image',
	'middleware' 	=> 'roles',
	'roles'				=>['Superadmin']
	]);
	Route::get('/images/destroy/{id}', [
	'uses' 				=> 'ImagesProductsController@destroy',
	'as' 					=> 'backend.images.destroy',
	'middleware' 	=> 'roles',
	'roles'				=>['Superadmin']
	]);

	//AJAX
	Route::get('/ajax/subcategories', [
	'uses' 				=> 'SubcategoriesController@ajax',
	'as' 					=> 'backend.subcategories.ajax',
	'middleware' 	=> 'roles',
	'roles'				=>['Superadmin']
	]);

});



#Route::get('/', function () { return view('home'); });

Route::get('/', 'HomeController@index')->name('home');

Route::get('/products', 'HomeController@products_list')->name('frontend.products');
Route::get('/product/{id}', 'HomeController@product_detail')->name('frontend.product_detail');
Route::get('/category/{id}', 'HomeController@by_category')->name('frontend.by_category');
Route::get('/outstandings', 'HomeController@outstandings')->name('frontend.outstandings');
Route::get('/subcategory/{id}', 'HomeController@by_subcategory')->name('frontend.by_subcategory');
Route::get('/cart', 'HomeController@cart')->name('frontend.cart');
Route::get('/contact', 'HomeController@contact')->name('frontend.contact');
Route::post('/cart', 'HomeController@cart');
Route::get('/checkout', 'HomeController@checkout')->name('frontend.checkout');

Route::post('/new_order', 'HomeController@process_new_order')->name('frontend.new_order');

Route::get('/payment_success/{operationid}', 'HomeController@payment_success')->name('payment_success');

Route::get('/payment_error/{operationid}', 'HomeController@payment_error')->name('payment_error');


