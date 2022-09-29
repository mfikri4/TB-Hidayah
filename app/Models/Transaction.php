<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transaction';
    protected $primaryKey = "id_transaction";

    protected $fillable = [
        'name_user',
        'total_modal',
        'total_bayar',
        'total_untung',
        'uang_bayar'
    ];
    public $sortable = [
        'name_user',
        'total_modal',
        'total_bayar',
        'total_untung',
        'uang_bayar'
    ];
    public static $rules = [
        'name_user'             => 'required',
        'total_modal'           => 'required',
        'total_bayar'           => 'required',
        'total_untung'          => 'required',
        'uang_bayar'            => 'required'
    ]; 

    static function add_transaction(){
    }

}
