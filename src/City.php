<?php

namespace Brazilian;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'brazilian_city';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * State.
     *
     * @see \Brazilian\State
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
