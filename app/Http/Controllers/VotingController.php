<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Encrypt as ModelsEncrypt;
use App\Models\UserCategory;
use App\Models\Voting;
use App\Models\VotingResult;
use App\Traits\Decrypt;
use App\Traits\Encrypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class VotingController extends Controller
{

    use Encrypt, Decrypt;


    public function index()
    {

        $encyrpt = $this->encrypt();

        $codeVoting = $this->descrypt($encyrpt['l'], $encyrpt['e'], $encyrpt['n'], $this->codeUser());


        return view('voting.input_code', compact('codeVoting'));
    }


    public function voting(Request $request)
    {

        if ($request->isMethod('post')) {

            $codeReq = implode("", $request->code);

            $encyrpt = $this->encrypt();

            $codeVoting = $this->descrypt($encyrpt['l'], $encyrpt['e'], $encyrpt['n'], $this->codeUser());

            if ($codeVoting == $codeReq) {


                $userCategories = UserCategory::select('id', 'name')->get();
                $candidates = Candidate::select('id','number', 'user_category_id', 'photo', 'result_voting')->get();

                $voting = Voting::where('user_id', Auth::user()->id)->select('candidate_id', 'user_id', 'user_category_id')->get();

                return view('voting.voting', compact('userCategories', 'candidates', 'voting'));

            } else {
                return back()->with('message', 'Kode yang Anda masukkan salah. Gunakan kode yang sudah ditentukan.');
            }

        }

    }


    public function store(Request $request)
    {

        if ($request->ajax()) {

            $user_id = $request->user_id;
            $candidate_id = $request->candidate_id;
            $user_category_id = $request->user_category_id;



            // Check Voting
            $voting = Voting::where('candidate_id', $candidate_id)
                        ->where('user_id', $user_id)
                        ->where('user_category_id', $user_category_id)
                        ->first();
            $votingUser = Voting::where('user_id', $user_id)
                                ->where('user_category_id', $user_category_id)
                                ->first();
            if ($votingUser) {

                $response = [
                    'Anda telah memilih Kandidate'
                ];

                return response($response);
            }


            if ($voting) {

                $response = [
                    'Anda telah memilih Kandidate'
                ];

                return response($response);

            }


            Voting::create([
                'candidate_id' => $candidate_id,
                'user_id' => $user_id,
                'user_category_id' => $user_category_id
            ]);

            // Result voting
            $votingResult = Candidate::where('id', $candidate_id)->first();
            $result  = $votingResult->result_voting + 1;
            $votingResult->update([
                'result_voting' => $result
            ]);

            $response = [
                'status' => 200,
                'message' => 'Voting successfully'
            ];

            return response($response);


        }

    }


    public function codeUser()
    {
        $code = ModelsEncrypt::where('user_id', Auth::user()->id)->first();

        return $code->code;

    }
}
