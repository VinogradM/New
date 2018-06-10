$(document).ready(function() {
var list;
var ind = 1;
function getList() {
    $.ajax({
        url: 'getList.php', // provide correct url
        type: 'POST',
        dataType: 'JSON', // <-- since you are expecting JSON
        success: function (data) {
list ='';
            console.log(data); // take a peek on the values (browser console)
            list += "<select id='" + ind + "' class='selectpicker'  data-live-search='true'>";
            ind++;
            alert(ind);
            for (var i = 0; i < data.length; i++) {
                list += "<option>" + data[i] + "</option>";
            }
            list += '</select>';


        }

    });
    return list;
}
    $('.selectpicker').selectpicker({
        style: 'btn-info',
    });

    $('.selectpicker').change(function () {
        var slecteditem = $(this).find("option:selected").val();
        alert(slecteditem);
    });


    $('#add').click(function (){
      //  $('body').append(list);
        var slecteditem = $('#myselect').find("option:selected").val();
        alert(slecteditem);
        var slecteditem2 = $('#myselect2').find("option:selected").val();
        alert(slecteditem2);
        var slecteditem3 = $('#1').find("option:selected").val();
        alert(slecteditem3);


    });
    $('#add2').click(function () {
        var list = getList();
        $('body').append(list);
        $('.selectpicker').selectpicker({
            style: 'btn-info',
        });
    });
});