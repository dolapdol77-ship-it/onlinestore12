<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function getId() { return $this->attributes['id']; }
    public function getTotal() { return $this->attributes['total']; }
    public function getUserId() { return $this->attributes['user_id']; }

    public function setTotal($total) { $this->attributes['total'] = $total; }
    public function setUserId($userId) { $this->attributes['user_id'] = $userId; }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}