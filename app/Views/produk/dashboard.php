<?= $this->extend('produk/layout') ?>
<?= $this->section('content') ?>
<main>
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 min-h-screen">
        <h1 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">Dashboard</h1>
        <!-- Card Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md border-t-4 border-green-500">
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">JUMLAH PRODUK</p>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mt-1"><?= $jumlah_produk ?></h2>
            </div>
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md border-t-4 border-blue-500">
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">TOTAL PENGHASILAN</p>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mt-1"><?= $total_penghasilan ?></h2>
            </div>
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md border-t-4 border-yellow-500">
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">TOTAL STOK</p>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mt-1"><?= $total_stok ?></h2>
            </div>
        </div>

        <!-- Chart Section -->
        <!-- <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-6"> -->
            <!-- Bar Chart -->
            <!-- <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-bold mb-4 text-gray-900 dark:text-white">Penjualan Bulan Ini</h3>
                <canvas id="monthlySalesChart"></canvas>
            </div> -->
            <!-- Doughnut Chart -->
            <!-- <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-bold mb-4 text-gray-900 dark:text-white">Total Penjualan Berdasarkan Kategori Produk</h3>
                <canvas id="categorySalesChart"></canvas>
            </div>
        </div>
    </div>
</main> -->
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<!-- <script>
    // Bar Chart Data & Config
    const monthlySalesData = {
        labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30'],
        datasets: [{
            label: 'Penjualan',
            backgroundColor: '#3B82F6',
            borderColor: '#3B82F6',
            data: [60000, 70000, 45000, 65000, 80000, 55000, 68000, 75000, 50000, 72000, 95000, 105000, 140000, 130000, 120000, 125000, 110000, 98000, 85000, 92000, 78000, 68000, 55000, 60000, 75000, 82000, 70000, 65000, 50000, 15000]
        }]
    };
    const monthlySalesConfig = {
        type: 'bar',
        data: monthlySalesData,
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    };
    new Chart(document.getElementById('monthlySalesChart'), monthlySalesConfig);

    // Doughnut Chart Data & Config
    const categorySalesData = {
        labels: ['Minuman', 'Makanan', 'Alat Tulis', 'Bumbu Dapur'],
        datasets: [{
            label: 'Penjualan per Kategori',
            backgroundColor: ['#6EE7B7', '#3B82F6', '#FACC15', '#EC4899', '#9333EA'],
            borderColor: '#FFFFFF',
            data: [1200000, 850000, 300000, 500000]
        }]
    };
    const categorySalesConfig = {
        type: 'doughnut',
        data: categorySalesData,
        options: {
            responsive: true,
            cutout: '70%',
            plugins: {
                legend: {
                    position: 'bottom',
                },
            }
        }
    };
    new Chart(document.getElementById('categorySalesChart'), categorySalesConfig);
</script>
<?= $this->endSection() ?> -->
