<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Unit extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = 'unit';
    
    public $sortable = ['id','name_unit',];
    
    protected $fillable = [
        'id',
        'name_unit',
    ];

    public static $rules = [
        'name_unit' => 'required'
    ]; 
}
