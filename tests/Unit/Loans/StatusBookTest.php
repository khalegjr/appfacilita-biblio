<?php

use App\Http\Services\LoanService;
use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses (Tests\TestCase::class);
uses(RefreshDatabase::class);

test('should change the status of the book to loaned', function () {
    Book::create([
        'title' => 'título',
        'author' => 'autor',
        'state' => 'disponível',
    ]);

    $loan = new LoanService(1);

    $loan->changeStateBook();

    expect($loan->stateBook())->toEqual('emprestado');
});

test('should change the status of the book to available', function () {
    Book::create([
        'title' => 'título',
        'author' => 'autor',
        'state' => 'emprestado',
    ]);

    $loan = new LoanService(1);

    $loan->changeStateBook();

    expect($loan->stateBook())->toEqual('disponível');
});
