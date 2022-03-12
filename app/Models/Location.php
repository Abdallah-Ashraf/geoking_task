<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Boolean;

class Location extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'lat',
        'lng',
        'info',
        'rate',
        'user_id'
    ];

    protected $appends = [
        'view'
    ];

    /**
     * Get the user's first name.
     *
     * @return Boolean
     */
    public function getViewAttribute()
    {
        return true;
    }

    /**
     * Get the post that owns the User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
