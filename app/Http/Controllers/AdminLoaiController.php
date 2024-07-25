<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loai;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

Paginator::useBootstrap();

class AdminLoaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $perPage = env('PER_PAGE')/2;
        $loai_arr =Loai::orderBy('thu_tu', 'asc')->paginate($perPage)->withQueryString();      
        return view('admin.loai_ds', compact('loai_arr'));
     }
     

    /**
     * Show the form for creating a new resource.
     */
    public function create()  {
        return view('admin.loai_them');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $obj = new  loai;
        $obj->ten_loai = ucfirst($request['ten_loai']);
        $obj->an_hien = $request['an_hien'];
        $obj->thu_tu = $request['thu_tu'];
        $obj->slug = Str::slug($obj->ten_loai);
        $obj->save();
        return redirect(route('loai.index'))->with('thongbao', 'Thêm thành công');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        $loaisp = loai::find($id);
        return view('admin.loai_chinh', compact('loaisp'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)  {
        $obj = loai::find($id);
        $obj->ten_loai = $request['ten_loai'];
        $obj->thu_tu = $request['thu_tu'];
        $obj->an_hien = $request['an_hien'];
        $obj->slug = Str::slug($obj->ten_loai);
        $obj->save();
        return redirect(route('loai.index'))->with('thongbao', 'Cập nhập thành công');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id) {
        $dem_sp = DB::table('san_pham')->where('id_loai', $id)->count();
        if($dem_sp > 0){
            return redirect(route('loai.index'))->with('thongbao', 'Không thể xóa mục này!');
        }
        $loaisp = loai::find($id);
        $loaisp->delete();
        return redirect(route('loai.index'))->with('thongbao', 'Xóa thành công');
    }
    
}
