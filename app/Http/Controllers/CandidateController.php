<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\CandidateDetail;
use App\Models\UserCategory;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function index()
    {
        $userCategories = UserCategory::select('id', 'name')->get();
        $candidates = Candidate::select('id','number','visi','misi', 'user_category_id', 'photo', 'result_voting')->get();
        $candidateDetails = CandidateDetail::select('candidate_id', 'user_id')->get();

        return view('candidate.index', compact('candidates', 'candidateDetails', 'userCategories'));
    }
}
