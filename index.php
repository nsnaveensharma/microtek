<?php require('auth/check_auth.php'); ?>
<?php require('functions.php');?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Microtek NBD - Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/iconfonts/ionicons/dist/css/ionicons.css">
    <link rel="stylesheet" href="assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
	
    <link rel="stylesheet" href="assets/css/shared/style.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/demo_1/style.css">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
	  <!-- plugins:js -->
  
	
  </head>
  <body>
    <div class="container-scroller">


	<!-- partial:partials/_navbar.html -->

	   <?php include("partials/_navbar.php"); ?>
 
	<!-- partial -->
   


   <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        
		<?php include("partials/_sidebar.php"); ?>
		
        <!-- partial -->
        
		<div class="main-panel">
          <div class="content-wrapper">
		  
            <!-- Page Title Header Starts-->
<!-- Page Title Header Starts-->
            <div class="row page-title-header">
              <div class="col-12">
                <div class="page-header">
                  <h4 class="page-title">Dashboard</h4>
                  <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
                    <ul class="quick-links">
                      <li><a href="#">Current Figures</a></li>
                      <li><a href="#">Own analysis</a></li>
                      <li><a href="#">Other</a></li>
                    </ul>
                    <ul class="quick-links ml-auto">
                      <li><a href="#">Settings</a></li>
                      <li><a href="#">Analytics</a></li>
                      <li><a href="#">Watchlist</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="page-header-toolbar">
                  <div class="btn-group toolbar-item" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-secondary"><i class="mdi mdi-chevron-left"></i></button>
                    <button type="button" class="btn btn-secondary">[DASHBOARD]</button>
                    <button type="button" class="btn btn-secondary"><i class="mdi mdi-chevron-right"></i></button>
                  </div>
                  <div class="filter-wrapper">
                    <div class="dropdown toolbar-item">
                      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownsorting" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Day</button>
                      <div class="dropdown-menu" aria-labelledby="dropdownsorting">
                        <a class="dropdown-item" href="#">Last Day</a>
                        <a class="dropdown-item" href="#">Last Month</a>
                        <a class="dropdown-item" href="#">Last Year</a>
                      </div>
                    </div>
                    <a href="#" class="advanced-link toolbar-item">Advanced Options</a>
                  </div>
                  <div class="sort-wrapper">
                    <button type="button" data-toggle="modal" id="click_create_project" data-target="create_project" class="btn btn-primary toolbar-item">New Project</button>&nbsp;&nbsp;&nbsp;
					<button type="button" class="btn btn-success toolbar-item">Edit Project</button>
					
                    <div class="dropdown ml-lg-auto ml-3 toolbar-item">
                      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownexport" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Export</button>
                      <div class="dropdown-menu" aria-labelledby="dropdownexport">
                        <a class="dropdown-item" href="#">Export as PDF</a>
                        <a class="dropdown-item" href="#">Export as DOCX</a>
                        <a class="dropdown-item" href="#">Export as CDR</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			
            <!-- Page Title Header Ends-->
          
		  <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="create_project" tabindex="-1" role="dialog" aria-labelledby="create_project" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enter Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <div class="row">
	    <div class="col-lg-6 grid-margin">  
	  <form method="POST" name="post_project" id="post_project">
      <div class="modal-body">
	        
                       <div class="form-group row">
                            <label for="project_name" class="col-sm-3 col-form-label">Project Name</label>
                            <div class="col-sm-9">
                              <input type="email" class="form-control" id="project_name" placeholder="Enter Project Name">
                            </div>
                          </div>
					     <div class="form-group row">
                            <label for="project_name" class="col-sm-3 col-form-label">Priority</label>
                            <div class="col-sm-9">
                               <select class="form-control form-control-lg" id="priority">
							        <option name="" value="0">Choose</option>
                                    <option name="" value="high">High</option>
                                     <option name="" value="medium">Medium</option>
                                     <option name="" value="low">Low</option>
                              </select>
                            </div>
                          </div>
						   <div class="form-group row">
                            <label for="project_name" class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-9">
                               <select class="form-control form-control-lg" id="category">
							        <option name="" value="0">Choose</option>
                                   <?php
                                    $query    = "SELECT * FROM `category` order by `id`";
                                    $result = mysqli_query($con, $query) or die(mysql_error());
                                    $rows = mysqli_num_rows($result);
	                                        while($row = $result->fetch_assoc()) {
	                                    	 $cat = $row['cat_name'];	                                    	
											 echo "<option name='' value='".$cat."'>".$cat."</option>";
											}
										?>	
                              </select>
                            </div>
                          </div>	 
						  <div class="form-group row">
                            <label for="project_name" class="col-sm-3 col-form-label">Assign</label>
                            <div class="col-sm-9">
                               <select class="form-control form-control-lg" id="assign">
							        <option name="" value="0">Choose</option>
									<?php
                                    $query    = "SELECT * FROM `users_nbd` order by `id`";
                                    $result = mysqli_query($con, $query) or die(mysql_error());
                                    $rows = mysqli_num_rows($result);
	                                       while($row = $result->fetch_assoc()) {
	                                    	 $fname = $row['fname'];
	                                    	 $lname = $row['lname'];
	                                    	 $usernames = $row['username'];
											 $name = $fname."&nbsp;".$lname;
											 if($usernames == $_SESSION['username'])
											 {
											 $name = "Myself";
											 }
											 echo "<option name='' value='".$usernames."'>".$name."</option>";
											}
										?>	
                              </select>
                            </div>
                          </div>
						  
					 <div class="form-group row pmd-textfield pmd-textfield-floating-label datepicker">
                            <label for="project_name" class="col-sm-3 col-form-label">Start Date</label>
                            <div class="col-sm-9">
  
				                   <input type="date" class="form-control" value="<?php echo $date; ?>" id="start_date">
	
                        </div>
                      </div>
                   <div class="form-group row">
                            <label for="project_name" class="col-sm-3 col-form-label">End Date</label>
                            <div class="col-sm-9">
                                <input type="date" value="<?php echo $date; ?>" class="form-control" id="end_date">
                                    
                            </div>
                        </div>
                      					  
						  

					  </form>		  
      </div>
	  </div>
	  	    <div class="col-lg-6 grid-margin">  
			      <div class="modal-body">
			<div class="form-group row">
                            <label for="project_name" class="col-sm-3 col-form-label">Through</label>
                            <div class="col-sm-9">
                               <select class="form-control form-control-lg" id="through">
							        <option name="" value="0">Choose</option>
									<?php
                                    $query    = "SELECT * FROM `users_nbd` order by `id`";
                                    $result = mysqli_query($con, $query) or die(mysql_error());
                                    $rows = mysqli_num_rows($result);
	                                        while($row = $result->fetch_assoc()) {
	                                    	 $fname = $row['fname'];
	                                    	 $lname = $row['lname'];
	                                    	 $usernames = $row['username'];
											 $name = $fname."&nbsp;".$lname;
											 if($usernames == $_SESSION['username'])
											 {
											 $name = "Myself";
											 }
											 echo "<option name='' value='".$usernames."'>".$name."</option>";
											}
										?>	
                              </select>
                            </div>
                          </div>
						  
							<div class="form-group row">
                            <label for="project_name" class="col-sm-3 col-form-label">Source</label>
                            <div class="col-sm-9">
                               <select class="form-control form-control-lg" id="source">
							        <option name="" value="0">Choose</option>		  
						            <option name="" value="In house">In house</option>
									<option name="" value="Outsource">Outsource</option>
									</select>
			                </div>
             			     </div>
							 
							 
							 <div class="form-group row">
                            <label for="project_name" class="col-sm-3 col-form-label">Comments</label>
                            <div class="col-sm-9">
							   <textarea id="comments" class="md-textarea form-control" rows="5" name="comments"></textarea>
							</div>
							</div>
							 
                                							<div class="form-group row">
                            <label for="project_name" class="col-sm-3 col-form-label">Start</label>
                            <div class="col-sm-9">
                               <select class="form-control form-control-lg" id="start">
							        <option name="" value="0">Choose</option>		  
						            <option name="" value="0">Start Now</option>
									<option name="" value="2">Later</option>
									</select>
			                </div>
             			     </div>

							 
	  
	  </div>
	  </div>
	  </div>
	  
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="save_project" class="btn btn-primary">Save changes</button>
      </div>

    </div>
  </div>
</div>




			
           <?php include("modules/tiny_four.php"); ?>
		   
		   
		   


          </div>
          <!-- content-wrapper ends -->
        
		<!-- partial:partials/_footer.html -->
        <?php  include("partials/_footer.php"); ?>
          <!-- partial -->
        
		</div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
	
    <script src="assets/js/shared/off-canvas.js"></script>
    <script src="assets/js/shared/misc.js"></script>
    <script src="assets/js/shared/chart.js"></script>
	 <script src="assets/js/shared/add.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="assets/js/demo_1/dashboard.js"></script>
    <!-- End custom js for this page-->
    <script src="assets/js/shared/jquery.cookie.js" type="text/javascript"></script>
	

  <script>
     
    $.fn.blink = function (options) {
		var defaults = { delay: 500 };
		var options = $.extend(defaults, options);
		return $(this).each(function (idx, itm) {
			setInterval(function () {
				if ($(itm).css("visibility") === "visible") {
					$(itm).css('visibility', 'hidden');
				}
				else {
					$(itm).css('visibility', 'visible');
				}
			}, options.delay);
		});
	}

$(document).ready(function() {
			$('.blink').blink({delay: 800});
		});
		
		
  $(function () {
  /* ChartJS */
  'use strict';
  if ($("#pieChart").length) {
    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");

			//var new_data = data.replace(/^[ ]+/g, "");
			//alert(new_data);
		  var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: {
        datasets: [{
          data: [<?php print get_high_priority_count(); ?>, <?php print get_low_priority_count();?>, <?php print get_medium_priority_count(); ?>],
          backgroundColor: [
            'red',
            'green',
            'yellow'
          ],
          borderColor: [
            'red',
            'green',
            'yellow'
          ],
        }],
        labels: [
          'High',
          'Low',
          'Medium',
        ]
      },
      options: {
        responsive: true,
        animation: {
          animateScale: true,
          animateRotate: true
        },
		title: {
            display: true,
            fontsize: 14
        },
        legend: {
         display: false
        },
        legendCallback: function (chart) {
          var text = [];
          text.push('<div class="chartjs-legend"><ul>');
          for (var i = 0; i < chart.data.datasets[0].data.length; i++) {
            text.push('<li><span style="background-color:' + chart.data.datasets[0].backgroundColor[i] + '">');
            text.push('</span>');
            if (chart.data.labels[i]) {
              text.push(chart.data.labels[i]);
            }
            text.push('</li>');
          }
          text.push('</div></ul>');
          return text.join("");
        }
      }
    });
    document.getElementById('pie-chart-legend').innerHTML = pieChart.generateLegend();	  
		  		       	
	//[44, 6, 53]
  }
  
   if ($("#barChart").length) {
    var barChartCanvas = $("#barChart").get(0).getContext("2d");
    var barChart = new Chart(barChartCanvas, {
      type: 'bar',
      data: {
        labels: ["Parveen", "Shakshi", "Tansukh", "Vikrant", "Yogesh"],
   	   
        datasets: [{
          label: 'Total Projects',
          data: [25, 15, 10, 15, 20],
          backgroundColor: ChartColor[0],
          borderColor: ChartColor[0],
          borderWidth: 0
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: true,
        layout: {
          padding: {
            left: 0,
            right: 0,
            top: 0,
            bottom: 0
          }
        },
        scales: {
          xAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Names of Employees',
              fontSize: 12,
              lineHeight: 2
            },
            ticks: {
              fontColor: 'black',
              stepSize: 50,
              min: 0,
              max: 150,
              autoSkip: true,
              autoSkipPadding: 15,
              maxRotation: 0,
              maxTicksLimit: 10
            },
            gridLines: {
              display: false,
              drawBorder: false,
              color: 'transparent',
              zeroLineColor: '#eeeeee'
            }
          }],
          yAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Projects Undertaking',
              fontSize: 12,
              lineHeight: 2
            },
            ticks: {
              display: true,
              autoSkip: false,
              maxRotation: 0,
              fontColor: '#bfccda',
              stepSize: 50,
              min: 0,
              max: 150
            },
            gridLines: {
              drawBorder: false
            }
          }]
        },
        legend: {
          display: false
        },
        legendCallback: function (chart) {
          var text = [];
          text.push('<div class="chartjs-legend"><ul>');
          for (var i = 0; i < chart.data.datasets.length; i++) {
            console.log(chart.data.datasets[i]); // see what's inside the obj.
            text.push('<li>');
            text.push('<span style="background-color:' + chart.data.datasets[i].backgroundColor + '">' + '</span>');
            text.push(chart.data.datasets[i].label);
            text.push('</li>');
          }
          text.push('</ul></div>');
          return text.join("");
        },
        elements: {
          point: {
            radius: 0
          }
        }
      }
    });
    document.getElementById('bar-traffic-legend').innerHTML = barChart.generateLegend();
  }
  
  
  
  
  
  
  
  
  
  
  
  
  
  });
  
  </script>
  
  
  </body>
</html>