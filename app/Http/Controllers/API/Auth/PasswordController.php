<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Auth\ConfirmOtpRequest;
use App\Http\Requests\API\Auth\ForgotPasswordRequest;
use App\Models\OneTimePassword;
use App\Models\User;
use EngMahmoudElgml\Super\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PasswordController extends Controller
{
    public function forgotPassword(ForgotPasswordRequest $request)
    {
        $user = User::where('email',$request->email)->first();
        $otp = rand(100000,999999);
        $token = Str::random(60);
        OneTimePassword::query()
            ->create([
                'token' => $token,
                'otp' => $otp,
                'user_id' => $user->id,
                'expire_at' => now()->addMinutes(5),
            ]);

        //Send Email Here
        return Response::defaultResponse(true, 200, [],'OTP sent successfully', $token);
    }


    public function confirmOtp(ConfirmOtpRequest $request)
    {
        $otp = OneTimePassword::query()
            ->where('token',$request->token)
            ->where('otp',$request->otp)
            ->where('expire_at','>',now())
            ->first();
        if($otp){
            $otp->update([
                'token' => Str::random(60)
            ]);
            // get user
            //login user
            //return token
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
