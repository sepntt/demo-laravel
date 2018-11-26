<?php

namespace App\Modules\Blogs\Http\Controllers;

use Illuminate\Http\Request;

use App\Repository\Blogs\PostsInterface;

class BlogMessageNoticesController extends \App\Modules\Backend\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $Posts = app()->make(PostsInterface::class);
        $Posts->model(\App\Models\BlogMessagesNotice::class);
        list($count, $data) = $Posts->noticesIndex($request);
        
        return $this->render(['data' => $data, 'json_data' => json_encode($data)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Posts = app()->make(PostsInterface::class);
        $Posts->model(\App\Models\BlogMessagesNotice::class);
        $alert = $Posts->noticesAlert();
        return $this->render(['alert' => $alert]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
