@extends('admin.layouts.general')

@section('content-title')
    <div class="page-pretitle">
        Detail of member
    </div>
    <h2 class="page-title">
        Detail anggota
    </h2>
    <div class="d-flex justify-content-end">
        <a href="{{route('member.index')}}">Kembali</a>
    </div>
@endsection

@section('content')

<div class="row">
    <div class="col-md-6 mb-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-center mb-3">
                    <img class="rounded-circle" src="{{asset('uploads/member/'.$user->photo)}}" alt="" style="width: 150px;height:150px;">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama lengkap</label>
                    <input type="text" disabled class="form-control" value="{{$user->name}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <input type="text" disabled class="form-control" value="{{$user->address}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">No handphone</label>
                    <input type="text" disabled class="form-control" value="{{$user->phone}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Sekolah</label>
                    <input type="text" disabled class="form-control" value="{{$user->study}}">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <input type="text" disabled class="form-control" value="{{$user->userCategory->name}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" disabled class="form-control" value="{{$user->email}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="text" disabled class="form-control" value="{{$user->password}}">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
