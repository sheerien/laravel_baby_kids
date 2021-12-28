<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Traits\ImagesTrait;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Admin\AddSliderRequest;

class AdminSliderController extends Controller
{
    use ImagesTrait;

    public function create()
    {
        return view('Admin.slider.create');
    }

    public function store(AddSliderRequest $request)
    {
        // $file->extension();
        // $file = $request->image;
        // $ext = $file->getClientOriginalExtension();
        // $fileName = time() . '_slider.' . $ext;
        // $file->move(public_path('images/slider'),$fileName);
        $fileName = $this->uploadImage($request->image, '_slider', 'slider');
        Slider::create([
            'image' => $fileName,
        ]);

        Alert::success('Success', 'Image has been uploaded successfully');
        return redirect()->back();
    }
}