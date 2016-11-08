@extends('backend.layouts.backend-master')


@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-warning text-center">
                                        <i class="ti-server"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p>Users</p>
                                        {{ count($users) }}
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr />
                                <div class="stats">
                                    <i class="ti-reload"></i> Updated now
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-success text-center">
                                        <i class="ti-wallet"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p>Levels</p>
                                        {{ count($levels) }}
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr />
                                <div class="stats">
                                    <i class="ti-calendar"></i> Last day
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-danger text-center">
                                        <i class="ti-pulse"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p>Quizes</p>
                                        {{ count($quizes) }}
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr />
                                <div class="stats">
                                    <i class="ti-timer"></i> In the last hour
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-info text-center">
                                        <i class="ti-twitter-alt"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p>Questions</p>
                                        27000
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr />
                                <div class="stats">
                                    <i class="ti-reload"></i> Updated now
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            @if (count($errors) > 0)
                <div class="col-md-8 col-md-offset-2">
                    @foreach ($errors->all() as $e)
                        <div class="alert alert-danger">
                            <button type="button" aria-hidden="true" class="close">×</button>
                            <span><b> Error - </b> "{{ $e }}"</span>
                        </div>
                        <hr>
                    @endforeach
                </div>
            @endif
            @if (Session::has('message'))
                <div class="col-md-8 col-md-offset-2">
                    <div class="alert alert-success">
                        <button type="button" aria-hidden="true" class="close">×</button>
                        <span><b> Success - </b> "{{ Session::get('message') }}"</span>
                    </div>
                </div>
                <hr>
            @endif
            <div class="row" style="background-color:#fff; padding:20px; box-shadow: 1px 1px 15px #EB5E28;margin-top: 59px;">
                <h2 class="text-center">Front End Featuries</h2>
                <form method="post" action="{{ route('frontend.create') }}">
                    {{ csrf_field() }}
                    {{--
                    ---- `id`, `HomePageHeading`, `Android_Link`, `IOS_Link`,
                    `Featuries_Page_Heading`, `Featuries_Side_Heading`,
                    `Featuries_Small_Heading`, `Featuries_1`, `Featuries_2`, `Featuries_3`, `Featuries_4`,
                    `DETAILS_Page_heading`, `DETAILS_Side_Heading`, `DETAILS_Small_Heading`, `DETAILS_1`, `DETAILS_2`, `DETAILS_3`,
                    // about
                    `AnoutPageHeading`, `About_Pragraph_Heading`, `SERVICE_ITEM_Page_Heading`, `SERVICE_ITEM_Heading`,
                    `SERVICE_ITEM_1`, `SERVICE_ITEM_2`, `SERVICE_ITEM_3`, `SERVICE_ITEM_4`, `About_Slider_img1`,
                    `About_Slider_img2`, `About_Slider_img3`,
                    // manager
                    `Manager_scoap_heading`, `Manager_scoap`, `Manager_img`, `Manager_name`, `created_at`, `updated_at`
                     --}}
                    <div class="col-md-6" style="border-right: 2px solid #EB5E28;">
                        <h3>Home Page</h3>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Download Links</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>Home Page Heading</label>
                                    <input type="text" name="HomePageHeading" class="form-control border-input">
                                </div>
                                <div class="form-group">
                                    <label>Android Link</label>
                                    <input type="text" name="Android_Link" class="form-control border-input">
                                    <p class="help-block">For Example: https://www.google.com</p>
                                </div>
                                <div class="form-group">
                                    <label>IOS Link</label>
                                    <input type="text" name="IOS_Link" class="form-control border-input">
                                    <p class="help-block">For Example: https://www.Appel.com</p>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Featuries</h3>
                            </div>
                            <div class="panel-body">

                                <div class="form-group">
                                    <label>Featuries_Page_Heading</label>
                                    <input type="text" name="Featuries_Page_Heading" class="form-control border-input" id="">
                                </div>
                                <div class="form-group">
                                    <label>Featuries_Side_Heading</label>
                                    <input type="text" name="Featuries_Side_Heading" class="form-control border-input" id="">
                                </div>
                                <div class="form-group">
                                    <label>Featuries_Small_Heading</label>
                                    <input type="text" name="Featuries_Small_Heading" class="form-control border-input" id="">
                                </div>
                                <div class="form-group">
                                    <label>Featuries_1</label>
                                    <input type="text" name="Featuries_1" class="form-control border-input" id="">
                                </div>
                                <div class="form-group">
                                    <label>Featuries_2</label>
                                    <input type="text" name="Featuries_2" class="form-control border-input" id="">
                                </div>
                                <div class="form-group">
                                    <label>Featuries_3</label>
                                    <input type="text" name="Featuries_3" class="form-control border-input" id="">
                                </div>
                                <div class="form-group">
                                    <label>Featuries_4</label>
                                    <input type="text" name="Featuries_4" class="form-control border-input" id="">
                                </div>
                            </div>
                        </div>


                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">DETAILS</h3>
                            </div>
                            <div class="panel-body">

                                <div class="form-group">
                                    <label>DETAILS_Page_heading</label>
                                    <input type="text" name="DETAILS_Page_heading" class="form-control border-input">
                                </div>
                                <div class="form-group">
                                    <label>DETAILS_Side_Heading</label>
                                    <input type="text" name="DETAILS_Side_Heading" class="form-control border-input">
                                </div>
                                <div class="form-group">
                                    <label>DETAILS_Small_Heading</label>
                                    <input type="text" name="DETAILS_Small_Heading" class="form-control border-input">
                                </div>
                                <div class="form-group">
                                    <label>DETAILS_1</label>
                                    <input type="text" name="DETAILS_1" class="form-control border-input">
                                </div>
                                <div class="form-group">
                                    <label>DETAILS_2</label>
                                    <input type="text" name="DETAILS_2" class="form-control border-input">
                                </div>
                                <div class="form-group">
                                    <label>DETAILS_3</label>
                                    <input type="text" name="DETAILS_3" class="form-control border-input">
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="col-md-6">
                        <h3>About Us Page</h3>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Page head</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>AnoutPageHeading</label>
                                    <input type="text" name="AnoutPageHeading" class="form-control border-input" id="">
                                </div>
                                <div class="form-group">
                                    <label>About_Pragraph_Heading</label>
                                    <input type="text" name="About_Pragraph_Heading" class="form-control border-input" id="">
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Survice_item</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>SERVICE_ITEM_Page_Heading</label>
                                    <input type="text" name="SERVICE_ITEM_Page_Heading" class="form-control border-input" id="">
                                </div>
                                <div class="form-group">
                                    <label>SERVICE_ITEM_Heading</label>
                                    <input type="text" name="SERVICE_ITEM_Heading" class="form-control border-input" id="">
                                </div>
                                <div class="form-group">
                                    <label>SERVICE_ITEM_1</label>
                                    <textarea name="SERVICE_ITEM_1" rows="6" class="form-control border-input"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>SERVICE_ITEM_2</label>
                                    <textarea name="SERVICE_ITEM_2" rows="6" class="form-control border-input"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>SERVICE_ITEM_3</label>
                                    <textarea name="SERVICE_ITEM_3" rows="6" class="form-control border-input"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>SERVICE_ITEM_4</label>
                                    <textarea name="SERVICE_ITEM_4" rows="6" class="form-control border-input"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">SliderImages</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>About_Slider_img1</label>
                                    <input type="file" name="About_Slider_img1" class="form-control border-input" id="">
                                </div>
                                <div class="form-group">
                                    <label>About_Slider_img2</label>
                                    <input type="file" name="About_Slider_img2" class="form-control border-input" id="">
                                </div>
                                <div class="form-group">
                                    <label>About_Slider_img3</label>
                                    <input type="file" name="About_Slider_img3" class="form-control border-input" id="">
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Manager</h3>
                            </div>
                            <div class="panel-body">

                                <div class="form-group">
                                    <label>Manager_scoap_heading</label>
                                    <input type="text" name="Manager_scoap_heading" class="form-control border-input" id="">
                                </div>
                                <div class="form-group">
                                    <label>Manager_scoap</label>
                                    <textarea name="Manager_scoap" rows="6" class="form-control border-input"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Manager_img</label>
                                    <input type="file" name="Manager_img" class="form-control border-input" id="">
                                </div>
                                <div class="form-group">
                                    <label>Manager_name</label>
                                    <input type="text" name="Manager_name" class="form-control border-input" id="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width: 100%; font-size: 30px;">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
