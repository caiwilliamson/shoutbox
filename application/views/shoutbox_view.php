<!DOCTYPE html>

<html lang="en">
    <head>
        <script type=text/javascript src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script type=text/javascript src="<?php echo base_url(); ?>assets/js/shoutbox_js.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/bootstrap.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
        <title>Shout Box</title>
    </head>
    <body>
        <div class="container">
            <div class="background">

                <div class="row">
                    <h1 class="col-md-12">Shout Box</h1>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?php $user_data = $this->session->userdata('logged_in'); ?>
                        <?php echo 'Welcome ' . $user_data['username']; ?>
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-sm btn-default pull-right" href="<?php echo base_url(); ?>index.php/shoutbox_controller/log_out">log out</a>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="shoutbox-area"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="validation-errors"></div>
                    </div>
                </div>

                <div class="row">
                    <form id="form-shout" action="<?php echo base_url(); ?>index.php/shoutbox_controller/validate_shout" method="post">
                        <div class="col-md-9 no-pad-right">
                            <textarea class="form-control" name="shout" placeholder="Message..."></textarea>
                        </div>
                        <div class="col-md-3">
                            <input class="btn btn-lg btn-primary" type="submit" name="post" value="Post">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </body>
</html>