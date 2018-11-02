<?php

namespace App\Repository;

use Illuminate\Support\Facades\Auth;

/**
* 
*/
abstract class RepositoryAbstract
{
	
	public $model;

	public function list($request)
	{
		$where = [];
		$model = $this->model::where($where)->orderBy('updated_at', 'desc');
		$res = [$model->get(), $model->count()];
		return $res;
	}

	public function create($request)
	{
		dd($request->post());
		\DB::connection()->enableQueryLog();
		$model = $this->model::find(1);
		if(empty($model)) {
			dd(1);
			$model->create($request->post());
		}
		// dd(\DB::getQueryLog());
		return $model->save($request->post());
	}
}