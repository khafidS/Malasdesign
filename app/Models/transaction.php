<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class transaction extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = 
    [
        'uuid', 'name','email', 'no_hp', 'transaction_total', 'transaction_status','client_id', 'template_id', 'order_id'
    ];

    protected $hidden = 
    [

    ];

    public function template ()
    {
        return $this->belongsTo(template::class, 'template_id', 'id');
    }

    public function order()
    {
        return $this->belongsTo(order::class, 'order_id', 'id');
    }

    public function client()
    {
        return $this->belongsTo(client::class, 'client_id', 'id');
    }
}
