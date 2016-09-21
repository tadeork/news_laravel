<?php

namespace ucrnews;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable =['likes'];
    
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
