@extends('admin.layouts.general')


@section('content-title')
    <div class="page-pretitle">
        List of voting
    </div>
    <h2 class="page-title">
        Daftar voting
    </h2>
@endsection

@section('content')

<div class="col-md-12 mb-3">
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive mb-3">
                <table class="table">
                    <thead>
                        <th>No</th>
                        <th>Calon ketua</th>
                        <th>Calon wakil</th>
                        <th>Kategori</th>
                        <th>Pemilih</th>
                    </thead>
                    <tbody>

                        @foreach ($voting as $result => $key)
                            <tr>
                                <td>{{$result + $voting->firstitem()}}</td>
                                @foreach ($candidateDetails as $result)
                                    @if ($result->candidate_id == $key->candidate_id)
                                        <td>{{$result->user->name}}</td>
                                    @endif
                                @endforeach
                                <td>{{$key->userCategory->name}}</td>
                                <td>{{$key->user->name}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{$voting->links()}}
            </div>
        </div>
    </div>
</div>

@endsection
