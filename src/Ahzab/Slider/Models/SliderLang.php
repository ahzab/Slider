<?php namespace Ahzab\Slider\Models;

use Eloquent;

class SliderLang extends  Eloquent
{
    protected $softDelete	= false;
    protected $fillable		= ['slider_id', 'name', 'slug','', 'lang'];
    protected $table		= 'slider_langs';

    public $timestamps = false;
}
