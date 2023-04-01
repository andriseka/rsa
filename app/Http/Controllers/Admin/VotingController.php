<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\CandidateDetail;
use App\Models\Voting;
use Illuminate\Http\Request;

class VotingController extends Controller
{
    public function index()
    {

        $voting = Voting::select('candidate_id', 'user_id', 'user_category_id')->orderBy('id', 'desc')->paginate(10);
        $candidateDetails = CandidateDetail::select('candidate_id','user_id')->get();
        return view('admin.voting.index', compact('voting', 'candidateDetails'));
    }


    public function result()
    {
        $results = Candidate::select('id','user_category_id', 'number', 'result_voting')->paginate(10);
        $candidateDetails = CandidateDetail::select('candidate_id','user_id')->get();
        return view('admin.voting.result', compact('results', 'candidateDetails'));
    }
}
