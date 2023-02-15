<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemModel extends Model
{
    use HasFactory;

    protected $fillable=[
        'name','category_id','price','status','description','condition','type','image','own_name','phone','address','local'
    ];
}
