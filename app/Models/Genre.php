<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_enabled',
    ];

    protected $casts = [
        'is_enabled' => 'boolean',
    ];

    /**
     * Return the string value of the is_enabled field.
     *
     * @return string
     */
    public function getIsEnabledToStringAttribute()
    {
        return $this->is_enabled ? 'YES' : 'NO';
    }
}
