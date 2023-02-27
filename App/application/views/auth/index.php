<?php echo form_open('auth', array('class' => 'form-signin')); ?>
<?php echo form_fieldset(''); ?>
    <img class="mb-4" src="<?php echo asset_url('img/logo.png' , ''); ?>" width="72" height="57">

    <?php
    if (validation_errors() == TRUE) {
        echo validation_errors('<div class="alert alert-danger" role="alert">','</div>');
    }

    echo $this->session->flashdata('errors');    
    ?>

    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">      
      <?php echo form_input(array('id' => 'email', 'type' => 'email', 'name' => 'email', 'class' => 'form-control', 'placeholder' => 'name@example.com', 'required' => ''), set_value('email'), 'autofocus'); ?>
      <label for="email">E-mail</label>
    </div>
    <div class="form-floating">              
      <?php echo form_password(array('id' => 'password', 'name' => 'password', 'class' => 'form-control', 'placeholder' => 'Password', 'required' => ''), set_value('password')); ?>
      <label for="password">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
<?php echo form_close(); ?>
<p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>