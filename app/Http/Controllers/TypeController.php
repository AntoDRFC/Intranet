<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the types
        $types = Type::orderBy('type')->get();

        // load the view and pass the types
        return view('types.index')->with('types', $types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validationRules = $this->getValidationRules('Insert');
        $this->validate($request, $validationRules);

        $type = new Type;
        $type->type = $request->type;

        $type->save();

        $request->session()->flash('status', '<span>Success</span>: Type created.');
        return redirect()->route('types.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $type = Type::findOrFail($id);

        return view('types.edit', ['type' => $type]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validationRules = $this->getValidationRules('Update');
        $this->validate($request, $validationRules);

        $type = Type::findOrFail($id);
        $type->type = $request->type;

        $type->save();

        $request->session()->flash('status', '<span>Success</span>: Type updated.');
        return redirect()->route('types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $type = Type::findOrFail($id);
        $type->delete();

        // redirect
        $request->session()->flash('status', '<span>Success</span>: Type deleted.');
        return redirect()->route('types.index');
    }

    /**
     * Gets an array of all the validation rules
     *
     * @param string $validationType
     * @return array() $rules
     */
    public function getValidationRules($validationType)
    {
        // Base validation rules
        $rules = [
            'type' => 'required|max:255'
        ];

        // Any extended rules based on insert/update
        if($validationType == 'Insert') {
            $rules['type'] .= '|unique:types';
        }

        return $rules;
    }
}
