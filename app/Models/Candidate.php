<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $table = 'candidates';
    protected $fillable = [
        'user_category_id', 'number', 'visi', 'misi', 'photo', 'result_voting'
    ];


    public function userCategory()
    {
        return $this->belongsTo(UserCategory::class);
    }
}
