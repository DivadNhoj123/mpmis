<?php

namespace App\Http\Controllers;

use App\Models\Heading;
use Illuminate\Http\Request;

class HeadingController extends Controller
{
    public function index()
    {
        $headings = Heading::get()->first();
        return view('admin-agriculture.headings')->with('headings', $headings);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'left_img' => 'required|image|mimes:jpg,jpeg,png,bmp',
            'right_img' => 'required|image|mimes:jpg,jpeg,png,bmp'
        ]);

        if ($validated) {

            $now = new \DateTime('NOW');
            $date = $now->format('m-d-Y_H.i.s.u');

            if ($request->hasFile('left_img')) {
                $left_image = $request->file('left_img');
                $image_filename = str_replace(' ', '_', pathinfo($left_image->getClientOriginalName(), PATHINFO_FILENAME));
                $image_extension = $left_image->getClientOriginalExtension();
                $left_img = $image_filename . '-' . $date . '.' . $image_extension;
                $left_img_path = $left_image->storeAs('public/uploads/images', $left_img);
            } else {
                $left_img = 'No Data';
            }

            if ($request->hasFile('right_img')) {
                $right_image = $request->file('right_img');
                $image_filename = str_replace(' ', '_', pathinfo($right_image->getClientOriginalName(), PATHINFO_FILENAME));
                $image_extension = $right_image->getClientOriginalExtension();
                $right_img = $image_filename . '-' . $date . '.' . $image_extension;
                $right_img_path = $right_image->storeAs('public/uploads/images', $right_img);
            } else {
                $right_img = 'No Data';
            }

            $headings = Heading::create([
                'left_img' => $left_img,
                'right_img' => $right_img
            ]);
            if ($headings) {
                return redirect()->route('agriculture-headings.index')
                    ->with('success', 'Headings added successfully!');
            }
        }
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'left_img' => 'nullable|image|mimes:jpg,jpeg,png,bmp',
            'right_img' => 'nullable|image|mimes:jpg,jpeg,png,bmp'
        ]);

        if ($validated) {
            $headings = Heading::findOrFail($id);

            $now = new \DateTime('NOW');
            $date = $now->format('m-d-Y_H.i.s.u');

            if ($request->hasFile('left_img')) {
                $left_image = $request->file('left_img');
                $image_filename = str_replace(' ', '_', pathinfo($left_image->getClientOriginalName(), PATHINFO_FILENAME));
                $image_extension = $left_image->getClientOriginalExtension();
                $left_img = $image_filename . '-' . $date . '.' . $image_extension;
                $left_img_path = $left_image->storeAs('public/uploads/images', $left_img);
            } else {
                $left_img = 'No Data';
            }

            if ($request->hasFile('right_img')) {
                $right_image = $request->file('right_img');
                $image_filename = str_replace(' ', '_', pathinfo($right_image->getClientOriginalName(), PATHINFO_FILENAME));
                $image_extension = $right_image->getClientOriginalExtension();
                $right_img = $image_filename . '-' . $date . '.' . $image_extension;
                $right_img_path = $right_image->storeAs('public/uploads/images', $right_img);
            } else {
                $right_img = 'No Data';
            }

            $headings->update([
                'left_img' => $left_img,
                'right_img' => $right_img
            ]);
            if ($headings) {
                return redirect()->route('agriculture-headings.index')
                    ->with('success', 'Headings added successfully!');
            }
        }
    }
}
