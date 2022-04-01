/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */

$(document).ready(function (){
    
    //name validation
   $(".name").change(function(){
      var name = $(".name").val();
      var name_rex = /^[a-zA-Z ]+$/;
      
      if(!name.match(name_rex) || (name.length == 0) || name.length < 2){
          alert("Invalid Name");
          $(".name").val('');
          $(".name").focus();
      }
   });
   //email validation
   $(".email").change(function(){
      var email = $(".email").val();
      var email_rex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      
      if(!email.match(email_rex)){
          alert("Invalid email address");
          $(".email").val('');
          $(".email").focus();
      }
   }); 
   //phone number validation
   $(".phone").change(function(){
      var phone = $(".phone").val();
      var phone_rex = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/;
      if(!phone.match(phone_rex) || phone.length < 10 ){
          alert("Invalid phone number");
          $(".phone").val('');
          $(".phone").focus();
      }
   });
});
