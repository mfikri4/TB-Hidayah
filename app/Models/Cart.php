<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Cart extends Model
{
    use HasFactory;
    
    protected $table = 'cart';

    protected $fillable = [
        'items_id',
        'qty_transaction',
    ];

    public static $rules = [   
        'items_id'              => 'required',
        'qty_transaction'       => 'required'
    ]; 
}
