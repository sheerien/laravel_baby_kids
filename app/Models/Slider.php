<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable=[
        'image',
    ];

    public static function uploadSliderImageRule()
    {
        return [
            'image'=>'required',
        ];
    }

    public function getImageAttribute($value)
    {
        return 'images/slider/' . $value;
    }

    public static function deleteSliderImageRule()
    {
        return [
            'slider_id' => 'required|exists:sliders,id',
        ];
    }
}
