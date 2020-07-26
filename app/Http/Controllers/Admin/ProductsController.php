<?php

namespace App\Http\Controllers\Admin;
use App\Product;

use App\Http\Controllers\Controller;
use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    protected $rules=[
        'category_id'=>'required|int|exists:categories,id',
        'name'=>'required|string|max:255',
        'description'=>'nullable',
        'image.*'=>'required|image|dimensions:min_width=200,min_height=200',
        'price'=>'required|numeric',
     ];

    public function index(){
        $request = request();
        $perpage = $request->query('perpage');
        if($perpage == 'all'){
            //select *  from products
            //select * from categories where id IN (1,2,3)
           $products = Product::with('category','tags')->get();

           /*$products = Product::join('categories','products.category_id','=','categories.id')
           ->select([
               'products.*',
               'categories.name as category_name',

           ])
           ->get();*/

        }else{
            $products = Product::with('category','tags')->paginate($perpage);
        }

        return view('admin.products.index',[
            'products'=> $products,
        ]);
    }


    public function create(){
        return view('admin.products.create');

    }

    public function store(Request $request){
        $request->validate($this->rules);

        $product = Product::create($request->except('image'));
        if ($request->hasFile('image')) {
            $cover = '';
            foreach($request->file('image') as $image){
                $path= $image->store('images','public');
                if(empty($cover)){
                    $cover = $path;
                }
              /*  ProductImage::create([
                    'product_id' =>$product->id,
                    'image'=>$path,

                ]);*/ //الاولى باستخدام relation الاثنتين صح
                $product->images()->create([
                    'image'=>$path,
                ]);
            }
            $product->update([
                'image' =>$cover,
            ]);

        }

        return redirect(route('products'))
        ->with('success',"Product{$product->name} created!");
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.show',[
            'product'=>$product,
        ]);
    }

    public function edit($id){
        $product = Product::findOrFail($id);
        return view('admin.products.edit',[
            'product'=>$product,
        ]);
        if(!$product){
             abort(404);
         }
         return view('admin.products.edit',[
             'product'=> $product,
         ]);
    }

    public function update(Request $request,$id){
        $this->rules['image'] = 'image|dimensions:min_width=200,min_height=200';
   $request->validate($this->rules);

   $product = Product::findOrFail($id);
    $image = $product->image;

   if ($request->hasFile('image')&& $request->file('image')->isValid() ){
    $image = $request->file('image')->store('images','public');
  //  $filename = 'product_image' . date('Y-m-d-H-i-s') . '' . $file->getClientOriginalExtension();//الصيغة بالكامل مع الوقت
   // $image = $file->storAs('image',$file->getClientOriginalName());//تقوم بترجيع الاسم الاصلي للصورة

}
$data = array_merge($request->all(),[
        'image'=>$image,
]);
   $product ->update($data);
        return redirect(route('products'))
        ->with('success',"Product{$product->name} update!");
    }

    public function delete($id){
        $product = Product::findOrFail($id);
        $product->delete();
        //delete the product file
        Storage::disk('public')->delete($product->image);
        return redirect(route('products'))
        ->with('success',"Product{$product->name} delete!");

    }

}
