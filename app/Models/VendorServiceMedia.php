<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorServiceMedia extends Model
{
    use HasFactory;

    protected $table = 'vendor_service_media';

    protected $fillable = [
        'vendor_service_id',
        'media_type',
        'file_path',
        'thumbnail_path',
        'sort_order',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];

    public function service()
    {
        return $this->belongsTo(VendorService::class, 'vendor_service_id');
    }
}
