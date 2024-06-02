import './bootstrap';
import '@fortawesome/fontawesome-free/css/all.min.css';

import Chart from 'chart.js/auto';

const Utils = {
    months: ({ count }) => {
        const months = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];
        return months.slice(0, count);
    },
    numbers: ({ count, min, max }) => {
        const numbers = [0,20,15,41,66,33,44,77,88,80,75,60];
        /*for (let i = 0; i < count; i++) {
            numbers.push(Math.floor(Math.random() * (max - min + 1)) + min);
        }*/
        return numbers;
    },
    CHART_COLORS: {
        red: 'rgb(10, 104, 255)'
    },
    transparentize: (color, opacity) => {
        return `rgba(10, 104, 255, ${opacity})`;
    }
};

document.addEventListener('DOMContentLoaded', function () {
    const DATA_COUNT = 12;
    const NUMBER_CFG = { count: DATA_COUNT, min: 0, max: 1000 };
    const labels = Utils.months({ count: DATA_COUNT });
    const data = {
        labels: labels,
        datasets: [
            {
                label: 'My First dataset',
                data: Utils.numbers(NUMBER_CFG),
                borderColor: Utils.CHART_COLORS.red,
                backgroundColor: Utils.transparentize(Utils.CHART_COLORS.red, 0.4),
                fill: true,
                tension: 0.4
            }
        ],
    };

    const config = {
        type: 'line', // or 'bar', 'pie', etc.
        data: data,
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };



    let myChart;
    const ctx = document.getElementById('myChart').getContext('2d');


    function renderChart() {
        if (myChart) {
            myChart.destroy(); // Destroy the existing chart instance
        }
        myChart = new Chart(ctx, config);
    }

    renderChart(); // Initial chart render

    window.addEventListener('resize', renderChart);
});
