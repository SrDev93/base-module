<?php

namespace Modules\Base\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Modules\Base\Entities\Feature;
use Modules\Base\Entities\Setting;

class BaseController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $setting = Setting::firstOrFail();

        $features = Feature::all();

        return view('base::setting.index', compact('setting', 'features'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('base::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('base::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('base::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Setting $setting)
    {
        try {

            $setting->site_name = $request->site_name;
            $setting->title = $request->title;
            $setting->meta_keywords = $request->meta_keywords;
            $setting->meta_description = $request->meta_description;
            $setting->footer_description = $request->footer_description;
            $setting->phone = $request->phone;
            $setting->phone_2 = $request->phone_2;
            $setting->email = $request->email;
            $setting->email_2 = $request->email_2;
            $setting->address = $request->address;
            $setting->lat = $request->lat;
            $setting->lng = $request->lng;
            $setting->rules = $request->rules;

            if (isset($request->logo)) {
                if ($setting->logo) {
                    File::delete($setting->logo);
                }

                $setting->logo = file_store($request->logo, 'assets/uploads/photos/setting_logo/', 'photo_');
            }

            if (isset($request->fav_icon)) {
                if ($setting->fav_icon) {
                    File::delete($setting->fav_icon);
                }

                $setting->fav_icon = file_store($request->fav_icon, 'assets/uploads/photos/setting_icon/', 'photo_');
            }

            if (isset($request->contact_banner)) {
                if ($setting->contact_banner) {
                    File::delete($setting->contact_banner);
                }

                $setting->contact_banner = file_store($request->contact_banner, 'assets/uploads/photos/contact_banner/', 'photo_');
            }
            if (isset($request->newsletter_banner)) {
                if ($setting->newsletter_banner) {
                    File::delete($setting->newsletter_banner);
                }

                $setting->newsletter_banner = file_store($request->newsletter_banner, 'assets/uploads/photos/newsletter_banner/', 'photo_');
            }


            $setting->save();

            $features = Feature::all();
            foreach ($features as $key => $feature){
                if (isset($request->feature_title[$key])){
                    $feature->title = $request->feature_title[$key];
                }
                if (isset($request->feature_text[$key])){
                    $feature->text = $request->feature_text[$key];
                }
                if (isset($request->feature_icon[$key])){
                    if ($feature->icon){
                        File::delete($feature->icon);
                    }
                    $feature->icon = file_store($request->feature_icon[$key], 'assets/uploads/photos/features/', 'photo_');
                }
                $feature->save();
            }

            return redirect()->back()->with('flash_message', 'با موفقیت بروزرسانی شد');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('err_message', 'خطایی رخ داده است، لطفا مجددا تلاش نمایید');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
