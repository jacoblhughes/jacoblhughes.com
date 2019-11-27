<!doctype html>
<html>

<head>

    <script>
        $(document).ready(function() {

            var jasonURL = "https://en.wikipedia.org/w/api.php?action=opensearch&format=json&utf8=1&ascii=1&search="

            $("#searchInput").keypress(function(event) {

                var keycode = (event.keyCode ? event.keyCode : event.which);
                var value = $("#searchInput").val();
                if (event.keyCode == '13') {
                    var html = "";
                    var titleArr = [];
                    var infoArr = [];
                    var websiteArr = [];
                    $.ajax({
                        type: "GET",
                        url: jasonURL + value,
                        dataType: "jsonp",
                        success: function(result) {

                            result[1].forEach(function(val) {
                                titleArr.push(val);
                            });

                            result[2].forEach(function(second) {
                                if (second != "") {
                                    infoArr.push(second);
                                } else {
                                    infoArr.push("No Description Available - Please Click")
                                }
                            });

                            result[3].forEach(function(third) {
                                websiteArr.push(third);
                            });

                            for (i = 0; i < websiteArr.length; i++) {
                                html += "<a href=" + websiteArr[i] + " target='_blank'><div class='resultDiv col-xs-8 col-xs-offset-2'>" + "<h5>" + titleArr[i] + "</h5>" + "<span>" + infoArr[i] + "</span></div></a>";
                            }
                            $("#resultRow").html(html);

                        }


                    });
                }
            });

            $("#clearButton").on("click", function() {
                $("#searchInput").val("");
            });
        });
    </script>
</head>

<body id="wiki_body">
    <div class="container-fluid" id='container'>
        <div class="" id="randomRow">
            <div id="random">
                <a href="https://en.wikipedia.org/wiki/Special:Random" target="_blank">Do you want a random Wiki article? - Click here!</a>
            </div>
        </div>
        <div class="" id="searchRow">
            <div id="search">
                <!--<form id="inputForm" autocomplete="off">-->
                <input type="search" id="searchInput" placeholder="Type your wiki search here!"><button id="clearButton">X</button>
                <!--</form>-->
            </div>
        </div>

        <div class="" id="resultRow" class="resultRow"></div>

    </div>
</body>

</html>