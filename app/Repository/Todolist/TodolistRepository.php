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

    public function viewIndex($list)
    {
    	$btn = array_column($this->doneArr(), 'btn', 'id');
    	foreach ($list as $key => $value) {
    		$list[$key]['btn_done'] = $btn[$value['done']];
    	}
    	return $list;
    }

    public function doneName()
    {
    	$name = array_column($this->doneArr(), 'name', 'id');
    	return $name;
    }

    public function viewBtn()
    {
    	return $this->doneArr();
    }

    public function doneArr()
    {
    	return config('customer.todolist.done');
    }

}
