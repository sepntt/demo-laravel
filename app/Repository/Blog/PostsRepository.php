<?php

namespace App\Repository\Blog;

use App\Repository\Blog\PostsInterface;

use App\BlogPosts;
use App\Models\BlogMessagesNotice;

class PostsRepository implements PostsInterface
{

    public function list($request)
    {
    	$title = $request->get('title', '');
    	$BlogPosts = new BlogPosts();

        $where = [];
    	if(!empty($title)) {
            $where[] = ['title', 'like', $title];
    	}
        $model = $BlogPosts->where($where)->orderBy('updated_at', 'desc');

        // \Illuminate\Support\Facades\DB::connection()->enableQueryLog();
        // $sql = \Illuminate\Support\Facades\DB::getQueryLog();
        // dd($sql);exit;
        $res = [$model->get(), $model->count()];
        
    	return $res;
    }

    public function show($id)
    {
    	return BlogPosts::find($id);
    	$BlogPosts = new BlogPosts();

    	return $BlogPosts->where('id', '=', $id)->get();
    }

    public function getNotice()
    {
        $notice = BlogMessagesNotice::select()->orderBy('topped_at', 'desc')->first();
        $notice->messages = $notice->messages->first();
        return $notice;
    }
}
