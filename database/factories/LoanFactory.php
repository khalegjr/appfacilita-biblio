<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Loan>
 */
class LoanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $users = User::all();
        $books = Book::where('state', 'disponível')->get();
        $current = Carbon::now();

        return [
            "user_id" => $users[rand(1, 10)]->id,
            "book_id" => $books[rand(1, 10)]->id,
            "loan_date" => $current->format('Y-m-d'),
            "return_date" => $current->addWeek()->format('Y-m-d'),
        ];
    }
}
