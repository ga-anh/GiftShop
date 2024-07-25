<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use \App\Models\binh_luan;

class SanPhamController extends Controller
{
    public function __construct()
    {
        $listsp = DB::table('loai')->where('an_hien', 1)->orderBy('thu_tu')->get();
        \View::share(['listsp'=>$listsp]);
    } 
    function themvaogio(Request $request, $id_sp = 0, $soluong=1){
        if ($request->session()->exists('cart')==false) {//chưa có cart trong session           
            $request->session()->push('cart', ['id_sp'=> $id_sp,  'soluong'=> $soluong]);          
        } else {// đã có cart, kiểm tra id_sp có trong cart không
            $cart =  $request->session()->get('cart'); 
            $index = array_search($id_sp, array_column($cart, 'id_sp'));
            if ($index!=''){ //id_sp có trong giỏ hàng thì tăhg số lượng
                $cart[$index]['soluong']+=$soluong;
                $request->session()->put('cart', $cart);
            }
            else { //sp chưa có trong arrary cart thì thêm vào 
                $cart[]= ['id_sp'=> $id_sp, 'soluong'=> $soluong];
                $request->session()->put('cart', $cart);
            }    
        }        
        //$request->session()->forget('cart');
        return redirect('/hiengiohang');
    }
    function hiengiohang(Request $request)
    {
        // Lấy giỏ hàng từ session, nếu không tồn tại thì tạo mảng giỏ hàng trống
        $cart = $request->session()->get('cart', []);
    
        $tongtien = 0;
        $tongsoluong = 0;
    
        // Kiểm tra nếu giỏ hàng không trống thì tiến hành xử lý
        if (count($cart) > 0) {
            for ($i = 0; $i < count($cart); $i++) {
                $sp = $cart[$i];
                $ten_sp = DB::table('san_pham')->where('id', $sp['id_sp'])->value('ten_sp');
                $gia = DB::table('san_pham')->where('id', $sp['id_sp'])->value('gia');
                $hinh = DB::table('san_pham')->where('id', $sp['id_sp'])->value('hinh');
                $thanhtien = $gia * $sp['soluong'];
                $tongsoluong += $sp['soluong'];
                $tongtien += $thanhtien;
    
                $sp['ten_sp'] = $ten_sp;
                $sp['gia'] = $gia;
                $sp['hinh'] = $hinh;
                $sp['thanhtien'] = $thanhtien;
                $cart[$i] = $sp;
            }
        }
    
        // Đưa giỏ hàng đã xử lý trở lại session
        $request->session()->put('cart', $cart);
    
        return view('hiengiohang', compact(['cart', 'tongsoluong', 'tongtien']));
    }
    
    function xoasptronggio(Request $request, $id = 0)
    {
        $cart =  $request->session()->get('cart');
        $index = array_search($id, array_column($cart, 'id_sp'));
        if ($index != '') {
            array_splice($cart, $index, 1);
            $request->session()->put('cart', $cart);
        }
        return redirect('/hiengiohang');
    }
    function download(){
        return view('download');
    }
   
    
}
