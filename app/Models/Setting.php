<?php

namespace App\Models;

use App\Traits\UploadImage;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Setting extends Model
{
    use UploadImage , Translatable;
    public $table                   = 'settings';
    public $translatedAttributes    =  ['footer_description'];
    public $fillable = [ 'app_name', 'logo', 'footer_logo',  'location','points_price',  'footer_description'];

    protected $casts = [
        'id'            => 'integer',
        'app_name'      => 'string',
        'logo'          => 'string',
        'footer_logo'   => 'string',
        'location'      => 'string',
        'points_price'  => 'integer'
    ];

    static function rules() {
        $langs = LaravelLocalization::getSupportedLanguagesKeys();
        foreach ($langs as $lang) {
            $rules[$lang . '.footer_description'] = 'required|string|min:5|max:255';
        }
        $rules['app_name']      = 'required|string';
        $rules['logo']          = 'sometimes|image|mimes:jpg,jpeg,png';
        $rules['footer_logo']   = 'sometimes|image|mimes:jpg,jpeg,png';
        $rules['location']      = 'required|url';
        $rules['points_price']  = 'required|numeric|not_in:0|min:1';
        return $rules;
    }

    public function setLogoAttribute($file)
    {
        $name = $this->ulpoadImages($file , 'Admins');
        $this->attributes['logo'] = $name;
    }

    public function setFooterLogoAttribute($value)
    {
        $name = $this->ulpoadImages($value, 'Admins');
        $this->attributes['footer_logo'] = $name;
    }

    public function getLogoAttribute() {
        return asset('images/'.$this->attributes['logo']);
    }

    public function getFooterLogoAttribute()
    {
        return asset('images/'.$this->attributes['footer_logo']);
    }



}
