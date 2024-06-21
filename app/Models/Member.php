<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'ic_no', 'address', 'contact_information',
    ];

    public function borrowingRecords()
    {
        return $this->hasMany(BorrowingRecord::class);
    }

    public function book()
    {
        return $this->hasMany(Book::class);
    }
}
