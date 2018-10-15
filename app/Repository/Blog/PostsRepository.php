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

    	if(!empty($title)) {
    		$BlogPosts->where('title', 'like', $title);
    	}

    	return [$BlogPosts->get(), $BlogPosts->count()];
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
