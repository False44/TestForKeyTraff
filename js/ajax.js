"use strict"
var html,html2;
$.ajax({
    url:"http://" + window.location.host + "/handler.php",
    type: "post",
    data: {'KEY':123},
    success: getProducts
});
$.ajax({
    url:"http://" + window.location.host + "/handler-second.php",
    type: "post",
    data: {'KEYS':123},
    success: getProductsSort
});


function getProducts(data){
    let arr = JSON.parse(data);
    //console.log(arr);
    $.each(arr, function(key, value){
        html += "<tr><td>"+value.orders_num+"</td><td>"+value.name+"</td><td>"+value.price+"</td><td>"+value.count+"</td><td>"+value.fio+"</td></tr>"
    });
    $("#work-table tbody").html(html);
}
function getProductsSort(data){
    let arr = JSON.parse(data);
    console.log(arr);
    $.each(arr, function(key, value){
        html2 += "<tr><td>"+value.name+"</td><td>"+value.count+"</td><td>"+value.price+"</td></tr>"
    });
    $("#work-table-second tbody").html(html2);
}
