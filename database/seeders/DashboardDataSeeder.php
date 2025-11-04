<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AssetMain;
use App\Models\Repair;
use Illuminate\Support\Facades\DB;

class DashboardDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample Assets
        $assets = [
            [
                'asset_name' => 'Dell Laptop XPS 15',
                'asset_number' => 'ASSET-001',
                'asset_sn_number' => 'SN-XPS-001',
                'asset_countingunit' => 'Unit',
                'asset_price' => 45000.00,
                'asset_regis_at' => now()->subDays(30),
                'created_at' => now()->subDays(30),
                'updated_at' => now()->subDays(30),
            ],
            [
                'asset_name' => 'HP Printer LaserJet Pro',
                'asset_number' => 'ASSET-002',
                'asset_sn_number' => 'SN-HP-002',
                'asset_countingunit' => 'Unit',
                'asset_price' => 12000.00,
                'asset_regis_at' => now()->subDays(25),
                'created_at' => now()->subDays(25),
                'updated_at' => now()->subDays(25),
            ],
            [
                'asset_name' => 'Cisco Network Switch',
                'asset_number' => 'ASSET-003',
                'asset_sn_number' => 'SN-CISCO-003',
                'asset_countingunit' => 'Unit',
                'asset_price' => 28000.00,
                'asset_regis_at' => now()->subDays(20),
                'created_at' => now()->subDays(20),
                'updated_at' => now()->subDays(20),
            ],
            [
                'asset_name' => 'Samsung Monitor 27"',
                'asset_number' => 'ASSET-004',
                'asset_sn_number' => 'SN-SAM-004',
                'asset_countingunit' => 'Unit',
                'asset_price' => 8500.00,
                'asset_regis_at' => now()->subDays(15),
                'created_at' => now()->subDays(15),
                'updated_at' => now()->subDays(15),
            ],
            [
                'asset_name' => 'Logitech Wireless Mouse',
                'asset_number' => 'ASSET-005',
                'asset_sn_number' => 'SN-LOG-005',
                'asset_countingunit' => 'Unit',
                'asset_price' => 1200.00,
                'asset_regis_at' => now()->subDays(10),
                'created_at' => now()->subDays(10),
                'updated_at' => now()->subDays(10),
            ],
            [
                'asset_name' => 'Apple MacBook Pro 16"',
                'asset_number' => 'ASSET-006',
                'asset_sn_number' => 'SN-MAC-006',
                'asset_countingunit' => 'Unit',
                'asset_price' => 85000.00,
                'asset_regis_at' => now()->subDays(5),
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(5),
            ],
            [
                'asset_name' => 'Canon Camera EOS R5',
                'asset_number' => 'ASSET-007',
                'asset_sn_number' => 'SN-CAN-007',
                'asset_countingunit' => 'Unit',
                'asset_price' => 120000.00,
                'asset_regis_at' => now()->subDays(3),
                'created_at' => now()->subDays(3),
                'updated_at' => now()->subDays(3),
            ],
        ];

        foreach ($assets as $asset) {
            AssetMain::create($asset);
        }

        // Sample Repairs
        $repairs = [
            [
                'name' => 'Laptop Screen Replacement',
                'description' => 'Dell XPS 15 screen is cracked and needs replacement',
                'status' => 'completed',
                'priority' => 'high',
                'completed_at' => now()->subDays(2),
                'created_at' => now()->subDays(10),
                'updated_at' => now()->subDays(2),
            ],
            [
                'name' => 'Printer Paper Jam Issue',
                'description' => 'HP Printer frequently jams when printing',
                'status' => 'in_progress',
                'priority' => 'medium',
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(1),
            ],
            [
                'name' => 'Network Switch Port Failure',
                'description' => 'Port 8 on Cisco switch is not working',
                'status' => 'pending',
                'priority' => 'high',
                'created_at' => now()->subDays(3),
                'updated_at' => now()->subDays(3),
            ],
            [
                'name' => 'Monitor Flickering',
                'description' => 'Samsung monitor shows flickering on startup',
                'status' => 'in_progress',
                'priority' => 'low',
                'created_at' => now()->subDays(7),
                'updated_at' => now()->subHours(12),
            ],
            [
                'name' => 'Mouse Battery Replacement',
                'description' => 'Wireless mouse battery needs replacement',
                'status' => 'completed',
                'priority' => 'low',
                'completed_at' => now()->subDays(1),
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(1),
            ],
            [
                'name' => 'MacBook Keyboard Issue',
                'description' => 'Some keys on MacBook Pro are not responding',
                'status' => 'pending',
                'priority' => 'high',
                'created_at' => now()->subHours(6),
                'updated_at' => now()->subHours(6),
            ],
            [
                'name' => 'Camera Lens Cleaning',
                'description' => 'Canon camera lens needs professional cleaning',
                'status' => 'completed',
                'priority' => 'medium',
                'completed_at' => now()->subDays(4),
                'created_at' => now()->subDays(8),
                'updated_at' => now()->subDays(4),
            ],
            [
                'name' => 'Software Update Required',
                'description' => 'Dell laptop needs OS and driver updates',
                'status' => 'in_progress',
                'priority' => 'medium',
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subHours(3),
            ],
        ];

        foreach ($repairs as $repair) {
            Repair::create($repair);
        }
    }
}

