<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'prenom',
        'nom',
        'telephone',
        'rue',
        'no_porte',
        'code_postal',
        'ville'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

}
