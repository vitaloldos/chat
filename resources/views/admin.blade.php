<!--
/**
 * Created by PhpStorm.
 * User: vitaliy
 * Date: 16.11.15
 * Time: 11:38
 */
 -->
@extends('app')

@section('content')
    @include('includes.header')
    @include('includes.sidebar')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default chat">
                    <div class="panel-heading" id="accordion"><span class="glyphicon glyphicon-comment"></span> Chat</div>

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
                                     <input type="text" maxlength="200" id="message" name="message" size="69" class="form-control input-md" placeholder="Type your message here...">
                                     <input type="submit" value="Send"  class="btn btn-success btn-md">

                                </span>

                            </form>

                        </div>
                    </div>
                </div>
            </div><!--/.col-->

            <div class="col-md-4">

                <div class="panel panel-default">
                    <div class="panel-heading"><span class="glyphicon glyphicon-check"></span>Active Users List</div>
                    <div class="panel-body">
                        <ul class="todo-list">

                            @if (isset($users))
                            @foreach ($users as $user)
                            @if (isset($user))

                            <li class="todo-list-item">
                                <div class="checkbox">
                                    <input type="checkbox" id="checkbox-{{ $user->id }}" />
                                    <label for="checkbox-{{ $user->id }}">{{ $user->username }}</label>
                                </div>
                                <div class="pull-right action-buttons">

                                    <a href="#" id="ban-{{ $user->id }}" onclick="onBan()" class="trash"><span class="glyphicon glyphicon-trash"></span></a>
                                </div>
                            </li>
                                @endif
                            @endforeach
                            @endif
                        </ul>
                    </div>

                </div>

            </div><!--/.col-->

        </div>

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
            $( "#messages" ).append( blok);
            index = index +1;
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

//                   alert( data.status' );
                    }

            });
        });

        function onBan() {
        @if(isset($user))
            var checkid = 'checkbox-'+'{{ $user->id }}';
            var CSRF_TOKEN = $('meta[name="csrf_token"]').attr('content');
            var userid = '{{ $user->id }}';
            var bannumber = '1';
            if($("#"+checkid).attr("checked") != 'checked') {
                window.alert('Give your confirmation to the processing of data!');
                return false;
            } else {
                if (confirm("Press a Button For Ban User!\nEither OK or Cancel.")) {
                    $.ajax({
                        type: "POST",
                        url: 'ban',
                        dataType: 'JSON',
                        data: {_token: CSRF_TOKEN, bannumber: bannumber, userid: userid},
                        success: function (data) {
                            if (data.status == 'success') {
                                alert(data.msg);
                            }else {
                                alert(data.msg);
                            }
                        }
                    });
                }
            }
        }
        @endif
    </script>

@endsection