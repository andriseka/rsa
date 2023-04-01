<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\CandidateDetail;
use App\Models\User;
use App\Models\UserCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = Candidate::select('id','user_category_id')->orderBy('id', 'desc')->paginate(10);
        $candidateDetails = CandidateDetail::select('candidate_id', 'user_id')->get();
        return view('admin.candidate.index', compact('candidates', 'candidateDetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userCategories = UserCategory::select('id', 'name')->get();

        return view('admin.candidate.create', compact('userCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->isMethod('post')) {

            $rules = [
                'photo' => 'required|mimes:png,jpg,jpeg'
            ];
            $this->validate($request, $rules);




            $candidate = Candidate::where('user_category_id', $request->user_category_id)->count();

            if ($candidate == 0) {

                $number = 1;

            } else {
                $number = $candidate+1;
            }

            // Save foto
            $photo = $request->photo;
            $newPhoto = time().'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path('uploads/candidte'), $newPhoto);


            $candidate = [
                'user_category_id' => $request->user_category_id,
                'number' => $number,
                'visi' => $request->visi,
                'misi' => $request->misi,
                'photo' => $newPhoto
            ];

            Candidate::create($candidate);

            $candidateId = DB::getPdo()->lastInsertId();

            $userId = $request->user_id;
            foreach ($userId as $value) {

                $detailCandidate = [
                    'candidate_id' => $candidateId,
                    'user_id' => $value
                ];

                CandidateDetail::create($detailCandidate);

            }


            Alert::success('kandidat berhasil didaftarkan');
            return back();



        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $candidate = Candidate::where('id', $id)->first();
        $candidateDetails = CandidateDetail::where('candidate_id', $candidate->id)->select('candidate_id','user_id')->get();
        return view('admin.candidate.detail', compact('candidate', 'candidateDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $candidate = Candidate::where('id', $id)->first();

        File::delete(public_path('uploads/candidte/').$candidate->photo);

        $candidateDetails = CandidateDetail::where('candidate_id', $candidate->id)->delete();

        $candidate->delete();

        Alert::success('Notifikasi', 'Kandidat berhasil dihapus');
        return back();

    }
}
