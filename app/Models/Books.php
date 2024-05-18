<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    //set the PL to 'id'
    protected $primaryKey = 'id';
    //set the incrementing to false
    public $incrementing = false;
    //change the default laravel keytype to string (was int)
    protected $keyType = 'string';

    //what coloumns can be mass inserted
    protected $fillable = ['isbn', 'title', 'author', 'stock', 'deleted'];
}
