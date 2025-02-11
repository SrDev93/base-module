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
            $setting->register_description = $request->register_description;

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

            if (isset($request->logo_type)) {
                if ($setting->logo_type) {
                    File::delete($setting->logo_type);
                }
                $setting->logo_type = file_store($request->logo_type, 'assets/uploads/photos/setting_logo_type/', 'photo_');
            }
            if (isset($request->logo_loading)) {
                if ($setting->logo_loading) {
                    File::delete($setting->logo_loading);
                }
                $setting->logo_loading = file_store($request->logo_loading, 'assets/uploads/photos/setting_logo_loading/', 'photo_');
            }
            if (isset($request->logo_footer)) {
                if ($setting->logo_footer) {
                    File::delete($setting->logo_footer);
                }
                $setting->logo_footer = file_store($request->logo_footer, 'assets/uploads/photos/setting_logo_footer/', 'photo_');
            }

            $setting->save();
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
