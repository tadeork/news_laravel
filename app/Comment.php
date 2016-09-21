<?php

namespace ucrnews;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * Campos con permisos de escritura
     * @var type 
     */
    protected $fillable = [
        'post_id','from', 'content'
    ];
    
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
