@extends('admin.layouts.general')

@section('content-title')
    <div class="page-pretitle">
        Encrypts voting code
    </div>
    <h2 class="page-title">
        Enkripsi kode voting
    </h2>
@endsection

@section('content')

<div class="col-md-6 mb-3">
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="mb-3 text-end">
                @if (count($encrypts) == 0)
                    <form action="{{route('encrypt.generate')}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">Generate kode</button>
                    </form>
                @else
                    <form action="{{route('encrypt.reset')}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Reset kode</button>
                    </form>
                @endif
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th style="width: 3%;">No</th>
                        <th style="width: 40%;">Nama anggota</th>
                        <th>Code</th>
                    </thead>
                    <tbody>
                        @foreach ($encrypts as $encrypt => $value)
                            <tr>
                                <td>{{$encrypt + $encrypts->firstitem()}}</td>
                                <td>{{$value->user->name}}</td>
                                <td>{{$value->code}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
