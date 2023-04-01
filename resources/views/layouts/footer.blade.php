<footer class="footer d-print-none" style="padding: 0; border-radius: 10px;" >
    <div class="container-xl">
        <div class="row">
            <div class="d-flex justify-content-between align-items-center p-2">
                <div class="text-center">
                    <a href="{{route('home')}}">
                        <img src="{{asset('assets/icon/home-green.png')}}" alt="" style="height: 35px;width:35px;">
                        <label class="form-label text-green">Beranda</label>
                    </a>
                </div>
                <div class="text-center">
                    <img src="{{asset('assets/icon/message.png')}}" alt="" style="height: 35px;width:35px;">
                    <label class="form-label">Whatsapp</label>
                </div>
                <div class="text-center">
                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#modal-simple">
                        <img src="{{asset('assets/icon/user.png')}}" alt="" style="height: 35px;width:35px;">
                        <label class="form-label text-secondary">Akun Saya</label>
                    </a>
                </div>
            </div>
        </div>

    </div>
</footer>

<div class="modal modal-blur fade" id="modal-simple" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 999999999;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Akun Saya</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <div class="d-flex justify-content-center">
                        <img class="rounded-circle" src="{{asset('uploads/member/'.Auth::user()->photo)}}" alt="">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <input type="text" disabled class="form-control" value="{{Auth::user()->usercategory->name}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama lengkap</label>
                    <input type="text" disabled class="form-control" value="{{Auth::user()->name}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <input type="text" disabled class="form-control" value="{{Auth::user()->address}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">No Handphone</label>
                    <input type="text" disabled class="form-control" value="{{Auth::user()->phone}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Sekolah</label>
                    <input type="text" disabled class="form-control" value="{{Auth::user()->study}}">
                </div>
            </div>
        </div>
    </div>
</div>
