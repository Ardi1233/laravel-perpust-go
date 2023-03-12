<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Crud extends Model
{
    protected $table = 'bukulibrary';
    protected $primaryKey = 'id';
    protected $fillable = ['judul', 'pengarang', 'penerbit', 'deskripsi', 'gambar'];

    public function loan(): hasMany
    {
        return $this->hasMany(Loan::class, 'book_id', 'id');
    }
}
