<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Repositories\CategoryRepository;
use Repositories\ConstructionRepository;
use Repositories\KeywordRepository;
use Repositories\NewsRepository;
use Repositories\VideoRepository;
use Carbon\Carbon;

class FrontendController extends Controller {

    public function __construct(CategoryRepository $categoryRepo, ConstructionRepository $constructionRepo, KeywordRepository $keywordRepo, NewsRepository $newsRepo, VideoRepository $videoRepo) {
        $this->categoryRepo = $categoryRepo;
        $this->constructionRepo = $constructionRepo;
        $this->keywordRepo = $keywordRepo;
        $this->newsRepo = $newsRepo;
        $this->videoRepo = $videoRepo;
    }

    public function index() {
        $category_arr = $this->categoryRepo->readHomeProductCategory();
        $gallery_arr = $this->categoryRepo->readHomeGalleryCategory($limit = 8);
        $construction_arr = $this->constructionRepo->readHomeConstruction($limit = 8);
        $keyword_arr = $this->keywordRepo->readHomeRecentKeyword($limit = 6);
        //Custom
        /*DateTime*/
        $dayofweek = Carbon::now('Asia/Ho_Chi_Minh')->dayOfWeek;
        // switch ($favcolor) {
        //   case "red":
        //     echo "Your favorite color is red!";
        //     break;
        //   case "blue":
        //     echo "Your favorite color is blue!";
        //     break;
        //   case "green":
        //     echo "Your favorite color is green!";
        //     break;
        //   default:
        //     echo "Your favorite color is neither red, blue, nor green!";
        // }
        $day = Carbon::now('Asia/Ho_Chi_Minh')->day;
        $month = Carbon::now('Asia/Ho_Chi_Minh')->month;
        $year = Carbon::now('Asia/Ho_Chi_Minh')->year;
        $datetime = 
            [
            "dayofweek" => $dayofweek,
            "day" => $day,
            "month" => $month,
            "year" => $year
            ];
        // dd($datetime);
        $news_arr = $this->newsRepo->getAll($limit = 9);
        $news_isnew_arr = $this->newsRepo->getIsNew($limit = 7);
        $news_ishot_arr = $this->newsRepo->getIsHot($limit = 7);
        $video_arr = $this->videoRepo->getAll($limit = 4);
        $doc_arr = $this->newsRepo->getAllByCategory($category_id =3, $limit=4);
        return view('frontend/home/index', compact('category_arr', 'construction_arr', 'keyword_arr', 'news_arr', 'news_isnew_arr', 'news_ishot_arr' , 'video_arr', 'doc_arr'));
    }

    public function baucu() {
        return view('frontend/candidates/index');
    }

}
