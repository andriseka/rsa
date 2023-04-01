@extends('admin.layouts.general')

@section('content-title')
    <div class="page-pretitle">
        List of categories
    </div>
    <h2 class="page-title">
        Daftar kategori
    </h2>
@endsection

@section('content')

<div class="col-md-6 mb-3">
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>No</th>
                        <th>Nama kategori</th>
                        <th>Slug</th>
                    </thead>
                    <tbody>
                        @foreach ($userCategories as $category => $key)
                            <tr>
                                <td>{{$category + $userCategories->firstitem()}}</td>
                                <td>{{$key->name}}</td>
                                <td>{{$key->slug}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
