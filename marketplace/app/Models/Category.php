<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $primaryKey = 'ct_id';

    protected $fillable = ['ct_name'];

    public function products()
    {
        return $this->hasMany(Product::class, 'pd_ct_id', 'ct_id');
    }
}
