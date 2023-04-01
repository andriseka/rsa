@extends('admin.layouts.general')

@section('content-title')
    <div class="page-pretitle">
        Edit member
    </div>
    <h2 class="page-title">
        Edit anggota
    </h2>
    <div class="d-flex justify-content-end">
        <a href="{{route('member.index')}}">Kembali</a>
    </div>
@endsection

@section('content')

<form action="{{route('member.update', $user->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="row row-deck">
        <div class="col-md-6 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Nama lengkap</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" placeholder="Ahmad zaman" required>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" value="{{$user->address}}" name="address" placeholder="Srikandang Rt 03/01" required>
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No Handphone</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" maxlength="15" value="{{$user->phone}}" required name="phone" placeholder="0897675*****">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sekolah</label>
                        <input type="text" name="study" class="form-control @error('study') is-invalid @enderror" value="{{$user->study}}" required placeholder="Universitas islam nahdlatul ulama jepara">
                        @error('study')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto</label>
                        <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo">
                        @error('photo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select name="user_category_id" required id="" class="form-select">
                            <option value="">-- Kategori anggota --</option>
                            @foreach ($userCategories as $category)
                                <option value="{{$category->id}}"
                                    @if ($category->id == $user->user_category_id)
                                        selected
                                    @endif
                                >{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" value="{{$user->email}}" class="form-control @error('email') is-invalid @enderror" required name="zaman@gmail.com">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="********">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Konfimasi password</label>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="********">
                    </div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success">Update anggota</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
