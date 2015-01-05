<?php namespace Ahzab\Slider\Repositories\Eloquent;

use App;
use Lang;
use Theme;
use Ahzab\Slider\Models\Slider as Slider;
use Ahzab\Slider\Interfaces\SliderInterface;

class SliderRepository extends BaseRepository implements SliderInterface
{
    public function __construct(Slider $Slider)
    {
        $this->model = $Slider;
    }

    public function getSlider($slug)
    {
        $Slider 	= $this -> model -> whereSlug($slug) -> first();

        if (!$Slider) {
            $Slider   = $this -> model -> whereSlug('404') -> first();
        }

        if (!$Slider) {
            App::abort(404, Lang::get("Slider::messages.noSlider"));
        }

        $this -> compile($Slider);
        return $Slider;
    }

    public function heading($slug)
    {
        return $this -> SliderPart($slug, 'heading');
    }

    public function content($slug)
    {
        return $this -> SliderPart($slug, 'content');
    }

    public function title($slug)
    {
        return $this -> SliderPart($slug, 'title');
    }

    public function keyword($slug)
    {
        return $this -> SliderPart($slug, 'keyword');
    }

    public function description($slug)
    {
        return $this -> SliderPart($slug, 'description');
    }

    public function banner($slug)
    {
        return $this -> SliderPart($slug, 'banner');
    }

    public function SliderPart($slug, $field)
    {
        $Slider 	= $this -> model -> whereSlug($slug) -> first();

        if (!$Slider) {
           return Lang::get("Slider::messages.noSlider");
        }

        return $Slider->$field;
    }

    public function errors()
    {
        return $this -> model -> errors();

    }

    public function compile(&$Slider)
    {
        $compiler = $Slider->compiler;

        if ($compiler == 'blade')
            $Slider->content = Theme::blader($Slider -> content, array());
        elseif ($compiler == 'twig')
            $Slider->content = Theme::twigy($Slider -> content, array());

    }
}
