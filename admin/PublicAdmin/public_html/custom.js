  $(document).ready(function(){

	Chart.defaults.global = {
    animation: true,

    animationSteps: 500,
    animationEasing: "easeOutQuart",

    showScale: true,

    scaleOverride: false,

    scaleSteps: null,
    scaleStepWidth: null,
    scaleStartValue: null,

    scaleLineColor: "rgba(0,0,0,.1)",

    // Number - Pixel width of the scale line
    scaleLineWidth: 2,

    // Boolean - Whether to show labels on the scale
    scaleShowLabels: true,

    // Interpolated JS string - can access value
    scaleLabel: "<%=value%>",

    // Boolean - Whether the scale should stick to integers, not floats even if drawing space is there
    scaleIntegersOnly: true,

    // Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
    scaleBeginAtZero: false,

    // String - Scale label font declaration for the scale label
    scaleFontFamily: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",

    // Number - Scale label font size in pixels
    scaleFontSize: 12,

    // String - Scale label font weight style
    scaleFontStyle: "normal",

    // String - Scale label font colour
    scaleFontColor: "#666",

    // Boolean - whether or not the chart should be responsive and resize when the browser does.
    responsive: false,

    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio: false,

    // Boolean - Determines whether to draw tooltips on the canvas or not
    showTooltips: true,

    // Function - Determines whether to execute the customTooltips function instead of drawing the built in tooltips (See [Advanced - External Tooltips](#advanced-usage-custom-tooltips))
    customTooltips: false,

    // Array - Array of string names to attach tooltip events
    tooltipEvents: ["mousemove", "touchstart", "touchmove"],

    // String - Tooltip background colour
    tooltipFillColor: "rgba(0,0,0,0.8)",

    // String - Tooltip label font declaration for the scale label
    tooltipFontFamily: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",

    // Number - Tooltip label font size in pixels
    tooltipFontSize: 14,

    // String - Tooltip font weight style
    tooltipFontStyle: "normal",

    // String - Tooltip label font colour
    tooltipFontColor: "#fff",

    // String - Tooltip title font declaration for the scale label
    tooltipTitleFontFamily: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",

    // Number - Tooltip title font size in pixels
    tooltipTitleFontSize: 12,

    // String - Tooltip title font weight style
    tooltipTitleFontStyle: "bold",

    // String - Tooltip title font colour
    tooltipTitleFontColor: "#fff",

    // Number - pixel width of padding around tooltip text
    tooltipYPadding: 6,

    // Number - pixel width of padding around tooltip text
    tooltipXPadding: 6,

    // Number - Size of the caret on the tooltip
    tooltipCaretSize: 8,

    // Number - Pixel radius of the tooltip border
    tooltipCornerRadius: 6,

    // Number - Pixel offset from point x to tooltip edge
    tooltipXOffset: 10,

    // String - Template string for single tooltips
    tooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",

    // String - Template string for multiple tooltips
    multiTooltipTemplate: "<%= value %>",

    // Function - Will fire on animation progression.
    onAnimationProgress: function(){},

    // Function - Will fire on animation completion.
    onAnimationComplete: function(){}
}
	var option={responsive:true};
	var data = {
    labels: ["January", "February", "March", "April", "May", "June", "July"],
    datasets: [
        {
            label: "My First dataset",
            fillColor: "rgba(220,220,220,0.2)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: [65, 59, 80, 81, 56, 55, 40]
        },
        {
            label: "My Second dataset",
            fillColor: "rgba(151,187,205,0.2)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: [28, 48, 40, 19, 86, 27, 90]
        },
		{
            label: "My Thirt dataset",
            fillColor: "rgba(152,181,225,0.5)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: [18, 78, 40, 19, 11, 87, 90]
        }
    ]
};
	var ctx = document.getElementById("myChart").getContext('2d');
	//var myLineChart = new Chart(ctx).Line(data, option); //'Line' defines type of the chart.
		var myBarChart = new Chart(ctx).Bar(data, option);
				  
	})

/*
$('.delete-button').on('click',function(event){

    var x=alertify.confirm('Are You Sure').setting({
        'labels':{
            ok:'Delete',
            cancel:'Cancel'
        },

        'onok':function(){
            return true;
        },
        'oncancel':function(){
            alertify.confirm().close();
            return false;
        }
    });
    return false;

})
*/

  //$('.alertify').on('click',function(event){
	  	
	//var x=alertify.confirm('This is a confirm message!');
	  
	  /*
	  var x=alertify.alert('this is an alert');
	  alert.set('label','Got it');
	  alert.show();
	  **/
	  /*
	  alertify.confirm('a callback will be invoked on ok.').set('onok',function(closeEvent){
		  //alertify.success('OK');
		  window.location="_main_layout.php?page=delete";
		  });
	  */
	  
	  /*
	  alertify.confirm('Are you Sure ? ').setting({
		  	'labels':{
					ok:'Delete',
					cancel:'Cancel'
				},
			
			//'reverseButtons':true,
			'onok':function(){
					alertify.success('You agree');
				},
			'oncancel':function(){
					alertify.error('You did not agree');
				}	
				
		  }).show();
	  */
	  
	  //});