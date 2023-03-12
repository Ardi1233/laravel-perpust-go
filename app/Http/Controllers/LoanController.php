<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function borrow(string $id)
    {
        $book = Crud::find($id);

        if (!$book) {
            return back();
        }

        Loan::create([
            'user_id' => auth()->user()->id,
            'book_id' => $book->id
        ]);

        return back();
    }

    public function return(string $id)
    {
        $loan = Loan::find($id);

        if (!$loan) {
            return back();
        }

        $loan->delete();

        return back();
    }
}
