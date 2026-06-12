@extends('layout.master')
@section('title')
Application Settings || General Setting
@endsection
@section('main_content')

    <!-- Page content area start -->

        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumb__content">
                            <div class="breadcrumb__content__left">
                                <div class="breadcrumb__title">
                                    <h2>{{ __('Application Settings') }}</h2>
                                </div>
                            </div>
                            <div class="breadcrumb__content__right">
                                <nav aria-label="breadcrumb">
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{url('admin\dashboard')}}">{{__('Dashboard')}}</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{ __(@$title) }}</li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card col-lg-3 col-md-4">
                        @include('admin.application_settings.sidebar')
                    </div>
                    <div class="col-lg-9 col-md-8">
                        <div class="card">
                            <div class="card-header"><h2>{{ __(@$title) }}</h2></div>
                            <div class="card-body">
                                <form action="{{route('settings.general_setting.cms.update')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row input__group mb-25">
                                        <label class="col-lg-3">{{ __('App Name') }} <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="app_name" value="{{ $settings['app_name'] ?? '' }}" class="form-control" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row input__group mb-25">
                                        <label class="col-lg-3">{{ __('App Email') }} <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="app_email" value="{{ $settings['app_email'] ?? '' }}" class="form-control" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row input__group mb-25">
                                        <label class="col-lg-3">{{ __('App Contact Number') }} <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="app_contact_number" value="{{ $settings['app_contact_number'] ?? '' }}" class="form-control" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row input__group mb-25">
                                        <label class="col-lg-3">{{ __('App Location') }} <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="app_location" value="{{ $settings['app_location'] ?? '' }}" class="form-control" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row input__group mb-25">
                                        <label class="col-lg-3">{{ __('App Copyright') }} <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="app_copyright" value="{{ $settings['app_copyright'] ?? '' }}" class="form-control" required>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row input__group mb-25">
                                        <label class="col-lg-3">{{ __('Developed By') }} <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="app_developed" value="{{$settings['app_developed'] ?? ''}}" class="form-control" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row input__group mb-25">
                                        <label for="app_date_format" class="col-lg-3">{{ __('Date Format') }} <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <select name="app_date_format" class="form-control">
                                                <option value="m/d/Y" {{ ($settings['app_date_format'] ?? '') == 'm/d/Y' ? 'selected' : '' }}>
                                                    m/d/Y (eg. {{ \Carbon\Carbon::now()->format("m/d/Y") }})
                                                </option>
                                                <option value="d/m/Y" {{ ($settings['app_date_format'] ?? '') == 'd/m/Y' ? 'selected' : '' }}>
                                                    d/m/Y (eg. {{ \Carbon\Carbon::now()->format("d/m/Y") }})
                                                </option>
                                                <option value="Y/m/d" {{ ($settings['app_date_format'] ?? '') == 'Y/m/d' ? 'selected' : '' }}>
                                                    Y/m/d (eg. {{ \Carbon\Carbon::now()->format("Y/m/d") }})
                                                </option>
                                                <option value="Y/d/m" {{ ($settings['app_date_format'] ?? '') == 'Y/d/m' ? 'selected' : '' }}>
                                                    Y/d/m (eg. {{ \Carbon\Carbon::now()->format("Y/d/m") }})
                                                </option>
                                                <option value="m-d-Y" {{ ($settings['app_date_format'] ?? '') == 'm-d-Y' ? 'selected' : '' }}>
                                                    m-d-Y (eg. {{ \Carbon\Carbon::now()->format("m-d-Y") }})
                                                </option>
                                                <option value="d-m-Y" {{ ($settings['app_date_format'] ?? '') == 'd-m-Y' ? 'selected' : '' }}>
                                                    d-m-Y (eg. {{ \Carbon\Carbon::now()->format("d-m-Y") }})
                                                </option>
                                                <option value="Y-m-d" {{ ($settings['app_date_format'] ?? '') == 'Y-m-d' ? 'selected' : '' }}>
                                                    Y-m-d (eg. {{ \Carbon\Carbon::now()->format("Y-m-d") }})
                                                </option>
                                                <option value="Y-d-m" {{ ($settings['app_date_format'] ?? '') == 'Y-d-m' ? 'selected' : '' }}>
                                                    Y-d-m (eg. {{ \Carbon\Carbon::now()->format("Y-d-m") }})
                                                </option>
                                                <option value="d M, Y" {{ ($settings['app_date_format'] ?? '') == 'd M, Y' ? 'selected' : '' }}>
                                                    d M, Y (eg. {{ \Carbon\Carbon::now()->format("d M, Y") }})
                                                </option>
                                                <option value="M d, Y" {{ ($settings['app_date_format'] ?? '') == 'M d, Y' ? 'selected' : '' }}>
                                                    M d, Y (eg. {{ \Carbon\Carbon::now()->format("M d, Y") }})
                                                </option>
                                                <option value="Y M, d" {{ ($settings['app_date_format'] ?? '') == 'Y M, d' ? 'selected' : '' }}>
                                                    Y M, d (eg. {{ \Carbon\Carbon::now()->format("Y M, d") }})
                                                </option>
                                                <option value="d F, Y" {{ ($settings['app_date_format'] ?? '') == 'd F, Y' ? 'selected' : '' }}>
                                                    d F, Y (eg. {{ \Carbon\Carbon::now()->format("d F, Y") }})
                                                </option>
                                                <option value="Y F, d" {{ ($settings['app_date_format'] ?? '') == 'Y F, d' ? 'selected' : '' }}>
                                                    Y F, d (eg. {{ \Carbon\Carbon::now()->format("Y F, d") }})
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row input__group mb-25">
                                        <label for="currency_id" class="col-lg-3">{{ __('Default Currency') }} <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <select name="currency_id" class="form-control select2">
                                                <option value="">{{ __('Select Option') }}</option>
                                                @foreach($currencies as $currency)
                                                    <option value="{{ $currency->id }}" {{ $currency->id == (@$current_currency->id ?? null) ? 'selected' : '' }}>
                                                        {{ $currency->symbol }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row input__group mb-25">
                                        <label for="FORCE_HTTPS" class="col-lg-3">{{ __('Force HTTPS') }} <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <select name="FORCE_HTTPS" class="form-control select2">
                                                <option value="true" {{ $settings['force_https'] ?? '' == true ? 'selected' : '' }}>
                                                    {{ __('TRUE') }}
                                                </option>
                                                <option value="false" {{ $settings['force_https'] ?? '' == false ? 'selected' : '' }}>
                                                    {{ __('FALSE') }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row input__group mb-25">
                                        <label for="app_date_format" class="col-lg-3">{{__('Default Language')}} <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <select name="language_id" class="form-control select2">
                                                <option value="">{{ __('Select Option') }}</option>
                                                @foreach($languages as $language)
                                                <option value="{{ $language->id }}" {{$language->id == @$default_language->id ? 'selected' : ''}}>{{ $language->language }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row input__group mb-25">
                                        <label for="app_date_format" class="col-lg-3">{{__('Time Zone')}} <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <select name="TIMEZONE" class="form-control select2">
                                                @foreach(getTimeZone() as $timezone)
                                                <option value="{{ $timezone }}" {{ $timezone == ($settings['timezone'] ?? 'UTC') ? 'selected' : '' }}>{{ $timezone }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row input__group mb-25">
                                        <label class="col-lg-3">{{ __('Platform Charge') }} (%) <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="number" min="0" max="100" name="platform_charge" value="{{ $settings['platform_charge'] ?? '' }}" class="form-control" required>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row input__group mb-25">
                                        <label class="col-lg-3">{{ __('Sell Commission') }} (%) <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="number" min="0" max="100" name="sell_commission" value="{{ $settings['sell_commission'] ?? '' }}" class="form-control" required>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row input__group mb-25">
                                        <label for="allow_preloader" class="col-lg-3">{{__('Allow Preloader')}} <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <select name="allow_preloader" class="form-control">
                                                <option value="">{{ __('Select Option') }}</option>
                                                <option value="1" @if($settings['allow_preloader'] ?? '' == 1) selected @endif>{{ __('Active') }}</option>
                                                <option value="0" @if($settings['allow_preloader'] ?? '' != 1) selected @endif>{{ __('Disable') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row input__group mb-25">
                                        <label class="col-lg-3">{{ __('Preloader') }}</label>
                                        <div class="col-lg-4">
                                            <div class="upload-img-box">
                                                @if($settings['app_preloader'] ?? '')
                                                    <img src="{{ getImageFile($settings['app_preloader']) }}">
                                                @else
                                                    <img src="">
                                                @endif
                                                <input type="file" name="app_preloader" id="app_preloader" accept="image/*" onchange="previewFile(this)">
                                                <div class="upload-img-box-icon">
                                                    <i class="fa fa-camera"></i>
                                                    <p class="m-0">{{__('Preloader')}}</p>
                                                </div>
                                            </div>
                                            @if ($errors->has('app_preloader'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('app_preloader') }}</span>
                                            @endif
                                            <p><span class="text-black">{{ __('Accepted Files') }}:</span> PNG, SVG <br> <span class="text-black">{{ __('Recommend Size') }}:</span> 118 x 40</p>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row input__group mb-25">
                                        <label class="col-lg-3">{{ __('App Logo') }}</label>
                                        <div class="col-lg-4">
                                            <div class="upload-img-box">
                                                @if($settings['app_logo'] ?? '')
                                                    <img src="{{ getImageFile($settings['app_logo']) }}">
                                                @else
                                                    <img src="">
                                                @endif
                                                <input type="file" name="app_logo" id="app_logo" accept="image/*" onchange="previewFile(this)">
                                                <div class="upload-img-box-icon">
                                                    <i class="fa fa-camera"></i>
                                                    <p class="m-0">{{ __('App Logo') }}</p>
                                                </div>
                                            </div>
                                            @if ($errors->has('app_logo'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('app_logo') }}</span>
                                            @endif
                                            <p><span class="text-black">{{ __('Accepted Files') }}:</span> PNG, SVG <br> <span class="text-black">{{ __('Recommend Size') }}:</span> 140 x 40</p>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row input__group mb-25">
                                        <label class="col-lg-3">{{ __('App Black Logo') }}</label>
                                        <div class="col-lg-4">
                                            <div class="upload-img-box">
                                                @if($settings['app_black_logo'] ?? '')
                                                    <img src="{{ getImageFile($settings['app_black_logo']) }}">
                                                @else
                                                    <img src="">
                                                @endif
                                                <input type="file" name="app_black_logo" id="app_black_logo" accept="image/*" onchange="previewFile(this)">
                                                <div class="upload-img-box-icon">
                                                    <i class="fa fa-camera"></i>
                                                    <p class="m-0">{{ __('App Black Logo') }}</p>
                                                </div>
                                            </div>
                                            @if ($errors->has('app_black_logo'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('app_black_logo') }}</span>
                                            @endif
                                            <p><span class="text-black">{{ __('Accepted Files') }}:</span> PNG, SVG <br> <span class="text-black">{{ __('Recommend Size') }}:</span> 140 x 40</p>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row input__group mb-25">
                                        <label class="col-lg-3">{{ __('App Fav Icon') }}</label>
                                        <div class="col-lg-4">
                                            <div class="upload-img-box">
                                                @if($settings['app_fav_icon'] ?? '')
                                                    <img src="{{ getImageFile($settings['app_fav_icon']) }}">
                                                @else
                                                    <img src="{{ asset('uploads/default/no-image-found.png') }}">
                                                @endif
                                                <input type="file" name="app_fav_icon" id="app_fav_icon" accept="image/*" onchange="previewFile(this)">
                                                <div class="upload-img-box-icon">
                                                    <i class="fa fa-camera"></i>
                                                    <p class="m-0">{{ __('App Fav Icon') }}</p>
                                                </div>
                                            </div>
                                            @if ($errors->has('app_fav_icon'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('app_fav_icon') }}</span>
                                            @endif
                                            <p><span class="text-black">{{ __('Accepted Files') }}:</span> PNG, SVG <br> <span class="text-black">{{ __('Recommend Size') }}:</span> 16 x 16</p>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row input__group mb-25">
                                        <label class="col-lg-3">{{ __('App Footer Payment Banner') }}</label>
                                        <div class="col-lg-4">
                                            <div class="upload-img-box">
                                                @if($settings['app_footer_payment_image'] ?? '')
                                                    <img src="{{ getImageFile($settings['app_footer_payment_image']) }}">
                                                @else
                                                    <img src="{{ asset('uploads/default/no-image-found.png') }}">
                                                @endif
                                                <input type="file" name="app_footer_payment_image" id="app_footer_payment_image" accept="image/*" onchange="previewFile(this)">
                                                <div class="upload-img-box-icon">
                                                    <i class="fa fa-camera"></i>
                                                    <p class="m-0">{{ __('App Footer Payment Banner') }}</p>
                                                </div>
                                            </div>
                                            @if ($errors->has('app_footer_payment_image'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('app_footer_payment_image') }}</span>
                                            @endif
                                            <p><span class="text-black">{{ __('Accepted Files') }}:</span> PNG, SVG <br> <span class="text-black">{{ __('Recommend Size') }}:</span> 780 x 80</p>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row input__group mb-25">
                                        <label class="col-lg-3">{{ __('Forgot Title') }} <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="forgot_title" value="{{ $settings['forgot_title'] ?? '' }}" class="form-control">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row input__group mb-25">
                                        <label class="col-lg-3">{{ __('Forgot Subtitle') }} <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="forgot_subtitle" value="{{ $settings['forgot_subtitle'] ?? '' }}" class="form-control">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row input__group mb-25">
                                        <label class="col-lg-3">{{ __('Forgot Button Name') }} <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="forgot_btn_name" value="{{ $settings['forgot_btn_name'] ?? '' }}" class="form-control">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row input__group mb-25">
                                        <label class="col-lg-3">{{ __('Footer Quote') }} <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <textarea class="form-control" name="footer_quote" rows="5">{{ $settings['footer_quote'] ?? '' }}</textarea>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="item-top mb-30"><h2>{{ __('Social Media Profile Link') }}</h2></div>
                                    <div class="row input__group mb-25">
                                        <label class="col-lg-3">{{ __('Facebook URL') }} <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="facebook_url" value="{{ $settings['facebook_url'] ?? '' }}" class="form-control">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row input__group mb-25">
                                        <label class="col-lg-3">{{ __('Twitter URL') }} <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="twitter_url" value="{{ $settings['twitter_url'] ?? '' }}" class="form-control">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row input__group mb-25">
                                        <label class="col-lg-3">{{ __('LinkedIn URL') }} <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="linkedin_url" value="{{ $settings['linkedin_url'] ?? '' }}" class="form-control">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row input__group mb-25">
                                        <label class="col-lg-3">{{ __('YouTube URL') }} <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="youtube_url" value="{{ $settings['youtube_url'] ?? '' }}" class="form-control">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row input__group mb-25">
                                        <label class="col-lg-3">{{ __('Instagram URL') }} <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="instagram_url" value="{{ $settings['instagram_url'] ?? '' }}" class="form-control">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row input__group mb-25">
                                        <label class="col-lg-3">{{ __('Tiktok URL') }} <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="tiktok_url" value="{{ $settings['tiktok_url'] ?? '' }}" class="form-control">
                                        </div>
                                    </div>

                                    <br>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="input__group general-settings-btn">
                                                <button type="submit" class="btn btn-primary btn-sm float-right">{{__('Update')}}</button>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    <!-- Page content area end -->
@endsection


