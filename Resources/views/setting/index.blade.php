
@extends('layouts.admin')

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">
        <!-- PAGE-HEADER -->
        <div class="page-header">
            <div>
                <h1 class="page-title">تنظیمات</h1>
            </div>
            <div class="ms-auto pageheader-btn">
                <ol class="breadcrumb" dir="ltr">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Settings</li>
                </ol>
            </div>
        </div>
        <!-- PAGE-HEADER END -->

        <!-- ROW -->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">ویرایش تنظیمات</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('setting.update', $setting->id) }}" method="post" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                            <div class="col-md-6">
                                <label for="site_name" class="form-label">نام سایت</label>
                                <input type="text" name="site_name" class="form-control" id="site_name" required value="{{ $setting->site_name }}">
                                <div class="invalid-feedback">لطفا نام سایت را وارد کنید</div>
                            </div>
                            <div class="col-md-6">
                                <label for="title" class="form-label">عنوان سایت</label>
                                <input type="text" name="title" class="form-control" id="title" required value="{{ $setting->title }}">
                                <div class="invalid-feedback">لطفا عنوان سایت را وارد کنید</div>
                            </div>
                            <div class="col-md-5">
                                <label for="logo" class="form-label">لوگو</label>
                                <input type="file" name="logo" class="form-control" aria-label="لوگو" @if(!$setting->logo) required @endif id="logo" accept="image/*">
                                <div class="invalid-feedback">لطفا لوگو را بارگزاری کنید</div>
                            </div>
                            <div class="col-md-1">
                                @if($setting->logo)
                                    <img src="{{ url($setting->logo) }}" class="w-100">
                                @endif
                            </div>
                            <div class="col-md-5">
                                <label for="fav_icon" class="form-label">آیکن سایت</label>
                                <input type="file" name="fav_icon" class="form-control" aria-label="آیکن" id="fav_icon" accept="image/*">
                                <div class="invalid-feedback">لطفا آیکن سایت بارگزاری شود</div>
                            </div>
                            <div class="col-md-1">
                                @if($setting->fav_icon)
                                    <img src="{{ url($setting->fav_icon) }}">
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="meta_keywords" class="form-label">کلمات کلیدی</label>
                                <input type="text" name="meta_keywords" data-role="tagsinput" id="meta_keywords" value="{{ $setting->meta_keywords }}" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="meta_description" class="form-label">توضیحات سئو</label>
                                <input type="text" name="meta_description" class="form-control" id="meta_description" value="{{ $setting->meta_description }}">
                            </div>
                            <div class="col-md-12">
                                <label for="footer_description" class="form-label">توضیحات فوتر</label>
                                <input type="text" name="footer_description" class="form-control" id="footer_description" value="{{ $setting->footer_description }}">
                            </div>

                            <div class="col-md-6">
                                <label for="phone" class="form-label">شماره تماس</label>
                                <input type="text" name="phone" class="form-control" id="phone" value="{{ $setting->phone }}">
                            </div>
                            <div class="col-md-6">
                                <label for="phone_2" class="form-label">شماره تماس 2</label>
                                <input type="text" name="phone_2" class="form-control" id="phone_2" value="{{ $setting->phone_2 }}">
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label">ایمیل</label>
                                <input type="text" name="email" class="form-control" id="email" value="{{ $setting->email }}">
                            </div>
                            <div class="col-md-6">
                                <label for="email_2" class="form-label">ایمیل 2</label>
                                <input type="text" name="email_2" class="form-control" id="email_2" value="{{ $setting->email_2 }}">
                            </div>

                            <div class="col-md-12">
                                <label for="address" class="form-label">آدرس</label>
                                <input type="text" name="address" class="form-control" id="address" value="{{ $setting->address }}">
                            </div>
                            <div class="col-md-6">
                                <label for="lat" class="form-label">lat</label>
                                <input type="text" name="lat" class="form-control" id="lat" value="{{ $setting->lat }}">
                            </div>
                            <div class="col-md-6">
                                <label for="lng" class="form-label">lng</label>
                                <input type="text" name="lng" class="form-control" id="lng" value="{{ $setting->lng }}">
                            </div>

                            <div class="col-md-5">
                                <label for="contact_banner" class="form-label">بنر صفحه تماس با ما</label>
                                <input type="file" name="contact_banner" class="form-control" aria-label="بنر" id="contact_banner" @if(!$setting->contact_banner) required @endif accept="image/*">
                                <div class="invalid-feedback">لطفا بنر صفحه تماس با ما بارگزاری شود</div>
                            </div>
                            <div class="col-md-1">
                                @if($setting->contact_banner)
                                    <img src="{{ url($setting->contact_banner) }}" style="max-width: 100%;">
                                @endif
                            </div>
                            <div class="col-md-5">
                                <label for="newsletter_banner" class="form-label">بنر بخش خبرنامه</label>
                                <input type="file" name="newsletter_banner" class="form-control" aria-label="بنر" id="newsletter_banner" @if(!$setting->newsletter_banner) required @endif accept="image/*">
                                <div class="invalid-feedback">لطفا بنر بخش خبرنامه بارگزاری شود</div>
                            </div>
                            <div class="col-md-1">
                                @if($setting->newsletter_banner)
                                    <img src="{{ url($setting->newsletter_banner) }}" style="max-width: 100%;">
                                @endif
                            </div>

                            <div class="col-md-12">
                                <label for="editor1" class="form-label">متن قوانین و مقررات</label>
                                <textarea id="editor1" name="rules" class="cke_rtl" required>{{ $setting->rules }}</textarea>
                                <div class="invalid-feedback">لطفا متن را وارد کنید</div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">ارسال فرم</button>
                                @method('PATCH')
                                @csrf
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ROW CLOSED -->
    </div>

    @push('scripts')
        @include('ckfinder::setup')
        <script>
            var editor = CKEDITOR.replace('editor1', {
                // Define the toolbar groups as it is a more accessible solution.
                toolbarGroups: [
                    {
                        "name": "basicstyles",
                        "groups": ["basicstyles"]
                    },
                    {
                        "name": "links",
                        "groups": ["links"]
                    },
                    {
                        "name": "paragraph",
                        "groups": ["list", "blocks"]
                    },
                    {
                        "name": "document",
                        "groups": ["mode"]
                    },
                    {
                        "name": "insert",
                        "groups": ["insert"]
                    },
                    {
                        "name": "styles",
                        "groups": ["styles"]
                    },
                    {
                        "name": "about",
                        "groups": ["about"]
                    },
                    {   "name": 'paragraph',
                        "groups": ['list', 'blocks', 'align', 'bidi']
                    }
                ],
                // Remove the redundant buttons from toolbar groups defined above.
                removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar,PasteFromWord'
            });
            CKFinder.setupCKEditor( editor );
        </script>
    @endpush
@endsection
