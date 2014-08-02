@extends('layouts.frontoffice.default')
@section('content')

<script type="text/javascript"
        src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        var is_pincode_valid = true;
        var form = $('#address_form');
        $site_url = $.url();
        $host = $site_url.attr('host');
        form.validate();
        $('#pincode').focusout(function () {

            $('.pincode_not_found').removeClass('error').html("");
            var pincode = $(this).val();
            if (pincode == '') {
                return;
            }

            $('.ajax_loader').removeClass('hidden');
            var get_location_data_url = 'http://' + $host + '/user/ajax-city-and-state/' + pincode;
            $.get(get_location_data_url, function (data) {

                $('.ajax_loader').addClass('hidden');
                if (data) {
                    $('.city').attr('value', data.city);
                    $('.state').attr('value', data.state);
                    is_pincode_valid = false;
                } else {
                    $('.pincode_not_found').addClass('error').html("The pincode entered is invalid");
                    is_pincode_valid = false;
                }

            });

            jQuery.validator.addMethod("validate_pincode", function (data) {
                return data;
            }, "The pincode entered is invalid");


            function validate_pincode() {
                if (is_pincode_valid = true) {
                    return true
                } else {
                    return false;
                }
            }

        });

    });
</script>


<section id="columns" class="clearfix">
    <div class="container">
        <div class="row-fluid">
            <section id="center_column" class="span12">
                <div class="contenttop row-fluid">
                    <h1 id="cart_title" class="title_category">Address</h1>

                    <!-- Steps -->
                    <ul class="step" id="order_step">

                        <li class=" step_done"><span><a href="#">1. Login</a></span></li>
                        <li class="step_current"><span><a href="address.html">2. Address</a></span></li>
                        <li id="step_end" class="step_todo"><span>3. Order Summary</span></li>
                    </ul>
                    <!-- /Steps -->


                    <div class="authentication-page row-fluid">
                        <div class="span12">
                            <form action="{{URL::to('user/address/')}}" method="post"
                                  class="std form-horizontal" id="address_form">
                                <fieldset>
                                    <h3 class="title_content">Your address</h3>


                                    <div class="control-group text">
                                        <label for="first_name" class="control-label">First name <sup>*</sup></label>

                                        <div class="controls">
                                            <input type="text" name="first_name"
                                                   value="@if(isset($user->first_name)){{$user->first_name}}@endif"
                                                   class="required" id="first_name">
                                            <span class="error">{{$errors->first('first_name')}}</span>
                                        </div>
                                    </div>
                                    <div class="control-group text">
                                        <label for="last_name" class="control-label">Last name <sup>*</sup></label>

                                        <div class="controls">
                                            <input type="text" id="last_name" name="last_name"
                                                   value="@if(isset($user->last_name)){{$user->last_name}}@endif"
                                                   class="required">
                                            <span class="error">{{$errors->first('last_name')}}</span>
                                        </div>
                                    </div>

                                    <div class="control-group postcode text" style="">
                                        <label for="pincode" class="control-label">Zip / Postal Code
                                            <sup>*</sup></label>

                                        <div class="controls">
                                            <input type="text" id="pincode" name="pincode"
                                                   value="@if(isset($user->addresses[0])){{$user->addresses[0]->pincode}}@endif"
                                                   class="required digits">
                                            <span class="ajax_loader hidden"><img
                                                    src="{{asset('frontoffice/img/ajax-loader.gif')}}" alt=""/>
                                            Checking Availability...
                                            </span>
                                            <span class="pincode_not_found"></span>
                                            <span class="error">{{$errors->first('pincode')}}</span>
                                        </div>
                                    </div>
                                    <div class="control-group text">
                                        <label for="address_line1" class="control-label">Address <sup>*</sup></label>

                                        <div class="controls">
                                            <input type="text" id="address_line1" name="address_line1"
                                                   value="@if(isset($user->addresses[0])){{$user->addresses[0]->line1}}@endif"
                                                   class="required">
                                            <span class="error">{{$errors->first('address_line1')}}</span>
                                        </div>
                                    </div>
                                    <div class="control-group text">
                                        <label for="address_line2" class="control-label">Address (Line 2)</label>

                                        <div class="controls">
                                            <input type="text" id="address_line2" name="address_line2"
                                                   value="@if(isset($user->addresses[0])){{$user->addresses[0]->line2}}@endif">
                                            <span class="error">{{$errors->first('address_line2')}}</span>
                                        </div>
                                    </div>
                                    <div class="control-group text">
                                        <label for="landmark" class="control-label">Landmark <sup>*</sup></label>

                                        <div class="controls">
                                            <input type="text" name="landmark" id="landmark" class="required"
                                                   value="@if(isset($user->addresses[0])){{$user->addresses[0]->landmark}}@endif">
                                            <span class="error">{{$errors->first('landmark')}}</span>
                                        </div>
                                    </div>

                                    <div class="control-group text">
                                        <label for="city" class="control-label">City <sup>*</sup></label>

                                        <div class="controls">
                                            <input type="text" name="city" id="city" class="required city"
                                                   value="@if(isset($user->addresses[0])){{$user->addresses[0]->city}}@endif"
                                                   readonly>
                                            <span class="error">{{$errors->first('city')}}</span>
                                        </div>
                                    </div>

                                    <div class="control-group id_state select" style="">
                                        <label for="id_state" class="control-label">State <sup>*</sup></label>

                                        <div class="controls">
                                            <input type="text" name="state" id="state" class="required state"
                                                   value="@if(isset($user->addresses[0])){{$user->addresses[0]->state}}@endif"
                                                   readonly>
                                            <span class="error">{{$errors->first('state')}}</span>
                                        </div>


                                    </div>

                                    <div class="control-group select">
                                        <label for="id_country" class="control-label">Country</label>

                                        <div class="controls" style="padding-top: 8px">
                                            <b>India</b> (Service available only in India)
                                        </div>
                                    </div>

                                    <!--                                    <div class="control-group inline-infos required">-->
                                    <!--                                        <div class="controls">You must register at least one phone number-->
                                    <!--                                            <sup class="required">*</sup>-->
                                    <!--                                        </div>-->
                                    <!--                                    </div>-->
                                    <div class="control-group text">
                                        <label for="landline" class="control-label">Home phone</label>

                                        <div class="controls">
                                            <input type="text" id="landline" name="landline"
                                                   value="@if(isset($user->landline)){{$user->landline}}@endif">
                                        </div>
                                    </div>
                                    <div class="control-group text">
                                        <label for="mobile" class="control-label">Mobile phone <sup>*</sup> </label>

                                        <div class="controls">
                                            <input type="text" id="mobile" name="mobile" class="required"
                                                   value="@if(isset($user->mobile)){{$user->mobile}}@endif">
                                        </div>
                                    </div>


                                    <div class="control-group submit2">
                                        <div class="controls">
                                            <input type="submit" class="submit exclusive standard-checkout"
                                                   value="Continue"/>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>

                    </div>
                </div>
                <!-- end div block_home -->
            </section>
        </div>
    </div>
</section>

@stop