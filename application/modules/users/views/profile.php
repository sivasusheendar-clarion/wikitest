<h1>Profile</h1>


<div class="well">
    <div class="row">
        <div class="span1"><a href="http://critterapp.pagodabox.com/others/admin" class="thumbnail"></a></div>
        <div class="span3">
            <p></p>
            <p><strong><?php echo $this->session->userdata('user_name') ?></strong></p>
            <span class=" badge badge-warning"><a id="profile_button" href="#">Edit Profile</a></span>
            <!--<span class=" badge badge-warning"></span> <span class=" badge badge-info">15 followers</span>-->
        </div>
    </div>
</div>


<div class=" well" id="profile">

     <legend>Edit User </legend>
    
    <?php echo $this->session->flashdata('message'); ?>

    <form action="/users/profile/<?php echo $this->mdl_users->form_value("data[id]"); ?>" method="post">
        <label> Name</label>
        <input type="text" name="data[name]" class="input-large" value="<?php echo $this->mdl_users->form_value("data[name]"); ?>">

        <label>Email Address</label>
        <input type="email" name="data[email]" class="input-large" value="<?php echo $this->mdl_users->form_value("data[email]"); ?>">

        <input type="submit" value="Update" class="btn btn-primary pull-right">
    </form>


</div>

<div class="well" id="profile">

   <?php echo $this->layout->load_view('users/form_change_password'); ?>

</div>
