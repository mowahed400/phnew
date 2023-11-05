@extends('AdminPanel.app')
@section('content')

<canvas id="myChart" width="150" height="50"></canvas>



<script>
// Fetch your chart data (example data)
const chartData = {
    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
    datasets: [
        {
            label: 'Sample Chart',
            data: [65, 59, 80, 81, 56, 55, 40],
            fill: true,
            borderColor: 'rgba(75, 192, 192, 1)',
            tension: 0.1
        }
    ]
};

// Get the canvas element
const ctx = document.getElementById('myChart').getContext('2d');

// Create the chart using Chart.js
const myChart = new Chart(ctx, {
    type: 'line',
    data: chartData,
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
@endsection
