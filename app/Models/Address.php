<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'first_name',
        'last_name',
        'address_line1',
        'address_line2',
        'city',
        'state',
        'zip',
        'country',
        'phone',
        'is_default'
    ];

    

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
