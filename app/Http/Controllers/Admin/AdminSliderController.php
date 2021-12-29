<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Traits\ImagesTrait;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Admin\AddSliderRequest;
use App\Http\Requests\Admin\DeleteSliderRequest;

class AdminSliderController extends Controller
{
    use ImagesTrait;

    public function index()
    {
        $sliders = Slider::get();
        return view('Admin.slider.sliders', compact('sliders'));
    }
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

    public function destroy(DeleteSliderRequest $request)
    {
        $slider = Slider::find($request->slider_id);
        $img = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $slider->image);
        unlink(public_path($img));
        $slider->delete();
        Alert::success('success', 'Image has been deleted');
        return redirect()->back();
    }

    public function edit($sliderId)
    {
        $slider = Slider::find($sliderId);
        return view('Admin.slider.edit', compact('slider'));
    }

    public function update(Request $request)
    {
        $slider = Slider::find($request->slider_id);
        $img = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $slider->image);
        $fileName = $this->uploadImage($request->image, '_slider', 'slider',$img);
        $slider->update([
            'image' => $fileName,
        ]);
        Alert::success('Success', 'Faq has been updated');
        return redirect(route('admin.slider.all'));
    }
}