
<?php
$userId = $userInfo->pet_id;
$name = $userInfo->Fname.' '.$userInfo->Mname.' '.$userInfo->Lname;
$title = $userInfo->title;
$description = $userInfo->description;
$pet_img = $userInfo->pc_image;
$posted_date = $userInfo->posted_date;
$address = $userInfo->HAddress;

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Cruelty Posts
        
    </h1>
</section>
<div class="col-md-4">
</div>
<section class="content">

    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <?php
          if($userInfo->Remarks=="Pending"){
           $color="red";
           $hid="";
           $hide="hidden";
       }else{
           $color="Green";
           $hid="hidden";
           $hide="";
       }

       ?>

       <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Cruelty Posts</h3><br>
            <h1 class="box" align="center" style="color: <?php echo $color;?>;"> <?php echo "Status"." ".$userInfo->Remarks;?></h1>
        </div><!-- /.box-header -->
        <!-- form start -->

        <form role="form" action="<?php echo base_url() ?>editUser" method="post" id="editUser" role="form">
            <div class="box-body">
                <div class="row">
                   <div class="col-md-12">                                
                    <div class="form-group">
                      <H1 for="Type"  style="  display: block;text-align: center;line-height: 150%;">Title</H1>
                      <H3  style="  display: block;text-align: center;line-height: 150%;"><?php echo $title; ?></H3>

                      
                      <img style=' display: block; margin-left: auto; margin-right: auto;' src="<?php echo base_url(); ?>assets/images/<?php echo $pet_img; ?>" name="pet_img" width='240px' height='240px' >
                  </div>

              </div>
              <label for="fname" style="  display: block;text-align: center;line-height: 150%;"><?php  echo 'Sender Name: '. $name; ?></label>
              <label for="fname" style="  display: block;text-align: center;line-height: 150%;"><?php  echo 'Sender Address:  '. $address; ?></label>
              <label for="fname" style="  display: block;text-align: center;line-height: 150%;"><?php  echo 'Posted Date - '. $posted_date; ?></label>

              
              
              <div class="col-md-12" > 
                <div class="form-group">
                 
                    <label for="Breed">Desciption</label>
                    <div class="well"  style="  display: block;line-height: 150%;" >
                       <H3> <?php echo $description; ?></H3>
                   </div>
               </div>
           </div>
           
       </div>

   </div>
   <?php echo form_open('User/updateremarks')?>
   <div align="right" class="container" <?php echo $hid;?>  >
      
    <button class="btn btn-md btn-info" type="submit" >Mark as Done <i class="fa fa-check-circle"></i></button>
    <input type="hidden" name="petid" id="petid" value="<?php echo $userInfo->pet_id; ?>">
</form>
</div>
<div align="right" class="container" <?php echo $hide;?>  >

    <button class="btn btn-md btn-danger" type="submit" >Revert Action<i class="fa fa-times"></i></button>
</div>



<div class="box-footer">
    <!-- <input type="submit" class="btn btn-primary" value="Submit" />
        <input type="reset" class="btn btn-default" value="Reset" /> -->
    </div>
</div>
</div><!-- /.box-body -->


</form>

<div class="col-md-4">
    <?php
    $this->load->helper('form');
    $error = $this->session->flashdata('error');
    if($error)
    {
        ?>
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $this->session->flashdata('error'); ?>                    
        </div>
    <?php } ?>
    <?php  
    $success = $this->session->flashdata('success');
    if($success)
    {
        ?>
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php } ?>

    <div class="row">
        <div class="col-md-12">
            <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
        </div>
    </div>
</div>
</div>    
</section>
</div>

<script src="<?php echo base_url(); ?>assets/js/editUser.js" type="text/javascript"></script>