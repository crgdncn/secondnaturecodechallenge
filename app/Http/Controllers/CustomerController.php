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
        return view('customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $id = $customer->id;
        $first_name = $customer->first_name;
        $last_name = $customer->last_name;
        $email = $customer->email;
        $form_route = route('customer.update', [$customer->id], false);

        return view('customer.edit', compact('id', 'first_name', 'last_name', 'email', 'form_route'));
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
        $widget = Widget::find($request->widget_id);
        $customer->widgets()->detach($widget);
    }
}
