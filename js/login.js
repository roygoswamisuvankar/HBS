/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */


$(document).ready(function(){
   
    $("#phone").change(function(){
       var phone = $("#phone").val();
       var phone_rex = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/;
       
       if(!phone.match(phone_rex) || phone.length < 10){
           alert("Invalid phone number!");
           $("#phone").val('');
           $("#phone").focus();
       }
    });
});