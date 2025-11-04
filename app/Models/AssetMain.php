<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetMain extends Model
{
    use HasFactory;

    protected $table = 'asset_main';  // ชื่อตารางในฐานข้อมูล

    // Specify the primary key if it's not 'id'
    protected $primaryKey = 'asset_id';

    // กำหนดฟิลด์ที่อนุญาตให้กรอกข้อมูล
    protected $fillable = [
        'asset_name', 'asset_number', 'asset_sn_number', 'asset_countingunit', 'asset_price', 'asset_regis_at'
    ];

    // Cast dates to Carbon instances
    protected $casts = [
        'asset_regis_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Enable timestamps
    public $timestamps = true;
}