<?php

namespace App\Repository\Todolist;

use App\Repository\Todolist\TodolistInterface;

use App\Models\Todolist;

class TodolistRepository implements TodolistInterface
{

    public function list($request)
    {
    	$title = $request->get('title', '');

    	$Todolist = new Todolist();

    	if(!empty($title)) {
    		$Todolist->where('title', 'like', $title);
    	}

    	return [$Todolist->get(), $Todolist->count()];
    }

}
