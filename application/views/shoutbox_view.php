<h1>Shout Box</h1>

<div class="row">
  <div class="col">

    <div class="row">
      <div class="col info">

        <div class="welcome">
        <?php $user_data = $this->session->userdata('logged_in'); ?>
        <?php echo 'Welcome ' . '<i>' . $user_data['username'] . '</i>'; ?>
        </div>

        <a class="logout" href="<?php echo base_url(); ?>index.php/shoutbox_controller/log_out">Log Out</a>

      </div>
    </div>

    <div class="shoutbox-area"></div>

    <div class="validation-errors"></div>

    <form id="form-shout" action="<?php echo base_url(); ?>index.php/shoutbox_controller/validate_shout" method="post">
        <textarea class="form-control" name="shout" placeholder="Message..."></textarea>
        <input class="btn btn-lg btn-primary" type="submit" name="post" value="Post">
    </form>

  </div>
</div>