<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

  public function redirectToGoogle()
  {
    return Socialite::driver('google')->redirect();
  }

  /**
   * Create a redirect method to facebook api.
   *
   * @return void
   */
  public function redirectToFacebook() {
    return Socialite::driver('facebook')->redirect();
  }


  public function handleGoogleProviderCallback() {
    try {


      $googleUser = Socialite::driver('google')->user();
      $existUser = User::where('email',$googleUser->email)->first();


      if($existUser) {
        Auth::loginUsingId($existUser->id);
      }
      else {
        $user = new User;
        $user->name = $googleUser->name;
        $user->email = $googleUser->email;
        $user->google_id = $googleUser->id;
        $user->password = md5(rand(1,10000));
        $user->save();
        Auth::loginUsingId($user->id);
      }
      return redirect()->to('/home');
    }
    catch (Exception $e) {
      return 'error';
    }

//    try {
//      $user = Socialite::driver('google')->user();
//    } catch(\Exception $e) {
//      return redirect('/login');
//    }
//    // only allow people with @company.com to login
//    if (explode("@", $user->email)[ 1 ] !== 'company.com') {
//      return redirect()->to('/');
//    }
//    // check if they're an existing user
//    $existingUser = User::where('email', $user->email)->first();
//    if ($existingUser) {
//      // log them in
//      auth()->login($existingUser, TRUE);
//    }
//    else {
//      // create a new user
//      $newUser = new User;
//      $newUser->name = $user->name;
//      $newUser->email = $user->email;
//      $newUser->google_id = $user->id;
//      $newUser->avatar = $user->avatar;
//      $newUser->avatar_original = $user->avatar_original;
//      $newUser->save();
//      auth()->login($newUser, TRUE);
//    }
//    return redirect()->to('/home');
  }


  /**
   * Return a callback method from facebook api.
   *
   * @return callback URL from facebook
   */
  public function handleFBProvidercallback() {
    try {
      $user = Socialite::driver('facebook')->user();
      $create[ 'name' ] = $user->getName();
      $create[ 'email' ] = $user->getEmail();
      $create[ 'facebook_id' ] = $user->getId();


      $userModel = new User;
      $createdUser = $userModel->addNew($create);
      Auth::loginUsingId($createdUser->id);


      return redirect()->route('home');
    } catch(Exception $e) {
      return $this->redirect('login/facebook');
    }

  }

}
