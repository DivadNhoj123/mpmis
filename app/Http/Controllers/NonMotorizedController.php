<?php

namespace App\Http\Controllers;

use App\Models\Heading;
use Illuminate\Http\Request;
use App\Models\NonBoatRegistration;

class NonMotorizedController extends Controller
{
    public function index()
    {
        $Registers = NonBoatRegistration::all();
        return view('admin-agriculture.non-motorized')->with('registers', $Registers);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'owner' => 'required',
            'address' => 'required',
            'registration_no' => 'required|unique:non_boat_registrations,registration_no',
            'fisherfolk_id' => 'nullable',
            'remarks' => 'required',
        ], [
            'registration_no.unique' => 'The registration number has already been registered.',
        ]);

        NonBoatRegistration::create([
            'owner' => $request->owner,
            'address' => $request->address,
            'registration_no' => $request->registration_no,
            'fisherfolk_id' => $request->fisherfolk_id,
            'remarks' => $request->remarks,
            'date_registered' => now()->format('Y-m-d H:i:s')
        ]);

        return redirect()->route('agriculture-non-motorized.index')->with('success', 'Registered successfully.');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'owner' => 'required',
            'address' => 'required',
            'registration_no' => 'required',
            'fisherfolk_id' => 'nullable',
            'remarks' => 'required',
            'date_registered' => 'required',
        ]);

        if ($validated) {
            $register = NonBoatRegistration::findOrFail($id);

            $register->update([
                'owner' => $request->owner,
                'address' => $request->address,
                'registration_no' => $request->registration_no,
                'fisherfolk_id' => $request->fisherfolk_id,
                'remarks' => $request->remarks,
                'date_registered' => $request->date_registered

            ]);
            return redirect()->route('agriculture-motorized.index')->with('success', 'Registered successfully.');
        }
    }

    public function renew(Request $request, $id)
    {
        $NonBoatRegistration = NonBoatRegistration::findOrFail($id);

        $NonBoatRegistration->date_registered =  now()->format('Y-m-d H:i:s');

        $NonBoatRegistration->save();

        return response()->json(['success' => 'Date registered updated successfully.']);
    }

    public function print(){
        $Registers = NonBoatRegistration::all();
        $headings = Heading::get()->first();
        return view('admin-agriculture.partials.printable.non-motorized')
        ->with(['register'=> $Registers, 'headings' =>$headings]);
    }
}
