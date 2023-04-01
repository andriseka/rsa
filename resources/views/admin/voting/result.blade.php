@extends('admin.layouts.general')

@section('content-title')
    <div class="page-pretitle">
        Result of voting
    </div>
    <h2 class="page-title">
        Hasil voting
    </h2>
@endsection

@section('content')
<div class="col-md-12 mb-3">
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>No</th>
                        <th>Calon ketua</th>
                        <th>Calon wakil</th>
                        <th>Kandidat</th>
                        <th>Kategori</th>
                        <th>Hasil voting</th>
                    </thead>
                    <tbody>
                        @foreach ($results as $result => $key)
                            <tr>
                                <td>{{$result + $results->firstitem()}}</td>
                                @foreach ($candidateDetails as $result)
                                    @if ($result->candidate_id == $key->id)
                                        <td>{{$result->user->name}}</td>
                                    @endif
                                @endforeach
                                <td>{{$key->number}}</td>
                                <td>{{$key->userCategory->name}}</td>
                                <td>{{$key->result_voting}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
