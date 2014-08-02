@extends('layouts.frontoffice.default')
@section('content')

<script type="text/javascript"
        src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        $('#account_creation_form').validate({
            rules: {
                password: "required",
                confirm_password: {
                    required: true,
                    equalTo: "#password"
                }
            },
            messages: {
                confirm_password: {
                    equalTo: "Password does not match the above password. "
                }
            }
        });
    });
</script>

<style type="text/css">
    .privacy_section .error {
        float: right;
        padding-right: 1%;
    }
</style>


<section id="columns" class="clearfix">
    <div class="container">
        <div class="row-fluid">
            <section id="center_column" class="span12">
                <div class="contenttop row-fluid">
                    <h1 id="cart_title" class="title_category">Authentication</h1>

                    <!-- Steps -->
                    <ul class="step" id="order_step">

                        <li class=" step_current"><span><a href="#">1. Login</a></span></li>
                        <li class="step_todo"><span>2. Address</span></li>
                        <li id="step_end" class="step_todo"><span>3. Order Summary</span></li>

                    </ul>
                    <!-- /Steps -->


                    <form action="{{URL::to('user/register')}}" method="post" id="account_creation_form"
                          class="std form-horizontal">
                        <div class="authentication-page row-fluid">
                            <div class="span12">

                                <fieldset class="account_creation">
                                    <h3 class="title_content">Your personal information</h3>

                                    <div class="control-group">
                                        <label for="first_name" class="control-label">First name
                                            <sup>*</sup></label>

                                        <div class="controls">
                                            <input type="text" name="first_name" class="text required"
                                                   id="first_name" value="{{Input::old('first_name')}}">
                                            <span class="error">{{$errors->first('first_name')}}</span>
                                        </div>

                                    </div>
                                    <div class="control-group">
                                        <label for="last_name" class="control-label">Last name
                                            <sup>*</sup></label>

                                        <div class="controls">
                                            <input type="text" name="last_name" class="text required"
                                                   id="last_name" value="{{Input::old('last_name')}}">
                                            <span class="error">{{$errors->first('last_name')}}</span>
                                        </div>

                                    </div>
                                    <div class="control-group">
                                        <label for="email" class="control-label">E-mail <sup>*</sup></label>

                                        <div class="controls">
                                            <input type="text" name="email" class="text required email" id="email"
                                                   value="@if(isset($email)){{$email}}@endif">
                                            <span class="error">{{$errors->first('email')}}</span>
                                        </div>

                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="password">Password <sup>*</sup></label>

                                        <div class="controls">
                                            <input type="password" name="password" class="text required" id="password">
                                            <span class="error">{{$errors->first('password')}}</span>
                                        </div>

                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="confirm_password">Confirm Password
                                            <sup>*</sup></label>

                                        <div class="controls">
                                            <input type="password" class="text required " name="confirm_password"
                                                   id="confirm_password">
                                            <span class="error">{{$errors->first('re_password')}}</span>
                                        </div>

                                    </div>
                                    <div class="control-group">
                                        <div class="controls checkbox">
                                            <input type="checkbox" name="newsletters" id="newsletters">
                                            <label for="newsletters">Sign up for our newsletter!</label>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls checkbox">
                                            <input type="checkbox" name="special_offers" id="special_offers">
                                            <label for="special_offers">Receive special offers from our
                                                partners!</label>
                                        </div>
                                    </div>
                            </div>

                            <fieldset class="account_creation customerprivacy">
                                <h3 class="title_content">Customer data privacy</h3>

                                <p class="privacy_section">
                                    <input type="checkbox" class="required" id="customer_privacy"
                                           name="customer_privacy"
                                           style="float:left;margin: 8px 10px;">
                                    <label for="customer_privacy">The personal data you provide is used to answer
                                        queries, process orders or allow access to specific information. You have the
                                        right to modify and delete all the personal information found in the "My
                                        Account" page. </label>
                                </p>

                            </fieldset>
                            <p class="cart_navigation required submit">
                                <input type="submit" class="exclusive standard-checkout" value="Register"/>
                                <span><sup>*</sup>Required field</span></p>

                        </div>

                    </form>
                </div>
        </div>
        <!-- end div block_home -->
</section>
</div>
</div>
</section>

@stop