<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function author()
    {
        return $this->belongsTo(User::class);
    }
    public function getImageUrlAttribute($value)
    {
        if(is_null($this->image)) { return '';}
        if(!file_exists(public_path().'/img/'.$this->image)){ return '';}
        return asset('img/'.$this->image);
    }
    
    public function getDateAttribute($value)
    {
        return $this->created_at->diffForHumans();
    }
    
    public function scopeLatestFirst()
    {
        return $this->orderBy('created_at','desc');
    }
}
