@extends('layouts.auth')
@section('auth')
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <br><br>
        <h1 class="header center light-blue-text">আমার বাজার</h1>
        <div class="row center">
            <h5 class="header col s12 light">একসাথে সবকিছু</h5>
        </div>
        <div class="row center">
            <a href="{{url('login')}}" id="download-button" class="btn-large waves-effect waves-light light-blue">লগইন</a>
        </div>
        <br><br>

    </div>
</div>
<div class="container">
    <div class="section">
        <!--   Icon Section   -->
        <div class="row">
            <div class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center light-blue-text"><i class="material-icons">flash_on</i></h2>
                    <h5 class="center">দ্রুত ডেলিভারি</h5>

                    <p class="light center">সবার আগে সবচেয়ে কাছে।</p>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center light-blue-text"><i class="material-icons">group</i></h2>
                    <h5 class="center">সহজ ইন্টারফেস</h5>

                    <p class="light center">সবকিছু করতে পারবেন সহজেই</p>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center light-blue-text"><i class="material-icons">settings</i></h2>
                    <h5 class="center">আপনার নিয়ন্ত্রনে</h5>

                    <p class="light center">আপনার তথ্য আপনার নিয়ন্ত্রনে</p>
                </div>
            </div>
        </div>

    </div>
    <br><br>
</div>
@endsection
