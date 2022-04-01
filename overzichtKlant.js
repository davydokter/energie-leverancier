document.addEventListener("DOMContentLoaded", () => {
	const yearSelector = document.querySelector('.year-select');
	const chartSelector = document.getElementById("bar-chart");
	const defaultYear = '2019';
	let chartCanvas = null;
	let data = null;
	
	yearSelector.addEventListener('change', (e) => {
		showChart(e.target.value)
	})
	
	getData();
	
	function getData() {
		fetch('/energieleverancier/fetch.php')
			.then(response => response.json())
			.then(payload => {
				data = payload;
				showChart(defaultYear);
			})
			.catch(e => console.error(e));
	}
	
	// jaar == onchange in selection
	function showChart(jaar) {
		if (chartCanvas) {
			chartCanvas.destroy();
		}
		
		const gaswaarden = data.filter(obj => {
			if (obj.id == window.klantId && obj.jaar == jaar) {
				return obj;
			}
		}).map(obj => {
			return obj.gas;
		})
		
		const elektrawaarden = data.filter(obj => {
			if (obj.id == window.klantId && obj.jaar == jaar) {
				return obj;
			}
		}).map(obj => {
			return obj.elektra;
		})
		
		chartCanvas = new Chart(chartSelector, {
			type: 'bar',
			data: {
				labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
				datasets: [
					{
						label: "Gas in M3",
						backgroundColor: ["#3e95cd"],
						data: gaswaarden,
					},
					{
						label: "Elektra in KW",
						backgroundColor: ["deeppink"],
						data: elektrawaarden
					}
				]
			},
			options: {
				legend: {display: false},
				title: {
					display: true,
					text: 'Energie Verbruiking'
				}
			}
		});
	}
})
