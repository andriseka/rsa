@extends('layouts.general')


@section('title', 'KNADIDAT')
@section('sub-title', 'Daftar kandidat')

@section('css')
<style>
    .voting {
        margin-top: 60px;
    }
</style>
@endsection


@section('content')
<div class="voting">
    <div class="row">
    @foreach ($userCategories as $category)

        @if ($category->name == 'IPNU')
            <div class="col-md-12 mb-4 mt-2 d-flex justify-content-between">
                <div>
                    <span class="fs-2 fw-bold">Voting pemilihan {{$category->name}}</span>
                    <label class="form-label text-secondary">{{$category->name}}</label>
                </div>
            </div>
            @foreach ($candidates as $candidate)
                @if ($candidate->user_category_id == $category->id)
                <div class="col-md-4 col-6 mb-3">
                    <div class="card">
                        <img src="{{asset('uploads/candidte/'.$candidate->photo)}}" alt="" style="height: 120px;">
                        <div class="card-body">
                            <div class="mb-2">
                                <span class="text-secondary fw-bold">Kandidat {{$candidate->number}}</span>
                            </div>
                            <div>
                                <span class="fs-1 fw-bold">
                                    {{$candidate->result_voting}}
                                </span>
                                <span>vote</span>
                            </div>
                            <div class="text-end">
                                <a  href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#candidate_{{$candidate->id}}" class="text-secondary">
                                    <img src="{{asset('assets/icon/seo.png')}}" width="30" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal modal-blur fade" id="candidate_{{$candidate->id}}" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 99999999;">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Detail Kandidat</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <div class="d-flex justify-content-center">
                                        <img class="rounded-circle" src="{{asset('uploads/candidte/'.$candidate->photo)}}" alt="">
                                    </div>
                                </div>
                                @foreach ($candidateDetails as $result)
                                    @if ($result->candidate_id == $candidate->id)
                                        <div class="mb-3">
                                            <label class="form-label">Nama lengkap</label>
                                            <input type="text" disabled class="form-control" value="{{$result->user->name}}">
                                        </div>
                                    @endif
                                @endforeach
                                <div class="mb-3">
                                    <label class="form-label">Visi</label>
                                    <textarea class="form-control" style="height: 80px;">{{$candidate->visi}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Misi</label>
                                    <textarea class="form-control" style="height:100px;">{{$candidate->misi}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        @else
            <div class="col-md-12 mb-4 mt-2 d-flex justify-content-between">
                <div>
                    <span class="fs-2 fw-bold">Voting pemilihan {{$category->name}}</span>
                    <label class="form-label text-secondary">{{$category->name}}</label>
                </div>
            </div>
            @foreach ($candidates as $candidate)
                @if ($candidate->user_category_id == $category->id)
                <div class="col-md-4 col-6 mb-5">
                    <div class="card">
                        <img src="{{asset('uploads/candidte/'.$candidate->photo)}}" alt="" style="height: 120px;">
                        <div class="card-body">
                            <div class="mb-2">
                                <span class="text-secondary fw-bold">Kandidat {{$candidate->number}}</span>
                            </div>
                            <div>
                                <span class="fs-1 fw-bold">
                                    {{$candidate->result_voting}}
                                </span>
                                <span>vote</span>
                            </div>
                            <div class="text-end">
                                <a  href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#candidate_{{$candidate->id}}" class="text-secondary">
                                    <img src="{{asset('assets/icon/seo.png')}}" width="30" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal modal-blur fade" id="candidate_{{$candidate->id}}" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 99999999;">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Detail Kandidat</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <div class="d-flex justify-content-center">
                                        <img class="rounded-circle" src="{{asset('uploads/candidte/'.$candidate->photo)}}" alt="">
                                    </div>
                                </div>
                                @foreach ($candidateDetails as $result)
                                    @if ($result->candidate_id == $candidate->id)
                                        <div class="mb-3">
                                            <label class="form-label">Nama lengkap</label>
                                            <input type="text" disabled class="form-control" value="{{$result->user->name}}">
                                        </div>
                                    @endif
                                @endforeach
                                <div class="mb-3">
                                    <label class="form-label">Visi</label>
                                    <textarea class="form-control" style="height: 80px;">{{$candidate->visi}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Misi</label>
                                    <textarea class="form-control" style="height:100px;">{{$candidate->misi}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        @endif

    @endforeach


    </div>
</div>
@endsection

