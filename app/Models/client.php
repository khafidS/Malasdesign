<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class client extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable =
    [
        'name',
        'email',
        'photo',
    ];

    protected $hidden =
    [

    ];

    public function transaction()
    {
        return $this->hasMany(transaction::class, 'client_id');
    }

    public function order()
    {
        return $this->hasMany(order::class, 'client_id');
    }
}
