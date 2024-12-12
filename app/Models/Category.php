<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function spareParts()
    {
        return $this->hasMany(SparePart::class, 'category_id');
    }
}
