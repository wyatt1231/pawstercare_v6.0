<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Adopter Approval Management
        
    </h1>
</section>
<section class="content">

    <div class="row">
     <div class="col-xs-12 text-right">
        <div class="form-group">
           
             <a class="btn btn-danger" href="<?php echo base_url(); ?>reportedadopter"><i class="fa fa-flag"></i> Reported Adopters</a>
            
           <a class="btn btn-primary disabled" href="<?php echo base_url(); ?>adopter"><i class="fa fa-thumbs-o-up"></i> Adopter For Approval</a>
            
           <a class="btn btn-warning" href="<?php echo base_url(); ?>adopterHistoryList"><i class="fa fa-ban"></i>Blocked Adopters History</a>
           
              <a class="btn btn-warning " href="<?php echo base_url(); ?>deniedadopterList"><i class="fa fa-thumbs-o-down"></i> Denied Adopters History</a>

       </div>
   </div>
   <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
            <h3 class="box-title">Adopter Approval List</h3>
            <div class="box-tools">
                
        </div>
    </div><!-- /.box-header -->
     <div class="box-body">
        <div class="table-responsive">
        <table id="dataTable" class="table table-hover" cellspacing="5" width="100%">
            <thead>
        <tr>
             <th>id</th>
              <th>image</th>
            <th>FirstName</th>
            <th>MiddleName</th>
            <th>Lastname</th>
            <th>Home Address</th>
            <th>Birthdate</th>
            <th>Civil Status</th>
            <th>Office Address</th>
            <th>Email</th>
            <th>Status</th>
            <th class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if(!empty($adopters))
        {
            foreach($adopters as $record)
            {
                ?>
                <tr>
                    <?php $date=$record->Birthdate ?>
                     <td><?php echo $record->id ?></td>
                    <td style="display:block; font-size: 0px; ">  <img src="<?php echo base_url(); ?>uploads/<?php echo $record->owner_img ?>" width="50px" height="50px"></td>
                    <td><?php echo $record->Fname ?></td>
                    <td><?php echo $record->Mname ?></td>
                    <td><?php echo $record->Lname ?></td>
                    <td><?php echo $record->HAddress ?></td>
                    <td><?php echo $date?></td>
                    <td><?php echo $record->CStatus ?></td>
                    <td><?php echo $record->OAddress ?></td>
                    <td><?php echo $record->Email ?></td>
                    <td><?php echo $record->Status ?></td>
                    <td class="text-center">
                      
                        <a class="btn btn-sm btn-info" href="<?php echo base_url().'adoptionrequest/'.$record->id?>" title="Approve"><i class="fa fa-pencil"></i></a>
                        <!-- <a class="btn btn-sm btn-danger deleteUser" href="#" data-userid="<?php echo $record->id; ?>" title="Decline"><i class="fa fa-trash"></i></a> -->
                    </td>
                </tr>
                <?php
            }
        }
        ?>
        </tbody>
    </table>

</div><!-- /.box-body -->

</div><!-- /.box -->
</div>
</div>




</section>
</div>

