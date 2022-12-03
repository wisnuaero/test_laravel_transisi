<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;

class UsersController extends Controller
{
    ///index
    public function index()
    {
        $users = User::latest()->paginate(5);
        return view('users.index', ['users' => $users]);
    }

    // import excels
    public function import(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
        ]);

        // get file
        $file = $request->file('file');

        // create name file
        $nama_file = rand() . $file->getClientOriginalName();

        // upload to user_file public folder
        $file->move('users_file', $nama_file);

        // import data
        Excel::import(new UsersImport, public_path('/users_file/' . $nama_file));

        // alihkan halaman kembali
        return redirect('users');
    }
}