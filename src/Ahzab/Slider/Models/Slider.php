<?php namespace Ahzab\Slider\Models;

use Str;
use Config;
use Eloquent;
use Lavalite\Filer\FilerTrait;
use Dimsav\Translatable\Translatable;

class Slider extends Model  {

    use Translatable;
    use FilerTrait;

    protected $table        = 'sliders';

    protected $module       = 'slider';

    protected $softDelete   = true;


    public $autoHydrateEntityFromInput      = true;
    public $forceEntityHydrationFromInput   = true;

    public static $rules = [
        'name' => 'required',
        'slug' => 'required'
    ];

    /**
     * Array with the fields translated in the Translation table
     *
     * @var array
     */
    public $translatedAttributes = array('name','description');

    /**
    * Set $translationModel if you want to overwrite the convention
    * for the name of the translation Model. Use full namespace if applied.
    *
    * The convention is to add "Translation" to the name of the class extending Translatable.
    * Example: Country => CountryTranslation
    */
    public $translationModel = 'Ahzab\Slider\Models\SliderLang';

    /**
    * This is the foreign key used to define the translation relationship.
    * Set this if you want to overwrite the laravel default for foreign keys.
    *
    * @var
    */
    public $translationForeignKey   = 'slider_id';

    /**
    * Add your translated attributes here if you want
    * fill them with mass assignment
    *
    * @var array
    */
    protected $fillable = ['name','slug','description','status'];

    /**
    * The database field being used to define the locale parameter in the translation model.
    * Defaults to 'locale'
    *
    * @var string
    */
    public $localeKey = 'lang';

    protected $keepRevisionOf = [];



    /**
     * returns the current package
     *
     * @return string
     */
    private function getPackage()
    {
        return Config::get('Slider::package');
    }


   /**
     * Listen for save and updating event
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {

            $model->slug = !empty($model->slug) ? $model->slug : $model->getUniqueSlug($model->name);
            return $model->validate();
        });


    }
}
