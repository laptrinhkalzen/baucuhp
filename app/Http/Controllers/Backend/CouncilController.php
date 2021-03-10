<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CouncilRepository;
use Repositories\PostHistoryRepository;
use DB;

class CouncilController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(CouncilRepository $councilRepo, PostHistoryRepository $postHistoryRepo) {
        $this->councilRepo = $councilRepo;
        $this->postHistoryRepo = $postHistoryRepo;
    }

    public function index() {
        $records = $this->councilRepo->all();
        return view('backend/council/index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $district = DB::table('district')->where('province_id','12')->get();
        return view('backend/council/create', compact('district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $input = $request->all();
        $validator = \Validator::make($input, $this->councilRepo->validateCreate());
        if ($validator->fails()||$input['address_coucil']=='0') {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $input['status'] = isset($input['status']) ? 1 : 0;
        $input['created_by'] = \Auth::user()->id;
        $council = $this->councilRepo->create($input);
        //Thêm vào lịch sử đăng bài
        $this->addPostHistory($council);
        if ($council) {
            return redirect()->route('admin.council.index')->with('success', 'Tạo mới thành công');
        } else {
            return redirect()->route('admin.council.index')->with('error', 'Tạo mới thất bại');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $record = $this->councilRepo->find($id);
        $district = DB::table('district')->where('province_id','12')->get();
        $record_address = $record->address_coucil;
        $record_district = DB::table('district')->where('id',$record_address)->get();
        foreach($record_district as $record_district)
        return view('backend/council/edit', compact('record','district','record_district'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $input = $request->all();
        $validator = \Validator::make($input, $this->councilRepo->validateUpdate($id));
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
//      status
        $input['status'] = isset($input['status']) ? 1 : 0;
        $input['created_by'] = \Auth::user()->id;
        $res = $this->councilRepo->update($input, $id);
        $council = $this->councilRepo->find($id);
        if ($res) {
            return redirect()->route('admin.council.index')->with('success', 'Cập nhật thành công');
        } else {
            return redirect()->route('admin.council.index')->with('error', 'Cập nhật thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $product = $this->councilRepo->find($id);
        $this->councilRepo->delete($id);
        return redirect()->back()->with('success', 'Xóa thành công');
    }


    public function addPostHistory($product) {

        $post_history['item_id'] = $product->id;
        $post_history['created_at'] = $product->created_at;
        $post_history['updated_at'] = $product->post_schedule ?: $product->updated_at;
        $post_history['module'] = 'product';
        $this->postHistoryRepo->create($post_history);
    }

}
