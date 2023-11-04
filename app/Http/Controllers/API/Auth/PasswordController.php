<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Auth\ConfirmOtpRequest;
use App\Http\Requests\API\Auth\ForgotPasswordRequest;
use App\Mail\UserOtpMail;
use App\Models\OneTimePassword;
use App\Models\User;
use EngMahmoudElgml\Super\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Facades\JWTAuth;

class PasswordController extends Controller
{
    public function forgotPassword(ForgotPasswordRequest $request)
    {
        $user = User::where('email',$request->email)->first();
        
        $response = new \stdClass();

         if (!$user) {
            return response()->json(["message" => __('lang.userNotFound')], 404);
        }
        $otp = rand(100000,999999);
        $token = Str::random(60);
        OneTimePassword::query()
            ->create([
                'token' => $token,
                'otp' => $otp,
                'user_id' => $user->id,
                'expire_at' => now()->addMinutes(5),
            ]);

        Mail::to($user->email)->send(new UserOtpMail($otp));
        return Response::defaultResponse(true, 200, [],'OTP sent successfully check your email', $response,$token);
    }


    public function confirmOtp(ConfirmOtpRequest $request)
    {
        $response = new \stdClass();
        $otp = OneTimePassword::query()
            ->where('token',$request->token)
            ->where('otp',$request->otp)
            ->where('expire_at','>',now())
            ->first();
        if($otp){
            $otp->update([
                'token' => Str::random(60)
            ]);
        $user=User::find($otp->user_id);
        if ($user) {
            //create user token with jwt
        $token = JWTAuth::fromUser($user);
            return Response::defaultResponse(true, 200, [], 'User authenticated successfully',$response,$token);
        }
        else{
            return Response::defaultResponse(false, 404, [], 'User not found',$response);
        }
        }else {
            return Response::defaultResponse(false, 422, [], 'Invalid OTP or OTP has expired',$response);
        }

    }

    public function changePassword()
    {
        //Get the user from jwt token
        //validate otp token
        //update password
        // return success message
    }

}
