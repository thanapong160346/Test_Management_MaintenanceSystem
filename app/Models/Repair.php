<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    use HasFactory;

    protected $table = 'repairs';

    protected $fillable = [
        'name',
        'description',
        'status',
        'asset_id',
        'reported_by',
        'assigned_to',
        'priority',
        'completed_at',
    ];

    protected $casts = [
        'completed_at' => 'datetime',
    ];
}

