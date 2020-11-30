<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class transaction_detail extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable =
    [
        'transaction_id', 'template_id'
    ];

    protected $hidden =
    [

    ];

    
}
