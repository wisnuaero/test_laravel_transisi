<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Companies as RequestsCompanies;
// import model
use App\Models\companies;

class CompaniesController extends Controller
{
    //index
    public function index()
    {
        $companies = Companies::latest()->paginate(5);
        // var_dump($companies);die;
        // return view
        return view('companies.index', compact('companies'));
    }

    // create
    public function create()
    {
        // return view
        return view('companies.create');
    }

    // store data companies
    public function store(RequestsCompanies $request)
    {
        if ($request->logo) {
            $destinationPath = 'storage/app/company/';
            $logo = date('mdYHis') . uniqid() . '.' . $request->logo->extension();
            $request->logo->move($destinationPath, $logo);
        }

        $companies = new Companies();
        $companies->nama = $request->nama;
        $companies->email = $request->email;
        $companies->website = $request->website;
        $companies->logo = $logo;
        $companies->save();
        $request->session()->flash('status', 'Data berhasil ditambahkan!');
        return redirect('companies');
    }

    // edit data
    public function edit($id)
    {
        $companies = Companies::find($id);
        return view('companies.edit', compact('companies'));
    }
    // update process
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'website' => 'required',
        ]);

        $companies = Companies::find($id);

        if ($request->logo) {
            $request->validate([
                'logo' => 'required|image|mimes:png,jpg,jpeg|dimensions:min_width="100px",min_height="100px"',
            ]);
            $destinationPath = 'storage/app/company/';
            if ($companies->logo != null) {

                $oldImg = $companies->logo;
                unlink($destinationPath . '/' . $oldImg);

                $imgName = $request->logo;
            }

            $imgName = date('mdYHis') . uniqid() . '.' . $request->logo->extension();
            $request->logo->move($destinationPath,  $imgName);
        } else {
            $imgName = $companies->logo;
        }
        $companies->nama = $request->nama;
        $companies->email = $request->email;
        $companies->website = $request->website;
        $companies->logo =  $imgName;
        $companies->save();
        $request->session()->flash('status', 'Companies Updated Successfully');
        return redirect('companies');
    }

    // detail process
    public function show($id)
    {
        $companies = Companies::find($id);
        return view('companies.detail', compact('companies'));
    }

    // delete
    public function destroy($id)
    {
        $companies = Companies::find($id);
        $destinationPath = 'storage/app/company/';
        if ($companies->logo != null) {
            $oldImg = $companies->logo;
            unlink($destinationPath . '/' . $oldImg);
        }
        $companies->delete();
        session()->flash('status', 'Companies Deleted Successfully');
        return redirect('companies');
    }
}