@extends('layouts.general')

@section('css')
<style>
    .icon-menu {
        width: 60px;
        height: 60px;
        filter: drop-shadow(1px 0px 6px rgba(0, 0, 0, 0.199));
    }
    .banner {
        margin-top: 50px;
        height: 80px;
    }
    .banner img {
        height: 100%;
        width: 100%;
        border-radius: 10px;
    }
</style>
@endsection

@section('title', 'Hallo,'.Auth::user()->name)
@section('sub-title', 'Selamat datang di e-voting')

@section('content')

<div class="banner mb-4">
    <a href="">
        <img src="{{asset('assets/image/share-banner.png')}}" alt="">
    </a>
</div>

<div class="col-md-4 col-4 d-flex justify-content-start mb-3">
    <a href="{{url('/voting/code')}}" class="link-secondary">
        <div class="text-center">
            <img src="{{asset('assets/icon/voting.svg')}}" alt="" class="icon-menu mb-2">
            <label class="form-label d-block text-secondary">Voting</label>
        </div>
    </a>
</div>
<div class="col-md-4 col-4 d-flex justify-content-center mb-3">
    <a href="{{url('/candidate')}}">
        <div class="text-center">
            <img src="{{asset('assets/icon/candidat.svg')}}" alt="" class="icon-menu mb-2">
            <label class="form-label d-block text-secondary">Kandidat</label>
        </div>
    </a>
</div>
<div class="col-md-4 col-4 d-flex justify-content-end mb-3">
    <a href="https://www.instagram.com/pripnuippnusrikandang/" target="_blank">
        <div class="text-center">
            <img src="{{asset('assets/icon/instagram.svg')}}" alt="" class="icon-menu mb-2">
            <label class="form-label d-block">Instagram</label>
        </div>
    </a>
</div>


@foreach ($userCategories as $category)

    @if ($category->name == 'IPNU')
        <div class="col-md-12 mb-4 mt-2 d-flex justify-content-between">
            <div>
                <span class="fs-2 fw-bold">Hasil voting sementara</span>
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
                            <a href="{{url('/candidate')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="#d63939" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M13.923 11.45a2 2 0 1 0 -2.87 2.312"></path>
                                    <path d="M10 17.78c-2.726 -.618 -5.059 -2.545 -7 -5.78c2.4 -4 5.4 -6 9 -6c3.325 0 6.137 1.705 8.438 5.117"></path>
                                    <path d="M18 22l3.35 -3.284a2.143 2.143 0 0 0 .005 -3.071a2.242 2.242 0 0 0 -3.129 -.006l-.224 .22l-.223 -.22a2.242 2.242 0 0 0 -3.128 -.006a2.143 2.143 0 0 0 -.006 3.071l3.355 3.296z"></path>
                                </svg>
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
                <span class="fs-2 fw-bold">Hasil voting sementara</span>
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
                            <a href="{{url('/candidate')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="#d63939" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M13.923 11.45a2 2 0 1 0 -2.87 2.312"></path>
                                    <path d="M10 17.78c-2.726 -.618 -5.059 -2.545 -7 -5.78c2.4 -4 5.4 -6 9 -6c3.325 0 6.137 1.705 8.438 5.117"></path>
                                    <path d="M18 22l3.35 -3.284a2.143 2.143 0 0 0 .005 -3.071a2.242 2.242 0 0 0 -3.129 -.006l-.224 .22l-.223 -.22a2.242 2.242 0 0 0 -3.128 -.006a2.143 2.143 0 0 0 -.006 3.071l3.355 3.296z"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
    @endif

@endforeach


@endsection
