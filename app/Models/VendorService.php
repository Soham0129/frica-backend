<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorService extends Model
{
    use HasFactory;

    protected $table = 'vendor_services';

    protected $fillable = [
        'store_id',
        'service_category_id',
        'title',
        'slug',
        'short_description',
        'description',
        'service_mode',
        'base_price',
        'min_price',
        'max_price',
        'price_type',
        'city',
        'area',
        'latitude',
        'longitude',
        'travel_radius_km',
        'is_featured',
        'is_verified',
        'verification_status',
        'rating_avg',
        'total_reviews',
        'is_active',
    ];

    protected $casts = [
        'base_price' => 'decimal:2',
        'min_price' => 'decimal:2',
        'max_price' => 'decimal:2',
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',
        'travel_radius_km' => 'decimal:2',
        'is_featured' => 'boolean',
        'is_verified' => 'boolean',
        'rating_avg' => 'decimal:2',
        'total_reviews' => 'integer',
        'is_active' => 'boolean',
    ];

    public const MODE_FIXED_PACKAGE = 'fixed_package';
    public const MODE_CUSTOM_QUOTE = 'custom_quote';
    public const MODE_HOURLY = 'hourly';
    public const MODE_DAILY = 'daily';

    public const PRICE_FIXED = 'fixed';
    public const PRICE_STARTING_FROM = 'starting_from';
    public const PRICE_QUOTE_ONLY = 'quote_only';

    public const VERIFY_PENDING = 'pending';
    public const VERIFY_APPROVED = 'approved';
    public const VERIFY_REJECTED = 'rejected';

    public function category()
    {
        return $this->belongsTo(VendorServiceCategory::class, 'service_category_id');
    }

    public function media()
    {
        return $this->hasMany(VendorServiceMedia::class, 'vendor_service_id')
            ->orderBy('sort_order');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'vendor_service_id');
    }

    public function shortlistItems()
    {
        return $this->hasMany(EventShortlistItem::class, 'vendor_service_id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeVerified($query)
    {
        return $query->where('is_verified', true);
    }
}