<?php
namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;

use CodeCommerce\Http\Requests\ProductImageRequest;
use Illuminate\Http\Requests;
use CodeCommerce\Product;
use CodeCommerce\ProductImage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller {

    private $productModel;

    public function __construct(Product $productModel) // passando o categoryModel para o construct
    {
        $this->productModel = $productModel;
    }

    public function index()
    {
        $produtos = Product::all();

        return view('produtos.index',['produtos'=>$produtos]);
    }

    public function create(Category $category) // só de fazer isso o laravel já injetar a categoria // Method Injection
    {
        //$categories = $category::all();// Lista tudo da categoria
        $categories = $category->lists('name', 'id');

        return view('produtos.create', compact('categories'));
    }

    public  function store(ProductRequest $request)
    {
        $input = $request->all();
        $product = $this->productModel->fill($input);
        $product->save();
        return redirect('admin/products');
    }

    public function images($id){

        $product = $this->productModel->find($id);

        return view('produtos.images', compact('product'));
    }

    public function createImage($id){

        $product = $this->productModel->find($id);

        return view('produtos.create_image', compact('product'));
    }

    public function storeImage(ProductImageRequest $request, $id, ProductImage $productImage)
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension(); // Pega a extensão original do arquivo

        $image = $productImage::create(['product_id'=>$id, 'extension'=>$extension]);

        Storage::disk('public_local')->put($image->id.'.'.$extension, File::get($file));

        return redirect()->route('product.images', ['id'=>$id]);

    }

    public function destroyImage($id, ProductImage $productImage){

        $image = $productImage->find($id);

        /* Verifica se a imagem existe */
        if(file_exists(public_path().'/uploads/'.$image->id.'.'.$image->extension)) {

            Storage::disk('public_local')->delete($image->id . '.' . $image->extension);
        }

        $product = $image->product;
        $image->delete();

        return redirect()->route('product.images',['id'=>$product->id]);
    }
}
