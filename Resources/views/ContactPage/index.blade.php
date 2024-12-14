
@extends('layouts.admin')

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">
        <!-- PAGE-HEADER -->
        <div class="page-header">
            <div>
                <h1 class="page-title">تماس با ما</h1>
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
                        <h3 class="card-title">ویرایش صفحه تماس با ما</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('ContactPage.update', $item->id) }}" method="post" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>

                            <div class="col-md-11">
                                <label for="banner" class="form-label">بنر</label>
                                <input type="file" name="banner" class="form-control" aria-label="بنر" id="banner" @if(!$item->banner) required @endif accept="image/*">
                                <div class="invalid-feedback">لطفا بنر بارگزاری شود</div>
                            </div>
                            <div class="col-md-1">
                                @if($item->banner)
                                    <img src="{{ url($item->banner) }}" style="max-width: 100%;">
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label for="phone_1" class="form-label">شماره تماس</label>
                                <input type="text" name="phone_1" class="form-control" id="phone_1" value="{{ $item->phone_1 }}">
                            </div>
                            <div class="col-md-6">
                                <label for="phone_2" class="form-label">شماره تماس 2</label>
                                <input type="text" name="phone_2" class="form-control" id="phone_2" value="{{ $item->phone_2 }}">
                            </div>

                            <div class="col-md-6">
                                <label for="email_1" class="form-label">ایمیل</label>
                                <input type="email" name="email_1" class="form-control" id="email_1" value="{{ $item->email_1 }}">
                            </div>
                            <div class="col-md-6">
                                <label for="email_2" class="form-label">ایمیل 2</label>
                                <input type="email" name="email_2" class="form-control" id="email_2" value="{{ $item->email_2 }}">
                            </div>

                            <div class="col-md-12">
                                <label for="address" class="form-label">آدرس</label>
                                <input type="text" name="address" class="form-control" id="address" value="{{ $item->address }}">
                            </div>
                            <div class="col-md-6">
                                <label for="lat" class="form-label">lat</label>
                                <input type="text" name="lat" class="form-control" id="lat" value="{{ $item->lat }}">
                            </div>
                            <div class="col-md-6">
                                <label for="lng" class="form-label">lng</label>
                                <input type="text" name="lng" class="form-control" id="lng" value="{{ $item->lng }}">
                            </div>

                            <div class="row-divider"></div>

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
        {{--        @include('ckfinder::setup')--}}
        {{--        <script>--}}
        {{--            var editor = CKEDITOR.replace('editor1', {--}}
        {{--                // Define the toolbar groups as it is a more accessible solution.--}}
        {{--                toolbarGroups: [--}}
        {{--                    {--}}
        {{--                        "name": "basicstyles",--}}
        {{--                        "groups": ["basicstyles"]--}}
        {{--                    },--}}
        {{--                    {--}}
        {{--                        "name": "links",--}}
        {{--                        "groups": ["links"]--}}
        {{--                    },--}}
        {{--                    {--}}
        {{--                        "name": "paragraph",--}}
        {{--                        "groups": ["list", "blocks"]--}}
        {{--                    },--}}
        {{--                    {--}}
        {{--                        "name": "document",--}}
        {{--                        "groups": ["mode"]--}}
        {{--                    },--}}
        {{--                    {--}}
        {{--                        "name": "insert",--}}
        {{--                        "groups": ["insert"]--}}
        {{--                    },--}}
        {{--                    {--}}
        {{--                        "name": "styles",--}}
        {{--                        "groups": ["styles"]--}}
        {{--                    },--}}
        {{--                    {--}}
        {{--                        "name": "about",--}}
        {{--                        "groups": ["about"]--}}
        {{--                    },--}}
        {{--                    {   "name": 'paragraph',--}}
        {{--                        "groups": ['list', 'blocks', 'align', 'bidi']--}}
        {{--                    }--}}
        {{--                ],--}}
        {{--                // Remove the redundant buttons from toolbar groups defined above.--}}
        {{--                removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar,PasteFromWord'--}}
        {{--            });--}}
        {{--            CKFinder.setupCKEditor( editor );--}}
        {{--        </script>--}}
    @endpush
@endsection
