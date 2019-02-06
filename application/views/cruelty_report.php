<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<i class="fa fa-users"></i> Reports

		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				
				<div class="form-group">	
					
					<form method="POST">
						<div class="col-xs-3">
							<h5>Year</h5>
							<!-- <select name="mont" class="form-control">
								<option value="January">January</option>
								<option value="February">February</option>
								<option value="March">March</option>
								<option value="April">April</option>
								<option value="May">May</option>
								<option value="June">June</option>
								<option value="July">July</option>
								<option value="August">August</option>
								<option value="September">September</option>
								<option value="October">October</option>
								<option value="November">November</option>
								<option value="December">December</option>
							</select> -->
							<?php
							echo '<select name="yer" id="yer" class="form-control">';
							$already_selected_value =2018;
							$earliest_year = 2018;
							foreach (range(date('Y')+1, $earliest_year) as $x) {
								echo '<option value="'.$x.'"'.($x === $already_selected_value ? ' selected="selected"' : '').'>'.$x.'</option>';
							}
							echo '</select>';
							?>
						
						</form>
					</div>

					<div>
						<div class="col-xs-12">			
							<div class="box box-primary box-solid">
								<div class="box-header with-border">
									<h3 class="box-title">Pet cruelty report per month and year</h3>

									<div class="box-tools pull-right">
										<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
              <!-- <i class="fa fa-minus"></i></button>
              	<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove"> -->
              		<i class="fa fa-minus"></i></button>
              	</div>
              </div>
              <div class="box-body" style="">

              	<div>
              		<!--<div id='myChart7'><a class="zc-ref" href="https://www.zingchart.com/">Charts by ZingChart</a>-->

              		<!--</div>-->
              			 <div id="report7" style="height: 550px;"></div>
              	</div>
              </div>
              <!-- /.box-body -->
      <!--   <div class="box-footer" style="">
          Footer
      </div> -->
      <!-- /.box-footer-->
  </div>

</div>


</div>

</div>
</div>

</section>

</div>

<script>
  $("#yer").change(function (e) { 
             e.preventDefault();
                $("#report7").empty();
            var yer= $("#yer").val();
            if (yer === "2018") {
               var jsonData = $.getJSON("<?php echo base_url('user/report72018');?>", function (jsonData) {
        console.log(jsonData); 

        new Morris.Bar({
  // ID of the element in which to draw the chart.
  element: 'report7',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: jsonData,
  // The name of the data record attribute that contains x-values.
  xkey: 'Remarks',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['total'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Value']
        });

    });
           }else if(yer === "2019"){
                 var jsonData = $.getJSON("<?php echo base_url('user/report72019');?>", function (jsonData) {
        console.log(jsonData); 

        new Morris.Bar({
  // ID of the element in which to draw the chart.
  element: 'report7',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: jsonData,
  // The name of the data record attribute that contains x-values.
  xkey: 'Remarks',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['total'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Value']
        });

    });
            }else if(yer === "2020"){
                 var jsonData = $.getJSON("<?php echo base_url('user/report72020');?>", function (jsonData) {
        console.log(jsonData); 

        new Morris.Bar({
  // ID of the element in which to draw the chart.
  element: 'report7',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: jsonData,
  // The name of the data record attribute that contains x-values.
  xkey: 'Remarks',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['total'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Value']
        });

    });
            }
        });
        
    $( document ).ready(function() {

$(function() {
    var jsonData = $.getJSON("<?php echo base_url('user/report72018');?>", function (jsonData) {
        console.log(jsonData); 

        new Morris.Bar({
  // ID of the element in which to draw the chart.
  element: 'report7',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: jsonData,
  // The name of the data record attribute that contains x-values.
  xkey: 'Remarks',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['total'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Value']
        });

    });
   
});
});
</script>



<script type="text/javascript">

  zingchart.THEME="classic";
var initState = null; // Used later to store the chart state before changing the data

var bgColors = ["#1976d2","#424242","#388e3c","#ffa000","#7b1fa2","#c2185b"]; // ie, chrome, ff, safari, opera, unknown




var myConfig7 = {
  "globals": {
    "font-family": "Helvetica"
  },
  "type": "bar",
  "background-color": "white",
  "title": {
    "color": "#606060",
    "background-color": "white",
   
  },
  "subtitle": {
    "color": "#606060",
   
  },

  "scaleY": {
      <?php foreach ($cruel as $cr) :?>   
           <?php endforeach?>
    values:'0:100:5',
  
   label: {
    text: 'Total',
    backgroundColor: 'white',
    borderColor: 'white',
    borderRadius: 3,
    borderWidth: 1,
    fontColor: 'black',
    fontFamily: 'Arial',
    fontSize: 16,
    fontStyle: 'normal',
    fontWeight: 'normal',
    padding: '5px 20px',
    
   
  },
  "line-color": "none",
  "tick": {
    "line-color": "black"
  },
  "guide": {
    "line-style": "solid"
  },
  "item": {
    "color": "#606060"
  }

},

"scale-x": {
 label: {
  text: 'Month and Year',
  backgroundColor: 'white',
  borderColor: 'white',
  borderRadius: 3,
  borderWidth: 1,
  fontColor: 'black',
  fontFamily: 'Arial',
  fontSize: 16,
  fontStyle: 'normal',
  fontWeight: 'normal',
  padding: '5px 20px'
},


"values": [
  <?php foreach ($cruel as $cr) :?> 
   "<?php echo $cr['name'];?>",
 <?php endforeach?>
],

"line-color": "#C0D0E0",
"line-width": 1,
"tick": {
  "line-width": 1,
  "line-color": "#C0D0E0"
},
"guide": {
  "visible": true
},
"item": {
  "color": "#606060"
}
},
"crosshair-x": {
  "marker": {
    "visible": true
  },
  "line-color": "none",
  "line-width": "0px",
  "scale-label": {
    "visible": true
  },

  "plot-label": {
    "text": "%data-browser: %v of total",
    "multiple": true,
    "font-size": "12px",
    "color": "#606060",
    "background-color": "white",
    "border-width": 3,
    "alpha": 0.9,
    "callout": true,
    "callout-position": "bottom",
    "shadow": 0,
    "placement": "node-top",
    "border-radius": 4,
    "offsetY":-20,
    "padding":8,
    "rules": [
    {
      "rule": "%i==0",
      "border-color": "#1976d%v"
    },
    {
      "rule": "%i==1",
      "border-color": "#42424%v"
    },
    {
      "rule": "%i==2",
      "border-color": "#388e3%v"
    },
    {
      "rule": "%i==3",
      "border-color": "#ffa00%v"
    },
    {
      "rule": "%i==4",
      "border-color": "#7b1fa%v"
    },
    {
      "rule": "%i==5",
      "border-color": "#c2185%v"
    }
    ]
  }
},
"plot": {
  "data-browser": [
  <?php foreach ($cruel as $cr) :?> 
   "<?php echo $cr['name'];?>",
 <?php endforeach?>
 ],
 "cursor": "hand",
 "value-box": {
  "text": "%v",
  "text-decoration": "underline",
  "color": "#606060"
},
"tooltip": {
  "visible": false
},
"animation": {
      "delay": "100",
      "effect": "4",
      "method": "5",
      "sequence": "1"
    },
"rules": [
{
  "rule": "%i==0",
  "background-color": "#1976d%v"
},
{
  "rule": "%i==1",
  "background-color": "#42424%v"
},
{
  "rule": "%i==2",
  "background-color": "#388e3%v"
},
{
  "rule": "%i==3",
  "background-color": "#ffa00%v"
},
{
  "rule": "%i==4",
  "background-color": "#7b1fa%v"
},
{
  "rule": "%i==5",
  "background-color": "#c2185%v"
}
]
},
"series": [
{
  "values": [
  <?php foreach ($cruel as $cr) :?> 
   "<?php echo $cr['total'];?>",
 <?php endforeach?>
 ]
}
]
};

var updateChart = function(p){
  initState = zingchart.exec(p.id,'getdata'); // Gets the state of the chart when the node was clicked
  var newValues = null;
  var update = null;
  switch(p.nodeindex){
    case 0:
    newValues = store['ie'];
    update = true;
    break;
    case 1:
    newValues = store['chrome'];
    update = true;
    break;
    case 2:
    newValues = store['firefox'];
    update = true;
    break;
    case 3:
    newValues = store['safari'];
    update = true;
    break;
    case 4:
    newValues = store['opera'];
    update = true;
    break;
    case 5:
      update = false; // We don't want to allow drilldown for unknown
      break;
    }
    if(update){
    zingchart.unbind(p.id, 'node_click'); // Disable node_click for second level
    zingchart.exec(p.id, 'modify', {
      update:false, // Making multiple changes, queue these changes
      data:{
        "crosshair-x":{
          "plot-label":{
            "text":"%v% of total",
            "rules":[],
            "border-color": bgColors[p.nodeindex]
          }
        },
        "plot":{
          "cursor":null,
          "rules":[],
          "background-color": bgColors[p.nodeindex]
        },
        "scale-x":{

          "values":[]
        }
      }
    });
    zingchart.exec(p.id, 'setseriesvalues',{ // Replaces all values at plotindex 0
      update:false, // Queue these, too
      plotindex:0,
      values:newValues
    });
    zingchart.exec(p.id,'update'); // Push queued changes
    zingchart.bind(p.id, 'animation_end', function(){ // When the animation ends...
      zingchart.exec(p.id, 'addobject',{ // ...add a back button
        type:'shape',
        data:{
          "type":"rectangle",
          "id":"back_btn",
          "height":20,
          "width":70,
          "background-color":"#ffffff #f6f6f6",
          "x":"80%",
          "y":"16%",
          "border-width":1,
          "border-color":"#888",
          "cursor":"hand",
          "label":{
            "text":"< Back",
            "color": "#606060"
          },
          "hover-state":{
            "background-color":"#1976D2 #ffffff",
            "border-color":"#57a2ff",
            "fill-angle": -180
          }
        }
      });
    });
  }
};

zingchart.render({
  id : 'myChart7', 
  data : myConfig7,
});

zingchart.bind('myChart7','node_click',updateChart);

zingchart.bind('myChart7', 'shape_click', function(p){ // Listen for back button click
  zingchart.unbind(p.id,'animation_end');
  if (p.shapeid == "back_btn"){
    zingchart.exec(p.id,'setdata',{ // Set the data back to the state it was in when the node was clicked
      data:initState
    });
    zingchart.bind(p.id,'node_click',updateChart);
  }
});

</script>
