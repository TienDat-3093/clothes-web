<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discounts extends Model
{
    use HasFactory;
    protected $table = 'discounts';

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}