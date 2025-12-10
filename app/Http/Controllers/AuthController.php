<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Exception\Auth\FailedToVerifyToken;
use Kreait\Firebase\Contract\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Auth as LaravelAuth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    protected $auth;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function showLogin()
    {
        return view('login');
    }

    public function showSignup()
    {
        return view('signup');
    }

    public function firebaseAuth(Request $request)
    {
        $idTokenString = $request->input('id_token');

        try {
            $verifiedIdToken = $this->auth->verifyIdToken($idTokenString);
            $uid = $verifiedIdToken->claims()->get('sub');
            $firebaseUser = $this->auth->getUser($uid);

            $user = User::firstOrCreate(
                ['firebase_uid' => $uid],
                [
                    'name' => $firebaseUser->displayName ?? 'User',
                    'email' => $firebaseUser->email,
                    'photo' => $firebaseUser->photoUrl,
                    'provider' => $firebaseUser->providerData[0]->providerId ?? 'password',
                ]
            );

            LaravelAuth::login($user);

            return response()->json(['status' => 'success', 'redirect' => route('admin.dashboard')]);

        } catch (FailedToVerifyToken $e) {
            return response()->json(['status' => 'error', 'message' => 'The token is invalid: ' . $e->getMessage()], 401);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Authentication failed'], 500);
        }
    }

    public function logout()
    {
        LaravelAuth::logout();
        return redirect()->route('login');
    }
}
