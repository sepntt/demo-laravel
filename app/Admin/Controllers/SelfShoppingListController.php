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
        $show = request()->show;

        //品牌list显示
        $obj = $this;
        $brand_name = function (Grid $grid) use ($obj) {
            $grid->column('brand_name', '品牌')->display(function ($brand_name) use ($obj) {
                $html = [];
                foreach ($brand_name as $key => $value) {
                    $html[] = "<span class='badge bg-light-blue'>".$obj->getBrandName($value)."</span>";
                }
                return implode('', $html);
            });
            return $grid;
        };

        if($show != 1) {
            $show_func = function (Grid $grid) use ($brand_name) {

                $grid->product_name('产品');
                $grid = $brand_name($grid);
                $grid->purchase_channel('购买渠道');
                $grid->num('数量');
                $grid->price('价格');
                return $grid;

            };
        } else {
            $show_func = function (Grid $grid) use ($brand_name) {

                $grid->id('ID')->sortable();
                $grid->product_name('产品');
                $grid = $brand_name($grid);
                $grid->purchase_channel('购买渠道');
                $grid->num('数量');
                $grid->price('价格');
                $grid->pictures('图片')->image();

                $grid->created_at();
                $grid->updated_at();
                return $grid;
            };
        }

        $c = function (Grid $grid) use ($show_func) {
            $grid = $show_func($grid);
            $grid->filter(function($filter){
                // 去掉默认的id过滤器
                $filter->disableIdFilter();
                $filter->where(function ($query) {
                    $query->where('product_name', 'like', "%{$this->input}%")
                        ->orWhere('brand_name', 'like', "%{$this->input}%");

                }, '关键词');

            });

        };
        return Admin::grid(SelfShoppingList::class, $c);
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
            // $form->text('brand_name', '品牌');
            $form->multipleSelect('brand_name', '品牌')->options($this->getBrandName());
            // $form->textkeywords('brand_name','选择品牌')->setData((SelfShoppingList::select()->get()->toArray()),'brand_name');
            $form->text('purchase_channel', '购买渠道');
            $form->number('num', '数量');
            $form->currency('price', '价格')->symbol('￥');

            $form->multipleImage('pictures', '图片')->removable();

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }

    public function getBrandName($key = false)
    {
        $arr = config('customer.selfshoppinglist.brand');
        $arr = array_column($arr, 'brand_name', 'id');
        if ($key !== false && isset($arr[$key])) {
            return $arr[$key];
        }
        return $arr;
        # code...
    }

    public function create2()
    {
        return Admin::content(function (Content $content) {

            $content->header('chart');
            $content->description('.....');

            $content->body(view('admin.self.shopping.list', []));
        });
    }
}
