<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permit extends BaseModel
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'file', 'description',
    ];

    /**
     * Get all of the dates for the Permit
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dates()
    {
        return $this->hasMany(Date::class, 'permit_id');
    }
}
