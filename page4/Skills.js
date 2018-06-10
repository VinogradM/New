// line Chart
$(document).ready(function() {

    google.charts.load("visualization", "1", {packages: ["bar"]});  // for Bar
    google.charts.setOnLoadCallback(load_chart_data_skills1);

    function load_chart_data_skills1() {
        $.ajax({
            url: 'Analitic_for_skills/Popular_skills_for_PM.php', // provide correct url
            type: 'POST',
            dataType: 'JSON', // <-- since you are expecting JSON
            success: function (chart_values) {
                console.log(chart_values); // take a peek on the values (browser console)
                draw_chart_skills1(chart_values); // call your drawing function!
            }
        });
    }

    function draw_chart_skills1(chart_values) {
        var data = google.visualization.arrayToDataTable(chart_values);
        // var options = {
        //     title: 'Your super chart!',
        //     vAxis: {title: 'Hours Per Day', titleTextStyle: {italic: false}},
        //     hAxis: {title: 'Task', titleTextStyle: {italic: false}},
        // };
        var options = {
            title: 'Chess opening moves here',
            width: 1100,
            height: 800,
            legend: { position: 'none' },
            chart: { title: 'Менеджер проектов',
                subtitle: 'popularity by count' },
            bars: 'horizontal', // Required for Material Bar Charts.
            axes: {
                x: {
                    0: { side: 'top', label: 'Percentage'} // Top x-axis.
                }
            },
            bar: { groupWidth: "20%" }
        };
        //  var chart = new google.visualization.LineChart(document.getElementById('chart_div')); for Line + Pie
        var chart = new google.charts.Bar(document.getElementById('chart_div_skills_PM')); // for Bar
        chart.draw(data, options);
    }

    // SA
    google.charts.load("visualization", "1", {packages: ["bar"]});  // for Bar
    google.charts.setOnLoadCallback(load_chart_data_skills2);

    function load_chart_data_skills2() {
        $.ajax({
            url: 'Analitic_for_skills/Popular_skills_for_SA.php', // provide correct url
            type: 'POST',
            dataType: 'JSON', // <-- since you are expecting JSON
            success: function (chart_values) {
                console.log(chart_values); // take a peek on the values (browser console)
                draw_chart_skills2(chart_values); // call your drawing function!
            }
        });
    }

    function draw_chart_skills2(chart_values) {
        var data = google.visualization.arrayToDataTable(chart_values);
        // var options = {
        //     title: 'Your super chart!',
        //     vAxis: {title: 'Hours Per Day', titleTextStyle: {italic: false}},
        //     hAxis: {title: 'Task', titleTextStyle: {italic: false}},
        // };
        var options = {
            title: 'Chess opening moves here',
            width: 1100,
            height: 800,
            legend: { position: 'none' },
            chart: { title: 'Системный аналитик',
                subtitle: 'popularity by count' },
            bars: 'horizontal', // Required for Material Bar Charts.
            axes: {
                x: {
                    0: { side: 'top', label: 'Percentage'} // Top x-axis.
                }
            },
            bar: { groupWidth: "20%" }
        };
        //  var chart = new google.visualization.LineChart(document.getElementById('chart_div')); for Line + Pie
        var chart = new google.charts.Bar(document.getElementById('chart_div_skills_SA')); // for Bar
        chart.draw(data, options);
    }

    // IR
    google.charts.load("visualization", "1", {packages: ["bar"]});  // for Bar
    google.charts.setOnLoadCallback(load_chart_data_skills3);

    function load_chart_data_skills3() {
        $.ajax({
            url: 'Analitic_for_skills/Popular_skills_for_IR.php', // provide correct url
            type: 'POST',
            dataType: 'JSON', // <-- since you are expecting JSON
            success: function (chart_values) {
                console.log(chart_values); // take a peek on the values (browser console)
                draw_chart_skills3(chart_values); // call your drawing function!
            }
        });
    }

    function draw_chart_skills3(chart_values) {
        var data = google.visualization.arrayToDataTable(chart_values);
        // var options = {
        //     title: 'Your super chart!',
        //     vAxis: {title: 'Hours Per Day', titleTextStyle: {italic: false}},
        //     hAxis: {title: 'Task', titleTextStyle: {italic: false}},
        // };
        var options = {
            title: 'Chess opening moves here',
            width: 1100,
            height: 800,
            legend: { position: 'none' },
            chart: { title: 'Специалист по ИР',
                subtitle: 'popularity by count' },
            bars: 'horizontal', // Required for Material Bar Charts.
            axes: {
                x: {
                    0: { side: 'top', label: 'Percentage'} // Top x-axis.
                }
            },
            bar: { groupWidth: "20%" }
        };
        //  var chart = new google.visualization.LineChart(document.getElementById('chart_div')); for Line + Pie
        var chart = new google.charts.Bar(document.getElementById('chart_div_skills_IR')); // for Bar
        chart.draw(data, options);
    }

    //IS
    google.charts.load("visualization", "1", {packages: ["bar"]});  // for Bar
    google.charts.setOnLoadCallback(load_chart_data_skills4);

    function load_chart_data_skills4() {
        $.ajax({
            url: 'Analitic_for_skills/Popular_skills_for_IS.php', // provide correct url
            type: 'POST',
            dataType: 'JSON', // <-- since you are expecting JSON
            success: function (chart_values) {
                console.log(chart_values); // take a peek on the values (browser console)
                draw_chart_skills4(chart_values); // call your drawing function!
            }
        });
    }

    function draw_chart_skills4(chart_values) {
        var data = google.visualization.arrayToDataTable(chart_values);
        // var options = {
        //     title: 'Your super chart!',
        //     vAxis: {title: 'Hours Per Day', titleTextStyle: {italic: false}},
        //     hAxis: {title: 'Task', titleTextStyle: {italic: false}},
        // };
        var options = {
            title: 'Chess opening moves here',
            width: 1100,
            height: 800,
            legend: { position: 'none' },
            chart: { title: 'Специалист по ИС',
                subtitle: 'popularity by count' },
            bars: 'horizontal', // Required for Material Bar Charts.
            axes: {
                x: {
                    0: { side: 'top', label: 'Percentage'} // Top x-axis.
                }
            },
            bar: { groupWidth: "20%" }
        };
        //  var chart = new google.visualization.LineChart(document.getElementById('chart_div')); for Line + Pie
        var chart = new google.charts.Bar(document.getElementById('chart_div_skills_IS')); // for Bar
        chart.draw(data, options);
    }

});