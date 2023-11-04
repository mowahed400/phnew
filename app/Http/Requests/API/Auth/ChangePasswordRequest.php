<?php

namespace App\Http\Requests\API\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use EngMahmoudElgml\Super\Response;

class ChangePasswordRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'password'=>'required|min:8|same:confirm-password',
            'UpdatedToken'=>'required'
        ];
    }
    public function failedValidation(Validator $validator){
        $response = new \stdClass();
        throw new HttpResponseException(
            Response::defaultResponse(false, 422, $validator->errors(), 'Error in validation', $response)
        );
    }
}
