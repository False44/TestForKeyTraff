"use strict"
var html;
$.ajax({
    url:"http://" + window.location.host + "/handler.php",
    type: "post",
    data: {'KEY':123},
    success: getProducts
});



function getProducts(data){
    let arr = JSON.parse(data);
    console.log(arr);
    $.each(arr, function(key, value){
        html += "<tr><td>"+value.orders_num+"</td><td>"+value.name+"</td><td>"+value.price+"</td><td>"+value.count+"</td><td>"+value.fio+"</td></tr>"
    });
    $("#work-table tbody").html(html);
}
