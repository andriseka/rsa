@extends('layouts.general')


@section('title', 'VOTING')
@section('sub-title', 'Silahkan voting')

@section('css')
<style>
    .voting {
        margin-top: 60px;
    }
</style>
@endsection


@section('content')
<div class="voting">
    <div class="row">
    <input hidden type="number" value="{{Auth::user()->id}}" id="userId">
    @foreach ($userCategories as $category)

        @if ($category->name == 'IPNU')
            <div class="col-md-12 mb-4 mt-2 d-flex justify-content-between">
                <div>
                    <span class="fs-2 fw-bold">Voting pemilihan {{$category->name}}</span>
                    <label class="form-label text-secondary">{{$category->name}}</label>
                </div>
            </div>
            @foreach ($candidates as $candidate)
                @if ($candidate->user_category_id == $category->id)
                <div class="col-md-4 col-6 mb-3">
                    <div class="card">
                        <img src="{{asset('uploads/candidte/'.$candidate->photo)}}" alt="" style="height: 120px;">
                        <div class="card-body">
                            <div class="mb-2">
                                <span class="text-secondary fw-bold">Kandidat {{$candidate->number}}</span>
                            </div>
                            <div>
                                <span class="fs-1 fw-bold">
                                    {{$candidate->result_voting}}
                                </span>
                                <span>vote</span>
                            </div>
                            <div class="text-end">
                                <a  href="javascript:void(0)" id="voting_{{$candidate->id}}" onclick="voting({{$candidate->id}}, {{$candidate->user_category_id}})" class="text-secondary">
                                    <img src="{{asset('assets/icon/vote.png')}}" width="30" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        @else
            <div class="col-md-12 mb-4 mt-2 d-flex justify-content-between">
                <div>
                    <span class="fs-2 fw-bold">Voting pemilihan {{$category->name}}</span>
                    <label class="form-label text-secondary">{{$category->name}}</label>
                </div>
            </div>
            @foreach ($candidates as $candidate)
                @if ($candidate->user_category_id == $category->id)
                <div class="col-md-4 col-6 mb-5">
                    <div class="card">
                        <img src="{{asset('uploads/candidte/'.$candidate->photo)}}" alt="" style="height: 120px;">
                        <div class="card-body">
                            <div class="mb-2">
                                <span class="text-secondary fw-bold">Kandidat {{$candidate->number}}</span>
                            </div>
                            <div>
                                <span class="fs-1 fw-bold">
                                    {{$candidate->result_voting}}
                                </span>
                                <span>vote</span>
                            </div>
                            <div class="text-end">
                                <a  href="javascript:void(0)" id="voting_{{$candidate->id}}" onclick="voting({{$candidate->id}}, {{$candidate->user_category_id}})" class="text-secondary">
                                    <img src="{{asset('assets/icon/vote.png')}}" width="30" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        @endif

    @endforeach


    </div>
</div>
@endsection

@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>

    function voting(candidateId, userCategoryId)
    {
        var user_id = document.getElementById("userId").value;



        $.ajax({

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{url('voting/store')}}",
            type:'POST',
            data: {user_id:user_id, candidate_id:candidateId, user_category_id:userCategoryId},
            dataType: 'json',
            success: function(resp)
            {
                if (resp.status == 200) {
                    alert('Terimaksih sudah voting');
                    window.location.reload();
                } else {
                    alert('Anda sudah melakukan voting')
                }
            }

        });


    }

</script>

@endsection
