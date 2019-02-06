<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-users"></i> Pet Cruelty Management
      
    </h1>
  </section>

  <section class="content">
     <div class="row">
      <div class="col-xs-12 text-right">
        <div class="form-group">
           <a class="btn btn-primary" href="<?php echo base_url(); ?>PetCrueltyList"><i class="fa fa-list"></i> Pending Pet Cruelty Report list</a>
       

       </div>
   </div>
 <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Pet Cruelty Completed Report List</h3>
            <div class="box-tools">
            </div>
          </div><!-- /.box-header -->
          <div class="box-body ">
            <table id="crueltycomptable" class="table table-hover" cellspacing="5" width="100%">
              <thead>
               <tr>

                 <!--  <th>ID</th> -->
                 <!-- <th>Image</th>-->
                 <th class="text-center">Pet id</th>
                 <th class="text-center">Sender Name</th>
                 <th class="text-center">Title</th>
                 <th class="text-center">Status</th>
                 <th class="text-center">Posted Date</th>
                 <th class="text-center">Actions</th>
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
            
          </div><!-- /.box -->
        </div>
      </div>




    </section>

  </div>
    <style>
                #crueltycomptable{
                 text-align: center;
                    font-size:!important;
                }
            </style>
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
        $('#crueltycomptable tbody').on('click', 'td i', function () {
          var data = dt_reported_list.row( $(this).parents('tr') ).data();

          var dataString = 'pet_id='+data[0];
          window.location.href = "<?php echo base_url(); ?>petCrueltyView/"+data[0];
        });
      } );

    </script>
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "userListing/" + value);
            jQuery("#searchList").submit();
        });
    });
  </script> -->



