@extends('admin.layouts.general')

@section('content-title')
    <div class="page-pretitle">
        Detail of candidate
    </div>
    <h2 class="page-title">
        Detail kandidat
    </h2>
    <div class="d-flex justify-content-end">
        <a href="{{route('candidate.index')}}">Kembali</a>
    </div>
@endsection

@section('content')

<div class="row">
    <div class="col-md-6 mb-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-center mb-3">
                    <img class="rounded-circle" src="{{asset('uploads/candidte/'.$candidate->photo)}}" alt="" style="width: 150px;height:150px;">
                </div>
                <div class="mb-3">
                    <label class="form-label">Kandidat</label>
                    <input type="text" disabled class="form-control" value="Kandidat Nomor {{$candidate->number}}">
                </div>
                @foreach ($candidateDetails as $result)
                <div class="mb-3">
                    <label class="form-label">Nama lengkap</label>
                    <input type="text" disabled class="form-control" value="{{$result->user->name}}">
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Visi</label>
                    <textarea name="" disabled class="form-control" style="height: 80px">{{$candidate->visi}}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Misi</label>
                    <textarea name="" disabled class="form-control" style="height: 100px">{{$candidate->misi}}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
