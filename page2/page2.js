/**
 * Created by Master on 18.03.2018.
 */

$(document).ready(function() {

var mas_of_skills = [];
    $(".btn").click(function () {
        if ($(this).hasClass("btn-danger")) {
            $(this).removeClass("btn-danger");
            $(this).addClass("btn-success");
        }
        else if ($(this).hasClass("btn-success")) {
            $(this).removeClass("btn-success");
            $(this).addClass("btn-danger");
        }
    });

    $("#submit").click(function () {
        // var text = $(".btn-success").text();
        // alert(text);
        $(".btn-success").each(function (i, elem) {
            mas_of_skills[i] = $(elem).text();
            // alert(i + ': ' + $(elem).text());
        });
        for (var i = 0; i < mas_of_skills.length; i++) {
            alert(mas_of_skills[i]);
        }

        $.ajax({
            type: "POST",
            url: "insert_voit.php",
            data: {mas_of_skills},
        }).success(function() {
            alert( "second success" );
        });


        });
    });