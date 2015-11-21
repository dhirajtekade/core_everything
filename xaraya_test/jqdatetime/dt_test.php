<html>
<head>
	<link rel="stylesheet" media="all" type="text/css" href="http://code.jquery.com/ui/1.8.21/themes/ui-lightness/jquery-ui.css" />
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"><!--Empty tag workaround for script tag--></script><script type="text/javascript" src="http://192.168.0.65:90/xd-dt/eventhub/stable/html/themes/eventhub/scripts/jquery.session.js"><!--Empty tag workaround for script tag--></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false">
    <script type="text/javascript" src="http://code.jquery.com/ui/1.8.21/jquery-ui.min.js"></script>
	<script type="text/javascript" src="jquery-ui-sliderAccess.js"></script>
	<script type="text/javascript" src="jquery-ui-timepicker-addon.js"></script>   
	<link rel="stylesheet" media="all" type="text/css" href="jquery-ui-timepicker-addon.css">
	
    <style type="text/css">
    	#ui-datepicker-div, .ui-datepicker{ font-size: 100%; }
    	
        /* css for timepicker */
        .ui-timepicker-div .ui-widget-header { margin-bottom: 8px; }
        .ui-timepicker-div dl { text-align: left; }
        .ui-timepicker-div dl dt { height: 25px; margin-bottom: -25px; }
        .ui-timepicker-div dl dd { margin: 0 10px 10px 65px; }
        .ui-timepicker-div td { font-size: 90%; }
        .ui-tpicker-grid-label { background: none; border: none; margin: 0; padding: 0; }
    </style> 

</head>
<body>
<form action="dt.php">
	<input type="text" name="datetimepicker" id="datetimepicker" value="value" />

        <script type="text/javascript">
           $('#datetimepicker').datetimepicker({
                showSecond: false,
                timeFormat: 'hh:mm',
                stepHour: 1,
                stepMinute: 5,
                stepSecond: 10
            });

        </script>

</form>

</body>

</html>

