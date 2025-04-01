<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    
    
    
    Route::post('/register-account-type', [RegisteredUserController::class, 'handleRegistration'])->name('register.submit');
    Route::get('/register/individual', [RegisteredUserController::class, 'registerIndividual'])->name('individual.register');
    Route::get('/register/corporate', [RegisteredUserController::class, 'registerCorporate'])->name('corporate.register');
    Route::get('/register/corporate/otp', [RegisteredUserController::class, 'registerCorporateOTP'])->name('corporate.register.otp');
    Route::get('/register/individual/otp', [RegisteredUserController::class, 'registerIndividualOTP'])->name('individual.register.otp');
    Route::post('/register/corporate/otp/store', [RegisteredUserController::class, 'registerCorporateOTPstore'])->name('register.corporate.otp.store');
    
    Route::post('/register/individual/otp/store', [RegisteredUserController::class, 'registerIndividualOTPstore'])->name('register.individual.otp.store');
    Route::post('/verify/corporate/otp', [RegisteredUserController::class, 'verifyCorporateOTP'])->name('verify.corporate.otp');
    Route::post('/verify/individual/otp', [RegisteredUserController::class, 'verifyIndividualOTP'])->name('verify.individual.otp');
    
    
    
    
    Route::get('admin/login', [AuthenticatedSessionController::class, 'adminCreate'])->name('admin.login');
    Route::post('admin/login', [AuthenticatedSessionController::class, 'adminStore']);
        
        
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);
    
    Route::get('/otp', [RegisteredUserController::class, 'showOtpForm'])->name('otp.form');
    Route::post('/otp', [RegisteredUserController::class, 'verifyOtp'])->name('otp.verify');

    Route::post('/resend-otp', [RegisteredUserController::class, 'resend'])->name('otp.resend');
    
    Route::get('/protect-your-account', [RegisteredUserController::class, 'showPasswordForm'])->name('protect.account');
    Route::post('/protect-your-account', [RegisteredUserController::class, 'setPassword']);


    Route::get('/account-setup', [RegisteredUserController::class, 'accountSetup'])->name('account.setup');
    Route::get('/verify-your-account', [RegisteredUserController::class, 'verifyAccount'])->name('verify.account');
    Route::post('/verify-account', [RegisteredUserController::class, 'verifyAccountDetails'])->name('verify.account.post');
    
    Route::get('/verify-account-document', [RegisteredUserController::class, 'verifyAccountDoc'])->name('verify.account.document');
    Route::post('/upload-document', [RegisteredUserController::class, 'uploadDocument'])->name('upload.document');



    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
