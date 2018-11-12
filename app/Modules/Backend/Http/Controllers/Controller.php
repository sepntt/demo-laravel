<?php

namespace App\Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;

use App\Repository\Backend\MenusInterface;

class Controller extends \App\Modules\Auth\Http\Controllers\Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->setAuth($this->modules->module);
    }
    public function getInputs($inputs)
    {
        $inputs['__menu'] = $this->getMenu();
        return $inputs;
    }

    public function getMenu()
    {
        $MenuInterface = app()->make(MenusInterface::class);
        return $MenuInterface->toTree();
    }
}
