<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UploadFiles extends Model
{
    use SoftDeletes;
    protected $table = 'upload_files';
}
