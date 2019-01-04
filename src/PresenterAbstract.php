<?php

namespace MartijnThomas\Presenters;

use Illuminate\Database\Eloquent\Model;

abstract class PresenterAbstract
{

    /**
     * The original Model
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * Instantiate the Presenter
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Allow for property-style retrieval
     *
     * @param $property
     * @return mixed
     */
    public function __get($property)
    {
        if (method_exists($this, $property)) {
            return $this->{$property}();
        }
        return $this->model->{$property};
    }
}
