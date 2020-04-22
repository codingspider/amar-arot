@extends('layouts.app')

@section('contents')
<br>
    <div class="container">
        @if($errors->any())
            {{ implode('', $errors->all(':message')) }}
        @endif
    <div class="row">
        <form class="col s12" action="{{ route('settings.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="row">
            <div class="input-field col s6">
            <input placeholder="Placeholder" id="first_name" name="site_title" value="{{old('site_title')}} {{ isset($var->site_title)? $var->site_title : '' }}" type="text" class="validate">
            <label for="first_name">{{__('setting.site_title')}}</label>
            </div>
            <div class="input-field col s6">
            <input placeholder="Placeholder" id="first_name" name="copyright" value="{{old('copyright')}} {{ isset($var->copyright)? $var->copyright : ''  }}" type="text" class="validate">
            <label for="first_name">{{__('setting.copyright')}} </label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
            <input placeholder="Placeholder" id="first_name" name="admin_email" type="text" value="{{old('admin_email')}} {{ isset($var->admin_email)? $var->admin_email : ''  }}" class="validate">
            <label for="first_name">{{__('setting.admin_email')}}</label>
            </div>
            <div class="input-field col s6">
            <input placeholder="Placeholder" id="first_name" name="seo_title" type="text" value="{{old('seo_title')}} {{ isset($var->seo_title)? $var->seo_title : ''  }}" class="validate">
            <label for="first_name">{{__('setting.seo_title')}} </label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
             <textarea id="textarea1" name="description" class="materialize-textarea">{{old('description')}} {{ isset($var->description)? $var->description : ''  }}</textarea>
            <label for="first_name">{{__('setting.seo_description')}}</label>
            </div>
            <div class="input-field col s6">
            <input placeholder="Placeholder" id="first_name" name="seo_keywords" type="text" value="{{old('seo_keywords')}} {{ isset($var->seo_keywords)? $var->seo_keywords : ''  }}" class="validate">
            <label for="first_name">{{__('setting.seo_keywords')}} </label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
            <textarea class="materialize-textarea" id="val-suggestions"  name="contact_address" rows="5" placeholder="What would you like to see?">{{old('contact_address')}} {{ isset($var->contact_address)? $var->contact_address : ''  }}</textarea>
            <label for="first_name">{{__('setting.contact_address')}}</label>
            </div>
            <div class="input-field col s6">
            <input placeholder="Placeholder" id="first_name" name="contact_email" value="{{old('contact_email')}} {{ isset($var->contact_email)? $var->contact_email : ''  }}" type="text" class="validate">
            <label for="first_name">{{__('setting.contact_email')}} </label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
            <input placeholder="Placeholder" id="first_name" name="contact_phone" type="text" value="{{old('contact_phone')}} {{ isset($var->contact_phone)? $var->contact_phone : ''  }}" class="validate">
            <label for="first_name">{{__('setting.contact_phone')}}</label>
            </div>
            <div class="input-field col s6">
            <textarea id="textarea1" name="about" class="materialize-textarea">{{old('about')}} {{ isset($var->about)? $var->about : ''  }}</textarea>
            <label for="first_name">{{__('setting.about')}} </label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <label for="first_name">{{__('setting.logo')}}</label><br><br>
            <input placeholder="Placeholder" id="first_name" name="images" type="file" >
            </div>
            <div class="input-field col s6">
            <textarea id="textarea1" name="about" class="materialize-textarea">{{old('about')}} {{ isset($var->about)? $var->about : ''  }}</textarea>
            <label for="first_name">{{__('setting.about')}} </label>
            </div>
        </div>
        <div class="row">
            <button class="waves-effect waves-light btn" type="submit"> Submit </button>
        </div>


    </form>
  </div>
    </div>
@endsection