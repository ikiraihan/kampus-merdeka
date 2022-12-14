<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
//use Yajra\DataTables\Facades\DataTables;
use DataTables;

class ProductController extends Controller
{
    public function index() {   
        $products = Product::find(1);
        $stores = $products->stores;
    
         return view('products.index', [
                'products' => Product::get(),
                'stores' => $stores ,
         ]);
    }  

    public function dataTables(){

        $data = Product::get();

        if (request()->ajax()){
            return DataTables::of($data)
                ->addIndexColumn()
                // ->addColumn('name_store', function($item) {
                //     return $item->stores->name;
                // })

                ->addColumn('action', function($item) {
                    $render =
                    '<a type="button" href="/products/destroy2/'.$item->id.'" class="btn btn-danger">Hapus</a>';
                    return $render;
                })
                ->make(true);
        }

        return view('product-index');
    }
    
    
    public function create()
    {
        return view('products.create', [
            'title' => 'Tambah Data Produk',
        ]);
    }

    public function store(Request $request)
    {       
        $file = $request->file('photo');
        $nama_file = time()."_".$file->getClientOriginalName();

        Product::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'price' => $request->price,
            'description' => $request->description,
            'photo' => $nama_file,
            'store_id' => $request->store_id,
        ]);

        $file->move(public_path().'/img/uploads', $nama_file);

        // Product::create($validatedData);

        return redirect('/products');
    } 


    public function edit($id)
    {   
        //$prod = Product::find($id);
        return view('products.edit', [
            'title' => 'Edit Data Produk',
            'products' => Product::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
            $prod = Product::find($id);
            $prod->name  = $request->name;
            $prod->store_id = $request->store_id;
            $prod->slug  = $request->slug;
                    $prod->description  = $request->description;
                    $prod->price  = $request->price;
            $prod->save();

                    return redirect('/products');
    }
//     public function update(Request $request, $id)
//         {       
//                 Product::where('id',$id)->update([
                        
//                         'name'      => $request->name,
//                         'store_id'    => $request->store_id,
//                         'slug'   => $request->slug,
//                         'price'      => $request->price,
//                         'description'     => $request->description,
//                         'photo'  => $request->photo,
//                     ]);
//         }

        public function destroy($id){
                $prod = Product::find($id);
                $prod->delete();

                return redirect('/products')->with('successDelete', 'Data User Berhasil dihapus!');

       }

       public function destroy2($id){
        $prod = Product::find($id);
        $prod->delete();

        return redirect('/products/index')->with('successDelete', 'Data User Berhasil dihapus!');

    }

       public function trash()
        {
                $prod = Product::onlyTrashed()->get();
                return view('products.trash', [
                'title' => 'Restore Data Produk',
                'products' => $prod
                ]);
        }

        // hapus permanen
        public function destroy_permanent($id)
        {
                // hapus permanen data guru
                $prod = Product::onlyTrashed()->where('id',$id);
                $prod->forceDelete();
        
                return redirect('/products/trash');
        }

         // restore data guru yang dihapus
        public function restore($id)
        {
                $prod = Product::onlyTrashed()->where('id',$id);
                $prod->restore();
                return redirect('/products/trash');
        }
       

    // public function show($user)
    // {
    //     return view('users.show', [
    //         'user' => $user,
    //     ]);
    // }
}
