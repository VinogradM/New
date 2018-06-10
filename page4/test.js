// line Chart
$(document).ready(function() {
  //  google.charts.load("visualization", "1", {packages: ["corechart"]}); for Line + Pie

    google.charts.load("visualization", "1", {packages: ["bar"]});  // for Bar
    google.charts.setOnLoadCallback(load_chart_data);

    function load_chart_data() {
        $.ajax({
            url: 'Analitic_for_industry/Analitic_industry_PM.php', // provide correct url
            type: 'POST',
            dataType: 'JSON', // <-- since you are expecting JSON
            success: function (chart_values) {
                console.log(chart_values); // take a peek on the values (browser console)
                draw_chart(chart_values); // call your drawing function!
            }
        });
    }

    function draw_chart(chart_values) {
        var data = google.visualization.arrayToDataTable(chart_values);
        // var options = {
        //     title: 'Your super chart!',
        //     vAxis: {title: 'Hours Per Day', titleTextStyle: {italic: false}},
        //     hAxis: {title: 'Task', titleTextStyle: {italic: false}},
        // };
        var options = {
            title: 'Менеджер проектов',
            width: 1100,
            height: 800,
            legend: { position: 'none' },
            chart: { title: 'Менеджер проектов',
                subtitle: 'popularity by percentage' },
            bars: 'horizontal', // Required for Material Bar Charts.
            axes: {
                x: {
                    0: { side: 'top', label: 'Percentage'} // Top x-axis.
                }
            },
            bar: { groupWidth: "120%" }
        };
        //  var chart = new google.visualization.LineChart(document.getElementById('chart_div')); for Line + Pie
        var chart = new google.charts.Bar(document.getElementById('chart_div')); // for Bar
        chart.draw(data, options);
    }

    google.charts.load("visualization", "1", {packages: ["bar"]});  // for Bar
    google.charts.setOnLoadCallback(load_chart_data2);

    function load_chart_data2() {
        $.ajax({
            url: 'Analitic_for_industry/Analitic_industry_sysAnalitic.php', // provide correct url
            type: 'POST',
            dataType: 'JSON', // <-- since you are expecting JSON
            success: function (chart_values) {
                console.log(chart_values); // take a peek on the values (browser console)
                draw_chart2(chart_values); // call your drawing function!
            }
        });
    }

    function draw_chart2(chart_values) {
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
                subtitle: 'popularity by percentage' },
            bars: 'horizontal', // Required for Material Bar Charts.
            axes: {
                x: {
                    0: { side: 'top', label: 'Percentage'} // Top x-axis.
                }
            },
            bar: { groupWidth: "120%" }
        };
        //  var chart = new google.visualization.LineChart(document.getElementById('chart_div')); for Line + Pie
        var chart = new google.charts.Bar(document.getElementById('chart_div2')); // for Bar
        chart.draw(data, options);
    }


    // 3 график по профессиям
    google.charts.load("visualization", "1", {packages: ["bar"]});  // for Bar
    google.charts.setOnLoadCallback(load_chart_data3);

    function load_chart_data3() {
        $.ajax({
            url: 'Analitic_for_industry/Analitic_industry_sysAnalitic.php', // provide correct url
            type: 'POST',
            dataType: 'JSON', // <-- since you are expecting JSON
            success: function (chart_values) {
                console.log(chart_values); // take a peek on the values (browser console)
                draw_chart3(chart_values); // call your drawing function!
            }
        });
    }

    function draw_chart3(chart_values) {
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
                subtitle: 'popularity by percentage' },
            bars: 'horizontal', // Required for Material Bar Charts.
            axes: {
                x: {
                    0: { side: 'top', label: 'Percentage'} // Top x-axis.
                }
            },
            bar: { groupWidth: "120%" }
        };
        //  var chart = new google.visualization.LineChart(document.getElementById('chart_div')); for Line + Pie
        var chart = new google.charts.Bar(document.getElementById('chart_div3')); // for Bar
        chart.draw(data, options);
    }

    // 4 график по профессиям

    google.charts.load("visualization", "1", {packages: ["bar"]});  // for Bar
    google.charts.setOnLoadCallback(load_chart_data4);

    function load_chart_data4() {
        $.ajax({
            url: 'Analitic_for_industry/Analitic_industry_sysAnalitic.php', // provide correct url
            type: 'POST',
            dataType: 'JSON', // <-- since you are expecting JSON
            success: function (chart_values) {
                console.log(chart_values); // take a peek on the values (browser console)
                draw_chart4(chart_values); // call your drawing function!
            }
        });
    }

    function draw_chart4(chart_values) {
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
            backgroundColor: '#8846a0',
            legend: { position: 'none' },
            chart: { title: 'Специалист по ИР',
                subtitle: 'popularity by percentage' },
            bars: 'horizontal', // Required for Material Bar Charts.
            axes: {
                x: {
                    0: { side: 'top', label: 'Percentage'} // Top x-axis.
                }
            },
            bar: { groupWidth: "120%" }
        };
        //  var chart = new google.visualization.LineChart(document.getElementById('chart_div')); for Line + Pie
        var chart = new google.charts.Bar(document.getElementById('chart_div4')); // for Bar
        chart.draw(data, options);
    }


});