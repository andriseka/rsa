<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class MemberController extends Controller
{

    public function index(Request $request)
    {

        if ($request->ajax()) {

            $categoryId = $request->category_id;

            $users = User::where('type', 'user')
                            ->where('user_category_id', $categoryId)
                            ->select('id', 'name')
                            ->get();

            $response = [
                'status' => 200,
                'data' => $users
            ];

            return response($response);
        }

        $users = User::where('type', 'user')->select('id', 'name', 'address', 'phone', 'user_category_id')
                        ->orderBy('id', 'desc')
                        ->paginate(10);

        return view('admin.member.index', compact('users'));
    }

    public function create()
    {
        $userCategories = UserCategory::select('id', 'name')->get();

        return view('admin.member.create', compact('userCategories'));
    }

    public function store(Request $request)
    {

        if ($request->isMethod('post')) {


            $rules = [
                'name' => 'required|max:255|string',
                'study' => 'required|max:255|string',
                'address' => 'required|max:100',
                'phone' => 'required|max:15|regex:/^[0-9]/',
                'photo' => 'required|mimes:png,jpg,jpeg',
                'email' => 'required|email|max:100|unique:users,email,',
                'password' => 'required|confirmed|string'
            ];

            $this->validate($request, $rules);


            $photo = $request->photo;
            $newPhoto = time().'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path('uploads/member'), $newPhoto);

            $data = [
                'name' => $request->name,
                'user_category_id' => $request->user_category_id,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'study' => $request->study,
                'address' => $request->address,
                'phone' => $request->phone,
                'photo' => $newPhoto
            ];

            User::create($data);

            Alert::success('Anggota berhasil ditambahkan');
            return back();

        }

    }

    public function detail($id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.member.detail', compact('user'));
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        $userCategories = UserCategory::select('id', 'name')->get();
        return view('admin.member.edit', compact('user', 'userCategories'));
    }

    public function update(Request $request, $id)
    {

        $user = User::where('id', $id)->first();

        $rules = [
            'name' => 'required|max:255|string',
            'study' => 'required|max:255|string',
            'address' => 'required|max:100',
            'phone' => 'required|max:15|regex:/^[0-9]/',
            'photo' => 'mimes:png,jpg,jpeg',
            'email' => 'email|max:100|unique:users,email,'.$user->id,
            'password' => 'confirmed|nullable'
        ];

        $this->validate($request, $rules);

        if ($request->password !== "") {

            $password = Hash::make($request->password);

            $user->update(['password' => $password]);

        }

        if ($request->file('photo')) {


            File::delete(public_path('uploads/member/').$user->photo);

            $photo = $request->photo;
            $newPhoto = time().'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path('uploads/member'), $newPhoto);

            $data = [
                'name' => $request->name,
                'user_category_id' => $request->user_category_id,
                'email' => $request->email,
                'study' => $request->study,
                'address' => $request->address,
                'phone' => $request->phone,
                'photo' => $newPhoto
            ];

        } else {
            $data = [
                'name' => $request->name,
                'user_category_id' => $request->user_category_id,
                'email' => $request->email,
                'study' => $request->study,
                'address' => $request->address,
                'phone' => $request->phone,
            ];
        }

        $user->update($data);


        Alert::success('Anggota berhasil diupdate');

        return redirect()->route('member.edit', $user->id);

    }

    public function destroy($id)
    {
        $user = User::where('id', $id)->first();

        File::delete(public_path('uploads/member/').$user->photo);

        $user->delete();

        Alert::success('Anggota berhasil dihapus');
        return back();
    }
}
