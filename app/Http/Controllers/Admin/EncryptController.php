<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Encrypt;
use App\Models\User;
use App\Traits\Encrypt as TraitsEncrypt;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class EncryptController extends Controller
{

    use TraitsEncrypt;

    public function index()
    {

        $encrypts = Encrypt::select('user_id', 'code')->orderBy('id', 'desc')->paginate(10);

        return view('admin.encrypt.index', compact('encrypts'));
    }


    public function generate()
    {
        $encrypt = $this->encrypt();
        $users = User::where('type', 'user')->get();

        foreach ($users as $value) {

            $randomCode = $this->randomMessage(4);


            $data = [
                'user_id' => $value->id,
                'code' => implode(".", $this->publicKey($randomCode,$encrypt['e'], $encrypt['n']))
            ];

            Encrypt::create($data);

        }

        Alert::success('Kode berhasil digenerate');
        return back();
    }

    public function reset()
    {
        Encrypt::truncate();

        Alert::success('Kode voting berhasil direset');
        return back();
    }
}
