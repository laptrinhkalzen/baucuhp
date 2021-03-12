<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Repositories\CategoryRepository;
use Repositories\ConstructionRepository;
use Repositories\KeywordRepository;
use Repositories\NewsRepository;
use Repositories\VideoRepository;
use App\Repositories\CandidatesRepository;
use Carbon\Carbon;

class FrontendController extends Controller {

    public function __construct(CategoryRepository $categoryRepo, ConstructionRepository $constructionRepo, KeywordRepository $keywordRepo, NewsRepository $newsRepo, VideoRepository $videoRepo, CandidatesRepository $candidatesRepo) {
        $this->categoryRepo = $categoryRepo;
        $this->constructionRepo = $constructionRepo;
        $this->keywordRepo = $keywordRepo;
        $this->newsRepo = $newsRepo;
        $this->videoRepo = $videoRepo;
        $this->candidatesRepo = $candidatesRepo;
    }

    public function index() {
        $category_arr = $this->categoryRepo->readHomeProductCategory();
        $gallery_arr = $this->categoryRepo->readHomeGalleryCategory($limit = 8);
        $construction_arr = $this->constructionRepo->readHomeConstruction($limit = 8);
        $keyword_arr = $this->keywordRepo->readHomeRecentKeyword($limit = 6);
        $news_arr = $this->newsRepo->getIsHot($limit = 9);
        $news_isnew_arr = $this->newsRepo->getIsNew($limit = 7);
        $news_ishot_arr = $this->newsRepo->getIsHot($limit = 7);
        $video_arr = $this->videoRepo->getAll($limit = 4);
        $doc_arr = $this->newsRepo->getAllByCategory($category_id =3, $limit=4);
        $candidates = $this ->candidatesRepo->getAll();
        return view('frontend/home/index', compact('category_arr', 'construction_arr', 'keyword_arr', 'news_arr', 'news_isnew_arr', 'news_ishot_arr' , 'video_arr', 'doc_arr','candidates'));
    }

    public function baucu() {
        $record = $this ->candidatesRepo->getAll();
        return view('frontend/candidates/index', compact('record'));
    }


}
