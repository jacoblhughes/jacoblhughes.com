var quote = "";
var author = "";


$.ajaxSetup({
    cache: false
});

$(document).ready(function () {
    
    $("#getQuote").on("click", function () {        
        fetchQuote();

        var possibleColors = ["#457973", "#dfadd4", "#993932", "#677f02", "#016531"];
        var colorChange = possibleColors[Math.floor(Math.random() * 5)];

        $("#quote").css("color", colorChange);
        $("body").css("background-color", colorChange);

    });

    $("#tweetIt").on("click", function () {
        $(this).attr("href", 'https://twitter.com/intent/tweet?text=' + quote + " - " + author);
    });
});

function fetchQuote() {

    $.getJSON("https://api.forismatic.com/api/1.0/?method=getQuote&format=json&lang=en&format=jsonp&jsonp=?", function (json) {

        quote = json.quoteText;
        author = json.quoteAuthor;

        $("#quote").html(quote);
        $("#author").html(author);
    });
}
