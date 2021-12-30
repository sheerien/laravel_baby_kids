<?php

namespace App\Http\Controllers\Admin;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Traits\ImagesTrait;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Admin\CreateActivityRequest;
use App\Http\Requests\Admin\UpdateActivityRequest;
use App\Http\Requests\Admin\DeleteِActivityRequest;

class AdminActivityController extends Controller
{
    use ImagesTrait;
    public function index()
    {
        $activities = Activity::get();
        return view('Admin.activity.activities', compact('activities'));
    }

    public function create()
    {
        return view('Admin.activity.create');
    }

    public function store(CreateActivityRequest $request)
    {
        // dd($request->icon);
        $fileName = $this->uploadImage($request->icon, '_activity', 'activity');
        Activity::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'icon' => $fileName
        ]);

        Alert::success('Success', 'activity has been created successfully');
        return redirect()->back();
    }

    public function destroy(DeleteِActivityRequest $request)
    {
        $activity = Activity::find($request->activity_id);
        $icon = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $activity->icon);
        unlink(public_path($icon));
        $activity->delete();
        Alert::success('success', 'activity has been deleted');
        return redirect()->back();
    }

    public function edit($activityId)
    {
        $activity = Activity::find($activityId);
        return view('Admin.activity.edit', compact('activity'));
    }

    public function update(UpdateActivityRequest $request)
    {
        $activity = Activity::find($request->activity_id);
        $icon = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $activity->icon);
        $fileName = $this->uploadImage($request->icon, '_activity', 'activity',$icon);
        $activity->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'icon' => $fileName,
        ]);
        Alert::success('Success', 'Activity has been updated');
        return redirect(route('admin.activity.all'));
    }

}