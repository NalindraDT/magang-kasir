<?= $this->extend('pembeli/layout_pembeli') ?>

<?= $this->section('content') ?>
<main class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold mb-8 text-gray-900 dark:text-white">Daftar Produk</h1>
    
    <?php if (session()->getFlashdata('message')): ?>
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <?= session()->getFlashdata('message') ?>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-12">
        <?php if (empty($produks)): ?>
            <div class="col-span-full text-center text-gray-500 dark:text-gray-400">Tidak ada produk yang tersedia.</div>
        <?php else: ?>
            <?php foreach ($produks as $produk): ?>
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 flex flex-col justify-between">
                    <div>
                        <h5 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white mb-2"><?= $produk['nama_produk'] ?></h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Harga: Rp <?= number_format($produk['harga'], 0, ',', '.') ?></p>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Stok: <?= $produk['stok'] ?></p>
                    </div>
                    <form action="<?= base_url('pembeli/beli') ?>" method="post" class="mt-4">
                        <input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>">
                        <div class="flex items-center space-x-2">
                            <input type="number" name="kuantitas" value="1" min="1" max="<?= $produk['stok'] ?>" class="w-20 px-3 py-2 text-center text-gray-900 border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            <button type="submit" class="flex-grow text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Beli
                            </button>
                        </div>
                    </form>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    
    <hr class="my-8 border-gray-300 dark:border-gray-700">

    <h2 class="text-3xl font-bold mb-8 text-gray-900 dark:text-white">Keranjang Belanja</h2>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">ID Pembeli</th>
                    <th scope="col" class="px-6 py-3">ID Produk</th>
                    <th scope="col" class="px-6 py-3">Nama Produk</th>
                    <th scope="col" class="px-6 py-3">Kuantitas</th>
                    <th scope="col" class="px-6 py-3">Harga Satuan</th>
                    <th scope="col" class="px-6 py-3">Total Harga</th>
                    <th scope="col" class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($keranjang)): ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">Keranjang belanja kosong.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($keranjang as $item): ?>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $item['id_pembeli'] ?></td>
                            <td class="px-6 py-4"><?= $item['id_produk'] ?></td>
                            <td class="px-6 py-4"><?= $item['nama_produk'] ?></td>
                            <td class="px-6 py-4"><?= $item['stok'] ?></td>
                            <td class="px-6 py-4">Rp <?= number_format($item['harga'], 0, ',', '.') ?></td>
                            <td class="px-6 py-4">Rp <?= number_format($item['total_harga'], 0, ',', '.') ?></td>
                            <td class="px-6 py-4">
                                <a href="<?= base_url('pembeli/removeFromCart/' . $item['id_pembeli']) ?>" class="font-medium text-red-600 dark:text-red-500 hover:underline">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    
    <!-- Tombol Cetak Nota -->
    <?php if (!empty($keranjang)): ?>
        <div class="mt-6 text-center">
            <a href="<?= base_url('pembeli/cetakNota') ?>" target="_blank" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                Cetak Nota
            </a>
        </div>
    <?php endif; ?>
</main>
<?= $this->endSection() ?>
