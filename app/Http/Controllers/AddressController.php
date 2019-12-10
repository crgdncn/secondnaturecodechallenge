<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Address;

class AddressController extends Controller
{
    /**
     * Show the form for adding the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function new(Customer $customer)
    {
        $form_route = route('customer.address.new', [$customer], false);
        return view('address.new', compact('customer', 'form_route'));
    }

    /**
     * Save the specified resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request, Customer $customer)
    {
        Address::create($request->input());
        $route = route('customer.edit', [$customer], false);
        return redirect($route);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @param  \App\Models\Address $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer, Address $address)
    {
        $address_id = $address->id;
        $address_1 = $address->address_1;
        $address_2 = $address->address_2;
        $city = $address->city;
        $state = $address->state;
        $post_code = $address->post_code;
        $form_route = route('customer.address.edit', [$customer, $customer->address], false);

        return view('address.edit', compact('customer', 'address_id', 'address_1', 'address_2', 'city', 'state', 'post_code', 'form_route'));
    }

    /**
     * Update the specified resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Customer  $customer
     * @param  \App\Models\Address $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer, Address $address)
    {
        $address->update($request->input());
        $route = route('customer.edit', [$customer], false);
        return redirect($route);
    }
}
