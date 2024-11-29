<?php

namespace App\Models;

use App\Models\User;

class CodepenList
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
