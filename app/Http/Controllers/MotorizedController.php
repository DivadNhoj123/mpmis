<?php

namespace App\Http\Controllers;

use App\Models\Heading;
use Illuminate\Http\Request;
use App\Models\BoatRegistration;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class MotorizedController extends Controller
{

    public function index()
    {
        $Registers = BoatRegistration::all();
        return view('admin-agriculture.motorized')->with('registers', $Registers);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'owner' => 'required',
            'address' => 'required',
            'registration_no' => 'required|unique:boat_registrations,registration_no', // Ensure uniqueness in the correct table
            'fisherfolk_id' => 'nullable',
            'name_of_boat' => 'nullable',
            'engine' => 'required',
            'engine_serial' => 'required',
            'hp' => 'required',
            'color' => 'required',
            'tonnage' => 'required',
            'remarks' => 'required',
        ], [
            'registration_no.unique' => 'The registration number has already been registered.', // Custom message for duplicate registration_no
        ]);

        // If validation passes, create a new registration record
        if ($validated) {
            BoatRegistration::create([
                'owner' => $request->owner,
                'address' => $request->address,
                'registration_no' => $request->registration_no,
                'fisherfolk_id' => $request->fisherfolk_id,
                'name_of_boat' => $request->name_of_boat,
                'engine' => $request->engine,
                'engine_serial' => $request->engine_serial,
                'hp' => $request->hp,
                'color' => $request->color,
                'tonnage' => $request->tonnage,
                'remarks' => $request->remarks,
                'date_registered' => now()->format('Y-m-d H:i:s'),
            ]);

            return redirect()->route('agriculture-motorized.index')->with('success', 'Registered successfully.');
        }
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'owner' => 'required',
            'address' => 'required',
            'registration_no' => 'required',
            'fisherfolk_id' => 'nullable',
            'name_of_boat' => 'nullable',
            'engine' => 'required',
            'engine_serial' => 'required',
            'hp' => 'required',
            'color' => 'required',
            'tonnage' => 'required',
            'remarks' => 'required',
            'date_registered' => 'required',
        ]);

        if ($validated) {
            $register = BoatRegistration::findOrFail($id);

            $register->update([
                'owner' => $request->owner,
                'address' => $request->address,
                'registration_no' => $request->registration_no,
                'fisherfolk_id' => $request->fisherfolk_id,
                'name_of_boat' => $request->name_of_boat,
                'engine' => $request->engine,
                'engine_serial' => $request->engine_serial,
                'hp' => $request->hp,
                'color' => $request->color,
                'tonnage' => $request->tonnage,
                'remarks' => $request->remarks,
                'date_registered' => $request->date_registered

            ]);
            return redirect()->route('agriculture-motorized.index')->with('success', 'Registered successfully.');
        }
    }

    public function renew(Request $request, $id)
    {
        $boatRegistration = BoatRegistration::findOrFail($id);

        $boatRegistration->date_registered =  now()->format('Y-m-d H:i:s');

        $boatRegistration->save();

        return response()->json(['success' => 'Date registered updated successfully.']);
    }

    public function print(){
        $Registers = BoatRegistration::all();
        $headings = Heading::get()->first();
        return view('admin-agriculture.partials.printable.motorized')
        ->with(['register'=> $Registers, 'headings' =>$headings]);
    }
}
