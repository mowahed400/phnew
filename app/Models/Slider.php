<?php

namespace App\Models;

use App\Http\Traits\FileUploadTrait;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Traits\UploadImage;


class Slider extends Model
{
    use UploadImage , Translatable;
    public $table                 = 'sliders';
    public $translatedAttributes  =  ['title'];
    public $fillable              = ['media','type'  ];

    protected $casts = [
        'id' => 'integer'
    ];

    public static function rules () {
        $langs = LaravelLocalization::getSupportedLanguagesKeys();
        foreach ($langs as $lang) {
            $rules[$lang . '.title']             = 'required|string|min:5|max:255';
        }
        $rules['media']   = 'required|file|mimes:jpg,png,mp4,jpeg,avi';
        return $rules;
    }

    public function setMediaAttribute($file) {
        $name = $this->ulpoadImages($file , 'Admins');
        $this->attributes['media'] = $name;
    }

    public function getMediaAttribute() {
        return asset('images/'.$this->attributes['media']);
    }

}
