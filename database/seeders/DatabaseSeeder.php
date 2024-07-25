<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
        ]);
        DB::table('users')->insert([
            [
                'name' => 'Đỗ Đạt Cao', 'password' => bcrypt('hehe'), 'dia_chi' => '',
                'email' => 'dodatcao@gmail.com', 'dien_thoai' => '0918765238',
                'hinh' => '', 'role' => 1
            ],
            [
                'name' => 'Mai Anh Tới', 'password' => bcrypt('hehe'), 'dia_chi' => '',
                'email' => 'maianhtoi@gmail.com', 'dien_thoai' => '098532482',
                'hinh' => '', 'role' => 0
            ],
            [
                'name' => 'Đào Kho Báu', 'password' => bcrypt('hehe'), 'dia_chi' => '',
                'email' => 'daokhobau@gmail.com', 'dien_thoai' => '097397392',
                'hinh' => '', 'role' => 1
            ]
        ]);
        $loai_arr = ['Trang sức nam', 'Trang sức nữ', 'Gấu bông', 'Hoa', 'Bình đựng nước', 'Móc chìa khóa', 'Tranh', 'Đồ thủ công mỹ nghệ'];
        for ($i = 0; $i < count($loai_arr); $i++) {
            $idloai = DB::table('loai')->insertGetId(
                ['ten_loai' => $loai_arr[$i], 'thu_tu' => $i, 'an_hien' => 1]
            );
            $slug= Str::slug($loai_arr[$i]).'-'.$idloai;
            DB::table('loai')->where('id',$idloai)->update(['slug'=>$slug]);
        };
        
    }
}
