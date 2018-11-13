<?php

namespace App\Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;

use App\Repository\Backend\MenusInterface;
use App\Modules\Auth\Http\Controllers\Backend;

class Controller extends \App\Modules\Auth\Http\Controllers\Controller
{
    use Backend;

    public function _getInputs($inputs)
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
