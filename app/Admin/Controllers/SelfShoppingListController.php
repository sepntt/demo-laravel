<?php

namespace App\Admin\Controllers;

use App\Models\SelfShoppingList;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class SelfShoppingListController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        $show = request()->show;
        return Admin::content(function (Content $content) use ($show) {

            $content->header('header');
            $content->description('description');
            if($show == 1) {
                $content->body($this->grid());
            } else {
                $content->body($this->grid2());
            }
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
        return Admin::grid(SelfShoppingList::class, function (Grid $grid) {

            // $grid->id('ID')->sortable();
            $grid->product_name('产品');
            $grid->brand_name('品牌');
            $grid->purchase_channel('购买渠道');
            $grid->num('数量');
            $grid->price('价格');
            // $grid->pictures('图片')->image();

            // $grid->created_at();
            // $grid->updated_at();
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid2()
    {
        return Admin::grid(SelfShoppingList::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->product_name('产品');
            $grid->brand_name('品牌');
            $grid->purchase_channel('购买渠道');
            $grid->num('数量');
            $grid->price('价格');
            $grid->pictures('图片')->image();

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
        return Admin::form(SelfShoppingList::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('product_name', '产品');
            $form->text('brand_name', '品牌');
            // $form->textkeywords('brand_name','选择品牌')->setData((SelfShoppingList::select()->get()->toArray()),'brand_name');
            $form->text('purchase_channel', '购买渠道');
            $form->number('num', '数量');
            $form->currency('price', '价格')->symbol('￥');

            $form->multipleImage('pictures', '图片')->removable();

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
