$('#sidebar').affix({
    offset: {
        top: 245
    }
});

var $body   = $(document.body);
var navHeight = $('.jumbotron').outerHeight(true);

$body.scrollspy({
    target: '#leftCol',
    offset: 10
});