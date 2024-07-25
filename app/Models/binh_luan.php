<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class binh_luan extends Model
{
    use HasFactory;
    protected $table = 'binh_luan';
    public $primaryKey = 'id';
    protected $attributes = [];
    protected $dates = ['thoi_diem'];
    protected $fillable = ['id_sp', 'id_user','noi_dung','thoi_diem','an_hien'];
    public function User(): BelongsTo {
        return $this->belongsTo(User::class, 'id_user');
    }
}
