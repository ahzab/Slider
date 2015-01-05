<?php namespace Ahzab\Slider;

use App;
use URL;
use View;
use Sentry;
use Config;

use Ahzab\Slider\Interfaces\SliderInterface;
class Slider
{

    protected $model;

    public function __construct(SliderInterface $Slider)
    {
        $this->model 	= $Slider;
    }

    public function model()
    {
        return $this->model->getModel();
    }

    public function __call($name, $arguments)
    {

        return $this->model->$name($arguments[0]);
    }

    public function gadget($perSlider = 10)
    {
        $data['Sliders']  = $this->model->paginate($perSlider);
        $data['permissions']  = $this->permissions();
        return View::make('Slider::admin.gadget', $data);
    }

    protected function permissions()
    {
        $p              = array();

        $permissions    = Config::get('Slider::Slider.permissions.admin');

        foreach ($permissions as $key => $value) {
            $p[$value]  = Sentry::getUser()->hasAccess($value);
        }
        return $p;
    }

}
