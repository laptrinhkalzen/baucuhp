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

class CouncilRepository extends AbstractRepository {

    public function __construct(\Illuminate\Container\Container $app) {
        parent::__construct($app);
    }

    public function model() {
        return 'App\Council';
    }

    public function validateCreate() {
        return $rules = [
            'title' => 'required|unique:council',
            'total_candidates' => 'required|integer',
            'elected_candidates' => 'required|integer',
            'total_voters' => 'required|integer'
        ];
    }

    public function validateUpdate($id) {
        return $rules = [
            'title' => 'required|unique:council,title,' . $id . ',id',
            'total_candidates' => 'required|integer',
            'elected_candidates' => 'required|integer',
            'total_voters' => 'required|integer'
        ];
    }

}
