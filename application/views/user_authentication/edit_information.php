


<div class = "container_log_in text-center"> 
<main class="signin_from_main border">
  <?php echo form_open('user_authentication/edit_inf'); ?>
    <h1 class="mb-3 h3 fw-normal">Create account</h1>
    <h1 class="mb-3 h3 fw-normal text-danger"><?php echo validation_errors(); ?></h1>

    <div class="form-floating">
      <input placeholder="First" type="text" name="name" id="name" value = "<?php echo $user_item['ime'] ?>" >
      <label for="floatingInput">Name</label>
    </div>
    <div class="form-floating">
      <input placeholder="Second" type="text" name="secondname" id="name" value = "<?php echo $user_item['priimek'] ?>" >
      <label for="floatingInput">Secondname</label>
    </div>
    <div class="form-floating">
      <input placeholder="email.email@example.com" type="email" name="email" id="email" value = "<?php echo $user_item['email'] ?>" >
      <label for="floatingInput">Email</label>
    </div>
    <div class="form-floating">
      <input placeholder="Example" type="text" name="tel" id="tel" value = "<?php echo $user_item['tel'] ?>" >
      <label for="floatingInput">Telephone number</label>
    </div>
    <div class="form-floating">
      <input placeholder="Example" type="text" name="username" id="username" value = "<?php echo $user_item['username'] ?>">
      <label for="floatingInput">Select an username</label>
    </div>

    <input class="w-100 btn btn-lg btn-primary" type="submit" value="Edit information" name="submit"/><br /><br />
  </form>
</main>
</div>
