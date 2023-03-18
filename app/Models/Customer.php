<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    protected $table = 'customers';
    protected $primaryKey = 'customer_id';
    protected $guarded = [];

    public function setNameAttribute($value) {
        $this->attributes['name'] = ucwords($value);
    }

    public function getDobAttribute($date)
    {
        return date('d-M-Y', strtotime($date));
    }
}
