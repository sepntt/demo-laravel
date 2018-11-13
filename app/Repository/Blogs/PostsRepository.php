<?php

namespace App\Repository\Blogs;

use App\Repository\RepositoryAbstract;

use App\BlogPosts;
use App\Models\BlogMessagesNotice;

class PostsRepository extends RepositoryAbstract implements PostsInterface
{

    public $model = '\App\Models\BlogPosts';

    public $paginate = 5;

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
