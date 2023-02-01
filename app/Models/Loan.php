<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
        'loan_date',
        'return_date',
        'status'
    ];

    public $timestamps = false;

    public $dateFormat = 'Y-m-d';

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
