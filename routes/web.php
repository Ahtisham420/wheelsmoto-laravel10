<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ 
    AuthController, 
    BlogCommentController, 
    BlogReaderController, 
    CategoryController, 
    CarStateController, 
    ContactUsController, 
    EventsController, 
    FooterController, 
    FormSetingController, 
    GarageAdvertController, 
    MisecellinousController, 
    NotificationController, 
    PackageController, 
    PostsController, 
    SettingsController, 
    TagsController, 
    TestimonialController, 
    UserController, 
    BrandController, 
    ApplicationController, 
    LocalizationController, 
    ReportsController,
    CarSettingController, 
    WantedController,
    FrontendController
};

// Authentication Routes
Auth::routes(['register' => false]);

// Web Routes
Route::get('/mail-view', fn() => view('frontend.mails.welcome-mail'));

Route::get('send/{mail}', [FrontendController::class, 'sendMail'])->name('send-mail');
Route::get('car-detail/{id}', [FrontendController::class, 'CarDetail'])->name('car-detail');
Route::get('auto-part/{id}', [FrontendController::class, 'AutoPartDetail'])->name('auto-part-detail');
Route::get('garage-detail/{id}', [FrontendController::class, 'GarageDetail'])->name('garage-detail');
Route::get('my-advert/', [FrontendUserController::class, 'MyAdvert'])->name('my-advert');
Route::get('profile-dashboard/', [FrontendUserController::class, 'ProfileDashboard'])->name('profile-dashboard');
Route::get('garage-advert/{id?}', [FrontendUserController::class, 'GarageAdvert'])->name('garage-advert');
Route::get('sell-your-car/{id?}', [FrontendUserController::class, 'SellYourCar'])->name('sell-your-car');
Route::get('create-wanted/{id?}', [FrontendUserController::class, 'CreateWantedSection'])->name('create-buyer-request');
Route::get('wanted-list/', [FrontendUserController::class, 'WantedList'])->name('buyer-list');
Route::get('create-garage/{id?}', [FrontendUserController::class, 'CreateGarage'])->name('create-garage');
Route::get('garage-list/', [FrontendUserController::class, 'GarageList'])->name('garage-list');
Route::post('garage-section/search', [GarageAdvertController::class, 'GarageSearch'])->name('from-garage-search');
Route::get('auto-part-advert/{id?}', [FrontendUserController::class, 'AutoPartAdvert'])->name('autopart-advert');
Route::get('auti-part-list/', [FrontendUserController::class, 'AutoPartAdvertList'])->name('autopart-list');
Route::view('/privacy-policy', 'frontend.privacy-policy');
Route::view('/email-template', 'frontend.partials.mail-template');
Route::view('/user-profile', 'frontend.user-profile');
Route::view('/product-detail', 'frontend.product-detail');
Route::get('/event-list', [EventsController::class, 'UserViewEvent'])->name('event-frontend');
Route::get('/event-detail/{id}', [EventsController::class, 'EventDetail'])->name('event-detail');
Route::get('/brand', [FrontendController::class, 'Brand'])->name('frontend-brand-list');
Route::get('/car-type', [FrontendController::class, 'CarType'])->name('frontend-cartype-list');
Route::get('/load-more-tiles/{id}', [FrontendController::class, 'LoadMoreTile'])->name('load-more-tile');
Route::get('/like-frontend/{id}/{type?}', [FrontendController::class, 'LikeCarFrontend'])->name('heart.like.frontend');
Route::get('/Car-brands/{brand}', [FrontendController::class, 'BrandFilterIndex'])->name('index-brand');
Route::get('/car-type/{type}', [FrontendController::class, 'CarTypeFilterIndex'])->name('index-car-type');
Route::get('/car-price/{type}', [FrontendController::class, 'CarBudget'])->name('car-budget');
Route::get('/car-state/{type}', [FrontendController::class, 'CarState'])->name('car-state-type');
Route::get('/event-Search/{search}', [EventsController::class, 'EventSearch'])->name('event-search');
Route::view('/event-detail', 'frontend.event-detail');
Route::get('/new-password/{token}', [AuthController::class, 'newPassword'])->name('new-password');
Route::get('/newUsed/{con}', [FrontendController::class, 'newUsed'])->name('new-filters');
Route::post('change/password', [UserController::class, 'changePassword'])->name('change-password');
Route::post('chat/wanted', [WantedController::class, 'wantedChat'])->name('chat-wanted');
Route::post('create/misecellinous', [FrontendUserController::class, 'miscellanousCreate'])->name('create-misc');
Route::post('create/swap', [FrontendUserController::class, 'swapCreate'])->name('create-swap');
Route::get('chat/view', [WantedController::class, 'viewChat'])->name('chat-view');
Route::view('/about-us', 'frontend.about-us');
Route::get('/model/{id}', [FrontendController::class, 'BrandBaseModel'])->name('model-brand');
Route::get('/City/{id}', [FrontendController::class, 'StateBaseCity'])->name('state-city');
Route::view('/compare', 'frontend.compare');
Route::get('/Buyer-Request', [WantedController::class, 'index'])->name('wanted');
Route::get('/Buyer-Request/favorites', [WantedController::class, 'Favorites'])->name('favorites.wanted');
Route::post('/garagemail', [GarageAdvertController::class, 'garagEmail'])->name('garagemail');
Route::post('/swap-id', [GarageAdvertController::class, 'SwapId'])->name('swap_id');
Route::get('/swap-status/{id}', [GarageAdvertController::class, 'swapStatusChat'])->name('swap-status');
Route::post('/miscemail', [GarageAdvertController::class, 'miscEmail'])->name('miscemail');
Route::get('/garage-section', [GarageAdvertController::class, 'index'])->name('garage');
Route::get('/thanku', [AuthController::class, 'thankyou'])->name('thanku');
Route::get('/homefilters/{query}', [ApiController::class, 'HomeFilters'])->name('home-filters');
Route::get('/wantedfilters/{query}', [WantedController::class, 'wantedFilters'])->name('wanted-filters');
Route::get('/wantedsave/{c_id}', [WantedController::class, 'saveList'])->name('wanted-save-list');
Route::get('/wantedsaveview', [WantedController::class, 'saveListView'])->name('wanted-save-list-view');
Route::view('/recover/account', 'frontend.forgott-password');
Route::view('/contact-us', 'frontend.contact-us');
Route::post('create/contact_us', [FrontendController::class, 'ContactUs'])->name('create-contact');
Route::view('/cookies-policies', 'frontend.cookies-policies');
Route::post('/forgott/password', [AuthController::class, 'forgottPassword'])->name('user-password-forgott');
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
Route::get('/wanted-search/{col}/{fill}', [WantedController::class, 'wantedSearch'])->name('wanted-search');
Route::get('/garage-search/{col}/{val}', [GarageAdvertController::class, 'Search'])->name('garage-search');
Route::get('/dashboard/{val}/{con}', [FrontendController::class, 'dahsboardFilter'])->name('dashboard-filters');
Route::get('/auto-parts', [FrontendController::class, 'misecellinous'])->name('frontend-misecellinous');
Route::get('/car-state/{state}', [FrontendController::class, 'carState'])->name('car-state');
Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact-us');
Route::get('/contact-us/thank-you', [ContactUsController::class, 'thankyou'])->name('contact-us-thankyou');
Route::post('/contact-us/submit', [ContactUsController::class, 'submit'])->name('contact-us-submit');
Route::get('/about-us', [FrontendController::class, 'aboutUs'])->name('about-us');
Route::get('/privacy-policy', [FrontendController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/terms-of-service', [FrontendController::class, 'termsOfService'])->name('terms-of-service');
Route::get('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter-subscribe');
Route::post('/newsletter/subscribe', [NewsletterController::class, 'postSubscribe'])->name('newsletter-post-subscribe');
Route::get('/user/profile', [UserController::class, 'profile'])->name('user-profile');
Route::post('/user/profile/update', [UserController::class, 'updateProfile'])->name('user-profile-update');
Route::post('/user/password/change', [UserController::class, 'changePassword'])->name('user-password-change');
Route::post('/user/notifications', [NotificationController::class, 'update'])->name('user-notifications');
Route::get('/user/notifications', [NotificationController::class, 'index'])->name('user-notifications-list');
Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
Route::post('/settings/update', [SettingsController::class, 'update'])->name('settings-update');
Route::get('/admin/reports', [ReportsController::class, 'index'])->name('admin-reports');
Route::get('/admin/reports/{type}', [ReportsController::class, 'show'])->name('admin-report-type');
Route::get('/admin/settings', [FormSetingController::class, 'index'])->name('admin-settings');
Route::post('/admin/settings/update', [FormSetingController::class, 'update'])->name('admin-settings-update');
Route::get('/admin/blog', [PostsController::class, 'index'])->name('admin-blog');
Route::post('/admin/blog/create', [PostsController::class, 'store'])->name('admin-blog-store');
Route::get('/admin/blog/edit/{id}', [PostsController::class, 'edit'])->name('admin-blog-edit');
Route::post('/admin/blog/update/{id}', [PostsController::class, 'update'])->name('admin-blog-update');
Route::get('/admin/blog/delete/{id}', [PostsController::class, 'destroy'])->name('admin-blog-delete');
Route::post('/admin/blog-comments', [BlogCommentController::class, 'store'])->name('admin-blog-comments');
Route::get('/admin/blog-comments/{id}', [BlogCommentController::class, 'index'])->name('admin-blog-comments-list');
Route::get('/admin/blog-comments/delete/{id}', [BlogCommentController::class, 'destroy'])->name('admin-blog-comments-delete');
Route::post('/admin/blog-comments/update/{id}', [BlogCommentController::class, 'update'])->name('admin-blog-comments-update');
Route::get('/admin/users', [UserController::class, 'index'])->name('admin-users');
Route::post('/admin/users/update/{id}', [UserController::class, 'update'])->name('admin-user-update');
Route::get('/admin/users/delete/{id}', [UserController::class, 'destroy'])->name('admin-user-delete');
Route::get('/admin/brands', [BrandController::class, 'index'])->name('admin-brands');
Route::post('/admin/brands/create', [BrandController::class, 'store'])->name('admin-brands-store');
Route::post('/admin/brands/update/{id}', [BrandController::class, 'update'])->name('admin-brands-update');
Route::get('/admin/brands/delete/{id}', [BrandController::class, 'destroy'])->name('admin-brands-delete');
Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin-categories');
Route::post('/admin/categories/create', [CategoryController::class, 'store'])->name('admin-categories-store');
Route::post('/admin/categories/update/{id}', [CategoryController::class, 'update'])->name('admin-categories-update');
Route::get('/admin/categories/delete/{id}', [CategoryController::class, 'destroy'])->name('admin-categories-delete');
Route::get('/admin/car-states', [CarStateController::class, 'index'])->name('admin-car-states');
Route::post('/admin/car-states/create', [CarStateController::class, 'store'])->name('admin-car-states-store');
Route::post('/admin/car-states/update/{id}', [CarStateController::class, 'update'])->name('admin-car-states-update');
Route::get('/admin/car-states/delete/{id}', [CarStateController::class, 'destroy'])->name('admin-car-states-delete');
Route::get('/admin/car-settings', [CarSettingController::class, 'index'])->name('admin-car-settings');
Route::post('/admin/car-settings/create', [CarSettingController::class, 'store'])->name('admin-car-settings-store');
Route::post('/admin/car-settings/update/{id}', [CarSettingController::class, 'update'])->name('admin-car-settings-update');
Route::get('/admin/car-settings/delete/{id}', [CarSettingController::class, 'destroy'])->name('admin-car-settings-delete');
Route::get('/admin/misecellinous', [MisecellinousController::class, 'index'])->name('admin-misecellinous');
Route::post('/admin/misecellinous/create', [MisecellinousController::class, 'store'])->name('admin-misecellinous-store');
Route::post('/admin/misecellinous/update/{id}', [MisecellinousController::class, 'update'])->name('admin-misecellinous-update');
Route::get('/admin/misecellinous/delete/{id}', [MisecellinousController::class, 'destroy'])->name('admin-misecellinous-delete');
Route::get('/admin/users/{id}', [UserController::class, 'show'])->name('admin-user-show');
Route::post('/admin/users/update/{id}', [UserController::class, 'update'])->name('admin-user-update');
// Route::post('/admin/users/delete/{id}', [UserController::class, 'destroy'])->name('admin-user-delete');
