<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Widget;
use Illuminate\Http\Request;

/**
 * Customers may only edit and save their personal information
 * To manage all customers, login as an admin (a user with the admin flag set)
 */
class CustomerController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        $allowEdit = $customer->id == \Auth::user()->id;
        return view('customer.show', compact('customer', 'allowEdit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        if (\Gate::denies('edit-user', $customer)) {
            abort(404);
        }

        $id = $customer->id;
        $first_name = $customer->first_name;
        $last_name = $customer->last_name;
        $email = $customer->email;
        $form_route = route('customer.update', [$customer->id], false);
        $address = $customer->address;

        if ($address) {
            $address_route = route('customer.address.edit', [$customer, $customer->address], false);
        } else {
            $address_route = route('customer.address.new', [$customer], false);
        }

        return view('customer.edit', compact('id', 'first_name', 'last_name', 'email', 'form_route', 'address_route', 'address'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        if (\Gate::denies('edit-user', $customer)) {
            abort(404);
        }

        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $customer->id],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $customer->first_name = $request->input('first_name');
        $customer->last_name = $request->input('last_name');
        $customer->email = $request->input('email');
        $customer->password = \Hash::make($request->input('password'));
        $customer->save();

        return redirect(route('customer.show', [$customer->id], false));
    }

    /**
     * Add a widget to the customers list
     *
     * @param Request  $request
     * @param Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function addWidget(Request $request, Customer $customer)
    {
        if (\Gate::denies('edit-user', $customer)) {
            abort(404);
        }

        $widget = Widget::find($request->widget_id);
        $customer->widgets()->attach($widget);
        return view('customer.partials.widget_row', compact('customer', 'widget'));
    }

    /**
     * Remove a widget from a customers list
     *
     * @param  Request  $request
     * @param  Customer $customer
     * @return void
     */
    public function removeWidget(Request $request, Customer $customer)
    {
        if (\Gate::denies('edit-user', $customer)) {
            abort(404);
        }

        $widget = Widget::find($request->widget_id);
        $customer->widgets()->detach($widget);
    }
}
