$(document).ready(function() {
    var list;
    var ind = 1;
    var count;

    $('#aprior').click(function () {
        //  $('.aprior').remove();
        // $('body').append('<div class=".aprior"></div>');
        count = $('#count').val();
        // for(var i = 1; i <= count; i++) {
        getList(count);
        // $('body').append(list);
        //  $('.selectpicker').selectpicker({
        //      style: 'btn-info',
        //  });
        // }
    });

    function getList(index) {

        $.ajax({
            url: 'getList.php', // provide correct url
            type: 'POST',
            dataType: 'JSON', // <-- since you are expecting JSON
            success: function (data) {

                console.log(data); // take a peek on the values (browser console)
                for (var j = 1; j <= index; j++) {
                    list = '';
                    list += "<select id='" + j + "' class='selectpicker'  data-live-search='true'>";
                    ind++;
                    // alert(ind);
                    for (var i = 0; i < data.length; i++) {
                        list += "<option>" + data[i] + "</option>";
                    }
                    list += '</select>';
                    $('body').append(list + '<br><br>');
                    // $('.aprior').append(list + '<br><br>');
                    $('.selectpicker').selectpicker({
                        style: 'btn-info',
                    });
                }
            },
            error: function(data) {
                alert('Произошел сбой. Повторите попытку!');
                return;
            }
        });
        // return list;
    }
    $('.selectpicker').selectpicker({
        style: 'btn-info',
    });

    $('.selectpicker').change(function () {
        var slecteditem = $(this).find("option:selected").val();
        alert(slecteditem);
    });


    $('#add').click(function (){
        $.ajax({
            url: 'delete_table.php', // provide correct url
            type: 'POST',
            dataType: 'JSON'})// <-- since you are expecting JSON
            .done(function (data) {
            })
            .error( function(data) {
                return;
            });
        var mas_for_apriori = [];
        for(var i =1; i <= count; i++) {
            var val = $('#' + i).find("option:selected").val();
            mas_for_apriori[i-1] = val;
        }
        var table ='';
        $.ajax({
            url: 'apriory.php', // provide correct url
            type: 'POST',
            data: {mas: mas_for_apriori},
            dataType: 'JSON'})// <-- since you are expecting JSON
            .done(function (data) {
                //console.log(data);

                table+='<table class="table table-striped table-hover"><thead><tr><th>Набор</th><th>Мощность</th></tr>' +
                    '</thead> <tbody>';
                for (var i in data) {

                    table+= '<tr><td>'+data[i].Набор+'</td><td>'+data[i].Мощность+'</td></tr>';
                }
                table+='</tbody>';
                $('body').append(table);
            })
            .error( function(data) {
                // console.log(data);
                alert('Произошел сбой. Повторите попытку!');

                return;
            });




    });

    // $('#add2').click(function () {
    //     $('.aprior').remove();
    //     var list = getList();
    //     $('body').append('<div class="aprior"></div>');
    //     $('.aprior').append(list);
    //     $('.selectpicker').selectpicker({
    //         style: 'btn-info',
    //     });
    // });


});