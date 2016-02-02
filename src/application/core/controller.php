<?php

class Controller
{
    /**
     * @var null Model
     */
    public $model = null;


    function _loadModel($model)
    {
        foreach ($model as $m) {
            if (file_exists(APP . 'class/model/' . $m . '.php') && empty($this->model[$m])) {
                require APP . 'class/model/' . $m . '.php';
                $mod = ucfirst($m);
                $this->model[$m] = new $mod();
            }
        }
    }

}
