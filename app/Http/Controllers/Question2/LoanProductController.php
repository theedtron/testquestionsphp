<?php

namespace App\Http\Controllers\Question2;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\LoanProductRepositoryInterface;
use Illuminate\Http\Request;

class LoanProductController extends Controller
{
    protected $loanProductRepo;

    public function __construct(LoanProductRepositoryInterface $loanProductRepo)
    {
        $this->loanProductRepo = $loanProductRepo;
    }

    public function index(){
        $products = $this->loanProductRepo->all();

        return view('loanProducts.index')->with('products',$products);
    }

    public function create(){
        $currenies = $this->loanProductRepo->currencies();
        return view('loanProducts.new')->with('currencies',$currenies);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'min_amount' => 'required',
            'max_amount' => 'required',
            'interest_rate' => 'required',
            'currency_id' => 'required'
        ]);

        $store = $this->loanProductRepo->insert($request->all());
        if($store){
            return redirect('loanproducts');
        }else{
            return redirect('loanproducts');
        }
    }

    public function update($id){
        $product = $this->loanProductRepo->find($id);
        $currenies = $this->loanProductRepo->currencies();
        return view('loanProducts.update')
            ->with('loan_product_id',$id)
            ->with('currencies',$currenies)
            ->with('product',$product);

    }

    public function updatePost(Request $request){
        $id = $request->loan_product_id;
        $update = $this->loanProductRepo->update($id, $request->all());
        if($update){
            return redirect('loanproducts');
        }
    }
}
