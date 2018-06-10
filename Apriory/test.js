//$(document).ready(function() {
    $.ajax({
        url: 'Test.php', // provide correct url
        type: 'POST',
        dataType: 'JSON', // <-- since you are expecting JSON
        success: function (chart_values) {
            console.log(chart_values); // take a peek on the values (browser console)
        },
        error: function (chart_values) {
            console.log(chart_values); // take a peek on the values (browser console)
        },
    });
//});