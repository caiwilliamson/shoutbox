$("document").ready(docReady);

var lastId = 0; //Global variable recording the id of the last shout to be posted.

function docReady() {
    $("#form-shout").submit(function(event) {
        event.preventDefault();
        var postData = $("#form-shout").serialize();
        postShout(postData);
    });

    //Immediately executed and repeating function to poll the database for new shouts
    //Example:
    //Start with 497 shouts in the database
    //Poll 1 (2000ms): lastId = 0. Get shouts from database where id > 0, limit of 5
    //5 new shouts retrieved (497, 496, 495, 494, 493) and lastId set to 497
    //Some users post shouts to the database
    //Poll 2 (4000ms): lastId = 497. Get shouts from database where id > 497, limit of 5.
    //2 new shouts retrieved (499, 498) and lastId set to 499
    //No shouts are posted to the database
    //Poll 3 (6000ms): lastId = 499. Get shouts from database where id > 499, limit of 5.
    //Blank array retrieved (no new shouts) and lastId set to 499 again.

    (function getNewShouts() {
        $.getJSON("shoutbox_controller/get_new_shouts?lastId=" + lastId, function(data) {
            displayShouts(data);
            getLastId();
            setTimeout(getNewShouts, 2000); //setTimeout is superior to setInterval
        });
    })();
}

function getLastId() {
    $.getJSON("shoutbox_controller/get_last_id", function(data) {
        lastId = data["lastId"]["0"]["id"];
    });
}

function postShout(postData) {
    $.post("shoutbox_controller/validate_shout", postData, function(data) {
        if (data["pass"] === 0) {
            $(".validation-errors").empty();
            $(".validation-errors").hide().html(data["message"]).fadeIn("fast");
        } else {
            $("#form-shout").trigger("reset");
            $(".validation-errors").empty();
        }
    }, "json");
}

function displayShouts(data) {
    $.each(data["shouts"], function(arrayId, object) {
        $("<div class='shout'>" + "<i>" + object.username + "</i>: " + object.shout + "<br>" + "</div>")
            .hide().prependTo(".shoutbox-area").fadeIn("fast");
        trimShouts();
    });
}

function trimShouts() {
    while ($(".shout").size() > 5) {
        $(".shoutbox-area .shout:last").remove();
    }
}