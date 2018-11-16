<?php

namespace App\Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;

use App\Repository\Backend\UploadInterface;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Upload = app()->make(UploadInterface::class);
    	return $Upload->index($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$re = ['uploaded' => 1, 'url' => '/'];
    	try {
    		$file = $request->file('upload');
	        $Storage = Storage::disk('backend');
	        $url = $Storage->url($Storage->putFile('upload', $request->file('upload')));
	        $re['uploaded'] = 1;
	        $re['url'] = $url;
	        $Upload = app()->make(UploadInterface::class);
	        $Upload->store();
    	} catch (Exception $e) {
    		$re['uploaded'] = 0;
    		$re['message'] = $e->getMessage();
    	}
	    return $re;
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
