<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use SoftDeletes;

    protected $table = 'activity';

    protected $dates = ['date'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'date',
        'reminder',
    ];

    /**
     * Get the user for the achievement.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
