<?php

use App\Http\Controllers\admin\PassengerController;
use App\Http\Controllers\AdminControllerCopy;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CollectorController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\FlightControllerCopy;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MultiCity\MultiCitiesFightController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\HajjUmrahController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Auth::routes();


Route::get('/', [HomeController::class, 'welcome'])->name('index');
Route::get('lang/{lang}', [HomeController::class, 'switchLang'])->name('lang.switch');

Route::get('view-packages/{id}', [FlightControllerCopy::class, 'getFlightDetails2'])->name('viewpackages');

Route::view('iframe', 'iframe')->name('iframe');

Route::get('contact-us', [ContactUsController::class, 'show'])->name('contact');

Route::get('hajj-umrah-packages', [HajjUmrahController::class, 'hajj_umrah_listing'])->name('hajj_umrah_listing');
Route::get('hajj-umrah-details/{id}', [HajjUmrahController::class, 'hajj_umrah_details'])->name('hajjUmrahPackage_details');
Route::post('hajj-umrah-booking-form', [HajjUmrahController::class, 'hajjumrah_form'])->name('hajjumrah_form');

Route::post('hajj-umrah-booking-form-store', [HajjUmrahController::class, 'hajjumrah_form_store'])->name('reservation_store');


Route::view('about-us', 'about')->name('about');
Route::view('faqs', 'faqs')->name('faqs');
// --- Social Login ---
Route::get('login/{provider}', [SocialController::class, 'redirect'])->name('social.redirect');
Route::get('login/{provider}/callback', [SocialController::class, 'callback'])->name('social.callback');
// --- Flight Booking ---

Route::group(['prefix' => 'flights'], function () {

    Route::post('multi-flights-search', [MultiCitiesFightController::class, 'multiFlightsSearch'])->name('flight.testing');
    Route::post('multi-flight-detail', [MultiCitiesFightController::class, 'multiFlightDetails'])->name('multi-flight');
    Route::post('multi-flight-booking', [MultiCitiesFightController::class, 'bookMultiFlight'])->name('book-multi-flight');
    Route::view('invoice-mutli', 'invoice-mutli')->name('invoice-mutli');
    Route::get('/itinerary-multi/{id}', [MultiCitiesFightController::class, 'generateTicketMulti'])->name('ItineraryMulti');
    Route::get('/itinerary-multi-download/{id}', [MultiCitiesFightController::class, 'download_multi_Ticket'])->name('Itinerary-download-multi');
    Route::post('search', [FlightController::class, 'search'])->name('search');
    //Route::get('searching/{id}', [FlightController::class, 'test_search'])->name('searching');
    Route::post('single-flight', [FlightController::class, 'getFlightDetails'])->name('single-flight');
    Route::post('flight-booking', [FlightController::class, 'bookFlight'])->name('book-flight');
    Route::post('flight-booking-package/', [FlightController::class, 'bookFlight2'])->name('book-flight2');
    Route::post('flight-booking-card', [FlightController::class, 'bookFlightCard'])->name('book-flight-card');
    Route::post('book-flight', [FlightController::class, 'store'])->name('store.flight');
    Route::post('book-multi-flight', [MultiCitiesFightController::class, 'store_mutli'])->name('store.multiflight');
    // Route::post('book-flight-package', [FlightController::class, 'store2'])->name('store.flight2');

    Route::view('our-flights', 'admin-flights')->name('admin-flights');
    Route::view('invoice', 'invoice')->name('invoice');
    Route::get('/itinerary/{id}', [FlightController::class, 'generateTicket'])->name('Itinerary');
    Route::get('/itinerary-download/{id}', [FlightController::class, 'download_Ticket'])->name('Itinerary-download');
});

Route::get('/invoice_pdff/Itinerary/{id}', [FlightControllerCopy::class, 'generateinvoice_pdf'])->name('invoice_pdff');
Route::get('/invoice_multi_pdff/Itinerary/{id}', [MultiCitiesFightController::class, 'generatemultiinvoice_pdf'])->name('invoice_multi_pdff');
// --- Ticket Download ---
Route::get('/download/{id}', [FlightControllerCopy::class, 'createPDF'])->name('ticket.pdf');
Route::view('account-success', 'account-success')->name('account-success');
// --- Dashboard ---
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::group(['prefix' => 'user-settings'], function () {
        Route::Resources([
            'profile' => ProfileController::class,
        ]);
    });
    Route::post('change-password', [ProfileController::class, 'changePassword'])->name('change.password');
    // --- User ---
    Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
        Route::get('/', [UserController::class, 'dashboard'])->name('user-dashboard');
        Route::view('my-profile', 'user.my-profile')->name('my.profile');
        Route::view('my-bookings', 'user.my-bookings')->name('my-bookings');
        Route::get('Ticket/{pnr}', [UserController::class, 'userticket'])->name('ticket');


        Route::post('Ticket', [UserController::class, 'payTicket'])->name('ticket.pay');
        Route::get('/user-history/list', [UserController::class, 'getUserDataHistory'])->name('user-history.list');


        Route::post('Ticket/sendmail', [UserController::class, 'sendmail_user'])->name('sendmail_user');


        Route::post('query/sendmail', [UserController::class, 'sendmail_userquery'])->name('querymail');

        Route::post('/user-Upload-Image', [UserController::class, 'user_uploadimage'])->name('uploadimage_user');
    });
    // --- Admin ---
    Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
        Route::get('', [AdminControllerCopy::class, 'dashboard'])->name('admin-dashboard');
        Route::view('my-profile', 'admin.my-profile')->name('admin.profile');
        Route::view('orders', 'admin.orders');

        Route::Resources([
            'flights' => FlightControllerCopy::class,
            'users' => UserController::class,
            'products' => ProductController::class,
            'commissions' => CommissionController::class
        ]);
        Route::get('Ticket/{pnr}', [AdminControllerCopy::class, 'userticket'])->name('admin.ticket');
        Route::get('editbooking/{pnr}', [AdminControllerCopy::class, 'editbooking'])->name('admin.editbooking');
        Route::post('updatebooking/{id}', [AdminControllerCopy::class, 'updatebooking'])->name('updatebooking.update');
        Route::get('uploadticket', [AdminControllerCopy::class, 'upload_ticket'])->name('uploadticket');

        Route::get('modify/ticket-details/{id}/{id2}', [AdminControllerCopy::class, 'upload_ticket_view'])->name('uploadticketview');

        Route::get('modify/ticket-dates/{id}/{id2}', [AdminControllerCopy::class, 'modify_ticket_dates'])->name('changedates');


        Route::post('upload/ticket/{id}', [AdminControllerCopy::class, 'upload_ticket_store'])->name('uploadticket_post');

        Route::get('upload/ticket/download/{id}', [AdminControllerCopy::class, 'getDownload'])->name('downloadticket');


        Route::get('admin/currency-converter', [AdminControllerCopy::class, 'currency_converter_view'])->name('currencyconverter');

        Route::post('currency', [AdminControllerCopy::class, 'exchangeCurrency'])->name('currency');


        Route::view('all-bookings', 'admin.travels')->name('all-bookings');
        Route::view('all-bookings/new', 'admin.bookings')->name('all-bookings.new');
        Route::resource('finance', TransactionController::class);
        Route::get('pdf/invoice/{id}', [InvoiceController::class, 'download'])->name('pdf.invoice');
        Route::resource('passengers', PassengerController::class);

        //admin-aboutus
        Route::get('contactus', [ContactUsController::class, 'adminshow'])->name('contactus');

        //adding contact us details
        Route::get('create_contactus', [ContactUsController::class, 'create']);
        Route::post('store_contactus', [ContactUsController::class, 'store']);

        //updating contact us details
        Route::get('edit_contactus/{id}', [ContactUsController::class, 'edit']);
        Route::post('update_contactus/{id}', [ContactUsController::class, 'update'])->name('update_contactus');

        //Route::get('createcontact', [ContactUsController::class,'create']);
        //Route::get('updatecontact/{id}', [ContactUsController::class,'update']);


        Route::get('/user-history/list', [AdminControllerCopy::class, 'allUserDataHistory'])->name('all-user-history.list');
        Route::get('collector', [AdminControllerCopy::class, 'getCollectors'])->name('collector');

        Route::get('collector/names', [AdminControllerCopy::class, 'getCollectors_names'])->name('collectorr');

        Route::get('collectors', [UserController::class, 'allCollectors'])->name('collectors');


        Route::post('select/collectors', [AdminControllerCopy::class, 'Select_Collectors'])->name('selectcollector');

        Route::post('select/collectors/store', [AdminControllerCopy::class, 'Select_Collectors_Store'])->name('selectcollector_post');

        Route::get('collectors/Accounts', [AdminControllerCopy::class, 'Collectors_Accounts'])->name('collectors_accounts');

        Route::get('customers', [UserController::class, 'allCustomers'])->name('customers');
        Route::get('admins', [UserController::class, 'allAdmins'])->name('admins');

        Route::get('all-users', [UserController::class, 'all'])->name('all.users');

        Route::get('add/user', [UserController::class, 'add_role_account'])->name('userscreate');


        Route::post('add/user/store', [UserController::class, 'add_role_store'])->name('addrole_post');

        Route::post('update-packages', [PackageController::class, 'update'])->name('package.edit_post');

        Route::get('all-packages', [PackageController::class, 'all'])->name('all.packages');
        Route::get('create-package', [PackageController::class, 'create'])->name('create.package');
        Route::get('edit-packages/{id}', [PackageController::class, 'edit'])->name('edit.packages');
        Route::get('delete-packages/{id}', [PackageController::class, 'delete'])->name('delete.packages');
        Route::post('post-package', [PackageController::class, 'store'])->name('package.post');

        // Hajj and umrah
        Route::get('all-Hajj-umrah-packages', [HajjUmrahController::class, 'all'])->name('all.hajjumrah');
        Route::get('create-Hajj-umrah-package', [HajjUmrahController::class, 'create'])->name('create.hajjumrah');
        Route::get('edit-hajjumrah/{id}', [HajjUmrahController::class, 'edit'])->name('edit.hajjumrah');
        Route::get('delete-hajjumrah/{id}', [HajjUmrahController::class, 'delete'])->name('delete.hajjumrah');
        Route::post('post-hajjumrah', [HajjUmrahController::class, 'store'])->name('hajjumrah.post');
        Route::post('update-hajjumrah', [HajjUmrahController::class, 'update'])->name('hajjumrah.edit_post');

        Route::get('collector-detail/{id}', [AdminControllerCopy::class, 'collecterDetails'])->name('collector.detail');
        Route::post('update-collections', [CommissionController::class, 'collectAmount'])->name('cash.collection');

        //add
        Route::get('cancel-pnr/{id}/{pnr}', [AdminControllerCopy::class, 'delete_pnr'])->name('cancel-pnr');
        //
        Route::get('setting', [SettingController::class, 'index'])->name('setting.list');
        Route::post('setting.update', [SettingController::class, 'update'])->name('setting.update');
    });
    // --- Collector ---
    Route::group(['prefix' => 'collector', 'middleware' => 'auth'], function () {
        Route::get('', [CollectorController::class, 'dashboard'])->name('collector-dashboard');
        Route::get('/account', [CollectorController::class, 'accounts'])->name('collector-account');
        Route::get('/paginate', [CollectorController::class, 'paginate'])->name('collector-paginate');
        Route::get('/history', [CollectorController::class, 'history'])->name('collector-history');
        Route::post('/search-result', [CollectorController::class, 'search'])->name('collector-search');
        Route::get('/amount-collect/{pnr}', [CollectorController::class, 'paymentStatus'])->name('amount-collect');
        Route::get('/collector-history/list', [CollectorController::class, 'getCollectordataHistory'])->name('collector-history.list');
    });
});


Route::get('/admin/clear', function () {
    Artisan::call('optimize:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return 'done';
});
