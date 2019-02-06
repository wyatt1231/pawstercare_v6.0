<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> Pet Management
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <!-- <a class="btn btn-primary" href="<? php// echo base_url(); ?>addNewPet"><i class="fa fa-paw"></i> Add
                        Pets</a> -->
                    <button class="btn btn-primary" id="btn_add_pet"><i class="fa fa-paw"></i> Add New Pet</button>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-12 " align="center" style="float: left !important; display: inline;">
                            <span>
                                <h3 class="pull-center" align="center" style="width: 200px !important;"> Filter Pets
                                </h3>
                            </span>
                            <span><select class="form-control pull-center " align="center"
                                    style="width: 200px !important;" id="filter_pets" name="filter_pets">
                                    <option value="all" class="text-center" align="center">All</option>
                                    <option value="high" class="text-center" align="center">High Average Rating</option>
                                    <option value="low" class="text-center" align="center">Low Average Rating</option>
                                </select></span>
                        </div>
                    </div>
                    <div class="box-body" style="margin-left: 5% !important; margin-right: 5% !important;">
                        <table id="pettable" class="table table-striped  table-sm  font-tnr font-tnr"
                            style="font-family: 'Times New Roman'; font-size: 1em !important;">
                            <thead>
                                <tr>
                                    <td class="  font-tnr">ID</td>
                                    <td class="  font-tnr">Name</td>
                                    <td class=" font-tnr">Owner</td>
                                    <td class=" font-tnr">Type</td>
                                    <td class=" font-tnr">Breed</td>
                                    <td class=" font-tnr">Average Rating</td>
                                </tr>
                            </thead>
                            <tbody style="font-family: 'Times New Roman'; font-size: .85em !important;">

                            </tbody>
                        </table>

                    </div><!-- /.box-body -->

                </div><!-- /.box -->
            </div>
        </div>
    </section>

    <!-- MODALS -->
    <div class="modal fade font-tnr" id="mdl_add_pet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <section class="content-header">

                    <h1 style="width: 100%;">
                        <i class="fa fa-users "></i> Pet Adding Form
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
                                        <h3 class="box-title font-tnr">Fill up the pet details</h3>
                                    </div>
                                    <form id="form_add_pet" enctype="multipart/form-data">
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="fullname">Full Name</label>
                                                        <input type="text" autocomplete="off" class="form-control "
                                                            required id="txt_fullname" name="fname" maxlength="128">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="Type">Type</label>
                                                        <select class="form-control required" id="select_type"
                                                            name="type">
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="Age">Age</label>
                                                        <select class="form-control required" id="select_age"
                                                            name="age">
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="Breed">Breed</label>
                                                        <select class="form-control required" id="select_breed"
                                                            name="breed">
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="Breed">Size</label>
                                                        <select class="form-control required" id="select_size"
                                                            name="size">
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="Breed">Color</label>
                                                        <select class="form-control required" id="select_color"
                                                            name="color">
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="Breed">Gender</label>
                                                        <select class="form-control required" id="select_gender"
                                                            name="gender">
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="petowner">Pet Owner</label>
                                                        <select class="form-control required" id="select_pet_owner"
                                                            disabled="true" name="petowner">
                                                            <option value="1">City Veterinarians Office</option>
                                                        </select>

                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Pet Image</label>
                                                        <input type="file" required name="petimage" id="petimage"
                                                            size="20" accept="image/x-png,image/gif,image/jpeg">
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


    <!-- MODAL EDIT -->

    <div class="modal fade font-tnr" id="mdl_edit_pet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <section class="content-header">
                    <h1 style="width: 100%;">
                        <i class="fa fa-users "></i> Pet Information and Timeline
                        <i class="fa fa-close" id="btn_edit_modal_close"
                            style="color: red; float: right; list-style: none;"> </i>
                        <div id="modal-loading">
                        </div>
                    </h1>
                </section>
                <div class=" modal-body font-tnr">
                    <section class="content">
                        <div class="row" style="margin-top: 10px;">
                            <div class="box box-primary">
                                <div class="col-md-4 text-center">
                                    <div class="row" id="edit_pet_image_main">

                                    </div>
                                    <div>
                                        <h3 id="selected_pet_rating"> </h3>
                                    </div>
                                </div>


                                <!-- left column -->
                                <div class="col-md-8">
                                    <div class="tab">
                                        <button class="tablinks col-md-4" type="button"
                                            onclick="openCity(event, 'London')" id="defaultOpen"> Update
                                            Information</button>
                                        <button class="tablinks col-md-4" type="button"
                                            onclick="openCity(event, 'Tokyo')">Pet Timeline</button>
                                        <button class="tablinks col-md-4" type="button"
                                            onclick="openCity(event, 'China')">Comments</button>
                                    </div>
                                    <div id="London" class="tabcontent ">
                                        <form id="form_edit_pet">
                                            <div class="box-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="Owner">Name</label>
                                                            <input type="text" class="form-control"
                                                                id="txt_edit_pet_name" placeholder="Pet Name"
                                                                name="petname" value="" maxlength="128">
                                                            <input type="hidden" class="form-control"
                                                                id="txt_edit_pet_id" placeholder="Pet Name" name="petid"
                                                                value="" maxlength="128">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Owner">Owner</label>
                                                            <input type="text" class="form-control"
                                                                id="txt_edit_pet_owner" placeholder="Pet Owner"
                                                                disabled="true" name="petowner" value=""
                                                                maxlength="128">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Type">Type</label>
                                                            <select class="form-control required"
                                                                id="select_edit_pet_type" name="pettype">

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Breed">Breed</label>
                                                            <select class="form-control required"
                                                                id="select_edit_pet_breed" name="petbreed">
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Breed">Size</label>
                                                            <select class="form-control required"
                                                                id="select_edit_pet_size" name="petsize">
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Breed">Gender</label>
                                                            <select class="form-control required"
                                                                id="select_edit_pet_gender" name="petgender">
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Breed">Color</label>
                                                            <select class="form-control required"
                                                                id="select_edit_pet_color" name="petcolor">
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Age">Age</label>
                                                            <select class="form-control required"
                                                                id="select_edit_pet_age" name="petage">
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Pet Image</label>
                                                            <input type="file" name="petimage" id="edit_pet_image"
                                                                size="20" accept=".jpg,.png,.gif"
                                                                onchange="readURL(this);">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="box-footer">
                                                    <input type="submit" class="btn btn-primary" value="Submit"
                                                        id="submit_edit_pet"
                                                        style="width: 100px; display: block; margin:auto; float: center;" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="Tokyo" class="tabcontent">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="content" id="timeline">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="China" class="tabcontent">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="content" id="comments">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

            </div>
        </div>
        </section>
    </div>
</div>
</div>
</div>
<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
document.getElementById("defaultOpen").click();
</script>
<style>
body {
    font-family: 'Times New Roman';
}

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

select {
    text-indent: 5%;
}
</style>

<script>
var selected_pet_id = 0;
var dt_pet_list;
$(document).ready(function() {
    var dt_pet_list = $('#pettable').DataTable({
        "bAutoWidth": false,
        "lengthMenu": [
            [10, 25, 50, 100],
            [10, 25, 50, 100]
        ],
        stateSave: true,
        colReorder: false,
        "ajax": {
            url: "<?php echo base_url() . 'user/pet_data'; ?>",
            type: 'GET'
        }
    });
    $('#pettable tbody').on('dblclick', 'td', function() {
        var data = dt_pet_list.row($(this).parents('tr')).data();


        $("#mdl_edit_pet").modal('show');
        $("#edit_pet_image_main").empty();
        $("#selected_pet_rating").empty();
        $("#select_edit_pet_age").val('');
        $("#select_edit_pet_owner").val('');
        $("#select_edit_pet_type").val('');
        $("#select_edit_pet_breed").val('');
        $("#select_edit_pet_gender").val('');
        $("#select_edit_pet_size").val('');
        $("#select_edit_pet_color").val('');
        $("#txt_edit_pet_name").val('');
        $("#txt_edit_pet_owner").val('');
        $("#txt_edit_pet_id").val('');

        $("#selected_pet_rating").append(data[5] + ' Average Rating');
        $("#edit_pet_image_main").append("<div class='loader'> </div>");
        $.ajax({
            type: "POST",
            data: "petid=" + data[0],
            url: '<?php echo base_url(); ?>user/selected_pet_info',
            dataType: "json",
            success: function(response) {
                console.log(response);
                $("#edit_pet_image_main").empty();
                $("#edit_pet_image_main").append(
                    '<img src="<?php echo base_url(); ?>pets/' + response.data[0][1] +
                    '" style="margin-top: 30px !important; margin-bottom: 20px !important;" id="pet_img1" name="pet_img1" width="60%" height="60%">'
                );
                $("#select_edit_pet_age").val(response.data[0][7]);
                $("#select_edit_pet_owner").val(response.data[0][9]);
                $("#select_edit_pet_type").val(response.data[0][3]);
                $("#select_edit_pet_breed").val(response.data[0][4]);
                $("#select_edit_pet_gender").val(response.data[0][5]);
                $("#select_edit_pet_size").val(response.data[0][8]);
                $("#select_edit_pet_color").val(response.data[0][6]);
                $("#txt_edit_pet_name").val(response.data[0][2]);
                $("#txt_edit_pet_owner").val(response.data[0][10]);
                $("#txt_edit_pet_id").val(response.data[0][0]);

                if (response.data[0][9] == 1) {
                    $("#select_edit_pet_age").prop("disabled", false);
                    $("#select_edit_pet_owner").prop("disabled", false);
                    $("#select_edit_pet_type").prop("disabled", false);
                    $("#select_edit_pet_breed").prop("disabled", false);
                    $("#select_edit_pet_gender").prop("disabled", false);
                    $("#select_edit_pet_size").prop("disabled", false);
                    $("#select_edit_pet_color").prop("disabled", false);
                    $("#submit_edit_pet").prop("disabled", false);
                    $("#txt_edit_pet_name").prop("disabled", false);

                } else {
                    $("#select_edit_pet_age").prop("disabled", true);
                    $("#select_edit_pet_owner").prop("disabled", true);
                    $("#select_edit_pet_type").prop("disabled", true);
                    $("#select_edit_pet_breed").prop("disabled", true);
                    $("#select_edit_pet_gender").prop("disabled", true);
                    $("#select_edit_pet_size").prop("disabled", true);
                    $("#select_edit_pet_color").prop("disabled", true);
                    $("#txt_edit_pet_name").prop("disabled", true);
                    $("#submit_edit_pet").prop("disabled", true);
                }


            },
            error: function(error) {
                alert(
                    "Could not reach the server. Please check your internet connection or network status."
                );
            }
        });

        $.ajax({
            type: "POST",
            data: "petid=" + data[0],
            url: '<?php echo base_url(); ?>user/pet_timeline',
            dataType: "json",
            success: function(response) {
                console.log(response);
                $("#timeline").empty();
                for (let i = 0; i < response.data.length; i++) {
                    $("#timeline").append('<span class="text-muted pull-left"><h5>' +
                        response.data[i][0] + ' on ' + response.data[i][1] +
                        '</h5></span>');
                }
            },
            error: function(error) {
                alert(
                    "Could not reach the server. Please check your internet connection or network status."
                );
            }
        });

        $.ajax({
            type: "POST",
            data: "petid=" + data[0],
            url: '<?php echo base_url(); ?>user/pet_comment',
            dataType: "json",
            success: function(response) {
                console.log(response);
                $("#comments").empty();
                for (let i = 0; i < response.data.length; i++) {
                    $("#comments").append(
                        '<div class="row"><div class="col-md-12"><h4 class="text-center text-muted pull-left">' +
                        response.data[i][0] + '</h4></div>' +
                        '<div class="col-md-12"><h5 class="text-left text-muted pull-left"> - ' +
                        response.data[i][2] + '</h5></div>' +
                        '<span><div class="col-md-12"><h6 class="text-center text-muted pull-right">  ' +
                        response.data[i][3] + '</h6></div></div>');

                }
            },
            error: function(error) {
                alert(
                    "Could not reach the server. Please check your internet connection or network status."
                );
            }
        });
    });

    $("#btn_add_pet").click(function(e) {
        $("#mdl_add_pet").modal('show');
    });
    get_pet_type();
    get_pet_age();
    get_pet_breed();
    get_pet_color();
    get_pet_size();

    function get_pet_type() {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>user/pet_type_selection',
            dataType: "json",
            success: function(response) {
                $("#select_type").empty();
                for (let i = 0; i < response.data.length; i++) {
                    $("#select_type").append('<option value="' + response.data[i][1] + '">' +
                        response.data[i][1] + '</option>');
                    $("#select_edit_pet_type").append('<option value="' + response.data[i][1] +
                        '">' +
                        response.data[i][1] + '</option>');
                }
            },
            error: function(error) {
                alert(
                    "Could not reach the server. Please check your internet connection or network status."
                );
            }
        });
    }

    function get_pet_age() {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>user/pet_age_selection',
            dataType: "json",
            success: function(response) {
                $("#select_age").empty();
                for (let i = 0; i < response.data.length; i++) {
                    $("#select_age").append('<option value="' + response.data[i][1] + '">' +
                        response.data[i][1] + '</option>');
                    $("#select_edit_pet_age").append('<option value="' + response.data[i][1] +
                        '">' +
                        response.data[i][1] + '</option>');
                }
            },
            error: function(error) {
                alert(
                    "Could not reach the server. Please check your internet connection or network status."
                );
            }
        });
    }

    function get_pet_breed() {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>user/pet_breed_selection',
            dataType: "json",
            success: function(response) {
                $("#select_breed").empty();
                for (let i = 0; i < response.data.length; i++) {
                    $("#select_breed").append('<option value="' + response.data[i][1] + '">' +
                        response.data[i][1] + '</option>');
                    $("#select_edit_pet_breed").append('<option value="' + response.data[i][1] +
                        '">' +
                        response.data[i][1] + '</option>');
                }
            },
            error: function(error) {
                alert(
                    "Could not reach the server. Please check your internet connection or network status."
                );
            }
        });
    }

    function get_pet_size() {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>user/pet_size_selection',
            dataType: "json",
            success: function(response) {
                $("#select_size").empty();
                for (let i = 0; i < response.data.length; i++) {
                    $("#select_size").append('<option value="' + response.data[i][1] + '">' +
                        response.data[i][1] + '</option>');
                    $("#select_edit_pet_size").append('<option value="' + response.data[i][1] +
                        '">' +
                        response.data[i][1] + '</option>');
                }
            },
            error: function(error) {
                alert(
                    "Could not reach the server. Please check your internet connection or network status."
                );
            }
        });
    }

    function get_pet_color() {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>user/pet_color_selection',
            dataType: "json",
            success: function(response) {
                $("#select_color").empty();
                for (let i = 0; i < response.data.length; i++) {
                    $("#select_color").append('<option value="' + response.data[i][1] + '">' +
                        response.data[i][1] + '</option>');
                    $("#select_edit_pet_color").append('<option value="' + response.data[i][1] +
                        '">' +
                        response.data[i][1] + '</option>');
                }
            },
            error: function(error) {
                alert(
                    "Could not reach the server. Please check your internet connection or network status."
                );
            }
        });
    }
    $('#form_add_pet').on('submit', function(e) {
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

            url: '<?php echo base_url(); ?>user/addPet',
            success: function(data) {
                $("#modal-loading").removeClass("loader");
                $("#mdl_add_pet").modal('hide');

                alert("The pet has been added successfully ");

            }
        });
    });
    $('#form_edit_pet').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $("#modal-loading").addClass("loader");
        $.ajax({
            type: 'POST',
            data: formData,
            cache: false,
            dataType: "json",
            contentType: false,
            processData: false,
            url: '<?php echo base_url(); ?>user/editPets',
            success: function(data) {
                console.log(data);
                $("#modal-loading").removeClass("loader");
                if (data.success == true) {
                    $("#mdl_add_pet").modal('hide');
                    alert("The pet has been updated successfully");
                    location.reload();
                } else {
                    alert("The pet has not been updated successfully");
                }

            }
        });





    });
    $("#btn_add_modal_close").click(function() {
        $("#mdl_add_pet").modal('hide');
    });

    $("#btn_edit_modal_close").click(function() {
        $("#mdl_edit_pet").modal('hide');
    });

    $("#filter_pets").change(function(e) {
        e.preventDefault();
        if ($.fn.DataTable.isDataTable("#pettable")) {
            $('#pettable').DataTable().clear().destroy();
            var filter = $("#filter_pets").val();
            if (filter == 'all') {
                dt_pet_list = $('#pettable').DataTable({
                    "bAutoWidth": false,
                    "lengthMenu": [
                        [10, 25, 50, 100],
                        [10, 25, 50, 100]
                    ],
                    stateSave: true,
                    colReorder: false,
                    "ajax": {
                        url: "<?php echo base_url() . 'user/pet_data'; ?>",
                        type: 'GET'
                    }
                });
            } else if (filter == 'high') {
                dt_pet_list = $('#pettable').DataTable({
                    "bAutoWidth": false,
                    "lengthMenu": [
                        [10, 25, 50, 100],
                        [10, 25, 50, 100]
                    ],
                    stateSave: true,
                    colReorder: false,
                    "ajax": {
                        url: "<?php echo base_url() . 'user/pet_data_high'; ?>",
                        type: 'GET'
                    }
                });
            } else if (filter == 'low') {
                dt_pet_list = $('#pettable').DataTable({
                    "bAutoWidth": false,
                    "lengthMenu": [
                        [10, 25, 50, 100],
                        [10, 25, 50, 100]
                    ],
                    stateSave: true,
                    colReorder: false,
                    "ajax": {
                        url: "<?php echo base_url() . 'user/pet_data_low'; ?>",
                        type: 'GET'
                    }
                });
            }
        }

    });
});
</script>