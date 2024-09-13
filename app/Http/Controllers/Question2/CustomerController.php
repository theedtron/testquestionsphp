<?php

namespace App\Http\Controllers\Question2;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use App\Repositories\Interfaces\CustomerRepositoryInterface;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customerRepo;
    public function __construct(CustomerRepositoryInterface $customerRepo)
    {
        $this->customerRepo = $customerRepo;
    }
    public function index(){
        $customers = $this->customerRepo->all();
        return view('customer.index')->with('customers', $customers);

    }

    public function create(){
        return view('customer.newCustomer');
    }

    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Customer::class],
            'dob' => ['required', 'date', 'before_or_equal:2007-01-01'],
            'national_id' => ['required', 'string', 'max:255', 'unique:'.Customer::class],
            'address' => ['required', 'string', 'max:255'],
        ]);

        $create = $this->customerRepo->insert($request->all());
        if($create){
            return redirect('customers')->with('success','Customer created');
        }else{
            return redirect('customers')->with('error','Something went wrong');
        }
    }


    public function update($id){
        $customer = $this->customerRepo->find($id);
        return view('customer.update')
            ->with('customer_id',$id)
            ->with('customer',$customer);

    }

    public function updatePost(Request $request){
        $id = $request->customer_id;
        $update = $this->customerRepo->update($id, $request->all());
        if($update){
            return redirect('customers');
        }
    }
}
