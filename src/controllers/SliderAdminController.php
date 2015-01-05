<?php namespace Ahzab\Slider\Controllers;

use Ahzab\Slider\Interfaces\SliderInterface;
use App;
use Lang;
use View;
use Input;
use Former;
use Sentry;
use Config;
use Session;
use Redirect;


class SliderAdminController extends \AdminController
{

    public function __construct(SliderInterface $Slider)
    {

        $this->model 	= $Slider;

        parent::__construct();
    }

    protected function hasAccess($permission = 'view')
    {
        if(!Sentry::getUser()->hasAccess('Slider::Slider.permissions.admin.'.$permission))
            App::abort(401, Lang::get('messages.error.auth'));

        return true;
    }

    protected function permissions()
    {
        $p				= array();

        $permissions 	= Config::get('Slider::Slider.permissions.admin');

        foreach ($permissions as $key => $value) {
            $p[$value]	= Sentry::getUser()->hasAccess($value);
        }

        return $p;
    }

    public function index()
    {
        $data['q']		        = Input::get('q');
        $this->hasAccess('view');
        $data['Sliders']	        = $this->model->paginate(15);
        $data['permissions']	= $this->permissions();
        $this->theme->prependTitle(Lang::get('Slider::Slider.names') . ' :: ');
        return $this->theme->of('Slider::admin.index', $data)->render();
    }

    public function show($id)
    {
        $this->hasAccess('view');
        $data['Slider']	= $this->model->find($id);
        $data['permissions']	= $this->permissions();
        $this->theme->prependTitle(Lang::get('app.view') . ' ' . Lang::get('Slider::Slider.name') . ' :: ');

        return $this->theme->of('Slider::admin.show', $data)->render();
    }

    public function create()
    {
        $this->hasAccess('create');
        $data['Slider']	= $this->model->instance();
        $this->theme->prependTitle(Lang::get('app.new') . ' ' . Lang::get('Slider::Slider.name') . ' :: ');

        return $this->theme->of('Slider::admin.create', $data)->render();
    }

    public function store()
    {

        $this->hasAccess('create');
        if ($this->model->create(Input::all())) {

            Session::flash('success',  Lang::get('messages.success.create', array('Module' => Lang::get('Slider::Slider.name'))));

            return Redirect::to('/admin/Slider');

        } else {
            Former::withErrors($this->model->getErrors());
            Former::populate(Input::all());
            $data['Slider']	=  $this->model->instance();
            $this->theme->prependTitle(Lang::get('app.new') . ' ' . Lang::get('Slider::Slider.name') . ' :: ');

            return $this->theme->of('Slider::admin.create', $data)->render();
        }

    }

    public function edit($id)
    {

        $this->hasAccess('edit');
        $data['Slider']		= $this->model->find($id);

        Former::populate($data['Slider']);
        $this->theme->prependTitle(Lang::get('app.edit') . ' ' . Lang::get('Slider::Slider.name') . ' :: ');

        return $this->theme->of('Slider::admin.edit', $data)->render();

    }

    public function update($id)
    {

        $this->hasAccess('edit');

        if ($r = $this->model->update($id, Input::all())) {
            Session::flash('success',  Lang::get('messages.success.update', array('Module' => Lang::get('Slider::Slider.name'))));
            return Redirect::to('/admin/Slider');
        } else {
//            dd(print_r($r));
            Former::withErrors($this->model->getErrors());
            Former::populate(Input::all());
            $data['Slider']		= $this->model->find($id);

            return $this->theme->of('Slider::admin.edit', $data)->render();
        }

    }

    public function destroy($id)
    {
        $this->hasAccess('delete');
        $this->model->delete($id);
        Session::flash('success', Lang::get('messages.success.delete', array('Module' => Lang::get('Slider::Slider.name'))));

        return Redirect::to('/admin/Slider');

    }

}
