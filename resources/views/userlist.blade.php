@extends('layouts/app')

@section('body')
    <div id="countdown"></div>

    <div class="user-list">
        <ul class="count_{{$users->count()}}">
            @foreach($users as $cur_user)
                <li>
                    <img src="{{ $cur_user->picture }}"/>
                    <span class="name">{{ $cur_user->name }}</span>
                </li>
            @endforeach
        </ul>
    </div>
@stop

@section('scripts')
    <script>
        var pusher = new Pusher('{{ env('PUSHER_KEY') }}', {
            encrypted: true
        });

        var channel = pusher.subscribe('sgf-channel');
        channel.bind('DevCheckedIn', function (data) {
            $.get('/users/all', function(data){
                $('.user-list ul').html('');
                $('.user-list ul').removeClass().addClass('count_' + data.length);

                _.each(data, function (user) {
                    $('.user-list ul').append('<li><img src=' + user.picture + ' /><span class="name">' + user.name + '</span></li>');
                });
            });
        });



        $("#countdown").countdown('{{ $time }}', function (event) {
            $(this).text(event.strftime('%H:%M:%S'));
        }).on('finish.countdown', function () {
            $('#countdown').after('<div class="fitvid"><iframe width="1280" height="720" src="https://beta.quipvid.com/embed/{{$quip}}" frameborder="0" allowfullscreen></iframe></div>');
            $(".fitvid").fitVids();
            $('.fitvid').animateCSS('fadeIn');
        });
    </script>
@stop