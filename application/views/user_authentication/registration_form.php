


<div class = "container_log_in text-center"> 
<main class="signin_from_main border">
  <?php echo form_open('user_authentication/signup'); ?>
    <h1 class="mb-3 h3 fw-normal">Create account</h1>
    <h1 class="mb-3 h3 fw-normal text-danger"><?php echo validation_errors(); ?></h1>

    <div class="form-floating">
      <label for="floatingInput">Name</label>
      <input placeholder="First" type="text" name="name" id="name" >
    </div>
    <div class="form-floating">
      <label for="floatingInput">Secondname</label>
      <input placeholder="Second" type="text" name="secondname" id="name" >
    </div>
    <div class="form-floating">
      <label for="floatingInput">Email</label>
      <input placeholder="email.email@example.com" type="email" name="email" id="email" >
    </div>
    <div class="form-floating">
      <label for="floatingInput">Telephone number</label>
      <input placeholder="070000000" type="text" name="tel" id="tel" >
    </div>
    <div class="form-floating">
      <label for="floatingInput">Select an username</label>
      <input placeholder="Example" type="text" name="username" id="username" >
    </div>

    <p id = "error_m"></p>

    <div class="form-floating">
      <label for="floatingInput">Select a password</label>
      <input placeholder="***********" type="password" name="password" id="password_reg" >
    </div>
    <div class="form-floating">
      <label for="floatingInput">Repeat the password</label>
      <input placeholder="***********" type="password" onchange="password_check()" name="password_2" id="password_reg2" >
    </div><br>

    <input disabled id ="submit_reg" class="w-100 btn btn-lg btn-primary" type="submit" value="Create account " name="submit"/><br /><br />
    <a class="w-100 btn btn-lg btn-primary" href="<?php echo base_url() ?>">Click here to login</a>
        <?php echo form_close(); ?>
  </form>
</main>
</div>
