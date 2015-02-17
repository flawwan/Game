var interval = setInterval(function () {
    $.get("api.php?id=" + id, function (resp) {
        $("#searching").text(resp.searching);
        if (resp.data.matchmaking_status == "active") {
            //Redirect to game
            clearInterval(interval);
            window.location = resp.data.game_play_url + "?key=" + resp.data.matchmaking_key
        }
});
}, 3000); //check every 2 seconds for match
var s = 0;
var m = 0;
var time = [];
function fixTime(i) {
    if (i<10) {i = "0" + i}
return i;
}
var timer = setInterval(function () {
    s++;
    if (s % 60 == 0)
    {
    m++;
    s = 0;
    }
$(".timer span").html(fixTime(m) + ":" + fixTime(s));
}, 1000);
