<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class san_pham extends Model
{
    use HasFactory;
    
    protected $table = 'san_pham';
    public $primaryKey = 'id';
    protected $attributes = ['an_hien'=>1,'hot'=>0,'luot_xem'=>0];
    protected $dates = ['ngay'];
    protected $fillable = ['ten_sp','slug', 'gia','gia_km','id_loai',
    'hinh', 'ngay','hot', 'luot_xem','an_hien','mo_ta' ];

}
