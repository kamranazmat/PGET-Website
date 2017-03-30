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
<!-- <script src="http://vsn4ik.github.io/bootstrap-checkbox/dist/js/bootstrap-checkbox.min.js" defer></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/1.0.3/ui-bootstrap.min.js"></script>
<!-- Date Picker -->
<script src="//oss.maxcdn.com/momentjs/2.8.2/moment.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
<!-- Toastr -->
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript" src="config/scriptfiles/bootstrap-filestyle.min.js"> </script>
<script type="text/javascript" src="config/scriptfiles/bootstrap-checkbox.min.js"> </script>

<script src="http://maps.googleapis.com/maps/api/js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>


<script src="https://angular-file-upload.appspot.com/js/ng-file-upload-shim.js"></script>
<script src="https://angular-file-upload.appspot.com/js/ng-file-upload.js"></script>
<!--
<script src="https://cdnjs.cloudflare.com/ajax/libs/require.js/2.2.0/require.js"></script>
-->

<!--
<script src="jquery-1.9.1.min.js"></script>
<script src="config/scriptfiles/bootstrap-datepicker.js"></script>
-->



<script>
	$(document).ready(function() {
	    $('#example').DataTable();
	} );

</script>
<!-- Angular Control -->
<script>

	(function () {
	    var app = angular.module('mApp', ['ngFileUpload']);

	    app.controller('TabController', function () {
	    });
	    app.controller('validateCtrl', function($scope) {
		});
		app.controller('homesCtrl', function($scope) {

        	//$scope.widget = {title: 'abc'};
		});
		app.directive('validFile', function () {
		    return {
		        require: 'ngModel',
		        link: function (scope, el, attrs, ngModel) {
		            ngModel.$render = function () {
		                ngModel.$setViewValue(el.val());
		            };

		            el.bind('change', function () {
		                scope.$apply(function () {
		                    ngModel.$render();
		                });
		            });
		        }
		    };
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
			/*var vm = this;
			vm.myfunction = function (form) {
				form.otp_email.$setValidity('unique', true);
			}; */
		});

		app.controller('AppCtrl', ['$scope', function($scope) {
		  $scope.password = null;
		  $scope.passwordConfirmation = null;
		}]);


		/*
		app.controller('MyCtrl', ['$scope', 'Upload', '$timeout', function ($scope, Upload, $timeout) {
		    $scope.uploadPic = function(file) {

		    file.upload.then(function (response) {
		      $timeout(function () {
			        file.result = response.data;
			      });
			    }, function (response) {
			      if (response.status > 0)
			        $scope.errorMsg = response.status + ': ' + response.data;
			    });
			}
		}]);*/
		app.directive('validFile', function () {
		    return {
		        require: 'ngModel',
		        link: function (scope, el, attrs, ngModel) {
		            ngModel.$render = function () {
		                ngModel.$setViewValue(el.val());
		            };

		            el.bind('change', function () {
		                scope.$apply(function () {
		                    ngModel.$render();
		                });
		            });
		        }
		    };
		});

	    app.directive('uniqueEmail', function() {
		  var toId;
		  return {
		    restrict: 'A',
		    require: 'ngModel',
		    link: function(scope, elem, attr, ctrl) {
		      	scope.$watch(attr.ngModel, function(value) {
		        if(value) {
		        	ctrl.$setValidity('uniqueEmail', data.isValid);
		        }
		      })
		    }
		  }
		});

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
		/*
		app.directive('myDirective', function () {
		    return {
		        require: 'ngModel',
		        link: function link(scope, elem, attrs, ctrl) {
		            var myValidation = function (value) {
		            	if (value == "my_secret") {
		            		ctrl.$setValidity('ch', true);
		            	}
		            	else {
		            		ngModel.$setValidity('ch', false);
		            	}
		            	return value;
		            }
		            ctrl.$parsers.push(myValidation);
		        }
		    };
		}); */

	})();
</script>
<script>
	var checkboxes = $("input[type='checkbox']"),
	    submitButt = $("input[id='pro']");

	checkboxes.click(function() {
	    submitButt.attr("disabled", !checkboxes.is(":checked"));
	});
</script>

<script>

	function showLoginForm(){
	    $('#loginModal .registerBox').fadeOut('fast',function(){
	        $('.loginBox').fadeIn('fast');

	        /*$('.register-footer').fadeOut('fast',function(){
	            $('.login-footer').fadeIn('fast');
	        });*/

	        //$('.modal-title').html('Login with');
	    });
	     $('.error').removeClass('alert alert-danger').html('');
	}

	function openLoginModal(){
		//alert()
	    showLoginForm();
	    setTimeout(function(){
	        //$('#loginModal').modal('show');
	        $('#loginModal').modal({backdrop: 'static', keyboard: false});
	    }, 100);

	}

	function shakeModal(){
		$('#loginModal .modal-dialog').effect('shake');
		//effect
	    //$('#loginModal .modal-dialog').addClass('shake');
	     $('.error').html("Invalid OTP !");
	     setTimeout( function(){
	        $('#loginModal .modal-dialog').removeClass('shake');
	    }, 1000 );
	}

	function loginAjax(){

	    shakeModal();
	    //return false;
	}
</script>
