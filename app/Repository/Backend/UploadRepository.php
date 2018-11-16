<?php

namespace App\Repository\Backend;

use App\Repository\RepositoryAbstract;

class UploadRepository extends RepositoryAbstract implements UploadInterface
{
    public $model = '\App\Models\UploadFiles';


    public function store($url)
    {
    	$model = new $this->model(['url' => $url]);
		if($model->save()) {
			return $model->id;
		}
		return false;
    }
}
