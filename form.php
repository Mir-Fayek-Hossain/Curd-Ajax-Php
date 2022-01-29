

<?php
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    $(".login").submit(function(event){
      event.preventDefault()
      var name = $(".logUname").val();
      var pass = $(".logUpass").val();
      $.post("login.php",{
        name:name,
        pass:pass
      },
      function(data){ 
        if(data.charAt(0)=="*"){
        $('.warning').html(data);
        }else{
        $('body').html(data);
        }
      })
    })
    $(".signin").submit(function(event){
      event.preventDefault()
      var name = $(".sigUname").val();
      var pass = $(".sigUpass").val();
      var cpass = $(".sigUcpass").val();
      $.post("register.php",{
        name:name,
        pass:pass,
        cpass:cpass,
      },
      function(data){ 
        if(data.charAt(0)=="*"){
        $('.warning').html(data);
        }else{
        $('body').html(data);
        }
      })
    })
    // changing button value and para value
    $(".formBtn").click(function(){
      $(".login").slideToggle("slow");
      $(".signin").slideToggle("slow");
      if (this.value == 'Login'){
        this.value = 'Signup';
        $(".formOptions p").text("Not yet signed up?");
      }
      else{
        this.value = 'Login';
        $(".formOptions p").text('Already signed up?');
      }
    });
  });
</script>
</head>
<style>
  *{
    padding: 0%;
    margin: 0%;
  }
  body{
    min-height: 100vh;
    background-image: url("https://i.pinimg.com/originals/29/5a/33/295a33f25e1e460b85d9ff5103518ada.jpg");
    background-size: cover;
    background-position: bottom;
  }

  .login{
    display: none;
  }

  .formContainer{
    position: absolute;
    top: 40%;
    left: 50%;
    transform: translate(-50%,-50%);
    padding: 50px 30px;    
    background-image: url("https://i.gifer.com/U8mr.gif");
    background-size: cover;
    background-position: bottom;
    opacity: 0.8;
    background-size: cover;
    background-position: bottom;
    border-radius: 20px;
    box-shadow: 0 5px 25px black;
  }
  .formContainer h3{
    padding-left: 10px;
    margin-bottom: 30px;
    border-left: 5px solid rgb(209, 90, 90);
  }

  .formContainer h3 span{
    color: rgb(224, 111, 58);
  }
  .formContainer .inputBox{
    position: relative;
    width: 300px;
    height: 40px;
    margin-bottom: 20px;
    background-color: white;
  }
  .formContainer .inputBox:last-child{
    
    background-color: transparent;
    margin-bottom: 0;
  }
  .formContainer .inputBox input{
    
    position: absolute;
    z-index: 1;
    background-color: transparent;
    width: 278px;
    border: 1px solid rgb(187, 121, 0);
    padding: 10px;
    border-radius: 5px;
    font-size: 16px;
    color: #111;
    font-weight: 300;
  }
  .formContainer .inputBox span{
    position: absolute;
    top:1px;
    left: 5px;
    padding: 10px;
    transition: .5s;
  }
  .formContainer .inputBox input:focus~ span,
  .formContainer .inputBox input:valid~ span{
    transform: translateX(3px) translateY(-10px);
    font-size: 13px;
    background-color:white ;
    padding: 0 8px 0 8px;
    z-index: 2;
    border-radius: 25%;
  }

  .formContainer .inputBox input[type="submit"]{
    color: white;
    border: none;
    max-width: 120px;
    cursor: pointer;
    font-size: 15px;
    font-weight: 500;
    box-shadow: 5px 5px 20px black;
    transition: .2s;
  }
  
  .formContainer .inputBox input[type="submit"]:hover{
    color: rgba(255, 255, 255, 0.452); 
    border-bottom: 2px solid rgba(255, 255, 255, 0.596);
    border-right: 2px solid rgba(255, 255, 255, 0.712);
  }
  .sig{
    background-image: url("https://media1.giphy.com/media/3o85xxAj5q3iR78fWE/source.gif");
    background-position: center;
  }
  .log{
    background-image: url("https://i.pinimg.com/originals/e7/a9/0f/e7a90f5673e7d0ed74ecae0992a8fc5a.gif");
    background-position: center;
  }
  .formOptions{
    position: absolute;
    top: 80%;
    left: 50%;
    transform: translate(-50%,-50%);
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  .formOptions p{
    margin-right: 15px;
    background-color: rgba(255, 255, 255, 0.658);
    padding: 7px;
    border-radius: 26px;
  }
  .formOptions input{
    background: linear-gradient(90deg,rgb(39, 38, 30),rgb(117, 117, 117) );
    color: white;
    border: none;
    cursor: pointer;
    font-size: 15px;
    font-weight: 500;
    box-shadow: 5px 5px 20px black;
    transition: .3s;
    padding: 10px;
    border-radius: 5px;
  }
  input:active{
    box-shadow: none;
  }
  
  .warning {
    margin-bottom:10px;
    display:grid;
    place-items:center;
    color: rgb(236, 57, 57);
    background-color: rgb(214, 202, 202);
  }
@media only screen and (max-width: 760px) {
  body{ 
    /* background-image: url("https://i.pinimg.com/originals/e7/a9/0f/e7a90f5673e7d0ed74ecae0992a8fc5a.gif"); */
  }
}
</style>
<body>
  <div class="signin formContainer">
    <h3>Discover the<br>latest trend now with <br> <span>VOGUE</span></h3>
    <form action="register.php" method="POST">
      <div class="inputBox">
        <input class="sigUname" type="text" name="name"  required="required">
        <span>User Name</span>
      </div>
      <div class="inputBox">
        <input class="sigUpass" type="password" name="pass" required="required">
        <span>Password</span>
      </div>
      <div class="inputBox">
        <input class="sigUcpass" type="password" name="cpass" required="required">
        <span>Confirm Password</span>
      </div>      
      <div class="warning">
      </div>
      <div class="inputBox">
        <input class="sig" type="submit" value="Sign in">
      </div>
    </form>
  </div>
  <div class="login formContainer">
    <h3>Discover the<br>latest trend now with <br> <span>VOGUE</span></h3>
    <form  method="POST">
      <div class="inputBox">
        <input class="logUname" type="text" name="name" required="required">
        <span>User Name</span>
      </div>
      <div class="inputBox">
        <input class="logUpass" type="password" name="pass" required="required">
        <span>Password</span>
      </div>
      <div class="warning">
      </div>
      <div class="inputBox">
        <input class="log" type="submit" value="Log in">
      </div>
    </form>
  </div>
  <div class="formOptions">
    <p>Already signed up?</p>
    <input type="button" class="formBtn" value="Login">
  </div>
</body>
</html>
