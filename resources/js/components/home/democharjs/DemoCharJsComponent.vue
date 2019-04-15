<template>
	<div class="container pt-5">
		<div class="row pt-5 pb-5">
			<div class="col-md-6">
				<div id="appdemocharjs">
				    <canvas id="planet-chart" style="position: relative; height:80vh; width:80vw"></canvas>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
	// import planetChartData from './chart-data.js';
	export default {
		data() {
			return {
				planetChartData: null,
			}
		},
		created(){
			this.planetChartData = {
    			type: 'bar',
			    data: {
			        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
			        datasets: [{
			            label: 'Tên data',
			            data: [1, 2, 7, 4, 5, 6],
			            backgroundColor: [
			                'rgba(255, 99, 132, 0.2)',
			                'rgba(54, 162, 235, 0.2)',
			                'rgba(255, 206, 86, 0.2)',
			                'rgba(75, 192, 192, 0.2)',
			                'rgba(153, 102, 255, 0.2)',
			                'rgba(255, 159, 64, 0.2)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        },
			        {
			            label: 'Tên data 2',
			            data: [7,7, 7, 4, 5, 6],
			            backgroundColor: [
			                'rgba(255, 99, 132, 0.2)',
			                'rgba(54, 162, 235, 0.2)',
			                'rgba(255, 206, 86, 0.2)',
			                'rgba(75, 192, 192, 0.2)',
			                'rgba(153, 102, 255, 0.2)',
			                'rgba(255, 159, 64, 0.2)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        },
			        onHover: function(event,elements) {
						$("#planet-chart").css("cursor", elements[0] ? "pointer" : "default");
					},
					tooltips: {
			            callbacks: {
			                labelTextColor: function(tooltipItem, chart) {
			                    return '#543453';
			                }
			            }
			        }
		    	}
		    }
		},
		mounted(){
			this.createChart('planet-chart', this.planetChartData);
		},
		methods: {
			createChart(chartId, chartData) {
				const ctx = document.getElementById(chartId);
				const myChart = new Chart(ctx, {
					type: chartData.type,
					data: chartData.data,
					options: chartData.options,
				});
			}
		}
	}
</script>