<?php

namespace App\Admin\Controllers;

use App\Models\Todolist;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

use App\Repository\Todolist\TodolistInterface;

class TodolistController extends Controller
{
    use ModelForm;

    public function __construct(TodolistInterface $TodolistInterface)
    {
        $this->Todolist = $TodolistInterface;
    }

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Todolist::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->todo('TODO')->sortable();
            $grid->done('状态')->using($this->Todolist->doneName());
            $grid->version('版本号');

            $grid->created_at();
            $grid->updated_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Todolist::class, function (Form $form) {

            $form->display('id', 'ID');
            
            $form->divide();
            $form->text('todo', 'TODO');
            $form->html($this->getTodolistCheckHtml(), '选择Todolist');
            // $form->textkeywords('brand_name','选择品牌')->setData((SelfShoppingList::select()->get()->toArray()),'brand_name');
            $form->divide();

            $form->currency('version', '版本号')->symbol('V');
            $form->ckeditor('desc', '描述');

            $form->select('done', '状态')->options($this->Todolist->doneName())->default(1);

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }

    public function getTodolistCheckHtml()
    {
        $html = '';
        $todolist = (Todolist::select()->get()->toArray());
        $html = '';
        foreach ($todolist as $key => $value) {
            $html .= '<button type="button" class="btn btn-default dropdown-toggle todolist-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$value['todo'].'</button>';
        }
        $script = <<<EOT
<script>
window.onload = function(){
    $('.todolist-btn').on('click', function(){
        $('#todo').val('')
        $('#todo').val($(this).text())
    });
};
</script>
EOT;
        $html .= $script;
        return $html;
    }
}
