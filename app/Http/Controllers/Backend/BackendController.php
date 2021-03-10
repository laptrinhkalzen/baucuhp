<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\CouncilRepository;
use App\Repositories\CandidatesRepository;



class BackendController  extends Controller
{
    

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(CandidatesRepository $candidatesRepo, CouncilRepository $councilRepo) {
        $this->candidatesRepo = $candidatesRepo;
        $this->councilRepo = $councilRepo;
    }
    public function index()
    {
        $council_count = $this->councilRepo->all()->count();
        $candidates_count = $this->candidatesRepo->all()->count();
        return view('backend/index', compact('council_count', 'candidates_count'));
    }


}