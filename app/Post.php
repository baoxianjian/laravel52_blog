<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use GrahamCampbell\Markdown\Facades\Markdown;

class Post extends Model
{
    protected $dates = ['published_at'];
    
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
        return is_null($this->published_at) ? '' :  $this->published_at->diffForHumans();
    }
    
    public function getBodyHtmlAttribute($value)
    {
        return $this->body ? Markdown::convertToHtml(e($this->body)) : null;
    }
    
        public function getExcerptHtmlAttribute($value)
    {
        return $this->excerpt ? Markdown::convertToHtml(e($this->excerpt)) : null;
    }
            
    public function scopeLatestFirst()
    {
        return $this->orderBy('created_at','desc');
    }
    
    public function scopePublished($query)
    {
        return $query->where('published_at','<=', Carbon::now());
    }
}
