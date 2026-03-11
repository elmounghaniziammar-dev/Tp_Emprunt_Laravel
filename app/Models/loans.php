<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class loans extends Model
{
    //
    protected $fillable = [
        'borrower_name',
        'borrower_email',
        'book_title',
        'borrowed_at',
        'due_date',
        'returned',
        'status',
    ];
    protected $casts = [
        'borrowed_at' => 'date',
        'due_date' => 'date',
        'returned' => 'boolean',
    ];
}
