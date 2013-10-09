<form method="post" action="/users/forgot_pass" accept-charset="UTF-8">

    <div class="content">

        <fieldset>
            <legend><?php echo lang('change_password'); ?></legend>

            <?php if (@!$user) { ?>
                <div class="control-group">
                    <label class="control-label">User Name</label>
                    <div class="controls">
                        <input type="text" name="data[email]" id="email">
                        <input class="btn" type="submit" id="sign-up" value="Forgot Password">
                    </div>
                </div>
            <?php } else { ?>

                <?php echo $user->name; ?>

                Click Here to change the pass <a href='/users/new_pass/?token=<?php echo $token; ?>'>CLICK</a>

            <?php } ?>
        </fieldset>

    </div>

</form>