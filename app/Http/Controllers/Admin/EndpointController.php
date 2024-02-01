<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateEndpointRequest;
use App\Models\Endpoint;
use App\Models\Sites;
use Illuminate\Http\Request;

class EndpointController extends Controller
{
    public function index(string $siteId)
    {
        $site = Sites::with('endpoints')->find($siteId);
        if (!$site) {
            return back();
        }

        $endpoints = $site->endpoints;

        return view('admin.endpoints.index', compact('site', 'endpoints'));
    }

    public function create(string $siteId)
    {
        if (!$site = Sites::find($siteId)) {
            return back();
        }


        return view('admin.endpoints.create',compact('site'));
    }
    public function store(StoreUpdateEndpointRequest $request,Sites $site)
    {
        $site->endpoints()->create($request->validated());




        return  redirect()->route('endpoints.index',$site->id)->with('message','Endpoint cadastrado com sucesso');
    }

    public function edit(Sites $site,Endpoint $endpoint)
    {
        return view('admin/endpoints/edit', compact('site','endpoint'));
    }
    public function update(StoreUpdateEndpointRequest $request,Sites $site,Endpoint $endpoint)
    {
        $endpoint->update($request->validated());

        return  redirect()->route('endpoints.index',$site->id)->with('message','Endpoint atualizado com sucesso');
    }
    public function destroy(Sites $site,Endpoint $endpoint)
    {
        $endpoint->checks()->delete();
        $endpoint->delete();

        return  redirect()->route('endpoints.index',$site->id)->with('message','Endpoint removido com sucesso');
    }
}
