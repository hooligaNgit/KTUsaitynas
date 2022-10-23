<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['name', 'unit_price', 'units_owned', 'type_id'];

    protected $hidden = [
        'laravel_through_key',
    ];

    public function type(){
        return $this->hasOne(Type::class);
    }

    public function box()
    {
        return $this->hasManyThrough(
            '\App\Models\Box',
            '\App\Models\BoxGift',
            'gift_id',
            'id',
            'id',
            'box_id'
        );
    }
}
