<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    public const STATUSES = [
        'new' => 'Nouveau',
        'in_progress' => 'En cours',
        'completed' => 'Terminé',
        'suspended' => 'Suspendu',
    ];

    public const PROPERTY_TYPES = [
        'residence' => 'Résidence',
        'apartment' => 'Appartement',
        'house' => 'Maison',
        'commercial' => 'Local commercial',
    ];

    protected $fillable = [
        'title',
        'slug',
        'location',
        'property_type',
        'description',
        'status',
        'start_date',
        'end_date',
        'budget',
        'image_path',
        'is_published',
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
            'budget' => 'decimal:2',
            'is_published' => 'boolean',
        ];
    }

    public function getStatusLabelAttribute(): string
    {
        return self::STATUSES[$this->status] ?? $this->status;
    }

    public function getPropertyTypeLabelAttribute(): string
    {
        return self::PROPERTY_TYPES[$this->property_type] ?? $this->property_type;
    }

    public function constructionSites(): HasMany
    {
        return $this->hasMany(ConstructionSite::class);
    }
}
