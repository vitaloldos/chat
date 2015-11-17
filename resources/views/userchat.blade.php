<!--
/**
 * Created by PhpStorm.
 * User: vitaliy
 * Date: 14.11.15
 * Time: 9:16
 */
-->
@extends('app')

@section('content')


<div class="row">
  <div class="col-md-8">
    <div class="panel panel-default chat">
        <div class="panel-heading" id="accordion"><span class="glyphicon glyphicon-comment"></span> Chat
            <a style="float: right;" href="{{URL::route('logout')}}"><span class="glyphicon glyphicon-user"></span> Logout</a>
        </div>

        <div class="panel-body">
            <ul id="messages">
                <li >

                </li>

            </ul>
        </div>

        <div class="panel-footer">
            <div class="input-group">

                <form method="POST" id="send">
                    <meta name="csrf_token" content="{{ csrf_token() }}" />
                    <span class="input-group-btn">
                        <input type="text" maxlength="200" id="message" name="message" size="92" class="form-control input-md" pattern="^[.\,\?\!\\'\;\:\0-9a-zA-ZА-Яа-яЁё\s]+$" placeholder="Type your message here...">
						<input type="submit" value="Send"  class="btn btn-success btn-md">
					</span>
                </form>
            </div>
        </div>
    </div>

  </div><!--/.col-->

</div>

    <script>
        var index = 0;
        var socket = io.connect('http://localhost:8890');
        socket.on('message', function (data) {
        if ( (index%2 == 0)) {
            var pullcircle = 'left';
            var pulltext = 'right';
        }else {
            var pullcircle = 'right';
            var pulltext = 'left';
        }
        var blok = '<li class=\" '+pullcircle+' clearfix\"> \
        <span class=\"chat-img pull-'+pullcircle+'\"> \
        <img src=\"http://placehold.it/90/{!!$color!!}?text={!!$username!!}\" alt="User Avatar" class="img-circle" /> \
        </span> \
        <div class="chat-body clearfix"> \
        <div class="header"> \
        <strong class="pull-'+pulltext+'primary-font">{!!$username!!}</strong> <small class="text-muted">{!!$date!!}</small> \
        </div> \
        <p> \
        <div>'+data+'</div> \
        </p> \
        </div> \
        </li>';
            setTimeout(continueExecution, 15000);
         function continueExecution ()
            {
                $("#messages").append(blok);
                index = index + 1;
            }
        });
    </script>
    <script>
        $( '#send' ).on( 'submit', function(e) {
            e.preventDefault();
            var CSRF_TOKEN = $('meta[name="csrf_token"]').attr('content');
            var message = $('#message').val();
            $.ajax({
                type: "POST",
                url: 'sendmessage',
                dataType: 'JSON',
                data: {_token: CSRF_TOKEN, message:message},
                success: function( data ) {
//                   alert( 'data' );
                }
             });
        });
    </script>

@endsection