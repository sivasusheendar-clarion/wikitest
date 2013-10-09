    <div class="row-fluid">
    <div class="span3">
    </div>
    <div class="span8">
     <form class="form-horizontal" id="form-signup">
    <fieldset>
    <!-- Address form -->
     
    <h2>Address</h2>
     
    <!-- full-name input-->
    <div class="control-group">
    <label class="control-label">Full Name</label>
    <div class="controls">
    <input id="full-name" name="full-name" type="text" placeholder="full name"
    class="input-xlarge">
    <p class="help-block"></p>
    </div>
    </div>
    <!-- address-line1 input-->
    <div class="control-group">
    <label class="control-label">Address Line 1</label>
    <div class="controls">
    <input id="address-line1" name="address-line1" type="text" placeholder="address line 1"
    class="input-xlarge">
    <p class="help-block">Street address, P.O. box, company name, c/o</p>
    </div>
    </div>
    <!-- address-line2 input-->
    <div class="control-group">
    <label class="control-label">Address Line 2</label>
    <div class="controls">
    <input id="address-line2" name="address-line2" type="text" placeholder="address line 2"
    class="input-xlarge">
    <p class="help-block">Apartment, suite , unit, building, floor, etc.</p>
    </div>
    </div>
    <!-- city input-->
    <div class="control-group">
    <label class="control-label">City / Town</label>
    <div class="controls">
    <input id="city" name="city" type="text" placeholder="city" class="input-xlarge">
    <p class="help-block"></p>
    </div>
    </div>
    <!-- region input-->
    <div class="control-group">
    <label class="control-label">State / Province / Region</label>
    <div class="controls">
    <input id="region" name="region" type="text" placeholder="state / province / region"
    class="input-xlarge">
    <p class="help-block"></p>
    </div>
    </div>
    <!-- postal-code input-->
    <div class="control-group">
    <label class="control-label">Zip / Postal Code</label>
    <div class="controls">
    <input id="postal-code" name="postal-code" type="text" placeholder="zip or postal code"
    class="input-xlarge">
    <p class="help-block"></p>
    </div>
    </div>
    <!-- country select -->
    <div class="control-group">
    <label class="control-label">Country</label>
    <div class="controls">
    <select id="country" name="country" class="input-xlarge">
    <option value="" selected="selected">(please select a country)</option>
    <option value="AF">Afghanistan</option>
   
    </select>
    </div>
    </div>
    <!-- country select -->
    <div class="control-group">
    
    <div class="controls">
	    <button class="btn btn-large btn-primary" type="button" id="sign-up">Signup</button>
    </div>
    </div>
 
    </fieldset>
    </form>
    </div>
    </div>
    
    <script src="<?php echo base_url()?>assets/default/js/application/_user.js"></script>
    <script>
    $(function()
            { alert('ahi');
		$("#sign-up").click(function(){alert('hai');
			return User.signup();
		});
	});
    </script>