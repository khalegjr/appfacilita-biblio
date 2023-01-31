<?php

namespace App\Http\Services;

use App\Models\Book;
use App\Models\Loan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LoanService
{
    private Book $book;


    /**
     * __construct
     *
     * @param  string|int $book_id
     * @return void
     */
    public function __construct(string|int $book_id)
    {
        $this->book = Book::findOrFail($book_id)->first();
    }

    /**
     * stateBook
     *
     * @return string
     */
    public function stateBook(): string
    {
        return $this->book->state;
    }

    /**
     * changeStateBook
     *
     * @return void
     */
    public function changeStateBook(): void
    {
        $this->book->state = $this->book->state === 'emprestado' ? 'disponível' : 'emprestado';

        $this->book->save();
    }

    /**
     * createLoan
     *
     * @param  array $fieldsValidated
     * @return Loan
     */
    public function createLoan(array $fieldsValidated): Loan
    {
        $this->changeStateBook();

        return Loan::create($fieldsValidated);
    }
}
