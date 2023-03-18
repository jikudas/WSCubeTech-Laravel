<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index() {
        return view('customer');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        $customer = [
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'address' => $request->address,
            'country' => $request->country,
            'state' => $request->state,
            'dob' => $request->dob,
            'password' => bcrypt($request->password),
        ];

        Customer::create($customer);

        return redirect(route('customer.view'));
    }

    public function view(Request $request)
    {
        $search = $request['search'] ?? '';
        if($search != '') {
            $customers = Customer::where('name', 'LIKE', '%' . $search . '%')->orWhere('email', 'LIKE', '%' . $search . '%')->get();
        } else {
            $customers = Customer::paginate(15);
        }
        $data = compact('customers', 'search');
        return view('customer-view')->with($data);
    }

    public function trash()
    {
        $customers = Customer::onlyTrashed()->get();
        $data = compact('customers');
        return view('customer-trash')->with($data);
    }

    public function restore($id)
    {
        $customer = Customer::withTrashed()->find($id);
        if (!is_null($customer)) {
            $customer->restore();
        }
        return redirect(route('customer.trash'));
    }

    public function delete($id)
    {
        $customer = Customer::find($id);
        if(!is_null($customer)) {
            $customer->delete();
        }
        return redirect(route('customer.view'));
    }

    public function forceDelete($id)
    {
        $customer = Customer::withTrashed()->find($id);
        if (!is_null($customer)) {
            $customer->forceDelete();
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        $data = compact('customer');
        return view('customer-edit')->with($data);
    }

    public function update($id, Request $request)
    {
        $customer = Customer::find($id);

        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->gender = $request->gender;
        $customer->address = $request->address;
        $customer->country = $request->country;
        $customer->state = $request->state;
        $customer->dob = $request->dob;

        $customer->save();

        return redirect(route('customer.view'));
    }

    public function upload(Request $request) {
        $fileName = time().'-jd.'. $request->file('img')->getClientOriginalExtension();
        echo $request->file('img')->storeAs('public/uploads', $fileName);
    }
}
