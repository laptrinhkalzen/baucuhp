<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model {

    //
    protected $table = "news";
    protected $fillable = [
        'title', 'alias', 'description', 'content', 'meta_title', 'meta_keywords', 'meta_description', 'is_hot', 'is_new', 'status', 'ordering', 'keywords', 'images', 'created_by', 'post_schedule'
    ];

    public function categories() {
        return $this->belongsToMany('App\Category', 'news_category', 'news_id', 'category_id');
    }

    public function newsCategories() {
        return $this->hasMany('App\NewsCategory');
    }

    public function getPostSchedule() {
        $value = $this->post_schedule; 
        return $value;
    }

    public function url() {
        return route('news.detail', ['alias' => $this->alias]);
    }

    public function getImage() {
        $image_arr = explode(',', $this->images);
        return $image_arr[0];
    }

    public function created_at() {
        return date('d/m/Y', strtotime($this->created_at));
    }

    public function createdBy() {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function getDayOfWeek($dayofweek) {
        if($dayofweek==5)
            $value = 'Sáu';
        return $value;
    }

}
