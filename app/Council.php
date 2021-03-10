<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Council extends Model {

    //
    protected $table = "council";
    protected $fillable = [
        'title', 'alias', 'address_coucil', 'total_candidates', 'elected_candidates', 'total_voters', 'status', 'created_by',
    ];


    public function getPostSchedule() {
        return date('d/m/Y', strtotime($this->post_schedule != '0000-00-00 00:00:00' ?: $this->created_at));
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


}
