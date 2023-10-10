@extends('admin.layouts.app')
@section('page_title', __('Edit :x', ['x' => __('Brands')]))
@section('css')
    {{-- LightBox  --}}
    <link rel="stylesheet" href="{{ asset('public/dist/plugins/lightbox/css/lightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Modules/MediaManager/Resources/assets/css/media-manager.min.css') }}">
@endsection
@section('content')
    <!-- Main content -->
    <div class="col-md-12" id="brand-edit-container">
        <div class="card">
            <div class="card-header">
                <h5> <a href="{{ route('tags.index') }}">{{ __('Tags') }} </a>
                    >>{{ __('Edit :x', ['x' => __('Tag')]) }}</h5>
            </div>
            <div class="card-block table-border-style">
                <div class="row form-tabs">
                    <form action="{{ route('tags.update', $tags->id) }}" method="post" id="brandAdd"
                        class="form-horizontal col-md-12" enctype="multipart/form-data">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token" id="token">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active text-uppercase font-bold" id="home-tab" data-bs-toggle="tab" href="#home"
                                    role="tab" aria-controls="home" aria-selected="true">{{ __(':x Information', ['x' => __('Brand')]) }}</a>
                            </li>
                        </ul>
                        <div class="col-md-12 tab-content form-edit-con mt-5" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-3 col-xl-2 mt-2">
                                        <div class="form-group">
                                            <div class="col-md-9">
                                                <div class="fixSize user-img-con">
                                                    <a class="cursor_pointer" href='{{ $tags->fileUrl() }}'
                                                        data-lightbox="image-1">
                                                        <img class="profile-user-img img-responsive fixSize rounded-circle"
                                                            src='{{ $tags->fileUrl() }}' alt="{{ __('Image') }}"
                                                            class="img-thumbnail img-fluid attachment-styles">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8 form-container">
                                        <div class="form-group row">
                                            <label for="name" class="control-label require pe-3">{{ __('Arabic Name') }}
                                            </label>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="{{ __('Name in Arabic ') }}"
                                                    class="form-control form-width inputFieldDesign" id="name"
                                                    name="name_ar" value="{{ $tags->getTranslation('name', 'ar', 'en')}}" required oninv
                                                    alid="this.setCustomValidity('{{ __('This field is required.') }}')">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="name" class="control-label require pe-3">{{ __('Name') }}
                                            </label>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="{{ __('Name ') }}"
                                                    class="form-control form-width inputFieldDesign" id="name"
                                                    name="name_en" value="{{ $tags->getTranslation('name', 'en', 'en')}}" required oninv
                                                    alid="this.setCustomValidity('{{ __('This field is required.') }}')">
                                            </div>
                                        </div>

                                     

                                        <div class="form-group row">
                                            <label for="Status"
                                                class="col-md-3 control-label">{{ __('Status') }}</label>
                                            <div class="col-md-12">
                                                <select class="form-control select2-hide-search inputFieldDesign"
                                                    name="status" id="status">
                                                    <option value="Active"
                                                        {{ $tags->status == 'Active' ? 'selected' : '' }}>
                                                        {{ __('Active') }}</option>
                                                    <option value="Inactive"
                                                        {{ $tags->status == 'Inactive' ? 'selected' : '' }}>
                                                        {{ __('Inactive') }}</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 control-label">{{ __('Upload Image') }}</label>
                                            <div class="col-sm-12">
                                                <div class="custom-file" data-val="single" id="image-status">
                                                    <input class="form-control up-images attachment d-none inputFieldDesign"
                                                        name="attachment" id="validatedCustomFile" accept="image/*">
                                                    <label class="custom-file-label overflow_hidden position-relative d-flex align-items-center"
                                                        for="validatedCustomFile">{{ __('Upload image') }}</label>
                                                </div>

                                                <div id="img-container">
                                                    <div class="d-flex flex-wrap mt-2">
                                                        @if(!empty($tags->objectFile->file_id))
                                                        <div class="position-relative border boder-1 p-1 ms-2 rounded mt-2">
                                                            <div
                                                                class="position-absolute rounded-circle text-center img-remove-icon">
                                                                <i class="fa fa-times"></i>
                                                            </div>
                                                            <input type="hidden" name="file_id[]" value="{{ optional($tags->objectFile)->file_id }}">
                                                            <img class="upl-img" class="p-1"
                                                                src="{{ $tags->fileUrl() }}" alt="{{ __('Image') }}">
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 control-label"></div>
                                <div class="col-md-9 btn-con">
                                    <a href="{{ route('tags.index') }}"
                                        class="btn custom-btn-cancel all-cancel-btn">{{ __('Cancel') }}</a>
                                    <button class="btn custom-btn-submit" type="submit" id="btnSubmit"><i
                                            class="comment_spinner spinner fa fa-spinner fa-spin custom-btn-small display_none"></i><span
                                            id="spinnerText">{{ __('Update') }}</span></button>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    @include('mediamanager::image.modal_image')

@endsection
@section('js')
    <script src="{{ asset('public/dist/plugins/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('public/dist/js/custom/brand.min.js') }}"></script>
    <script src="{{ asset('public/dist/js/custom/validation.min.js') }}"></script>
@endsection
