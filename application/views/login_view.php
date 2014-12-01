<div class="row">
    <div class="col">

        <h1 class="col-md-12">Shout Box</h1>

        <h2>Log In</h2>

        <div class="validation-errors">
        <?php
            if (isset($login_errors)) { echo $login_errors; }
        ?>
        </div>

        <form id="form-login" action="<?php echo base_url(); ?>index.php/login_controller/log_in" method="post" >
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" name="login" value="Log In">
        </form>

        <h2>Register</h2>

        <div class="validation-errors">
        <?php
            if (isset($new_account_errors)) { echo $new_account_errors; }
            if (isset($message)) { echo $message; }
        ?>
        </div>

        <form id="form-create-account" action="<?php echo base_url(); ?>index.php/login_controller/validate_new_account" method="post">
            <input type="text" name="username" placeholder="User Name">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <input class="btn btn-lg btn-primary" type="submit" name="create-account" value="Create Account">
        </form>

    </div>
</div>