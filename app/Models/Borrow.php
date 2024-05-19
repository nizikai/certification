<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;

    protected $table = 'borrows';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'librarian_id',
        'book_id',
        'member_id',
        'borrow',
        'return',
        'due',
        'deleted',
    ];

    public function librarian()
    {
        return $this->belongsTo(Librarian::class);
    }

    public function book()
    {
        return $this->belongsTo(Books::class);
    }

    public function member()
    {
        return $this->belongsTo(Members::class);
    }
}
