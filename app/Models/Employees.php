<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'company',
        'email',
    ];
    // get data company
    public function get_company()
    {
        return $this->belongsTo(Companies::class, 'company');
    }
}