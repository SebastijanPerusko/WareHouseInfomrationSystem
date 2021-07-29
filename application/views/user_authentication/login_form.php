<?php
if (isset($logout_message)) {
    echo "<div class='message'>";
    echo $logout_message;
    echo "</div>";
}
?>
<?php
if (isset($message_display)) {
    echo "<div class='message'>";
    echo $message_display;
    echo "</div>";
}
?>


<div class = "container_log_in text-center"> 
<main class="signin_from_main border">
  <?php echo form_open('user_authentication/signin'); ?>
    <h1 class="mb-3 h3 fw-normal">Sign in</h1>

    <div class="form-floating">
      <input type="text" name="username" id="name" placeholder="Example">
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input  type="password" name="password" id="password" placeholder="**********">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <!--<label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>-->
    </div>
    <input class="w-100 btn btn-lg btn-primary" type="submit" value="Login " name="submit"/><br /><br />
    <a class="w-100 btn btn-lg btn-primary" href="<?php echo base_url() ?>index.php/user_authentication/show">Create your account</a>
        <?php echo form_close(); ?>
  </form>
</main>
</div>


