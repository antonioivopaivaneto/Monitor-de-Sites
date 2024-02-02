<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateEndpointRequest;
use App\Models\Endpoint;
use App\Models\Sites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EndpointController extends Controller
{
    public function index(string $siteId)
    {
        $site = Sites::with('endpoints.check')->find($siteId);
        if (!$site) {
            return back();
        }

        // if( Gate::denies('owner',$site)){
       //if( Gate::allows('owner',$site)){
       //return back();
       // }

        $this->authorize('owner',$site);

        $endpoints = $site->endpoints;

        return view('admin.endpoints.index', compact('site', 'endpoints'));
    }

    public function create(string $siteId)
    {
        if (!$site = Sites::find($siteId)) {
            return back();
        }

        $this->authorize('owner',$site);



        return view('admin.endpoints.create',compact('site'));
    }
    public function store(StoreUpdateEndpointRequest $request,Sites $site)
    {
        $this->authorize('owner',$site);

        $site->endpoints()->create($request->validated());




        return  redirect()->route('endpoints.index',$site->id)->with('message','Endpoint cadastrado com sucesso');
    }

    public function edit(Sites $site,Endpoint $endpoint)
    {
        $this->authorize('owner',$site);

        return view('admin/endpoints/edit', compact('site','endpoint'));
    }
    public function update(StoreUpdateEndpointRequest $request,Sites $site,Endpoint $endpoint)
    {
        $this->authorize('owner',$site);

        $endpoint->update($request->validated());

        return  redirect()->route('endpoints.index',$site->id)->with('message','Endpoint atualizado com sucesso');
    }
    public function destroy(Sites $site,Endpoint $endpoint)
    {
        $this->authorize('owner',$site);

        $endpoint->checks()->delete();
        $endpoint->delete();

        return  redirect()->route('endpoints.index',$site->id)->with('message','Endpoint removido com sucesso');
    }
}
