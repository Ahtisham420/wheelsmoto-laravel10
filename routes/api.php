<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\{
    ChatController,
    customerController,
    DiscountController,
    GuideController,
    HomeController,
    jobController,
    notificationController,
    providerController,
    serviceController,
    UserController
};

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/test', function () {
    return "test";
});

// User Controller Route
Route::get('/get_data', [UserController::class, 'apiCallData']);

// Guide Controller Route
Route::post('/insertIssue', [GuideController::class, 'insertIssue'])->name('insertIssue');

// Home Routes
Route::prefix('home')->group(function () {
    Route::get('/featureListing', [HomeController::class, 'featureListing'])->name('home-page-featureListing');
    Route::get('/nearByListing', [HomeController::class, 'nearByListing'])->name('near-by-featureListing');
});

// Provider Routes
Route::prefix('provider')->group(function () {
    Route::post('/login', [providerController::class, 'login'])->name('provider-login');
    Route::post('/logout', [providerController::class, 'logout'])->name('provider-logout');
    Route::post('/register', [providerController::class, 'register'])->name('provider-register');
    Route::post('/forgetpassword', [providerController::class, 'forgetPassword'])->name('provider-forget-password');
    Route::post('/getforgetcode', [providerController::class, 'getForgetCode'])->name('provider-forget-code');
    Route::post('/updateLatLng', [providerController::class, 'updateLatLng'])->name('provider-updateLatLng');
    Route::post('/updateWorkStatus', [providerController::class, 'updateWorkStatus'])->name('provider-updateWorkStatus');
    Route::post('/socialLogin', [providerController::class, 'socialLogin'])->name('provider-socialLogin');
    Route::post('/updateProfile', [providerController::class, 'updateProfile'])->name('provider-updateProfile');
    Route::post('/updatePassword', [providerController::class, 'updatePassword'])->name('provider-updatePassword');
    Route::post('/getNearByProviders', [providerController::class, 'getNearByProviders'])->name('provider-getNearByProviders');
    Route::post('/requestJobApproval', [providerController::class, 'requestJobApproval'])->name('provider-requestJobApproval');
    Route::post('/rating', [providerController::class, 'rating'])->name('provider-rating');
    Route::get('/checkPendingJob', [providerController::class, 'checkPendingJob'])->name('api-pending-job');
    Route::post('/checkRating', [providerController::class, 'checkRating'])->name('provider-check-rating');
    Route::post('/earning', [providerController::class, 'earning'])->name('provider-earning');
    Route::get('/bankinfo', [providerController::class, 'bankInfo'])->name('provider-bankinfo');
    // Route::post('/bankinfo', [providerController::class, 'bankInfo'])->name('provider-bankinfo');
    Route::post('/weeklyearning', [providerController::class, 'weeklyEarning'])->name('provider-weeklyearning');
});

// Customer Routes
Route::prefix('customer')->group(function () {
    Route::post('/login', [customerController::class, 'login'])->name('customer-login');
    Route::post('/logout', [customerController::class, 'logout'])->name('customer-logout');
    Route::post('/register', [customerController::class, 'register'])->name('customer-register');
    Route::post('/forgetpassword', [customerController::class, 'forgetPassword'])->name('customer-forget-password');
    Route::post('/getforgetcode', [customerController::class, 'getForgetCode'])->name('customer-forget-code');
    Route::post('/updateLatLng', [customerController::class, 'updateLatLng'])->name('customer-updateLatLng');
    Route::post('/socialLogin', [CustomerController::class, 'socialLogin'])->name('customer-socialLogin');
    Route::post('/updateProfile', [customerController::class, 'updateProfile'])->name('customer-updateProfile');
    Route::post('/updatePassword', [customerController::class, 'updatePassword'])->name('customer-updatePassword');
    Route::post('/validateCoupons', [DiscountController::class, 'validateCoupons'])->name('validate-coupon');
    Route::post('/nearByProviders', [customerController::class, 'nearByProviders'])->name('api-near-by-providers');
    Route::post('/addCard', [customerController::class, 'addCard'])->name('api-add-card');
    Route::post('/getUserStripDetails', [customerController::class, 'getUserStripDetails'])->name('api-get-user-strip-details');
    Route::post('/setDefaultStripCard', [customerController::class, 'setDefaultStripCard'])->name('api-set-default-strip-card');
    Route::post('/removeStripCard', [customerController::class, 'removeStripCard'])->name('api-remove-strip-card');
    Route::post('/checkRating', [customerController::class, 'checkRating'])->name('customer-check-rating');
});

// User Routes
Route::prefix('user')->group(function () {
    Route::post('/enable', [UserController::class, 'enable'])->name('user-enable');
});

// General Routes
Route::prefix('general')->group(function () {
    Route::get('/services', [serviceController::class, 'services'])->name('api-services');
    Route::post('/serviceDetailByName', [serviceController::class, 'serviceDetailByName'])->name('api-service-detail-by-name');
    Route::get('/limitations', [serviceController::class, 'limitations'])->name('api-limitations');
    Route::post('/get-users-by-id', [customerController::class, 'getUserDetailById'])->name('api-get-users-by-id');
    Route::get('/dispatch-job', [jobController::class, 'jobDispatch'])->name('api-job-dispatch');
    Route::get('/timeout-job', [jobController::class, 'timeout'])->name('api-job-timeout');
    Route::get('/getNotifications', [notificationController::class, 'getNotifications'])->name('api-get-notifications');
    Route::get('/getBookings', [jobController::class, 'getBookings'])->name('api-get-bookings');
    Route::get('/getDrivers', [jobController::class, 'getDrivers'])->name('api-get-drivers');
    Route::post('/set-notification-marked', [notificationController::class, 'setNotificationMarked']);
});

// Jobs Routes
Route::prefix('jobs')->group(function () {
    Route::post('/store', [jobController::class, 'storeJob'])->name('api-store-job');
    Route::post('/checkJobById', [jobController::class, 'checkJobById'])->name('api-check-job-by-id');
    Route::post('/acceptJob', [jobController::class, 'acceptJob'])->name('api-accept-job');
    Route::post('/rejectJob', [jobController::class, 'rejectJob'])->name('api-reject-job');
    Route::post('/checkCurrentJob', [jobController::class, 'checkCurrentJob'])->name('api-current-job');
    // Route::post('/checkPendingJob', [jobController::class, 'checkPendingJob'])->name('api-pending-job');
    Route::post('/checkPreviousJob', [jobController::class, 'checkPreviousJob'])->name('api-previous-job');
    Route::post('/leftJob', [jobController::class, 'cancelJob'])->name('api-cancel-job');
    Route::post('/customerApprove', [jobController::class, 'customerApprove'])->name('api-customer-approve-job');
    Route::post('/updateStatus', [jobController::class, 'updateStatus'])->name('api-update-job-status');
    Route::post('/jobEditRequest', [jobController::class, 'jobEditRequest'])->name('api-job-edit-request');
    Route::post('/editRequestStatus', [jobController::class, 'editRequestStatus'])->name('api-job-edit-request-status');
});

// Chat Routes
Route::prefix('chat')->group(function () {
    Route::post('/send', [ChatController::class, 'sendMessage'])->name('api-send-chat-message');
    Route::post('/get', [ChatController::class, 'getMessages'])->name('api-get-chat-messages');
});
