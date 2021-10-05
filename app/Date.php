<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'permit_id', 'date',
    ];

    /**
     * Get the permit that owns the Date
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function permit()
    {
        return $this->belongsTo(Permit::class, 'permit_id');
    }
}
