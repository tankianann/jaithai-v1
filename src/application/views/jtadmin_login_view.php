<?php showStatusMessage($this->session->userdata('statusmessage')); ?>
<?php $this->session->unset_userdata('statusmessage'); ?>
<div class="loginform">
<?php _e(form_open(). formSubmitted()); ?>	
	<p><strong>Please Login</strong></p>
	<label>Username</label><input type="text" name="username" class="textbox w200"/><br />
	<label>Password</label><input type="password" name="password" class="textbox w200 "/><br />
	<input type="submit" class="button mleft100" value="Login" />
<?php _e(form_close()); ?>
</div>