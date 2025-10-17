<?php

namespace App\Http\Controllers;

use App\Models\AssetMain;
use App\Models\AssetImport;
use App\Models\AssetStatus;
use Illuminate\Http\Request;

class AssetMainController extends Controller
{
    public function index()
{
    // ใช้ paginate เพื่อลดจำนวนข้อมูลที่แสดงในแต่ละหน้า
    $assets = AssetMain::paginate(10);  // 10 รายการต่อหน้า

    // ส่งข้อมูลไปยัง view 'assets.index'
    return view('assets.index', compact('assets'));  // ส่งตัวแปร $assets ไปที่ view
}
}
