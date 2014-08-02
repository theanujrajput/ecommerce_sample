@extends('layouts.dashboard_default')

@section('content')


<script type="text/javascript">

    $(document).ready(function () {

        $("#form").validate();

    });

</script>

<style type="text/css">
    .header {
        display: none;
    }
</style>

<div class="container">

    <form class="form-signin" action="{{URL::to('admin/login')}}" method="post" novalidate="" id="form">

        {{ Notification::showError() }}

        <h2 class="form-signin-heading">Log In</h2>

        <div class="login-wrap">
            <div class="user-login-info">
                <input type="text" id="email" class="form-control required" placeholder="Email" name="email">
                <input type="password" id="password" class="form-control required" placeholder="Password"
                       name="password">
            </div>
            <label class="checkbox">

                <span class="pull-right">
                    <a href=""> Forgot Password?</a>
                </span>
            </label>
            <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>

        </div>


    </form>

</div>

@stop