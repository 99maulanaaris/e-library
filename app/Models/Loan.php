<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Loan extends Model
{
    use HasFactory;

    protected $fillable  = [
        'book_id',
        'pinjam',
        'kembali',
        'user_id'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function returnBook()
    {
        return $this->hasMany(ReturnBook::class);
    }

    public function formatKembali($key)
    {
        return Carbon::parse($this->attributes['kembali'])->translatedFormat('l, d F Y');
    }
    public function formatPinjam($key)
    {
        return Carbon::parse($this->attributes['pinjam'])->translatedFormat('l, d F Y');
    }

    public function getDataLoan($id)
    {
        return DB::table('return_books')->where('loan_id', '=', $id)->get();
    }
}
