<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use App\Imports\UserImport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Exception;
use App\Traits\RefreshDatabaseWithData;
use Yajra\DataTables\Facades\DataTables;


class UserController extends Controller
{
    public function index()
    {
            $users = User::find(1);
            $productReviews = $users->productReviews;
            $stores = $users->stores;
    
         return view('users.index', [
                'users' => User::get(),
                'productReviews ' => $productReviews ,
                'stores ' => $stores ,
         ]);
    }  

    public function index2(){

        // $data =
        // [
        //     [
        //         'name'      =>  'John Doe',
        //         'email'     =>  'john@gmail.com',
        //         'city'      =>  'Surabaya'
        //     ],
        //     [
        //         'name'      =>  'John Cena',
        //         'email'     =>  'cena@gmail.com',
        //         'city'      =>  'Malang'
        //     ],
        //     [
        //         'name'      =>  'Andreo',
        //         'email'     =>  'andreo@gmail.com',
        //         'city'      =>  'Jakarta'
        //     ],
        // ];

        $data = User::get();

        if (request()->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($item) {
                    $render =
                    '
                        <button type="button" href="product/'.$item->id.'"class="btn btn-danger">Hapus</button>
                    ';

                    return $render;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('user-index');

    }

    
    public function create()
    {
        return view('users.create', [
            'title' => 'Tambah Data User',
        ]);
    }

    public function store(Request $request)
    {
            $validatedData = $request->validate([
                    'name'  =>  'required',
                    'email' =>  'required',
                    'city'  => 'required',
                    'password'  => 'required'
            ]);
        User::create($validatedData);

        return redirect('/users');
    } 

    public function show($user)
    {
        return view('users.show', [
            'user' => $user,
        ]);
    }

    public function importUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:csv,xls,xlsx',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else {
            $file = $request->file('file');
            $file_name = 'user' . \Carbon\Carbon::now()->isoFormat('D-M-YY-hh-mm-ss-') . $file->getClientOriginalName();
            $file_path = 'imports/user';
            $file->move($file_path, $file_name);

            // DB::beginTransaction();
            try {
                $import_users = Excel::import(new UserImport(), public_path('/imports/user/' . $file_name));
                // DB::commit();
            } catch (Exception $err) {
                // DB::rollback();
                return redirect()->back()->with(['error' => 'Import Failed - ' . $err->getMessage()]);
                // return redirect()->back()->with(['error' => 'Import Failed'])->with(['error' => $th->getMessage()]);
            }
            if ($import_users) {
                return redirect()->back()->with(['success' => 'User berhasil di import']);
            }
        }
        return redirect()->back()
            ->withInput()
            ->withErrors($validator)
            ->with(['error' => 'Data Invalid']);
    }

    public function exportUser()
    {
        return Excel::download(new UserExport, 'users.xlsx');
    }

}
