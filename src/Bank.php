<?php

namespace Brazilian;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'brazilian_bank';

    /**
     * Return the bank code.
     *
     * @return string
     */
    public function getCodeAttribute()
    {
        return str_pad($this->id, 3, '0', STR_PAD_LEFT);
    }
}
