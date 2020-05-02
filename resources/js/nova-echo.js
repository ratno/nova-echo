import Echo from 'laravel-echo'
window.io = require('socket.io-client');

let echoOptions = {
  broadcaster: document.head.querySelector('meta[name="broadcaster"]').content
}

if (document.head.querySelector('meta[name="broadcaster_host"]') !== null) {
  echoOptions.host = document.head.querySelector('meta[name="broadcaster_host"]').content
        + ":"
        + document.head.querySelector('meta[name="broadcaster_port"]').content;
}

echoOptions.headers = {
    'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
};

window.Echo = new Echo(echoOptions)

let userReceivesBroadcastOn = document.head.querySelector('meta[name="user_private_channel"]').content

if (userReceivesBroadcastOn !== null) {
  window.userPrivateChannel = window.Echo.private(userReceivesBroadcastOn)
}
