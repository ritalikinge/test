<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddCart extends Model
{
    use HasFactory;
    protected $table = 'add_carts';

    protected $fillable = [
        'product_id',
        'user_id'
    ];
}
