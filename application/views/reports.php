<div class="content-wrapper font-tnr">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> Reports
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

                                <div class="row">
                                    <h5 cgitlass=" text-center ">View Reports of </h5>
                                </div>
                                <div class="row">
                                    <select class="form-control  " id="filter2" name="filter2">
                                        <option value="adoption">Adopted Pets</option>
                                        <option value="users">Managed Users</option>
                                        <option value="petcruelty">Completed Pet Cruelty Cases</option>
                                    </select>
                                </div>

                                <div class="row">
                                    <h5 class=" text-center "> From </h5>
                                </div>

                                <div class="row">
                                    <input class="form-control" id="date_from" type="date">
                                </div>


                                <div class="row">
                                    <h5 class=" text-center "> To </h5>
                                </div>
                                <div class="row">
                                    <input class="form-control" id="date_to" type="date">
                                </div>
                                <div class="row" style="margin-top: 15px !important;">
                                    <button align="center" class="btn btn-primary text-center" type="submit"
                                    id="submit_filter" name ="submit_filter" style="display: block; margin: auto;"><i class="fa fa-filter">
                                    </i> Filter Results </button>
                                </div>





                            </div>
                            <div class="col-md-4"></div>

                        </div>
                        <div class="row container-fluid">

                            <div class="box box-primary box-solid" style="margin-top: 20px !important;">
                                <div class="box-header with-border">
                                    <h3 class="box-title font-tnr" id="title_header">Adopted Pets by Breed</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"
                                        data-toggle="tooltip" title="" data-original-title="Collapse">
                                        <i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="box-body" style="">

                                   <div class="box-body ">
                                    <table id="petstable" name="petstable" class="table table-hover  table-sm  font-tnr font-tnr"
                                    style="font-family: 'Times New Roman'; font-size: 1em !important;">
                                    <thead>
                                        <tr>


                                            <th name='col1' id="col1"></th>
                                            <th  name='col2' id="col2"></th>



                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                                <div>
                                    <div id="myfirstchart" style="height: 350px;" class="font-tnr"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- /.box-body -->

        </div><!-- /.box -->
    </div>
</div>




</section>
</div>



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


        display_reports();

        function display_reports() {
            var date_from = $("#date_from").val();
            var date_to = $("#date_to").val();
            var jsonData = $.getJSON("<?php echo base_url().'user/chart_pets?from=" +
                date_from + "&to=" + date_to + "'?>",
                function(jsonData) {
                    console.log(jsonData);
                    new Morris.Bar({
                        // ID of the element in which to draw the chart.
                        element: 'myfirstchart',
                        // Chart data records -- each entry in this array corresponds to a point on
                        // the chart.
                        data: jsonData,
                        // The name of the data record attribute that contains x-values.
                        xkey: 'Breed',
                        ymax: 100,
                        ymin: 0,
                        // A list of names of data record attributes that contain y-values.
                        ykeys: ['pet_count'],
                        hideHover: 'auto',
                        parseTime: false,
                        gridTextSize: 13,
                        gridTextColor: 'black',
                        barSize: 20,
                        verticalGrid: true,
                        gridTextFamily: 'Times New Roman',
                        resize: true,
                        // Labels for the ykeys -- will be displayed when you hover over the
                        // chart.
                        labels: ['Percentage of Pets'],
                        xLabelAngle: 60
                    });

                });
        }


        $("#submit_filter").click(function (e) { 
            e.preventDefault();
            var date_from = $("#date_from").val();
            var date_to = $("#date_to").val();

            $("#myfirstchart").empty();
            var filter2 = $("#filter2").val();



            if (filter2 == 'adoption') {
                $("#title_header").empty();
                $("#title_header").append('Adopted Pets by Breed');
                var jsonData = $.getJSON("<?php echo base_url().'user/chart_pets?from=" +
                    date_from + "&to=" + date_to + "'?>",
                    function(jsonData) {
                        console.log(jsonData);
                        new Morris.Bar({
                            element: 'myfirstchart',
                            data: jsonData,
                            xkey: 'Breed',
                            ymax: 100,
                            ymin: 0,
                            ykeys: ['pet_count'],
                            hideHover: 'auto',
                            parseTime: false,
                            gridTextSize: 16,
                            gridTextColor: 'black',
                            verticalGrid: true,
                            gridTextFamily: 'Times New Roman',
                            resize: true,
                            labels: ['Percentage of Pets'],
                            xLabelAngle: 60
                        });

                    });



            } else if (filter2 == 'users') {
                $("#title_header").empty();
                $("#title_header").append('Managed Adopters By Status');
                var jsonData = $.getJSON("<?php echo base_url().'user/chart_adopters?from=" +
                    date_from + "&to=" + date_to + "'?>",
                    function(jsonData) {
                        console.log(jsonData);
                        new Morris.Bar({
                            element: 'myfirstchart',
                            data: jsonData,
                            xkey: 'Status',
                            ymax: 100,
                            ymin: 0,
                            ykeys: ['status_count'],
                            hideHover: 'auto',
                            parseTime: false,
                            gridTextSize: 16,
                            gridTextColor: 'black',
                            verticalGrid: true,
                            gridTextFamily: 'Times New Roman',
                            resize: true,
                            labels: ['Percentage of Users '],
                            xLabelAngle: 60
                        });

                    });
            } else {
                $("#title_header").empty();
                $("#title_header").append('Completed Pet Cruelty Cases By Category');
                var jsonData = $.getJSON("<?php echo base_url().'user/chart_petcruelty?from=" +
                    date_from + "&to=" + date_to + "'?>",
                    function(jsonData) {
                        console.log(jsonData);
                        new Morris.Bar({
                            element: 'myfirstchart',
                            data: jsonData,
                            xkey: 'category',
                            ymax: 100,
                            ymin: 0,
                            ykeys: ['pc_count'],
                            hideHover: 'auto',
                            parseTime: false,
                            gridTextSize: 16,
                            gridTextColor: 'black',
                            verticalGrid: true,
                            gridTextFamily: 'Times New Roman',
                            resize: true,
                            labels: ['Percentage of Completed Reports'],
                            xLabelAngle: 60
                        });

                    });
            }
            
        });
    });


</script>
<script type="text/javascript">

   var dt_adopter_list;
   var date_from = $("#date_from").val();
   var date_to = $("#date_to").val();

   

   $(document).ready( function () {

    displaytable();

    function displaytable() {
        $('#col1').text("Breed");
        $('#col2').text("Percentage");
        $('#col3').text("Count");
      dt_reported_list = $('#petstable').DataTable({
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
                                                    url : "<?php echo base_url().'user/chart_pet_data?from=" + date_from + "&to=" + date_to + "'?>",
                                                    type : 'GET'
                                                },  
                                            });

        //patient_list_data();
        $('#petstable tbody').on('click', 'td', function () {

        });
    }

    $("#submit_filter").click(function(e) {

        e.preventDefault();
        var date_from = $("#date_from").val();
        var date_to = $("#date_to").val();

      /*  $("#loading").append("<div class='loader'> </div>");*/
   var filter2 = $("#filter2").val();
if (filter2 == 'adoption') {
       $('#col1').text("Breed");
        $('#col2').text("Percentage");
        $('#col3').text("Count");
 $('#petstable').DataTable().clear().destroy();
         dt_reported_list = $('#petstable').DataTable({
      "bAutoWidth": false,
      "lengthMenu": [ [25, 50, 75, 100], [25, 50, 75, 100] ],

         $('#petstable').DataTable().clear().destroy();
         dt_reported_list = $('#petstable').DataTable({
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
                                                    url : "<?php echo base_url().'user/chart_pet_data?from=" + date_from + "&to=" + date_to + "'?>",
                                                    type : 'GET'
                                                },  
                                            });


        //patient_list_data();
        $('#petstable tbody').on('click', 'td', function () {

        });
      }
else if (filter2 == 'users') {
       $('#col1').text("Status");
        $('#col2').text("Percentage");
        $('#col3').text("Count");
 $('#petstable').DataTable().clear().destroy();
         dt_reported_list = $('#petstable').DataTable({
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
                                                    url : "<?php echo base_url().'user/chart_adopters_data?from=" + date_from + "&to=" + date_to + "'?>",
                                                    type : 'GET'
                                                },  
                                            });


        //patient_list_data();
        $('#petstable tbody').on('click', 'td', function () {

        });
      }else {
       $('#col1').text("Category");
        $('#col2').text("Percentage");
        $('#col3').text("Count");
 $('#petstable').DataTable().clear().destroy();
         dt_reported_list = $('#petstable').DataTable({
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
                                                    url : "<?php echo base_url().'user/chart_petcruelty_data?from=" + date_from + "&to=" + date_to + "'?>",
                                                    type : 'GET'
                                                },  
                                            });


        //patient_list_data();
        $('#petstable tbody').on('click', 'td', function () {

        });
    }





});

} );


</script>