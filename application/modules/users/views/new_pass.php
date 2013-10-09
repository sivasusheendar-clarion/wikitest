<form method="post" action="/users/new_pass" accept-charset="UTF-8">
    <div class="content">

        <fieldset>
            <legend><?php echo lang('set_new_password'); ?></legend>

            <div class='error'><?php echo $this->session->flashdata('alert_success'); ?>

                <div class="control-group">

                    <label class="control-label">Password</label>
                    <div class="controls">
                        <input type="text" name="user_password" id="email">
                    </div>
                    <label class="control-label">Confirm - Password</label>
                    <div class="controls">
                        <input type="text" name="user_passwordv" id="email">
                        <input type="hidden" name="data[token]" id="email" value='<?php echo $token; ?>'>
                    </div>
                    <input class="btn" type="submit" id="sign-up" value="Save new password">
                </div>
        </fieldset>
    </div>
</form>