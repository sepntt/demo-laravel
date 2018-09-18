<?php

namespace App\Admin\Extensions\Form;

use Encore\Admin\Form\Field;
use Encore\Admin\Form\Field\Select;

class ColorSelect extends Select
{
    public static $js = [
        // 'https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js',
        // '/packages/ckeditor5-build-classic/ckeditor.js',
        // '/packages/ckeditor/adapters/jquery.js',
    ];

    public static $css = [
        // 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'
    ];

    protected $view = 'admin.colorselect';

    public function render()
    {
        $this->options([
            'primary' => 'primary',
            'secondary' => 'secondary',
            'success' => 'success',
            'danger' => 'danger',
            'warning' => 'warning',
            'info' => 'info',
            'light' => 'light',
            'dark' => 'dark',
            ]
        )->default('primary');
        // $csrf = csrf_token();
        $this->script = "";

        return parent::render();
    }
}