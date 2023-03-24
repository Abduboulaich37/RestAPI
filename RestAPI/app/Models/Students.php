<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\ApiController;

class Students extends Model
{
    protected $table = 'students';
    protected $fillable = ['email','idea'];
    public $timestamps = false;
}
