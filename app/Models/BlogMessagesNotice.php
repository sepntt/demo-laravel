<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Messages;
use Illuminate\Support\Facades\DB;

class BlogMessagesNotice extends Model
{
    use SoftDeletes;

    protected $table = 'blog_messages_notice';

    public function messageBelongsTo()
    {
    	return $this->belongsTo(Messages::class);
    }

    public function message()
    {
    	return $this->hasOne(Messages::class, 'id', 'messages_id');
    }

    public function messages()
    {
    	return $this->hasMany(Messages::class, 'id', 'messages_id');
    }

    public function saveInfo($params)
    {
        DB::beginTransaction();
        if(isset($params['id'])) {
            $self = $this->find($params['id']);
            $model = Messages::find($self->messages_id);
        } else {
            $self = $this;
            $model = new Messages();
        }
        
        $model->message = $params['message'];
        $model->content = $params['content'];

        if(!$model->save()) {
            DB::rollBack();
        }

        $self->color = $params['color'];
        $self->topped_at = $params['topped_at'];
        $self->messages_id = $model->id;

        if(!$self->save()) {
            DB::rollBack();
        }
        $id = $self->id;

        DB::commit();
        return $id;
    }

}
