@extends('layouts.app')

@section('contents')
<br>
 <div class="container">
    @if ($errors->any())
        <div class="alert alert-secondary" role="alert">
            <div class="alert-icon">
                <i class="flaticon-warning "></i>
            </div>
            <div class="alert-text">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div><br />
    @endif
 <div class="row">
 <form class="col s12" action="{{ route('socials.update', $data->id )}}" method="POST">
    @csrf 
    @method("PUT")
      <div class="row">
        <div class="input-field col s6">
        <input placeholder="Placeholder" id="first_name" type="text" name="title" value="{{ $data->title }}" class="validate">
          <label for="first_name">Title </label>
        </div>
       
        <div class="input-field col s6">
          <input placeholder="Placeholder" id="first_name" name="ttile_bn" value="{{ $data->title_bn }}" type="text" class="validate">
          <label for="first_name">Title Bangla </label>
        </div>
       
        <div class="input-field col s6">
          <input id="last_name" type="text" name="links" value="{{ $data->links }}" class="validate">
          <label for="last_name">Links  </label>
        </div>
    </div>
            <div class="input-field col s6">
             <button type="submit" class="waves-effect waves-light btn"><i class="material-icons right">cloud</i>button</button>
            </div>


    </form>
  </div>
 </div>
@endsection