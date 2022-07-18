<?php

namespace App\Http\Controllers;

use App\Models\BusSchedules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BusScheduleController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:admin');
        $this->middleware('auth:company');

    }

    public function index()
    {
        $user = auth()->guard('company')->user()->id;
        $bus_schedules = DB::table('bus_schedules')
            ->join('list_of_buses', 'list_of_buses.id', '=', 'bus_schedules.list_of_buses_id')
            ->join('companies', 'bus_schedules.companies_id', '=', 'companies.id')
            ->select('companies.*', 'list_of_buses.*', 'bus_schedules.*')
            ->where('companies.id', 'LIKE', $user)
            ->get();
        $username = auth()->guard('company')->user()->name;
        $active = 'active';        
        return view('bus_schedule.index', compact('bus_schedules', 'username', 'active'));
    }

    public function create()
    {
        $user = auth()->guard('company')->user()->id;
        $list_of_buses = DB::table('list_of_buses')
            ->join('companies', 'list_of_buses.companies_id', '=', 'companies.id')
            ->select('companies.*', 'list_of_buses.*')
            ->where('list_of_buses.companies_id', 'LIKE', $user)
            ->get();
        $username = auth()->guard('company')->user()->name;
        $active = 'active';            
        return view('bus_schedule.create', compact('list_of_buses', 'username', 'active'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'list_of_buses_id' => 'required',
            'tanggal' => 'required',
            'asal' => 'required',
            'tujuan' => 'required',
            'tarif' => 'required'
        ]);
        $user = auth()->guard('company')->user()->id;

        BusSchedules::create([
            'companies_id' => $user,
            'list_of_buses_id' => $request->list_of_buses_id, 
            'tanggal' => $request->tanggal,
            'asal' => $request->asal, 
            'tujuan' => $request->tujuan, 
            'tarif' => $request->tarif,
        ]);

        return redirect('/bus-schedule');
    }

    public function edit($id)
    {
        $bus_schedule = BusSchedules::find($id);

        // $user = auth()->guard('company')->user()->id;
        // $list_of_buses = DB::table('bus_schedules')
        //     ->join('list_of_buses', 'list_of_buses.id', '=', 'bus_schedules.list_of_buses_id')
        //     ->join('companies', 'bus_schedules.companies_id', '=', 'companies.id')
        //     ->select('companies.*', 'list_of_buses.*', 'bus_schedules.*')
        //     ->where('bus_schedules.companies_id', 'LIKE', $user)
        //     ->get();
        
        // $bus = DB::table('bus_schedules')
        //     ->join('list_of_buses', 'list_of_buses.id', '=', 'bus_schedules.list_of_buses_id')
        //     ->join('companies', 'bus_schedules.companies_id', '=', 'companies.id')
        //     ->select('companies.*', 'list_of_buses.*', 'bus_schedules.*')
        //     ->where('bus_schedules.companies_id', 'LIKE', $user)
        //     ->where('bus_schedules.id', 'LIKE', $id)
        //     ->get();
        
        $user = auth()->guard('company')->user()->id;
        $list_of_buses = DB::table('list_of_buses')
            ->join('companies', 'list_of_buses.companies_id', '=', 'companies.id')
            ->select('companies.*', 'list_of_buses.*')
            ->where('list_of_buses.companies_id', 'LIKE', $user)
            ->get();
        $username = auth()->guard('company')->user()->name;
        $active = 'active';                     
        return view('bus_schedule.edit', compact('bus_schedule', 'list_of_buses', 'username', 'active'));
    }

    public function update(Request $request, $id)
    {
        $bus_schedule = BusSchedules::find($id);

        $this->validate($request, [
            'list_of_buses_id' => 'required',
            'tanggal' => 'required',
            'asal' => 'required',
            'tujuan' => 'required',
            'tarif' => 'required'
        ]);

        $user = auth()->guard('company')->user()->id;
        
        $bus_schedule->update([
            'companies_id' => $user,
            'list_of_buses_id' => $request->list_of_buses_id, 
            'tanggal' => $request->tanggal,
            'asal' => $request->asal, 
            'tujuan' => $request->tujuan, 
            'tarif' => $request->tarif,
        ]);

        return redirect('/bus-schedule');
    }

    public function destroy($id)
    {
        $bus_schedule = BusSchedules::find($id);

        $bus_schedule->delete();

        return redirect('/bus-schedule');
    }
}
