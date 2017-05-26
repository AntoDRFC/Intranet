<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\ClientDetail;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // set searched client to empty by default
        $client = '';

        if(empty($request->client)) {
            // get all the clients
            $clients = Client::orderBy('client_name')->get();
        } else {
            // search for clients
            $clients = Client::where('client_name', 'LIKE', '%' .$request->client . '%')->orderBy('client_name')->get();
            $client = $request->client;
        }

        // load the view and pass the clients
        return view('clients.index', [
            'clients' => $clients,
            'client' => $client
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
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

        $client = new Client;
        $client->client_name = $request->client_name;

        $client->save();

        $request->session()->flash('status', '<span>Success</span>: Client created.');
        return redirect()->route('clients.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $client = Client::findOrFail($id);

        return view('clients.edit', ['client' => $client]);
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

        $client = Client::findOrFail($id);
        $client->client_name = $request->client_name;

        $client->save();

        $request->session()->flash('status', '<span>Success</span>: Client updated.');
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        // redirect
        $request->session()->flash('status', '<span>Success</span>: Client deleted.');
        return redirect()->route('clients.index');
    }

    /**
     * Display a list of the client details.
     *
     * @param  int  $id
     */
    public function details(Request $request, $id)
    {
        $searchTerm = '';

        if(empty($request->description)) {
            // get all the clients
            $details = ClientDetail::where('client_id', $id)->get();
        } else {
            // search for clients
            $details = ClientDetail::where('client_id', $id)->where('description', 'LIKE', '%' .$request->description . '%')->get();
            $searchTerm = $request->description;
        }

        $client  = Client::findOrFail($id);
        //$details = ClientDetail::where('client_id', $id)->get();

        $viewData = [
            'client'  => $client,
            'details' => $details,
            'searchTerm' => $searchTerm
        ];

        return view('clients.view-details', $viewData);
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
            'client_name' => 'required|max:255',
        ];

        // Any extended rules based on insert/update
        if($validationType == 'Insert') {
            $rules['client_name'] .= '|unique:clients';
        }

        return $rules;
    }
}
