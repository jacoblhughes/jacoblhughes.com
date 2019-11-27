<head>
  <script>
    $(document).ready(function() {
      var status = "";
      var nameOfStreams = [
        "freecodecamp",
        "ESL_SC2"
      ];

      var streamURL = "https://wind-bow.glitch.me/twitch-api/streams/";
      var channelURL = "https://wind-bow.glitch.me/twitch-api/channels/";

      nameOfStreams.forEach(function(val) {
        $.ajax({
          type: "GET",
          url: streamURL + val,
          dataType: "jsonp",
          success: function(result) {
            if (result.stream != null) {
              status = "Online";

              $("#streamRow").append(
                "<div class='stream on'><div class='col-xs-1 col-xs-offset-3'><img src =" +
                  "'" +
                  result.stream.channel.logo +
                  "'" +
                  "></div>" +
                  "<div class='col-xs-6'><div class=''><div class='col-xs-12'>" +
                  result.stream.channel.display_name +
                  " - " +
                  "<a href ='" +
                  result.stream.channel.url +
                  "'>" +
                  status +
                  "</a>" +
                  " - Streaming: " +
                  result.stream.game +
                  "</div><div class='col-xs-12'>" +
                  result.stream.channel.status +
                  "</div></div></div></div>"
              );
            } else {
              status = "Offline";
              $.ajax({
                type: "GET",
                url: channelURL + val,
                dataType: "jsonp",
                success: function(result) {
                  status = "Offline";
                  $("#streamRow").append(
                    "<div class='stream off'><div class='col-xs-1 col-xs-offset-3'><img src =" +
                      "'" +
                      result.logo +
                      "'" +
                      "></div>" +
                      "<div class='col-xs-6'><div class=''><div class='col-xs-12'>" +
                      result.display_name +
                      " - " +
                      "<a href ='" +
                      result.url +
                      "'>" +
                      status +
                      "</a>" +
                      " -  Last Streaming: " +
                      result.game +
                      "</div></div></div></div>"
                  );
                } //close success
              }); //close ajax
            } //close else
          } //close success
        }); //close ajax
      });
    });
  </script>
</head>

<body id="body">

    <div class="stream" id="streamRow"></div>

</body>
