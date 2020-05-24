<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $table = 'profiles';

    protected $fillable = [
        'id_user',
        'phone',
        'address',
        'photo_url',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

}
