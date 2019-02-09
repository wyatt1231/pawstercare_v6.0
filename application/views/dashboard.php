<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="font-tnr">
            <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3 id="h_petcruelty" class="font-tnr">
                            <div class="loader"></div>
                        </h3>
                        <h5 class="font-tnr"> On Progress Pet Cruelty Reports</h5>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>PetCrueltyList" class="small-box-footer font-tnr">More info <i
                            class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3 id="h_pets" class="font-tnr">
                            <div class="loader"></div>
                        </h3>
                        <h5 class="font-tnr">Total Pets</h5>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>petlist" class="small-box-footer font-tnr">More info <i
                            class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner font-tnr">
                        <h3 id="h_adopters" class="font-tnr">
                            <div class="loader"></div>
                        </h3>
                        <h5 class="font-tnr">Unscreened Adopters</h5>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>adopterList" class="small-box-footer font-tnr">More info <i
                            class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red font-tnr">
                    <div class="inner ">
                        <h3 id="h_approvals" class="font-tnr">
                            <div class="loader"></div>
                        </h3>
                        <h5 class="font-tnr">Pending Adoption Requests For City Vet</h5>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>adoptionrequests" class="small-box-footer font-tnr">More info <i
                            class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
        </div>
        <hr
            style="  display: block;
    height: 1px;
    border: 5;
    border-top: 10px solid #A9A9A9;
    margin: 1em 0;
    padding: 5; background-color:#A9A9A9;">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title font-tnr">Pets with Lowest Average Rating (Below 2.5)</h3>
            </div>
            <div class="box-body" style="">
                <div>
                    <div id="myfirstchart" style="height: 550px;" class="font-tnr"></div>
                </div>
            </div>
        </div>


    </section>

</div>
<style>
.morris-hover {
    position: absolute;
    z-index: 1000;
}

.morris-hover.morris-default-style {
    border-radius: 10px;
    padding: 6px;
    color: #666;
    background: rgba(255, 255, 255, 0.8);
    border: solid 2px rgba(230, 230, 230, 0.8);
    font-family: sans-serif;
    font-size: 12px;
    text-align: center;
}

.morris-hover.morris-default-style .morris-hover-row-label {
    font-weight: bold;
    margin: 0.25em 0;
}

.morris-hover.morris-default-style .morris-hover-point {
    white-space: nowrap;
    margin: 0.1em 0;
}
</style>

<script type="text/javascript">
$(document).ready(function() {
    $.ajax({
        url: '<?php echo base_url(); ?>user/get_data_dashboard', //controller/method
        type: 'ajax',
        dataType: 'json',
        success: function(data) {
            $("#h_petcruelty").empty();
            $("#h_pets").empty();
            $("#h_adopters").empty();
            $("#h_approvals").empty();
            $("#h_petcruelty").append(data[0].pc);
            $("#h_pets").append(data[0].pets);
            $("#h_adopters").append(data[0].pendingusers);
            $("#h_approvals").append(data[0].pendingadoption);
        },
        error: function() {
            alert('Server error occured. Please check your internet connection.');
        }
    });
    $(function() {

        var jsonData = $.getJSON("<?php echo base_url('user/chart');?>",
            function(jsonData) {
                console.log(jsonData);
                new Morris.Bar({
                    // ID of the element in which to draw the chart.
                    element: 'myfirstchart',
                    // Chart data records -- each entry in this array corresponds to a point on
                    // the chart.
                    data: jsonData,
                    // The name of the data record attribute that contains x-values.
                    xkey: 'name',
                    ymax: 5,
                    ymin: 0,
                    // A list of names of data record attributes that contain y-values.
                    ykeys: ['average'],
                    hideHover: true,
                    parseTime: false,
                    gridTextSize: 16,
                    gridTextColor: 'black',
                    verticalGrid: true,
                    gridTextFamily: 'Times New Roman',
                    resize: true,
                    horizontal: true,   
                    stacked: true,
                    labels: ['Average Rating '],
                    xLabelAngle: 60
                });

            });
    });
});
</script>