<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'author', 'publisher_name', 'published_year', 'category',
    ];

    public function borrowingRecords()
    {
        return $this->hasMany(BorrowingRecord::class);
    }

    public function isAvailable()
    {
        return !$this->borrowingRecords()->whereNull('return_date')->exists();
    }
}
