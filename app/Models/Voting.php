<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voting extends Model
{
    use HasFactory;

    protected $table = 'votings';
    protected $fillable = [
        'candidate_id', 'user_id', 'user_category_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    public function userCategory()
    {
        return $this->belongsTo(UserCategory::class);
    }
}
