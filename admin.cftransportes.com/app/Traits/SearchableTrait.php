<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait SearchableTrait
{
    /**
     * Realiza una búsqueda en el modelo y sus relaciones.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $searchTerm
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $searchTerm)
    {
        if (empty($searchTerm) || $searchTerm === '') {
            return $query;
        }

        $query->where(function ($q) use ($searchTerm) {
            foreach ($this->searchableFields as $field) {
                $q->orWhere($field, 'LIKE', "%{$searchTerm}%");
            }
        });

        if (!property_exists($this, 'searchableRelations') || empty($this->searchableRelations)) {
            return $query;
        }

        foreach ($this->searchableRelations as $relation => $fields) {
            $query->orWhereHas($relation, function ($q) use ($fields, $searchTerm) {
                foreach ($fields as $field) {
                    $q->where($field, 'LIKE', "%{$searchTerm}%");
                }
            });
        }

        return $query;
    }
}
