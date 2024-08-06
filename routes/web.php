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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\FrontendUserController;
use App\Http\Controllers\GarageAdvertController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\WantedController;
use App\Http\Controllers\MisecellinousController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\BlogCommentController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\BlogReaderController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CarStateController;
use App\Http\Controllers\CarSettingController;
use App\Http\Controllers\FormSetingController;
use App\Http\Controllers\ReportsController;

Auth::routes(['register' => false]);
Route::get('/mail-view', function () {
    return view('frontend.mails.welcome-mail');
});
Route::get('send/{mail}', [FrontendController::class, 'sendMail'])->name("send-mail");
Route::get('car-detail/{id}', [FrontendController::class, 'CarDetail'])->name("car-detail");
Route::get('auto-part/{id}', [FrontendController::class, 'AutoPartDetail'])->name("auto-part-detail");
Route::get('garage-detail/{id}', [FrontendController::class, 'GarageDetail'])->name("garage-detail");
Route::get('my-advert/', [FrontendUserController::class, 'MyAdvert'])->name("my-advert");
Route::get('profile-dashboard/', [FrontendUserController::class, 'ProfileDashboard'])->name("profile-dashboard");
Route::get('garage-advert/{id?}', [FrontendUserController::class, 'GarageAdvert'])->name("garage-advert");
Route::get('sell-your-car/{id?}', [FrontendUserController::class, 'SellYourCar'])->name("sell-your-car");
Route::get('create-wanted/{id?}', [FrontendUserController::class, 'CreateWantedSection'])->name("create-buyer-request");
Route::get('wanted-list/', [FrontendUserController::class, 'WantedList'])->name("buyer-list");
Route::get('create-garage/{id?}', [FrontendUserController::class, 'CreateGarage'])->name("create-garage");
Route::get('garage-list/', [FrontendUserController::class, 'GarageList'])->name("garage-list");
Route::post('garage-section/search', [GarageAdvertController::class, 'GarageSearch'])->name("from-garage-search");
Route::get('auto-part-advert/{id?}', [FrontendUserController::class, 'AutoPartAdvert'])->name("autopart-advert");
Route::get('auti-part-list/', [FrontendUserController::class, 'AutoPartAdvertList'])->name("autopart-list");
Route::view('/privacy-policy', 'frontend.privacy-policy');
Route::view('/email-template', 'frontend.partials.mail-template');
Route::view('/user-profile', 'frontend.user-profile');
Route::view('/product-detail', 'frontend.product-detail');
//Route::view('/event-list', 'frontend.event-list');
Route::get('/event-list', [EventsController::class, 'UserViewEvent'])->name("event-frontend");
Route::get('/event-detail/{id}',[EventsController::class, 'EventDetail'])->name('event-detail');
Route::get('/brand',[FrontendController::class, 'Brand'])->name('frontend-brand-list');
Route::get('/car-type',[FrontendController::class, 'CarType'])->name('frontend-cartype-list');
Route::get('/load-more-tiles/{id}',[FrontendController::class, 'LoadMoreTile'])->name('load-more-tile');
Route::get('/like-frontend/{id}/{type?}', [FrontendController::class, 'LikeCarFrontend'])->name('heart.like.frontend');
Route::get('/Car-brands/{brand}',[FrontendController::class, 'BrandFilterIndex'])->name('index-brand');
Route::get('/car-type/{type}',[FrontendController::class, 'CarTypeFilterIndex'])->name('index-car-type');
Route::get('/car-price/{type}',[FrontendController::class, 'CarBudget'])->name('car-budget');
Route::get('/car-state/{type}',[FrontendController::class, 'CarState'])->name('car-state');
Route::get('/event-Search/{search}', [EventsController::class, 'EventSearch'])->name("event-search");
Route::view('/event-detail', 'frontend.event-detail');
//Route::view('/messenger', 'frontend.messenger');
Route::get('/new-password/{token}',[AuthController::class, 'newPassword'])->name('new-password');
Route::get('/newUsed/{con}',[FrontendController::class, 'newUsed'])->name('new-filters');
Route::post('change/password',[UserController::class, 'changePassword'])->name("change-password");
Route::post('chat/wanted',[WantedController::class, 'wantedChat'])->name("chat-wanted");
Route::post('create/misecellinous',[FrontendUserController::class, 'miscellanousCreate'])->name("create-misc");
Route::post('create/swap',[FrontendUserController::class, 'swapCreate'])->name("create-swap");
Route::get('chat/view',[WantedController::class, 'viewChat'])->name("chat-view");
Route::view('/about-us', 'frontend.about-us');
Route::get('/model/{id}', [FrontendController::class, 'BrandBaseModel'])->name('model-brand');
Route::get('/City/{id}', [FrontendController::class, 'StateBaseCity'])->name('state-city');
Route::view('/compare', 'frontend.compare');
Route::get('/Buyer-Request', [WantedController::class, 'index'])->name("wanted");
Route::get('/Buyer-Request/favorites', [WantedController::class, 'Favorites'])->name("favorites.wanted");
Route::post('/garagemail', [GarageAdvertController::class, 'garagEmail'])->name("garagemail");
Route::post('/swap-id', [GarageAdvertController::class, 'SwapId'])->name("swap_id");
Route::get('/swap-status/{id}', [GarageAdvertController::class, 'swapStatusChat'])->name("swap-status");
Route::post('/miscemail', [GarageAdvertController::class, 'miscEmail'])->name("miscemail");
Route::get('/garage-section', [GarageAdvertController::class, 'index'])->name("garage");
Route::get('/thanku', [Authcontroller::class, 'thankyou'])->name("thanku");
Route::get('/homefilters/{query}', [ApiController::class, 'HomeFilters'])->name("home-filters");
Route::get('/wantedfilters/{query}', [WantedController::class, 'wantedFilters'])->name("wanted-filters");
Route::get('/wantedsave/{c_id}', [WantedController::class, 'saveList'])->name("wanted-save-list");
Route::get('/wantedsaveview', [WantedController::class, 'saveListView'])->name("wanted-save-list-view");
//Route::get('/home/filters/{filter?}', [ApiController::class, 'home_Filters'])->name("home_filters");
Route::view('/recover/account','frontend.forgott-password');
Route::view('/contact-us', 'frontend.contact-us');
Route::post('create/contact_us', [FrontendController::class, 'ContactUs'])->name("create-contact");
Route::view('/cookies-policies', 'frontend.cookies-policies');
Route::post('/forgott/password',[AuthController::class, 'forgottPassword'])->name("user-password-forgott");
Route::get('/api', [ApiController::class, 'findcar'])->name('api.findcar');
Route::post('/regapi', [ApiController::class, 'reg'])->name('regapi.reg');
Route::get('/', [FrontendController::class, 'index'])->name('frontend-home');
Route::get('/search/{id}', [FrontendController::class, 'filterdData'])->name('search-post');
Route::get('/filter/{query}', [ApiController::class, 'filterData'])->name('filter-data');
Route::get('/price-filter/{query}', [ApiController::class, 'priceFilterData'])->name('price-filter-data');
Route::get('/filter-miscellanous/{query}/{search?}', [MisecellinousController::class, 'filterMisc'])->name('filter-misc');
Route::get('/search-miscellanous/{val}', [MisecellinousController::class, 'SearchMisc'])->name('misc-search');
Route::get('/filter-miscellanous-price/{val1}/{val2}/{search?}', [MisecellinousController::class, 'SearchPriceMisc'])->name('misc-price-filter');
Route::get('/postal/{fill}/{col}/{type}', [FrontendController::class, 'postalData'])->name('postal-data');
Route::get('/wanted-search/{col}/{fill}}', [WantedController::class, 'wantedSearch'])->name('wanted-search');
Route::get('/garage-search/{col}/{val}}', [GarageAdvertController::class, 'Search'])->name('garage-search');
Route::get('/dashboard/{val}/{con}', [FrontendController::class, 'dahsboardFilter'])->name('dashboard-filters');
Route::get('/auto-parts', [FrontendController::class, 'misecellinous'])->name('frontend-misecellinous');
Route::get('/car-selling-lease', [FrontendController::class, 'carSellingLease'])->name('frontend-car-selling-lease');
//Route::get('/blog', [FrontendController::class, 'blog'])->name('frontend-blog');
Route::get('/front-filter/{query}/{b?}/{m?}/{y?}', [ApiController::class, 'HomeFrontFilters'])->name("index-front-filter");
Route::get('/filter/{b?}/{m?}/{y?}/{bg?}', [ApiController::class, 'FiltersSearch'])->name("index-filter-search");
Route::get('/car-selling-auction', [FrontendController::class, 'carSellingAuction'])->name('frontend-car-selling-auction');
Route::get('/car-selling', [FrontendController::class, 'carSelling'])->name('frontend-car-selling');
Route::get('/events', [FrontendController::class, 'events'])->name('frontend-events');
//Route::get('/garage-services', [FrontendController::class, 'garageServices'])->name('frontend-garage-services');
Route::get('/american-muscle', [FrontendController::class, 'americanMuscle'])->name('frontend-american-muscle');
Route::get('/auction-cars', [FrontendController::class, 'auctionCars'])->name('frontend-auction-cars');
Route::get('/search-lease-cars', [FrontendController::class, 'searchLeaseCars'])->name('frontend-search-lease-cars');
Route::get('/rental-cars', [FrontendController::class, 'rentalCars'])->name('frontend-rental-cars');
Route::get('/classified-cars', [FrontendController::class, 'classifiedCars'])->name('frontend-classified-cars');
Route::get('/swap-cars/{s_id}', [FrontendController::class, 'swapCars'])->name('frontend-swap-cars');
Route::get('/swap-pricing/{p_id}', [FrontendController::class, 'SwapPricing'])->name('swap-pricing');
Route::get('/swap-list', [FrontendController::class, 'swapList'])->name('frontend-swap-list');
Route::get('/swap-index/{query}', [FrontendController::class, 'swapIndex'])->name('frontend-swap-index');
Route::post('/add-cookie', [ApiController::class, 'cookie'])->name('add-cookie');
// Route::get('blog/{id?}', [PostsController::class, 'UserView'])->name('frontend-blog');
Route::post('/garage_home_filter',[GarageAdvertController::class, 'GarageHomeFilter'])->name('Garage-Home-Filter');
Route::get('blog/{id?}', [PostsController::class, 'UserView'])->name('frontend-blog');
Route::post('create/blog-comment',[BlogCommentController::class, 'create'])->name('create-blog-comment');
Route::get('/Blog-Search/{search}', [PostsController::class, 'BlogSearch'])->name("blog-search");
Route::post('comment/load-more', [FrontendController::class, 'loadComment'])->name('blog-comment-load-more');
Route::get('/Blogsave/{c_id}', [PostsController::class, 'BlogSaveList'])->name("Blog-Save-List");
Route::get('/again-verify', [AuthController::class, 'UserEmailVerify'])->name('again-verify-mail');
Route::get('/variant/{id}', [FrontendController::class, 'ModelBaseVariant'])->name('model-variant');
Route::resource('events', 'EventsController');
Route::resource('footer', 'FooterController');
Route::group(['prefix' => 'user'], function () {
    // Login
    Route::get('/login/{id?}/{package?}', [AuthController::class, 'userLogin'])->name('user-login');
    Route::get('/garage-login/{gr}', [AuthController::class, 'garageLogin'])->name('garage-login');
    Route::get('/swap-login/{sw}/{s_id}', [AuthController::class, 'swapLogin'])->name('swap-login');
    Route::post('/login/submit', [AuthController::class, 'userLoginSubmit'])->name('user-login-submit');
    Route::get('/confirm/email/{package_id?}', [AuthController::class, 'confirm_email'])->name('confirm_email');
    Route::post('/social_login/submit', [AuthController::class, 'social_login'])->name('social-login-submit');
    // Logout
    Route::get('/del_misc/{id}', [FrontendUserController::class, 'del_misc'])->name('del_misc');
    Route::get('/del_car/{id}', [FrontendUserController::class, 'del_car'])->name('del_car');
    Route::get('/logout', [AuthController::class, 'userLogout'])->name('user-logout');
    Route::post('/updatecar', [FrontendUserController::class, 'user_update_car'])->name('updatecar');
    // Register
    Route::post('/register/submit', [AuthController::class, 'userRegisterSubmit'])->name('user-register-submit');
      // phone check
    Route::post('/phone/submit', [AuthController::class, 'userRegisterPhone'])->name('user-register-phone');
    // User dashboard main page
    Route::get('/dashboard/{tab}/{flag?}/', [FrontendUserController::class, 'userDashboard'])->name('user-dashboard');
    // Route::get('/r', 'FrontendUserController@readr')->name('readr');

    Route::post('/savecar', [FrontendUserController::class, 'user_save_car'])->name('savecar');
    Route::post('/add_garage_advert',[FrontendUserController::class, 'add_garage_advert'])->name('add_garage');
    Route::post('/add_wanted/advert',[FrontendUserController::class, 'add_wanted_advert'])->name('add_wanted');
    //Route::resource("garageadvert",GarageAdvertController);
    Route::post('/contact-mail',[FrontendController::class, 'FooterMail'])->name('footer-mail');
    Route::get('/garage_del/{id}',[FrontendUserController::class, 'del_garage'])->name('del_garage');
    Route::get('/del_wanted/{id}',[FrontendUserController::class, 'del_wanted'])->name('del_wanted');
    //package purchase
    Route::post('/purchase', [FrontendUserController::class, 'packagePurchase'])->name('package.purchase');
    // Change Password
    Route::get('/change-password/', [FrontendUserController::class, 'userChangePassword'])->name('user-change-password');
    Route::post('/change-password', [FrontendUserController::class, 'userChangePasswordSubmit'])->name('user-pass-change-submit');
    // Update Profile
    Route::get('/Blog-login/{bg}', [AuthController::class, 'BlogLogin'])->name('blog-login');
    Route::post('/user-profile', [FrontendUserController::class, 'userProfileUpdate'])->name('user-profile-update');
});

Route::group(['prefix' => 'admin'], function () {
  Route::resource('contactus',"ContactUsController");
    Route::get('/', function () {
        if (Auth::check()) {
            return Redirect::to('admin/home');
        }
        return view('auth.login');
    });


    Route::group(['prefix' => 'blog'], function () {

        Route::get('/', 'BlogReaderController@index')
            ->name('blog-page');


        // Route::get('/category/{categorySlug}', [BlogEtcReaderController::class, 'view_category'])
        //     ->name('blogetc.view_category');

        Route::get(
            '/{blogPostSlug}',
            [BlogReaderController::class, 'viewSinglePost']
        )->name('blog-page.singles');

        // throttle to a max of 10 attempts in 3 minutes:
//        Route::group(['middleware' => 'throttle:10,3'], function () {
//
//            Route::post(
//                'save_comment/{blogPostSlug}',
//                'CommentController@addNewComment'
//            )
//                ->name('comments.add_new_comment');
//        });
    });

    Route::middleware(['auth'])->group(function () {

        Route::group(['prefix' => 'comments',], function () {

            Route::get(
                '/',
                [BlogCommentController::class, 'index']
            )->name('comments.index');

            Route::patch(
                '/{commentId}',
                [BlogCommentController::class, 'approve']
            )->name('comments.approve');
            Route::delete(
                '/{commentId}',
                [BlogCommentController::class, 'destroy']
            )->name('comments.delete');
        });

        Route::group(['prefix' => 'application'], function () {
            Route::get('/metasettings', [ApplicationController::class, 'metaSettings'])->name('meta-settings');
            Route::post('/tagcreate', [TagsController::class, 'tagcreate'])->name('tag-create');
        });

        Route::resource('settings', 'SettingsController');
        Route::resource('logs', 'LogsController');
        Route::group(['prefix' => 'subscribers'], function () {
            Route::get('/countersubscribers', [SubscriberController::class, 'counterSubscribers'])->name('counter-subscribers');
        });

        Route::get('lang/{locale}', [LocalizationController::class, 'index'])->name('language');
        Route::resource('notifications', 'NotificationController');
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::get('/profile', [HomeController::class, 'profile'])->name('profile-admin');
        Route::post('/password', [HomeController::class, 'passwordUpdate'])->name('profile-admin-password');
        Route::get('/delete/{model}/{route}/{id}', [HomeController::class, 'delete'])->name('delete-model');

        Route::resource('pages', 'PagesController');
        Route::resource('roles', 'RolesController');
        Route::resource('posts', 'PostsController');
        Route::resource('terms', "TermsController");
        Route::resource('notifications', 'NotificationController');
        Route::resource('testimonial', 'TestimonialController');
        Route::resource('permissions', 'PermissionController');

        Route::group(['prefix' => 'users'], function () {
            Route::get('/all', [UserController::class, 'index'])->name('all-users');
            Route::get('/create', [UserController::class, 'form'])->name('create-users');
            Route::get('/edit/{id}', [UserController::class, 'form'])->name('edit-users');
            Route::post('/profile', [UserController::class, 'profile'])->name('profile-users');
            // Route::get('/status/{status}/{id}', [UserController::class, 'status'])->name('status-users');
            Route::post('/search', [UserController::class, 'search'])->name('search-user');
            Route::post('/password', [UserController::class, 'passwordUpdate'])->name('update-user-password');
        });
        Route::group(['prefix' => 'settings'], function () {
            Route::get('/all', [SettingsController::class, 'index'])->name('all-settings');
            Route::get('/form', [SettingsController::class, 'form'])->name('form-settings');
            Route::get('/edit/{id}', [SettingsController::class, 'form'])->name('edit-settings');
            // Route::post('/create', [SettingsController::class, 'create'])->name('create-settings');
            Route::post('/update', [SettingsController::class, 'updated'])->name('update-settings');
            Route::get('/status/{status}/{id}', [UserController::class, 'status'])->name('status-users');
            // Route::post('/search', [UserController::class, 'search'])->name('search-user');
        });

        Route::group(['prefix' => 'categories'], function () {
            Route::get('/all', [CategoryController::class, 'all'])->name('all-categories');
            Route::get('/create', [CategoryController::class, 'create'])->name('create-category');
            Route::post('/save', [CategoryController::class, 'save'])->name('save-category');
            Route::get('/show/{id}', [CategoryController::class, 'show'])->name('show-category');
            Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('delete-category');
            Route::post('/updatestatus', [CategoryController::class, 'updateStatus'])->name('updatestatus-category');
            Route::post('/updatetop', [CategoryController::class, 'updateTop'])->name('updatetop-category');
        });


        Route::group(['prefix' => 'packages'], function () {
            Route::get('/all', [PackageController::class, 'index'])->name('all-packages');
            Route::get('/create', [PackageController::class, 'form'])->name('create-packages');
            Route::get('/edit/{id}', [PackageController::class, 'form'])->name('edit-packages');
            Route::post('/save', [PackageController::class, 'save'])->name('save-packages');

            // Route::get('/status/{status}/{id}', [UserController::class, 'status'])->name('status-users');
            // Route::post('/search', [UserController::class, 'search'])->name('search-user');
        });

        Route::group(['prefix' => 'manufacturers'], function () {
            Route::get('/all', [BrandController::class,'all'])->name('all-brands');
            Route::get('/create', [BrandController::class,'create'])->name('create-brand');
            Route::post('/save', [BrandController::class,'save'])->name('save-brand');
            Route::get('/show/{id}', [BrandController::class,'show'])->name('show-brand');
            Route::get('/delete/{id}', [BrandController::class,'delete'])->name('delete-brand');
            Route::post('/updatestatus', [BrandController::class,'updateStatus'])->name('updatestatus-brand');
            Route::post('/updatetop', [BrandController::class,'updateTop'])->name('updatetop-brand');
        });
        Route::group(['prefix' => 'state'], function () {
            Route::get('/all', [CarStateController::class,'all'])->name('all-state');
            Route::get('/create', [CarStateController::class,'create'])->name('create-state');
            Route::post('/save', [CarStateController::class,'save'])->name('save-state');
            Route::get('/show/{id}', [CarStateController::class,'show'])->name('show-state');
            Route::get('/delete/{id}', [CarStateController::class,'delete'])->name('delete-state');
//            Route::post('/updatestatus', [BrandController::class,'updateStatus'])->name('updatestatus-brand');
//            Route::post('/updatetop', [BrandController::class,'updateTop'])->name('updatetop-brand');
        });

        Route::group(['prefix' => 'car-settings'], function () {
            Route::get('/all/{key}', [CarSettingController::class,'all'])->name('all-car-settings');
            Route::get('/create/{key}', [CarSettingController::class,'create'])->name('create-car-settings');
            Route::post('/save/{key}', [CarSettingController::class,'save'])->name('save-car-settings');
            Route::get('/show/{id}/{key}', [CarSettingController::class,'show'])->name('show-car-settings');
            Route::get('/delete/{id}/{key}', [CarSettingController::class,'delete'])->name('delete-car-settings');
            Route::post('/updatestatus/{key}', [CarSettingController::class,'updateStatus'])->name('updatestatus-car-settings');
            Route::post('/updatetop/{key}', [CarSettingController::class,'updateTop'])->name('updatetop-car-settings');
        });

        Route::group(['prefix' => 'general'], function () {
            Route::get('/view-notifications/{job_id}/{notification_id}', [notificationController::class,'viewNotifications'])->name('view-notifications');
        });
        Route::group(['prefix' => 'reports'], function () {
            Route::get('/users', [ReportsController::class,'usersReport'])->name('users-report');
            Route::get('/users/csv', [ReportsController::class,'usersReportCsv'])->name('users-report-csv');
        });
        Route::group(['prefix' => 'form-settings'], function () {
            Route::get('/all-engin-types', [FormSetingController::class,'allEnginTypes'])->name('all-engin-types');
            Route::get('/form-settings/{status}/{id}/{model}', [FormSetingController::class,'status'])->name('form-settings-status');
            Route::post('/form-settings/engine-type', [FormSetingController::class, 'update'])->name('form-settings-engine-type');

            Route::get('/all-american-muscles', [FormSetingController::class,'allEnginTypes'])->name('all-american-muscles');

            Route::get('/all-auctions', [FormSetingController::class,'allEnginTypes'])->name('all-auctions');

            Route::get('/all-lease-cars', [FormSetingController::class,'allEnginTypes'])->name('all-lease-cars');

            Route::get('/all-rentals', [FormSetingController::class,'allEnginTypes'])->name('all-rentals');

            Route::get('/all-classifieds', [FormSetingController::class,'allEnginTypes'])->name('all-classifieds');

            Route::get('/all-swaps', [FormSetingController::class,'allEnginTypes'])->name('all-swaps');
        });
    });
});