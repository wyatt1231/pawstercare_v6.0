<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Denied/Blocked Adopter History List Management
        
    </h1>
</section>
<section class="content">

      <div class="row">
     <div class="col-xs-12 text-right">
        <div class="form-group">
           
             <a class="btn btn-danger " href="<?php echo base_url(); ?>reportedadopter"><i class="fa fa-flag"></i> Reported Adopters</a>
            
           <a class="btn btn-primary " href="<?php echo base_url(); ?>adopter"><i class="fa fa-thumbs-o-up"></i> Adopter For Approval</a>
            
           <a class="btn btn-warning disabled" href="<?php echo base_url(); ?>adopterHistoryList"><i class="fa fa-ban"></i> Blocked Adopters History</a>
           
           <a class="btn btn-warning " href="<?php echo base_url(); ?>deniedadopterList"><i class="fa fa-thumbs-o-down"></i> Denied Adopters History</a>

       </div>
   </div>
   <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
            <h3 class="box-title">Blocked Adopter List</h3>
            <div class="box-tools">
                
        </div>
    </div><!-- /.box-header -->
     <div class="box-body">
        <table id="blocktable" class="table table-hover" cellspacing="5" width="100%">
                        <thead>
        <tr>
                     <th>ID</th>
                        <th>Name</th>
                        <th>Home Address</th>
                        <th>Birthdate</th>
                        <th>Civil Status</th>
                        <th>Office Address</th>
                        <th>Email</th>
                        <th>Occupation</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>

        </tr>
    </thead>
    <tbody>
      
        </tbody>
    </table>

</div><!-- /.box-body -->

</div><!-- /.box -->
</div>
</div>




</section>
</div>

<script>

   $(document).ready( function () {
    var dt_block_list = $('#blocktable').DataTable({
        "bAutoWidth": false,
        "lengthMenu": [ [25, 50, 75, 100], [25, 50, 75, 100] ],

        "processing": true,
        stateSave: true,
        colReorder: false,
        "ajax": {
                    url : "<?php echo base_url().'user/blockedadopter_data';?>",
                    type : 'GET'
                },  
            });

    // setInterval(function () {
    //     dt_block_list.ajax.reload();
    // }, 300000);
        //patient_list_data();
        $('#blocktable tbody').on('click', 'td i', function () {
            var data = dt_block_list.row( $(this).parents('tr') ).data();
            var dataString = 'id='+data[0];
            if(data[8]=='Blocked'){
                 window.location.href = "<?php echo base_url(); ?>reporteduser/"+data[0];
            }else{
                  window.location.href = "<?php echo base_url(); ?>adoptionrequest/"+data[0];
            }
           
        });
    } );

</script>