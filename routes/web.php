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

//  Route::get('/welcome', function () {
//      return view('welcome',compact("compuagenda","compuagenda"));
//  });
Route::post('myregister', 'Web\RegisterController@register')->name("myregister");

	Auth::routes();
	Route::get('/', 'Web\PageController@index');
	Route::post('/search', 'Web\PageController@search')->name("search");
	Route::get('/resregister', 'Web\RegisterController@result');
	Route::get('/registerform', 'Web\PageController@register')->name("registerform");
	Route::any('/sugerencias', 'Web\PageController@sugerencias')->name("sugerencias");
	
	
	Route::get('categoria/{slug}','Web\PageController@category')->name('category');
	Route::get('etiqueta/{slug}','Web\PageController@subcategory')->name('tag');
	Route::get('contact/{slug}','Web\PageController@contact')->name('contact');/*entradaslug es lo que se mostrar� en la url con post lo llamo desde otra pagina*/
	Route::post('/comboboxcat-subcat','Web\AjaxController@catsubcat');
	Route::post('admin/ca_contactos_subcategorias/comboboxcat-subcat','Web\AjaxController@catsubcat');
	Route::post('admin/ca_contactos_subcategorias/editsubcategory','AdminCaContactosSubcategoriasController@addsubcat');
	//Route::post('/categoriasp','CategoryController@store');
	Route::resource('comments', 'Web\ComentarioController');
