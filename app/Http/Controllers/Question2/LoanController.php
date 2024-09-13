<?php

namespace App\Http\Controllers\Question2;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Repositories\Interfaces\LoanProductRepositoryInterface;
use App\Repositories\Interfaces\LoanRepositoryInterface;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    protected $loanRepo, $loanProductRepo;

    public function __construct(
        LoanRepositoryInterface $loanRepo,
        LoanProductRepositoryInterface $loanProductRepo
        )
    {
        $this->loanRepo = $loanRepo;
        $this->loanProductRepo = $loanProductRepo;
    }
    public function index(){
        $loans = $this->loanRepo->all();
        return view('loans.index')->with('loans', $loans);
    }

    public function create($customer_id){
        $prodcuts = $this->loanProductRepo->dropdown();
        return view('loans.new')
            ->with('customer_id',$customer_id)
            ->with('products',$prodcuts);
    }

    public function storeLoan(Request $request){
        // print_r($request->all());exit;
        $request->validate([
            'customer_id' => 'required',
            'product_id' => 'required',
            'amount' => 'required',
        ]);

        $save = $this->loanRepo->insert($request->all());
        if($save){
            return redirect('loans');
        }
    }

    public function approveLoan($id){
        $approve = $this->loanRepo->approve($id);
        if($approve){
            return redirect('loans');
        }else{
            return redirect('loans');
        }
    }

    public function disburseLoan($id){
        $approve = $this->loanRepo->disburse($id);
        if($approve){
            return redirect('loans');
        }else{
            return redirect('loans');
        }
    }
}
