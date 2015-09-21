<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>HealthCare Trove</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<script src="<?php echo URL::to('/'); ?>lib/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		
		<link rel="stylesheet" type="text/css" href="<?php echo URL::to('/'); ?>lib/jquery.dataTables.css">
		<style type="text/css" class="init">
		</style>
		<script type="text/javascript" language="javascript" src="<?php echo URL::to('/'); ?>lib/jquery.dataTables.js"></script>

	<script type="text/javascript" language="javascript" class="init">
	$(document).ready(function() {
	});

	</script>
	<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>

	<script>
	var app = angular.module('apidatatable', []);
	app.controller('myCtrl', function($scope,$http,$timeout) {
		$scope.firstName = "John";
		$scope.lastName = "Doe";
		$scope.init = function () {	
			$http.get("http://localhost/clinicapp/public/health")
			.success(function(response,jQuery) {//$scope.names = response.records;
				 $scope.organizations = response.organizations;
				 $timeout(function() {angular.element('#example').dataTable(); });
			 });
		};
	});
	</script>
	</head>
<body ng-app="apidatatable" ng-controller="myCtrl"  ng-init="init()">	
<div class="container-fluid">
<a href='<?php echo URL::to('/')."health"  ?>'>Hospital Data</a>&nbsp;&nbsp;&nbsp;&nbsp;

<a href='<?php echo URL::to('/')."doctors"  ?>'>Doctors Data</a>

<h1 class="text-center text-info bg-primary">Hospital Data</h1>

<br>
<div class="row">
<div class="col-lg-6">
<form action="<?php echo URL::to('/'); ?>health/searchhospital" method="post">
<input type="search" name="keyword" id="keyword" placeholder="Name">

<input type="search" name="city1" id="city1" placeholder="City">
<input type="submit" name="submit" id="search" value="SEARCH"  ng-click="search">
</form>
</div>
</div>

<br>
<table class="table table-bordered table-stripped table-condensed table-responsive dt-example display" id="example">
<thead>
	<tr>
      <th>Id</th>
   <th>Address</th>
    <th>City</th>
	 <th>Phone</th>
	 <th>Email</th>
	 <th>Country</th>
	 <th>Pincode</th>
	 <th style="width:25%">Name</th>
	 <th>State</th>
	  <th>Type</th>
<th>Action</th>
</tr>
	</thead>
	
	<tbody>
   
        <tr  ng-repeat="x in organizations">
		<td>{{x.id}} address city contactNumber email country pincode  name state  type</td>
		<td>{{x.address}}</td> 
		<td>{{x.city}}</td> 
		<td>{{x.contactNumber}}</td> 
		<td>{{x.email}}</td>
        <td>{{x.country}}</td> 
        <td>{{x.pincode}}</td>	
         <td>{{x.name}}</td>
         <td>{{x.state}}</td>
         <td>{{x.type}}</td>	 
		 <!--<td><a href="edit.php?id1='.$data1->id.'">EDIT</a></td>';	?>--> 
		<td><a  href="">Edit</a></td>

		
		</tr>
       

</tbody>
</table>

</div>

<style>
table.dataTable thead .sorting {
  background-image: url('<?php echo URL::to('/'); ?>lib/sort_both.png');
}
table.dataTable thead .sorting_asc {
  background-image: url("<?php echo URL::to('/'); ?>lib/sort_asc.png");
}
table.dataTable thead .sorting_desc {
  background-image: url("<?php echo URL::to('/'); ?>lib/sort_desc.png");
}
table.dataTable thead .sorting_asc_disabled {
  background-image: url("<?php echo URL::to('/'); ?>lib/sort_asc_disabled.png");
}
table.dataTable thead .sorting_desc_disabled {
  background-image: url("<?php echo URL::to('/'); ?>lib/sort_desc_disabled.png");
}
</style>
</body>
</html>