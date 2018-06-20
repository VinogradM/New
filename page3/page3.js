/**
 * Created by Master on 19.03.2018.
 */
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
            $( ".container" ).append( "<p>"+ mas_of_skills[i] +"</p> <input type='number' class='input_skills'>" );
        }
        $( ".container" ).append( "<br><br><button class='btn btn-primary' id='submit2'>Оценить</button>");
        $( ".container" ).append(" <div class='form-group row'> <label for='staticEmail' class='col-sm-2 col-form-label'>Email</label> <div class='col-sm-10'> <input type='text' readonly class='form-control-plaintext' id='staticEmail' value='email@example.com'> </div> </div>");
        $( ".container" ).append("<div class='form-group row'> <label for='inputPassword' class='col-sm-2 col-form-label'>Password</label> <div class='col-sm-10'> <input type='password' class='form-control' id='inputPassword' placeholder='Password'> </div> </div>");
        // $.ajax({
        //     type: "POST",
        //     url: "db.php",
        //     data: {mas_of_skills},
        // }).success(function() {
        //     alert( "second success" );
        // });


    });

    $("body").on('click', '#submit2', function () {
        alert('click');
        var a = [];
       // $("body").on('each', '.input_skills', function () {
        $(".input_skills").each(function (i, elem) {
            a[i] = $(elem).text();
            // alert(i + ': ' + $(elem).text());
        });
        for (var i = 0; i < a.length; i++) {
            alert(a[i]);
        }
    });
    $("#submit3").click(function () {
        $(".btn-success").each(function (i, elem) {
            mas_of_skills[i] = $(elem).text();
        });
        for (var i = 0; i < mas_of_skills.length; i++) {
            alert(mas_of_skills[i]);
        }

        $.ajax({
            type: "POST",
            url: "insert_voit.php",
            data: {mas:mas_of_skills},
        }).success(function() {
            alert( "second success" );
        });


    });

});
