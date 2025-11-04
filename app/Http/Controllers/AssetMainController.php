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

    public function create()
    {
        return view('assets.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'asset_name' => 'required|string|max:255',
            'asset_number' => 'required|string|max:255|unique:asset_main,asset_number,NULL,asset_id',
            'asset_sn_number' => 'nullable|string|max:255',
            'asset_countingunit' => 'nullable|string|max:255',
            'asset_price' => 'nullable|numeric|min:0',
            'asset_regis_at' => 'nullable|date',
        ]);

        AssetMain::create($validated);

        return redirect()->route('assets.index')->with('success', 'Asset created successfully!');
    }

    public function edit($id)
    {
        $asset = AssetMain::findOrFail($id);
        return view('assets.edit', compact('asset'));
    }

    public function update(Request $request, $id)
    {
        $asset = AssetMain::findOrFail($id);

        $validated = $request->validate([
            'asset_name' => 'required|string|max:255',
            'asset_number' => 'required|string|max:255|unique:asset_main,asset_number,' . $id . ',asset_id',
            'asset_sn_number' => 'nullable|string|max:255',
            'asset_countingunit' => 'nullable|string|max:255',
            'asset_price' => 'nullable|numeric|min:0',
            'asset_regis_at' => 'nullable|date',
        ]);

        $asset->update($validated);

        return redirect()->route('assets.index')->with('success', 'Asset updated successfully!');
    }

    public function destroy($id)
    {
        $asset = AssetMain::findOrFail($id);
        $asset->delete();

        return redirect()->route('assets.index')->with('success', 'Asset deleted successfully!');
    }
}
