


<div class = "container_log_in text-center"> 
<main class="signin_from_main border">
  <?php echo form_open('user_authentication/signup'); ?>
    <h1 class="mb-3 h3 fw-normal">Create account</h1>
    <h1 class="mb-3 h3 fw-normal text-danger"><?php echo validation_errors(); ?></h1>

    <div class="form-floating">
      <input placeholder="First" type="text" name="name" id="name" >
      <label for="floatingInput">Name</label>
    </div>
    <div class="form-floating">
      <input placeholder="Second" type="text" name="secondname" id="name" >
      <label for="floatingInput">Secondname</label>
    </div>
    <div class="form-floating">
      <input placeholder="email.email@example.com" type="email" name="email" id="email" >
      <label for="floatingInput">Email</label>
    </div>
    <div class="form-floating">
      <input placeholder="Example" type="text" name="tel" id="tel" >
      <label for="floatingInput">Telephone number</label>
    </div>
    <div class="form-floating">
      <input placeholder="Example" type="text" name="username" id="username" >
      <label for="floatingInput">Select an username</label>
    </div>
    <div class="form-floating">
      <input placeholder="***********" type="password" name="password" id="username" >
      <label for="floatingInput">Select a password</label>
    </div>

    <input class="w-100 btn btn-lg btn-primary" type="submit" value="Create account " name="submit"/><br /><br />
    <a class="w-100 btn btn-lg btn-primary" href="<?php echo base_url() ?>">Click here to login</a>
        <?php echo form_close(); ?>
  </form>
</main>
</div>
