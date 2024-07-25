<?php

namespace App\Http\Controllers;

use App\Models\binh_luan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Arr;

Paginator::useBootstrap();
class SiteController extends Controller
{
    public function __construct()
    {
        $listsp = DB::table('loai')->where('an_hien', 1)->orderBy('thu_tu')->get();
        \View::share(['listsp'=>$listsp]);
    }
    function index(){
        $spmoi=DB::table('san_pham')->where('an_hien',0)->get();
        return view('home',['spmoi'=>$spmoi]);
    }
    function chitietsp($id=0){
        if(is_numeric($id)==false)
        return redirect('/thongbao')->with('thongbao',"Khong co san pham: ".$id);
        $spct=DB::table('san_pham')->where('id',$id)->first();
        $spct->soluong = 1;
        $id_loai = $spct->id_loai;     
        $splienquan_arr = DB::table('san_pham')
        ->where('id_loai', $id_loai)
        ->where('tinh_chat', $spct->tinh_chat)
        ->orderBy('ngay','desc')
        ->limit(4)->get()->except($id);  
        $binh_luan_arr = binh_luan::where('id_sp', $id)->orderBy('thoi_diem', 'asc')->get();
        return view('chitietsp',['id'=>$id,'spct'=>$spct,'splienquan_arr'=>$splienquan_arr,'binh_luan_arr'=>$binh_luan_arr]);
    }
    function sptheoloai($id_loai=0){
        $spshow=DB::table('san_pham')->where('id_loai',$id_loai)->paginate(4);
        return view('sp_theoloai',['id_loai'=>$id_loai,'spshow'=>$spshow]);
    }
    function shop(){
        $spshow=DB::table('san_pham')->where('an_hien',0)->paginate(8);
        return view('shop',['spshow'=>$spshow]);
    }
    function luubinhluan(){
        $id_user=1;
        $arr = request()->post(); 
        $id_sp = (Arr::exists($arr, 'id_sp'))? $arr['id_sp']:"-1";
        $noi_dung = (Arr::exists($arr, 'noi_dung'))? $arr['noi_dung']:"";
        if ($id_sp<=-1) return redirect("/thongbao")->with(['thongbao'=>'Không biết id_sp']);
        if ($noi_dung=="") return redirect("/thongbao")->with(['thongbao'=>'Nội dung không có']);
        binh_luan::insert(
          ['id_user'=>$id_user, 'id_sp'=>$id_sp, 'noi_dung'=>$noi_dung, 'thoi_diem'=>now()]
        );
        return redirect('/thongbao')->with(['thongbao'=>'Đã lưu bình luận']);
    }  
}
