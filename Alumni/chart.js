<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>;
// Inisialisasi elemen canvas
var ctx = document.getElementById("myDonutChart").getContext("2d");

// Mengambil data dari file PHP menggunakan Fetch API
fetch("data_alumni.php")
  .then((response) => response.json())
  .then((data) => {
    // Konfigurasi grafik donat
    var donutChart = new Chart(ctx, {
      type: "doughnut",
      data: {
        labels: ["Vokasi", "Sarjana", "Magister", "Spesialis", "Doctor"],
        datasets: [
          {
            data: [
              data.Vokasi,
              data.Sarjana,
              data.Magister,
              data.Spesialis,
              data.Doctor,
            ],
            backgroundColor: [
              "rgba(255, 99, 132, 0.7)",
              "rgba(54, 162, 235, 0.7)",
              "rgba(255, 206, 86, 0.7)",
              "rgba(75, 192, 192, 0.7)",
              "rgba(153, 102, 255, 0.7)",
            ],
            borderColor: [
              "rgba(255, 99, 132, 1)",
              "rgba(54, 162, 235, 1)",
              "rgba(255, 206, 86, 1)",
              "rgba(75, 192, 192, 1)",
              "rgba(153, 102, 255, 1)",
            ],
            borderWidth: 1,
          },
        ],
      },
      options: {
        // Konfigurasi opsi lainnya
      },
    });
  });
