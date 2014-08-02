@extends('layouts.frontoffice.default')

@section('content')

<section id="columns" class="clearfix">
    <div class="container">
        <div class="row-fluid">
            <section id="center_column" class="span12">
                <div class="contenttop row-fluid">

                    <div class="authentication-page row-fluid">
                        <div class="span12">
                            <div class="span12">
                                <h1 class="custom_h1">Forgot your password?</h1>

                                <p>Please enter the email address you used to register. We will then send you a new
                                    password. </p>

                                <form action="{{URL::to('user/forgot-password')}}" method="post"
                                      class="std form-horizontal" id="form_forgotpassword">
                                    <fieldset>
                                        <div class="control-group text">
                                            <label for="email" class="control-label">Email :</label>

                                            <div class="controls">
                                                <input type="text" id="email" class="input-xlarge" name="email"
                                                       value="">
                                                <span class="error">{{$errors->first('email')}}</span>
                                            </div>
                                        </div>
                                        <div class="control-group submit">
                                            <div class="controls">
                                                <input type="submit" class="button" value="Retrieve Password">
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                                <p class="clear">
                                    <a href="#" title="Return to Login" rel="nofollow">
                                        <img
                                            src="http://demo4leotheme.com/prestashop/leo_metro/themes/leometr/img/icon/my-account.gif"
                                            alt="Return to Login" class="icon"></a>
                                    <a href="{{URL::to('user/login')}}" title="Back to Login" rel="nofollow">Back to Login</a>
                                </p>
                            </div>

                        </div>
                    </div>
                    <!-- end div block_home -->
            </section>
        </div>
    </div>
</section>

@stop