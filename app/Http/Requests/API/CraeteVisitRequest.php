<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use EngMahmoudElgml\Super\Response;

class CraeteVisitRequest extends FormRequest
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
            'doctor_id'=>'required|exists:doctors,id',
            'date'=>'required|date_format:Y-m-d H:i',
            'type_id' => 'exists:question_types,id'
        ];
    }
    public function failedValidation(Validator $validator){
        $response = new \stdClass();
        throw new HttpResponseException(
            Response::defaultResponse(false, 422, $validator->errors(), 'Error in validation', $response)
        );
    }
}
