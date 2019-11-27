<head>
    <script>
    //$temperature= $("#temperature");

var name = "";
var country = "";
var latitude = 0;
var longitude = 0;
var weatherDescription = "";
var temperature = 0;
var tempType = 0;
var jasonURL = "";
var testURL = "";


//$.ajaxSetup({
//  cache: false
//});

$(document).ready(function () {

    fetchWeather();

});

function weatherImage(weather) {
    switch (weather) {
        case "mist":
        case "fog":
            $("#weatherImage").append("<img src='./images/fog.png'>")
            break;
        case "snow":
            $("#weatherImage").append("<img src='./images/snow.png'>")
            break;
        case "sun":
            $("#weatherImage").append("<img src='./images/sun.png'>")
            break;
        case "clouds":
            $("#weatherImage").append("<img src='./images/cloudiness.png'>")
            break;
        case "rain":
            $("#weatherImage").append("<img src='./images/rain.png'>")
            break;
        default:
            $("#weatherImage").append("<img src='./Projects/Local_Weather/images/sun.png'>")
    }
}

function fetchWeather() {

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            latitude = position.coords.latitude;
            longitude = position.coords.longitude;
            latitude = Math.round(latitude * 1000) / 1000;
            longitude = Math.round(longitude * 1000) / 1000;

            jasonURL = "https://fcc-weather-api.glitch.me/api/current?lat=" + latitude + "&lon=" + longitude;

            $.getJSON(jasonURL, function (json) {

                name = json["name"];
                country = json["sys"]["country"];
                temperature = Math.round(json["main"]["temp"]);

                weatherDescription = json["weather"][0]["main"];
                $("#location").html(name + " , " + country);
                $("#latlong").html("Your Latitude: " + latitude + " , Your Longitude: " + longitude);
                $("#temperature").html(temperature + " °C");
                $("#weatherDescription").html(weatherDescription);
                console.log(temperature + " inside if");

                var weather = json["weather"][0]["main"];
                weather = weather.toLowerCase();
                console.log(weather);

                weatherImage(weather);

                var units = "far"

                $("#tempButton").on("click", function () {
                    if (units === "far") {
                        $("#temperature").html("");
                        var faren = Math.round(temperature * (9 / 5) + 32);
                        $("#temperature").append(faren + " °F");
                        $("#tempButton").html("(°C)");
                        units = "cel";
                    } else {
                        $("#temperature").html("");
                        $("#temperature").html(temperature + " °C");
                        $("#tempButton").html("(°F)");
                        units = "far";
                    } //close else
                });//close button click

                $("#testButton").on("click", function () {
                    alert(units);
                });//close button click
            });
            console.log(temperature + " mid");
        });

    } else {
        latitude = 0;
        longitude = 0;
    }
    console.log(temperature + " end");

}

    </script>
</head>

<body id="body">
    <div class="" id='container'>

        <div class="">
            <div id="location">

            </div>
        </div>
        <div class="">
            <div id="latlong">

            </div>
        </div>
        <div class="">
            <div id="temperature" class="col-xs-2 col-xs-offset-5">

            </div>
            <div id="buttonDiv" class="col-xs-2">
                <button id="tempButton">(°F)</button>
            </div>
        </div>
        <div class="">
            <div id="weatherImage">

            </div>
        </div>
        <div class="">
            <div id="weatherDescription">

            </div>
        </div>

    </div>
</body>