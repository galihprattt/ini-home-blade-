<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'pd_id';

    protected $fillable = [
        'pd_code',
        'pd_name',
        'pd_price',
        'pd_ct_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'pd_ct_id', 'ct_id');
    }
}
