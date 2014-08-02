@extends('layouts.frontoffice.default')
@section('content')

<script type="text/javascript"
        src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        $('#login_form').validate();
        $('#create_account_form').validate();

    });
</script>


<style type="text/css">
    .register label {
        display: block;
    }
</style>

<section id="columns" class="clearfix">
    <div class="container">
        <div class="row-fluid">
            <section id="center_column" class="span12">
                <div class="contenttop row-fluid">
                    <h1 id="cart_title" class="title_category custom_h1">Authentication</h1>

                    <!-- Steps -->
                    <ul class="step" id="order_step">

                        <li class=" step_current"><span><a href="#">1. Login</a></span></li>
                        <li class="step_todo"><span>2. Address</span></li>
                        <li id="step_end" class="step_todo"><span>3. Order Summary</span></li>

                    </ul>
                    <!-- /Steps -->


                    <div class="authentication-page row-fluid">


                        <div class="span6">
                            <form action="{{URL::to('user/register')}}"
                                  method="get" id="create_account_form" class="std">
                                <fieldset class="fieldset">
                                    <h3 class="title_content">Create an account</h3>

                                    <div class="form_content clearfix">
                                        <p>Please enter your email address to create an account.</p>

                                        <p class="text">
                                            <label for="register_email">Email address *</label>
                                            <span class="register"><input type="text" id="register_email"
                                                                          name="register_email" value=""
                                                                          class="account_input required email">
                                            <label for="" class="error">{{$errors->first('register_email')}}</label>
                                            </span>
                                        </p>

                                        <p class="submit">
                                            <input type="submit" class="exclusive standard-checkout"
                                                   value="Create an account"/>
                                        </p>
                                    </div>
                                </fieldset>
                            </form>
                        </div>


                        <div class="span6">
                            <form action="{{URL::to('user/login')}}"
                                  method="post" id="login_form" class="std">
                                <fieldset>
                                    <h3 class="title_content">Already registered?</h3>
                                    {{Notification::error()}}
                                    <div class="form_content clearfix">
                                        <p class="text">
                                            <label for="email">Email address *</label>
                                            <span><input type="text" id="email" name="email"
                                                         class="account_input required email">
                                            <label for="" class="error">{{$errors->first('email')}}</label>
                                            </span>

                                        </p>

                                        <p class="text">
                                            <label for="password">Password *</label>
                                            <span><input type="password" id="password" name="password"
                                                         class="account_input required">
                                            <label for="" class="error">{{$errors->first('password')}}</label>
                                            </span>

                                        </p>

                                        <p class="submit">

                                            <input type="submit" class="exclusive standard-checkout" value="Log In"/>

                                        </p>

                                        <p class="lost_password"><a href="{{URL::to('user/forgot-password')}}"
                                                                    title="Recover your forgotten password"
                                                                    rel="nofollow">Forgot your password?</a></p>

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