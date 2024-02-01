<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSiteRequest;
use App\Models\Sites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function index()
    {
        $sites = Sites::paginate(15);

        return view('admin/sites/index', compact('sites'));
    }

    public function create()
    {

        return view('admin/sites/create');
    }

    public function store(StoreUpdateSiteRequest $request)
    {


        $user = auth()->user();
        $user->sites()->create($request->validated());

        return redirect()->route('sites.index')->with('message','site criado com sucesso');
    }

    public function edit(string $id)
    {
        if (!$site = Sites::find($id)) {
            return back();
        }


        return view('admin/sites/edit', compact('site'));
    }

    public function update(StoreUpdateSiteRequest $request,Sites $site)
    {
        $site->update($request->validated());

        return redirect()->route('sites.index')->with('message','site Editado com sucesso');

    }
    public function destroy(Sites $site)
    {
        $site->delete();

        return redirect()->route('sites.index')->with('message','site Removido com sucesso');

    }
}
