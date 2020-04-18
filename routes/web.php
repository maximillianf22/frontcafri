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

/*
Route::get('/', function () {
    return view('welcome');
});
*/


// Route::get('/', ['uses' => 'CoreController@configuration', 'as' => 'index']);
Route::get('/', ['uses' => 'Core\storeController@index', 'as' => 'index']);

Route::get('/location', ['uses' => 'CoreController@location', 'as' => 'index.location']);

/* 01 - Rutas de Inicio Sesion */
Route::get('/login', ['uses' => 'Auth\LoginController@SigninUser', 'as' => 'login']);
Route::post('/login', ['uses' => 'Auth\LoginController@AuthUserSignIn', 'as' => 'loginAuth']);
Route::get('/logout', ['uses' => 'Auth\LoginController@logout', 'as' => 'getLogout']);

Route::get('/recover', ['uses' => 'Auth\LoginController@recover', 'as' => 'recoverAuth']);
Route::post('/recover', ['uses' => 'Auth\LoginController@sendPassRecover', 'as' => 'recovery.Account']);

Route::get('/signup', ['uses' => 'Auth\LoginController@signUp', 'as' => 'signupAuth']);
Route::post('/signup', ['uses' => 'Auth\LoginController@signUpRegister', 'as' => 'signup.Auth.Register']);

Route::get('/confirmAccount/email/{mail}/token/{token_}', ['uses' => 'Auth\LoginController@confirmAccount', 'as' => 'confirm.Account']);
Route::get('/confirmResetPass/email/{mail}/token/{token_}', ['uses' => 'Auth\LoginController@confirmResetPass', 'as' => 'confirm.Reset.Pass']);
Route::post('/resetPassAccount', ['uses' => 'Auth\LoginController@resetPassAccount', 'as' => 'reset.Pass.Account']);
/*----------------------------*/

 
/*----------Store Module ------*/
Route::group(['prefix' => 'store'], function () {

    Route::get('/', ['uses' => 'Core\storeController@index',  'as' => 'store.index']);
    
    Route::get('/category', ['uses' => 'Core\storeController@viewCategory',  'as' => 'store.category']);

    Route::get('/category/{slug?}', ['uses' => 'Core\storeController@viewCategoryList',  'as' => 'store.category.lisproduct']);

    Route::get('/category/{slug?}/subcategorias ', ['uses' => 'Core\storeController@viewCategorysub',  'as' => 'store.subcategory.lissub']);
    
    Route::get('/category/{slug?}/subcategorias/{subcategoria?}', ['uses' => 'Core\storeController@viewCategoryListsub',  'as' => 'store.subcategory.lisproduct']);


    
    Route::post('/view-product', ['uses' => 'Core\storeController@viewItemProduct',  'as' => 'store.view.product.item']);
    Route::post('/view-product-edit', ['uses' => 'Core\storeController@viewItemProductEdit',  'as' => 'store.view.product.item.edit']);

    Route::post('/addProductsInfoTemp', ['uses' => 'Core\storeController@savetmpCarProducts',  'as' => 'store.save.tmp.products']);
    Route::post('/reloadCar', ['uses' => 'Core\storeController@reloadCar',  'as' => 'store.reloadCar.product']);
    Route::post('/repeatProducts', ['uses' => 'Core\storeController@repeatProducts',  'as' => 'store.repeatCar.product']);

    Route::post('/delProductcar', ['uses' => 'Core\storeController@delProductCar',  'as' => 'store.remove.product']);
   

    Route::post('/mycart/delOrderProduct/{idAttr?}', ['uses' => 'Core\storeController@delitemProductCar',  'as' => 'store.remove.item.product']);
   

    Route::post('/product/search', ['uses' => 'Core\storeController@search',  'as' => 'store.search.product']);
    
    Route::post('/product/filtersearch', ['uses' => 'Core\storeController@filtersearch',  'as' => 'store.filtersearch.product']);
    
    Route::post('/mycart/checkCupon', ['uses' => 'Core\storeController@checkCupon',  'as' => 'store.checkout.cupon']);
    Route::get('/offers', ['uses' => 'Core\storeController@viewOffersProduct',  'as' => 'store.viewOffers.product']);
    
    Route::get('/checkClientgid', ['uses' => 'Core\storeController@checkClient', 'as' => 'index.client']);





    Route::post('/product/loadItemCar', ['uses' => 'Core\storeController@loadItemCar',  'as' => 'store.load.car']);
    Route::post('/product', ['uses' => 'Core\storeController@viewProduct',  'as' => 'store.view.product']);
  
    Route::post('/product/searchAll', ['uses' => 'Core\storeController@searchAll',  'as' => 'store.searchAll.product']);
    Route::post('/product/searchfilterAll', ['uses' => 'Core\storeController@searchfilterAll',  'as' => 'store.searchfilterAll.product']);

    /*--- configuro los datos de lo que enviare al carrito de compra ----*/
    Route::post('/product/addcarview', ['uses' => 'Core\storeController@addCarView',  'as' => 'store.addview.product']);
    Route::post('/product/removecarview', ['uses' => 'Core\storeController@removeCarView',  'as' => 'store.removeview.product']);
    
    Route::post('/product/checkout', ['uses' => 'Core\storeController@checkout',  'as' => 'store.checkout.product']);
    
});



/* 02 - View Default Athenticated */

Route::group(['middleware' => 'auth'], function () {
    
    
    Route::group(['prefix' => 'store'], function () {
        Route::get('/orders', ['uses' => 'Core\storeController@ordersProducts',  'as' => 'store.orders.product']);
        Route::get('/mycart/checkout', ['uses' => 'Core\storeController@checkout',  'as' => 'store.checkout']);
        Route::post('/mycart/checkout', ['uses' => 'Core\storeController@checkoutfinish',  'as' => 'store.checkout.finish']);
        Route::post('/mycart/ordercancel/{idOrder?}', ['uses' => 'Core\storeController@orderCancel',  'as' => 'store.order.cancel']);
        Route::post('/mycart/detailOrder/{idOrder?}', ['uses' => 'Core\storeController@orderDetail',  'as' => 'store.order.detail']);
        Route::post('/mycart/detailOrderCopy/{idOrder?}', ['uses' => 'Core\storeController@orderDetailCopy',  'as' => 'store.order.detail.copy']);
    });
    
    /*--- Account Section User ---*/
    Route::group(['prefix' => 'account'], function () {
        Route::get('/account-settings', ['uses' => 'Core\accountController@index',  'as' => 'account.index']);
        Route::get('/account-addresses', ['uses' => 'Core\accountController@addresses',  'as' => 'account.addresses']);
        Route::get('/account-addresses/deleteaddresses/{id?}', ['uses' => 'Core\accountController@deladdresses',  'as' => 'account.addresses.delete']);
        
        Route::get('/account-addresses/new', ['uses' => 'Core\accountController@newaddresses',  'as' => 'account.addresses.create']);
        Route::post('/account-addresses/new', ['uses' => 'Core\accountController@newSaveaddresses',  'as' => 'account.addresses.create.save']);

        Route::get('/account-addresses/edit/{id?}', ['uses' => 'Core\accountController@editaddresses',  'as' => 'account.addresses.edit']);
        Route::post('/account-addresses/edit/{id?}', ['uses' => 'Core\accountController@editSaveaddresses',  'as' => 'account.addresses.edit.save']);
        
        Route::put('/account-settings/{id}', ['uses' => 'Core\accountController@update',  'as' => 'account.update']);
        Route::get('/delete-account/{id}', ['uses' => 'Core\accountController@updateState',  'as' => 'account.delete']);
    });

    
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/', ['uses' => 'Core\dashboardController@index',  'as' => 'dashboard']);
    });

    /* CMS - Builder - Design CMS Module Panel  */
    Route::group(['prefix' => 'website'], function () {
        Route::get('/', ['uses' => 'Core\webSiteController@index',  'as' => 'website.index']);
        Route::get('/builder', ['uses' => 'Core\webSiteController@builder',  'as' => 'website.builder']);
    });

   

    /*--- Surveys Module ---*/

    Route::group(['prefix' => 'surveys'], function () {
        Route::get('/', ['uses' => 'Surveys\surveyController@index',  'as' => 'survey.dashboard']);
        Route::post('/warehouse-question', ['uses' => 'Surveys\surveyController@warehouseQuestion',  'as' => 'survey.warehouseQuestion']);
        
        Route::get('/create', ['uses' => 'Surveys\surveyController@create',  'as' => 'survey.create']);
        Route::post('/create', ['uses' => 'Surveys\surveyController@store',  'as' => 'survey.create.storage']);
            Route::get('/create/design/{token?}', ['uses' => 'Surveys\surveyController@survey_design',  'as' => 'survey.create.design']);
            Route::get('/create/preview/{token?}', ['uses' => 'Surveys\surveyController@survey_preview',  'as' => 'survey.create.preview']);

        Route::post('/design/delquestion', ['uses' => 'Surveys\surveyController@destroyQuestion',  'as' => 'survey.delete.question']);
    });

    /*--- Module Store ---*/


});


/* Form Contactenos */
Route::get('/contactenos', ['uses' => 'Core\contactController@index', 'as' => 'web.contact']);
Route::post('/contactenos', ['uses' => 'Core\contactController@sendContactForm', 'as' => 'send.contactForm']);

/*-----------------*/


/*Administrador*/

Route::get('/administrator/login', ['uses' => 'Auth\LoginController@Admin_SigninUser', 'as' => 'admin.login']);
Route::post('/administrator/login', ['uses' => 'Auth\LoginController@Admin_AuthUserSignIn', 'as' => 'admin.loginAuth']);

Route::group(['prefix' => 'administrator',  'middleware' => 'auth'], function(){


    //Dashboard
    Route::get('/', ['uses' => 'Administrator\DashboardController@index', 'as' => 'admin.dashboard']);

    //Sliders
    Route::get('/sliders', ['uses' => 'Administrator\SlidersController@index', 'as' => 'admin.sliders']);
    Route::get('/sliders/create', ['uses' => 'Administrator\SlidersController@create',  'as' => 'admin.sliders.create']);
    Route::post('/sliders/store', ['uses' => 'Administrator\SlidersController@store',  'as' => 'admin.sliders.store']);
    Route::get('/sliders/show/{id}', ['uses' => 'Administrator\SlidersController@show', 'as' => 'admin.sliders.show']);
    Route::post('/sliders/update/{id}', ['uses' => 'Administrator\SlidersController@update', 'as' => 'admin.sliders.update']);
    //customers
    Route::get('/customers', ['uses' => 'Administrator\CustomersController@index', 'as' => 'admin.customers']);
    Route::get('/customers/show/{id?}', ['uses' => 'Administrator\CustomersController@editCustomer', 'as' => 'admin.customers.edit']);
    Route::post('/customers/show/{id?}', ['uses' => 'Administrator\CustomersController@saveeditCustomer', 'as' => 'admin.customer.save']);
    Route::post('/customers/searchfilterAll', ['uses' => 'Administrator\CustomersController@searchfilterAll',  'as' => 'admin.customers.filter']);

    //Direcciones
    Route::get('/direcciones', ['uses' => 'Administrator\DireccionController@index', 'as' => 'admin.direccion']);
    Route::get('/direcciones/create', ['uses' => 'Administrator\DireccionController@create',  'as' => 'admin.direccion.create']);
    Route::post('/direcciones/ajax/store', ['uses' => 'Administrator\DireccionController@store']);
    Route::get('/direcciones/show/{id}', ['uses' => 'Administrator\DireccionController@show', 'as' => 'admin.direccion.show']);
    Route::post('/direcciones/ajax/update', ['uses' => 'Administrator\DireccionController@update']);

    //Permisos
    Route::get('/permisos', ['uses' => 'Administrator\PermisosController@index', 'as' => 'admin.permisos']);
    Route::post('/permisos/ajax/perfiles', ['uses' => 'Administrator\PermisosController@perfiles']);
    Route::post('/permisos/ajax/checked', ['uses' => 'Administrator\PermisosController@actionsChecked']);
    Route::post('/permisos/ajax/save', ['uses' => 'Administrator\PermisosController@actionsSave']);

    //Roles
    // Route::get('/roles', ['uses' => 'Administrator\RolesController@index', 'as' => 'admin.roles']);
    Route::get('/users', ['uses' => 'Administrator\RolesController@users_sistemas', 'as' => 'admin.users.sistema']);
    Route::get('/users/show/{id?}', ['uses' => 'Administrator\RolesController@editUsers', 'as' => 'admin.users.edit']);
    Route::post('/users/show/{id?}', ['uses' => 'Administrator\RolesController@saveeditUser', 'as' => 'admin.users.save']);
    Route::get('/users/create', ['uses' => 'Administrator\RolesController@createUsers',  'as' => 'admin.roles.user.create']);
    Route::post('/users/create', ['uses' => 'Administrator\RolesController@saveNewUser',  'as' => 'admin.users.save.new']);

    

    Route::get('/roles/create', ['uses' => 'Administrator\RolesController@create',  'as' => 'admin.roles.create']);
    Route::post('/roles/store', ['uses' => 'Administrator\RolesController@store',  'as' => 'admin.roles.store']);
    Route::get('/roles/show/{id}', ['uses' => 'Administrator\RolesController@show', 'as' => 'admin.roles.show']);
    Route::put('/roles/update/{id}', ['uses' => 'Administrator\RolesController@update', 'as' => 'admin.roles.update']);

    /* Modules */
    
    //--- Store 
    // Cambio masivo nombre de las imagenes cargadas ....
    Route::get('/store/name_image_renew', ['uses' =>'Administrator\StoreController@renewImages']);

    Route::get('/store', ['uses' => 'Administrator\StoreController@listProducts', 'as' => 'admin.store.products']);
    Route::get('/store/product/edit/{idProduct?}', ['uses' => 'Administrator\StoreController@editProduct', 'as' => 'admin.edit.products']);
    
    Route::post('/store/product/new', ['uses' => 'Administrator\StoreController@new', 'as' => 'admin.new.products']);
    

    Route::post('/store/product/update/{idProduct?}', ['uses' => 'Administrator\StoreController@update', 'as' => 'admin.update.products']);
    Route::post('/store/product/updimage/{idProduct?}', ['uses' => 'Administrator\StoreController@updateImage', 'as' => 'admin.update.imgproduct']);
    
    Route::post('/store/product/attribute/{idProduct?}', ['uses' => 'Administrator\StoreController@editAttribute', 'as' => 'admin.load.attrproducts']);
    Route::post('/store/product/addAttribute/{idProduct?}', ['uses' => 'Administrator\StoreController@addAttribute', 'as' => 'admin.load.addattrproducts']);
    Route::post('/store/product/saveNewAttribute/{idProduct?}', ['uses' => 'Administrator\StoreController@saveAttribute', 'as' => 'admin.load.saveattrproducts']);

    Route::post('/store/product/updateAttribute/{idProduct?}', ['uses' => 'Administrator\StoreController@updateAttribute', 'as' => 'admin.update.attrproducts']);

    
    Route::get('/store/product/create', ['uses' => 'Administrator\StoreController@create',  'as' => 'admin.product.create']);
    Route::post('/store/product/store', ['uses' => 'Administrator\StoreController@store',  'as' => 'admin.product.store']);
    
    Route::get('/cupons', ['uses' => 'Administrator\StoreController@cupons', 'as' => 'admin.cupons']);
    Route::get('/cupons/create/new', ['uses' => 'Administrator\StoreController@createcupons', 'as' => 'admin.cupons.create']);
    Route::post('/cupons/create/new', ['uses' => 'Administrator\StoreController@storecupons', 'as' => 'admin.cupons.save']);
    Route::get('/cupons/edit/{idCupon?}', ['uses' => 'Administrator\StoreController@editCupon', 'as' => 'admin.cupons.edit']);
    Route::post('/cupons/updatecupon', ['uses' => 'Administrator\StoreController@updateCupon', 'as' => 'admin.cupons.edit.save']);
    Route::post('/cupons/validate', ['uses' => 'Administrator\StoreController@validateCupon', 'as' => 'admin.cupons.validate']);
    
    Route::get('/horasentrega', ['uses' => 'Administrator\StoreController@horasEntregas', 'as' => 'admin.horas.entrega']);
    Route::get('/horasentrega/create/new', ['uses' => 'Administrator\StoreController@createHoras', 'as' => 'admin.horas.entrega.create']);
    Route::post('/horasentrega/create/new', ['uses' => 'Administrator\StoreController@storeHoras', 'as' => 'admin.horas.entrega.save']);
    Route::get('/horasentrega/edit/{idHour?}', ['uses' => 'Administrator\StoreController@editHora', 'as' => 'admin.horas.entrega.edit']);
    Route::post('/horasentrega/updatehour', ['uses' => 'Administrator\StoreController@updateHora', 'as' => 'admin.horas.entrega.edit.save']);
    
    
    //Unidades de Medida
    Route::get('/unidadmedida', ['uses' => 'Administrator\StoreController@medidas', 'as' => 'admin.unidad.medidas']);
    Route::get('/unidadmedida/{id?}', ['uses' => 'Administrator\StoreController@editmedidas', 'as' => 'admin.unidad.edit']);
    Route::post('/unidadmedida/{id?}', ['uses' => 'Administrator\StoreController@updatemedidas', 'as' => 'admin.unidad.update']);
    Route::get('/unidadmedida/create/new', ['uses' => 'Administrator\StoreController@createunidades', 'as' => 'admin.unidad.create']);
    Route::post('/unidadmedida/create/new', ['uses' => 'Administrator\StoreController@storeunidades', 'as' => 'admin.unidad.store']);
    
    // Orders
    Route::get('/orders', ['uses' => 'Administrator\OrdersController@index', 'as' => 'admin.orders']);
    Route::get('/orders/detail/{idOrder?}', ['uses' => 'Administrator\OrdersController@index', 'as' => 'admin.orders']);
    Route::post('/orders/detailfilter', ['uses' => 'Administrator\OrdersController@filterList', 'as' => 'admin.orders.filter']);
    
    Route::get('/orders/manage/{idOrder?}', ['uses' => 'Administrator\OrdersController@manageOrder', 'as' => 'admin.detail.order']);
    Route::post('/orders/update_order/{idOrder?}', ['uses' => 'Administrator\OrdersController@updateStateOrder', 'as' => 'admin.update.pedido']);
   
    // Categories
    Route::get('/categories', ['uses' => 'Administrator\CategoriesController@index', 'as' => 'admin.category']);
    Route::get('/subcategories', ['uses' => 'Administrator\CategoriesController@subcategories', 'as' => 'admin.subcategory']);
    

    Route::get('/categories/edit/{idCategorie?}', ['uses' => 'Administrator\CategoriesController@edit', 'as' => 'admin.category.edit']);
    Route::get('/subcategories/edit/{idCategorie?}', ['uses' => 'Administrator\CategoriesController@subcategorieedit', 'as' => 'admin.category.subcategorieedit']);

    Route::post('/categories/update/{idCategorie?}', ['uses' => 'Administrator\CategoriesController@update', 'as' => 'admin.category.update']);

     Route::post('/subcategories/update/{idCategorie?}', ['uses' => 'Administrator\CategoriesController@subcategorieupdate', 'as' => 'admin.category.subcategorieupdate']); 

    Route::get('/categories/create', ['uses' => 'Administrator\CategoriesController@create', 'as' => 'admin.category.create']);
    Route::get('/subcategories/create', ['uses' => 'Administrator\CategoriesController@subcategoriecreate', 'as' => 'admin.category.subcategoriecreate']);

    Route::post('/categories/store', ['uses' => 'Administrator\CategoriesController@store', 'as' => 'admin.category.store']);

    Route::post('/subcategories/store', ['uses' => 'Administrator\CategoriesController@subcategoriestore', 'as' => 'admin.category.subcategoriestore']); 
    
    Route::post('/categories/reorder/{idCategorie?}', ['uses' => 'Administrator\CategoriesController@editOrder', 'as' => 'admin.category.editOrder']);
   

    /*---- Manage Products List ---*/   
    Route::group(['prefix' => '/manage-products/'], function () {
        Route::get('list', ['uses' => 'Administrator\ManageController@listProducts', 'as' => 'admin.manage.products.list']);
        Route::get('filter', ['uses' => 'Administrator\ManageController@filterProducts', 'as' => 'admin.manage.products.filter']); 
        Route::get('addfavoriteproduct', ['uses' => 'Administrator\ManageController@add_favoriteproduct', 'as' => 'admin.manage.products.addfavorite']);
        Route::get('viewItemProduct', ['uses' => 'Administrator\ManageController@view_ItemProduct', 'as' => 'admin.manage.products.view']); 
        Route::get('show-hide-product', ['uses' => 'Administrator\ManageController@show_hide_product']);
        Route::post('upd-price-product', ['uses' => 'Administrator\ManageController@upd_price_product']);
        Route::post('upd-state-product', ['uses' => 'Administrator\ManageController@upd_state_product']);
        Route::get('detail-product',   ['uses' => 'Administrator\ManageController@detailProduct']);
        Route::post('updsave-product', ['uses' => 'Administrator\ManageController@updsaveProduct']);
        Route::post('variations-products', ['uses' => 'Administrator\ManageController@variationsProducts']);

        
    });




   
   

});







/*End Administrador*/
