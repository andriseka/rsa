@extends('admin.layouts.general')

@section('content-title')
    <div class="page-pretitle">
        List of member
    </div>
    <h2 class="page-title">
        Daftar anggota
    </h2>
@endsection

@section('content')

<div class="col-md-12 mb-3">
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th style="width: 3%;">No</th>
                        <th style="width: 25%;">Nama lengkap</th>
                        <th style="width: 25%;">Alamat</th>
                        <th style="width: 15%;">No Handphone</th>
                        <th style="width: 10%;">Kategori</th>
                        <th class="text-center">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($users as $user => $value)
                            <tr>
                                <td>{{$user + $users->firstitem()}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->address}}</td>
                                <td>{{$value->phone}}</td>
                                <td>{{$value->userCategory->name}}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <a href="{{route('member.detail', $value->id)}}" class="btn btn-primary btn-sm me-2">Detail</a>
                                        <a href="{{route('member.edit', $value->id)}}" class="btn btn-success btn-sm me-2">Edit</a>
                                        <form action="{{route('member.destroy', $value->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection
