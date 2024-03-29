<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Client extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function books(): HasManyThrough
    {
        return $this->hasManyThrough(Book::class, Order::class, secondKey: 'id', secondLocalKey: 'book_id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
//use App\Models\Client
//$client = Client::find(1)
//$client ->orders