<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// import model
use App\Models\Employees;
use App\Models\Companies;
use PDF;
use App\Http\Requests\Employees as RequestsEmployees;

class EmployeesController extends Controller
{
    //index
    public function index()
    {
        $employees = Employees::with(['get_company'])->paginate(5);
        return view('employees.index', compact('employees'));
    }

    // create
    public function create()
    {
        // return view
        return view('employees.create');
    }
    //store data employees
    public function store(RequestsEmployees $request)
    {
        Employees::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'company' => $request->company,
        ]);
        $request->session()->flash('status', 'Data employees berhasil ditambahkan!');
        return redirect()->route('employees.index');
    }
    // detail
    public function show($id)
    {
        $employees = Employees::find($id);
        return view('employees.detail', compact('employees'));
    }
    // edit data
    public function edit($id)
    {
        $employees = Employees::find($id);
        $companies = Companies::all()->pluck('nama', 'id');
        $employees->load('get_company');
        return view('employees.edit', compact('employees', 'companies'));
    }
    // proccess
    public function update(RequestsEmployees $request, $id)
    {
        $employees  = Employees::find($id);
        $employees->nama = $request->input('nama');
        $employees->email = $request->input('email');
        $employees->company = $request->input('company');
        $employees->save();
        $request->session()->flash('status', 'Data employee berhasil diperbarui');

        return redirect()->route('employees.index');
    }
    // delete
    public function destroy($id)
    {
        $employees = Employees::find($id);
        $employees->delete();
        session()->flash('status', 'Data employee berhasil dihapus!');
        return redirect('employees');
    }
    // export pdf
    public function export()
    {
        $employees = Employees::all();

        $pdf = PDF::loadView('employees.export', ['employees' => $employees])
            ->setPaper('a4', 'portrait');

        return $pdf->download('employees.pdf');
    }
    // Fetch records data for ajax
    public function getCompanies(Request $request)
    {
        $search = $request->search;

        if ($search == '') {
            $companies = Companies::orderby('nama', 'asc')->select('id', 'nama')->limit(5)->get();
        } else {
            $companies = Companies::orderby('nama', 'asc')->select('id', 'nama')->where('nama', 'like', '%' . $search . '%')->limit(5)->get();
        }

        $data = array();
        foreach ($companies as $company) {
            $data[] = array(
                "id" => $company->id,
                "text" => $company->nama
            );
        }
        return response()->json($data);
    }
}