<?php

namespace App\Http\Requests;

use App\Models\ConstructionSite;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ConstructionSiteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_published' => $this->boolean('is_published'),
        ]);
    }

    public function rules(): array
    {
        return [
            'project_id' => ['nullable', 'integer', 'exists:projects,id'],
            'title' => ['required', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
            'status' => ['required', Rule::in(array_keys(ConstructionSite::STATUSES))],
            'progress_percentage' => ['required', 'integer', 'between:0,100'],
            'start_date' => ['nullable', 'date'],
            'expected_completion_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'description' => ['nullable', 'string', 'max:5000'],
            'cover_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'photos' => ['nullable', 'array', 'max:8'],
            'photos.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'remove_photos' => ['nullable', 'array'],
            'remove_photos.*' => ['integer'],
            'is_published' => ['required', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Le titre du chantier est obligatoire.',
            'status.in' => 'Le statut sélectionné est invalide.',
            'progress_percentage.between' => 'L’avancement doit être compris entre 0 et 100 %.',
            'expected_completion_date.after_or_equal' => 'La date de livraison doit être postérieure à la date de début.',
            'cover_image.image' => 'L’image principale doit être une image valide.',
            'photos.max' => 'Vous pouvez ajouter au maximum 8 photos à la fois.',
            'photos.*.image' => 'Chaque fichier de la galerie doit être une image.',
            'photos.*.max' => 'Chaque photo ne doit pas dépasser 4 Mo.',
        ];
    }
}
