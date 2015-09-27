<?php
namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests\CategoryRequest;
use Illuminate\Http\Request ;

class CategoriesController extends Controller {

    private $categoryModel;

    public function __construct(Category $categoryModel) // passando o categoryModel para o construct
    {
        $this->categoryModel = $categoryModel;
    }

     public function index()
    {
        $categories = $this->categoryModel->all();// lista todas as categorias encontradas
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public  function store(CategoryRequest $request)
    {
        $input = $request->all();
        $category = $this->categoryModel->fill($input);
        $category->save();
        return redirect('admin/categories');
    }

    public function destroy($id)
    {
        $this->categoryModel->find($id)->delete();   //Nunca consegue dar o delete direto no id.
        return redirect()->route('admin/categories');// assim funcionária se fosse com com apelido na rota
        //return redirect('admin/categories');       // funcionaria se a rota não tivesse apelido
    }

    public function edit($id)
    {
        $category =  $this->categoryModel->find($id);
        return view('categories.edit',compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $this->categoryModel->find($id)->update($request->all());
        return redirect()->route('categories');
    }
}
