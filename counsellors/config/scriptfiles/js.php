<?php
	// JavaScript Files:
 	
?>


<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<!-- jQuery UI -->
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<!-- Angular JS -->
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

<script src="http://cdn.bootcss.com/bootbox.js/4.4.0/bootbox.js"></script>

<script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
<script src="http://vsn4ik.github.io/bootstrap-checkbox/dist/js/bootstrap-checkbox.min.js" defer></script>

<script>
	$(document).ready(function() {
	    $('#example').DataTable();
	} );
	
</script>
<!-- Angular Control -->
<script>
	
	(function () {
	    var app = angular.module('mApp', []);
	
	    app.controller('TabController', function () {
	    });
	    app.controller('validateCtrl', function($scope) {
	});
	app.controller('homesCtrl', function($scope) { 
	});
	})();
	
</script>
<script>
	
	(function () {
	    var app = angular.module('myApp', []);
	
	    app.controller('TabController', function () {
	    });
	    app.controller('validateCtrl', function($scope) {
	});
	app.controller('homeCtrl', function($scope) { 
	});
	
	app.controller('AppCtrl', ['$scope', function($scope) {
		  $scope.password = null;
		  $scope.passwordConfirmation = null;
		}]);
		  
		app.directive('passwordConfirm', ['$parse', function ($parse) {
		 return {
		    restrict: 'A',
		    scope: {
		      matchTarget: '=',
		    },
		    require: 'ngModel',
		    link: function link(scope, elem, attrs, ctrl) {
		      var validator = function (value) {
		        ctrl.$setValidity('match', value === scope.matchTarget);
		        return value;
		      }
		 
		      ctrl.$parsers.unshift(validator);
		      ctrl.$formatters.push(validator);
		      
		      // This is to force validator when the original password gets changed
		      scope.$watch('matchTarget', function(newval, oldval) {
		        validator(ctrl.$viewValue);
		      });
		
		    }
		  };
		}]);		
		
	})();
</script>
<script>
	var checkboxes = $("input[type='checkbox']"),
	    submitButt = $("input[id='pro']");
	
	checkboxes.click(function() {
	    submitButt.attr("disabled", !checkboxes.is(":checked"));
	});
</script>
