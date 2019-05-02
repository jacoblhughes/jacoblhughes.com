//$temperature= $("#temperature");

//$.ajaxSetup({
//  cache: false
//});
var status = ""

/*$(document).ready(function () {

    var fccStreamURL = "https://wind-bow.glitch.me/twitch-api/streams/freecodecamp"
    var fccChannelURL = "https://wind-bow.glitch.me/twitch-api/channels/freecodecamp"
    var baconStreamURL = "https://wind-bow.glitch.me/twitch-api/streams/bacon_donut"
    var baconChannelURL = "https://wind-bow.glitch.me/twitch-api/channels/bacon_donut"
    var bearStreamURL = "https://wind-bow.glitch.me/twitch-api/streams/bearofaman201"
    var bearChannelURL = "https://wind-bow.glitch.me/twitch-api/channels/bearofaman201"

    $.ajax({
        type: "GET",
        url: fccStreamURL,
        dataType: "jsonp",
        success: function (result) {
            if (result.stream != null) {

                status = "Online";

                $("#streamOne").html("<div class='col-xs-1 col-xs-offset-3'><img src =" + "'" + result.stream.channel.logo + "'" + "></div>"+"<div class='col-xs-6'><div class='row'><div class='col-xs-12'>" + result.stream.channel.display_name + " - " + "<a href ='" + result.stream.channel.url + "'>" + status + "</a>" + " - Streaming: " + result.stream.game + "</div><div class='col-xs-12'>" + result.stream.channel.status + "</div></div></div>");

            } else {
                
                $.ajax({
                    type: "GET",
                    url: fccChannelURL,
                    dataType: "jsonp",
                    success: function (result) {
                        status = "Offline";
                        $("#streamOne").html("<div class='col-xs-1 col-xs-offset-3'><img src =" + "'" + result.logo + "'" + "></div>"+"<div class='col-xs-6'><div class='row'><div class='col-xs-12'>" + result.display_name + " - " + "<a href ='" + result.url + "'>" + status + "</a>" + " -  Last Streaming: " + result.game + "</div></div></div>");
                    } //close success
                }); //close ajax

            } //close else
        } //close success
    }); //close ajax
    $.ajax({
        type: "GET",
        url: baconStreamURL,
        dataType: "jsonp",
        success: function (result) {
            if (result.stream != null) {

                status = "Online";

                $("#streamTwo").html("<div class='col-xs-1 col-xs-offset-3'><img src =" + "'" + result.stream.channel.logo + "'" + "></div>"+"<div class='col-xs-6'><div class='row'><div class='col-xs-12'>" + result.stream.channel.display_name + " - " + "<a href ='" + result.stream.channel.url + "'>" + status + "</a>" + " - Streaming: " + result.stream.game + "</div><div class='col-xs-12'>" + result.stream.channel.status + "</div></div></div>");


            } else {
                
                $.ajax({
                    type: "GET",
                    url: baconChannelURL,
                    dataType: "jsonp",
                    success: function (result) {
                        status = "Offline";
                        $("#streamTwo").html("<div class='col-xs-1 col-xs-offset-3'><img src =" + "'" + result.logo + "'" + "></div>"+"<div class='col-xs-6'><div class='row'><div class='col-xs-12'>" + result.display_name + " - " + "<a href ='" + result.url + "'>" + status + "</a>" + " -  Last Streaming: " + result.game + "</div></div></div>");

                    } //close success
                }); //close ajax

            } //close else
        } //close success
    }); //close ajax
    $.ajax({
        type: "GET",
        url: bearStreamURL,
        dataType: "jsonp",
        success: function (result) {
            if (result.stream != null) {

                status = "Online";

                $("#streamThree").html("<div class='col-xs-1 col-xs-offset-3'><img src =" + "'" + result.stream.channel.logo + "'" + "></div>"+"<div class='col-xs-6'><div class='row'><div class='col-xs-12'>" + result.stream.channel.display_name + " - " + "<a href ='" + result.stream.channel.url + "'>" + status + "</a>" + " - Streaming: " + result.stream.game + "</div><div class='col-xs-12'>" + result.stream.channel.status + "</div></div></div>");

            } else {
                
                $.ajax({
                    type: "GET",
                    url: bearChannelURL,
                    dataType: "jsonp",
                    success: function (result) {
                        status = "Offline";
                        $("#streamThree").html("<div class='col-xs-1 col-xs-offset-3'><img src =" + "'" + result.logo + "'" + "></div>"+"<div class='col-xs-6'><div class='row'><div class='col-xs-12'>" + result.display_name + " - " + "<a href ='" + result.url + "'>" + status + "</a>" + " -  Last Streaming: " + result.game + "</div></div></div>");
                    } //close success
                }); //close ajax

            } //close else
        } //close success
    }); //close ajax
}); //close document ready*/

$(document).ready(function () {

    var nameOfStreams = ["freecodecamp", "bacon_donut", "bearofaman201","ESL_SC2"];

    var streamURL = "https://wind-bow.glitch.me/twitch-api/streams/"
    var channelURL = "https://wind-bow.glitch.me/twitch-api/channels/"

    nameOfStreams.forEach(function (val) {
        $.ajax({
            type: "GET",
            url: streamURL + val,
            dataType: "jsonp",
            success: function (result) {
                if (result.stream != null) {

                    status = "Online";

                    $("#streamRow").append("<div class='row stream on'><div class='col-xs-1 col-xs-offset-3'><img src =" + "'" + result.stream.channel.logo + "'" + "></div>" + "<div class='col-xs-6'><div class='row'><div class='col-xs-12'>" + result.stream.channel.display_name + " - " + "<a href ='" + result.stream.channel.url + "'>" + status + "</a>" + " - Streaming: " + result.stream.game + "</div><div class='col-xs-12'>" + result.stream.channel.status + "</div></div></div></div>");

                } else {
                    status = "Offline";
                    $.ajax({
                        type: "GET",
                        url: channelURL + val,
                        dataType: "jsonp",
                        success: function (result) {
                            status = "Offline";
                            $("#streamRow").append("<div class='row stream off'><div class='col-xs-1 col-xs-offset-3'><img src =" + "'" + result.logo + "'" + "></div>" + "<div class='col-xs-6'><div class='row'><div class='col-xs-12'>" + result.display_name + " - " + "<a href ='" + result.url + "'>" + status + "</a>" + " -  Last Streaming: " + result.game + "</div></div></div></div>");
                        } //close success
                    }); //close ajax

                } //close else
            } //close success
        }); //close ajax
    })


});
