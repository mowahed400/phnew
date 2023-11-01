<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\Slider;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSliderRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules          = Slider::rules();
        $rules['media'] = 'nullable|file|mimes:jpg,png,mp4,jpeg,avi';
        return $rules;
    }
}
