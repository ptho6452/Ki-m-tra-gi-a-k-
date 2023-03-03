<!DOCTYPE HTML>  
<html>
<head>
  <title></title>
  <style>
    .error {color: #FF0000;}
    form{
        margin-left:35%;
        margin-top:5%;
        max-width: 100%;
        
        width:500px;
        height:500px;
        color:violet;
        font-weight:700;
    }
    input{
        color:green;
    }
    #css{
        background-image: url('https://hinhgoc.net/upload/img/ht011.jpg?quality=100&width=700');
        width:100%;
        height:100%;
    }
    #clo{
        color:green;

    }
    #clo1{
        margin-left:15.2%;
    }
    .total{
        width:350px;
        height:200px;
        background-image: url('https://img.meta.com.vn/Data/image/2022/01/13/anh-dep-thien-nhien-3.jpg');
        color:yellow;
    }


   
  </style>
</head>
<body >  
<div class="container-">

<?php
error_reporting(0); 
$nameErr = $emailErr = $commentErr = $numberphoneErr="" ;
$name = $email = $numberphone = $comment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Tên không để trống";
  } else {
    $name = test_input($_POST["name"]);}
  
  if (empty($_POST["email"])) {
    $emailErr = "Email không để trống";
  } else {
    $email = test_input($_POST["email"]);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Định dạng email không đúng";
    }
  }
    
  if (empty($_POST["numberphone"])) {
    $numberphoneErr = "Số điện thoại không để trống";
  } else {
    $numberphone = test_input($_POST["numberphone"]);
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$numberphone)) {
      $numberphoneErr = "Số điện thoại không tồn tại";
    }
  }

  if (empty($_POST["comment"])) {
    $commentErr = "Nội dung không để trống";
  } else {
    $comment = test_input($_POST["comment"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<div id="css">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Họ và tên: <input  type="text" name="name" value="" style="width:200px; margin-left:10px;" <?php echo $name;?>">
  <span class="error" >* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="" style="width:200px; margin-left:29px<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Điện Thoại: <input type="text" name="numberphone" value="" style="width:200px<?php echo $numberphone;?>">
  <span class="error">* <?php echo $numberphoneErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40" id="clo"><?php echo $comment;?></textarea>
  <span class="error">* <?php echo $commentErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Gửi tin" id=clo1>  
</form>
</div>
<div class="total">
<?php
echo "<h2>Your Input:</h2>";
echo "<b>Name: ".$name."</b>";
echo "<br>";
echo "<b>E-mail: ".$email."</b>";
echo "<br>";
echo "<b>Điện thoại: ".$numberphone."</b>";
echo "<br>";
echo "<b>Comment: ".$comment."</b>";
?>
</div>

</body>
</html>
</div>