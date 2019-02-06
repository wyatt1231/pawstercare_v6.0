
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> Administrator Management

        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" id='btn_add_admin' ><i class="fa fa-plus"></i> Add New
                    Admin</a>
                    <a class="btn btn-primary" id='btn_approval_admin'><i
                        class="fa fa-thumbs-o-up"></i> Administrator Approval</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Users List</h3>
                            <div class="box-tools">

                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <table id="admintable" class="table table-hover" cellspacing="5" width="100%">
                                <thead>
                                    <tr>
                                       <th>Id</th>
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th>Mobile</th>
                                       <th>Role</th>
                                       <th>Created On</th>
                                       <th class="text-center">Actions</th>
                                   </tr>
                               </thead>
                               <tbody>
                                  <!--   <?php
                                    if(!empty($records))
                                    {
                                        $i=0;
                                        foreach($records as $record)
                                        {
                                            $i++;
                                            ?>
                                            <tr>
                                                <td><?php echo $record->name ?></td>
                                                <td><?php echo $record->email ?></td>
                                                <td><?php echo $record->mobile ?></td>
                                                <td><?php echo $record->role ?></td>

                                                <td><?php echo date("d-m-Y", strtotime($record->createdDtm)) ?></td>
                                                <td class="text-center">

                                                    <form role="form" action="<?php echo base_url() ?>adminblock" method="post"
                                                        id="blockadopter" role="form">
                                                        <button type="submit" class="btn btn-sm btn-danger" title="Block Admin"><i
                                                            class="fa fa-ban"></i></button>
                                                            <input type="hidden" name="adminid" value="<?php echo $record->userId ?>">
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
                            <div class="box-footer clearfix">
                                <?php echo $this->pagination->create_links(); ?>
                            </div>
                        </div><!-- /.box -->
                    </div>
                </div>




            </section>
        </div>
        <div class="modal fade font-tnr" id="mdl_block_admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <section class="content-header">

                    <h1 style="width: 100%;">
                        <i class="fa fa-users "></i> Block Admin Confirmation
                        <i class="fa fa-close" id="btn_add_modal_close"
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

                                    </div><!-- /.box-header -->
                                    <!-- form start -->
                                    <?php $this->load->helper("form"); ?>
                                    <form id="form_block_admin" enctype="multipart/form-data">
                                        <div class="box-body">
                                            <h3 align="center">BLOCK ADMIN?</h3>

                                            <input type="hidden" name="user" id='user' value=''>
                                        </div><!-- /.box-body -->

                                        <div class="box-footer" align="center">
                                            <input type="submit" class="btn btn-primary" value="YES" />
                                            <input type="reset" class="btn btn-default" value="CANCEL" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade font-tnr" id="mdl_approved_admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <section class="content-header">

                    <h1 style="width: 100%;">
                        <i class="fa fa-users "></i> Approve Admin Confirmation
                        <i class="fa fa-close" id="btn_add_modal_close"
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

                                    </div><!-- /.box-header -->
                                    <!-- form start -->
                                    <?php $this->load->helper("form"); ?>
                                    <form id="form_approved_admin" enctype="multipart/form-data">
                                        <div class="box-body">
                                            <h3 align="center">APPROVE ADMIN?</h3>
 <input type="hidden" name="approveuser" id='approveuser' value=''>
  <h3 align="center" name="adminname" id='adminname'></h3>
                                           
                                        </div><!-- /.box-body -->

                                        <div class="box-footer" align="center">
                                            <input type="submit" class="btn btn-primary" value="YES" />
                                            <input type="reset" class="btn btn-default" value="CANCEL" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <!-- MODALS -->
    <div class="modal fade font-tnr" id="mdl_add_admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <section class="content-header">

                <h1 style="width: 100%;">
                    <i class="fa fa-users "></i> Admin Adding Form
                    <i class="fa fa-close" id="btn_add_modal_close"
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
                                    <h3 class="box-title">Enter User Details</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <?php $this->load->helper("form"); ?>
                                <form id="form_add_admin" enctype="multipart/form-data">
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-6">                                
                                                <div class="form-group">
                                                    <label for="fname">Full Name</label>
                                                    <input type="text" class="form-control required" value="<?php echo set_value('fname'); ?>" id="fname" name="fname" maxlength="128">
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Email address</label>
                                                    <input type="text" class="form-control required email" id="email" value="<?php echo set_value('email'); ?>" name="email" maxlength="128">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input type="password" class="form-control required" id="password" name="password" maxlength="20">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="cpassword">Confirm Password</label>
                                                    <input type="password" class="form-control required equalTo" id="cpassword" name="cpassword" maxlength="20">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="mobile">Mobile Number</label>
                                                    <input type="text" class="form-control required digits" id="mobile" value="<?php echo set_value('mobile'); ?>" name="mobile" maxlength="10">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="role">Role</label>
                                                    <select class="form-control required" id="role" name="role">
                                                        <option value="0">Select Role</option>
                                                        <?php
                                                        if(!empty($roles))
                                                        {
                                                            foreach ($roles as $rl)
                                                            {
                                                                ?>
                                                                <option value="<?php echo $rl->roleId ?>" <?php if($rl->roleId == set_value('role')) {echo "selected=selected";} ?>><?php echo $rl->role ?></option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>    
                                        </div>
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <input type="submit" class="btn btn-primary" value="Submit" />
                                        <input type="reset" class="btn btn-default" value="Reset" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<!-- MODALS -->
<div class="modal fade font-tnr" id="mdl_approval_admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <section class="content-header">

            <h1 style="width: 100%;">
                <i class="fa fa-users "></i> Admin Approval Table
                <i class="fa fa-close" id="btn_add_modal_close"
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
                                <h3 class="box-title">Admin User Approval List</h3>
                                <div class="box-tools">

                                </div>
                            </div><!-- /.box-header -->
                            <div class="box-body ">
                                <table id="approvaltable" class="table table-hover" cellspacing="5" width="100%">
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
                                  <!--   <?php
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
                                ?> -->
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
</div>
</div>
<script type="text/javascript">

    $("#btn_add_admin").click(function(e) {
        $("#mdl_add_admin").modal('show');
    });
     $("#btn_approval_admin").click(function(e) {
        $("#mdl_approval_admin").modal('show');
    });
    $('#form_add_admin').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        //   alert($("#form_add_pet").serialize());
        $("#modal-loading").addClass("loader");
        $.ajax({
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,

            url: '<?php echo base_url(); ?>user/addNewUser',
            success: function(data) {
                $("#modal-loading").removeClass("loader");
                $("#mdl_add_pet").modal('hide');

                alert("Admin has been added successfully ");

            }
        });
    });

    $('#form_block_admin').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        //   alert($("#form_add_pet").serialize());
        $("#modal-loading").addClass("loader");
        $.ajax({
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,

            url: '<?php echo base_url(); ?>user/adminblock',
            success: function(data) {
                $("#modal-loading").removeClass("loader");
                $("#mdl_add_pet").modal('hide');

                alert("Admin has been block successfully ");

            }
        });
    });
    $('#form_approved_admin').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        //   alert($("#form_add_pet").serialize());
        $("#modal-loading").addClass("loader");
        $.ajax({
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,

            url: '<?php echo base_url(); ?>user/adminapprove',
            success: function(data) {
                $("#modal-loading").removeClass("loader");
               $("#mdl_approved_admin").modal('hide');
                alert("Admin has been approved successfully ");

            }
        });
    });
</script>
<script>

   $(document).ready( function () {
    var dt_admin_list = $('#admintable').DataTable({
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
                                                    url : "<?php echo base_url().'user/admin_data';?>",
                                                    type : 'GET'
                                                },  
                                            });

    setInterval(function () {
      dt_admin_list.ajax.reload();
  }, 300000);
        //patient_list_data();
        $('#admintable tbody').on('click', 'td i', function () {
          var data = dt_admin_list.row( $(this).parents('tr') ).data();

          var dataString = 'userId='+data[0];
          document.getElementById("user").value=data[0];
          $("#mdl_block_admin").modal('show');

          // window.location.href = "<?php echo base_url(); ?>adminblock/"+data[0];

      });
    } );


$(document).ready( function () {
    var dt_approval_list = $('#approvaltable').DataTable({
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
                                                    url : "<?php echo base_url().'user/adminapproval_data';?>",
                                                    type : 'GET'
                                                },  
                                            });

    setInterval(function () {
      dt_approval_list.ajax.reload();
  }, 300000);
        //patient_list_data();
        $('#approvaltable tbody').on('click', 'td i', function () {
          var data = dt_approval_list.row( $(this).parents('tr') ).data();

          var dataString = 'userId='+data[0];
          document.getElementById("approveuser").value=data[0];
            $("#adminname").text(data[2]);
          $("#mdl_approved_admin").modal('show');
           $("#mdl_approval_admin").modal('hide');


          // window.location.href = "<?php echo base_url(); ?>adminblock/"+data[0];

      });
    } );
</script>