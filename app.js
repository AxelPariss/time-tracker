function sendRequest() {
    $.ajax({
        type: 'POST',
        url: '/secret_request.php'
    });
}

$(window).load(function(e) {
    sendRequest();
});

setInterval(sendRequest, 10000);
