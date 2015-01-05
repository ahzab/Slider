<?php namespace Ahzab\Slider\Models;

use Eloquent;

class SliderItemLang extends  Eloquent
{
    protected $softDelete	= false;
    protected $fillable		= ['slider_id', 'heading', 'content','img', 'lang'];
    protected $table		= 'slider_item_lang';

    public $timestamps = false;
}
