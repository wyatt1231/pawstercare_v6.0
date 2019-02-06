
<?php
$userId = $userInfo->pet_id;
$name = $userInfo->Fname.' '.$userInfo->Mname.' '.$userInfo->Lname;
$title = $userInfo->category;
$contact = $userInfo->Contact;
$email = $userInfo->Email;
$capt = $userInfo->offender_capt;
$description = $userInfo->description;
$pet_img = $userInfo->pc_name;
$posted_date = $userInfo->posted_date;
$address = $userInfo->HAddress;
$ofaddress = $userInfo->address;
$ofname = $userInfo->offender_name;
$email=$userInfo->Email;
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
       }elseif($userInfo->Remarks=="Completed"){
         $color="Green";
         $hid="";
         $hide="hidden";
       }else{
         $color="gold";
         $hid="";
         $hide="hidden";
       }

       ?>
       <!--  <form role="form" action="<?php echo base_url() ?>user/updateremarks" method="post" id="editAdopter" role="form"> -->
        <div class="box box-primary">
          <div class="box-header">

           <!--  <h3 class="box" align="" style="color: <?php echo $color;?>;"> <?php echo "Status"." : ".$userInfo->Remarks;?></h3> -->
         </div><!-- /.box-header -->
         <!-- form start -->

         <form role="form" action="<?php echo base_url() ?>editUser" method="post" id="editUser" role="form">
          <div class="box-body">
            <div class="row">
             <div class="col-md-6">                                
              <div class="form-group">
                <h3 class="box-header" align="center" style="color: <?php echo $color;?>;"> <?php echo "Status"." : ".$userInfo->Remarks;?></h3>
                <hr>
                <H3 for="Type"  style="  display: block;text-align: center;line-height: 150%;">Type of Cruelty</H3>
                <H2  style="  display: block;text-align: center;line-height: 150%;"><?php echo $title; ?></H2>
                 <div class="col-md-12">
                    <div class="col-md-3">    
                    </div>
                           <div class="col-md-3">    
  <a   class="btn btn-md btn-app "  data-toggle="modal" data-target="#imgs"   type="button" ><i class="fa  fa-video-camera"></i>Show Images</a>
    </div>
  <div class="col-md-3">    
    <a   class="btn btn-md btn-app"  data-toggle="modal" data-target="#vids"   type="button" ><i class="fa fa-camera"></i>Show Videos</a>
  </div>
    <div class="col-md-3">    
                    </div>
    </div>
<!-- 
                <img style=' display: block; margin-left: auto; margin-right: auto;' src="<?php echo base_url(); ?>assets/images/<?php echo $pet_img; ?>" name="pet_img" width='240px' height='240px' > -->
              
              </div>

            </div>

       
            <div align="justify" class="container">
              <h3 align="CENTER">INFORMATION</h3>
              <hr>
              <label for="fname" style="  display: block;text-align: justify;line-height: 120%;"><?php  echo 'Sender Name: '. $name; ?></label>
              <label for="fname" style="  display: block;text-align: justify;line-height: 120%;"><?php  echo 'Sender Address:  '. $address; ?></label>
              <label for="fname" style="  display: block;text-align: justify;line-height: 120%;"><?php  echo 'Sender Email:  '. $email; ?></label>
              <label for="fname" style="  display: block;text-align: justify;line-height: 120%;"><?php  echo 'Sender Contact No.:  '. $contact; ?></label>
              <label for="fname" style="  display: block;text-align: justify;line-height: 120%;"><?php  echo 'Offenders Name: '. $ofname; ?></label>
               <label for="fname" style="  display: block;text-align: justify;line-height: 120%;"><?php  echo 'Offenders Address:  '. $ofaddress; ?> <?php  echo ' | Barangay Captain:  '. $capt; ?></label>
              <label for="fname" style="  display: block;text-align: justify;line-height: 120%;"><?php  echo 'Posted Date - '. $posted_date; ?></label>
               


              <hr>
              <div class="col-md-5" > 
                <div class="form-group">

                  <label for="Breed">Report</label>
                  <div class="well"  style="  display: block;line-height: 150%;" >
                   <H3> <?php echo $description; ?></H3>
                 </div>
               </div>
               <button class="btn btn-md btn-info"  data-toggle="modal" data-target="#done"   type="button" >Status Update <i class="fa fa-floppy-o"></i></button>
               <input type="hidden" name="petid" id="petid" value="<?php echo $userInfo->pet_id; ?>">
               <button   class="btn btn-md btn-warning"  data-toggle="modal" data-target="#log"   type="button" >Show Logs <i class="fa fa-file-text"></i></button>
               <input type="hidden" name="petid" id="petid" value="<?php echo $userInfo->pet_id; ?>">
             </div>

          

        
       </div>

       <div align="center" class="container" <?php echo $hid;?>  >



        <!--     </form> -->
      </div>
      <!--  <form role="form" action="<?php echo base_url() ?>user/revertremarks" method="post" id="editAdopter" role="form"> -->
       <div align="center" class="container" <?php echo $hide;?>  >

        <button class="btn btn-md btn-danger" type="button" data-toggle="modal" data-target="#revert">Revert Action <i class="fa fa-times"></i></button>
        <input type="hidden" name="petid" id="petid" value="<?php echo $userInfo->pet_id; ?>">

      </div>
      <!-- </form> -->
 </div>
  </div>


      <div class="box-footer">
        <div class="col-md-12">
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
    <!-- <input type="submit" class="btn btn-primary" value="Submit" />
      <input type="reset" class="btn btn-default" value="Reset" /> -->
    </div>
  </div>
</div><!-- /.box-body -->


</form>


</div>    
</section>
</div>

<script src="<?php echo base_url(); ?>assets/js/editUser.js" type="text/javascript"></script>

<!-- Modal -->
<div id="imgs" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Pet Cruelty Images</h4>
      </div>
      <div class="modal-body">

        <div class="col-md-12" > 
          <div class="form-group">
           <label for="Breed">Images</label>
           <?php
           if(!empty($imgs))
           {
            foreach ($imgs as $rl)
            {
              ?>
              <div class="well"  style="display: block;line-height: 150%;" >
                 <img style=' display: block; margin-left: auto; margin-right: auto;' src="<?php echo base_url()."petcruelty/$rl->pc_name" ?>" name="pet_img" width='240px' height='240px' >
             </div>

             <?php
           }
         }
         ?>


       </div>
     </div>

   </div>
   <div class="modal-footer">
<!-- 
    <button type="submit" class="btn btn-default" data-dismiss='modal'>Close</button>
    <input type="hidden" name="petid" id="petid" value="<?php echo $userInfo->pet_id; ?>">
  -->
</div>
</div>

</div>
</div>  


<!-- Modal -->
<div id="vids" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Pet Cruelty Videos</h4>
      </div>
      <div class="modal-body">

        <div class="col-md-12" > 
          <div class="form-group">
           <label for="Breed">Videos</label>
           <?php
           if(!empty($vids))
           {
            foreach ($vids as $rl)
            {
              ?>
              <div class="well"  style="display: block;line-height: 150%;" >
                <video controls style=' display: block; margin-left: auto; margin-right: auto;'>
                  <source src="<?php echo base_url()."petcruelty/$rl->pc_name" ?>"" type="video/mp4">
                </video>
             </div>

             <?php
           }
         }
         ?>


       </div>
     </div>

   </div>
   <div class="modal-footer">
<!-- 
    <button type="submit" class="btn btn-default" data-dismiss='modal'>Close</button>
    <input type="hidden" name="petid" id="petid" value="<?php echo $userInfo->pet_id; ?>">
  -->
</div>
</div>

</div>
</div>  


<!-- Modal -->
<div id="log" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Pet Cruelty Update Logs</h4>
      </div>
      <div class="modal-body">

        <div class="col-md-12" > 
          <div class="form-group">
           <label for="Breed">Logs</label>
           <?php
           if(!empty($log))
           {
            foreach ($log as $rl)
            {
              ?>
              <div class="well"  style="display: block;line-height: 150%;" >
               <H4><?php echo $rl->updates; ?></H4>
               <h6>Date: <?php echo $rl->date; ?></h6>
               <h6 align="right">Officer In Charge - <?php echo $rl->OIC ?></h6>
             </div>

             <?php
           }
         }
         ?>


       </div>
     </div>

   </div>
   <div class="modal-footer">
<!-- 
    <button type="submit" class="btn btn-default" data-dismiss='modal'>Close</button>
    <input type="hidden" name="petid" id="petid" value="<?php echo $userInfo->pet_id; ?>">
  -->
</div>
</div>

</div>
</div>  


<form role="form" action="<?php echo base_url() ?>user/updateremarks" method="post" role="form">


  <!-- Modal -->
  <div id="done" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="done">&times;</button>
          <h4 class="modal-title">What are the action taken for this pet cruelty report? </h4>
          <select class="form-control required" id="status" name="status">
            <option value="For Verification" <?php if("For Verification" =="For Verification"){ echo "selected";}   ?>>For Verification</option>

            <option value="Completed"<?php if("Completed" =="Completed"){ echo "selected";}   ?>>Completed</option>
            
          </select>
        </div>
        <div class="modal-body">

          <textarea rows="30"  type="text" name="reasons" class="form-control"  id="reasons" required></textarea>
        </div>
        <div class="modal-footer">

          <button type="submit" class="btn btn-default">Submit</button>
          <input type="hidden" name="petid" id="petid" value="<?php echo $userInfo->pet_id; ?>">
          <input type="hidden" name="name" id="name" value="<?php echo $name; ?>">
        </div>
      </div>

    </div>
  </div>  
</form>
<form role="form" action="<?php echo base_url() ?>user/revertremarks" method="post" role="form">
  <!-- Modal -->
  <div id="revert" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="revert">&times;</button>
          <h4 class="modal-title">Type your Password</h4>
        </div>
        <div class="modal-body">
          <input  type="Password" class="form-control" name="pass" id="pass" placeholder="Password">
          <input type="email" name="mail" id="mail" value="<?php echo $info->email ?>" hidden>
          <input type="hidden" name="adminname" id="adminname" value="<?php echo $info->name ?>">
        </div>

        <div class="modal-footer">

          <button type="submit" class="btn btn-default">Submit</button>
          <input type="hidden" name="petid" id="petid" value="<?php echo $userInfo->pet_id; ?>">

        </div>
      </div>

    </div>
  </div>
</form>