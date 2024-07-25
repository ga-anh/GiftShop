<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class chenSanPham extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('san_pham')->insert([
            ['ten_sp' => 'Vòng tay','hinh'=> 'images/p1.jpg', 'gia' => 200000,  'id_loai' => 2],
            ['ten_sp' => 'Đồng hồ','hinh'=>  'images/p2.jpg', 'gia' => 300000,  'id_loai' => 1],
            ['ten_sp' => 'Gấu Teddy','hinh'=>  'images/p3.jpg', 'gia' => 110000,  'id_loai' => 3],
            ['ten_sp' => 'Bó hoa hồng','hinh'=>  'images/p4.jpg', 'gia' => 45000,  'id_loai' => 4],
            ['ten_sp' => 'Gấu nâu Teddy ','hinh'=>  'images/p5.jpg', 'gia' => 95000,  'id_loai' => 3],
            ['ten_sp' => 'Bó hoa trắng','hinh'=>  'images/p6.jpg', 'gia' => 70000,  'id_loai' => 4],
            ['ten_sp' => 'Đồng hồ Roblex','hinh'=>  'images/p7.jpg', 'gia' => 400000,  'id_loai' => 1],
            ['ten_sp' => 'Nhẫn','hinh'=>  'images/p8.jpg', 'gia' => 450000,  'id_loai' => 2],

            ['ten_sp' => 'Bình đựng nước','hinh'=> 'images/p9.jpg', 'gia' => 200000,  'id_loai' => 5],
            ['ten_sp' => 'Bình đựng nước 2','hinh'=>  'images/p10.jpg', 'gia' => 300000,  'id_loai' => 5],
            ['ten_sp' => 'Móc chìa khóa mini','hinh'=>  'images/p11.jpg', 'gia' => 110000,  'id_loai' => 6],
            ['ten_sp' => 'Móc chìa khóa gấu','hinh'=>  'images/p12.jpg', 'gia' => 45000,  'id_loai' => 6],
            ['ten_sp' => 'Tranh phong cảnh','hinh'=>  'images/p13.jpg', 'gia' => 95000,  'id_loai' => 7],
            ['ten_sp' => 'Tranh treo tường','hinh'=>  'images/p14.jpg', 'gia' => 70000,  'id_loai' => 7],
            ['ten_sp' => 'Quả cầu thủy tinh','hinh'=>  'images/p15.jpg', 'gia' => 400000,  'id_loai' => 8],
            ['ten_sp' => 'Mô hình','hinh'=>  'images/p16.jpg', 'gia' => 450000,  'id_loai' => 8],
            
            ['ten_sp' => 'Vòng tay 2','hinh'=> 'images/p17.jpg', 'gia' => 200000,  'id_loai' => 2],
            ['ten_sp' => 'Đồng hồ 2','hinh'=>  'images/p18.jpg', 'gia' => 300000,  'id_loai' => 1],
            ['ten_sp' => 'Gấu Teddy 2','hinh'=>  'images/p19.jpg', 'gia' => 110000,  'id_loai' => 3],
            ['ten_sp' => 'Bó hoa hồng 2','hinh'=>  'images/p20.jpg', 'gia' => 45000,  'id_loai' => 4],
            ['ten_sp' => 'Gấu nâu Teddy 2','hinh'=>  'images/p21.jpg', 'gia' => 95000,  'id_loai' => 3],
            ['ten_sp' => 'Bó hoa trắng 2','hinh'=>  'images/p22.jpg', 'gia' => 70000,  'id_loai' => 4],
            ['ten_sp' => 'Đồng hồ Roblex 2','hinh'=>  'images/p23.jpg', 'gia' => 400000,  'id_loai' => 1],
            ['ten_sp' => 'Nhẫn 2','hinh'=>  'images/p24.jpg', 'gia' => 450000,  'id_loai' => 2],
            

            ['ten_sp' => 'Bình đựng nước 3','hinh'=> 'images/p25.jpg', 'gia' => 200000,  'id_loai' => 5],
            ['ten_sp' => 'Bình đựng nước 4','hinh'=>  'images/p26.jpg', 'gia' => 300000,  'id_loai' => 5],
            ['ten_sp' => 'Móc chìa khóa mini 2','hinh'=>  'images/p27.jpg', 'gia' => 110000,  'id_loai' => 6],
            ['ten_sp' => 'Móc chìa khóa gấu 2','hinh'=>  'images/p28.jpg', 'gia' => 45000,  'id_loai' => 6],
            ['ten_sp' => 'Tranh phong cảnh 2','hinh'=>  'images/p29.jpg', 'gia' => 95000,  'id_loai' => 7],
            ['ten_sp' => 'Tranh treo tường 2','hinh'=>  'images/p30.jpg', 'gia' => 70000,  'id_loai' => 7],
            ['ten_sp' => 'Quả cầu thủy tinh 2','hinh'=>   'images/p31.jpg', 'gia' => 400000,  'id_loai' => 8],
            ['ten_sp' => 'Mô hình 2','hinh'=>  'images/p32.jpg', 'gia' => 450000,  'id_loai' => 8],

   
        ]);
    }
}
