<!DOCTYPE html>

<html lang="en">
    <head>
        <script type=text/javascript src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/bootstrap.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">       
        <title>Shout Box Login</title>
    </head>
    <body>
        <div class="container">
            <div class="background">

                <div class="row">
                    <h1 class="col-md-12">Shout Box Login</h1>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <h3>Log In</h3>
                        <?php
                            if (isset($login_errors)) { echo $login_errors; }
                        ?>
                        <form id="form-login" action="<?php echo base_url(); ?>index.php/login_controller/log_in" method="post" >
                        <input class="form-control" type="email" name="email" placeholder="Email">
                        <input class="form-control" type="password" name="password" placeholder="Password">
                        <input class="btn btn-lg btn-success" type="submit" name="login" value="Log In">
                        </form>
                    </div>
                    <div class="col-md-6">
                        <h3>Register</h3>
                        <?php
                            if (isset($new_account_errors)) { echo $new_account_errors; }
                            if (isset($message)) { echo $message; }
                        ?>
                        <form id="form-create-account" action="<?php echo base_url(); ?>index.php/login_controller/validate_new_account" method="post">
                        <input class="form-control" type="text" name="username" placeholder="User Name">
                        <input class="form-control" type="email" name="email" placeholder="Email">
                        <input class="form-control" type="password" name="password" placeholder="Password">
                        <input class="btn btn-lg btn-primary" type="submit" name="create-account" value="Create Account">
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </body>
</html>