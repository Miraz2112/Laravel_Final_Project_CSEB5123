<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Member;
use App\Models\BorrowingRecord;

class DashboardController extends Controller
{
    public function index()
    {
        $booksCount = Book::count();
        $membersCount = Member::count();
        $borrowingRecordsCount = BorrowingRecord::count();
        $latestBooks = Book::orderBy('created_at', 'desc')->take(10)->get();

        return view('dashboard', compact('booksCount', 'membersCount', 'borrowingRecordsCount', 'latestBooks'));
    }
}
