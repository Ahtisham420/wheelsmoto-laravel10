<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\GuideController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\ProviderController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\DiscountController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\JobController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\ChatController;

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

Route::post('/test', function () {
    return "test";
});
Route::get('/get_data', [UserController::class, 'ApiCallData']);
Route::post('/insertIssue', [GuideController::class, 'insertIssue'])->name('insertIssue');

Route::prefix('home')->group(function () {
    Route::get('/featureListing', [HomeController::class, 'featureListing'])->name('home-page-featureListing');
    Route::get('/nearByListing', [HomeController::class, 'nearByListing'])->name('near-by-featureListing');
});

Route::prefix('provider')->group(function () {
    Route::post('/login', [ProviderController::class, 'login'])->name('provider-login');
    Route::post('/logout', [ProviderController::class, 'logout'])->name('provider-logout');
    Route::post('/register', [ProviderController::class, 'register'])->name('provider-register');
    Route::post('/forgetpassword', [ProviderController::class, 'forgetPassword'])->name('provider-forget-password');
    Route::post('/getforgetcode', [ProviderController::class, 'getForgetCode'])->name('provider-forget-code');
    Route::post('/updateLatLng', [ProviderController::class, 'updateLatLng'])->name('provider-updateLatLng');
    Route::post('/updateWorkStatus', [ProviderController::class, 'updateWorkStatus'])->name('provider-updateWorkStatus');
    Route::post('/socialLogin', [ProviderController::class, 'socialLogin'])->name('provider-socialLogin');
    Route::post('/updateProfile', [ProviderController::class, 'updateProfile'])->name('provider-updateProfile');
    Route::post('/updatePassword', [ProviderController::class, 'updatePassword'])->name('provider-updatePassword');
    Route::post('/getNearByProviders', [ProviderController::class, 'getNearByProviders'])->name('provider-getNearByProviders');
    Route::post('/requestJobApproval', [ProviderController::class, 'requestJobApproval'])->name('provider-requestJobApproval');
    Route::post('/rating', [ProviderController::class, 'rating'])->name('provider-rating');
    Route::get('/checkPendingJob', [ProviderController::class, 'checkPendingJob'])->name('api-pending-job');
    Route::post('/checkRating', [ProviderController::class, 'checkRating'])->name('provider-check-rating');
    Route::post('/earning', [ProviderController::class, 'earning'])->name('provider-earning');
    Route::get('/bankinfo', [ProviderController::class, 'bankInfo'])->name('provider-bankinfo');
    // Route::post('/bankinfo', [ProviderController::class, 'bankInfo'])->name('provider-bankinfo');
    Route::post('/weeklyearning', [ProviderController::class, 'weeklyEarning'])->name('provider-weeklyearning');
});

Route::prefix('customer')->group(function () {
    Route::post('/login', [CustomerController::class, 'login'])->name('customer-login');
    Route::post('/logout', [CustomerController::class, 'logout'])->name('customer-logout');
    Route::post('/register', [CustomerController::class, 'register'])->name('customer-register');
    Route::post('/forgetpassword', [CustomerController::class, 'forgetPassword'])->name('customer-forget-password');
    Route::post('/getforgetcode', [CustomerController::class, 'getForgetCode'])->name('customer-forget-code');
    Route::post('/updateLatLng', [CustomerController::class, 'updateLatLng'])->name('customer-updateLatLng');
    Route::post('/socialLogin', [CustomerController::class, 'socialLogin'])->name('customer-socialLogin');
    Route::post('/updateProfile', [CustomerController::class, 'updateProfile'])->name('customer-updateProfile');
    Route::post('/updatePassword', [CustomerController::class, 'updatePassword'])->name('customer-updatePassword');
    Route::post('/validateCoupons', [DiscountController::class, 'validateCoupons'])->name('validate-coupon');
    Route::post('/nearByProviders', [CustomerController::class, 'nearByProviders'])->name('api-near-by-providers');
    Route::post('/addCard', [CustomerController::class, 'addCard'])->name('api-add-card');
    Route::post('/getUserStripDetails', [CustomerController::class, 'getUserStripDetails'])->name('api-get-user-strip-details');
    Route::post('/setDefaultStripCard', [CustomerController::class, 'setDefaultStripCard'])->name('api-set-default-strip-card');
    Route::post('/removeStripCard', [CustomerController::class, 'removeStripCard'])->name('api-remove-strip-card');
    Route::post('/checkRating', [CustomerController::class, 'checkRating'])->name('customer-check-rating');
});

Route::prefix('user')->group(function () {
    Route::post('/enable', [Api\UserController::class, 'enable'])->name('user-enable');
});

Route::prefix('general')->group(function () {
    Route::get('/services', [ServiceController::class, 'services'])->name('api-services');
    Route::post('/serviceDetailByName', [ServiceController::class, 'serviceDetailByName'])->name('api-service-detail-by-name');
    Route::get('/limitations', [ServiceController::class, 'limitations'])->name('api-limitations');
    Route::post('/get-users-by-id', [CustomerController::class, 'getUserDetailById'])->name('api-get-users-by-id');
    Route::get('/dispatch-job', [JobController::class, 'jobDispatch'])->name('api-job-dispatch');
    Route::get('/timeout-job', [JobController::class, 'timeout'])->name('api-job-timeout');
    Route::get('/getNotifications', [NotificationController::class, 'getNotifications'])->name('api-get-notifications');
    Route::get('/getBookings', [JobController::class, 'getBookings'])->name('api-get-bookings');
    Route::get('/getDrivers', [JobController::class, 'getDrivers'])->name('api-get-drivers');
    Route::post('/set-notification-marked', [NotificationController::class, 'setNotificationMarked']);
});

Route::prefix('jobs')->group(function () {
    Route::post('/store', [JobController::class, 'storeJob'])->name('api-store-job');
    Route::post('/checkJobById', [JobController::class, 'checkJobById'])->name('api-check-job-by-id');
    Route::post('/acceptJob', [JobController::class, 'acceptJob'])->name('api-accept-job');
    Route::post('/rejectJob', [JobController::class, 'rejectJob'])->name('api-reject-job');
    Route::post('/checkCurrentJob', [JobController::class, 'checkCurrentJob'])->name('api-current-job');
    // Route::post('/checkPendingJob', [JobController::class, 'checkPendingJob'])->name('api-pending-job');
    Route::post('/checkPreviousJob', [JobController::class, 'checkPreviousJob'])->name('api-previous-job');
    Route::post('/leftJob', [JobController::class, 'cancelJob'])->name('api-cancel-job');
    Route::post('/customerApprove', [JobController::class, 'customerApprove'])->name('api-customer-approve-job');
    Route::post('/updateStatus', [JobController::class, 'updateStatus'])->name('api-update-job-status');
    Route::post('/jobEditRequest', [JobController::class, 'jobEditRequest'])->name('api-job-edit-request');
    Route::post('/editRequestStatus', [JobController::class, 'editRequestStatus'])->name('api-job-edit-request-status');
});

Route::prefix('chat')->group(function () {
    Route::post('/send', [ChatController::class, 'sendMessage'])->name('api-send-chat-message');
    Route::post('/get', [ChatController::class, 'getMessages'])->name('api-get-chat-messages');
});

// Uncomment the following lines if you need to handle CORS
// header('Access-Control-Allow-Origin', '*');
// header('Access-Control-Allow-Methods', 'GET, POST, PUT, PATCH, DELETE, OPTIONS');
// header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
