<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class order extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable =
    [
      'user_id',  
      'template_id',
      'tanggal_order',
      'order_status',  
      'nama_lengkap',  
      'tanggal_lahir',  
      'agama',  
      'suku',  
      'tinggi_badan',  
      'status',  
      'alamat',  
      'no_hp',  
      'email',  
      'facebook',  
      'instagram',  
      'pendidikan_formal',  
      'pendidikan_nonformal',  
      'keahlian_khusus',  
      'motto',  
      'hobi',  
      'latar_belakang',  
      'pengalaman_organisasi',  
      'pengalaman_mangang',  
      'soft_skill',  
      'kemampuan_bahasa',  
      'uuid',
    ];

    protected $hidden =
    [

    ];

    public function transaction()
    {
        return $this->hasOne(transaction::class, 'order_id');
    }

    public function user()
    {
      return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function template()
    {
      return $this->belongsTo(template::class, 'template_id', 'id');
    }
}
