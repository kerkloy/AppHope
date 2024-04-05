$(document).ready(function() {
    // Get total sales, total costs, and total profit from data attributes
    var totalSales = parseFloat($('#salesChart').data('tsales'));
    var totalCosts = parseFloat($('#salesChart').data('tcost'));
    var totalProfit = parseFloat($('#salesChart').data('tprofit'));

    // Create a new Chart instance
    var ctx = $('#salesChart')[0].getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Total Sales', 'Total Costs', 'Total Profit'],
            datasets: [{
                label: 'Amount',
                data: [totalSales, totalCosts, totalProfit],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.5)', // Blue for total sales
                    'rgba(255, 99, 132, 0.5)', // Red for total costs
                    'rgba(75, 192, 192, 0.5)' // Green for total profit
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        display: true,
                        color: 'rgba(0, 0, 0, 0.1)'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            },
            plugins: {
                title: {
                    display: true,
                    text: 'Sales vs Costs vs Profit',
                    font: {
                        size: 18,
                        weight: 'bold'
                    }
                },
                legend: {
                    display: true,
                    position: 'top'
                }
            }
        }
    });
});

