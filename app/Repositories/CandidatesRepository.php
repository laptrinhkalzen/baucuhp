<?php

/**
 * Created by PhpStorm.
 * User: Hien
 * Date: 12/09/2019
 * Time: 11:03 AM
 */

namespace App\Repositories;

use Repositories\Support\AbstractRepository;
use Illuminate\Support\Facades\DB;

class CandidatesRepository extends AbstractRepository {

    public function __construct(\Illuminate\Container\Container $app) {
        parent::__construct($app);
    }

    public function model() {
        return 'App\Candidates';
    }

    public function validateCreate() {
        return $rules = [
            'title' => 'required',
            'title3_cd' => 'required',
            'images' => 'required',
            'birthday' => 'required',
        ];
    }

    public function validateUpdate($id) {
        return $rules = [
            'title' => 'required',
            'title3_cd' => 'required',
            'images' => 'required',
        ];
    }

    public function getBirthday($id) {
        return $this->model->where('id', $id)->pluck('birthday');
    }

}
