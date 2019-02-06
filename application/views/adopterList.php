<div class="content-wrapper font-tnr">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> User Management
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <div class="box-body" style="margin-left: 5% !important; margin-right: 5% !important;">
                        <div class="row ">
                            <div class="box-tools" id="loading">

                            </div>
                            <div class="col-md-4"></div>

                            <div class="col-md-4">
                                <h3 class=" text-center ">Filter</h3>

                                <select class="form-control  " id="filter2" name="filter2">
                                    <option value="registered">Registered Users</option>
                                    <option value="unscreened">Unscreened Users</option>
                                    <option value="screened">Screened Users</option>
                                    <option value="blocked">Blocked Users</option>
                                </select>

                                <select class="form-control  " id="filter1" name="filter1"
                                    style="margin-top: 10px !important;margin-bottom: 10px !important;">
                                    <option value="withwithout">With or Without Pets</option>
                                    <option value="with">With Pets</option>
                                    <option value="without">Without Pets</option>
                                </select>

                                <button align="center" class="btn btn-primary text-center" type="submit"
                                    id="submit_filter" style="display: block; margin: auto;"><i class="fa fa-filter">
                                    </i> Filter Results </button>

                            </div>

                            <div class="col-md-4"></div>

                        </div>
                        <table style="font-family: 'Times New Roman'; font-size: 1em !important;" id="adoptertable"
                            class="table table-striped  table-sm  font-tnr" width="100%">
                            <thead>
                                <tr>
                                    <td class="font-tnr">ID</td>
                                    <td class="font-tnr">Name</td>
                                    <td class="font-tnr">Home Address</td>
                                    <td class="font-tnr">Email Address</td>
                                    <td class="font-tnr">Reports</td>
                                    <td class="font-tnr">Status</td>
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
</div>


<!-- MODAL SHOW USERS INFO -->

<div class="modal fade font-tnr" id="mdl_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <section class="content-header">
                <h1 style="width: 100%;">
                    <i class="fa fa-users "></i> User Information
                    <i class="fa fa-close" id="btn_user_modal_close"
                        style="color: red; float: right; list-style: none;"> </i>
                    <div id="modal-loading">
                    </div>
                </h1>
            </section>
            <div class=" modal-body font-tnr">
                <div class="row">
                    <div class="section col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-widget widget-user">
                                    <div class="widget-user-header bg-aqua-active" id="usermaininfo">
                                    </div>
                                    <div class="widget-user-image" id="userimage">
                                    </div>
                                    <div class="box-footer">
                                        <div class="row">
                                            <div class="col-sm-4 border-right">
                                                <div class="description-block">
                                                </div>
                                            </div>
                                            <div class="col-sm-4 border-right">
                                                <div class="description-block">
                                                    <h5 class="description-header"></h5>
                                                    <span class="description-text"></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="description-block">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-4 "></div>
                            <div class="col-md-4 ">
                                <h3 class="text-center">Change Status </h3>
                                <div class="form-group">
                                    <select class="form-control" id="select_status" name="Status">
                                        <option value="Approved by City Vet">Approved by City Vet</option>
                                        <option value="Not Screened by The City Vet Office">Not Screened by The City
                                            Vet Office</option>
                                        <option value="Blocked">Blocked</option>
                                    </select>
                                    <input type="submit" class="btn btn-primary form-control" value="Save Status"
                                        id="submit_status" style="margin-top: 10px !important;" />
                                </div>
                            </div>
                            <div class="col-md-4 "></div>
                        </div>
                        <div class="row container-fluid">
                            <div class="tab">
                                <button class="tablinks col-md-4 text-center" type="button"
                                    onclick="openCity(event, 'London')" id="defaultOpen"> Update Information
                                </button>
                                <button class="tablinks col-md-4 text-center" type="button"
                                    onclick="openCity(event, 'Tokyo')">Activities</button>
                                <button class="tablinks col-md-4 text-center" type="button"
                                    onclick="openCity(event, 'China')">Reports</button>
                            </div>
                            <div id="London" class="tabcontent ">
                                <div class="box-body font-tnr">
                                    <div class="row">
                                        <!-- content 1 -->
                                        <div class="col-md-6">
                                            <div class="form-group" id="homeaddress">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group" id="birthdate">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group" id="civilstatus">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group" id="gender">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group" id="emailaddress">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group" id="occupation">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group" id="officeaddress">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group" id="salary">
                                            </div>
                                        </div>
                                        <!-- end content 1 -->
                                    </div>
                                </div>
                            </div>
                            <div id="Tokyo" class="tabcontent ">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12" id="user_activities">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="China" class="tabcontent ">
                                <div class="box-body" id="user_reports">
                                    <div class="row">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
</style>





<script>
var dt_adopter_list;
var selected_user_id;
$(document).ready(function() {
    var filter1 = $("#filter1").val();
    var filter2 = $("#filter2").val();
    dt_adopter_list = $('#adoptertable').DataTable({
        "bAutoWidth": false,
        "lengthMenu": [
            [10, 20, 40, 80],
            [10, 20, 40, 80]
        ],
        stateSave: true,
        colReorder: false,
        "ajax": {
            url: "<?php echo base_url().'user/user_filter'?>",
            data: {
                filter1: filter1,
                filter2: filter2
            },
            type: "POST",
        }
    });


    $("#submit_filter").click(function(e) {
        e.preventDefault();

        $("#loading").append("<div class='loader'> </div>");
        var filter1 = $("#filter1").val();
        var filter2 = $("#filter2").val();
        if ($.fn.DataTable.isDataTable("#adoptertable")) {
            $('#adoptertable').DataTable().clear().destroy();
            dt_adopter_list = $('#adoptertable').DataTable({
                "bAutoWidth": false,
                "lengthMenu": [
                    [10, 20, 40, 80],
                    [10, 20, 40, 80]
                ],
                stateSave: true,
                colReorder: false,
                "ajax": {
                    url: "<?php echo base_url().'user/user_filter'?>",
                    data: {
                        filter1: filter1,
                        filter2: filter2
                    },
                    type: "POST",
                },
                "initComplete": function(settings, json) {
                    $("#loading").empty();
                }
            });
        }
    });

    $("#btn_user_modal_close").click(function(e) {
        e.preventDefault();
        $("#mdl_user").modal('hide');
    });

    $("#submit_status").click(function(e) {
        e.preventDefault();
        var status = $("#select_status").val();
        $.ajax({
            type: "POST",
            data: "userid=" + selected_user_id + "&userstatus=" + status,
            url: '<?php echo base_url(); ?>user/update_user_status',
            dataType: "json",
            success: function(result) {
                console.log(result);
                if (result.success == true) {
                    $('#h_user_status').remove();
                    $('#usermaininfo').append(
                        '<h5 class="widget-user-desc" id="h_user_status">' + status +
                        '<br></h5>');
                    alert("The user status has been updated successfully");
                } else {
                    alert("Server error. Please check your internet connection");
                }
            },
            error: function(error) {
                alert(
                    "Could not reach the server. Please check your internet connection or network status."
                );
            }
        });
    });

    $('#adoptertable tbody').on('dblclick', 'td', function() {
        $("#mdl_user").modal('show');
        var data = dt_adopter_list.row($(this).parents('tr')).data();
        selected_user_id = data[0];
        $("#usermaininfo").append("<div class='loader'> </div>");
        $("#userimage").append("<div class='loader'> </div>");
        $("#homeaddress").append("<div class='loader'> </div>");
        $("#birthdate").append("<div class='loader'> </div>");
        $("#civilstatus").append("<div class='loader'> </div>");
        $("#gender").append("<div class='loader'> </div>");
        $("#emailaddress").append("<div class='loader'> </div>");
        $("#occupation").append("<div class='loader'> </div>");
        $("#officeaddress").append("<div class='loader'> </div>");
        $("#salary").append("<div class='loader'> </div>");

        $.ajax({
            type: "POST",
            data: "userid=" + data[0],
            url: '<?php echo base_url(); ?>user/selected_user_information',
            dataType: "json",
            success: function(response) {
                console.log(response);
                $("#usermaininfo").empty();
                $("#userimage").empty();
                $("#homeaddress").empty();
                $("#birthdate").empty();
                $("#civilstatus").empty();
                $("#gender").empty();
                $("#emailaddress").empty();
                $("#occupation").empty();
                $("#officeaddress").empty();
                $("#salary").empty();
                $("#usermaininfo").append('<h5 class="widget-user-username">' + response
                    .data[0][2] + '</h5>' +
                    '<h5 class="widget-user-desc" id="h_user_status">' + response.data[
                        0][9] + '<br></h5>');
                $("#userimage").append(
                    '<img class="img-circle" src="<?php echo base_url(); ?>uploads/' +
                    response.data[0][1] + '?>" alt="User Avatar">');
                $("#homeaddress").append(
                    '<h5><span><i class="fa fa-home"></i></span> Lives in ' + response
                    .data[0][3] + '</h5>');
                $("#birthdate").append(
                    '<h5><span><i class="fa fa-birthday-cake"></i></span> Birthday is on ' +
                    response.data[0][4] + '</h5>');
                $("#civilstatus").append(
                    '<h5><span><i class="fa fa-heart" style="color: red;"></i></span> Civil Status is ' +
                    response.data[0][5] + '</h5>');
                $("#gender").append(
                    '<h5><span><i class="fa fa-transgender"></i></span> Gender is ' +
                    response.data[0][10] + '</h5>');
                $("#emailaddress").append(
                    '<h5><span><i class="fa fa-envelope"></i></span> Email Address is ' +
                    response.data[0][7] + '</h5>');
                $("#occupation").append(
                    ' <h5><span><i class="fa fa-briefcase"></i></span> Works as a ' +
                    response.data[0][8] + '</h5>');
                $("#officeaddress").append(
                    '<h5><span><i class="fa fa-building"></i></span> Works at  ' +
                    response.data[0][6] + '</h5>');
                $("#salary").append(
                    ' <h5><span><i class="fa fa-briefcase"></i></span> Job Salary is ' +
                    response.data[0][11] + '</h5>');

            },
            error: function(error) {
                alert(
                    "Could not reach the server. Please check your internet connection or network status."
                );
            }
        });

        $.ajax({
            type: "POST",
            data: "userid=" + data[0],
            url: '<?php echo base_url(); ?>user/selected_user_reports',
            dataType: "json",
            success: function(result) {
                console.log(result);
                $("#user_reports").empty();
                for (let i = 0; i < result.data.length; i++) {
                    $("#user_reports").append(
                        '<span class="text-muted"> <h5> ' + result.data[i][1] +
                        ' has been reported by ' + result.data[i][2] + ' because of ' +
                        result.data[i][3] + ' on ' + result.data[i][4] +
                        '.</h5> </span>'
                    );
                }

                if (result.data.length < 1) {
                    $("#user_reports").append(
                        '<span class="text-muted"> <h4> Has not been reported by any user.</h4> </span>'
                    );
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
            data: "userid=" + data[0],
            url: '<?php echo base_url(); ?>user/selected_user_timeline',
            dataType: "json",
            success: function(response) {
                console.log(response);
                $("#user_activities").empty();
                for (let i = 0; i < response.data.length; i++) {

                    if (response.data[i][2] === 'Pending') {
                        $("#user_activities").append(
                            '<span class="text-muted"><h5> ' + response.data[i][0] +
                            ' wants to adopt ' + response.data[0][1] + ' on ' + response
                            .data[i][3] + '.</h5></span>'
                        );
                    } else if (response.data[i][2] === 'APPROVED') {
                        $("#user_activities").append(
                            '<span class="text-muted"><h5> ' + response.data[i][0] +
                            ' was approved to adopt ' + response.data[0][1] + ' on ' +
                            response.data[i][3] + '.</h5></span>'
                        );
                    } else if (response.data[i][2] === 'Denied') {
                        $("#user_activities").append(
                            '<span class="text-muted"><h5> ' + response.data[i][0] +
                            ' was denied to adopt ' + response.data[0][1] + ' on ' +
                            response.data[i][3] + '.</h5></span>'
                        );
                    } else {
                        $("#user_activities").append(
                            '<span class="text-muted"><h5> ' + response.data[i][0] +
                            ' cancelled the adoption request for ' + response.data[0][
                                1
                            ] + ' on ' + response.data[i][3] + '.</h5></span>'
                        );
                    }
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