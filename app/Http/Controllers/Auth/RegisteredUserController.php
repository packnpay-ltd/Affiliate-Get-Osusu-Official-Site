<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Services\UserActivityService;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Wallet;
use Illuminate\Support\Facades\Http;
use App\Mail\OtpMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;





class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */




     public function handleRegistration(Request $request)
    {
        $request->validate([
            'account_type' => 'required|in:individual,corporate'
        ]);

        $accountType = $request->input('account_type');

        if ($accountType === 'individual') {
            return redirect()->route('individual.register');
        }

        return redirect()->route('corporate.register');
    }

        public function registerIndividual(): View
    {
        $referralCode = request()->query('ref');
        if ($referralCode) {
            session(['referral_code' => $referralCode]);
        }
        return view('auth.individual_register_home', ['referralCode' => $referralCode]);
    }

        public function registerCorporate(): View
    {
        return view('auth.corporate_register_home');
    }


 public function registerCorporateOTPstore(Request $request): RedirectResponse
{


    $validator = Validator::make($request->all(), [
        'name' => ['required', 'string', 'max:255'],
        'organisation_name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
        'country_code' => ['required', 'string', 'max:5'],
        'phone_number' => ['required', 'string', 'max:255'],
        'organisation_type' => ['required', 'string', 'max:255'],
        'about_us' => ['required', 'string', 'max:255'],
    ]);

        if ($validator->fails()) {
        $errorMessages = $validator->errors()->all();
        toast(implode('<br>', $errorMessages), 'error');
        return back()->withInput();
    }

    // Remove the '+' sign from the country code
    $countryCode = str_replace('+', '', $request->country_code);

    // Combine country code and phone number
    $fullPhoneNumber = $countryCode . $request->phone_number;

    // Normalize the phone number: Remove any leading '0' after the country code
    $fullPhoneNumber = preg_replace('/^(' . preg_quote($countryCode, '/') . ')0+/', '$1', $fullPhoneNumber);

    // Validate the phone number length (example: Nigerian phone numbers are 13 digits with country code)
    $expectedLength = 13; // Example: 234 (country code) + 10 digits = 13 digits
    if (strlen($fullPhoneNumber) !== $expectedLength) {
        toast('Invalid phone number. Please enter a valid number.', 'error');
        return back();
    }

    // Check if a user exists with the given email
    $user = User::where('email', $request->email)->first();

    if ($user) {
        if (is_null($user->password)) {
            // User exists but no password, send OTP
            $otp = rand(1000, 9999);
            $hashedOtp = bcrypt($otp); // Hash the OTP for security
            $user->update([
                'otp' => $otp,
                'name' => $request->name,
                'organisation_name' => $request->organisation_name,
                'organisation_type' => $request->organisation_type,
                'about_us' => $request->about_us,
            ]);

            // Store session data
            session([
                'user_email' => $user->email,
                'user_phone_number' => $fullPhoneNumber,
                'user_name' => $request->name,
                'organisation_name' => $request->organisation_name,
                'organisation_type' => $request->organisation_type,
                'about_us' => $request->about_us,
            ]);

            // Send OTP via Email
            Mail::to($user->email)->send(new \App\Mail\OtpMail($otp));

            // Send OTP via SMS using Termii API
           $this->sendKudismsOTP($fullPhoneNumber, $otp);

            toast('Complete your registration by verifying the OTP.', 'info');
            return redirect()->route('corporate.register.otp');
        } elseif (is_null($user->name)) {
            session([
                'user_email' => $user->email,
                'user_phone_number' => $fullPhoneNumber,
                'user_name' => $request->name,
                'organisation_name' => $request->organisation_name,
                'organisation_type' => $request->organisation_type,
                'about_us' => $request->about_us,
            ]);
            toast('Complete your registration by setting up your account.', 'info');
            return redirect()->route('register.submit');
        } else {
            toast('This email is already registered. Please log in.', 'error');
            return redirect()->route('login');
        }
    }

    // Check if phone number is already in use
    if (User::where('phone_number', $fullPhoneNumber)->exists()) {
        toast('The phone number has already been taken.', 'error');
        return back();
    }

     // If no user exists, create a new one
    $otp = rand(1000, 9999);
    $hashedOtp = bcrypt($otp); // Hash the OTP for security

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone_number' => $fullPhoneNumber,
        'organisation_name' => $request->organisation_name,
        'organisation_type' => $request->organisation_type,
        'about_us' => $request->about_us,
        'otp' => $hashedOtp,
        'otp_expires_at' => now()->addMinutes(5), // OTP expires in 5 minutes
    ]);

    Wallet::create([
        'user_id' => $user->id,
        'amount' => 0.00,
    ]);

    // Send OTP via Email
    Mail::to($user->email)->send(new \App\Mail\OtpMail($otp));

    // Send OTP via SMS using Termii API
     $this->sendKudismsOTP($fullPhoneNumber, $otp);

    // Store session data
    session([
        'user_email' => $user->email,
        'user_phone_number' => $fullPhoneNumber,
        'user_name' => $request->name,
        'organisation_name' => $request->organisation_name,
        'organisation_type' => $request->organisation_type,
        'about_us' => $request->about_us,
    ]);

    toast('OTP sent successfully. Please verify.', 'success');
    return redirect()->route('corporate.register.otp');
}


   public function registerCorporateOTP(): View
    {
            // Retrieve the user's email from the session
        $email = session('user_email');

        if (!$email) {
            // If the email is not in session, show an error
            toast('Session expired. Please register again.', 'error');
            return redirect()->route('corporate.register');
        }
        return view('auth.corporate_register_otp');
    }



        public function verifyCorporateOTP(Request $request)
{
    $validator = Validator::make($request->all(), [
        'password' => ['required'],
    ]);

        if ($validator->fails()) {
        $errorMessages = $validator->errors()->all();
        toast(implode('<br>', $errorMessages), 'error');
        return back()->withInput();
    }
    // Retrieve the OTP entered by the user
    $otp = implode('', $request->input('otp')); // Combine OTP digits into a single string
    $email = session('user_email');

    if (!$email) {
        // If email is not in session, show error and redirect
        toast('Email session is not available. Please try again.', 'error');
        return redirect()->route('corporate.register');
    }

    // Retrieve the user from the database
    $user = User::where('email', $email)->first();

    if (!$user) {
        // If user is not found, show error and redirect
        toast('User not found. Please register again.', 'error');
        return redirect()->route('corporate.register');
    }

    // Check if OTP has expired
    if ($user->otp_expires_at && $user->otp_expires_at < now()) {
        toast('The OTP has expired. Please request a new one.', 'error');
        return back();
    }

    // Compare the OTPs after ensuring they are both strings
    if (Hash::check($otp, $user->otp)) {
        // If OTP matches, set the password and clear the OTP
        $user->update([
            'verify_status' => 'active',
            'password' => bcrypt($request->password), // Hash and store the password
            'otp' => null, // Clear the OTP after successful verification
            'otp_expires_at' => null, // Clear the OTP expiration
        ]);

        Auth::login($user);

        // Send Welcome Email with a UI template
        Mail::to($user->email)->send(new \App\Mail\WelcomeMail($user));
        toast('Account verified successfully!', 'success');
        return redirect()->route('dashboard.marketplace');
    }

    // If OTP doesn't match, show error
    toast('The OTP entered is incorrect or expired.', 'error');
    return back();
}



public function registerIndividualOTPstore(Request $request): RedirectResponse
{
    // Validate user input
    $validator = Validator::make($request->all(), [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
        'country_code' => ['required', 'string', 'max:5'],
        'phone_number' => ['required', 'string', 'max:15'],
        'about_us' => ['required', 'string', 'max:255'], // Add password validation
    ]);

    if ($validator->fails()) {
        $errorMessages = $validator->errors()->all();
        toast(implode('<br>', $errorMessages), 'error');
        return back()->withInput();
    }

    // Remove the '+' sign from the country code
    $countryCode = str_replace('+', '', $request->country_code);

    // Combine country code and phone number
    $fullPhoneNumber = $countryCode . $request->phone_number;

    // Normalize the phone number: Remove any leading '0' after the country code
    $fullPhoneNumber = preg_replace('/^(' . preg_quote($countryCode, '/') . ')0+/', '$1', $fullPhoneNumber);

    // Validate the phone number length (example: Nigerian phone numbers are 13 digits with country code)
    $expectedLength = 13; // Example: 234 (country code) + 10 digits = 13 digits
    if (strlen($fullPhoneNumber) !== $expectedLength) {
        toast('Invalid phone number. Please enter a valid number.', 'error');
        return back();
    }

    // Check if a user exists with the given email
    $user = User::where('email', $request->email)->first();

    if ($user) {
        if (is_null($user->password)) {
            // User exists but no password, send OTP
            $otp = rand(1000, 9999);
            $hashedOtp = bcrypt($otp); // Hash the OTP for security
            $user->update([
                'password' => bcrypt($request->password), // Hash and store the password
                'otp' => $hashedOtp,
                'otp_expires_at' => now()->addMinutes(5), // OTP expires in 5 minutes
                'name' => $request->name,
                'about_us' => $request->about_us,
            ]);

            // Store session data
            session([
                'user_email' => $user->email,
                'user_phone_number' => $fullPhoneNumber,
                'user_name' => $request->name,
                'about_us' => $request->about_us,
            ]);

            // Send OTP via Email
            Mail::to($user->email)->send(new \App\Mail\OtpMail($otp));

            // Send OTP via SMS using Kudisms
            $this->sendKudismsOTP($fullPhoneNumber, $otp);

            toast('Complete your registration by verifying the OTP.', 'info');
            return redirect()->route('individual.register.otp');
        } else {
            toast('This email is already registered. Please log in.', 'error');
            return back();
        }
    }

    // Check if phone number is already in use
    if (User::where('phone_number', $fullPhoneNumber)->exists()) {
        toast('The phone number is already registered. Please log in or use a different number.', 'error');
        return back();
    }

    // If no user exists, create a new one
    $otp = rand(1000, 9999);
    $hashedOtp = bcrypt($otp); // Hash the OTP for security

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone_number' => $fullPhoneNumber,
        'about_us' => $request->about_us,
        'password' => bcrypt($request->password), // Hash and store the password
        'otp' => $hashedOtp,
        'otp_expires_at' => now()->addMinutes(5), // OTP expires in 5 minutes
    ]);

    Wallet::create([
        'user_id' => $user->id,
        'amount' => 0.00,
    ]);

    // Send OTP via Email
    Mail::to($user->email)->send(new \App\Mail\OtpMail($otp));

    // Send OTP via SMS using Kudisms
    $this->sendKudismsOTP($fullPhoneNumber, $otp);

    // Store session data
    session([
        'user_email' => $user->email,
        'user_phone_number' => $fullPhoneNumber,
        'user_name' => $request->name,
        'about_us' => $request->about_us,
    ]);

    toast('OTP sent successfully. Please verify.', 'success');
    return redirect()->route('individual.register.otp');
}





public function registerIndividualOTP(): \Illuminate\Contracts\View\View
{
    // Retrieve the user's email from the session
    $email = session('user_email');

    if (!$email) {
        // If the email is not in session, throw an exception
        throw new \Exception('Session expired. Please register again.');
    }

    return view('auth.corporate_register_otp');
}



         public function verifyIndividualOTP(Request $request)
{
    // Retrieve the OTP entered by the user
    $otp = implode('', $request->input('otp')); // Combine OTP digits into a single string
    $email = session('user_email');

    if (!$email) {
        // If email is not in session, show error and redirect
        toast('Email session is not available. Please try again.', 'error');
        return redirect()->route('individual.register');
    }

    // Retrieve the user from the database
    $user = User::where('email', $email)->first();

    if (!$user) {
        // If user is not found, show error and redirect
        toast('User not found. Please register again.', 'error');
        return redirect()->route('individual.register');
    }

    // Check if OTP has expired
    if ($user->otp_expires_at && $user->otp_expires_at < now()) {
        toast('The OTP has expired. Please request a new one.', 'error');
        return back();
    }

    // Compare the OTPs after ensuring they are both strings
    if (Hash::check($otp, $user->otp)) {
        // If OTP matches, clear the OTP and redirect to the dashboard
        $user->update([
            'verify_status' => 'active',
            'otp' => null, // Clear the OTP after successful verification
            'otp_expires_at' => null, // Clear the OTP expiration
        ]);

        Auth::login($user);

        // Send Welcome Email with a UI template
        Mail::to($user->email)->send(new \App\Mail\WelcomeMail($user));

        toast('Account verified successfully!', 'success');
        return redirect()->route('dashboard.marketplace');
    }

    // If OTP doesn't match, show error
    toast('The OTP entered is incorrect or expired.', 'error');
    return back();
}








private function sendKudismsOTP(string $fullPhoneNumber, string $otp): void
{
    $url = 'https://my.kudisms.net/api/otp';
    $token = 'SW06bFCr94Yz3BHnciIMspuDXd5a1oLPUgxEmTRjkOZeJAVNt78KhlQyvwG2qf'; // Replace with your Kudisms token
    $senderID = 'Osusu'; // Replace with your sender ID
    $appnamecode = '522423628'; // Replace with your app name code
    $templatecode = '7635315891'; // Replace with your template code

    try {
        $response = Http::post($url, [
            'token' => $token,
            'senderID' => $senderID,
            'recipients' => $fullPhoneNumber,
            'otp' => $otp,
            'appnamecode' => $appnamecode,
            'templatecode' => $templatecode,
        ]);

        // Handle the response
        if ($response->successful()) {
            // SMS sent successfully
            Log::info('Kudisms OTP sent successfully to ' . $fullPhoneNumber);
        } else {
            // Handle API error
            Log::error('Kudisms API Error: ' . $response->body());
            // Optionally, you can throw an exception or return a user-friendly message
            throw new \Exception('Failed to send OTP via SMS. Please try again.');
        }
    } catch (\Exception $e) {
        // Log the exception
        Log::error('Kudisms OTP sending failed: ' . $e->getMessage());
        // Optionally, rethrow the exception or handle it gracefully
        throw new \Exception('An error occurred while sending the OTP. Please try again later.');
    }
}






public function resend(Request $request)
{
    // Retrieve the user's email and phone number from the session
    $email = session('user_email');
    $fullPhoneNumber = session('user_phone_number');

    if (!$email || !$fullPhoneNumber) {
        toast('Email or phone number is not available', 'error');
        return redirect()->route('register.submit');
    }

    // Remove the '+' sign from the phone number
    $fullPhoneNumber = str_replace('+', '', $fullPhoneNumber);

    // Retrieve the user from the database
    $user = User::where('email', $email)->first();

    if (!$user) {
        toast('User not found', 'error');
        return redirect()->route('register.submit');
    }

    // Generate new OTP
    $otp = rand(1000, 9999);

    // Update the OTP in the users table
    $user->update(['otp' => $otp]);

    // Send OTP via Email
    Mail::to($user->email)->send(new OtpMail($otp));

    // Send OTP via SMS using Termii API
    $this->sendKudismsOTP($fullPhoneNumber, $otp);

    toast('OTP resent successfully', 'success');
    return back();
}






    public function create(): View
    {
        return view('auth.register');
    }





public function store(Request $request): RedirectResponse
{
    $request->validate([
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
        'phone_number' => ['required', 'string', 'max:255'],
    ]);

    $email = $request->email;
    $phoneNumber = $request->phone_number;

    // Check if a user exists with the given email
    $user = User::where('email', $email)->first();

    if ($user) {
        if (is_null($user->password)) {
            // User exists but no password, send OTP
            $otp = rand(1000, 9999);
            $user->update(['otp' => $otp]);

            // Store session data
            session(['user_email' => $user->email, 'user_phone_number' => $user->phone_number]);

            // Send OTP via Email
            Mail::to($user->email)->send(new \App\Mail\OtpMail($otp));

            // Send OTP via SMS using Termii API
            $this->sendOtpSms($phoneNumber, $otp);

            toast('Complete your registration by verifying the OTP.', 'info');
            return redirect()->route('otp.form');
        } elseif (is_null($user->name)) {
            session(['user_email' => $user->email, 'user_phone_number' => $user->phone_number]);
            toast('Complete your registration by setting up your account.', 'info');
            return redirect()->route('account.setup');
        } else {
            toast('This email is already registered. Please log in.', 'error');
            return redirect()->route('login');
        }
    }

    // Check if phone number is already in use
    if (User::where('phone_number', $phoneNumber)->exists()) {
        toast('The phone number has already been taken.', 'error');
        return back();
    }

    // If no user exists, create a new one
    $otp = rand(1000, 9999);

    $user = User::create([
        'email' => $email,
        'phone_number' => $phoneNumber,
        'otp' => $otp,
    ]);

    Wallet::create([
        'user_id' => $user->id,
        'amount' => 0.00,
    ]);

    // Send OTP via Email
   // Mail::to($user->email)->send(new OtpMail($otp));
    Mail::to($user->email)->send(new \App\Mail\OtpMail($otp));

    // Send OTP via SMS using Termii API
    $this->sendOtpSms($phoneNumber, $otp);

    // Store session data
    session(['user_email' => $user->email, 'user_phone_number' => $user->phone_number]);

    toast('OTP sent successfully. Please verify.', 'success');
    return redirect()->route('otp.form');
}








    public function showOtpForm()
    {
        // Retrieve the user's email from the session
    $email = session('user_email');

    if (!$email) {
        // If the email is not in session, show an error
        toast('Session expired. Please register again.', 'error');
        return redirect()->route('register');
    }

        return view('auth.otp');
    }



    public function verifyOtp(Request $request)
    {
        // Retrieve the OTP entered by the user
        $otp = implode('', $request->input('otp')); // Combine OTP digits into a single string
        $email = session('user_email');

        if (!$email) {
            // If email is not in session, show error and redirect
            toast('Email session is not available. Please try again.', 'error');
            return redirect()->route('register');
        }

        // Retrieve the user from the database
        $user = User::where('email', $email)->first();

        if (!$user) {
            // If user is not found, show error and redirect
            toast('User not found. Please register again.', 'error');
            return redirect()->route('register');
        }

        // Compare the OTPs after ensuring they are both strings
        if ((string) $user->otp === (string) $otp) {
            // If OTP matches, clear the OTP and redirect to the protect.account
            toast('OTP verified successfully!', 'success');
            return redirect()->route('protect.account');
        }

        // If OTP doesn't match, show error
        toast('The OTP entered is incorrect or expired.', 'error');
        return back();
    }





        public function showPasswordForm()
    {
        if (!session('user_email')) {
            toast('Session expired. Please start over.', 'error');
            return redirect()->route('register');
        }

        return view('auth.protect-account');
    }


        public function setPassword(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $email = session('user_email');

        if (!$email) {
            toast('Session expired. Please start over.', 'error');
            return redirect()->route('register');
        }

        $user = User::where('email', $email)->first();

        if (!$user) {
            toast('User not found. Please register again.', 'error');
            return redirect()->route('register');
        }

        // Update the user's password
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        // Clear sensitive session data
        session()->forget(['user_email']);

        toast('Password set successfully! Welcome to your dashboard.', 'success');
        return redirect()->route('account.setup');
    }


    public function accountSetup()
    {
        $email = session('user_email');
        $phone_number = session('user_phone_number');

        // If session data is missing, redirect back to registration
        if (!$email || !$phone_number) {
            toast('Session expired. Please start over.', 'error');
            return redirect()->route('register');
        }

        return view('auth.account-setup', compact('email', 'phone_number'));
    }


        public function verifyAccount()
    {
        // Retrieve user data from the session
        $email = session('user_email');
        $phone_number = session('user_phone_number');

        // Check if email or phone number is missing in the session
        if (!$email || !$phone_number) {
            toast('Session expired. Please register again.', 'error');
            return redirect()->route('register');
        }

        return view('auth.verify-account', compact('email', 'phone_number'));
    }


        public function verifyAccountDetails(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'exists:users,email'],
            'phone_number' => ['required', 'string', 'max:15', 'exists:users,phone_number'],
        ]);

        $email = $request->email;
        $user = User::where('email', $email)->first();

        if (!$user) {
            toast('User not found.', 'error');
            return redirect()->route('register');
        }

        // Update user's full name
        $user->update([
            'name' => $request->name,
            'verify_status' => 'active',
        ]);

        Auth::login($user);

        // Send Welcome Email with a UI template
        Mail::to($user->email)->send(new \App\Mail\WelcomeMail($user));
        toast('Account verified successfully!', 'success');
        return redirect()->route('dashboard.marketplace');
        //return redirect()->route('verify.account.document');
    }

    public function verifyAccountDoc()
    {
        return view('auth.verify-account-document');
    }

    public function uploadDocument(Request $request): RedirectResponse
    {
        $request->validate([
            'document_type' => ['required', 'string', 'in:id_card,drivers_license,passport'],
            'document' => ['required', 'file', 'mimes:jpeg,png,jpg,gif,pdf', 'max:10048'], // 10MB limit
        ]);

        $email = session('user_email');

        if (!$email) {
            toast('Session expired. Please log in again.', 'error');
            return redirect()->route('register');
        }

        $user = User::where('email', $email)->first();

        if (!$user) {
            toast('User not found. Please register again.', 'error');
            return redirect()->route('register');
        }

        $path = $request->file('document')->store('documents', 'public');

        $user->update([
            'verify_status' => 'pending',
            'document_type' => $request->document_type,
            'document_path' => $path,
        ]);

        Auth::login($user);

        // Send Welcome Email with a UI template
        Mail::to($user->email)->send(new \App\Mail\WelcomeMail($user));

        toast('Document uploaded successfully. Awaiting admin approval.', 'success');
        return redirect()->route('login');
    }

}