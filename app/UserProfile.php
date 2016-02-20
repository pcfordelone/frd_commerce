<?php

namespace FRD;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        'adress',
        'number',
        'neighbourhood',
        'uf',
        'city',
        'cep',
        'phone',
        'cellphone',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('FRD\User');
    }
}
