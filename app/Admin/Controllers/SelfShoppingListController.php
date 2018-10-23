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

        if($show != 1) {
            $show_func = function (Grid $grid) {

                $grid->product_name('产品');
                $grid->brand_name('品牌');
                $grid->purchase_channel('购买渠道');
                $grid->num('数量');
                $grid->price('价格');
                return $grid;

            };
        } else {
            $show_func = function (Grid $grid) {

                $grid->id('ID')->sortable();
                $grid->product_name('产品');
                $grid->brand_name('品牌');
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
        $arr = ['十月结晶','Pigeon/贝亲','好孩子','爱得利','开丽','日康','NUK',
        // '黄色小鸭',// '贝恩宝',// '运智贝'
        ];
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

            $content->body(view('admin.self.shopping.list'));
        });
    }
}
