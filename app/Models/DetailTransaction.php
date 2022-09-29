<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class DetailTransaction extends Model
{
    use HasFactory;
    protected $table = 'detail_transaction';
    protected $primaryKey = "id";

    protected $fillable = [
        'id_transaction',
        'name_item',
        'volume',
        'price_sell',
        'price_purchase',
        'qty_transaction'
    ];

    static function add_detail_transaction($id_transaction, $name_item, $volume, $price_sell, $price_purchase,  $qty_transaction){
        DetailTransaction::create([
            'id_transaction' => $id_transaction,
            'name_item'      => $name_item,
            'volume'         => $volume,
            'price_sell'     => $price_sell,
            'price_purchase' => $price_purchase,
            'qty_transaction' => $qty_transaction,
        ]);

    }
}
