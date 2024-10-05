$(function () {
  var highchartData = {
    ussd : null,
    voice : {inbound: null, outbound: null},
    currency : null
  }
  
  var bulkChart = {
	chart: {
        type: 'pie',
       // marginRight: 100,
        layout: "left",
        events: {
            click: function() {
                window.location = "/analytics/bulksms";
            },
            load: function () {
                var chart = this;
                if (!chart.hasData()) {
                    var r = Math.min(chart.plotWidth / 2, chart.plotHeight / 2),
                        y = chart.plotHeight / 2 + chart.plotTop,
                        x = chart.plotWidth / 2 + chart.plotLeft;
                    chart.pieOutline = chart.renderer.circle(x, y, r).attr({
                        fill: '#ddd',
                        stroke: 'black',
                        'stroke-width': 1
                    }).add();
                }
            },
            redraw: function () {
                var chart = this;
                if (chart.pieOutline && chart.pieOutline.element) {
                    if (chart.hasData()) {
                        chart.pieOutline.destroy();
                    } else {
                        var r = Math.min(chart.plotWidth / 2, chart.plotHeight / 2),
                            y = chart.plotHeight / 2 + chart.plotTop,
                            x = chart.plotWidth / 2 + chart.plotLeft;
                        chart.pieOutline.attr({
                            cx: x,
                            cy: y,
                            r: r
                        });
                    }
                } else if(!chart.hasData()) {
                    var r = Math.min(chart.plotWidth / 2, chart.plotHeight / 2),
                        y = chart.plotHeight / 2 + chart.plotTop,
                        x = chart.plotWidth / 2 + chart.plotLeft;
                    chart.pieOutline = chart.renderer.circle(x, y, r).attr({
                        fill: '#ddd',
                        stroke: 'black',
                            'stroke-width': 1
                    }).add();
                }
            }
        }
    },
    credits:{enabled:false},
    title: {
        useHTML: true,
        text: 'Bulk SMS count',
        x: -50,
        y:5
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.y}  ({point.percentage:.1f}%)</b>'
     },
     plotOptions: {
         pie: {
             dataLabels: {
                 enabled: false,
                 format: '<b>{point.name}</b>-- {point.y:,.0f} ({point.percentage:.1f}%)',
                 color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
             },
             showInLegend: true
         }
     },
     legend: {
         enabled:true,
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'bottom',
            labelFormatter: function() {
                return "<span style='padding-top:10px'>" + this.name + ": " + formatNumber(this.y.toString()) + "</span>";
            }
     },
     exporting: {enabled:false},
     series: [{
         name: 'Number'
     }]
  };
  
  var voiceChart = {
	chart: {
		type: 'column'
	}, 
	credits: {enabled: false},       
	exporting: {enabled: false},       
	title: {
        useHTML: true,
		text: 'Call Cost in <span id="voiceCurrency"></span>'
	},

	xAxis: {
		categories: [],
		labels:{
				rotation: -45,
				style:{
					fontSize: '10px',
					fontFamily: 'Verdana, Sans-serif'}
				}
	},

	yAxis: {
		allowDecimals: false,
		min: 0,
		title:{text:'Amount'}
	},

	tooltip: {
		formatter: function () {
			return '<b>' + this.x + '</b><br/>' +
				this.series.name + ': ' + this.y;
		}
	},

	plotOptions: {
		column: {
			pointPadding: 0.2,
			borderWidth: 0,
			stacking: 'normal'
		}
	}
  };
  
  var premiumChart = {
	chart: {
		type: 'column'
	}, 
	credits: {enabled: false},       
	exporting: {enabled: false},       
	title: {
        useHTML: true,
		text: 'Premium SMS count <span id="premiumTitleName"></span>'
	},

	xAxis: {
		categories: [],
		labels:{
				rotation: -45,
				style:{
					fontSize: '10px',
					fontFamily: 'Verdana, Sans-serif'}
				}
	},

	yAxis: {
		allowDecimals: false,
		min: 0,
		title:{text:'Number'}
	},

	tooltip: {
		formatter: function () {
			return '<b>' + this.x + '</b><br/>' +
				this.series.name + ': ' + this.y;
		}
	},

	plotOptions: {
		column: {
			pointPadding: 0.2,
			borderWidth: 0,
			stacking: 'normal'
		}
	}
  };
  
  var airtimeChart = {
    chart: {
        type: 'pie',
       // marginRight: 100,
        layout: "left",
        events: {
            click: function() {
                window.location = "/analytics/ussd";
            },
            load: function () {
                var chart = this;
                if (!chart.hasData()) {
                    var r = Math.min(chart.plotWidth / 2, chart.plotHeight / 2),
                        y = chart.plotHeight / 2 + chart.plotTop,
                        x = chart.plotWidth / 2 + chart.plotLeft;
                    chart.pieOutline = chart.renderer.circle(x, y, r).attr({
                        fill: '#ddd',
                        stroke: 'black',
                        'stroke-width': 1
                    }).add();
                }
            },
            redraw: function () {
                var chart = this;
                if (chart.pieOutline && chart.pieOutline.element) {
                    if (chart.hasData()) {
                        chart.pieOutline.destroy();
                    } else {
                        var r = Math.min(chart.plotWidth / 2, chart.plotHeight / 2),
                            y = chart.plotHeight / 2 + chart.plotTop,
                            x = chart.plotWidth / 2 + chart.plotLeft;
                        chart.pieOutline.attr({
                            cx: x,
                            cy: y,
                            r: r
                        });
                    }
                } else if(!chart.hasData()) {
                    var r = Math.min(chart.plotWidth / 2, chart.plotHeight / 2),
                        y = chart.plotHeight / 2 + chart.plotTop,
                        x = chart.plotWidth / 2 + chart.plotLeft;
                    chart.pieOutline = chart.renderer.circle(x, y, r).attr({
                        fill: '#ddd',
                        stroke: 'black',
                            'stroke-width': 1
                    }).add();
                }
            }
        }
    },
    credits:{enabled:false},
    title: {
        useHTML: true,
        text: 'Airtime Cost in <span id="airtimeCurrency"></span>',
        x: -50,
        y:5
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.y}  ({point.percentage:.1f}%)</b>'
     },
     plotOptions: {
         pie: {
             dataLabels: {
                 enabled: false,
                 format: '<b>{point.name}</b>-- {point.y:,.0f} ({point.percentage:.1f}%)',
                 color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
             },
             showInLegend: true
         }
     },
     legend: {
         enabled:true,
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'bottom',
            labelFormatter: function() {
                return "<span style='padding-top:10px'>" + this.name + ": " + formatNumber(this.y.toString()) + "</span>";
            }
     },
     exporting: {enabled:false},
     series: [{
         name: 'Amount'
     }]
  };
  
  
  
  var ussdChart = {
    chart: {
        type: 'pie',
       // marginRight: 100,
        layout: "left",
        events: {
            click: function() {
                window.location = "/analytics/ussd";
            },
            load: function () {
                var chart = this;
                if (!chart.hasData()) {
                    var r = Math.min(chart.plotWidth / 2, chart.plotHeight / 2),
                        y = chart.plotHeight / 2 + chart.plotTop,
                        x = chart.plotWidth / 2 + chart.plotLeft;
                    chart.pieOutline = chart.renderer.circle(x, y, r).attr({
                        fill: '#ddd',
                        stroke: 'black',
                        'stroke-width': 1
                    }).add();
                }
            },
            redraw: function () {
                var chart = this;
                if (chart.pieOutline && chart.pieOutline.element) {
                    if (chart.hasData()) {
                        chart.pieOutline.destroy();
                    } else {
                        var r = Math.min(chart.plotWidth / 2, chart.plotHeight / 2),
                            y = chart.plotHeight / 2 + chart.plotTop,
                            x = chart.plotWidth / 2 + chart.plotLeft;
                        chart.pieOutline.attr({
                            cx: x,
                            cy: y,
                            r: r
                        });
                    }
                } else if(!chart.hasData()) {
                    var r = Math.min(chart.plotWidth / 2, chart.plotHeight / 2),
                        y = chart.plotHeight / 2 + chart.plotTop,
                        x = chart.plotWidth / 2 + chart.plotLeft;
                    chart.pieOutline = chart.renderer.circle(x, y, r).attr({
                        fill: '#ddd',
                        stroke: 'black',
                            'stroke-width': 1
                    }).add();
                }
            }
        }
    },
    credits:{enabled:false},
    title: {
        useHTML: true,
        text: 'Hops count <span id="ussdTitleName"></span>',
        x: -50,
        y:5
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.y}  ({point.percentage:.1f}%)</b>'
     },
     plotOptions: {
         pie: {
             dataLabels: {
                 enabled: false,
                 format: '<b>{point.name}</b>-- {point.y:,.0f} ({point.percentage:.1f}%)',
                 color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
             },
             showInLegend: true
         }
     },
     legend: {
         enabled:true,
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'bottom',
            labelFormatter: function() {
                return "<span style='padding-top:10px'>" + this.name + ": " + formatNumber(this.y.toString()) + "</span>";
            }
     },
     exporting: {enabled:false},
     series: [{
         name: 'Number'
     }]
  };
  
  $.getJSON("/analytics/loadbulkdashboardpiechart", function(loadedData) {
    $(".bulkAnalyticsLoading").css("display", "none");
    var loadChart = false;
    if (loadedData.success) {
      bulkChart.series[0].data = loadedData.data;
    }
    var width = $("#bulktab").width();
    $("#bulkCountContainer").width(width > 450? "450px" : width + "px");
    $("#bulkCountContainer").highcharts(bulkChart);
    $("#bulkCurrency").html(loadedData.currency);
  });
  
  $.getJSON("/analytics/loadpremiumdashboardchart", function(loadedData) {
    $(".premiumAnalyticsLoading").css("display", "none");
    var loadChart = false;
    if (loadedData.success) {
      premiumChart.series = loadedData.data;
      premiumChart.xAxis.categories = loadedData.dateRange;
      premiumChart.chart.type = "column";
    }
    else if(loadedData.validDate) {
      premiumChart.series = [loadedData.zeroFill];
      premiumChart.xAxis.categories = loadedData.dateRange;
      premiumChart.chart.type = "line";
    }
    var width = $("#voicetab").width();
    $("#premiumCountContainer").width(width > 450? "450px" : width + "px");
    $("#premiumCountContainer").highcharts(premiumChart);
    $("#premiumTitleName").html(loadedData.success? "for " + loadedData.subscriptionName : "");
  });
  
  $.getJSON("/analytics/loadvoicedashboardchart", function(loadedData) {
    $(".voiceAnalyticsLoading").css("display", "none");
    if (loadedData.success) {
      voiceChart.series = [loadedData.data];
      voiceChart.xAxis.categories = loadedData.dateRange;
      voiceChart.chart.type = loadedData.type;
    }
    else if(loadedData.validDate) {
      voiceChart.series = [loadedData.zeroFill];
      voiceChart.xAxis.categories = loadedData.dateRange;
      voiceChart.chart.type = "line";
    }
    var width = $("#voicetab").width();;
    $("#voiceCostContainer").width(width > 450? "450px" : width + "px");
    $("#voiceCostContainer").highcharts(voiceChart);
    $("#voiceCurrency").html(loadedData.currency);
  });
  
  $.getJSON("/analytics/loadussddashboardpiechart", function(loadedData) {
    $(".ussdAnalyticsLoading").css("display", "none");
    var loadChart = false;
    if (loadedData.success) {
      ussdChart.series[0].data = loadedData.data;
    }
    
    var width = $("#ussdtab").width();
    $("#ussdCountContainer").width(width > 450? "450px" : width + "px");
    $("#ussdCountContainer").highcharts(ussdChart);
    $("#ussdTitleName").html(loadedData.success? " ["+loadedData.ussdCode+"]" : "");
  });
  
  $.getJSON("/analytics/loadairtimedashboardpiechart", function(loadedData) {
    $(".airtimeAnalyticsLoading").css("display", "none");
    if (loadedData.success) {
      airtimeChart.series[0].data = loadedData.data;
    }
    var width = $("#airtimetab").width();
    $("#airtimeCostContainer").width(width > 450? "450px" : width + "px");
    $("#airtimeCostContainer").highcharts(airtimeChart);
    $("#airtimeCurrency").html(loadedData.currency);
  });
    
    
    function formatNumber(number_) {
      var numberStr = "";
      while ((no = number_.substr(-3)).length > 0) {
        number_ = number_.substr(0, number_.length - 3);
        numberStr = no + "," + numberStr;
      }
      return numberStr.substr(0, numberStr.length - 1);
    }
});