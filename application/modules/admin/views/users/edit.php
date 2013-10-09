<div class="well">  
<?php if($this->session->flashdata('error')) { ?>
   <div class="alert alert-error">
  <?php echo $this->session->flashdata('error'); ?>
  </div>
 <?php } else if ($this->session->flashdata('success')) { ?>
   <div class="alert alert-success">
    <?php echo $this->session->flashdata('success'); ?>
    </div> 
 <?php } ?> 
    <div id="myTabContent" class="tab-content">
     <div class="span3">
   
    <form action="/admin/users/edit/<?php echo $this->mdl_users->form_value("data[id]"); ?>" method="post">
    <label> Name</label>
    <input type="text" name="data[name]" class="input-large" value="<?php echo $this->mdl_users->form_value("data[name]"); ?>">
    
    <label>Email Address</label>
    <input type="email" name="data[email]" class="input-large" value="<?php echo $this->mdl_users->form_value("data[email]"); ?>">
    

    <label>Type</label>
    <input type="email" name="data[type]" class="input-large" value="<?php echo $this->mdl_users->form_value("data[type]"); ?>">
   
  <!--  <label>Password</label>
    <input type="password" name="password" class="span3">
    <label><input type="checkbox" name="terms"> I agree with the <a href="#">Terms and Conditions</a>.</label>     -->
    <input type="submit" value="Update" class="btn btn-primary pull-right">
    <div class="clearfix"></div>
    </form>
</div>
      </div>
  </div>
