<div class="well">
    <?php if ($this->session->flashdata('error')) { ?>
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

            <form action="/admin/questions/edit/<?php echo $this->mdl_questions->form_value("data[id]"); ?>" method="post">
                <label>Questions</label>
                <input type="text" name="data[question]" class="input-large" value="<?php echo $this->mdl_questions->form_value("data[question]"); ?>">
                <input type="submit" value="Update" class="btn btn-primary pull-right">
                <div class="clearfix"></div>
            </form>
            
        </div>
    </div>
</div>
