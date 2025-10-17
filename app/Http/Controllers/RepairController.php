<?php

namespace App\Http\Controllers;

use App\Models\Repair;
use Illuminate\Http\Request;

class RepairController extends Controller
{
    public function index()
    {
        // ดึงข้อมูลการแจ้งซ่อมทั้งหมด
        $repairs = Repair::all();
        return view('repairs.index', compact('repairs'));
    }

    public function create()
    {
        // ฟอร์มการสร้างการแจ้งซ่อมใหม่
        return view('repairs.create');
    }

    public function store(Request $request)
    {
        // บันทึกการแจ้งซ่อมใหม่
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string',
        ]);

        Repair::create($request->all());

        return redirect()->route('repairs.index')->with('success', 'Repair request created successfully!');
    }

    public function edit($id)
    {
        // ฟอร์มแก้ไขการแจ้งซ่อม
        $repair = Repair::findOrFail($id);
        return view('repairs.edit', compact('repair'));
    }

    public function update(Request $request, $id)
    {
        // อัปเดตการแจ้งซ่อม
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string',
        ]);

        $repair = Repair::findOrFail($id);
        $repair->update($request->all());

        return redirect()->route('repairs.index')->with('success', 'Repair request updated successfully!');
    }

    public function destroy($id)
    {
        // ลบการแจ้งซ่อม
        $repair = Repair::findOrFail($id);
        $repair->delete();

        return redirect()->route('repairs.index')->with('success', 'Repair request deleted successfully!');
    }
}
