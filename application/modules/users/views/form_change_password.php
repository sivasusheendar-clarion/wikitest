<form method="post" action="/users/change_password/<?php echo $this->mdl_users->form_value("data[id]"); ?>" class="form-horizontal">

    <div class="content">

        <div class='error'><?php echo $this->session->flashdata('alert_success'); ?> </div>

        <legend><?php echo "Change Password"; // lang('change_password');   ?></legend>

        <div class="control-group">
            <label class="control-label">Password: </label>
            <div class="controls">
                <input type="password" name="user_password" id="user_password">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Confirm Password: </label>
            <div class="controls">
                <input type="password" name="user_passwordv" id="user_passwordv">
            </div>
        </div>

        <input class="btn" type="submit" id="sign-up" value="Save new password">

    </div>

</form>