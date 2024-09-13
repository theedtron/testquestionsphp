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
            'min_amoun' => 'required',
            'max_amount' => 'required',
            'interest_rate' => 'required',
            'currency_id' => 'required'
        ]);
        print_r($request->all());exit;

        $store = $this->loanProductRepo->insert($request->all());
        if($store){
            return view('loanProducts.new')->with('success','Loan Product Created');
        }else{
            return view('loanProducts.new')->with('error','Something went wrong');
        }
    }
}
