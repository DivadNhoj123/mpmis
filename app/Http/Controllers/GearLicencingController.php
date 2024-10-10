<?php

namespace App\Http\Controllers;

use App\Models\GearLicence;
use Illuminate\Http\Request;

class GearLicencingController extends Controller
{
    public function index()
    {
        $gears = GearLicence::all();
        return view('admin-agriculture.fish-gear')->with('gears', $gears);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'owner' => 'required',
            'address' => 'required',
            'tax_cert' => 'required',
            'date_issued' => 'required',
            'place_issued' => 'required',
            'fishing_gear' => 'required',
            'specs' => 'required',
            'net_length ' => 'nullable',
            'net_depth' => 'nullable',
            'net_mesh_size' => 'nullable',
            'trap_length' => 'nullable',
            'trap_height' => 'nullable',
            'trap_width' => 'nullable',
            'trap_mesh_size' => 'nullable',
            'nylon' => 'nullable',
            'hook_size' => 'nullable',
            'hook_no' => 'nullable',
        ]);

        if ($validated) {
            $register = GearLicence::create([
                'owner' => $request->owner,
                'address' => $request->address,
                'tax_cert_no' => $request->tax_cert,
                'date_issued' => $request->date_issued,
                'place_issued' => $request->place_issued,
                'fishing_gear' => $request->fishing_gear,
                'specs'  => $request->specs,
                'net_length'  => $request->net_length,
                'net_depth' => $request->net_depth,
                'net_mesh_size' => $request->net_mesh,
                'trap_length' => $request->trap_length,
                'trap_height' => $request->trap_height,
                'trap_width' => $request->trap_width,
                'trap_mesh_size' => $request->trap_mesh,
                'nylon' => $request->nylon,
                'hook_size' => $request->hook_size,
                'hook_no' => $request->hook_no,
            ]);
            if ($register) {
                return redirect()->route('fishing-gear.index')->with('success', 'Registered successfully!!');
            } else {
                return redirect()->route('fishing-gear.index')->with('error', 'Connot process registration');
            }
        }
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'owner' => 'required',
            'address' => 'required',
            'tax_cert' => 'required',
            'date_issued' => 'required',
            'place_issued' => 'required',
            'fishing_gear' => 'required',
            'specs' => 'required',
            'net_length ' => 'nullable',
            'net_depth' => 'nullable',
            'net_mesh_size' => 'nullable',
            'trap_length' => 'nullable',
            'trap_height' => 'nullable',
            'trap_width' => 'nullable',
            'trap_mesh_size' => 'nullable',
            'nylon' => 'nullable',
            'hook_size' => 'nullable',
            'hook_no' => 'nullable',
        ]);

        if ($validated) {
            $register = GearLicence::findOrFail($id);

            $register->update([
                'owner' => $request->owner,
                'address' => $request->address,
                'tax_cert_no' => $request->tax_cert,
                'date_issued' => $request->date_issued,
                'place_issued' => $request->place_issued,
                'fishing_gear' => $request->fishing_gear,
                'specs'  => $request->specs,
                'net_length'  => $request->net_length,
                'net_depth' => $request->net_depth,
                'net_mesh_size' => $request->net_mesh,
                'trap_length' => $request->trap_length,
                'trap_height' => $request->trap_height,
                'trap_width' => $request->trap_width,
                'trap_mesh_size' => $request->trap_mesh,
                'nylon' => $request->nylon,
                'hook_size' => $request->hook_size,
                'hook_no' => $request->hook_no,
            ]);

            dd($register);
            if ($register) {
                return redirect()->route('fishing-gear.index')->with('success', 'Registered successfully!!');
            } else {
                return redirect()->route('fishing-gear.index')->with('error', 'Connot process registration');
            }
        }

    }

    public function print($id)
    {
        $gears = GearLicence::where('id', $id)
            ->select(
                'id',
                'owner',
                'address',
                'tax_cert_no',
                'date_issued',
                'place_issued',
                'fishing_gear',
                'specs',
                'net_length',
                'net_depth',
                'net_mesh_size',
                'trap_length',
                'trap_height',
                'trap_width',
                'trap_mesh_size',
                'nylon',
                'hook_size',
                'hook_no',
            )
            ->first();

        return view('admin-agriculture.partials.printable.print-registrations')
            ->with('gear', $gears);
    }

    public function destroy($id)
    {
        $official = GearLicence::destroy($id);

        if ($official) {
            return response()->json(['message' => 'Seaweeds record deleted successfully']);
        } else {
            return response()->json(['message' => 'Unable to delete'], 500);
        }
    }
}
