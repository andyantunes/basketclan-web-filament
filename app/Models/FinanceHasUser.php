<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FinanceHasUser extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'financials_users';

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function finance(): BelongsTo
    {
        return $this->belongsTo(Finance::class, 'financial_id', 'id');
    }
}
