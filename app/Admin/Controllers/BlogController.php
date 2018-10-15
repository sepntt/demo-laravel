<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\BlogPosts;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class BlogController extends Controller
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

            $content->header('Index');
            $content->description('description');

            $content->body($this->grid());
        });
    }

    /**
     * Show interface.
     *
     * @param $id
     * @return Content
     */
    public function show($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('Detail');
            $content->description('description');

            $content->body(Admin::show(BlogPosts::findOrFail($id), function (Show $show) {

                $show->id('ID');
                $show->title('标题');
                $show->body('内容');

                $show->created_at('Created At');
                $show->updated_at('Updated At');
            }));
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

            $content->header('Edit');
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

            $content->header('Create');
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
        return Admin::grid(BlogPosts::class, function (Grid $grid) {
            $grid->model()->orderBy('id', 'desc');
            $grid->id('ID')->sortable();
            $grid->title('标题')->sortable();

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
        return Admin::form(BlogPosts::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('title', '标题');
            $form->ckeditor('body', '内容');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }

    public function upload(Request $request)
    {
    	$re = ['uploaded' => 1, 'url' => '/'];
    	try {
    		$file = $request->file('upload');
	        $Storage = Storage::disk('admin');
	        $url = $Storage->url($Storage->putFile('upload', $request->file('upload')));
	        $re['uploaded'] = 1;
	        $re['url'] = $url;
    	} catch (Exception $e) {
    		$re['uploaded'] = 0;
    		$re['message'] = $e->getMessage();
    	}
	    return $re;

    	// return ['uploaded' => 1,'url' => '/'];
    }
}
