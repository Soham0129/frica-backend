<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleType extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'description',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function modules()
    {
        return $this->hasMany(Module::class, 'module_type', 'type');
    }

    public function scopeActive($query)
    {
        return $query->whereHas('modules', function($q) {
            $q->where('status', 1);
        });
    }

    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }
}
