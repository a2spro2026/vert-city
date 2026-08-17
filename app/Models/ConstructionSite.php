<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ConstructionSite extends Model
{
    use HasFactory;

    public const STATUSES = [
        'planned' => 'En préparation',
        'in_progress' => 'En cours',
        'paused' => 'Suspendu',
        'completed' => 'Livré',
    ];

    protected $fillable = [
        'project_id',
        'title',
        'slug',
        'location',
        'status',
        'progress_percentage',
        'start_date',
        'expected_completion_date',
        'description',
        'cover_image_path',
        'is_published',
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'expected_completion_date' => 'date',
            'progress_percentage' => 'integer',
            'is_published' => 'boolean',
        ];
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function photos(): HasMany
    {
        return $this->hasMany(ConstructionPhoto::class)->orderBy('sort_order');
    }

    public function getStatusLabelAttribute(): string
    {
        return self::STATUSES[$this->status] ?? $this->status;
    }
}
