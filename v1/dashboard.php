<!DOCTYPE html>
<html lang="en-gb" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="shortcut icon" type="image/png" href="https://via.placeholder.com/16x16">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/hyper.css?v=1.7" />
    <script src="../js/uikit.js"></script>
    <?php
    session_start();
    $userLogged = false;
    $isAdmin = false;
    $is_active = false;
    $access_tok = 'null';
    if (isset($_SESSION['username'])) {
        $userLogged = true;
        if ($_SESSION['roles'] === "admin") {
            $isAdmin = true;
        }
        if ($_SESSION['status'] === 'active') {
            $is_active = true;
        }
        if ($_SESSION['access'] !== null) {
            $access_tok = $_SESSION['access'];
        }
    }
    if ($userLogged !== true) {
        return header("location: ./?message=user_not_logged");
    }


    ?>
</head>

<body>

    <?php include "./include/header.php"; ?>

    <div class="uk-section uk-section-muted">
        <div class="uk-container">
            <div class="uk-background-default uk-border-rounded uk-box-shadow-small">
                <div class="uk-container uk-container-xsmall uk-padding-large">
                    <article class="uk-article">
                        <h1 class="uk-article-title">Flex Dashboard
                            <p style="float:right;">
                                <label class="switch">
                                    <input type="checkbox" onclick="darkLight()" id="checkBox">
                                    <span class="slider"></span>
                                </label>
                            </p>
                        </h1>
                        <div class="uk-article-content">
                            <?php if ($_SESSION['roles'] === 'admin') { ?>
                                <p class="uk-text-lead uk-text-muted">Manage your gates & settings <a href="./gates?utm_source=dashboard" class="access_link">here</a></p>
                               
                                <!-- card one  -->
                                <!-- <div class="uk-card uk-card-category hyper_mt uk-card-default uk-card-hover uk-card-body uk-inline uk-border-rounded uk-width-1-1">
                                    <a class="uk-position-cover" href="./gates"></a>

                                    <div class="uk-article-meta uk-flex uk-flex-middle">

                                        <div class="uk-border-circle uk-avatar-small s_logo"></div>
                                        <div>
                                            <h3><a href=""> Manage Gates</a> </h3>
                                            <span class="tag_required">Manage Gates</span>

                                        </div>
                                    </div>
                                </div> -->
                                <!-- card one  -->
                                <div class="uk-card uk-card-category hyper_mt uk-card-default uk-card-hover uk-card-body uk-inline uk-border-rounded uk-width-1-1">
                                    <a class="uk-position-cover" href="./addsk?add_new=true"></a>

                                    <div class="uk-article-meta uk-flex uk-flex-middle">

                                        <div class="uk-border-circle uk-avatar-small s_logo"></div>
                                        <div>
                                            <h3><a href=""> Manage API</a> </h3>
                                            <span class="tag_required">Add New Sk</span>

                                        </div>
                                    </div>
                                </div>

                                <!-- card one  -->
                                <div class="uk-card uk-card-category hyper_mt uk-card-default uk-card-hover uk-card-body uk-inline uk-border-rounded uk-width-1-1">
                                    <a class="uk-position-cover" href="./pending"></a>

                                    <div class="uk-article-meta uk-flex uk-flex-middle">

                                        <div class="uk-border-circle uk-avatar-small s_logo"></div>
                                        <div>
                                            <h3><a href=""> Pending Users</a></h3>
                                            <span class="tag_active">Manage Users</span>

                                        </div>
                                    </div>
                                </div>

                                 <!-- card one  -->
                                 <div class="uk-card uk-card-category hyper_mt uk-card-default uk-card-hover uk-card-body uk-inline uk-border-rounded uk-width-1-1">
                                    <a class="uk-position-cover" href="./bans"></a>

                                    <div class="uk-article-meta uk-flex uk-flex-middle">

                                        <div class="uk-border-circle uk-avatar-small s_logo"></div>
                                        <div>
                                            <h3><a href=""> Active Users</a></h3>
                                            <span class="tag_active">Manage Users</span>

                                        </div>
                                    </div>
                                </div>
                            <?php
                            } else  if ($is_active === true) {

                                include("./include/user_dash.php");
                            } else {

                            ?>
                                <h3 class="mtitle"> Your account status is <span class="tag_warn">pending</span></h3>

                                <p class="uk-text-lead uk-text-muted">Once the site admin approve your account you can use flex checker.</p>

                                <p class="uk-text-lead uk-text-muted">Here is your account token (keep it in safe place).</p>
                                <input type="text" class="uk-form-controls access_input" value="<?php echo $access_tok; ?>" readonly>

                            <?php
                            } ?>


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