<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Items extends Model
{
    use HasFactory;
    use Sortable;
    
    protected $table = 'items';

    protected $fillable = [
        'id',
        'name_item',
        'volume',
        'category_id',
        'price_purchase',
        'price_sell',
        'qty_stock',
        'qty_sold',
        'unit_id',
        'status',
    ];

    public $sortable = ['name_item',
                    'volume',
                    'category_id',
                    'price_purchase',
                    'price_sell',
                    'qty_stock',
                    'qty_sold',
                    'unit_id',
                    'status',];

    public static $rules = [
        'name_item'              => 'required',
        'volume'            => 'required',        
        'category_id'       => 'required',
        'price_purchase'    => 'required',
        'price_sell'        => 'required',
        'qty_stock'         => 'required',
        'qty_sold'          => 'required',
        'unit_id'           => 'required',
        'status'            => 'required'
    ]; 
}