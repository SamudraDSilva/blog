<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use App\Category;
use App\Tag;
use App\User;

class Post extends Model
{
    use SoftDeletes;

    protected $date=[
        'published_at'
    ];

    protected $fillable =[
        'title','image','content','published_at','category_id','author_id','slug'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function hasTag($tagId){
        return in_array($tagId, $this->tags->pluck('id')->toArray());
    }

    public function deleteImage(){
        Storage::delete($this->image);
    }

    public function scopePublished($query){
        return $query->where('published_at','<=',now());
    }

    public function scopeSearched($query){
        $search = request()->query('search');

        if(!$search){
            return $query->published();
        }
        return $query->published()->where('title','LIKE',"%{search}%")->simplePaginate(20);
    }
}
