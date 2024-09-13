<?php

namespace App\Http\Controllers\Question2;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Repositories\Interfaces\LoanProductRepositoryInterface;
use App\Repositories\Interfaces\LoanRepositoryInterface;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    protected $loanRepo, $customerRepo, $loanProductRepo;

    public function __construct(
        CustomerRepositoryInterface $customerRepo,
        LoanRepositoryInterface $loanRepo,
        LoanProductRepositoryInterface $loanProductRepo
        )
    {
        $this->loanRepo = $loanRepo;
    }
    public function index(){
        $loans = $this->loanRepo->all();
        return view('')->with('loans', $loans);
    }

    public function create($customer_id){
        $prodcuts = $this->loanProductRepo->dropdown();
        return view('')
            ->with('customer_id',$customer_id)
            ->with('products',$prodcuts);
    }

    public function store(Request $request){
        $request->validate([
            'customer_id' => 'required',
            'product_id' => 'required',
            'amount' => 'required',
        ]);

        $save = $this->loanRepo->insert($request->all());
        if($save){
            return view('');
        }
    }
}
