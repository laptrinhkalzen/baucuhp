<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CandidatesRepository;
use Repositories\PostHistoryRepository;

class CandidatesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(CandidatesRepository $candidatesRepo, PostHistoryRepository $postHistoryRepo) {
        $this->candidatesRepo = $candidatesRepo;
        $this->postHistoryRepo = $postHistoryRepo;
    }

    public function index() {
        $records = $this->candidatesRepo->all();
        return view('backend/candidates/index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('backend/candidates/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $input = $request->all();
        $validator = \Validator::make($input, $this->candidatesRepo->validateCreate());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $input['status'] = isset($input['status']) ? 1 : 0;
        $input['created_by'] = \Auth::user()->id;
        $candidates = $this->candidatesRepo->create($input);
        //Thêm vào lịch sử đăng bài
        $this->addPostHistory($candidates);
        if ($candidates) {
            return redirect()->route('admin.candidates.index')->with('success', 'Tạo mới thành công');
        } else {
            return redirect()->route('admin.candidates.index')->with('error', 'Tạo mới thất bại');
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
        $record = $this->candidatesRepo->find($id);
        return view('backend/candidates/edit', compact('record'));
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
        $validator = \Validator::make($input, $this->candidatesRepo->validateUpdate($id));
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
//      status
        $input['status'] = isset($input['status']) ? 1 : 0;
        $input['created_by'] = \Auth::user()->id;
        $res = $this->candidatesRepo->update($input, $id);
        $candidates = $this->candidatesRepo->find($id);
        if ($res) {
            return redirect()->route('admin.candidates.index')->with('success', 'Cập nhật thành công');
        } else {
            return redirect()->route('admin.candidates.index')->with('error', 'Cập nhật thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $product = $this->candidatesRepo->find($id);
        $this->candidatesRepo->delete($id);
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
