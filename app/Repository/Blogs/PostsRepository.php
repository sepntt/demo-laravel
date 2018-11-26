<?php

namespace App\Repository\Blogs;

use App\Repository\RepositoryAbstract;

use App\BlogPosts;
use App\Models\BlogMessagesNotice;

class PostsRepository extends RepositoryAbstract implements PostsInterface
{

    public $model = '\App\Models\BlogPosts';

    public $paginate = 5;


    public function getNotice()
    {
        $notice = BlogMessagesNotice::select()->orderBy('topped_at', 'desc')->first();
        $notice->messages = $notice->messages->first();
        return $notice;
    }

    public function noticesIndex($request)
    {
    	$where = [];
		$model = BlogMessagesNotice::with('messages')->where($where)->orderBy('updated_at', 'desc');
		$res = [$model->count(), $model->paginate($this->paginate)];
		return $res;
    }

    public function noticesAlert()
    {
        return [
            'primary' => 'primary',
            'secondary' => 'secondary',
            'success' => 'success',
            'danger' => 'danger',
            'warning' => 'warning',
            'info' => 'info',
            'light' => 'light',
            'dark' => 'dark'
        ];
    }
}
