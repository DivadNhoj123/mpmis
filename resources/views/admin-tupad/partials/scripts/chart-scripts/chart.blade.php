<script src="../assets/js/plugin/chart.js/chart.min.js"></script>
<script>
    // Log the data to verify it's now an array
    var monthlyData = @json($monthlyData);
    console.log(monthlyData);

    if (!monthlyData || monthlyData.length === 0) {
        monthlyData = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]; // Default values if no data is found
    }

    var barChart = document.getElementById("barChart").getContext("2d");

    var myBarChart = new Chart(barChart, {
        type: "bar",
        data: {
            labels: [
                "Jan", "Feb", "Mar", "Apr", "May", "Jun",
                "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
            ],
            datasets: [{
                label: "TUPAD Applicants",
                backgroundColor: "rgb(23, 125, 255)",
                borderColor: "rgb(23, 125, 255)",
                data: monthlyData, // Use the data from the controller
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                }
            }
        }
    });
</script>

