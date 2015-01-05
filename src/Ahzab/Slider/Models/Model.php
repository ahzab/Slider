<?php namespace Ahzab\Slider\Models;

use DB;
use Str;
use Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Model extends Eloquent
{
    use SoftDeletingTrait;

    protected $dates = ['deleted_at']; 
    /**
     * Error message bag
     *
     * @var Illuminate\Support\MessageBag
     */
    protected $errors;

    /**
     * Holds all validation rules
     *
     * @var MessageBag
     */
    public static $rules = [];

    /**
     * Validates current attributes against rules
     *
     * @return bool
     */
    public function validate()
    {

        $validator = Validator::make($this->attributes, static::$rules);

        if ($validator->passes()) {
            return true;
        }

        $this->setErrors($validator->messages());

        return false;
    }

    /**
     * Set error message bag
     *
     * @var Illuminate\Support\MessageBag
     * @return void
     */
    protected function setErrors(MessageBag $errors)
    {
        $this->errors = $errors;
    }

    /**
     * Retrieve error message bag
     *
     * @return Illuminate\Support\MessageBag
     */
    public function getErrors()
    {
        return $this->errors instanceof MessageBag ? $this->errors : new MessageBag;
    }

    /**
     * Check if a model has been saved
     *
     * @return boolean
     */
    public function isSaved()
    {
        return $this->errors instanceof MessageBag ? false : true;
    }

    /**
     * Create a unique slug
     *
     * @param  string $title
     * @return void
     */
    protected function getUniqueSlug($title)
    {
        $slug = Str::slug($title);

        $row = DB::table($this->table)->where('slug', $slug)->first();

        if ($row) {
            $num = 2;
            while ($row) {
                $newSlug = $slug .'-'. $num;

                $row = DB::table($this->table)->where('slug', $newSlug)->first();
                $num++;
            }

            $slug = $newSlug;
        }

        return $slug;
    }

    /**
     * Create a unique slug
     *
     * @param  string $title
     * @return void
     */
    protected function getModule()
    {
        return $this->module;
    }
}
