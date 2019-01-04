<?php

namespace MartijnThomas\Presenters;

trait Presentable
{
    /**
     * Bring in the Presenter
     *
     * @return \Jonril\Presenters\PresenterAbstract;
     */
    public function present()
    {
        return new $this->presenter($this);
    }
}
