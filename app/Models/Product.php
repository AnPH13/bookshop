<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'total',
        'total_sold',
        'type',
        'provider',
        'author',
        'description',
    ];
    public function productImage(){
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }
    public function invoiceDetail(){
        return $this->hasMany(InvoiceDetail::class, 'product_id', 'id');
    }
}
