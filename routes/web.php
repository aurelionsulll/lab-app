<?php
header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header("Access-Control-Allow-Origin: *");

//User
//home
Route::get('/','HomepageController@indexu');
//info
Route::get('/info','InfopageController@indexu');
//about
Route::get('/about','AboutpageController@indexu');
//Route::get('/about_more/{id}','AboutpageController@more');
//service => gde
Route::get('/service','GdeController@indexu');
//contact
Route::get('/contact','ContactController@indexu');

//############################################################################################################

//Admin
//dashboard
Route::get('/cp_admin','HomepageController@cpadmin');
Route::get('showDahboardApp','HomepageController@showDahboardApp');
Route::get('showcontacts','ContactController@showcontacts');

//Home
Route::get('/homepage','HomepageController@index');
Route::get('show','HomepageController@show');
Route::post('upl','HomepageController@upl');
Route::post('upd/{id}','HomepageController@upd');
Route::post('/formSubmit','HomepageController@upload');
Route::delete('/deleteSlider/{id}','HomepageController@deleteSlider');

//Appointment
Route::get('/adminAppointment','HomepageController@indexa');
Route::post('/makeAppointment','HomepageController@makeAppointment');
Route::delete('/deleteSlidera/{id}','HomepageController@deleteSlidera');
Route::get('showa','HomepageController@showa');
Route::post('/uplapp/{id}','HomepageController@uplapp');

//About
Route::get('/aboutpage','AboutpageController@index');
Route::get('about_show','AboutpageController@show');
Route::post('about_upl','AboutpageController@upl');
Route::post('about_upd/{id}','AboutpageController@upd');
Route::post('/about_formSubmit','AboutpageController@upload');
Route::delete('/about_deleteSlider/{id}','AboutpageController@deleteSlider');

//Activs
Route::get('abouts_show','AboutpageController@shows');
Route::post('abouts_upl','AboutpageController@upls');
Route::post('abouts_upd/{id}','AboutpageController@upds');
Route::post('/abouts_formSubmit','AboutpageController@uploads');
Route::delete('/abouts_deleteSlider/{id}','AboutpageController@deleteSliders');

//Gde
Route::get('/gde','GdeController@index');
Route::get('gde_show','GdeController@show');
Route::post('gde_upl','GdeController@upl');
Route::post('gde_upd/{id}','GdeController@upd');
Route::post('/gde_formSubmit','GdeController@upload');
Route::delete('/gde_deleteSlider/{id}','GdeController@deleteSlider');
Route::get('gdesearch','GdeController@gdesearch');

//info
Route::get('/infopage','InfopageController@index');
Route::get('info_show','InfopageController@shows');
Route::post('info_upl','InfopageController@upls');
Route::post('info_upd/{id}','InfopageController@upds');
Route::post('/info_formSubmit','InfopageController@uploads');
Route::delete('/info_deleteSlider/{id}','InfopageController@deleteSliders');

//Gallery
Route::get('/gallerypage','GalleryController@index');
Route::get('showg','GalleryController@show');
Route::post('uplg','GalleryController@upl');
Route::post('updg/{id}','GalleryController@upd');
Route::post('/formSubmitg','GalleryController@upload');
Route::delete('/deleteSliderg/{id}','GalleryController@deleteSlider');

//category
Route::post('uplc','GalleryController@uplc');
Route::get('showc','GalleryController@show');

//Contact
Route::post('sendmessage','ContactController@message');

Route::get('/admincontact','ContactController@indexa');
Route::delete('/deleteSlidercon/{id}','ContactController@deleteSlidera');
Route::get('showcon','ContactController@showa');
Route::post('/uplcon/{id}','ContactController@uplapp');

//Analyse
Route::get('/analysepage','AnalyseController@index');
Route::post('/analyse_upl','AnalyseController@analyse_upl');
Route::get('analyse_show','AnalyseController@show');
Route::post('analyse_upd/{id}','AnalyseController@upd');
Route::delete('/analyse_deleteSlider/{id}','AnalyseController@deleteSlider');

//covid form

// Route::get('/covid', function () {
//     return view('covid');
// });



// ======================= Ciprotec accounts managment ======================= //
Route::get('/loginform','covidtestController@indexUser');
Route::get('/createlogin','covidtestController@indexCreateLogin');
Route::post('createUserSociete','covidtestController@createUserSociete');
Route::get('/indexUserSocieteList','covidtestController@indexUserSocieteList');
Route::post('updateUserSociete/{id}','covidtestController@updateUserSociete');
Route::delete('/deleteUserSociete/{id}','covidtestController@deleteUserSociete');

// ======================= Company accounts managment ======================= //
Route::get('/indexAddUserToCompany','AccountController@indexAddUserToCompany');
Route::post('createAccount','AccountController@createAccount');
Route::get('/indexAccountList','AccountController@indexAccountList');
Route::post('updateAccount/{id}','AccountController@updateAccount');
Route::delete('/deleteAccount/{id}','AccountController@deleteAccount');

Route::get('/getDSession','covidtestController@getDSession');
Route::get('/companyUsers/{id}','covidtestController@companyUsers');
Route::get('/companyUsersList','covidtestController@companyUsersList');
Route::post('/updateStauts/{id}','covidtestController@updateStauts');
Route::get('/indexAllAccount','covidtestController@indexAllAccount');
Route::get('/indexAllAccountList','covidtestController@indexAllAccountList');

// ======================= Test reservation managment ======================= //
Route::get('/testappointment','TestreservationController@index');
Route::post('/postappointment','TestreservationController@postappointment');
Route::get('/appointmentview','TestreservationController@appointmentview');
Route::get('/indexAppList','TestreservationController@indexAppList');
Route::post('updApp/{id}','TestreservationController@updApp');
Route::delete('/deleteApp/{id}','TestreservationController@deleteApp');
Route::get('/appointmentAdminview','covidtestController@appointmentAdminview');
Route::get('/indexAllAppList','covidtestController@indexAllAppList');
Route::post('/updateStautsApp/{id}','covidtestController@updateStautsApp');
Route::get('/latestrdv','covidtestController@latestrdv');

// ======================= Blog client managment ======================= //
Route::get('/blogPost','BlogController@index');
Route::get('post/{slug}','BlogController@show');

Route::get('/date','TestreservationController@date');

//Auth
Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');
