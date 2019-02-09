<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-list-alt"></i> Adoption Request Management
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <!-- <div class="form-group">
                    <button class="btn btn-primary" id="btn_add_pet"><i class="fa fa-paw"></i> Add New Pet</button>
                </div> -->
            </div>
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header" style="margin-left: 5% !important; margin-right: 5% !important;">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <h5 align="center" class="text-center" style="font-size: 1.3em;"> Filter Adoption
                                    Request
                                </h5>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="container col-md-4 pull-middle" align="center">
                                <select class="form-control  " id="filteradoptionrequest" name="filteradoptionrequest">
                                    <option value="all" class="text-center" align="center">All Adoption Requests
                                    </option>
                                    <option value="pending">Pending Adoption Requests</option>
                                    <option value="approved">Approved Adoption Requests</option>
                                    <option value="denied">Denied Adoption Requests</option>
                                </select>
                            </div>
                            <div class="col-md-4"></div>
                        </div>



                    </div><!-- /.box-header -->

                    <div class="row">

                    </div>
                    <div class="box-body" style="margin-left: 5% !important; margin-right: 5% !important;">
                        <table id="adoption_request_table" class="table table-striped  table-sm  font-tnr font-tnr"
                            style="font-family: 'Times New Roman'; font-size: 1em !important;">
                            <thead>
                                <tr>
                                    <td class="  font-tnr">Adoption ID</td>
                                    <td class="  font-tnr">Pet</td>
                                    <td class=" font-tnr">Adopter</td>
                                    <td class=" font-tnr">Status</td>
                                    <td class=" font-tnr">Timestamp</td>
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

    <!-- MODAL PET ADOPTION -->

    <div class="modal fade font-tnr" id="mdl_adoption_request" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <section class="content-header">
                    <h1 style="width: 100%;">
                        <i class="fa fa-list-alt"></i> Adoption Request Information
                        <i class="fa fa-close" id="btn_edit_modal_close"
                            style="color: red; float: right; list-style: none;"> </i>
                        <div id="modal-loading">
                        </div>
                    </h1>
                </section>
                <div class=" modal-body font-tnr">
                    <div class="row">
                        <div class="col-md-4 " id="loading"></div>
                        <div class="col-md-4 ">
                            <h5 class="text-center changestatus">Change Adoption Status</h5>
                            <div class="form-group">
                                <select class="form-control" id="select_status" name="Status">
                                    <option value="APPROVED">Approved</option>
                                    <option value="DENIED">Denied</option>
                                </select>
                                <input style="margin-top: 10px !important;" type="submit"
                                    class="btn btn-primary form-control" value="Save Status" id="submit_status" />
                            </div>
                        </div>
                        <div class="col-md-4 "></div>
                    </div>
                    <div class="row container-fluid">
                        <div class="tab">
                            <button class="tablinks col-md-4 text-center" type="button"
                                onclick="openCity(event, 'London')" id="defaultOpen"> Adoption Information
                            </button>
                            <button class="tablinks col-md-4 text-center" type="button"
                                onclick="openCity(event, 'Tokyo')">Adopter Information</button>
                            <button class="tablinks col-md-4 text-center" type="button"
                                onclick="openCity(event, 'China')">Pet Information</button>
                        </div>
                        <div id="London" class="tabcontent ">
                            <div class="box-body ">
                                <div class="row">
                                    <div class="col-md-12" align="center">
                                        <h4 class="text-center" id="adoption_timestamp">Sent on
                                        </h4>
                                        <h4 class="text-center" id="adoption_status">Adoption Status is
                                        </h4>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class=" questions ">Why did you decide to adopt a pet from PawsterCare?
                                        </h6>
                                        <h6 class=" answers" id="adoption_a1"> - Answer here</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class=" questions ">How many hours in workdays will your pet spend
                                            without human?</h6>
                                        <h6 class=" answers" id="adoption_a2"> - Answer here</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class=" questions ">During vacations or emergency situation what will
                                            happen to the pet?
                                        </h6>
                                        <h6 class=" answers" id="adoption_a3"> - Answer here</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class=" questions ">Where will this pet be kept during the day or night?
                                        </h6>
                                        <h6 class=" answers" id="adoption_a4"> - Answer here</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class=" questions ">Who do you live with?</h6>
                                        <h6 class=" answers" id="adoption_a6"> - Answer here</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class=" questions ">What type of building do live in?</h6>
                                        <h6 class=" answers" id="adoption_a5"> - Answer here</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class=" questions ">Will the whole family share in the care of the pet?
                                        </h6>
                                        <h6 class=" answers" id="adoption_a7"> - Answer here</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class=" questions ">For whom are you adopting?</h6>
                                        <h6 class=" answers" id="adoption_a8"> - Answer here</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <h6>Are there any children who visits you home frequently</h6>
                                        <h6 class=" answers" id="adoption_a9"> - Answer here</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class=" questions ">Do you have other pet companion in the past?</h6>
                                        <h6 class=" answers" id="adoption_a10"> - Answer here</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class=" questions ">Do you have a fenced yard?</h6>
                                        <h6 class=" answers" id="adoption_a11"> - Answer here</h6>
                                    </div>


                                </div>


                            </div>


                        </div>

                        <div id="Tokyo" class="tabcontent ">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12" id="adopter_information">
                                        <div class="row font-tnr">
                                            <div class="col-md-12" align="center">
                                                <div id="adopterimage">
                                                    Image
                                                </div>
                                                <div>
                                                    <h4 id="adoptername"> </h4>
                                                </div>
                                                <div>
                                                    <h5 id="adopter_status"> </h5>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div id="homeaddress">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div id="birthdate">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div id="civilstatus">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div id="gender">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div id="emailaddress">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div id="occupation">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div id="officeaddress">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div id="salary">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="China" class="tabcontent ">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12" id="adopter_information">
                                        <div class="row font-tnr">
                                            <div class="col-md-12" align="center">
                                                <div id="petimage">
                                                    Pet Image
                                                </div>
                                                <div class="col-md-12">
                                                    <h6 class="adopterinfo" id="petname"><b>Maui</b>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="adopterinfo" id="pettype"> Pet type is <b>Dog</b>
                                                </h6>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="adopterinfo" id="petbreed"> Breed is <b>Aspin</b>
                                                </h6>
                                            </div>

                                            <div class="col-md-6">
                                                <h6 class="adopterinfo" id="petsize"> The size is <b>Large -> 15-20
                                                        Inches</b>
                                                </h6>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="adopterinfo" id="petgender"> Gender is <b>Male</b>
                                                </h6>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="adopterinfo" id="petcolor"> Color is <b>Red</b>
                                                </h6>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="adopterinfo" id="petage">Age is <b>Mature -> Above 7 years
                                                    </b>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
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
    align: center;
    float: center;
    font-size: .9em;
}

.changestatus {
    font-size: 1.3em;
    font-family: 'Timew New Roman';
}

.answers {
    margin-left: 2%;
}

.questions {
    font-size: .85em;
    font-weight: bold;
}

img {
    height: 100px;
    width: 100px;
    border-radius: 50%;
}
</style>

<script>
var selected_adoption_id = 0;
$(document).ready(function() {
    var dt_pet_list = $('#adoption_request_table').DataTable({
        "bAutoWidth": false,
        "lengthMenu": [
            [10, 25, 50, 100],
            [10, 25, 50, 100]
        ],
        stateSave: true,
        colReorder: false,
        "ajax": {
            url: "<?php echo base_url() . 'user/adoption_requests_data'; ?>",
            type: 'GET'
        }
    });




    $('#adoption_request_table tbody').on('dblclick', 'td', function() {
        var data = dt_pet_list.row($(this).parents('tr')).data();
        var adoption_id = data[0];
        selected_adoption_id = data[0];
        $("#mdl_adoption_request").modal('show');
        $("#adoption_timestamp").empty();
        $("#adoption_status").empty();
        $("#adoption_timestamp").append('<b>' + data[4] + '</b>');
        $("#adoption_status").append('<b>' + data[3] + '</b>');

        $("#loading").append("<div class='loader'> Loading... </div>");

        if (data[3] != "Pending") {
            $("#submit_status").prop('disabled',true);
        }else{
            $("#submit_status").prop('disabled',false);
        }

        $.ajax({
            type: "POST",
            data: "adoption_id=" + data[0],
            url: '<?php echo base_url(); ?>user/selected_adoption_request_info',
            dataType: "json",
            success: function(result) {
                console.log(result);
                $("#adoption_a1").empty();
                $("#adoption_a2").empty();
                $("#adoption_a3").empty();
                $("#adoption_a4").empty();
                $("#adoption_a5").empty();
                $("#adoption_a6").empty();
                $("#adoption_a7").empty();
                $("#adoption_a8").empty();
                $("#adoption_a9").empty();
                $("#adoption_a10").empty();
                $("#adoption_a11").empty();
                $("#loading").empty();

                $("#adoption_a1").append(' - ' + result.data[0][0]);
                $("#adoption_a2").append(' - ' + result.data[0][1]);
                $("#adoption_a3").append(' - ' + result.data[0][2]);
                $("#adoption_a4").append(' - ' + result.data[0][3]);
                $("#adoption_a5").append(' - ' + result.data[0][4]);
                $("#adoption_a6").append(' - ' + result.data[0][5]);
                $("#adoption_a7").append(' - ' + result.data[0][6]);
                $("#adoption_a8").append(' - ' + result.data[0][7]);
                $("#adoption_a9").append(' - ' + result.data[0][8]);
                $("#adoption_a10").append(' - ' + result.data[0][9]);
                $("#adoption_a11").append(' - ' + result.data[0][10]);

            },
            error: function(error) {
                alert(
                    "Could not reach the server. Please check your internet connection or network status."
                );
            }
        });

        $.ajax({
            type: "POST",
            data: "adoption_id=" + data[0],
            url: '<?php echo base_url(); ?>user/selected_adoption_request_adopter',
            dataType: "json",
            success: function(result) {
                console.log(result);
                $("#adopterimage").empty();
                $("#adoptername").empty();
                $("#adopter_status").empty();
                $("#homeaddress").empty();
                $("#birthdate").empty();
                $("#civilstatus").empty();
                $("#emailaddress").empty();
                $("#occupation").empty();
                $("#gender").empty();
                $("#officeaddress").empty();
                $("#salary").empty();

                $("#adopterimage").append(
                    '<img class="img-circle" src="<?php echo base_url(); ?>uploads/' +
                    result.data[0][1] + '?>" alt="User Avatar">');
                $("#adoptername").append('<h5><b>' + result.data[0][2] + ' ' + result.data[
                    0][3] + ' ' + result.data[0][4] + '</b></h5>');
                $("#adopter_status").append('<h5>' + result.data[0][14] + '</h5>');
                $("#homeaddress").append(
                    '<h5><span><i class="fa fa-home"></i></span> Lives in <b>' + result
                    .data[0][6] + '</b></h5>');
                $("#birthdate").append(
                    '<h5><span><i class="fa fa-birthday-cake"></i></span> Birthday is on <b>' +
                    result.data[0][7] + '</b></h5>');
                $("#civilstatus").append(
                    '<h5><span><i class="fa fa-heart" style="color: red;"></i></span> Civil Status is <b>' +
                    result.data[0][8] + '</b></h5>');
                $("#gender").append(
                    '<h5><span><i class="fa fa-transgender"></i></span> Gender is <b>' +
                    result.data[0][5] + '</b></h5>');
                $("#emailaddress").append(
                    '<h5><span><i class="fa fa-envelope"></i></span> Email Address is <b>' +
                    result.data[0][10] + '</b></h5>');
                $("#occupation").append(
                    ' <h5><span><i class="fa fa-briefcase"></i></span> Works as a <b>' +
                    result.data[0][12] + '</b></h5>');
                $("#officeaddress").append(
                    '<h5><span><i class="fa fa-building"></i></span> Works at  <b>' +
                    result.data[0][9] + '</b></h5>');
                $("#salary").append(
                    ' <h5><span><i class="fa fa-briefcase"></i></span> Job Salary is <b>' +
                    result.data[0][13] + '</b></h5>');
            },
            error: function(error) {
                alert(
                    "Could not reach the server. Please check your internet connection or network status."
                );
            }
        });

        $.ajax({
            type: "POST",
            data: "adoption_id=" + data[0],
            url: '<?php echo base_url(); ?>user/selected_adoption_request_pets',
            dataType: "json",
            success: function(result) {
                console.log(result);
                $("#petimage").empty();
                $("#petname").empty();
                $("#pettype").empty();
                $("#petsize").empty();
                $("#petgender").empty();
                $("#petcolor").empty();
                $("#petage").empty();
                $("#petbreed").empty();

                $("#petimage").append(
                    '<img class="img-circle" src="<?php echo base_url(); ?>pets/' +
                    result.data[0][1] + '?>" alt="User Avatar">');
                $("#petname").append('<h4><b>' + result.data[0][2] + '</b></h4>');
                $("#pettype").append('<h5>Pet Type is <b>' + result.data[0][3] +
                    '</b></h5>');
                $("#petbreed").append(
                    '<h5>Breed is <b>' + result
                    .data[0][4] + '</b></h5>');
                $("#petsize").append(
                    '<h5> Size is <b>' +
                    result.data[0][8] + '</b></h5>');
                $("#petgender").append(
                    '<h5> Civil Gender is <b>' +
                    result.data[0][5] + '</b></h5>');
                $("#petcolor").append(
                    '<h5>Color is <b>' +
                    result.data[0][6] + '</b></h5>');
                $("#petage").append(
                    '<h5>Age is <b>' +
                    result.data[0][7] + '</b></h5>');
            },
            error: function(error) {
                alert(
                    "Could not reach the server. Please check your internet connection or network status."
                );
            }
        });

    });



    $("#btn_add_modal_close").click(function() {
        $("#mdl_add_pet").modal('hide');
    });

    $("#btn_edit_modal_close").click(function() {
        $("#mdl_adoption_request").modal('hide');
    });

    $("#filteradoptionrequest").change(function(e) {
        e.preventDefault();
        var filter = $("#filteradoptionrequest").val();

    });


    $("#filteradoptionrequest").change(function(e) {
        e.preventDefault();
        if ($.fn.DataTable.isDataTable("#adoption_request_table")) {
            $('#adoption_request_table').DataTable().clear().destroy();
            var filter = $("#filteradoptionrequest").val();
            if (filter == 'all') {
                dt_pet_list = $('#adoption_request_table').DataTable({
                    "bAutoWidth": false,
                    "lengthMenu": [
                        [10, 25, 50, 100],
                        [10, 25, 50, 100]
                    ],
                    stateSave: true,
                    colReorder: false,
                    "ajax": {
                        url: "<?php echo base_url() . 'user/adoption_requests_data'; ?>",
                        type: 'GET'
                    }
                });
            } else if (filter == 'pending') {
                dt_pet_list = $('#adoption_request_table').DataTable({
                    "bAutoWidth": false,
                    "lengthMenu": [
                        [10, 25, 50, 100],
                        [10, 25, 50, 100]
                    ],
                    stateSave: true,
                    colReorder: false,
                    "ajax": {
                        url: "<?php echo base_url() . 'user/adoption_requests_data_pending'; ?>",
                        type: 'GET'
                    }
                });
            } else if (filter == 'approved') {
                dt_pet_list = $('#adoption_request_table').DataTable({
                    "bAutoWidth": false,
                    "lengthMenu": [
                        [10, 25, 50, 100],
                        [10, 25, 50, 100]
                    ],
                    stateSave: true,
                    colReorder: false,
                    "ajax": {
                        url: "<?php echo base_url() . 'user/adoption_requests_data_approved'; ?>",
                        type: 'GET'
                    }
                });
            } else if (filter == 'denied') {
                dt_pet_list = $('#adoption_request_table').DataTable({
                    "bAutoWidth": false,
                    "lengthMenu": [
                        [10, 25, 50, 100],
                        [10, 25, 50, 100]
                    ],
                    stateSave: true,
                    colReorder: false,
                    "ajax": {
                        url: "<?php echo base_url() . 'user/adoption_requests_data_denied'; ?>",
                        type: 'GET'
                    }
                });
            }
        }

    });

    $("#submit_status").click(function(e) {
        e.preventDefault();
        var status = $("#select_status").val();
        var adoption_id = selected_adoption_id;

        $.ajax({
            type: "POST",
            data: "adoption_id=" + selected_adoption_id + "&adoption_status=" + status,
            url: '<?php echo base_url(); ?>user/update_adoption_status',
            dataType: "json",
            success: function(result) {
                console.log(result);

                if (result.success == true) {
                    $("#adoption_status").empty();
                    $("#adoption_status").append('<b>' + status + '</b>');
                    alert("The adoption status has been successfully updated.");
                } else {
                    alert("The adoption status has not been successfully updated.");
                }

            },
            error: function(error) {
                alert(
                    "Could not reach the server. Please check your internet connection or network status."
                );
            }
        });
    });



});
</script>