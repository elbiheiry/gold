<?php
/**
 * Adminpanel routes
 */
Route::group(['namespace' => 'Admin' ,'prefix' => 'admin'] ,function (){

    Route::group(['namespace' => 'Auth'] ,function (){
        Route::get('/login' ,['as' => 'admin.auth' ,'uses' => 'LoginController@getLogin']);
        Route::post('/login' ,['as' => 'admin.auth' ,'uses' => 'LoginController@postLogin']);
        Route::get('/logout', 'LoginController@getLogout')->name('admin.logout');
    });

    Route::group(['middleware' => 'auth.admin'] ,function (){

        //dashboard route
        Route::get('/' ,['as' => 'admin.dashboard' ,'uses' => 'DashboardController@getIndex']);

        /**
         * site-info routes
         */
        Route::group(['prefix' => 'site-info'] ,function (){
            Route::get('/' ,['as' => 'admin.settings' ,'uses' => 'SettingController@getIndex']);
            Route::post('/' ,['as' => 'admin.settings' ,'uses' => 'SettingController@postIndex']);
        });

        /**
         * home pages routes
         */
        Route::group(['prefix' => 'homepage'] ,function () {
            /**
             * sliders routes
             */
            Route::group(['prefix' => 'sliders'], function () {
                Route::get('/', ['as' => 'admin.sliders', 'uses' => 'SliderController@getIndex']);
                Route::post('/', ['as' => 'admin.sliders', 'uses' => 'SliderController@postIndex']);
                Route::get('/info/{id}', ['as' => 'admin.sliders.info', 'uses' => 'SliderController@getInfo']);
                Route::post('/edit/{id}', ['as' => 'admin.sliders.edit', 'uses' => 'SliderController@postEdit']);
                Route::post('/delete', ['as' => 'admin.sliders.delete', 'uses' => 'SliderController@postDelete']);
            });

            /**
             * about routes
             */
            Route::group(['prefix' => 'about-us'] ,function (){
                Route::get('/' ,['as' => 'admin.about' ,'uses' => 'AboutController@getIndex']);
                Route::post('/edit/{id}' ,['as' => 'admin.about.edit' ,'uses' => 'AboutController@postEdit']);
            });
        });

        /**
         * Group pages routes
         */
        Route::group(['prefix' => 'group'] ,function () {
            /**
             * sliders routes
             */
            Route::group(['prefix' => 'sliders'], function () {
                Route::get('/', ['as' => 'admin.group.sliders', 'uses' => 'GroupSliderController@getIndex']);
                Route::post('/', ['as' => 'admin.group.sliders', 'uses' => 'GroupSliderController@postIndex']);
                Route::get('/info/{id}', ['as' => 'admin.group.sliders.info', 'uses' => 'GroupSliderController@getInfo']);
                Route::post('/edit/{id}', ['as' => 'admin.group.sliders.edit', 'uses' => 'GroupSliderController@postEdit']);
                Route::post('/delete', ['as' => 'admin.group.sliders.delete', 'uses' => 'GroupSliderController@postDelete']);
            });

            /**
             * sister companies routes
             */
            Route::group(['prefix' => 'sister-companies'], function () {
                Route::get('/', ['as' => 'admin.group.company', 'uses' => 'SisterCompanyController@getIndex']);
                Route::post('/', ['as' => 'admin.group.company', 'uses' => 'SisterCompanyController@postIndex']);
                Route::get('/info/{id}', ['as' => 'admin.group.company.info', 'uses' => 'SisterCompanyController@getInfo']);
                Route::post('/edit/{id}', ['as' => 'admin.group.company.edit', 'uses' => 'SisterCompanyController@postEdit']);
                Route::post('/delete', ['as' => 'admin.group.company.delete', 'uses' => 'SisterCompanyController@postDelete']);
            });

            /**
             * group content routes
             */
            Route::group(['prefix' => 'sections'] ,function (){
                Route::get('/' ,['as' => 'admin.group.content' ,'uses' => 'GroupContentController@getIndex']);
                Route::post('/' ,['as' => 'admin.group.content' ,'uses' => 'GroupContentController@postIndex']);
            });

        });

        /**
         * services routes
         */
        Route::group(['prefix' => 'services'] ,function () {

            Route::get('/' ,['as' => 'admin.services' ,'uses' => 'ServiceController@getIndex']);
            Route::get('/info/{id}', ['as' => 'admin.services.info', 'uses' => 'ServiceController@getInfo']);
            Route::post('/edit/{id}' ,['as' => 'admin.services.edit' ,'uses' => 'ServiceController@postEdit']);

            /**
             * group content routes
             */
            Route::group(['prefix' => 'sections'] ,function (){
                Route::get('/' ,['as' => 'admin.services.content' ,'uses' => 'ServiceContentController@getIndex']);
                Route::post('/' ,['as' => 'admin.services.content' ,'uses' => 'ServiceContentController@postIndex']);
            });

            /**
             * questions routes
             */
            Route::group(['prefix' => 'questions'], function () {
                Route::get('/{id}', ['as' => 'admin.questions', 'uses' => 'ServiceQuestionController@getIndex']);
                Route::post('/{id}', ['as' => 'admin.questions', 'uses' => 'ServiceQuestionController@postIndex']);
                Route::get('/info/{id}', ['as' => 'admin.questions.info', 'uses' => 'ServiceQuestionController@getInfo']);
                Route::post('/edit/{id}', ['as' => 'admin.questions.edit', 'uses' => 'ServiceQuestionController@postEdit']);
                Route::post('/delete/{id}', ['as' => 'admin.questions.delete', 'uses' => 'ServiceQuestionController@postDelete']);
            });
        });

        /**
         * products routes
         */
        Route::group(['prefix' => 'products'], function () {
            Route::get('/', ['as' => 'admin.products', 'uses' => 'ProductController@getIndex']);
            Route::post('/', ['as' => 'admin.products', 'uses' => 'ProductController@postIndex']);
            Route::get('/info/{id}', ['as' => 'admin.products.info', 'uses' => 'ProductController@getInfo']);
            Route::post('/edit/{id}', ['as' => 'admin.products.edit', 'uses' => 'ProductController@postEdit']);
            Route::post('/delete', ['as' => 'admin.products.delete', 'uses' => 'ProductController@postDelete']);
            Route::get('/image/{id}' ,['as' => 'admin.products.images' ,'uses' => 'ProductController@getImages']);
            Route::post('/image/add/{id}' ,['as' => 'admin.products.image.add' ,'uses' => 'ProductController@postAddImage']);
            Route::get('/image/info/{id}/key/{key}' ,['as' => 'admin.products.image.info' ,'uses' => 'ProductController@getInfoImage']);
            Route::post('/image/edit/{id}/key/{key}' ,['as' => 'admin.products.image.edit' ,'uses' => 'ProductController@postEditImage']);
            Route::get('/image/delete/{id}/key/{key}' ,['as' => 'admin.products.delete.image' ,'uses' => 'ProductController@getDeleteImage']);
        });

        /**
         * blogs routes
         */
        Route::group(['prefix' => 'blogs'], function () {
            Route::get('/', ['as' => 'admin.blogs', 'uses' => 'BlogController@getIndex']);
            Route::post('/', ['as' => 'admin.blogs', 'uses' => 'BlogController@postIndex']);
            Route::get('/info/{id}', ['as' => 'admin.blogs.info', 'uses' => 'BlogController@getInfo']);
            Route::post('/edit/{id}', ['as' => 'admin.blogs.edit', 'uses' => 'BlogController@postEdit']);
            Route::post('/delete', ['as' => 'admin.blogs.delete', 'uses' => 'BlogController@postDelete']);
            Route::get('/image/{id}' ,['as' => 'admin.blogs.images' ,'uses' => 'BlogController@getImages']);
            Route::post('/image/add/{id}' ,['as' => 'admin.blogs.image.add' ,'uses' => 'BlogController@postAddImage']);
            Route::get('/image/info/{id}/key/{key}' ,['as' => 'admin.blogs.image.info' ,'uses' => 'BlogController@getInfoImage']);
            Route::post('/image/edit/{id}/key/{key}' ,['as' => 'admin.blogs.image.edit' ,'uses' => 'BlogController@postEditImage']);
            Route::get('/image/delete/{id}/key/{key}' ,['as' => 'admin.blogs.delete.image' ,'uses' => 'BlogController@getDeleteImage']);
        });

        /**
         * countries routes
         */
        Route::group(['prefix' => 'countries'], function () {
            Route::get('/', ['as' => 'admin.countries', 'uses' => 'CountryController@getIndex']);
            Route::post('/', ['as' => 'admin.countries', 'uses' => 'CountryController@postIndex']);
            Route::get('/info/{id}', ['as' => 'admin.countries.info', 'uses' => 'CountryController@getInfo']);
            Route::post('/edit/{id}', ['as' => 'admin.countries.edit', 'uses' => 'CountryController@postEdit']);
            Route::post('/delete', ['as' => 'admin.countries.delete', 'uses' => 'CountryController@postDelete']);

            /**
             * cities routes
             */
            Route::group(['prefix' => 'cities'], function () {
                Route::get('/{id}', ['as' => 'admin.cities', 'uses' => 'CityController@getIndex']);
                Route::post('/{id}', ['as' => 'admin.cities', 'uses' => 'CityController@postIndex']);
                Route::get('/info/{id}', ['as' => 'admin.cities.info', 'uses' => 'CityController@getInfo']);
                Route::post('/edit/{id}', ['as' => 'admin.cities.edit', 'uses' => 'CityController@postEdit']);
                Route::post('/delete/{id}', ['as' => 'admin.cities.delete', 'uses' => 'CityController@postDelete']);
            });
        });

        /**
         * pages routes
         */
        Route::group(['prefix' => 'pages'], function () {
            Route::get('/', ['as' => 'admin.pages', 'uses' => 'PageController@getIndex']);
            Route::post('/', ['as' => 'admin.pages', 'uses' => 'PageController@postIndex']);
            Route::get('/info/{id}', ['as' => 'admin.pages.info', 'uses' => 'PageController@getInfo']);
            Route::post('/edit/{id}', ['as' => 'admin.pages.edit', 'uses' => 'PageController@postEdit']);
            Route::post('/delete', ['as' => 'admin.pages.delete', 'uses' => 'PageController@postDelete']);
        });

        /**
         * users routes
         */
        Route::group(['prefix' => 'users'], function () {
            Route::get('/', ['as' => 'admin.users', 'uses' => 'UserController@getIndex']);
            Route::post('/', ['as' => 'admin.users', 'uses' => 'UserController@postIndex']);
            Route::get('/info/{id}', ['as' => 'admin.users.info', 'uses' => 'UserController@getInfo']);
            Route::post('/edit/{id}', ['as' => 'admin.users.edit', 'uses' => 'UserController@postEdit']);
            Route::post('/delete', ['as' => 'admin.users.delete', 'uses' => 'UserController@postDelete']);
        });

        //messages route
        Route::get('/messages' ,['as' => 'admin.messages' ,'uses' => 'MessageController@getIndex']);
        Route::get('/messages/delete/{id}' ,['as' => 'admin.messages.delete' ,'uses' => 'MessageController@getDelete']);

        /**
         * checkouts routes
         */
        Route::group(['prefix' => 'checkouts'], function () {
            Route::get('/', ['as' => 'admin.checkouts', 'uses' => 'CheckoutController@getIndex']);
            Route::get('/delete/{id}' ,['as' => 'admin.checkouts.delete' ,'uses' => 'CheckoutController@getDelete']);
            Route::get('/orders/{id}', ['as' => 'admin.checkouts.orders', 'uses' => 'CheckoutController@getOrder']);
            Route::get('/reports' ,['as' => 'admin.checkouts.reports' ,'uses' => 'CheckoutController@getReport']);
            Route::post('/reports' ,['as' => 'admin.checkouts.reports' ,'uses' => 'CheckoutController@postReport']);
        });
    });
});

/**
 * site routes
 */
Route::group(['namespace' => 'Site'] ,function (){

    /**
     * index route
     */
    Route::get('/' ,['as' => 'site.index' ,'uses' => 'HomeController@getIndex']);
    Route::post('contact' ,['as' => 'site.contact' ,'uses' => 'HomeController@postIndex']);

    /**
     * group route
     */
    Route::get('/group' ,['as' => 'site.group' ,'uses' => 'GroupController@getIndex']);

    /**
     * services route
     */
    Route::get('/services' ,['as' => 'site.services' ,'uses' => 'ServiceController@getIndex']);

    /**
     * products route
     */
    Route::get('/products' ,['as' => 'site.products' ,'uses' => 'ProductController@getIndex']);
    Route::get('/single-product/{slug}' ,['as' => 'site.products.single' ,'uses' => 'ProductController@getSingleProduct']);


    /**
     * blogs route
     */
    Route::get('/blogs' ,['as' => 'site.blogs' ,'uses' => 'BlogController@getIndex']);
    Route::get('/single-blog/{slug}' ,['as' => 'site.blogs.single' ,'uses' => 'BlogController@getSingleBlog']);

    /**
     * pages route
     */
    Route::get('/pages/{slug}' ,['as' => 'site.pages' ,'uses' => 'PageController@getIndex']);

    /**
     * cart routes
     */
    Route::get('/cart' ,['as' => 'site.cart' ,'uses' => 'CartController@getIndex']);
    Route::post('/cart/{id}' ,['as' => 'site.cart.add' ,'uses' => 'CartController@postCart']);
    Route::post('/cart/edit/{rowId}' ,['as' => 'site.cart.update' ,'uses' => 'CartController@postUpdate']);
    Route::get('/delete/{id}' ,['as' => 'site.cart.remove' ,'uses' => 'CartController@getDeleteCart']);

    Route::group(['middleware' => 'auth.site'] ,function (){
        /**
         * checkout route
         */
        Route::get('/checkout' ,['as' => 'site.checkout' ,'uses' => 'CheckoutController@getIndex']);
        Route::post('/checkout' ,['as' => 'site.checkout' ,'uses' => 'CheckoutController@postIndex']);
        Route::get('/cities' ,['as' => 'site.cities' ,'uses' => 'CheckoutController@getCities']);
    });

    Route::group(['namespace' => 'Auth'] ,function (){
        Route::get('/login' ,['as' => 'site.login' ,'uses' => 'LoginController@getLogin']);
        Route::post('/login' ,['as' => 'site.login' ,'uses' => 'LoginController@postLogin']);
        Route::post('/register' ,['as' => 'site.register' ,'uses' => 'LoginController@postRegister']);
        Route::get('/logout', 'LoginController@getLogout')->name('site.logout');
    });
});