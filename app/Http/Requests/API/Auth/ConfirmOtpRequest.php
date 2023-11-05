<?php

namespace App\Http\Requests\API\Auth;

use EngMahmoudElgml\Super\Facades\Super;
use EngMahmoudElgml\Super\Response;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ConfirmOtpRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'otp' => 'required',
            'token' => 'required',
        ];
    }
    public function failedValidation(Validator $validator){
        $response = new \stdClass();
        throw new HttpResponseException(
            Response::defaultResponse(false, 422, $validator->errors(), 'Error in validation', $response)
        );
    }
}
