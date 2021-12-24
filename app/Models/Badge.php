<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    protected $table = 'badge';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'badge',
    ];

    /**
     * Get the user that owns the badge.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
