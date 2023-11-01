<?php

namespace App\Http\Requests\AdminPanel;

use App\Models\Slider;
use Illuminate\Foundation\Http\FormRequest;

class CreateSliderRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Slider::rules();
    }
}
