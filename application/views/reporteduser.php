<?php
$owner_img = $userInfo->owner_img;
$userId = $userInfo->id;
$Fname = $userInfo->Fname;
$Mname = $userInfo->Mname;
$Lname = $userInfo->Lname;
$Haddress = $userInfo->HAddress;
$Birthdate = $userInfo->Birthdate;
$Cstatus = $userInfo->CStatus;
$Oaddress = $userInfo->OAddress;
$email = $userInfo->Email;
$Occupation = $userInfo->Occupation;
$Salary = $userInfo->Salary;
$Status = $userInfo->Status;
/*$Status = $useranswer->Status;
$img = $useranswer->pet_img;
$petname=$useranswer->name;
$petbreed=$useranswer->Breed;
$petcolor=$useranswer->color;
$petage=$useranswer->age;
$petsize=$useranswer->size;
$petgender=$useranswer->gender;*/
/*
$petid = $useranswer->pet_id;
$q1 = $useranswer->q1;

$q2 = $useranswer->q2;
$q3 = $useranswer->q3;

$q4 = $useranswer->q4;
$q5 = $useranswer->q5;
$q6 = $useranswer->q6;

$q7 = $useranswer->q7;
$q8 = $useranswer->q8;
$q9 = $useranswer->q9;

$q10 = $useranswer->q10;
$q11 = $useranswer->q11;*/
/*if(is_null($q1)){
$q1='n/a';
}if(is_null($q2)){
$q2='n/a';
} if(is_null($q3)){
$q3='n/a';
} if(is_null($q4)){
$q4='n/a';
} if(is_null($q5)){
$q5='n/a';
} if(is_null($q6)){
$q6='n/a';
} if(is_null($q7)){
$q7='n/a';
} if(is_null($q8)){
$q8='n/a';
} if(is_null($q9)){
$q9='n/a';
} if(is_null($q10)){
$q10='n/a';
} if(is_null($q11)){
$q11='n/a';
}*/
?>
<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> User Management
    </h1>
</section>

<section class="content">
        <div class="row">
      <div class="col-xs-12 text-right">
        <div class="form-group">
 <a class="btn btn-warning" href="#"  data-toggle="modal" data-target="#reason" ><i class="fa fa-flag"></i>Reasons of being reported</a>
 </div>
 </div>
  </div>
 
 


          <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Check User Details</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <div class="col-md-12">
                <div class="box box-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-aqua-active">
                      <h3 class="widget-user-username"><?php echo $Fname . ' ' . $Lname; ?> </h3>
                      <h5 class="widget-user-desc"><?php echo $Occupation; ?><br></h5><h5 id='stat'>Status: <?php echo $Status; ?></h5>

                  </div>
                  <div class="widget-user-image">
                      <img class="img-circle"  src="<?php echo base_url(); ?>uploads/<?php echo $owner_img; ?>"  alt="User Avatar">
                  </div>
                  <div class="box-footer">
                      <div class="row">
                        <div class="col-sm-4 border-right">
                          <div class="description-block">

                          </div>
                          <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4 border-right">
                          <div class="description-block">
                            <h5 class="description-header"></h5>
                            <span class="description-text"></span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4">
                      <div class="description-block">

                      </div>
                      <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
              </div>
              <!-- /.row -->
          </div>
      </div>
  </div>
  <form role="form" id="editAdopter" >
    <div class="box-body">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="fname">First Name</label>
                    <input type="text" class="form-control" id="fname" placeholder="First Name" name="fname" value="<?php echo $Fname; ?>" maxlength="128" disabled>
                    <input type="hidden" value="<?php echo $userId; ?>" name="userId" id="userId" />

                </div>

            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="fname">Middle Name</label>
                    <input type="text" class="form-control" id="mname" placeholder="Middle Name" name="mname" value="<?php echo $Mname; ?>" maxlength="128" disabled>

                </div>
            </div>


            <div class="col-md-4">
                <div class="form-group">
                    <label for="fname">Last Name</label>
                    <input type="text" class="form-control" id="lname" placeholder="Last Name" name="lname" value="<?php echo $Lname; ?>" maxlength="128" disabled>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="fname">Home Address</label>
                    <input type="text" class="form-control" id="Haddress" placeholder="Home Address" name="Haddress" value="<?php echo $Haddress; ?>" maxlength="128" disabled>

                </div>

            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="fname">Birthdate</label>
                    <input type="text" class="form-control" id="Birthdate" placeholder="Birthdate" name="Birthdate" value="<?php echo $Birthdate; ?>" maxlength="128" disabled>

                </div>

            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="email">Civil Status</label>
                    <input type="text" class="form-control" id="Cstatus" placeholder="Civil Status" name="Cstatus" value="<?php echo $Cstatus; ?>" maxlength="128" disabled>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="fname">Office Address</label>
                    <input type="text" class="form-control" id="Oaddress" placeholder="Office Address" name="Oaddress" value="<?php echo $Oaddress; ?>" maxlength="128"disabled>

                </div>

            </div>


            <div class="col-md-4">
                <div class="form-group">
                    <label for="fname">Email Address</label>
                    <input type="text" class="form-control" id="email" placeholder="Email Address" name="email" value="<?php echo $email; ?>" maxlength="128" disabled>

                </div>

            </div>


            <div class="col-md-4">
                <div class="form-group">
                    <label for="fname">Occupation</label>
                    <input type="text" class="form-control" id="Occupation" placeholder="Occupation" name="Occupation" value="<?php echo $Occupation; ?>" maxlength="128" disabled>

                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="fname">Salary</label>
                    <input type="text" class="form-control" id="Salary" placeholder="Salary" name="Salary" value="<?php echo $Salary; ?>" maxlength="128" disabled>

                </div>

            </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="role">Change Status</label>
                                <select class="form-control" id="Status" name="Status">
                                    <option value="Not Screened by The City Vet Office">Unblock User</option>
                                    <option value="Blocked">Block User</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary form-control" value="Update Status" />
                            </div>
                        </div>
                    </div>


                </form>


            </div>
        </div>
    </div>

</div>
</div>
</div>
</div>



<div class="col-md-4">
    <?php
$this->load->helper('form');
$error = $this->session->flashdata('error');
if ($error) {
    ?>
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php }?>
    <?php
$success = $this->session->flashdata('success');
if ($success) {
    ?>
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php }?>

    <div class="row">
        <div class="col-md-12">
            <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
        </div>
    </div>
</div>

</div>

</section>


</div>

<!-- Modal -->
  <div id="reason" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="done">&times;</button>
          <h4 class="modal-title">Reasons of being reported</h4>
        </div>
        <div class="modal-body">

           <div class="col-md-12" > 
          <div class="form-group">
       
           <?php
           if(!empty($log))
           {
            foreach ($log as $rl)
            {
              ?>
              <div class="well"  style="display: block;line-height: 150%;" >
               <H4><?php echo $rl->reason; ?></H4>
               <h6>Date: <?php echo $rl->report_date; ?></h6>
             
             </div>

             <?php
           }
         }
         ?>


       </div>
     </div>
        </div>
        <div class="modal-footer">

        </div>
      </div>

    </div>
  </div>  
  
<script>

 $(document).ready(function (e) {
    $("#editAdopter").on('submit',(function(e) {
        e.preventDefault();
        var role = $("#Status option:selected").text();
        $.ajax({
           url: '<?php echo site_url('user/editAdopter'); ?>',
           type: "POST",
           data:  new FormData(this),
           contentType: false,
           cache: false,
           processData:false,
           success: function(html)
           {
            $('#stat').html('Status: '+role);
            window.location.href = "<?php echo base_url(); ?>adopterList";
            alert('Successfuly Updated');
          }
      });
    }));
});

</script>


<script src="<?php echo base_url(); ?>assets/js/editUser.js" type="text/javascript"></script>