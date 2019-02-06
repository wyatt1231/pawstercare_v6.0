<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Reported Adopters Management
        
    </h1>
</section>
<section class="content">

     <div class="row">
     <div class="col-xs-12 text-right">
        <div class="form-group">
           
             <a class="btn btn-danger disabled" href="<?php echo base_url(); ?>reportedadopter"><i class="fa fa-flag"></i> Reported Adopters</a>
            
           <a class="btn btn-primary " href="<?php echo base_url(); ?>adopter"><i class="fa fa-thumbs-o-up"></i> Adopter For Approval</a>
            
           <a class="btn btn-warning" href="<?php echo base_url(); ?>adopterHistoryList"><i class="fa fa-ban"></i>Blocked Adopters History</a>
           
                <a class="btn btn-warning " href="<?php echo base_url(); ?>deniedadopterList"><i class="fa fa-thumbs-o-down"></i> Denied Adopters History</a>
                
       </div>
   </div>
   <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
            <h3 class="box-title">Reported Adopters List</h3>
            <div class="box-tools">
                
        </div>
    </div><!-- /.box-header -->
     <div class="box-body">
        <div class="table-responsive">
        <table id="reportedtable" class="table table-hover" cellspacing="5" width="100%">
            <thead >
        <tr>
           
            <th  class="text-center">ID</th>
            <th  class="text-center">Name</th>
            <th  class="text-center">No. of Report</th>
            <th  class="text-center">More Info</th>
           
        </tr>
        </thead>
        <tbody>
        <!-- <?php
        if(!empty($reported))
        {
            foreach($reported as $record)
            {
                ?>
                <tr>
                     <td style="display:block; font-size: 0px; ">  <img src="<?php echo base_url(); ?>assets/images/uploads/<?php echo $record->owner_img ?>" width="20%" height="5%"></td>
                    <td><?php echo $record->name ?></td>
                    <td><?php echo $record->total_report ?></td>
                    <td class="text-center">
                      
                       <form role="form" action="<?php echo base_url() ?>blockadopter" method="post" id="blockadopter" role="form">
                                    <button  type="submit" class="btn btn-sm btn-danger "  title="Block User"><i class="fa fa-ban"></i></button>
                                    <input type="hidden" name="adopterid" value="<?php echo $record->id?>">
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
                #reportedtable{
                 text-align: center;
                    font-size:!important;
                }
            </style>
<script>

   $(document).ready( function () {
    var dt_reported_list = $('#reportedtable').DataTable({
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
                                                    url : "<?php echo base_url().'user/reportedadopter_data';?>",
                                                    type : 'GET'
                                                },  
                                            });

    setInterval(function () {
        dt_reported_list.ajax.reload();
    }, 300000);
        //patient_list_data();
        $('#reportedtable tbody').on('click', 'td i', function () {
            var data = dt_reported_list.row( $(this).parents('tr') ).data();

            var dataString = 'id='+data[0];
            window.location.href = "<?php echo base_url(); ?>reporteduser/"+data[0];
        });
    } );

  $(document).ready(function (e) {
            $("#btnban").on('submit',(function(e) {
            
              
                
        e.preventDefault();
                $.ajax({
                       url: '<?php echo site_url('user/blockadopter'); ?>',
                    type: "POST",
                    data:  new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(html)
                    {
                        
                        <?php $this->session->set_flashdata('success', 'User updated successfully');?>
                       
                        }  
                    });
        }));
        });

</script>
