<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'user_id',
        'city',
        'uf',
        'street',
        'number',
        'district',
        'complement',
        'postal_code',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
