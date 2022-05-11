<!DOCTYPE html>
<html lang="en-gb" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="shortcut icon" type="image/png" href="https://via.placeholder.com/16x16" >
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/hyper.css?v=1.1" />
    <script src="../js/uikit.js"></script>
    <?php
  include "../config.php";
  session_start();
  $userLogged = false;
  $myip = $hyper->get_user_ip();
  if(isset($_SESSION['username'])){
    $userLogged = true;
      header("location: ./dashboard?source_utm=create_user");
    
  }
  
  $message ="";
  if(isset($_POST['create_token'])){
    $username = $_POST['username'];
    $password = 'hyper-'.md5($hyper->gen_tok(10));
$sel1 = "SELECT * From users where ip='".$hyper->get_user_ip()."'";
$sel1Done =mysqli_query($connect, $sel1);

    if(mysqli_num_rows($sel1Done) <=0){
   
    $sel = "INSERT INTO users (username, password, ip) VALUES ('$username', '$password','$myip')";
   
    
    if ($connect->query($sel) === TRUE) {
        $_SESSION['username'] = $username;
        $_SESSION['access'] = $password;
        $_SESSION['roles'] = 'user';
        $_SESSION['status'] = 'inactive';
        $hyper->redirect_to("./dashboard?_user_created=true&show_welcome=true&is_account_active=false");
    } else {
      header("location: ./create?message=user_err&-user_created=false");
      
    }
}else {
    $hyper->redirect_to("./create?_user_created=false&message=ip_already_exists");
}

    $connect->close();

  }
  ?>
</head>

<body>

<?php include"./include/header.php"; ?>

<div class="uk-section uk-section-muted">
  <div class="uk-container">
    <div class="uk-background-default uk-border-rounded uk-box-shadow-small">
      <div class="uk-container uk-container-xsmall uk-padding-large">
        <article class="uk-article">
          <h1 class="uk-article-title">Flex Checker</h1>
          <div class="uk-article-content">
              <?php
              if ($hyper->get_parameter("message", "ip_already_exists")) {
                echo $hyper->create_notice_bar(
                    array(
                        "text" => "You can't create multiple account.",
                        "css" => "text-danger",
                        "ele"=>"p"
                    )
                );
            } else if ($hyper->get_parameter("message", "user_err")) {
                echo $hyper->create_notice_bar(
                    array(
                        "text" => "Unable to create new account.",
                        "css" => "text-danger",
                        "ele"=>"p"
                    )
                );
            }
              ?>
            <p class="uk-text-lead uk-text-muted">Already have access code login<a href="./?_login=create_session" class="access_link"> here</a></p>
            <form class="uk-form-stacked uk-margin-medium-top" method="POST" action="">
              <div class="uk-margin-bottom">
                <label class="uk-form-label" for="name">please enter an username</label>
                <div class=" hyper_login uk-form-controls">
                  <input id="name" class="hyper_input uk-input uk-border-rounded" name="username" 
                  type="text" placeholder="Enter Username Here" required>
                </div>
              </div>
              <div class="uk-text-center">
                <input class="uk-button uk-button-primary uk-border-rounded" name="create_token" type="submit" value="Create Code">
              </div>
            </form>
          </div>
        </article>
      </div>
    </div>
  </div>
</div>


<?php include './include/footer.php'; ?>

<script src="../js/awesomplete.js"></script>
<script src="../js/custom.js"></script>


</body>

</html>