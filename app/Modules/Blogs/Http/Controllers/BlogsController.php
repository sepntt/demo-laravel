<?php

namespace App\Modules\Blogs\Http\Controllers;

use Illuminate\Http\Request;

use App\Repository\Blogs\PostsInterface;

class BlogsController extends \App\Modules\Backend\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $PostsInterface = app()->make(PostsInterface::class);
        list($count, $data) = $PostsInterface->index($request);
        return $this->render(['data' => $data, 'json_data' => json_encode($data)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->render();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $res = false;
        do {
            $PostsInterface = app()->make(PostsInterface::class);
            try {
                if($PostsInterface->store($request)) {
                    return redirect('blogs/blogs')->with('success', '日志添加成功!');
                }
            } catch (\Illuminate\Database\QueryException $e) {
                return back()->with('warning',$e->getMessage())->withInput();
            }
        } while (false);
        if($res === false) {
            return back()->with('warning','日志添加失败!')->withInput();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $isjson = \Illuminate\Support\Facades\Input::get('_json');
        $PostsInterface = app()->make(PostsInterface::class);
        $data = $PostsInterface->show($id);
        if($isjson) {
            return $data;
        }
        return $this->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $PostsInterface = app()->make(PostsInterface::class);
        return $this->render(['data' => $PostsInterface->edit($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $res = false;
        do {
            $PostsInterface = app()->make(PostsInterface::class);
            try {
                if($PostsInterface->update($request, $id)) {
                    return redirect('blogs/blogs')->with('success', '日志修改成功!');
                }
            } catch (\Illuminate\Database\QueryException $e) {
                return back()->with('warning',$e->getMessage())->withInput();
            }
        } while (false);
        if($res === false) {
            return back()->with('warning','日志修改失败!')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $PostsInterface = app()->make(PostsInterface::class);
        if($PostsInterface->destroy($id)) {
            return redirect('blogs/blogs')->with('success', '删除成功!');
        }
        return redirect('blogs/blogs')->with('warning', '删除失败!');
    }
}
