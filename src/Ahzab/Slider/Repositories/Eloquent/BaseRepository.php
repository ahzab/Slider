<?php namespace Ahzab\Slider\Repositories\Eloquent;

use Ahzab\Slider\Interfaces\BaseInterface;

abstract class BaseRepository implements BaseInterface
{
    /**
     * @var Model
     */
    protected $model;

    public function all()
    {
        return $this->model->all();
    }

    public function create($array)
    {
        return $this->model->create($array);
    }

    public function update($id, $array)
    {
        $row = $this->model->find($id);
        return $row->update($array);
    }

    public function find($id)
    {
        return $this->model
                    ->whereId($id)
                    ->first();
    }

    public function first($field, $value)
    {
        return $this->model
                    ->where($field, $value)
                    ->first();
    }

    public function orderBy($field, $order)
    {
        return $this->model
                    ->orderBy($field, $order)
                    ->get();
    }

    public function orderByAndPaginate($field, $order, $per_Slider)
    {
        return $this->model
                    ->orderBy($field, $order)
                    ->paginate($per_Slider);
    }

    public function paginate($per_Slider)
    {
        return $this->model->paginate($per_Slider);
    }

    public function save()
    {

        return $this->model->save();
    }

    public function delete($id)
    {
        $this->model->find($id)->delete();
    }

    public function instance($data = array())
    {
        return new $this->model($data);
    }

    /**
     * returns the current Model to Manager
     *
     * @return object
     */
    private function getModel()
    {
        return $this->model;
    }

    public function getErrors()
    {
        return $this -> model -> getErrors();

    }
}
