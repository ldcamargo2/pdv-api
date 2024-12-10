<?php

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

Route::group([
    'namespace' => 'Api',
    'prefix' => 'v1'
], function ($router) {
    Route::post('login', 'AuthController@auth');

    Route::group([
        'middleware' => ['api', 'jwt.auth'],
        // 'middleware' => ['api']
    ], function ($router) {

        Route::post('dashboard', 'DashboardController@dashboard');

        /*
        |--------------------------------------------------------------------------
        | Routes about Authentication
        |--------------------------------------------------------------------------
        */
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::post('me', 'AuthController@me');
        Route::post('change-company', 'UserController@changeCompany');

        /*
        |--------------------------------------------------------------------------
        | Routes about users
        |--------------------------------------------------------------------------
        */
        Route::post('users/image/update/{id}', 'UserController@updateImage');
        Route::resource('users', 'UserController');

        Route::get('get-profile', 'UserController@getProfile');
        Route::post('save-profile', 'UserController@saveProfile');
        
        Route::post('forgotPassword', 'AuthController@forgotPassword');

        Route::post('user/recovery', 'UserRecoveryController@recovery')->name('user.password.recoveryUser')->middleware(['web']);
        Route::get('user/recovery/{token}', 'UserRecoveryController@recoveryForm')->name('user.password.recoveryUser.form')->middleware(['web']);
        Route::post('user/recovery/{token}', 'UserRecoveryController@change')->middleware(['web']);

        /*
        |--------------------------------------------------------------------------
        | Product Routes
        |--------------------------------------------------------------------------
        */
        Route::resource('products', 'ProductController');
        Route::post('product/confirm-movement', 'ProductController@confirmMovement');
        Route::post('product/stock-movement', 'ProductController@movement');
        Route::post('product/manual-stock-movement', 'ProductController@manualMovement');
        Route::post('product/save-stock', 'ProductController@saveStock');
        Route::post('product/get-product', 'ProductController@getProduct');
        
        /*
        |--------------------------------------------------------------------------
        | Company Routes
        |--------------------------------------------------------------------------
        */
        Route::resource('companies', 'CompanyController');

        /*
        |--------------------------------------------------------------------------
        | StockMovement Routes
        |--------------------------------------------------------------------------
        */
        Route::resource('stock-movements', 'StockMovementController');
        
        /*
        |--------------------------------------------------------------------------
        | GeneratedTag Routes
        |--------------------------------------------------------------------------
        */
        Route::resource('generated-tags', 'GeneratedTagController');
        
        /*
        |--------------------------------------------------------------------------
        | Type Routes
        |--------------------------------------------------------------------------
        */
        Route::resource('types', 'TypeController');
        
        /*
        |--------------------------------------------------------------------------
        | Dimension Routes
        |--------------------------------------------------------------------------
        */
        Route::resource('dimensions', 'DimensionController');
        
        /*
        |--------------------------------------------------------------------------
        | UnityMeasure Routes
        |--------------------------------------------------------------------------
        */
        Route::resource('unity_measures', 'UnityMeasureController');

        /*
        |--------------------------------------------------------------------------
        | Supplier Routes
        |--------------------------------------------------------------------------
        */
        Route::resource('suppliers', 'SupplierController');
        /*
        |--------------------------------------------------------------------------
        | ProductCode Routes
        |--------------------------------------------------------------------------
        */
        Route::resource('product-codes', 'ProductCodeController');
        
        /*
        |--------------------------------------------------------------------------
        | Sale Routes
        |--------------------------------------------------------------------------
        */
        Route::resource('sales', 'SaleController');
        Route::post('sale/save', 'SaleController@saveSale');
        
        /*
        |--------------------------------------------------------------------------
        | SaleItem Routes
        |--------------------------------------------------------------------------
        */
        Route::resource('sale-items', 'SaleItemController');
        
        /*
        |--------------------------------------------------------------------------
        | Customer Routes
        |--------------------------------------------------------------------------
        */
        Route::resource('customers', 'CustomerController');
        
        /*
        |--------------------------------------------------------------------------
        | SalePayment Routes
        |--------------------------------------------------------------------------
        */
        Route::resource('sale-payments', 'SalePaymentController');
    });
});