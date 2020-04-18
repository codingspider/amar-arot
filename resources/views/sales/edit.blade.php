@extends('layouts.app')
@section('contents')
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <br><br>
        <h1 class="header center light-blue-text">আমার বাজার</h1>
        <div class="row center">
            <h5 class="header col s12 light">আপনার পন্য সমূহ</h5>
            <a data-target="add_product" class="waves-effect waves-light btn right light-blue sidenav-trigger"><i
                    class="material-icons left">add_box</i>নতুন পণ্য যোগ করুন</a>
        </div>
    </div>
</div>


<div class="container">
    <div class="section">

        <!--   Icon Section   -->
        <div class="row">
            <form class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="first_name" type="text" value="আম" class="validate">
                        <label for="first_name">পণ্যের নাম</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="last_name" type="text" value="250" class="validate">
                        <label for="last_name">বিক্রয় মুল্য</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="last_nam" type="text" value="50" class="validate">
                        <label for="last_nam">স্টক পরিমাণ</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="last_na" type="text" value="200" class="validate">
                        <label for="last_na">পরিবহণ খরচ</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="last_n" type="text" value="5" class="validate">
                        <label for="last_n">সর্বনিম্ন বিক্রয় পরিমাণ</label>
                    </div>
                    <div class="file-field col s12 input-field">
                        <div class="btn light-blue">
                            <span>ছবি</span>
                            <input type="file">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                    <div class="col s12 center">
                        <button class="btn light-blue" type="submit">সংরক্ষণ করুন</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br><br>
</div>

<div id="add_product" class="side_add_product sidenav">
    <div class="row">
        <form class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    <input id="first_name" type="text" class="validate">
                    <label for="first_name">পণ্যের নাম</label>
                </div>
                <div class="input-field col s12">
                    <input id="last_name" type="text" class="validate">
                    <label for="last_name">বিক্রয় মুল্য</label>
                </div>
                <div class="input-field col s12">
                    <input id="last_nam" type="text" class="validate">
                    <label for="last_nam">স্টক পরিমাণ</label>
                </div>
                <div class="input-field col s12">
                    <input id="last_na" type="text" class="validate">
                    <label for="last_na">পরিবহণ খরচ</label>
                </div>
                <div class="input-field col s12">
                    <input id="last_n" type="text" class="validate">
                    <label for="last_n">সর্বনিম্ন বিক্রয় পরিমাণ</label>
                </div>
                <div class="file-field col s12 input-field">
                    <div class="btn light-blue">
                        <span>ছবি</span>
                        <input type="file">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
                <div class="col s12 center">
                    <button class="btn light-blue" type="submit">সংরক্ষণ করুন</button>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection
