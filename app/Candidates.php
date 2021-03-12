<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidates extends Model {

    //
    protected $table = "candidates";
    protected $fillable = [
        'title', 'title2_cd', 'title3_cd', 'images', 'sex_cd', 'birthday', 'address_cd', 'address2_cd', 'employment_cd', 'position_cd', 'story_cd','status'
    ];


    public function getPostSchedule() {
        return date('d/m/Y', strtotime($this->post_schedule != '0000-00-00 00:00:00' ?: $this->created_at));
    }

    public function url() {
        return route('news.detail', ['id' => $this->id]);
    }

    public function getImage() {
        $image_arr = explode(',', $this->images);
        return $image_arr[0];
    }

    public function created_at() {
        return date('d/m/Y', strtotime($this->created_at));
    }

    public function getBirthday() {
        return date('d/m/Y', strtotime($this->birthday));
    }


}
