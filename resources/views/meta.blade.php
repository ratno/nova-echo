    <meta name="broadcaster" content="socket.io">
    <meta name="broadcaster_host" content="{{ config('nova-echo.host') }}">
    <meta name="broadcaster_port" content="{{ config('nova-echo.port') }}">
@if(method_exists(request()->user(), 'receivesBroadcastNotificationsOn'))
    <meta name="user_private_channel" content="{{ request()->user()->receivesBroadcastNotificationsOn() }}">
@else
    <meta name="user_private_channel" content="{{ str_replace('\\', '.', get_class(request()->user())).'.'.request()->user()->id }}">
@endif
