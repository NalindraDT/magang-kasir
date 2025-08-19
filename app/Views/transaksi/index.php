<?= $this->extend('produk/layout') ?>

<?= $this->section('content') ?>
<main class="p-4 sm:ml-32 flex flex-col items-center">
    <div class="p-4 rounded-lg min-h-screen max-w-full w-full">
        <h1 class="text-2xl font-bold ml-32 mb-6  text-gray-900 dark:text-white">Riwayat Transaksi</h1>

        <!-- Tabel Transaksi -->
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-6 w-full max-w-4xl mx-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID Pembeli</th>
                        <th scope="col" class="px-6 py-3">Nama Produk</th>
                        <th scope="col" class="px-6 py-3">Kuantitas</th>
                        <th scope="col" class="px-6 py-3">Total Harga</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($transaksis)): ?>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">Tidak ada riwayat transaksi.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($transaksis as $transaksi): ?>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $transaksi['id_pembeli'] ?></td>
                                <td class="px-6 py-4"><?= $transaksi['nama_produk'] ?></td>
                                <td class="px-6 py-4"><?= $transaksi['stok'] ?></td>
                                <td class="px-6 py-4">Rp <?= number_format($transaksi['total_harga'], 0, ',', '.') ?></td>
                                <td class="px-6 py-4 text-green-500 font-semibold">Sukses</td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<?= $this->endSection() ?>
