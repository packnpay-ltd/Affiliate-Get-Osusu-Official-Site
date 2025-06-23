<?php


use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\SupportTicketController;
use App\Http\Controllers\MarketPlaceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\PaySmallSmallController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Auth\GoogleLoginController;
use App\Http\Controllers\CouponController;
use App\Models\OrderHistory;
use App\Models\InstallmentPlan;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AffiliateController;
use App\Http\Controllers\ReferralController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

require __DIR__ . '/auth.php';


Route::get('/auth/google', [GoogleLoginController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleLoginController::class, 'handleGoogleCallback']);


Route::get('/', [HomeController::class, 'index'])->name('home');

// customers area
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');

   Route::get('/wallet', [WalletController::class, 'showWallet'])->name('wallet.show');


});

// Affiliate Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/affiliate/overview', [AffiliateController::class, 'overview'])->name('affiliate.overview');
    Route::get('/affiliate/referrals', [AffiliateController::class, 'referrals'])->name('affiliate.referrals');
    Route::get('/affiliate/earnings', [AffiliateController::class, 'earnings'])->name('affiliate.earnings');
});

Route::get('/join/{code}', [ReferralController::class, 'handleReferral'])->name('referral.join');






