<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClientDetail;
use App\Client;
use App\Type;

class ClientDetailController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = null)
    {
        $clients = Client::orderBy('client_name')->get();
        $types   = Type::orderBy('type')->get();

        $viewData = [
            'clients' => $clients,
            'types' => $types,
            'id' => $id
        ];

        return view('client-details.create', $viewData);
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

        $clientDetail = new ClientDetail;
        $clientDetail->client_id = $request->client_id;
        $clientDetail->type_id = $request->type_id;
        $clientDetail->url = $request->url;
        $clientDetail->description = $request->description;
        $clientDetail->username = $request->username;
        $clientDetail->password = $request->password;

        $clientDetail->save();

        $request->session()->flash('status', '<span>Success</span>: Client detail created.');

        return redirect('/client/details/' . $request->client_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $clientDetail = ClientDetail::findOrFail($id);

        $clients = Client::orderBy('client_name')->get();
        $types   = Type::orderBy('type')->get();

        $viewData = [
            'clientDetail' => $clientDetail,
            'clients' => $clients,
            'types' => $types
        ];

        return view('client-details.edit', $viewData);
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

        $clientDetail = ClientDetail::findOrFail($id);
        $clientDetail->client_id = $request->client_id;
        $clientDetail->type_id = $request->type_id;
        $clientDetail->url = $request->url;
        $clientDetail->description = $request->description;
        $clientDetail->username = $request->username;
        $clientDetail->password = $request->password;

        $clientDetail->save();

        $request->session()->flash('status', '<span>Success</span>: Client detail record updated.');
        return redirect('/client/details/' . $request->client_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $client_detail = ClientDetail::findOrFail($id);

        $client_id = $client_detail->client_id;

        $client_detail->delete();

        // redirect
        $request->session()->flash('status', '<span>Success</span>: Client detail deleted.');
        return redirect('/client/details/' . $client_id);
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
            'client_id' => 'required',
            'type_id' => 'required'
        ];

        // Any extended rules based on insert/update

        return $rules;
    }
}
