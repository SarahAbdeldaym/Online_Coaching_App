var charts = {
    coach_specialist:function(){
        this.ajaxGetCoachSpecialist();
    },
    coach_revenue:function(year){
        this.ajaxGetCoachRevenue(year);
    },
    ajaxGetCoachSpecialist: function () {
        var request = $.ajax({
            url: "statistics/coach_specialist",
            method: 'GET'
        });

        request.done(function (response) {
            console.log(response);
            charts.createPieChart(response);
        });
    },
    ajaxGetCoachRevenue: function (year=2021) {
        var request = $.ajax({
            url: "statistics/coach_revenue/"+year,
            method: 'GET'
        });

        request.done(function (response) {
            console.log(response);
            charts.createLineChart(response);
        });
    },
    createPieChart:function (response) {
        var ctx = document.getElementById(response.id).getContext('2d');
		var myChart = new Chart(ctx, {
            type: 'pie',
			data:{
			datasets: [{
			data:response.data,
			backgroundColor:response.colors,
			}],
			// These labels appear in the legend and in the tooltips when hovering different arcs
			labels:response.labels,
		}
		,options:{
				cutoutPercentage:50,
			}
		});
	},
    createLineChart: function (response) {

        var ctx = document.getElementById(response.id);
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: response.labels, // The response got from the ajax request containing all month names in the database
                datasets: [{
                    label: response.label,
                    lineTension: .3,
                    backgroundColor: "rgba(2,117,216,0.2)",
                    borderColor: "rgba(2,117,216,1)",
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(2,117,216,1)",
                    pointBorderColor: "rgba(255,255,255,0.8)",
                    pointHoverRadius: 10,
                    pointHoverBackgroundColor: "rgba(2,117,216,1)",
                    pointHitRadius: 10,
                    pointBorderWidth: 10,
                    data: response.data // The response got from the ajax request containing data for the completed jobs in the corresponding months
                }],
            },
            options: {
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: false
                        },
                        ticks: {
                            maxTicksLimit: 1
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: response.max, // The response got from the ajax request containing max limit for y axis
                            maxTicksLimit: 15
                        },
                        gridLines: {
                            color: "rgba(0, 0, 0, .125)",
                        }
                    }],
                },
                legend: {
                    display: false
                }
            }
        });


    }
};
charts.coach_specialist();

charts.coach_revenue();
