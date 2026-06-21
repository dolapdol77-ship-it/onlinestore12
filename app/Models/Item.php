<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function getId() { return $this->attributes['id']; }
    public function getQuantity() { return $this->attributes['quantity']; }
    public function getPrice() { return $this->attributes['price']; }
    public function getOrderId() { return $this->attributes['order_id']; }
    public function getProductId() { return $this->attributes['product_id']; }

    public function setQuantity($qty) { $this->attributes['quantity'] = $qty; }
    public function setPrice($price) { $this->attributes['price'] = $price; }
    public function setOrderId($id) { $this->attributes['order_id'] = $id; }
    public function setProductId($id) { $this->attributes['product_id'] = $id; }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}