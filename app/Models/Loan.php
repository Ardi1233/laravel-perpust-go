<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $table = 'pinjaman';

    protected $fillable = [
      'user_id','book_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function buku(): BelongsTo
    {
        return $this->belongsTo(Buku::class, 'book_id', 'id');
    }
}
