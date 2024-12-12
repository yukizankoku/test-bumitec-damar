<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    /** @use HasFactory<\Database\Factories\SupplierFactory> */
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function spareParts()
    {
        return $this->hasOne(SparePart::class, 'supplier_id');
    }
}
