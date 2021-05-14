<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    public function histories()
    {
        return $this->hasMany(History::class);
    }
}
