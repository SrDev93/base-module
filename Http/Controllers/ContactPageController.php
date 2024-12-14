<?php

namespace Modules\Base\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Modules\Base\Entities\ContactPage;
use Modules\Base\Entities\Feature;
use Modules\Base\Entities\Setting;

class ContactPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $item = ContactPage::firstOrFail();

        return view('base::ContactPage.index', compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('base::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('base::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('base::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactPage $ContactPage)
    {
        try {

            $ContactPage->phone_1 = $request->phone_1;
            $ContactPage->phone_2 = $request->phone_2;
            $ContactPage->email_1 = $request->email_1;
            $ContactPage->email_2 = $request->email_2;
            $ContactPage->address = $request->address;
            $ContactPage->lat = $request->lat;
            $ContactPage->lng = $request->lng;


            if (isset($request->banner)) {
                if ($ContactPage->banner) {
                    File::delete($ContactPage->banner);
                }

                $ContactPage->banner = file_store($request->banner, 'assets/uploads/photos/banner/', 'photo_');
            }

            $ContactPage->save();

            return redirect()->back()->with('flash_message', 'با موفقیت بروزرسانی شد');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('err_message', 'خطایی رخ داده است، لطفا مجددا تلاش نمایید');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
