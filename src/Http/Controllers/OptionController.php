<?php

namespace Devfaysal\SelectOption\Http\Controllers;

use Devfaysal\SelectOption\Http\Requests\OptionRequest;
use Devfaysal\SelectOption\Models\Option;
use Devfaysal\SelectOption\SelectOption;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class OptionController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        return view('laravel-select-option::options.index');
    }

    public function create()
    {
        return view('laravel-select-option::options.create', [
            'selects' => SelectOption::selects()
        ]);
    }

    public function store(OptionRequest $request)
    {
        $attributes = $request->validated();
        SelectOption::createOption(
            $attributes['select'],
            $attributes['value'],
            $attributes['display']
        );

        Session::flash('message', 'Option created Successfully!!'); 
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('laravelSelectOption.index');
    }

    public function edit(Option $option)
    {
        return view('laravel-select-option::options.edit', [
            'option' => $option,
            'selects' => SelectOption::selects()
        ]);
    }

    public function update(OptionRequest $request, Option $option)
    {
        $attributes = $request->validated();
        $option->update($attributes);

        Session::flash('message', 'Option updated Successfully!!'); 
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('laravelSelectOption.index');
    }

    public function datatable()
    {
        $options = Option::query();

        return DataTables::of($options)
            ->addColumn('action', function($option) {
                $actions  = '<a class="btn btn-sm btn-oval btn-info mr-1" href="'. route('laravelSelectOption.edit', $option->id) .'">Edit</a>';
                $actions .= '<a class="btn btn-sm btn-oval btn-danger" href="'. route('laravelSelectOption.delete', $option->id) .'">Delete</a>';
                return $actions;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}