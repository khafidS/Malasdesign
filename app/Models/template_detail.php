<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class template_detail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'template_id', 'photo', 'description'
    ];    
    
    protected $hidden = [

    ];

    public function template()
    {
        return $this->belongsTo(template::class, 'template_id', 'id');
    }

    // public function getPhotoAttribute($value) //assesor
    // {
    //     return url('storage/' . $value);
    // }
}
