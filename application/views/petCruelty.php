<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-flag"></i> Pet Cruelty Management
    </h1>
  </section>

  <section class="content">

    <div class="row">
      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <?php
            if(!empty($taken))
            {
              $a=0;
              foreach($taken as $takens)
              {
                $a++;
                ?>

                <?php  $a?>
                <?php
              }
            }
            ?>
            <h3><?php echo $takens->taken?><sup style="font-size: 20px"></sup></h3>
            <p>Actions Taken</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <!--   <a href="<?php echo base_url(); ?>petlist"  class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
        </div>
      </div><!-- ./col -->
      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <?php
            if(!empty($pending))
            {
              $i=0;
              foreach($pending as $pendings)
              {
                $i++;
                ?>

                <?php  $i?>
                <?php
              }
            }
            ?>
            <h3><?php echo $pendings->pending?><sup style="font-size: 20px"></sup></h3>
            <p>Pending Reports</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <!--   <a href="<?php echo base_url(); ?>petlist"  class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
        </div>
      </div><!-- ./col -->
      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-blue">
          <div class="inner">
            <?php
            $i=0;
            if(!empty($all))
            {

              foreach($all as $alls)
              {

                ?>

                
                <?php
              }
            }
            ?>
            <h3><?php echo $alls->total?><sup style="font-size: 20px"></sup></h3>
            <p>Total Reports</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <!--   <a href="<?php echo base_url(); ?>petlist"  class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
        </div>
      </div><!-- ./col -->
     
   
      <div class="col-xs-12 text-right">
        <div class="form-group">
             <a class="btn btn-success" id='btn_completed_cruelty' >
              <i class="fa fa-check">
              </i> Completed Pet Cruelty Report list
            </a>
        

       </div>
</div>
<div class="modal fade font-tnr" id="mdl_completed_cruelty" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <section class="content-header">

            <h1 style="width: 100%;">
                <i class="fa fa-table "></i> Completed Approval Table
                <i class="fa fa-close" id="btn_completed_cruelty_modal_close"
                style="color: red; float: right; list-style: none;"> </i>
                <div id="modal-loading">
                </div>
            </h1>
        </section>
        <div class=" modal-body " style="margin: 2% !important;">
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-primary">
                            <div class="box-header">
            <h3 class="box-title">Pet Cruelty Completed Report List</h3>
            <div class="box-tools">
            </div>
          </div><!-- /.box-header -->
          <div class="box-body ">
            <table id="crueltycomptable"class="table table-hover  table-sm  font-tnr font-tnr"
                        style="font-family: 'Times New Roman'; font-size: 1em !important;">
              <thead>
               <tr>

                 <!--  <th>ID</th> -->
                 <!-- <th>Image</th>-->
                 <th class="text-center">id</th>
                 <th class="text-center">Sender Name</th>
                 <th class="text-center">Title</th>
                 <th class="text-center">Status</th>
                 <th class="text-center">Posted Date</th>
                 <th class="text-center">Completed Date</th>
               </tr>
             </thead>
             <tbody >
             <!--  <?php
              if(!empty($records))
              {
                foreach($records as $record)
                {
                  ?>
                  <tr>
              <td hidden><?php echo $record->pet_id ?></td>
                   <td style="display:block; font-size: 0px; " ><img  src="<?php echo base_url();?>petcruelty/<?php echo $record->pc_name ?>" width="70px" height="20%" ></td>
                   <td><?php echo $record->Fname." ".$record->Mname." ".$record->Lname ?></td>
                   <td><?php echo $record->category ?></td>
                    <td><?php echo $record->Remarks ?></td>
                   <td><?php echo $record->posted_date ?></td>
                   <td class="text-center">
                    
                    <a class="btn btn-md btn-info" href="<?php echo base_url().'petCrueltyView/'.$record->pet_id; ?>" title="Show"><i class="fa fa-eye"></i></a>
                            <form role="form" action="<?php echo base_url() ?>updateremarks" method="post" id="editUser" role="form">
                            <button type="submit" class="btn btn-md btn-default" href="#" data-userid="<?php echo $record->pet_id; ?>" title="Mark as Done"><i class="fa fa-check-circle"></i></button>
                          </form>
                        </td>
                      </tr>
                      <?php
                    }
                  }
                  ?> -->
                </tbody>
              </table>
              
            </div><!-- /.box-body -->
            
                </div>
            </div>
        </section>
    </div>
</div>
</div>
</div>




      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Pet Cruelty Report List</h3>
            <div class="box-tools">
            </div>
          </div><!-- /.box-header -->
          <div class="box-body ">
            <table id="crueltytable" class="table table-hover  table-sm  font-tnr font-tnr" style="font-family: 'Times New Roman'; font-size: 1em !important;">
              <thead>
               <tr>

                 <!--  <th>ID</th> -->
                 <!-- <th>Image</th>-->
                 <th class="text-center">id</th>
                 <th class="text-center">Sender Name</th>
                 <th class="text-center">Title</th>
                 <th class="text-center">Status</th>
                 <th class="text-center">Posted Date</th>
                 
                
               </tr>
             </thead>
             <tbody >
             
                </tbody>
              </table>
              
            </div><!-- /.box-body -->
            
          </div><!-- /.box -->
        </div>
      </div>




    </section>

  </div>
   
  <script>
  $("#btn_completed_cruelty").click(function(e) {
    $("#mdl_completed_cruelty").modal('show');
});
    $("#btn_completed_cruelty_modal_close").click(function(e) {
    $("#mdl_completed_cruelty").modal('hide');
});
 


   $(document).ready( function () {
    var dt_reported_list = $('#crueltytable').DataTable({
      "bAutoWidth": false,
      "lengthMenu": [ [25, 50, 75, 100], [25, 50, 75, 100] ],

      "processing": true,
      stateSave: true,
      colReorder: false,
      "ajax": {
        xhr: function()
        {
          var xhr = new window.XMLHttpRequest();
                                                        //Upload progress
                                                        xhr.upload.addEventListener("progress", function(evt){
                                                          if (evt.lengthComputable) {
                                                            var percentComplete = evt.loaded / evt.total;
                                                            //Do something with upload progress
                                                            console.log(percentComplete);
                                                          }
                                                        }, false);
                                                        //Download progress
                                                        xhr.addEventListener("progress", function(evt){
                                                          if (evt.lengthComputable) {
                                                            var percentComplete = evt.loaded / evt.total;
                                                            //Do something with download progress
                                                            console.log(percentComplete);
                                                          }
                                                        }, false);
                                                        return xhr;
                                                      },
                                                      url : "<?php echo base_url().'user/crueltyListing_data';?>",
                                                      type : 'GET'
                                                    },  
                                                  });

    setInterval(function () {
      dt_reported_list.ajax.reload();
    }, 300000);
        //patient_list_data();
        $('#crueltytable tbody').on('click', 'td', function () {
          var data = dt_reported_list.row( $(this).parents('tr') ).data();

          var dataString = 'pet_id='+data[0];
          window.location.href = "<?php echo base_url(); ?>petCrueltyView/"+data[0];
        });
      } );

    </script>

<script>

   $(document).ready( function () {
    var dt_reported_list = $('#crueltycomptable').DataTable({
      "bAutoWidth": false,
      "lengthMenu": [ [25, 50, 75, 100], [25, 50, 75, 100] ],

      "processing": true,
      stateSave: true,
      colReorder: false,
      "ajax": {
        xhr: function()
        {
          var xhr = new window.XMLHttpRequest();
                                                        //Upload progress
                                                        xhr.upload.addEventListener("progress", function(evt){
                                                          if (evt.lengthComputable) {
                                                            var percentComplete = evt.loaded / evt.total;
                                                            //Do something with upload progress
                                                            console.log(percentComplete);
                                                          }
                                                        }, false);
                                                        //Download progress
                                                        xhr.addEventListener("progress", function(evt){
                                                          if (evt.lengthComputable) {
                                                            var percentComplete = evt.loaded / evt.total;
                                                            //Do something with download progress
                                                            console.log(percentComplete);
                                                          }
                                                        }, false);
                                                        return xhr;
                                                      },
                                                      url : "<?php echo base_url().'user/crueltyListingComp_data';?>",
                                                      type : 'GET'
                                                    },  
                                                  });

    setInterval(function () {
      dt_reported_list.ajax.reload();
    }, 300000);
        //patient_list_data();
        $('#crueltycomptable tbody').on('click', 'td', function () {
          var data = dt_reported_list.row( $(this).parents('tr') ).data();

          var dataString = 'pet_id='+data[0];
          window.location.href = "<?php echo base_url(); ?>petCrueltyView/"+data[0];
        });
      } );

    </script>



