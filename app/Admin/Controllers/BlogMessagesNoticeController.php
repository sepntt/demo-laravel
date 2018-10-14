<?php

namespace App\Admin\Controllers;

use App\Models\BlogMessagesNotice;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

use Illuminate\Support\Facades\Input;

class BlogMessagesNoticeController extends Controller
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
        return Admin::grid(BlogMessagesNotice::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->column('message.message', '简短通知');
            $grid->color('颜色');
            $grid->topped_at('置顶');

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
        return Admin::form(BlogMessagesNotice::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('message.message', '简短通知');
            $form->ckeditor('message.content', '消息详细');
            $form->colorSelect('color', '颜色');
            $form->checkbox('topped_at', '置顶')->options(['1'=>'置顶']);

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }

    public function store()
    {
        do {
            $data = Input::all();
            $params = [
                'message' => $data['message']['message'],
                'content' => $data['message']['content'],
                'color' => $data['color'],
                'topped_at' => ($data['topped_at'][0] == 1)?date('Y-m-d H:i:s'):null,
            ];

            $model = new BlogMessagesNotice();
            if($model->saveInfo($params)) {
                return redirect('/admin/blog/blog_messages_notice');
            }
        } while (false);
    }

    public function update($id)
    {
        do {
            $data = Input::all();
            $params = [
                'id' => $id,
                'message' => $data['message']['message'],
                'content' => $data['message']['content'],
                'color' => $data['color'],
                'topped_at' => ($data['topped_at'][0] == 1)?date('Y-m-d H:i:s'):null,
            ];

            $model = new BlogMessagesNotice();
            if($model->saveInfo($params)) {
                return redirect('/admin/blog/blog_messages_notice');
            }
        } while (false);
    }
}
