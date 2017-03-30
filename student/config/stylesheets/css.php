<?php
	// Style Files:

?>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<!-- jQuery CSS -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<!-- FontAwesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- DataTable -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">
<!-- DatePicker -->

<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
<link href='http://fonts.googleapis.com/css?family=Roboto:400' rel='stylesheet' type='text/css'>



<!-- Other Styles -->
<style>
  input[type=number]::-webkit-inner-spin-button,
  input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }

	html {
	  position: relative;
	  min-height: 100%;
	}
	body {
	  /* Margin bottom by footer height */
	  margin-bottom: 60px;
	}
	.footer {
	  position: absolute;
	  bottom: 0;
	  width: 100%;
	  /* Set the fixed height of the footer here */
	  height: 60px;
	  background-color: #f5f5f5;
	}
	#btn_debug {
	}
	#console_debug {
	}
	#console_debug pre {
	}
	#logo img {
    	width: 99.5%;
    	height: 15%;
    	border: 1px solid black;
	}
	.col1 {
	    background-color: #ddf;
	    float: left;
	}
	.col2 {
	    background-color: #dfd;
	    float: none;
	}
	.col3 {
	    background-color: #fdd;
	    float: right;
	}
	.verticalLine {    border-left: thick solid #ff0000;}
</style>

<style>
	/*!
 * Datepicker for Bootstrap
 *
 * Copyright 2012 Stefan Petre
 * Licensed under the Apache License v2.0
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 */
.datepicker {
  top: 0;
  left: 0;
  padding: 4px;
  margin-top: 1px;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
  /*.dow {
    border-top: 1px solid #ddd !important;
  }*/

}
.datepicker:before {
  content: '';
  display: inline-block;
  border-left: 7px solid transparent;
  border-right: 7px solid transparent;
  border-bottom: 7px solid #ccc;
  border-bottom-color: rgba(0, 0, 0, 0.2);
  position: absolute;
  top: -7px;
  left: 6px;
}
.datepicker:after {
  content: '';
  display: inline-block;
  border-left: 6px solid transparent;
  border-right: 6px solid transparent;
  border-bottom: 6px solid #ffffff;
  position: absolute;
  top: -6px;
  left: 7px;
}
.datepicker > div {
  display: none;
}
.datepicker table {
  width: 100%;
  margin: 0;
}
.datepicker td,
.datepicker th {
  text-align: center;
  width: 20px;
  height: 20px;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
}
.datepicker td.day:hover {
  background: #eeeeee;
  cursor: pointer;
}
.datepicker td.day.disabled {
  color: #eeeeee;
}
.datepicker td.old,
.datepicker td.new {
  color: #999999;
}
.datepicker td.active,
.datepicker td.active:hover {
  color: #ffffff;
  background-color: #006dcc;
  background-image: -moz-linear-gradient(top, #0088cc, #0044cc);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#0088cc), to(#0044cc));
  background-image: -webkit-linear-gradient(top, #0088cc, #0044cc);
  background-image: -o-linear-gradient(top, #0088cc, #0044cc);
  background-image: linear-gradient(to bottom, #0088cc, #0044cc);
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff0088cc', endColorstr='#ff0044cc', GradientType=0);
  border-color: #0044cc #0044cc #002a80;
  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
  *background-color: #0044cc;
  /* Darken IE7 buttons by default so they stand out more given they won't have borders */

  filter: progid:DXImageTransform.Microsoft.gradient(enabled = false);
  color: #fff;
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
}
.datepicker td.active:hover,
.datepicker td.active:hover:hover,
.datepicker td.active:focus,
.datepicker td.active:hover:focus,
.datepicker td.active:active,
.datepicker td.active:hover:active,
.datepicker td.active.active,
.datepicker td.active:hover.active,
.datepicker td.active.disabled,
.datepicker td.active:hover.disabled,
.datepicker td.active[disabled],
.datepicker td.active:hover[disabled] {
  color: #ffffff;
  background-color: #0044cc;
  *background-color: #003bb3;
}
.datepicker td.active:active,
.datepicker td.active:hover:active,
.datepicker td.active.active,
.datepicker td.active:hover.active {
  background-color: #003399 \9;
}
.datepicker td span {
  display: block;
  width: 47px;
  height: 54px;
  line-height: 54px;
  float: left;
  margin: 2px;
  cursor: pointer;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
}
.datepicker td span:hover {
  background: #eeeeee;
}
.datepicker td span.active {
  color: #ffffff;
  background-color: #006dcc;
  background-image: -moz-linear-gradient(top, #0088cc, #0044cc);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#0088cc), to(#0044cc));
  background-image: -webkit-linear-gradient(top, #0088cc, #0044cc);
  background-image: -o-linear-gradient(top, #0088cc, #0044cc);
  background-image: linear-gradient(to bottom, #0088cc, #0044cc);
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff0088cc', endColorstr='#ff0044cc', GradientType=0);
  border-color: #0044cc #0044cc #002a80;
  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
  *background-color: #0044cc;
  /* Darken IE7 buttons by default so they stand out more given they won't have borders */

  filter: progid:DXImageTransform.Microsoft.gradient(enabled = false);
  color: #fff;
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
}
.datepicker td span.active:hover,
.datepicker td span.active:focus,
.datepicker td span.active:active,
.datepicker td span.active.active,
.datepicker td span.active.disabled,
.datepicker td span.active[disabled] {
  color: #ffffff;
  background-color: #0044cc;
  *background-color: #003bb3;
}
.datepicker td span.active:active,
.datepicker td span.active.active {
  background-color: #003399 \9;
}
.datepicker td span.old {
  color: #999999;
}
.datepicker th.switch {
  width: 145px;
}
.datepicker th.next,
.datepicker th.prev {
  font-size: 21px;
}
.datepicker thead tr:first-child th {
  cursor: pointer;
}
.datepicker thead tr:first-child th:hover {
  background: #eeeeee;
}
.input-append.date .add-on i,
.input-prepend.date .add-on i {
  display: block;
  cursor: pointer;
  width: 16px;
  height: 16px;
}
</style>

<style>
    /*
   *
   * login-register modal
   * Autor: Creative Tim
   * Web-autor: creative.tim
   * Web script: http://creative-tim.com
   *
   */

  /*  Shake animation  */

  @charset "UTF-8";

  .animated {
    -webkit-animation-duration: 1s;
       -moz-animation-duration: 1s;
         -o-animation-duration: 1s;
            animation-duration: 1s;
    -webkit-animation-fill-mode: both;
       -moz-animation-fill-mode: both;
         -o-animation-fill-mode: both;
            animation-fill-mode: both;
  }

  .animated.hinges {
    -webkit-animation-duration: 2s;
       -moz-animation-duration: 2s;
         -o-animation-duration: 2s;
            animation-duration: 2s;
  }

  .animated.slow {
    -webkit-animation-duration: 3s;
       -moz-animation-duration: 3s;
         -o-animation-duration: 3s;
            animation-duration: 3s;
  }

  .animated.snail {
    -webkit-animation-duration: 4s;
       -moz-animation-duration: 4s;
         -o-animation-duration: 4s;
            animation-duration: 4s;
  }

  @-webkit-keyframes shake {
    0%, 100% {-webkit-transform: translateX(0);}
    10%, 30%, 50%, 70%, 90% {-webkit-transform: translateX(-10px);}
    20%, 40%, 60%, 80% {-webkit-transform: translateX(10px);}
  }

  @-moz-keyframes shake {
    0%, 100% {-moz-transform: translateX(0);}
    10%, 30%, 50%, 70%, 90% {-moz-transform: translateX(-10px);}
    20%, 40%, 60%, 80% {-moz-transform: translateX(10px);}
  }

  @-o-keyframes shake {
    0%, 100% {-o-transform: translateX(0);}
    10%, 30%, 50%, 70%, 90% {-o-transform: translateX(-10px);}
    20%, 40%, 60%, 80% {-o-transform: translateX(10px);}
  }

  @keyframes shake {
    0%, 100% {transform: translateX(0);}
    10%, 30%, 50%, 70%, 90% {transform: translateX(-10px);}
    20%, 40%, 60%, 80% {transform: translateX(10px);}
  }

  .shake {
    -webkit-animation-name: shake;
    -moz-animation-name: shake;
    -o-animation-name: shake;
    animation-name: shake;
  }

  .login .modal-dialog{
      width: 350px;
  }
  .login .modal-footer{
      border-top: 0;
      margin-top: 0px;
      padding: 10px 20px 20px;
  }
  .login .modal-header {
      border: 0 none;
      padding: 15px 15px 15px;
  /*     padding: 11px 15px; */
  }
  .login .modal-body{
  /*     background-color: #eeeeee; */
  }
  .login .division {
      float: none;
      margin: 0 auto 18px;
      overflow: hidden;
      position: relative;
      text-align: center;
      width: 100%;
  }
  .login .division .line {
      border-top: 1px solid #DFDFDF;
      position: absolute;
      top: 10px;
      width: 34%;
  }
  .login .division .line.l {
      left: 0;
  }
  .login .division .line.r {
      right: 0;
  }
  .login .division span {
      color: #424242;
      font-size: 17px;
  }
  .login .box .social {
      float: none;
      margin: 0 auto 30px;
      text-align: center;
  }

  .login .social .circle{
      background-color: #EEEEEE;
      color: #FFFFFF;
      border-radius: 100px;
      display: inline-block;
      margin: 0 17px;
      padding: 15px;
  }
  .login .social .circle .fa{
      font-size: 16px;
  }
  .login .social .facebook{
      background-color: #455CA8;
      color: #FFFFFF;
  }
  .login .social .google{
      background-color: #F74933;
  }
  .login .social .github{
      background-color: #403A3A;
  }
  .login .facebook:hover{
      background-color: #6E83CD;
  }
  .login .google:hover{
      background-color: #FF7566;
  }
  .login .github:hover{
      background-color: #4D4D4d;;
  }
  .login .forgot {
      color: #797979;
      margin-left: 0;
      overflow: hidden;
      text-align: center;
      width: 100%;
  }
  .login .btn-login, .registerBox .btn-register{
      background-color: #00BBFF;
      border-color: #00BBFF;
      border-width: 0;
      color: #FFFFFF;
      display: block;
      margin: 0 auto;
      padding: 15px 50px;
      text-transform: uppercase;
      width: 100%;
  }
  .login .btn-login:hover, .registerBox .btn-register:hover{
      background-color: #00A4E4;
      color: #FFFFFF;
  }
  .login .form-control{
      border-radius: 3px;
      background-color: rgba(0, 0, 0, 0.09);
      box-shadow: 0 1px 0px 0px rgba(0, 0, 0, 0.09) inset;
      color: #FFFFFF;
  }
  .login .form-control:hover{
      background-color: rgba(0,0,0,.16);
  }
  .login .form-control:focus{
      box-shadow: 0 1px 0 0 rgba(0, 0, 0, 0.04) inset;
      background-color: rgba(0,0,0,0.23);
      color: #FFFFFF;
  }
  .login .box .form input[type="text"], .login .box .form input[type="password"] {
      border-radius: 3px;
      border: none;
      color: #333333;
      font-size: 16px;
      height: 46px;
      margin-bottom: 5px;
      padding: 13px 12px;
      width: 100%;
  }


  @media (max-width:400px){
      .login .modal-dialog{
          width: 100%;
      }
  }

  .big-login, .big-register{
      background-color: #00bbff;
      color: #FFFFFF;
      border-radius: 7px;
      border-width: 2px;
      font-size: 14px;
      font-style: normal;
      font-weight: 200;
      padding: 16px 60px;
      text-transform: uppercase;
      transition: all 0.3s ease 0s;
  }
  .big-login:hover{
      background-color: #00A4E4;
      color: #FFFFFF;
  }
  .big-register{
      background-color: rgba(0,0,0,.0);
      color: #00bbff;
      border-color: #00bbff;
  }
  .big-register:hover{
      border-color: #00A4E4;
      color:  #00A4E4;
  }
</style>
