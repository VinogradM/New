/**
 * Created by Master on 18.03.2018.
 */

$(document).ready(function() {

    // $('#submit3').click(function () {
    //     alert('click');
    // });

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

    $("#submit3").click(function () {
        // var text = $(".btn-success").text();
        // alert(text);
        $(".btn-success").each(function (i, elem) {
            mas_of_skills[i] = $(elem).text();
            // alert(i + ': ' + $(elem).text());
        });
        for (var i = 0; i < mas_of_skills.length; i++) {
            alert(mas_of_skills[i]);
        }

        var companyName = $('#companyName').val();
        var industry = $('#industry').val();
        var prof = $('#inputProf').val();
        var email = $('#inputEmail').val();
        alert(companyName+industry+prof+email);

        $.ajax({
            type: "POST",
            url: "insert_voit.php",
            data: {mas:mas_of_skills, company: companyName, industry: industry, prof: prof, email: email},
        }).success(function() {
            alert( "second success" );
        });


        });
    });