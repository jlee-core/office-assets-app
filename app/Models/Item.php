<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use App\Enums\ItemStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasUuids, HasFactory;

    protected $fillable = [
        'name',
        'category',
        'location',
        'status',
        'note',
    ];

    protected $keyType = 'string';
    protected $casts = [
        'status' => ItemStatus::class,
    ];
    public $incrementing = false;
}
