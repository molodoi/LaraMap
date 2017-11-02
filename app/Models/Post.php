<?php

namespace App\Models;

use Faker\Provider\zh_TW\DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'slug', 'published', 'category_id', 'tags_list'];
    //protected $fillable = ['title', 'content', 'slug', 'published', 'category_id'];

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function tags(){
        return $this->belongsToMany('App\Models\Tag');
    }

    public function getTagsListAttribute(){
        if($this->id){
            return $this->tags->pluck('name', 'id');
        }
    }

    public function setTagsListAttribute($value){
        return $this->tags()->sync($value);
    }

    /**
     * Scope est publié
     * @param $query
     *
     */
    public function scopePublished($query){
        return $query->where('published', true)->where('created_at','<', DB::raw('NOW()'));
        //return $query->where('published', true)->whereRaw('created_at < NOW()');
    }

    /**
     * Scope est search by title
     * @param $query
     *
     */
    public function scopeSearchByTitle($query, $q){
        return $query->where('title', 'LIKE', '%'.$q.'%' );
    }

    /**
     * @return array dates
     */
    public function getDates(){
        return ['created_at', 'updated_at', 'published_at'];
    }

    /*public function getTitleAttribute($value){
        return ucfirst($value);
    }*/

    public function setSlugAttribute($value){
        $this->attributes['slug'] = Str::slug($this->title);
    }

    public function setPublishedAtAttribute(){
        $this->attributes['published_at'] = Carbon::now();
    }
}
