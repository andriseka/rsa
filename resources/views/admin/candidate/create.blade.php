@extends('admin.layouts.general')

@section('content-title')
    <div class="page-pretitle">
        Registration candidate
    </div>
    <h2 class="page-title">
        Pendaftaran kandidat
    </h2>
@endsection


@section('content')

<form action="{{route('candidate.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select name="user_category_id" id="category" class="form-select">
                            <option value="">-- Kategori --</option>
                            @foreach ($userCategories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Calon ketua</label>
                        <select name="user_id[]" id="ketua" class="form-select" required>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Calon wakil</label>
                        <select name="user_id[]" id="wakil" class="form-select" required>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto</label>
                        <input type="file" class="form-control @error('photo') is-invalid @enderror" required name="photo">
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
                        <label class="form-label">Visi</label>
                        <textarea name="visi" style="height: 60px;" required class="form-control" placeholder="Visi"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Misi</label>
                        <textarea name="misi" style="height: 120px;" required class="form-control" placeholder="Misi"></textarea>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Tambah kandidat</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


<script>

    var category = document.getElementById("category");

    category.addEventListener("change", function() {

        var category_id = category.value;

        $.ajax({
            url: "{{route('member.index')}}",
            type: 'get',
            data: {category_id:category_id},
            dataType: 'json',
            success: function(resp)
            {
                var data = resp.data;
                var html = "";

                if (data.length > 0) {
                    for (var i = 0; i < data.length; i++) {

                        html += "<option value='"+data[i]['id']+"'>"+data[i]['name']+"</option>";

                    }
                } else {
                    html += "";
                }

                $("#ketua").html(html);
                $("#wakil").html(html);

            }


        });

    });


</script>
@endsection
