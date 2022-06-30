<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Auth\LoginControllers;





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

// Route::get('/', function () {
//     return view('front.index');
// });




Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/menu', [App\Http\Controllers\HomeController::class, 'menu'])->name('menu');
Route::get('/menu/{slung}', [App\Http\Controllers\HomeController::class, 'menus'])->name('menus');
Route::get('/shopping-cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.list');
Route::get('/shopping-cart/checkout', [App\Http\Controllers\CartController::class, 'checkout'])->name('checkout');
Route::get('/shopping-cart/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('shopping-cart');

Route::get('/shopping-cart/remove/{id}', [CartController::class, 'removeCart'])->name('cart.remove');
Route::get('/shopping-cart/clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

Route::get('/terms-and-conditions', [App\Http\Controllers\HomeController::class, 'terms'])->name('terms-and-conditions');
Route::get('/privacy-policy', [App\Http\Controllers\HomeController::class, 'privacy'])->name('privacy-policy');
Route::get('/copyright-statement', [App\Http\Controllers\HomeController::class, 'copyright'])->name('copyright');
Route::get('/delivery-policy', [App\Http\Controllers\HomeController::class, 'delivery'])->name('delivery');


Auth::routes();
Route::get('/shopping-cart/checkout', [App\Http\Controllers\CheckoutController::class, 'checkout'])->name('checkout');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/dashboard', [App\Http\Controllers\ClientController::class, 'dashboard'])->name('dashboard');

// SocialMedia
Route::get('/facebook', [LoginController::class, 'facebook']);
Route::get('/facebook/redirect', [LoginController::class, 'facebookRedirect']);
Route::get('/google', [LoginController::class, 'google']);
Route::get('/google/redirect', [LoginController::class, 'googleRedirect']);




Auth::routes();
Route::group(['prefix'=>'admin'], function(){


    Route::get('/', [AdminsController::class, 'index'])->name('admin.home')->middleware('is_admin');
    Route::get('/home', [AdminsController::class, 'index'])->name('admin.home')->middleware('is_admin');
    //Testimonial
    Route::get('/addTestimonial', [AdminsController::class, 'addTestimonial']);
    Route::post('/add_Testimonial', [AdminsController::class, 'add_Testimonial']);
    Route::get('/testimonials',[AdminsController::class, 'testimonials']);
    Route::get('/editTestimonial/{id}', [AdminsController::class, 'editTestimonial']);
    Route::get('/deleteTestimonial/{id}', [AdminsController::class, 'deleteTestimonial']);
    Route::post('/edit_Testimonial/{id}', [AdminsController::class, 'edit_Testimonial']);

    //Terms Privacy copyright
    //copyright
    Route::get('/copyright',[AdminsController::class, 'copyright']);
    Route::post('/edit_copyright', [AdminsController::class, 'edit_copyright']);
    //Privacy
    Route::get('/privacy',[AdminsController::class, 'privacy']);
    Route::get('/addPrivacy', [AdminsController::class, 'addPrivacy']);
    Route::get('/editPrivacy/{id}', [AdminsController::class, 'editPrivacy']);
    Route::post('/add_privacy', [AdminsController::class, 'add_privacy']);
    Route::get('/delete_privacy/{id}',[AdminsController::class, 'delete_privacy']);
    Route::post('/edit_privacy/{id}', [AdminsController::class, 'edit_privacy']);
    //Terms
    Route::get('/terms',[AdminsController::class, 'terms']);
    Route::get('/addTerms', [AdminsController::class, 'addTerms']);
    Route::get('/editTerm/{id}', [AdminsController::class, 'editTerm']);
    Route::post('/add_term', [AdminsController::class, 'add_term']);
    Route::post('/edit_term/{id}', [AdminsController::class, 'edit_term']);
    Route::get('/delete_term/{id}',[AdminsController::class, 'delete_term']);
    //About
    Route::get('/about',[AdminsController::class, 'about']);
    Route::post('/about_save', [AdminsController::class, 'about_save']);
    //Services
    Route::get('/services',[AdminsController::class, 'services']);
    Route::get('/deleteService/{id}',[AdminsController::class, 'deleteService']);
    Route::post('/edit_Services/{id}', [AdminsController::class, 'edit_Services']);
    Route::get('/editServices/{id}', [AdminsController::class, 'editServices']);
    Route::get('/addService', [AdminsController::class, 'addService']);
    Route::post('/add_Service', [AdminsController::class, 'add_Service']);

    //Pricing
    Route::get('/pricing',[AdminsController::class, 'pricing']);
    Route::get('/deletePricing/{id}',[AdminsController::class, 'deletePricing']);
    Route::post('/edit_Pricing/{id}', [AdminsController::class, 'edit_Pricing']);
    Route::get('/editPricing/{id}', [AdminsController::class, 'editPricing']);
    Route::get('/addPricing', [AdminsController::class, 'addPricing']);
    Route::post('/add_Pricing', [AdminsController::class, 'add_Pricing']);

    //Porfolio
    Route::get('/portfolio',[AdminsController::class, 'portfolio']);
    Route::get('/deletePortfolio/{id}',[AdminsController::class, 'deletePortfolio']);
    Route::post('/edit_Portfolio/{id}', [AdminsController::class, 'edit_Portfolio']);
    Route::get('/editPortfolio/{id}', [AdminsController::class, 'editPortfolio']);
    Route::get('/addPortfolio', [AdminsController::class, 'addPortfolio']);
    Route::post('/add_Portfolio', [AdminsController::class, 'add_Portfolio']);

    //Gallery
    Route::get('/gallery',[AdminsController::class, 'gallery']);
    Route::get('/editGallery/{id}',[AdminsController::class, 'editGallery']);
    Route::get('/deleteGallery/{id}',[AdminsController::class, 'deleteGallery']);
    Route::post('/save_gallery/{id}', [AdminsController::class, 'save_gallery']);
    Route::get('/addGallery', [AdminsController::class, 'addGallery']);
    Route::get('/galleryList', [AdminsController::class, 'galleryList']);
    Route::post('/add_Gallery', [AdminsController::class, 'add_Gallery']);

    //Slider
    Route::get('/slider',[AdminsController::class, 'slider']);
    Route::get('/editSlider/{id}',[AdminsController::class, 'editSlider']);
    Route::get('/deleteSlider/{id}',[AdminsController::class, 'deleteSlider']);
    Route::post('/edit_Slider/{id}', [AdminsController::class, 'edit_Slider']);
    Route::get('/addSlider', [AdminsController::class, 'addSlider']);
    Route::post('/add_Slider', [AdminsController::class, 'add_Slider']);

    //Banner
    Route::get('/banner',[AdminsController::class, 'banners']);
    Route::get('/editBanner/{id}',[AdminsController::class, 'editBanner']);
    Route::post('/edit_Banner/{id}', [AdminsController::class, 'edit_Banner']);

    //Pages
    Route::get('/pages',[AdminsController::class, 'pages']);
    Route::get('/editPage/{id}',[AdminsController::class, 'editPage']);
    Route::get('/deletePage/{id}',[AdminsController::class, 'deletePage']);
    Route::post('/edit_Page/{id}', [AdminsController::class, 'edit_Page']);
    Route::get('/addPage', [AdminsController::class, 'addPage']);
    Route::post('/add_Page', [AdminsController::class, 'add_Page']);
    Route::post('/set_Page/{name}', [AdminsController::class, 'set_Page']);
    Route::get('/setPage/{name}', [AdminsController::class, 'setPage']);


    //products
    Route::get('/products',[AdminsController::class, 'products']);
    Route::get('/editProduct/{id}',[AdminsController::class, 'editProduct']);
    Route::get('/deleteProduct/{id}',[AdminsController::class, 'deleteProduct']);
    Route::post('/edit_Product/{id}', [AdminsController::class, 'edit_Product']);
    Route::get('/addProduct', [AdminsController::class, 'addProduct']);
    Route::post('/add_Product', [AdminsController::class, 'add_Product']);

    //products featured
    Route::get('/Products_featured',[AdminsController::class, 'Products_featured']);
    Route::get('/swap/{id}/{status}',[AdminsController::class, 'swap_status']);


    //products On offer
    Route::get('/Products_offer',[AdminsController::class, 'Products_offer']);
    Route::get('/swapoffer/{id}',[AdminsController::class, 'swapoffer']);
    Route::get('/deleteOffer/{id}',[AdminsController::class, 'deleteOffer']);
    Route::post('/swap_offer/{id}',[AdminsController::class, 'swap_offer']);


    //Admin
    Route::get('/admins',[AdminsController::class, 'admins']);
    Route::get('/editAdmin/{id}',[AdminsController::class, 'editAdmin']);
    Route::get('/deleteAdmin/{id}',[AdminsController::class, 'deleteAdmin']);
    Route::post('/edit_Admin/{id}', [AdminsController::class, 'edit_Admin']);
    Route::get('/addAdmin', [AdminsController::class, 'addAdmin']);
    Route::post('/add_Admin', [AdminsController::class, 'add_Admin']);

    //User
    Route::get('/users',[AdminsController::class, 'users']);
    Route::get('/editUser/{id}',[AdminsController::class, 'editUser']);
    Route::get('/deleteUser/{id}',[AdminsController::class, 'deleteUser']);
    Route::post('/edit_User/{id}', [AdminsController::class, 'edit_User']);
    Route::get('/addUser', [AdminsController::class, 'addUser']);
    Route::post('/add_User', [AdminsController::class, 'add_User']);

    //Blog Controls
    Route::get('/blog',[AdminsController::class, 'blog']);
    Route::get('/editBlog/{id}',[AdminsController::class, 'editBlog']);
    Route::get('/delete_Blog/{id}',[AdminsController::class, 'delete_Blog']);
    Route::post('/edit_Blog/{id}', [AdminsController::class, 'edit_Blog']);
    Route::get('/addBlog', [AdminsController::class, 'addBlog']);
    Route::post('/add_Blog', [AdminsController::class, 'add_Blog']);
    //Categories Control
    Route::get('/categories',[AdminsController::class, 'categories']);
    Route::get('/editCategories/{id}',[AdminsController::class, 'editCategories']);
    Route::get('/deleteCategory/{id}',[AdminsController::class, 'deleteCategory']);
    Route::post('/edit_Category/{id}', [AdminsController::class, 'edit_Category']);
    Route::get('/addCategory', [AdminsController::class, 'addCategory']);
    Route::post('/add_Category', [AdminsController::class, 'add_Category']);

    //Service Renreded Control
    Route::get('/service_rendered',[AdminsController::class, 'service_rendered']);
    Route::get('/editService_rendered/{id}',[AdminsController::class, 'editService_rendered']);
    Route::get('/deleteService_rendered/{id}',[AdminsController::class, 'deleteService_rendered']);
    Route::post('/edit_Service_rendered/{id}', [AdminsController::class, 'edit_Service_rendered']);
    Route::get('/addService_rendered', [AdminsController::class, 'addService_rendered']);
    Route::post('/add_Service_rendered', [AdminsController::class, 'add_Service_rendered']);

    //Daily
    Route::get('/daily',[AdminsController::class, 'daily']);
    Route::get('/editDaily/{id}',[AdminsController::class, 'editDaily']);
    Route::get('/deleteDaily/{id}',[AdminsController::class, 'deleteDaily']);
    Route::post('/edit_Daily/{id}', [AdminsController::class, 'edit_Daily']);
    Route::get('/addDaily', [AdminsController::class, 'addDaily']);
    Route::post('/add_Daily', [AdminsController::class, 'add_Daily']);


    //Sub Categories
    Route::get('/subCategories',[AdminsController::class, 'subCategories']);
    Route::get('/editSubCategories/{id}',[AdminsController::class, 'editSubCategories']);
    Route::get('/deleteSubCategory/{id}',[AdminsController::class, 'deleteSubCategory']);
    Route::post('/edit_SubCategory/{id}', [AdminsController::class, 'edit_SubCategory']);
    Route::get('/addSubCategory', [AdminsController::class, 'addSubCategory']);
    Route::post('/add_SubCategory', [AdminsController::class, 'add_SubCategory']);

    //Active Services
    Route::get('/traceServices',[AdminsController::class, 'traceServices']);
    Route::get('/editTraceServices/{id}',[AdminsController::class, 'editTraceServices']);
    Route::get('/deleteTraceServices/{id}',[AdminsController::class, 'deleteTraceServices']);
    Route::post('/edit_TraceServices/{id}', [AdminsController::class, 'edit_TraceServices']);
    Route::get('/addTraceServices', [AdminsController::class, 'addTraceServices']);
    Route::post('/add_TraceServices', [AdminsController::class, 'add_TraceServices']);

    // Generic Routes
    Route::get('/form',[AdminsController::class, 'form']);
    Route::get('/list',[AdminsController::class, 'list']);
    Route::get('/formfile',[AdminsController::class, 'formfile']);
    Route::get('/formfiletext',[AdminsController::class, 'formfiletext']);

    //Payments,Orders, Discounts & Coupons
    Route::get('/payments',[AdminsController::class, 'payments']);
    Route::get('/orders',[AdminsController::class, 'orders']);
    Route::get('/coupons',[AdminsController::class, 'coupons']);
    Route::get('/discounts',[AdminsController::class, 'discounts']);
    Route::get('/deleteCoupon/{id}',[AdminsController::class, 'deleteCoupon']);
    Route::get('/addCoupon',[AdminsController::class, 'addCoupon']);
    Route::post('/add_Coupon',[AdminsController::class, 'add_Coupon']);
    Route::get('/mark_order/{id}',[AdminsController::class, 'mark_order']);




    //Notifications
    Route::get('/notifications',[AdminsController::class, 'notifications']);
    Route::get('/notification/{id}',[AdminsController::class, 'notification']);

    //Comments & Reviews
    Route::get('/comments',[AdminsController::class, 'comments']);
    Route::get('/reviews',[AdminsController::class, 'reviews']);
    Route::get('/approve/{id}/{type}',[AdminsController::class, 'approve']);
    Route::get('/decline/{id}/{type}',[AdminsController::class, 'decline']);

    // Error Pages
    Route::get('/403',[AdminsController::class, 'error403']);
    Route::get('/404',[AdminsController::class, 'error404']);
    Route::get('/405',[AdminsController::class, 'error405']);
    Route::get('/500',[AdminsController::class, 'error500']);
    Route::get('/503',[AdminsController::class, 'error503']);

    //Updates
    Route::get('/updates',[AdminsController::class, 'updates']);
    Route::get('/update/{id}',[AdminsController::class, 'update']);
    Route::get('/mark/{id}',[AdminsController::class, 'mark']);

    // Gallery
    Route::get('/gallery',[AdminsController::class, 'gallery']);

    //Under Contruction
    Route::get('/under_construction',[AdminsController::class, 'under_construction']);

    //Wizard
    Route::get('/wizard',[AdminsController::class, 'wizard']);

    //Maps
    Route::get('/maps',[AdminsController::class, 'maps']);
    // SiteSettings
    Route::get('/sitesettings',[AdminsController::class, 'sitesettings']);
    Route::post('/savesitesettings',[AdminsController::class, 'savesitesettings']);
    //Messages
    Route::get('/allMessages', [AdminsController::class, 'allMessages']);
    Route::get('/unread', [AdminsController::class, 'unread']);
    Route::get('/read/{id}', [AdminsController::class, 'read']);
    Route::post('/reply/{id}', [AdminsController::class, 'reply']);
    Route::get('/deleteMessage/{id}', [AdminsController::class, 'deleteMessage']);

    //Subscribers
    Route::get('/subscribers', [AdminsController::class, 'subscribers']);
    Route::get('/mailSubscribers/{email}', [AdminsController::class, 'mailSubscribers']);
    Route::get('/mailSubscriber/{email}', [AdminsController::class, 'mailSubscriber']);
    Route::get('/deleteSubscriber/{id}', [AdminsController::class, 'deleteSubscriber']);

    });



Auth::routes();
Route::group(['prefix'=>'mobile'], function(){

    Route::get('', function () {
        return view('mobile.index');
    });
    // Route::get('/get-started', function () {
    //     return view('mobile.home');
    // });

    Route::get('/sign-in', function () {
        return view('mobile.sign-in');
    });

    Route::get('/veryfy-number', function () {
        return view('mobile.veryfy-number');
    });

    Route::get('/verification-code', function () {
        return view('mobile.verification-code');
    });



    Route::post('/update-profile', [App\Http\Controllers\MobileController::class, 'update_profile'])->name('update-profile');
    Route::post('/verify', [App\Http\Controllers\MobileController::class, 'verify'])->name('send-verify');
    Route::post('/send-verification', [App\Http\Controllers\MobileController::class, 'send_verification'])->name('send-verification');
    Route::post('/login', [App\Http\Controllers\MobileLoginController::class, 'login'])->name('mobile.login');
    Route::post('/sign-up', [App\Http\Controllers\MobileLoginController::class, 'sign_up_post'])->name('mobile.login');
    Route::get('/get-started', [App\Http\Controllers\MobileController::class, 'index'])->name('mobile.home');
    Route::get('/location', [App\Http\Controllers\MobileController::class, 'location'])->name('mobile.location');
    Route::get('/sign-up', [App\Http\Controllers\MobileLoginController::class, 'sign_up'])->name('mobile.sign-up');
    Route::get('/logout', [App\Http\Controllers\MobileLoginController::class, 'logouts']);
    Route::get('/menu', [App\Http\Controllers\MobileController::class, 'menus'])->name('menu');
    Route::get('/menus/{slung}', [App\Http\Controllers\MobileController::class, 'menu'])->name('menu');
    Route::get('/menu/{slung}', [App\Http\Controllers\MobileController::class, 'category'])->name('category');
    Route::get('/edit-profile-pic', [App\Http\Controllers\MobileController::class, 'edit_profile_pic'])->name('edit-profile-pic');


    Route::get('/shopping-cart', function () {
        return view('mobile.shopping-cart');
    });

    Route::get('/search', function () {
        return view('mobile.search');
    });

    Route::get('/checkout', function () {
        return view('mobile.checkout');
    });


    Route::get('/profile', function () {
        return view('mobile.profile');
    });

    Route::get('/edit-profile', function () {
        return view('mobile.edit-profile');
    });

    Route::get('/offers', function () {
        return view('mobile.offers');
    });

    Route::get('/profile/transactions', function () {
        return view('mobile.transactions');
    });

    Route::get('/profile/orders', function () {
        return view('mobile.orders');
    });
});
