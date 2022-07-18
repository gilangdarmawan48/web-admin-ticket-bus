<?php

namespace App\Http\Controllers;

use App\Models\BookingBus;
use App\Models\BusSchedules;
use App\Models\ListOfBus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingBusController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:admin');
        $this->middleware('auth:company');
    }

    public function index()
    {

        $user = auth()->guard('company')->user()->id;
        $username = auth()->guard('company')->user()->name;
        $active = 'active';
        $booking_buses = DB::table('booking_buses')
            ->join('bus_schedules', 'bus_schedules.id', '=', 'booking_buses.bus_schedule_id')
            ->join('companies', 'companies.id', '=', 'bus_schedules.companies_id')
            ->select('bus_schedules.*', 'companies.*', 'booking_buses.*')
            ->where('companies.id', 'LIKE', $user)
            ->get();
        
        return view('bus_booking.index', compact('booking_buses', 'username', 'active'));
    }

    public function create()
    {
        $username = auth()->guard('company')->user()->name;
        $active = 'active';
        $user = auth()->guard('company')->user()->id;
        $bus_schedules = DB::table('bus_schedules')
            ->join('list_of_buses', 'list_of_buses.id', '=', 'bus_schedules.list_of_buses_id')
            ->join('companies', 'bus_schedules.companies_id', '=', 'companies.id')
            ->select('companies.*', 'list_of_buses.*', 'bus_schedules.*')
            ->where('companies.id', 'LIKE', $user)
            ->get();
        
        return view('bus_booking.create', compact('bus_schedules', 'username', 'active'));
    }

    public function store(Request $request)
    {
        if($request->nama_anak != null && $request->umur_anak != null && $request->jenis_kelamin_anak != null)
        {
            $this->validate($request, [
                'bus_schedule_id' => 'required', 
                'nama_orang_tua' => 'nullable', 
                'umur_orang_tua' => 'nullable', 
                'jenis_kelamin_orang_tua' => 'nullable',
                'nama_anak' => 'required', 
                'umur_anak' => 'required', 
                'jenis_kelamin_anak' => 'required',
                'email' => 'required',
                'nomor_telepon' => 'required',
            ]);

            //dapat jumlah yang boking di id jadwal
            $jmlh_kursi_ortu = BookingBus::where('bus_schedule_id','LIKE',"%{$request->bus_schedule_id}%")->get();
            $collections_ortu = collect($jmlh_kursi_ortu);
            $total_kursi_ortu_terisi = $collections_ortu->count();

            $limit_kursi_ortu = DB::table('bus_schedules')
                ->join('list_of_buses', 'bus_schedules.list_of_buses_id', '=', 'list_of_buses.id')
                ->select('list_of_buses.tempat_duduk_orang_tua')
                ->where('bus_schedules.id', 'LIKE', $request->bus_schedule_id)
                ->value('list_of_buses.tempat_duduk_orang_tua');

            $jmlh_kursi_anak = BookingBus::where('bus_schedule_id','LIKE',"%{$request->bus_schedule_id}%")->get();
            $collections_anak = collect($jmlh_kursi_anak);
            $total_kursi_anak_terisi = $collections_anak->count();

            $limit_kursi_anak = DB::table('bus_schedules')
                ->join('list_of_buses', 'bus_schedules.list_of_buses_id', '=', 'list_of_buses.id')
                ->select('list_of_buses.tempat_duduk_anak')
                ->where('bus_schedules.id', 'LIKE', $request->bus_schedule_id)
                ->value('list_of_buses.tempat_duduk_anak');
                

            if($limit_kursi_anak - $total_kursi_anak_terisi <= 0){
                return redirect()->route('bus-booking.create')->with('error', "Bangku Anak Full");    
            }else if($limit_kursi_ortu - $total_kursi_ortu_terisi <= 0){
                return redirect()->route('bus-booking.create')->with('error', "Bangku Orang Tua Full");    
            }else if($request->nama_orang_tua != null && $request->umur_orang_tua != null && $request->jenis_kelamin_orang_tua != null){
                $user = auth()->guard('company')->user()->id;

                // BookingBus::create($request->all());
                BookingBus::create([
                    // 'companies_id' => $user,
                    'bus_schedule_id' => $request->bus_schedule_id,
                    'nama_orang_tua' => $request->nama_orang_tua, 
                    'umur_orang_tua' => $request->umur_orang_tua, 
                    'jenis_kelamin_orang_tua' => $request->jenis_kelamin_orang_tua,
                    'nama_anak' => $request->nama_anak, 
                    'umur_anak' => $request->umur_anak, 
                    'jenis_kelamin_anak' => $request->jenis_kelamin_anak,
                    'email' => $request->email,
                    'nomor_telepon' => $request->nomor_telepon,
                ]);
                return redirect('/bus-booking');
            }else{
                
                return redirect()->route('bus-booking.create')->with('error', "Anak Harus Di dampingi orang tua");
            }
        }else{
            $this->validate($request, [
                'bus_schedule_id' => 'required', 
                'nama_orang_tua' => 'required', 
                'umur_orang_tua' => 'required', 
                'jenis_kelamin_orang_tua' => 'required',
                'email' => 'required',
                'nomor_telepon' => 'required',
            ]);

            //dapat jumlah yang boking di id jadwal
            $jmlh_kursi_ortu = BookingBus::where('bus_schedule_id','LIKE',"%{$request->bus_schedule_id}%")->get();
            $collections_ortu = collect($jmlh_kursi_ortu);
            $total_kursi_ortu_terisi = $collections_ortu->count();

            $limit_kursi_ortu = DB::table('bus_schedules')
                ->join('list_of_buses', 'bus_schedules.list_of_buses_id', '=', 'list_of_buses.id')
                ->select('list_of_buses.tempat_duduk_orang_tua')
                ->where('bus_schedules.id', 'LIKE', $request->bus_schedule_id)
                ->value('list_of_buses.tempat_duduk_orang_tua');

            if($limit_kursi_ortu - $total_kursi_ortu_terisi > 0)
            {
                $user = auth()->guard('company')->user()->id;

                // BookingBus::create($request->all());
                BookingBus::create([
                    // 'companies_id' => $user,
                    'bus_schedule_id' => $request->bus_schedule_id,
                    'nama_orang_tua' => $request->nama_orang_tua, 
                    'umur_orang_tua' => $request->umur_orang_tua, 
                    'jenis_kelamin_orang_tua' => $request->jenis_kelamin_orang_tua,
                    'email' => $request->email,
                    'nomor_telepon' => $request->nomor_telepon,
                ]);
                return redirect('/bus-booking');
            }else{
                return redirect()->route('bus-booking.create')->with('error', 'Kursi Orang Tua Tanpa anak full');
            }
        }
            
            
        return redirect('/bus-booking');
    }

    public function edit($id)
    {
        $booking_bus = BookingBus::find($id);
        $username = auth()->guard('company')->user()->name;
        $active = 'active';
        $user = auth()->guard('company')->user()->id;
        $bus_schedules = DB::table('bus_schedules')
            ->join('list_of_buses', 'list_of_buses.id', '=', 'bus_schedules.list_of_buses_id')
            ->join('companies', 'bus_schedules.companies_id', '=', 'companies.id')
            ->select('companies.*', 'list_of_buses.*', 'bus_schedules.*')
            ->where('companies.id', 'LIKE', $user)
            ->get();
        return view('bus_booking.edit', compact('booking_bus', 'bus_schedules', 'username', 'active'));
    }

    public function update(Request $request, $id)
    {

        if($request->nama_anak != null && $request->umur_anak != null && $request->jenis_kelamin_anak != null)
        {
            $this->validate($request, [
                'bus_schedule_id' => 'required', 
                'nama_orang_tua' => 'nullable', 
                'umur_orang_tua' => 'nullable', 
                'jenis_kelamin_orang_tua' => 'nullable',
                'nama_anak' => 'required', 
                'umur_anak' => 'required', 
                'jenis_kelamin_anak' => 'required',
                'email' => 'required',
                'nomor_telepon' => 'required',
            ]);

            //dapat jumlah yang boking di id jadwal
            $jmlh_kursi_ortu = BookingBus::where('bus_schedule_id','LIKE',"%{$request->bus_schedule_id}%")->get();
            $collections_ortu = collect($jmlh_kursi_ortu);
            $total_kursi_ortu_terisi = $collections_ortu->count();

            $limit_kursi_ortu = DB::table('bus_schedules')
                ->join('list_of_buses', 'bus_schedules.list_of_buses_id', '=', 'list_of_buses.id')
                ->select('list_of_buses.tempat_duduk_orang_tua')
                ->where('bus_schedules.id', 'LIKE', $request->bus_schedule_id)
                ->value('list_of_buses.tempat_duduk_orang_tua');

            $jmlh_kursi_anak = BookingBus::where('bus_schedule_id','LIKE',"%{$request->bus_schedule_id}%")->get();
            $collections_anak = collect($jmlh_kursi_anak);
            $total_kursi_anak_terisi = $collections_anak->count();

            $limit_kursi_anak = DB::table('bus_schedules')
                ->join('list_of_buses', 'bus_schedules.list_of_buses_id', '=', 'list_of_buses.id')
                ->select('list_of_buses.tempat_duduk_anak')
                ->where('bus_schedules.id', 'LIKE', $request->bus_schedule_id)
                ->value('list_of_buses.tempat_duduk_anak');
                

            if($limit_kursi_anak - $total_kursi_anak_terisi <= 0){
                return redirect()->route('bus-booking.index')->with('error', "Bangku Anak Full");    
            }else if($limit_kursi_ortu - $total_kursi_ortu_terisi <= 0){
                return redirect()->route('bus-booking.index')->with('error', "Bangku Orang Tua Full");    
            }else if($request->nama_orang_tua != null && $request->umur_orang_tua != null && $request->jenis_kelamin_orang_tua != null){
                $user = auth()->guard('company')->user()->id;
                $booking_bus = BookingBus::find($id);
                // $booking_bus->update($request->all());
                $booking_bus->update([
                    'bus_schedule_id' => $request->bus_schedule_id,
                    'nama_orang_tua' => $request->nama_orang_tua, 
                    'umur_orang_tua' => $request->umur_orang_tua, 
                    'jenis_kelamin_orang_tua' => $request->jenis_kelamin_orang_tua,
                    'nama_anak' => $request->nama_anak, 
                    'umur_anak' => $request->umur_anak, 
                    'jenis_kelamin_anak' => $request->jenis_kelamin_anak,
                    'email' => $request->email,
                    'nomor_telepon' => $request->nomor_telepon,
                ]);
                return redirect('/bus-booking');
            }else{
                
                return redirect()->route('bus-booking.index')->with('error', "Anak Harus Di dampingi orang tua");
            }
        }else{
            $this->validate($request, [
                'bus_schedule_id' => 'required', 
                'nama_orang_tua' => 'required', 
                'umur_orang_tua' => 'required', 
                'jenis_kelamin_orang_tua' => 'required',
                'email' => 'required',
                'nomor_telepon' => 'required',
            ]);

            //dapat jumlah yang boking di id jadwal
            $jmlh_kursi_ortu = BookingBus::where('bus_schedule_id','LIKE',"%{$request->bus_schedule_id}%")->get();
            $collections_ortu = collect($jmlh_kursi_ortu);
            $total_kursi_ortu_terisi = $collections_ortu->count();

            $limit_kursi_ortu = DB::table('bus_schedules')
                ->join('list_of_buses', 'bus_schedules.list_of_buses_id', '=', 'list_of_buses.id')
                ->select('list_of_buses.tempat_duduk_orang_tua')
                ->where('bus_schedules.id', 'LIKE', $request->bus_schedule_id)
                ->value('list_of_buses.tempat_duduk_orang_tua');

            if($limit_kursi_ortu - $total_kursi_ortu_terisi > 0)
            {
                $user = auth()->guard('company')->user()->id;
                $booking_bus = BookingBus::find($id);
                // $booking_bus->update($request->all());
                $booking_bus->update([
                    'bus_schedule_id' => $request->bus_schedule_id,
                    'nama_orang_tua' => $request->nama_orang_tua, 
                    'umur_orang_tua' => $request->umur_orang_tua, 
                    'jenis_kelamin_orang_tua' => $request->jenis_kelamin_orang_tua,
                    'nama_anak' => $request->nama_anak, 
                    'umur_anak' => $request->umur_anak, 
                    'jenis_kelamin_anak' => $request->jenis_kelamin_anak,
                    'email' => $request->email,
                    'nomor_telepon' => $request->nomor_telepon,
                ]);
                return redirect('/bus-booking');
            }else{
                return redirect()->route('bus-booking.index')->with('error', 'Kursi Orang Tua Tanpa anak full');
            }
        }

        return redirect('/bus-booking');
    }

    public function destroy($id)
    {
        $booking_bus = BookingBus::find($id);

        $booking_bus->delete();

        return redirect('/bus-booking');
    }
}
