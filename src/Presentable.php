<?php

namespace MartijnThomas\Presenter;

trait Presentable
{
    /**
     * Bring in the Presenter
     *
     * @return \MartijnThomas\Presenter\PresenterAbstract;
     */
    public function present()
    {
        return new $this->presenter($this);
    }
}
