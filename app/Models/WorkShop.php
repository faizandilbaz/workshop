<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkShop extends Model
{
    use HasFactory;
    protected $fillable = [
        'heading','link','description','start','end','time'
    ];
}
