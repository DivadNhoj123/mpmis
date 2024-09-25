<?php

namespace App\Http\Controllers;

use App\Models\Official;
use Illuminate\Http\Request;

class OfficialController extends Controller
{
    public function index()
    {
        $officials = Official::whereIn('position', [1, 2, 3, 4])->get();
        return view('admin-tupad.official')->with('officials', $officials);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,bmp',
            'name' => 'required',
            'middle_name' => 'nullable',
            'surname' => 'required',
            'suffix' => 'nullable',
            'position' => 'required',
            'barangay' => 'required',
        ]);

        if ($validated) {

            $now = new \DateTime('NOW');
            $date = $now->format('m-d-Y_H.i.s.u');
            if ($request->hasFile('image')) {
                $image = $request->file('image')->getClientOriginalName();
                $image_filename = str_replace(' ', '_', pathinfo($image, PATHINFO_FILENAME));
                $image_extension = $request->file('image')->getClientOriginalExtension();
                $image = $image_filename . '-' . $date . '.' . $image_extension;
                $path_image = $request->file('image')->storeAs('public/uploads/image', $image);
            } else {
                $image = '1.jpg';
            }

            $official = Official::create(
                [
                    'image' => $image,
                    'name' => $request->name,
                    'middle_name' => $request->middle_name,
                    'surname' => $request->surname,
                    'suffix' => $request->suffix,
                    'position' => $request->position,
                    'barangay' => $request->barangay
                ]
            );

            if ($official) {
                return redirect()->route('barangay-officials.index')
                ->with('success', 'Official information added successfully!');
            }
        }
    }

    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,bmp',
            'name' => 'required',
            'middle_name' => 'nullable',
            'surname' => 'required',
            'suffix' => 'nullable',
            'position' => 'required',
            'barangay' => 'required',
        ]);

        if ($validated) {
            $official = Official::findOrFail($id);
            $recent_image = $request->input('recent_image');

            $now = new \DateTime('NOW');
            $date = $now->format('m-d-Y_H.i.s.u');
            if ($request->hasFile('image')) {
                $image = $request->file('image')->getClientOriginalName();
                $image_filename = str_replace(' ', '_', pathinfo($image, PATHINFO_FILENAME));
                $image_extension = $request->file('image')->getClientOriginalExtension();
                $image = $image_filename . '-' . $date . '.' . $image_extension;
                $path_image = $request->file('image')->storeAs('public/uploads/image', $image);
            } else {
                $image = $recent_image ?? 'No Data';
            }

            $official->update([
                'image' => $image,
                'name' => $request->name,
                'middle_name' => $request->middle_name,
                'surname' => $request->surname,
                'suffix' => $request->suffix,
                'position' => $request->position,
                'barangay' => $request->barangay
            ]);
            if ($official) {
                return redirect()->route('barangay-officials.index')
                ->with('success', 'Official information updated successfully!');
            }
        }
    }

    public function destroy($id)
    {
        $seaweeds = Official::destroy($id);

        if ($seaweeds) {
            return response()->json(['message' => 'Seaweeds record deleted successfully']);
        } else {
            return response()->json(['message' => 'Unable to delete'], 500);
        }
    }
}
