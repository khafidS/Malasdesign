<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class template extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name', 'slug', 'price'
    ];    
    
    protected $hidden = [

    ];

    public function categories()
    {
        return $this->belongsToMany(category::class);
    }

    public function templateDetail()
    {
        return $this->hasMany(template_detail::class, 'template_id');
    }

}
