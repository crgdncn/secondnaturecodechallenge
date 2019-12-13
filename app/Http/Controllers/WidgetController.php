<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Widget;

class WidgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $widgets = Widget::all();
        return view('widget.index', compact('widgets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action_route =  route('widget.store', [], false);
        return view('widget.create', compact('action_route'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'sku' => ['required', 'string', 'max:32'],
            'name' => ['required', 'string', 'max:255'],
        ]);

        Widget::create($request->input());

        return redirect(route('widget.index', [], false));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Widget  $widget
     * @return \Illuminate\Http\Response
     */
    public function edit(Widget $widget)
    {
        $sku = $widget->sku;
        $name = $widget->name;
        $description = $widget->description;
        $active = $widget->active;
        $action_route =  route('widget.update', [$widget->id], false);

        return view('widget.edit', compact('sku', 'name', 'description', 'active', 'action_route'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Widget  $widget
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Widget $widget)
    {
        $request->validate([
            'sku' => ['required', 'string', 'max:32'],
            'name' => ['required', 'string', 'max:255'],
        ]);

        $active = $request->input('active', false);
        $data = array_merge($request->input(), ['active' => $active]);
        $widget->update($data);

        return redirect(route('widget.index'));
    }

    /**
     * A list of available widgets that can be added
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $customer = \Auth::user()->customer;
        $alreadyAdded = $customer->widgets->pluck('id');
        $widgets = Widget::whereNotIn('id', $alreadyAdded)->active()->orderBy('name')->get();
        return view('widget.list', compact('customer', 'widgets'));
    }
}
