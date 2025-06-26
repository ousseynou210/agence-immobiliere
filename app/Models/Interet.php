<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interet extends Model
{
    public function utilisateur() {
    return $this->belongsTo(User::class, 'user_id');
}

}
