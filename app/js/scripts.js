var App = function () {

     var isMainPage = false;
     var isMapPage = false;
	 var isChartPage = false;
	 var isTemplateBuilderPage = false;
     var isIE8 = false;
	 
	 var handleTemplateBuilder = function () {
		 var uid = $('#user-id').val();
		 sessionStorage.setItem('uid', uid);
	 }
	 
	 var handleCharts = function () {
	 
	 	var cid =	sessionStorage.getItem('cid');

		var jData = {};
		jData.cid = cid;
		
		$.ajax({
			  type: 'POST',
			  url: 'charts.php',
			  async: true,
			  data: jData,
			  error: function(error) {
				console.log('error', error.error())
			  },
			  dataType: 'json',
			  success: function(data) {
							
							var myEmails = [];
							var myLinks = [];
														
							// Create array for emails clicked per day
							for (var i = 0; i < data.timeframe.length; i++) {
								
								var dateStr = data.timeframe[i]['opened'];
								var a = dateStr.split(" ");
								var d = a[0].split("-");
								var t = a[1].split(":");
								
								var d = new Date(d[0],(d[1]-1),d[2],t[0]);
								
								var year = d.getFullYear();
								var month = d.getMonth();
								var day = d.getDate();
								var hour = d.getHours();
								
								myEmails.push([Date.UTC(year, month, day, hour), parseInt(data.timeframe[i]['count'])]);

							}
							
							// Create array for links clicked per day
							for (var i = 0; i < data.links.length; i++) {
								
								var dateStr = data.links[i]['clicked'];
								var a = dateStr.split(" ");
								var d = a[0].split("-");
								var t = a[1].split(":");
								
								var d = new Date(d[0],(d[1]-1),d[2],t[0]);
								
								var year = d.getFullYear();
								var month = d.getMonth();
								var day = d.getDate();
								var hour = d.getHours();
								
								myLinks.push([Date.UTC(year, month, day, hour), parseInt(data.links[i]['count'])]);

							}			
			
							$('#timeframe-container').highcharts({
								credits: {
									enabled: false
								},
								chart: {
									type: 'column',
									zoomType: 'xy'
								},
								title: {
									text: 'Timeframe'
								},
								subtitle: {
									text: 'Daily number of email opens and link clicks after campaign has been sent'
								},
								xAxis: {
									type: "datetime"
								},
								yAxis: {
									min: 0,
									title: {
										text: null
									}
								},
								plotOptions: {
									column: {
										pointPadding: 0.2,
										borderWidth: 0
									}
								},
								series: [{
									name: 'Email opens',
									data: myEmails
							
								},{
									name: 'Link Clicks',
									data: myLinks
							
								}]
							});
							
							
					console.log('data ',data)
					
					var myBrowsers = [];
					var chrome = 0;
					var firefox = 0;
					var ie = 0;
					var safari = 0;
					var opera = 0;
					var netscape = 0;
					var maxthon = 0;
					var konqueror = 0;
					var handheld = 0;

					for (var i = 0; i < data.browsers.length; i++) {
						
							switch(data.browsers[i]['browser']){
									case 'Internet Explorer':
											ie++;
									break;
									case 'Chrome':
											chrome++;
									break;
									case 'Firefox':
											firefox++;
									break;
									case 'Safari':
											safari++;
									break;
									case 'Opera':
											opera++;
									break;
									case 'Netscape':
											netscape++;
									break;	
									case 'Maxthon':
											maxthon++;
									break;	
									case 'Konqueror':
											konqueror++;
									break;
									case 'Handheld Browser':
											handheld++;
									break;						
							}
						
						
					}
					
							if(ie > 0)
									myBrowsers.push({"name":"Internet Explorer","y":ie});
							if(chrome > 0)
									myBrowsers.push({"name":"Chrome","y":chrome});
							if(firefox > 0)
									myBrowsers.push({"name":"Firefox","y":firefox});
							if(safari > 0)
									myBrowsers.push({"name":"Safari","y":safari});
							if(opera > 0)
									myBrowsers.push({"name":"Opera","y":opera});
							if(netscape > 0)
									myBrowsers.push({"name":"Netscape","y":netscape});
							if(maxthon > 0)
									myBrowsers.push({"name":"Maxthon","y":maxthon});
							if(konqueror > 0)
									myBrowsers.push({"name":"Konqueror","y":konqueror});
							if(handheld > 0)
									myBrowsers.push({"name":"Handheld Browser","y":handheld});
									



var name = Array();
var data1 = Array();
var dataArrayFinal = Array();
for( i = 0; i < myBrowsers.length; i++ ) { 
   name[i] = myBrowsers[i].name; 
   data1[i] = myBrowsers[i].y;  
}

for( j = 0; j < name.length; j++ ) { 
   var temp = new Array( name[j], data1[j] ); 
   dataArrayFinal[j] = temp;
}

				
						$('#browsers-container').highcharts({
							credits: {
								enabled: false
							},
							chart: {
								type: 'pie'
							},
							title: {
								text: 'Browsers'
							},
							subtitle: {
								text: 'Pie chart of end user browser'
							},
							plotOptions: {
								
								pie: {
									size: 250,
									dataLabels: {
										enabled: false
									},
									showInLegend: true
								}
							},
							tooltip: {
                					pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
							},
							series: [{
								  name: 'Browser share',
								  data: dataArrayFinal
							}]
					});
					
					
					
					
					
					
					
					var myCountries = [];  
					
					 
		for( var c = 0; c < data.countries.length; c++ ){
										
				data.countries[c]['country'] == '' ? myCountries.push({"name":"Unknown","y":parseInt(data.countries[c]['count'])}) : myCountries.push({"name":data.countries[c]['country'],"y":parseInt(data.countries[c]['count'])});		
						
	
		}
		
		
		console.log('countries ',myCountries)
		
var name = Array();
var data1 = Array();
var dataArrayFinal = Array();
for( i = 0; i < myCountries.length; i++ ) { 
   name[i] = myCountries[i].name; 
   data1[i] = myCountries[i].y;  
}

for( j = 0; j < name.length; j++ ) { 
   var temp = new Array( name[j], data1[j] );
   dataArrayFinal[j] = temp;
}		

console.log(dataArrayFinal)
	
			$('#countries-container').highcharts({
							credits: {
								enabled: false
							},
							chart: {
								type: 'pie'
							},
							title: {
								text: 'Countries'
							},
							subtitle: {
								text: 'Pie chart of end user location'
							},
							plotOptions: {
								
								pie: {
									size: 250,
									dataLabels: {
										enabled: false
									},
									showInLegend: true
								}
							},
							tooltip: {
                					pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
							},
							series: [{
								  name: 'Location percent',
								  data: dataArrayFinal
							}]
					});
					
					
					
					
					
					
					
					
					
					
					
			  },
		});
				
		
			
			
			

	 }
	
	var handleEmails = function () {
		/*
		$('#emails-div button.uploadcsv').click(function () { console.log('upload csv')
				$('.overlay').fadeIn('slow');
				$('#upload-csv-modal').addClass('in');
		});
		*/
		$('#emails-div button.importcontacts').click(function () { console.log('import contacts')
				$('.overlay').fadeIn('slow');
				$('#import-contacts-modal').addClass('in');
		});
		
		$('#import-contacts-modal .email-modal-close').click(function () {	
				$('.overlay').fadeOut('slow');
				$('#import-contacts-modal').removeClass('in');
		});
		/*
		$('#upload-csv-modal .email-csv-close').click(function () {	
				window.location = 'lists.php';
		});
		*/
	}
	
	var handleCampaign = function () {
		$('a.campaign').click(function() {
			var id = $(this).attr('id');
			sessionStorage.setItem('cid', id);
		});
	}
	
	var handleTemplate = function () {
		$('a.template-btn').click(function() {
			var id = $(this).attr('id');
			sessionStorage.setItem('tid', id);
		});
	}
	
	var handleJQVMAP = function () {

        if (!sample_data) {
            return;
        }

        var showMap = function (name) {
            jQuery('.vmaps').hide();
            jQuery('#vmap_' + name).show();
        }

        var setMap = function (name) {
            var data = {
                map: 'world_en',
                backgroundColor: null,
                borderColor: '#333333',
                borderOpacity: 0.5,
                borderWidth: 1,
                color: '#c6c6c6',
                enableZoom: true,
                hoverColor: '#3daced',
                hoverOpacity: null,
                values: sample_data,
                normalizeFunction: 'linear',
                scaleColors: ['#e8e8e8', '#b0b0b0'],
                selectedColor: '#3daced',
                selectedRegion: null,
                showTooltip: true,
                onLabelShow: function (event, label, code) {

                },
                onRegionOver: function (event, code) {
                    if (code == 'ca') {
                        event.preventDefault();
                    }
                },
                onRegionClick: function (element, code, region) {
                    var message = 'You clicked "' + region + '" which has the code: ' + code.toUpperCase();
                    alert(message);
                }
            };

            data.map = name + '_en';
            var map = jQuery('#vmap_' + name);
            map.width(map.parent().parent().width());
            map.show();
            map.vectorMap(data);
            map.hide();
        }

        setMap("world");
        setMap("usa");
        setMap("europe");
        setMap("russia");
        setMap("germany");

        showMap("world");

        jQuery('#regional_stat_world').click(function () {
            showMap("world");
        });

        jQuery('#regional_stat_usa').click(function () {
            showMap("usa");
        });

        jQuery('#regional_stat_europe').click(function () {
            showMap("europe");
        });
        jQuery('#regional_stat_russia').click(function () {
            showMap("russia");
        });
        jQuery('#regional_stat_germany').click(function () {
            showMap("germany");
        });

        $('#region_statistics_loading').hide();
        $('#region_statistics_content').show();
    }

    var handleAllJQVMAP = function () {

        if (!sample_data) {
            return;
        }

        var setMap = function (name) {
            var data = {
                map: 'world_en',
                backgroundColor: null,
                borderColor: '#333333',
                borderOpacity: 0.5,
                borderWidth: 1,
                color: '#c6c6c6',
                enableZoom: true,
                hoverColor: '#3daced',
                hoverOpacity: null,
                values: sample_data,
                normalizeFunction: 'linear',
                scaleColors: ['#e8e8e8', '#b0b0b0'],
                selectedColor: '#3daced',
                selectedRegion: null,
                showTooltip: true,
                onRegionOver: function (event, code) {
                    //sample to interact with map
                    if (code == 'ca') {
                        event.preventDefault();
                    }
                },
                onRegionClick: function (element, code, region) {
                    //sample to interact with map
                    var message = 'You clicked "' + region + '" which has the code: ' + code.toUpperCase();
                    alert(message);
                }
            };
            data.map = name + '_en';
            var map = jQuery('#vmap_' + name);
            map.width(map.parent().width());
            map.vectorMap(data);
        }

        setMap("world");
        setMap("usa");
        setMap("europe");
        setMap("russia");
        setMap("germany");
    }

   

    var handleClockfaceTimePickers = function () {

        if (!jQuery().clockface) {
            return;
        }

        $('#clockface_1').clockface();

        $('#clockface_2').clockface({
            format: 'HH:mm',
            trigger: 'manual'
        });

        $('#clockface_2_toggle-btn').click(function (e) {
            e.stopPropagation();
            $('#clockface_2').clockface('toggle');
        });

        $('#clockface_3').clockface({
            format: 'H:mm'
        }).clockface('show', '14:30');
    }

    var handlePortletSortable = function () {
        if (!jQuery().sortable) {
            return;
        }
        $(".sortable").sortable({
            connectWith: '.sortable',
            iframeFix: false,
            items: 'div.widget',
            opacity: 0.8,
            helper: 'original',
            revert: true,
            forceHelperSize: true,
            placeholder: 'sortable-box-placeholder round-all',
            forcePlaceholderSize: true,
            tolerance: 'pointer'
        });

    }

    var handleMainMenu = function () {
        jQuery('#sidebar .has-sub > a').click(function () {
            var last = jQuery('.has-sub.open', $('#sidebar'));
            last.removeClass("open");
            jQuery('.arrow', last).removeClass("open");
            jQuery('.sub', last).slideUp(200);
            var sub = jQuery(this).next();
            if (sub.is(":visible")) {
                jQuery('.arrow', jQuery(this)).removeClass("open");
                jQuery(this).parent().removeClass("open");
                sub.slideUp(200);
            } else {
                jQuery('.arrow', jQuery(this)).addClass("open");
                jQuery(this).parent().addClass("open");
                sub.slideDown(200);
            }
        });
    }

    var handleWidgetTools = function () {
        jQuery('.widget .tools .icon-remove').click(function () {
            jQuery(this).parents(".widget").parent().remove();
        });

        jQuery('.widget .tools .icon-refresh').click(function () {
            var el = jQuery(this).parents(".widget");
            App.blockUI(el);
            window.setTimeout(function () {
                App.unblockUI(el);
            }, 1000);
        });

        jQuery('.widget .tools .icon-chevron-down, .widget .tools .icon-chevron-up').click(function () {
            var el = jQuery(this).parents(".widget").children(".widget-body");
            if (jQuery(this).hasClass("icon-chevron-down")) {
                jQuery(this).removeClass("icon-chevron-down").addClass("icon-chevron-up");
                el.slideUp(200);
            } else {
                jQuery(this).removeClass("icon-chevron-up").addClass("icon-chevron-down");
                el.slideDown(200);
            }
        });
    }

    var handleDashboardCharts = function () {

        // used by plot functions
        var data = [];
        var totalPoints = 200;

        // random data generator for plot charts
        function getRandomData() {
            if (data.length > 0) data = data.slice(1);
            // do a random walk
            while (data.length < totalPoints) {
                var prev = data.length > 0 ? data[data.length - 1] : 50;
                var y = prev + Math.random() * 10 - 5;
                if (y < 0) y = 0;
                if (y > 100) y = 100;
                data.push(y);
            }
            // zip the generated y values with the x values
            var res = [];
            for (var i = 0; i < data.length; ++i) res.push([i, data[i]])
            return res;
        }

        if (!jQuery.plot) {
            return;
        }

        function randValue() {
            return (Math.floor(Math.random() * (1 + 40 - 20))) + 20;
        }

        var pageviews = [
            [1, randValue()],
            [2, randValue()],
            [3, 2 + randValue()],
            [4, 3 + randValue()],
            [5, 5 + randValue()],
            [6, 10 + randValue()],
            [7, 15 + randValue()],
            [8, 20 + randValue()],
            [9, 25 + randValue()],
            [10, 30 + randValue()],
            [11, 35 + randValue()],
            [12, 25 + randValue()],
            [13, 15 + randValue()],
            [14, 20 + randValue()],
            [15, 45 + randValue()],
            [16, 50 + randValue()],
            [17, 65 + randValue()],
            [18, 70 + randValue()],
            [19, 85 + randValue()],
            [20, 80 + randValue()],
            [21, 75 + randValue()],
            [22, 80 + randValue()],
            [23, 75 + randValue()],
            [24, 70 + randValue()],
            [25, 65 + randValue()],
            [26, 75 + randValue()],
            [27, 80 + randValue()],
            [28, 85 + randValue()],
            [29, 90 + randValue()],
            [30, 95 + randValue()]
        ];
        var visitors = [
            [1, randValue() - 5],
            [2, randValue() - 5],
            [3, randValue() - 5],
            [4, 6 + randValue()],
            [5, 5 + randValue()],
            [6, 20 + randValue()],
            [7, 25 + randValue()],
            [8, 36 + randValue()],
            [9, 26 + randValue()],
            [10, 38 + randValue()],
            [11, 39 + randValue()],
            [12, 50 + randValue()],
            [13, 51 + randValue()],
            [14, 12 + randValue()],
            [15, 13 + randValue()],
            [16, 14 + randValue()],
            [17, 15 + randValue()],
            [18, 15 + randValue()],
            [19, 16 + randValue()],
            [20, 17 + randValue()],
            [21, 18 + randValue()],
            [22, 19 + randValue()],
            [23, 20 + randValue()],
            [24, 21 + randValue()],
            [25, 14 + randValue()],
            [26, 24 + randValue()],
            [27, 25 + randValue()],
            [28, 26 + randValue()],
            [29, 27 + randValue()],
            [30, 31 + randValue()]
        ];

        $('#site_statistics_loading').hide();
        $('#site_statistics_content').show();

        var plot = $.plot($("#site_statistics"), [{
            data: pageviews,
            label: "Unique Visits"
        }, {
            data: visitors,
            label: "Page Views"
        }], {
            series: {
                lines: {
                    show: true,
                    lineWidth: 2,
                    fill: true,
                    fillColor: {
                        colors: [{
                            opacity: 0.05
                        }, {
                            opacity: 0.01
                        }]
                    }
                },
                points: {
                    show: true
                },
                shadowSize: 2
            },
            grid: {
                hoverable: true,
                clickable: true,
                tickColor: "#eee",
                borderWidth: 0
            },
            colors: ["#A5D16C", "#FCB322", "#32C2CD"],
            xaxis: {
                ticks: 11,
                tickDecimals: 0
            },
            yaxis: {
                ticks: 11,
                tickDecimals: 0
            }
        });


        function showTooltip(x, y, contents) {
            $('<div id="tooltip">' + contents + '</div>').css({
                position: 'absolute',
                display: 'none',
                top: y + 5,
                left: x + 15,
                border: '1px solid #333',
                padding: '4px',
                color: '#fff',
                'border-radius': '3px',
                'background-color': '#333',
                opacity: 0.80
            }).appendTo("body").fadeIn(200);
        }

        var previousPoint = null;
        $("#site_statistics").bind("plothover", function (event, pos, item) {
            $("#x").text(pos.x.toFixed(2));
            $("#y").text(pos.y.toFixed(2));

            if (item) {
                if (previousPoint != item.dataIndex) {
                    previousPoint = item.dataIndex;

                    $("#tooltip").remove();
                    var x = item.datapoint[0].toFixed(2),
                        y = item.datapoint[1].toFixed(2);

                    showTooltip(item.pageX, item.pageY, item.series.label + " of " + x + " = " + y);
                }
            } else {
                $("#tooltip").remove();
                previousPoint = null;
            }
        });

        //server load
        var options = {
            series: {
                shadowSize: 1
            },
            lines: {
                show: true,
                lineWidth: 0.5,
                fill: true,
                fillColor: {
                    colors: [{
                        opacity: 0.1
                    }, {
                        opacity: 1
                    }]
                }
            },
            yaxis: {
                min: 0,
                max: 100,
                tickFormatter: function (v) {
                    return v + "%";
                }
            },
            xaxis: {
                show: false
            },
            colors: ["#A5D16C"],
            grid: {
                tickColor: "#eaeaea",
                borderWidth: 0
            }
        };

        $('#load_statistics_loading').hide();
        $('#load_statistics_content').show();

        var updateInterval = 30;
        var plot = $.plot($("#load_statistics"), [getRandomData()], options);

        function update() {
            plot.setData([getRandomData()]);
            plot.draw();
            setTimeout(update, updateInterval);
        }
        update();
    }

    var handleFancyBox = function () {
        if (!jQuery().fancybox) {
            return;
        }

        if (jQuery(".fancybox-button").size() > 0) {
            jQuery(".fancybox-button").fancybox({
                groupAttr: 'data-rel',
                prevEffect: 'none',
                nextEffect: 'none',
                closeBtn: true,
                helpers: {
                    title: {
                        type: 'inside'
                    }
                }
            });
        }
    }

    var handleLoginForm = function () {
        jQuery('#forget-password').click(function () {
            jQuery('#loginform').hide();
            jQuery('#forgotform').show(200);
        });

        jQuery('#forget-btn').click(function () {

            jQuery('#loginform').slideDown(200);
            jQuery('#forgotform').slideUp(200);
        });
    }

    var handleFixInputPlaceholderForIE = function () {
        //fix html5 placeholder attribute for ie7 & ie8
        if (jQuery.browser.msie && jQuery.browser.version.substr(0, 1) <= 9) { // ie7&ie8
            jQuery('input[placeholder], textarea[placeholder]').each(function () {

                var input = jQuery(this);

                jQuery(input).val(input.attr('placeholder'));

                jQuery(input).focus(function () {
                    if (input.val() == input.attr('placeholder')) {
                        input.val('');
                    }
                });

                jQuery(input).blur(function () {
                    if (input.val() == '' || input.val() == input.attr('placeholder')) {
                        input.val(input.attr('placeholder'));
                    }
                });
            });
        }
    }

    var handleStyler = function () {
        var scrollHeight = '25px';

        jQuery('#theme-change').click(function () {
            if ($(this).attr("opened") && !$(this).attr("opening") && !$(this).attr("closing")) {
                $(this).removeAttr("opened");
                $(this).attr("closing", "1");

                $("#theme-change").css("overflow", "hidden").animate({
                    width: '20px',
                    height: '22px',
                    'padding-top': '3px'
                }, {
                    complete: function () {
                        $(this).removeAttr("closing");
                        $("#theme-change .settings").hide();
                    }
                });
            } else if (!$(this).attr("closing") && !$(this).attr("opening")) {
                $(this).attr("opening", "1");
                $("#theme-change").css("overflow", "visible").animate({
                    width: '190px',
                    height: scrollHeight,
                    'padding-top': '3px'
                }, {
                    complete: function () {
                        $(this).removeAttr("opening");
                        $(this).attr("opened", 1);
                    }
                });
                $("#theme-change .settings").show();
            }
        });

        jQuery('#theme-change .colors span').click(function () {
            var color = $(this).attr("data-style");
            setColor(color);
        });

        jQuery('#theme-change .layout input').change(function () {
            setLayout();
        });

        var setColor = function (color) {
            $('#style_color').attr("href", "css/style_" + color + ".css");
        }

    }

    var handlePulsate = function () {
        if (!jQuery().pulsate) {
            return;
        }

        if (isIE8 == true) {
            return; // pulsate plugin does not support IE8 and below
        }

        if (jQuery().pulsate) {
            jQuery('#pulsate-regular').pulsate({
                color: "#bf1c56"
            });

            jQuery('#pulsate-once').click(function () {
                $(this).pulsate({
                    color: "#399bc3",
                    repeat: false
                });
            });

            jQuery('#pulsate-hover').pulsate({
                color: "#5ebf5e",
                repeat: false,
                onHover: true
            });

            jQuery('#pulsate-crazy').click(function () {
                $(this).pulsate({
                    color: "#fdbe41",
                    reach: 50,
                    repeat: 10,
                    speed: 100,
                    glow: true
                });
            });
        }
    }

    var handlePeity = function () {
        if (!jQuery().peity) {
            return;
        }

        if (jQuery.browser.msie && jQuery.browser.version.substr(0, 2) <= 8) { // ie7&ie8
            return;
        }

        $(".stat.bad .line-chart").peity("line", {
            height: 20,
            width: 50,
            colour: "#d12610",
            strokeColour: "#666"
        }).show();

        $(".stat.bad .bar-chart").peity("bar", {
            height: 20,
            width: 50,
            colour: "#d12610",
            strokeColour: "#666"
        }).show();

        $(".stat.ok .line-chart").peity("line", {
            height: 20,
            width: 50,
            colour: "#37b7f3",
            strokeColour: "#757575"
        }).show();

        $(".stat.ok .bar-chart").peity("bar", {
            height: 20,
            width: 50,
            colour: "#37b7f3"
        }).show();

        $(".stat.good .line-chart").peity("line", {
            height: 20,
            width: 50,
            colour: "#52e136"
        }).show();

        $(".stat.good .bar-chart").peity("bar", {
            height: 20,
            width: 50,
            colour: "#52e136"
        }).show();
        //

        $(".stat.bad.huge .line-chart").peity("line", {
            height: 20,
            width: 40,
            colour: "#d12610",
            strokeColour: "#666"
        }).show();

        $(".stat.bad.huge .bar-chart").peity("bar", {
            height: 20,
            width: 40,
            colour: "#d12610",
            strokeColour: "#666"
        }).show();

        $(".stat.ok.huge .line-chart").peity("line", {
            height: 20,
            width: 40,
            colour: "#37b7f3",
            strokeColour: "#757575"
        }).show();

        $(".stat.ok.huge .bar-chart").peity("bar", {
            height: 20,
            width: 40,
            colour: "#37b7f3"
        }).show();

        $(".stat.good.huge .line-chart").peity("line", {
            height: 20,
            width: 40,
            colour: "#52e136"
        }).show();

        $(".stat.good.huge .bar-chart").peity("bar", {
            height: 20,
            width: 40,
            colour: "#52e136"
        }).show();
    }

    var handleDeviceWidth = function () {
        function fixWidth(e) {
            var winHeight = $(window).height();
            var winWidth = $(window).width();
            //alert(winWidth);
            //for tablet and small desktops
            if (winWidth < 1125 && winWidth > 767) {
                $(".responsive").each(function () {
                    var forTablet = $(this).attr('data-tablet');
                    var forDesktop = $(this).attr('data-desktop');
                    if (forTablet) {
                        $(this).removeClass(forDesktop);
                        $(this).addClass(forTablet);
                    }

                });
            } else {
                $(".responsive").each(function () {
                    var forTablet = $(this).attr('data-tablet');
                    var forDesktop = $(this).attr('data-desktop');
                    if (forTablet) {
                        $(this).removeClass(forTablet);
                        $(this).addClass(forDesktop);
                    }
                });
            }
        }

        fixWidth();

        running = false;
        jQuery(window).resize(function () {
            if (running == false) {
                running = true;
                setTimeout(function () {
                    // fix layout width
                    fixWidth();
                    // fix calendar width by just reinitializing
                  //  ();
                    if (isMainPage) {
                    //    (); // handles full calendar for main page
                    } else {
                     //   handleCalendar(); // handles full calendars
                    }
                    // fix vector maps width
                    if (isMainPage) {
                        jQuery('.vmaps').each(function () {
                            var map = jQuery(this);
                            map.width(map.parent().parent().width());
                        });
                    }
                    if (isMapPage) {
                        jQuery('.vmaps').each(function () {
                            var map = jQuery(this);
                            map.width(map.parent().width());
                        });
                    }
                    // fix event form chosen dropdowns
                    $('#event_priority_chzn').width($('#event_title').width() + 15);
                    $('#event_priority_chzn .chzn-drop').width($('#event_title').width() + 13);

                    $(".chzn-select").val('').trigger("liszt:updated");
                    //finish
                    running = false;
                }, 200); // wait for 200ms on resize event           
            }
        });
    }

    var handleGritterNotifications = function () {
        if (!jQuery.gritter) {
            return;
        }
        $('#gritter-sticky').click(function () {
            var unique_id = $.gritter.add({
                // (string | mandatory) the heading of the notification
                title: 'This is a sticky notice!',
                // (string | mandatory) the text inside the notification
                text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget tincidunt velit. Cum sociis natoque penatibus et <a href="#" style="color:#ccc">magnis dis parturient</a> montes, nascetur ridiculus mus.',
                // (string | optional) the image to display on the left
                image: 'img/avatar-mini.png',
                // (bool | optional) if you want it to fade out on its own or just sit there
                sticky: true,
                // (int | optional) the time you want it to be alive for before fading out
                time: '',
                // (string | optional) the class name you want to apply to that specific message
                class_name: 'my-sticky-class'
            });
            return false;
        });

        $('#gritter-regular').click(function () {

            $.gritter.add({
                // (string | mandatory) the heading of the notification
                title: 'This is a regular notice!',
                // (string | mandatory) the text inside the notification
                text: 'This will fade out after a certain amount of time. Vivamus eget tincidunt velit. Cum sociis natoque penatibus et <a href="#" style="color:#ccc">magnis dis parturient</a> montes, nascetur ridiculus mus.',
                // (string | optional) the image to display on the left
                image: 'img/avatar-mini.png',
                // (bool | optional) if you want it to fade out on its own or just sit there
                sticky: false,
                // (int | optional) the time you want it to be alive for before fading out
                time: ''
            });

            return false;

        });

        $('#gritter-max').click(function () {

            $.gritter.add({
                // (string | mandatory) the heading of the notification
                title: 'This is a notice with a max of 3 on screen at one time!',
                // (string | mandatory) the text inside the notification
                text: 'This will fade out after a certain amount of time. Vivamus eget tincidunt velit. Cum sociis natoque penatibus et <a href="#" style="color:#ccc">magnis dis parturient</a> montes, nascetur ridiculus mus.',
                // (string | optional) the image to display on the left
                image: 'img/avatar-mini.png',
                // (bool | optional) if you want it to fade out on its own or just sit there
                sticky: false,
                // (function) before the gritter notice is opened
                before_open: function () {
                    if ($('.gritter-item-wrapper').length == 3) {
                        // Returning false prevents a new gritter from opening
                        return false;
                    }
                }
            });
            return false;
        });

        $('#gritter-without-image').click(function () {
            $.gritter.add({
                // (string | mandatory) the heading of the notification
                title: 'This is a notice without an image!',
                // (string | mandatory) the text inside the notification
                text: 'This will fade out after a certain amount of time. Vivamus eget tincidunt velit. Cum sociis natoque penatibus et <a href="#" style="color:#ccc">magnis dis parturient</a> montes, nascetur ridiculus mus.'
            });

            return false;
        });

        $('#gritter-light').click(function () {

            $.gritter.add({
                // (string | mandatory) the heading of the notification
                title: 'This is a light notification',
                // (string | mandatory) the text inside the notification
                text: 'Just add a "gritter-light" class_name to your $.gritter.add or globally to $.gritter.options.class_name',
                class_name: 'gritter-light'
            });

            return false;
        });

        $("#gritter-remove-all").click(function () {

            $.gritter.removeAll();
            return false;

        });
    }

    var handleTooltip = function () {
        jQuery('.tooltips').tooltip();
    }

    var handlePopover = function () {
        jQuery('.popovers').popover();
    }

    var handleChoosenSelect = function () {
        if (!jQuery().chosen) {
            return;
        }
        $(".chosen").chosen();
        $(".chosen-with-diselect").chosen({
            allow_single_deselect: true
        });
    }

    var handleUniform = function () {
        if (!jQuery().uniform) {
            return;
        }
        if (test = $("input[type=checkbox]:not(.toggle), input[type=radio]:not(.toggle)")) {
            test.uniform();
        }
    }

    var handleWysihtml5 = function () {
        if (!jQuery().wysihtml5) {
            return;
        }

        if ($('.wysihtml5').size() > 0) {
            $('.wysihtml5').wysihtml5();
        }
    }

    var handleToggleButtons = function () {
        if (!jQuery().toggleButtons) {
            return;
        }
        $('.basic-toggle-button').toggleButtons();
        $('.text-toggle-button').toggleButtons({
            width: 200,
            label: {
                enabled: "Lorem Ipsum",
                disabled: "Dolor Sit"
            }
        });
        $('.danger-toggle-button').toggleButtons({
            style: {
                // Accepted values ["primary", "danger", "info", "success", "warning"] or nothing
                enabled: "danger",
                disabled: "info"
            }
        });
        $('.info-toggle-button').toggleButtons({
            style: {
                enabled: "info",
                disabled: ""
            }
        });
        $('.success-toggle-button').toggleButtons({
            style: {
                enabled: "success",
                disabled: "danger"
            }
        });
        $('.warning-toggle-button').toggleButtons({
            style: {
                enabled: "warning",
                disabled: "success"
            }
        });

        $('.height-toggle-button').toggleButtons({
            height: 100,
            font: {
                'line-height': '100px',
                'font-size': '20px',
                'font-style': 'italic'
            }
        });

        $('.not-animated-toggle-button').toggleButtons({
            animated: false
        });

        $('.transition-value-toggle-button').toggleButtons({
            transitionspeed: 1 // default value: 0.05
        });

    }

    var handleTables = function () {
        if (!jQuery().dataTable) {
            return;
        }

        // begin first table
        $('#sample_1').dataTable({
            "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
            "sPaginationType": "bootstrap",
            "oLanguage": {
                "sLengthMenu": "_MENU_ records per page",
                "oPaginate": {
                    "sPrevious": "Prev",
                    "sNext": "Next"
                }
            },
            "aoColumnDefs": [{
                'bSortable': false,
                'aTargets': [0]
            }]
        });

        jQuery('#sample_1 .group-checkable').change(function () {
            var set = jQuery(this).attr("data-set");
            var checked = jQuery(this).is(":checked");
            jQuery(set).each(function () {
                if (checked) {
                    $(this).attr("checked", true);
                } else {
                    $(this).attr("checked", false);
                }
            });
            jQuery.uniform.update(set);
        });

        jQuery('#sample_1_wrapper .dataTables_filter input').addClass("input-medium"); // modify table search input
        jQuery('#sample_1_wrapper .dataTables_length select').addClass("input-mini"); // modify table per page dropdown

        // begin second table
        $('#sample_2').dataTable({
            "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
            "sPaginationType": "bootstrap",
            "oLanguage": {
                "sLengthMenu": "_MENU_ per page",
                "oPaginate": {
                    "sPrevious": "Prev",
                    "sNext": "Next"
                }
            },
            "aoColumnDefs": [{
                'bSortable': false,
                'aTargets': [0]
            }]
        });

        jQuery('#sample_2 .group-checkable').change(function () {
            var set = jQuery(this).attr("data-set");
            var checked = jQuery(this).is(":checked");
            jQuery(set).each(function () {
                if (checked) {
                    $(this).attr("checked", true);
                } else {
                    $(this).attr("checked", false);
                }
            });
            jQuery.uniform.update(set);
        });

        jQuery('#sample_2_wrapper .dataTables_filter input').addClass("input-small"); // modify table search input
        jQuery('#sample_2_wrapper .dataTables_length select').addClass("input-mini"); // modify table per page dropdown

        // begin: third table
        $('#sample_3').dataTable({
            "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
            "sPaginationType": "bootstrap",
            "oLanguage": {
                "sLengthMenu": "_MENU_ per page",
                "oPaginate": {
                    "sPrevious": "Prev",
                    "sNext": "Next"
                }
            },
            "aoColumnDefs": [{
                'bSortable': false,
                'aTargets': [0]
            }]
        });

        jQuery('#sample_3 .group-checkable').change(function () {
            var set = jQuery(this).attr("data-set");
            var checked = jQuery(this).is(":checked");
            jQuery(set).each(function () {
                if (checked) {
                    $(this).attr("checked", true);
                } else {
                    $(this).attr("checked", false);
                }
            });
            jQuery.uniform.update(set);
        });

        jQuery('#sample_3_wrapper .dataTables_filter input').addClass("input-small"); // modify table search input
        jQuery('#sample_3_wrapper .dataTables_length select').addClass("input-mini"); // modify table per page dropdown
    }

    var handleDateTimePickers = function () {

        if (!jQuery().daterangepicker) {
            return;
        }

        $('.date-range').daterangepicker();

        $('#dashboard-report-range').daterangepicker({
            ranges: {
                'Today': ['today', 'today'],
                'Yesterday': ['yesterday', 'yesterday'],
                'Last 7 Days': [Date.today().add({
                    days: -6
                }), 'today'],
                'Last 30 Days': [Date.today().add({
                    days: -29
                }), 'today'],
                'This Month': [Date.today().moveToFirstDayOfMonth(), Date.today().moveToLastDayOfMonth()],
                'Last Month': [Date.today().moveToFirstDayOfMonth().add({
                    months: -1
                }), Date.today().moveToFirstDayOfMonth().add({
                    days: -1
                })]
            },
            opens: 'left',
            format: 'MM/dd/yyyy',
            separator: ' to ',
            startDate: Date.today().add({
                days: -29
            }),
            endDate: Date.today(),
            minDate: '01/01/2012',
            maxDate: '12/31/2014',
            locale: {
                applyLabel: 'Submit',
                fromLabel: 'From',
                toLabel: 'To',
                customRangeLabel: 'Custom Range',
                daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                firstDay: 1
            },
            showWeekNumbers: true,
            buttonClasses: ['btn-danger']
        },

        function (start, end) {
            App.blockUI(jQuery("#page"));
            setTimeout(function () {
                App.unblockUI(jQuery("#page"));
                $.gritter.add({
                    title: 'Dashboard',
                    text: 'Dashboard date range updated.'
                });
                App.scrollTo();
            }, 1000);
            $('#dashboard-report-range span').html(start.toString('MMMM d, yyyy') + ' - ' + end.toString('MMMM d, yyyy'));

        });

        $('#dashboard-report-range span').html(Date.today().add({
            days: -29
        }).toString('MMMM d, yyyy') + ' - ' + Date.today().toString('MMMM d, yyyy'));

        $('#form-date-range').daterangepicker({
            ranges: {
                'Today': ['today', 'today'],
                'Yesterday': ['yesterday', 'yesterday'],
                'Last 7 Days': [Date.today().add({
                    days: -6
                }), 'today'],
                'Last 30 Days': [Date.today().add({
                    days: -29
                }), 'today'],
                'This Month': [Date.today().moveToFirstDayOfMonth(), Date.today().moveToLastDayOfMonth()],
                'Last Month': [Date.today().moveToFirstDayOfMonth().add({
                    months: -1
                }), Date.today().moveToFirstDayOfMonth().add({
                    days: -1
                })]
            },
            opens: 'right',
            format: 'MM/dd/yyyy',
            separator: ' to ',
            startDate: Date.today().add({
                days: -29
            }),
            endDate: Date.today(),
            minDate: '01/01/2012',
            maxDate: '12/31/2014',
            locale: {
                applyLabel: 'Submit',
                fromLabel: 'From',
                toLabel: 'To',
                customRangeLabel: 'Custom Range',
                daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                firstDay: 1
            },
            showWeekNumbers: true,
            buttonClasses: ['btn-danger']
        },

        function (start, end) {
            $('#form-date-range span').html(start.toString('MMMM d, yyyy') + ' - ' + end.toString('MMMM d, yyyy'));
        });

        $('#form-date-range span').html(Date.today().add({
            days: -29
        }).toString('MMMM d, yyyy') + ' - ' + Date.today().toString('MMMM d, yyyy'));


        if (!jQuery().datepicker || !jQuery().timepicker) {
            return;
        }
        $('.date-picker').datepicker();

        $('.timepicker-default').timepicker();

        $('.timepicker-24').timepicker({
            minuteStep: 1,
            showSeconds: true,
            showMeridian: false
        });

    }

    var handleColorPicker = function () {
        if (!jQuery().colorpicker) {
            return;
        }
        $('.colorpicker-default').colorpicker({
            format: 'hex'
        });
        $('.colorpicker-rgba').colorpicker();
    }

    var handleAccordions = function () {
        $(".accordion").collapse().height('auto');
    }

    var handleScrollers = function () {
        if (!jQuery().slimScroll) {
            return;
        }

        $('.scroller').each(function () {
            $(this).slimScroll({
                //start: $('.blah:eq(1)'),
                height: $(this).attr("data-height"),
                alwaysVisible: ($(this).attr("data-always-visible") == "1" ? true : false),
                railVisible: ($(this).attr("data-rail-visible") == "1" ? true : false),
                disableFadeOut: true
            });
        });
    }
	
	var first = 0;
    var handleFormWizards = function () {
        if (!jQuery().bootstrapWizard) {
            return;
        }

        $('#form_wizard_1').bootstrapWizard({
            'nextSelector': '.button-next',
            'previousSelector': '.button-previous',
            onTabClick: function (tab, navigation, index) {
                return false;
            },
            onNext: function (tab, navigation, index) {
				
                var total = navigation.find('li').length;
                var current = index + 1;
				
                // set wizard title
                $('.step-title', $('#form_wizard_1')).text('Step ' + (index + 1) + ' of ' + total);
				
                // set done steps
                jQuery('li', $('#form_wizard_1')).removeClass("done");
                var li_list = navigation.find('li');
				
                for (var i = 0; i < index; i++) {
                    jQuery(li_list[i]).addClass("done");
                }

                if (current == 1) {
				
					
                    $('#form_wizard_1').find('.button-previous').hide();
                } else {
					$('#form_wizard_1').find('.button-next').show();
					if (current == 2){ 
				//	$('#form_wizard_1').find('#backbtn').removeClass('button-previous');
					
					var tid = sessionStorage.getItem('tid');
										
					console.log('tid ',tid)
					
					if(first == 0){ console.log('first')
							first = 1;
							
							$.ajax({
								  type: 'POST',
								  url: 'template.php',
								  async: true,
								  data: {
									 id: tid
								  },
								  error: function(error) {
									console.log('error', error.error())
								  },
								  dataType: 'json',
								  success: function(data) {
								 
									  $('#edittemplate').html(data);
									  $('#edittemplate').fadeIn('slow');
								//	 $('#form_wizard_1').find('#backbtn').removeClass('button-previous');
								
								  },
						   });
						   
						   
						   $.getScript( "assets/ck-editor/ckeditor.js", function( data, textStatus, jqxhr ) {
								//	  console.log( data ); // Data returned
									  console.log( textStatus ); // Success
								//	  console.log( jqxhr.status ); // 200
								//	  console.log( "Load was performed." );
							});
							
							
							
					}
						   
					} else { 
					
							console.log('333333333333')
					
							$('#form_wizard_1').find('.button-previous').show();
							
							var jData = {};
							jData.html = $('#edittemplate').html();
							
							$.ajax({
								  type: 'POST',
								  url: 'savetemplate.php',
								  async: true,
								  data: jData,
								  error: function(error) {
									console.log('error', error)
								  },
								  success: function(data) { 
								  
										console.log('saved template success')
									 
								  },
						   });
						   
						   $('#form_wizard_1').find('#continuebtn').hide();
						   $('#form_wizard_1').find('.button-submit').show();
					
					
					
					
					/******************************************************************OLD
							$('#form_wizard_1').find('.button-previous').show();
							
							var jData = {};
							for (var i in CKEDITOR.instances) {						
									jData[i] = CKEDITOR.instances[i].getData();
							}
							
							$.ajax({
								  type: 'POST',
								  url: 'savetemplate.php',
								  async: true,
								  data: jData,
								  error: function(error) {
									console.log('error', error)
								  },
								  success: function(data) { 
								  
										console.log('saved template success')
									 
								  },
						   });
						   
						   $('#form_wizard_1').find('#continuebtn').hide();
						   $('#form_wizard_1').find('.button-submit').show();
						   **********************************************************/
					}
					
					//$('#form_wizard_1').find('.button-previous').show();
                }
                App.scrollTo($('.page-title'));
            },
            onPrevious: function (tab, navigation, index) {
				
				console.log('hit back')
				// Destroy the editor.
	//		editor.destroy();
	//		editor = null;

											//		  $('#edittemplate').html('');

				
				
				
				
                var total = navigation.find('li').length;
                var current = index + 1;
				
                // set wizard title
                $('.step-title', $('#form_wizard_1')).text('Step ' + (index + 1) + ' of ' + total);
				
                // set done steps
                jQuery('li', $('#form_wizard_1')).removeClass("done");
                var li_list = navigation.find('li');
                for (var i = 0; i < index; i++) {
                    jQuery(li_list[i]).addClass("done");
                }

                if (current == 1) {
					console.log('current 1111111111 ', current)
		//			$('#form_wizard_1').find('#continuebtn').hide();
        //            $('#form_wizard_1').find('.button-previous').hide();
                } else {
					console.log('current 222222222 ',current)
					
					
					$('#form_wizard_1').find('.button-submit').hide();
                    $('#form_wizard_1').find('.button-previous').hide();
					$('#form_wizard_1').find('#continuebtn').show();
                }


/*
                if (current >= total) {
                    $('#form_wizard_1').find('.button-next').hide();
                    $('#form_wizard_1').find('.button-submit').show();
                } else {
                //    $('#form_wizard_1').find('.button-next').show();
                    $('#form_wizard_1').find('.button-submit').hide();
                }
				*/

                App.scrollTo($('.page-title'));
            },
            onTabShow: function (tab, navigation, index) {
                var total = navigation.find('li').length;
                var current = index + 1;
                var $percent = (current / total) * 100;
                $('#form_wizard_1').find('.bar').css({
                    width: $percent + '%'
                });
				
            }
        });
        $('#form_wizard_1').find('.button-previous').hide();
        $('#form_wizard_1 .button-submit').click(function () {
			  
			var progressTimer, progressLabel = $( ".progress-label" ), progressbar = $( "#progressbar" );
			
			$('.overlay').fadeIn('slow');
			$('#dialog').addClass('in');
			
			function openmodal() { 
					
					progressTimer = setTimeout( progress, 2000 );
			  
			}			
		
			var emailprogressbar = $('div#email-bar');
			
			function progress() {
			
			 		var val = parseInt(emailprogressbar.css('width')) || 0;
			 
			 
				    if ( val <= 99 ) { 
							progressTimer = setTimeout( progress, 50 );
					
							var width = val + Math.floor( Math.random() * 3 );
				
							progressLabel.html("Current Progress: " + width + "%");
					
				  }
				  
				  if ( val >= 100 ){
					  progressLabel.html( "Complete!" );
					  emailprogressbar.width('100%');
					  callback();
				  }
				  
				  
				  emailprogressbar.width(width+'%');
			}

			$('#email-bar-close').click(function () {	
				window.location = 'reports.php';
			})
	
			function callback(){
					console.log('FINISHED')
			}
			
			var jData = {};
			jData.listId = $('#lists').val();
			jData.subject = $('#subject').val();
			jData.fromName = $('#from-name').val();
			jData.fromEmail = $('#from-email').val();
			jData.replyTo = $('#replyto').val();
        
			
					$.ajax({
						  type: 'POST',
						  url: 'send.php',
						  async: true,
						  data: jData,
						  beforeSend: function() { 
	
							openmodal();
						  },
						  error: function(error) {
							console.log('error', error)
						  },
						  dataType: 'json',
						  success: function(data) { 
						  
							console.log('success')
							 
						  },
				   });
				   
			
        }).hide();
    }

    var handleTagsInput = function () {
        if (!jQuery().tagsInput) {
            return;
        }
        $('#tags_1').tagsInput({
            width: 'auto'
        });
        $('#tags_2').tagsInput({
            width: 240
        });
    }

    var handleGoTop = function () {
        /* set variables locally for increased performance */
        jQuery('#footer .go-top').click(function () {
            App.scrollTo();
        });

    }

    // this is optional to use if you want animated show/hide. But plot charts can make the animation slow.
    var handleSidebarTogglerAnimated = function () {

        $('.sidebar-toggler').click(function () {
            if ($('#sidebar > ul').is(":visible") === true) {
                $('#main-content').animate({
                    'margin-left': '25px'
                });

                $('#sidebar').animate({
                    'margin-left': '-190px'
                }, {
                    complete: function () {
                        $('#sidebar > ul').hide();
                        $("#container").addClass("sidebar-closed");
                    }
                });
            } else {
                $('#main-content').animate({
                    'margin-left': '215px'
                });
                $('#sidebar > ul').show();
                $('#sidebar').animate({
                    'margin-left': '0'
                }, {
                    complete: function () {
                        $("#container").removeClass("sidebar-closed");
                    }
                });
            }
        })
    }

    // by default used simple show/hide without animation due to the issue with handleSidebarTogglerAnimated.
    var handleSidebarToggler = function () {

        $('.sidebar-toggler').click(function () {
            if ($('#sidebar > ul').is(":visible") === true) {
                $('#main-content').css({
                    'margin-left': '25px'
                });
                $('#sidebar').css({
                    'margin-left': '-190px'
                });
                $('#sidebar > ul').hide();
                $("#container").addClass("sidebar-closed");
            } else {
               $('#main-content').css({
                    'margin-left': '215px'
                });
                $('#sidebar > ul').show();
                $('#sidebar').css({
                    'margin-left': '0'
                });
                $("#container").removeClass("sidebar-closed");
            }
        })
    }

    return {

        //main function to initiate template pages
        init: function () {

            if (jQuery.browser.msie && jQuery.browser.version.substr(0, 1) == 8) {
                isIE8 = true; // checkes for IE8 browser version
                $('.visible-ie8').show();
            }

            handleDeviceWidth(); // handles proper responsive features of the page
            handleChoosenSelect(); // handles bootstrap chosen dropdowns

            if (isMainPage) {
                handleDashboardCharts(); // handles plot charts for main page
                handleJQVMAP(); // handles vector maps for home page
            } else {
                handlePortletSortable(); // handles portlet draggable sorting
            }

            if (isMapPage) {
                handleAllJQVMAP(); // handles vector maps for interactive map page
            }

			if (isChartPage) {
				handleCharts(); // handles statistics page
			}
			
			if (isTemplateBuilderPage) {
				handleTemplateBuilder(); // handles statistics page
			}
			
			handleEmails(); // handles emails page in lists section	
			handleCampaign(); // handles campaign ID in reports section
		    handleTemplate(); // handles template ID in template wizard
            handleScrollers(); // handles slim scrolling contents
            handleUniform(); // handles uniform elements
            handleClockfaceTimePickers(); //handles form clockface timepickers
            handleTagsInput() // handles tag input elements
            handleTables(); // handles data tables
            handleWidgetTools(); // handles portlet action bar functionality(refresh, configure, toggle, remove)
            handlePulsate(); // handles pulsate functionality on page elements
            handlePeity(); // handles pierty bar and line charts
            handleGritterNotifications(); // handles gritter notifications
            handleTooltip(); // handles bootstrap tooltips
            handlePopover(); // handles bootstrap popovers
            handleToggleButtons(); // handles form toogle buttons
            handleWysihtml5(); //handles WYSIWYG Editor 
            handleDateTimePickers(); //handles form timepickers
            handleColorPicker(); // handles form color pickers
            handleFancyBox(); // handles fancy box image previews
            handleStyler(); // handles style customer tool
            handleMainMenu(); // handles main menu
            handleFixInputPlaceholderForIE(); // fixes/enables html5 placeholder attribute for IE9, IE8
            handleGoTop(); //handles scroll to top functionality in the footer
            handleAccordions();
            handleFormWizards();
            handleSidebarToggler();

            if (isMainPage) { // this is for demo purpose. you may remove handleIntro function for your project
//                handleIntro();
            }
        },

        // login page setup
        initLogin: function () {
            handleLoginForm();
            handleFixInputPlaceholderForIE();
        },

        // wrapper function for page element pulsate
        pulsate: function (el, options) {
            var opt = jQuery.extend(options, {
                color: '#d12610', // set the color of the pulse
                reach: 15, // how far the pulse goes in px
                speed: 300, // how long one pulse takes in ms
                pause: 0, // how long the pause between pulses is in ms
                glow: false, // if the glow should be shown too
                repeat: 1, // will repeat forever if true, if given a number will repeat for that many times
                onHover: false // if true only pulsate if user hovers over the element
            });

            jQuery(el).pulsate(opt);
        },

        // wrapper function to scroll to an element
        scrollTo: function (el) {
            pos = el ? el.offset().top : 0;
            jQuery('html,body').animate({
                scrollTop: pos
            }, 'slow');
        },

        // wrapper function to  block element(indicate loading)
        blockUI: function (el, loaderOnTop) {
            lastBlockedUI = el;
            jQuery(el).block({
                message: '<img src="img/loading.gif" align="absmiddle">',
                css: {
                    border: 'none',
                    padding: '2px',
                    backgroundColor: 'none'
                },
                overlayCSS: {
                    backgroundColor: '#000',
                    opacity: 0.05,
                    cursor: 'wait'
                }
            });
        },

        // wrapper function to  un-block element(finish loading)
        unblockUI: function (el) {
            jQuery(el).unblock({
                onUnblock: function () {
                    jQuery(el).removeAttr("style");
                }
            });
        },

        // set main page
        setMainPage: function (flag) {
            isMainPage = flag;
        },

        // set map page
        setMapPage: function (flag) {
            isMapPage = flag;
        },
		
		// set chart page
        setChartPage: function (flag) {
            isChartPage = flag;
        },
		
		// set template builder page
        setTemplateBuilderPage: function (flag) {
            isTemplateBuilderPage = flag;
        }

    };

    //input mask

    $('.inputmask').inputmask();

}();

//tooltips

//$('.element').tooltip();

/*
// Slider input js
try{
    jQuery("#Slider1").slider({ from: 5, to: 50, step: 2.5, round: 1, dimension: '&nbsp;$', skin: "round_plastic" });
    jQuery("#Slider2").slider({ from: 5000, to: 150000, heterogeneity: ['50/50000'], step: 1000, dimension: '&nbsp;$', skin: "round_plastic" });
    jQuery("#Slider3").slider({ from: 1, to: 30, heterogeneity: ['50/5', '75/15'], scale: [1, '|', 3, '|', '5', '|', 15, '|', 30], limits: false, step: 1, dimension: '', skin: "round_plastic" });
    jQuery("#Slider4").slider({ from: 480, to: 1020, step: 15, dimension: '', scale: ['8:00', '9:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00'], limits: false, skin: "round_plastic", calculate: function( value ){
        var hours = Math.floor( value / 60 );
        var mins = ( value - hours*60 );
        return (hours < 10 ? "0"+hours : hours) + ":" + ( mins == 0 ? "00" : mins );
    }});
}
    catch (e){
    errorMessage(e);
}
*/

//knob

//$(".knob").knob();





