<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handle(): JsonResponse
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $existingUser = User::where('email', $googleUser->getEmail())->first();

        if ($existingUser) {
            $token = $existingUser->createToken('api')->plainTextToken;
            return response()->json(['token' => $token]);
        } else {
            $newUser = new User();
            $newUser->name = $googleUser->getName();
            $newUser->email = $googleUser->getEmail();
            $newUser->social_ip = $googleUser->id;
            $newUser->social_type = 'google';
            $newUser->password = Hash::make('google_auth');
            $newUser->save();

            $token = $newUser->createToken('api')->plainTextToken;
            return response()->json(['token' => $token]);
        }

    }
}

/*






 */
