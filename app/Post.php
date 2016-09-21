<?php

namespace ucrnews;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Post extends Model 
{
    use Sluggable;
    use SluggableScopeHelpers;
    protected $table = 'posts';
    /**
     * Campos que se pueden llenar
     * @var type 
     */
    protected $fillable = [
        'title', 'content', 'photo', 'admin'
    ];
    
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function like()
    {
        return $this->hasOne(Like::class);
    }
    
}
