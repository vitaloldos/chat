<!--
/**
 * Created by PhpStorm.
 * User: vitaliy
 * Date: 15.11.15
 * Time: 16:59
 */
 -->
@extends('app')
@section('content')

    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">Log in</div>
                <div class="panel-body">
                    <form role="form" method="POST" action="/auth/register">
                        <fieldset>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="user" value="1">
                            <input type="hidden" name="admin" value="0">
                            <div class="form-group">
                                <input style="width: 47%; float: left;  margin-bottom: 15px;" class="form-control" placeholder="First Name" name="firstname" type="text" autofocus=""  value="{{ old('firstname') }}">
                                <input style="width: 47%; float: right; margin-bottom: 15px;" class="form-control" placeholder="Last Name" name="lastname" type="text" autofocus="" value="{{ old('lastname') }}">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Username" name="username" type="text" autofocus="" pattern="[0-9a-zA-ZА-Яа-яЁё]{3,}" value="{{ old('username') }}">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Confirm Password" name="password_confirmation" type="password" value="">
                            </div>
                            <div class="form-group">
                                <select name="color" class="form-control">
                                    <option id="option-1" value="30a5ff/fff">Color 1</option>
                                    <option id="option-2" value="880000/f3e97a">Color 2</option>
                                    <option id="option-3" value="660066/f5f5f5">Color 3</option>
                                    <option id="option-4" value="dde0e6/5f6468">Color 4</option>
                                    <option id="option-5" value="ebccd1/000066">Color 5</option>
                                    <option id="option-6" value="ffff00/FF0000">Color 6</option>
                                    <option id="option-7" value="ffb733/440044">Color 7</option>
                                    <option id="option-8" value="ac2925/5cb85c">Color 8</option>
                                    <option id="option-9" value="d0e9c6/d58512">Color 9</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Register</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->
@endsection

@section('page-script')
    <script>
        !function ($) {
            $(document).on("click","ul.nav li.parent > a > span.icon", function(){
                $(this).find('em:first').toggleClass("glyphicon-minus");
            });
            $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
        }(window.jQuery);

        $(window).on('resize', function () {
            if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
        })
        $(window).on('resize', function () {
            if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
        })
    </script>
@stop