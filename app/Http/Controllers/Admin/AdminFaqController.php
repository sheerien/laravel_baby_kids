<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Admin\EditFaqRequest;
use App\Http\Requests\Admin\CreateFaqRequest;
use App\Http\Requests\Admin\DeleteFaqRequest;
use App\Http\Requests\Admin\UpdateFaqRequest;

class AdminFaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::get();
        return view('admin.faq.faqs', compact('faqs'));
    }

    public function create()
    {
        return view('Admin.faq.create');
    }

    /**
     * @param CreateFaqRequest $request
     * 1- store data
     * 2- fire sweet alert
     * 3- return view or redirect
     * @return void
     */
    public function store(CreateFaqRequest $request)
    {

        //store
        Faq::create([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);
        //fire sweet alert.
        Alert::success('Success', 'Faq has been created');

        //redirect
        return redirect()->back();

    }
    public function edit( $faqId)
    {
        $faq =Faq::find($faqId);
        return view('Admin.faq.edit', compact('faq'));
    }

    public function update(UpdateFaqRequest $request)
    {
        $faq = Faq::find($request->faq_id);
        $faq->update([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);
        Alert::success('Success', 'Faq has been updated');
        return redirect(route('admin.faq.all'));

    }
    public function destroy(DeleteFaqRequest $request)
    {
        Faq::where('id', $request->faq_id)->delete();
                //fire sweet alert.
                Alert::success('Success', 'Faq has been deleted');

                //redirect
                return redirect()->back();
    }
}
