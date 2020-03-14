<?php

namespace Brazilian;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'brazilian_state';

    /**
     * Capital city.
     *
     * @see \Brazilian\City
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function capital()
    {
        return $this->hasOne(City::class, 'id', 'capital_id');
    }

    /**
     * Cities.
     *
     * @see \Brazilian\City
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
