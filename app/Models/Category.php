<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Category extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = 'category';

    public $sortable = ['id','name_category',];

    protected $fillable = [
        'name_category'
    ];

    public static $rules = [
        'name_category' => 'required'
    ]; 
}
