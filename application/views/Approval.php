<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Admin User Approval
        
    </h1>
</section>
<section class="content">

    <div class="row">
        <div class="col-xs-12">
          <div class="box" style="width: 100%;">
            <div class="box-header">
                <h3 class="box-title">Admin User Approval List</h3>
                <div class="box-tools">

                </div>
            </div><!-- /.box-header -->
            <div class="box-body ">
              <table id="dataTable" class="table table-hover" cellspacing="5" width="100%">
               <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Status</th>

                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(!empty($datas))
                {
                    foreach($datas as $record)
                    {
                        ?>
                        <tr>
                            <td><?php echo $record->userId ?></td>
                            <td><?php echo $record->email ?></td>
                            <td><?php echo $record->name ?></td>
                            <td><?php echo $record->role ?></td>
                            <td><?php echo $record->status ?></td>

                            <td class="text-center">

  <form role="form" action="<?php echo base_url() ?>adminapprove" method="post" id="blockadopter" role="form">
<button type="submit" class="btn btn-sm btn-info"  title="Approve"><i class="fa fa-pencil"></i></button>
<input type="hidden" name="adminid" value="<?php echo $record->userId ?>">
</form>

                                 </td>
                </tr>
                <?php
            }
        }
        ?>
        </tbody>
    </table>

</div>
</div>
</div>
</div>
</section>
</div>
