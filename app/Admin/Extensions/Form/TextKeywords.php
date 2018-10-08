<?php

namespace App\Admin\Extensions\Form;

use Encore\Admin\Form\Field;
use Encore\Admin\Form\Field\Html;
use Encore\Admin\Form\Field\Select;

/**
 * 追加
 * $form->textkeywords('brand_name','选择品牌')->setData((SelfShoppingList::select()->get()->toArray()),'brand_name');
 * textkeywords('brand_name','选择品牌')
 * @parame brand_name 需要追加的input字段，也是input的id属性
 * 
 */
class TextKeywords extends Html
{
    public static $js = [
        // 'https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js',
    ];

    public static $css = [
        // 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'
    ];

    public $textkeywords = [];

    protected $view = 'admin.form.textkeywords';

    public function __construct($column, $arguments = [])
    {
        $this->column = $column;
        $this->label = $this->formatLabel($arguments);
        $this->id = $this->formatId($column);
    }
    /**
     * 设置选择数据
     * @param array  $data [description]
     * @param string $name value
     * @param string $id   id
     */
    public function setData($data = [], $name = 'name', $id = 'id')
    {
        $this->textkeywords_name = $name;
        $this->textkeywords_id = $id;
        $this->textkeywords = [];
        foreach ($data as $key => $value) {
            $this->textkeywords[$key][$id] = $value[$id];
            $this->textkeywords[$key][$name] = $value[$name];
        }
        return $this->textkeywords;
    }

    public function render()
    {
        $this->html = '';

        $data = $this->textkeywords;
        foreach ($data as $key => $value) {
            $this->html .= '<button type="button" class="btn btn-default dropdown-toggle textkeywords-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$value[$this->textkeywords_name].'</button>';
        }

        $this->script = "<script>
window.onload = function(){
    $('.textkeywords-btn').on('click', function(){
        console.log('".$this->column."')
        var column = $('#".$this->column."');
        var text = (column.val()?column.val()+',':'').toString();
        console.log(text);
        console.log($(this).text());
        column.val(text+$(this).text().toString());
    });
};
</script>";
        // return parent::render();
        // $this->html = '';
        
        $this->html = $this->html.$this->script;
        // dd($this->html);
        if ($this->html instanceof \Closure) {
            $this->html = $this->html->call($this->form->model(), $this->form);
        }

        if ($this->plain) {
            return $this->html;
        }

        $viewClass = $this->getViewElementClasses();

        return <<<EOT
<div class="form-group">
    <label  class="{$viewClass['label']} control-label">{$this->label}</label>
    <div class="{$viewClass['field']}">
        {$this->html}
    </div>
</div>
EOT;

        // return parent::render();
    }
}