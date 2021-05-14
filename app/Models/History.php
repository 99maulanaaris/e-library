<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function formatKembali($key)
    {
        return Carbon::parse($this->attributes['tglKembali'])->translatedFormat('l, d F Y');
    }
    public function formatPinjam($key)
    {
        return Carbon::parse($this->attributes['tglPinjam'])->translatedFormat('l, d F Y');
    }
    public function formatBatasWaktu($key)
    {
        return Carbon::parse($this->attributes['batasWaktu'])->translatedFormat('l, d F Y');
    }
}
