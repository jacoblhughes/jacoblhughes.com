<head>
    <script>
        var quote = "";
        var author = "";


        $.ajaxSetup({
            cache: false
        });

        $(document).ready(function() {

            $("#getQuote").on("click", function() {
                fetchQuote();

                var possibleColors = ["#457973", "#dfadd4", "#993932", "#677f02", "#016531"];
                var colorChange = possibleColors[Math.floor(Math.random() * 5)];

                //$("#quote").css("color", colorChange);
                //$("body").css("background-color", colorChange);

            });

            $("#tweetIt").on("click", function() {
                $(this).attr("href", 'https://twitter.com/intent/tweet?text=' + quote + " - " + author);
            });
        });

        function fetchQuote() {

            $.getJSON("https://api.forismatic.com/api/1.0/?method=getQuote&format=json&lang=en&format=jsonp&jsonp=?", function(json) {

                quote = json.quoteText;
                author = json.quoteAuthor;

                $("#quote").html(quote);
                $("#author").html(author);
            });
        }
    </script>
</head>

<body id="body">
    <div class="container-fluid" id='container'>
        <div class="" id="links">
            <div class="col-xs-1 col-xs-offset-3">
                <div><a id="tweetIt" href="twitter.com" target="_blank"><button class="button" id="tweetButton"><img id="twitterLogo" src="https://www.seeklogo.net/wp-content/uploads/2015/11/twitter-logo.png"></button></a>
                </div>
            </div>
            <div class="col-xs-2 col-xs-offset-1">
                <button type="button" id="getQuote">New Quote</button>
            </div>

        </div>
        <div class="">
            <div class="well ">
                <blockquote class="quote">
                    <p id="quote">Click the "Get Quote" button above for a random quote. Tweet your quote with the link to the left!</p>
                    <p id="author"></p>
                </blockquote>
            </div>
        </div>
    </div>
</body>