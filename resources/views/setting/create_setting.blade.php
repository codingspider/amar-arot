@extends('layouts.app')

@section('contents')
<br>
<div class="container">
    @if($errors->any())
    {!! implode('<br>', $errors->all(':message')) !!}
    @endif
    <div class="row">
        <form class="col s12" action="{{ route('settings.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="input-field col s6">
                    <input id="site_title" name="site_title"
                        value="{{old('site_title')}}{{ isset($var->site_title)? $var->site_title : '' }}" type="text"
                        class="validate">
                    <label for="site_title">{{__('setting.site_title')}}</label>
                </div>
                <div class="input-field col s6">
                    <input id="copyright" name="copyright"
                        value="{{old('copyright')}}{{ isset($var->copyright)? $var->copyright : ''  }}" type="text"
                        class="validate">
                    <label for="copyright">{{__('setting.copyright')}} </label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input id="admin_email" name="admin_email" type="text"
                        value="{{old('admin_email')}}{{ isset($var->admin_email)? $var->admin_email : ''  }}"
                        class="validate">
                    <label for="admin_email">{{__('setting.admin_email')}}</label>
                </div>
                <div class="input-field col s6">
                    <input id="seo_title" name="seo_title" type="text"
                        value="{{old('seo_title')}}{{ isset($var->seo_title)? $var->seo_title : ''  }}"
                        class="validate">
                    <label for="seo_title">{{__('setting.seo_title')}} </label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <textarea id="description" name="description"
                        class="materialize-textarea">{{old('description')}}{{ isset($var->description)? $var->description : ''  }}</textarea>
                    <label for="description">{{__('setting.seo_description')}}</label>
                </div>
                <div class="input-field col s6">
                    <input id="seo_keywords" name="seo_keywords" type="text"
                        value="{{old('seo_keywords')}}{{ isset($var->seo_keywords)? $var->seo_keywords : ''  }}"
                        class="validate">
                    <label for="seo_keywords">{{__('setting.seo_keywords')}} </label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <textarea class="materialize-textarea" id="val-suggestions" name="contact_address"
                        rows="5">{{old('contact_address')}}{{ isset($var->contact_address)? $var->contact_address : ''  }}</textarea>
                    <label for="val-suggestions">{{__('setting.contact_address')}}</label>
                </div>
                <div class="input-field col s6">
                    <input id="contact_email" name="contact_email"
                        value="{{old('contact_email')}}{{ isset($var->contact_email)? $var->contact_email : ''  }}"
                        type="text" class="validate">
                    <label for="contact_email">{{__('setting.contact_email')}} </label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input id="contact_phone" name="contact_phone" type="text"
                        value="{{old('contact_phone')}}{{ isset($var->contact_phone)? $var->contact_phone : ''  }}"
                        class="validate">
                    <label for="contact_phone">{{__('setting.contact_phone')}}</label>
                </div>
                <div class="input-field col s6">
                    <textarea id="about" name="about"
                        class="materialize-textarea">{{old('about')}}{{ isset($var->about)? $var->about : ''  }}</textarea>
                    <label for="about">{{__('setting.about')}} </label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <div class="file-field input-field">
                        <div class="btn">
                            <span>{{__('setting.logo')}}</span>
                            <input type="file" name="images">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" value="{{ isset($var->image)? $var->image : ''  }}">
                        </div>
                    </div>
                </div>
                <div class="col s6">
                    @if(isset($var->image))
                        <img src="{{ asset('images')}}/{{$var->image}}" class="responsive-img" alt="">
                    @endif
                </div>
            </div>
            <div class="row">
                <button class="waves-effect waves-light btn" type="submit"> {{ __('role.save') }} </button>
            </div>


        </form>
    </div>
</div>
@endsection