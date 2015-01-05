<?php namespace Ahzab\Slider\Controllers;

use Ahzab\Slider\Interfaces\SliderInterface;
use Theme;
use View;

class SliderPublicController extends \PublicController
{

    protected $layout   = 'Slider';
    public function __construct(SliderInterface $Slider)
    {
        $this->model 	= $Slider;
         parent::__construct();

    }

    protected function getSlider($slug)
    {
        $data['Slider'] = $this->model->getSlider($slug);
        $this -> theme -> setTitle($data['Slider'] -> title);
        $this -> theme -> setKeywords($data['Slider'] -> keyword);
        $this -> theme -> setDescription($data['Slider'] -> description);

        $view   = $data['Slider'] -> view;
        $view   = View::exists('Slider::public.'.$view) ? $view : 'Slider';
        return $this->theme->of('Slider::public.'.$view, $data)->render();
    }

}
