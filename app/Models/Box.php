<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class box extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name', 'status', 'dispatch_date', 'delivery_date'];

    protected $hidden = [
        'laravel_through_key',
    ];

    public function gift()
    {
        return $this->hasManyThrough(
          '\App\Models\Gift',
            '\App\Models\BoxGift',
            'box_id',
            'id',
            'id',
            'gift_id'
        );
    }
}
