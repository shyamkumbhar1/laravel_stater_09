<?php

use Illuminate\Support\Facades\{Auth, Route, Artisan};
use App\Http\Controllers\{
    DataController, HomeController, CommonController, PmhnpsController,
    ReviewController, ServerController, ContactController, DropdownController,
    PostAjaxController, FindPmhnpsController, ReviewRatingController,
    SubscriptionController, TempRegisterController, ContactUsFormController,
    ListingPmhnpsController, CaptchaServiceController, RemainingDetailsController,
    User\UserDashboardController, RazorpayPaymentController ,PostController
};





Route::get('/', function () {
    return "test";

    return view('welcome');
})->name('welcome');

Auth::routes();
// Artisan::routes();
Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Tempory  Registor User
Route::get('register-step-one',[TempRegisterController::class,'registerStepOne'])->name('register.step.one');
Route::post('register-step-one-post',[TempRegisterController::class,'postRegisterStepOne'])->name('register.step.one.post');

// Subcription

// Route::view('thankyou','strip.thankyou')->name('thankyou');
Route::view('dashboard1','dashboard1')->name('dashboard1');
// Route::post('single-charge',[SubscriptionController::class,'singleCharge'])->name('single.charge');
// Route::get('single-charge',[SubscriptionController::class,'singleChargeGet'])->name('single.charge');
// Route::get('plans/create',[SubscriptionController::class,'showPlanForm'])->name('plans.create');
// Route::post('plans/store',[SubscriptionController::class,'savePlan'])->name('plans.store');
Route::get('plans',[SubscriptionController::class,'allPlan'])->name('plans.all');
Route::get('plans/checkout/{planId}',[SubscriptionController::class,'checkout'])->name('plans.checkout');
Route::post('plans/save-remaning-data',[SubscriptionController::class,'SaveRemainingData'])->name('plans.save.remaning.data');

Route::post('plans/process',[SubscriptionController::class,'processSubcription'])->name('plans.process');
Route::get('thank-you',[SubscriptionController::class,'thankYou'])->name('thankyou');

Route::get('subscription/all',[SubscriptionController::class,'allSubcription'])->name('subscription.all');
Route::get('subscription/cancel',[SubscriptionController::class,'cancleSubcription'])->name('subscription.cancel');
Route::get('subscription/resume',[SubscriptionController::class,'resumeSubcription'])->name('subscription.resume');


// Remaining details save

Route::get('remaining-details',[RemainingDetailsController::class,'create'])->name('remaining.details');
Route::post('remaining-details',[RemainingDetailsController::class,'store'])->name('remaining.details.post');

// User main  Dashboard
Route::get('user-Dashboard',[UserDashboardController::class,'index'])->name('user.Dashboard');
Route::get('user-Dashboard-edit',[UserDashboardController::class,'edit'])->name('user.Dashboard.edit');
Route::put('user-Dashboard-update',[UserDashboardController::class,'update'])->name('user.Dashboard.update');
Route::get('my-subscription',[UserDashboardController::class,'mySubscription'])->name('user.my.subscription');
Route::get('my-reviews',[UserDashboardController::class,'myReviews'])->name('user.my.reviews');
Route::get('my-profile',[UserDashboardController::class,'myProfile'])->name('user.Dashboard.my.profile');

//State Country city Dropdown
Route::get('dropdown', [DropdownController::class, 'index']);
Route::post('api/fetch-states', [DropdownController::class, 'fetchState']);
Route::post('api/fetch-cities', [DropdownController::class, 'fetchCity']);


// Review section
Route::get('/reviews', [ReviewController::class,'index'])->name('reviews.index');
Route::get('/reviews/create', [ReviewController::class,'create'])->name('reviews.create');



// Contact Us Section
Route::get('/contact', [ContactUsFormController::class, 'createForm']);
Route::post('/contact', [ContactUsFormController::class, 'ContactUsForm'])->name('contact.store');
Route::post('/captcha-validation', [ContactUsFormController::class, 'capthcaFormValidate']);
Route::get('/reload-captcha', [ContactUsFormController::class, 'reloadCaptcha']);


// Find section
Route::get('find-pmhnps',[FindPmhnpsController::class,'findPpmhnps'])->name('find.pmhnps');
Route::post('find-pmhnps-post',[FindPmhnpsController::class,'findPpmhnpsPost'])->name('find.pmhnps.post');

// Custom Auth Setup

Route::prefix('admin')->group(function () {
    Route::get('dashboard', [HomeController::class, 'adminHome'])->name('admin.dashboard')->middleware('is_admin');
    Route::get('pmhnps', [HomeController::class, 'adminPmhnps'])->name('admin.pmhnps')->middleware('is_admin');
    Route::get('patients', [HomeController::class, 'adminPatients'])->name('admin.patients')->middleware('is_admin');
    Route::resource('pmhnps',PmhnpsController::class)->middleware('is_admin');
    Route::resource('temp-pmhnps',TempRegisterController::class)->middleware('is_admin');

   Route::post('single-charge',[SubscriptionController::class,'singleCharge'])->name('single.charge')->middleware('is_admin');
Route::get('single-charge',[SubscriptionController::class,'singleChargeGet'])->name('single.charge')->middleware('is_admin');
Route::get('plans/create',[SubscriptionController::class,'showPlanForm'])->name('plans.create')->middleware('is_admin');
Route::post('plans/store',[SubscriptionController::class,'savePlan'])->name('plans.store')->middleware('is_admin');

});

Route::get('home/find_pmhnps', [ListingPmhnpsController::class, 'index'])->name('home.find_pmhnps');
Route::get('home/cities/{state}', [ListingPmhnpsController::class, 'getCitiesByState']);
 Route::get('home/profile/{pid}', [ListingPmhnpsController::class, 'getProfileByid']);
// Route::post('/contactus', [ListingPmhnpsController::class, 'ContactForm']) ;


Route::post('home/contact', [ListingPmhnpsController::class,'store'])->name('contact.store');
//

Route::post('/register', [ListingPmhnpsController::class, 'review_insert']);

// Home Page
//route::view('home/find_pmhnps','home/find_pmhnps')->name('home.find_pmhnps');
// route::view('home/home.how_it_work','home/home.how_it_work')->name('home.home.how_it_work');
route::view('home/about','home/about')->name('home.about');
route::view('home/contact','home/contact')->name('home.contact');
route::view('home/terms','home/terms')->name('home.terms');
route::view('home/privacy','home/privacy')->name('home.privacy');




Route::view('test','test');

// Ajax Crud
Route::resource('ajaxposts','PostAjaxController');

// Ajax Call

Route::get('/fetch-index', [DataController::class,'index'])->name('index');
Route::get('/fetch-data', [DataController::class,'fetchData'])->name('fetch.data');

// Common controller method
Route::get('/file-open', [CommonController::class,'fileOpen'])->name('file.open');
Route::get('/add', [CommonController::class,'add'])->name('add');




Route::get('send/email', function(){

	$send_mail = 'test@gmail.com';

    dispatch(new App\Jobs\SendEmailQueueJob($send_mail));

    dd('send mail successfully !!');
});

// Custom Service provider
Route::get('server-details', [ServerController::class, 'index'])->name('index');


// Razorpay Paymentgateway

Route::get('razorpay-payment', [RazorpayPaymentController::class, 'index']);
Route::post('razorpay-payment', [RazorpayPaymentController::class, 'store'])->name('razorpay.payment.store');


// Ajax Crud | How to call ajax in laravel 
Route::controller(PostController::class)->group(function(){
    Route::get('posts', 'index');
    Route::post('posts', 'store')->name('posts.store');
});
