<?php

namespace App\Http\Controllers;

use App\Models\ListOfBus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ApiBusOfListController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:admin');
        $this->middleware('auth:company');  

    }

    public function index()
    {
        $username = auth()->guard('company')->user()->name;
        $active = 'active';
        $user = auth()->guard('company')->user()->id;
        $list_of_buses = DB::table('list_of_buses')
            ->join('companies', 'list_of_buses.companies_id', '=', 'companies.id')
            ->select('companies.*', 'list_of_buses.*')
            ->where('list_of_buses.companies_id', 'LIKE', $user)
            ->get();
        return view('bus_list.index', compact('list_of_buses', 'username', 'active'));
    }

    public function create()
    {
        $username = auth()->guard('company')->user()->name;
        $active = 'active';
        return view('bus_list.create', compact('username', 'active'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'plat_nomor_bus' => 'required',
            'kelas' => 'required',
            'tempat_duduk_orang_tua' => 'required',
            'tempat_duduk_anak' => 'required'
        ]);

        $user = auth()->guard('company')->user()->id;
        ListOfBus::create([
            'companies_id' => $user,
            'plat_nomor_bus' => $request->plat_nomor_bus, 
            'kelas' => $request->kelas, 
            'tempat_duduk_orang_tua' => $request->tempat_duduk_orang_tua, 
            'tempat_duduk_anak' => $request->tempat_duduk_anak,
        ]);
        return redirect('/bus-list');
    }

    public function edit($id)
    {
        $bus = ListOfBus::find($id);
        $username = auth()->guard('company')->user()->name;
        $active = 'active';
        return view('bus_list.edit', compact('bus', 'username', 'active'));
    }

    public function update(Request $request, $id)
    {
        $bus = ListOfBus::find($id);

        $this->validate($request, [
            'plat_nomor_bus' => 'required',
            'kelas' => 'required',
            'tempat_duduk_orang_tua' => 'required',
            'tempat_duduk_anak' => 'required'
        ]);

        // $bus->update($request->all());

        $user = auth()->guard('company')->user()->id;
        $bus->update([
            'companies_id' => $user,
            'plat_nomor_bus' => $request->plat_nomor_bus, 
            'kelas' => $request->kelas, 
            'tempat_duduk_orang_tua' => $request->tempat_duduk_orang_tua, 
            'tempat_duduk_anak' => $request->tempat_duduk_anak,
        ]);

        return redirect('/bus-list');
    }

    public function destroy($id)
    {
        $bus = ListOfBus::find($id);

        $bus->delete();

        return redirect('/bus-list');
    }
}
