@extends('admin.layouts.general')

@section('content-title')
    <div class="page-pretitle">
        List of candidate
    </div>
    <h2 class="page-title">
        Daftar kandidat
    </h2>
@endsection

@section('content')
<div class="col-md-12 mb-3">
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th style="width: 5%;">No</th>
                        <th style="width: 30%;">Calon ketua</th>
                        <th style="width: 30%;">Calon wakil</th>
                        <th style="width: 20%;">Kategori</th>
                        <th class="text-center" style="width: 10%;">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($candidates as $candidate => $value)
                            <tr>
                                <td>{{$candidate + $candidates->firstitem()}}</td>
                                @foreach ($candidateDetails as $detail)
                                    @if ($detail->candidate_id == $value->id)
                                        <td>{{$detail->user->name}}</td>
                                    @endif
                                @endforeach
                                <td>{{$value->userCategory->name}}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <a href="{{route('candidate.show', $value->id)}}" class="btn btn-primary btn-sm me-2">Detail</a>
                                        <form action="{{route('candidate.destroy', $value->id)}}" method="POST">
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
