<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cetak spanduk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="tambah_barang_keluar.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="barang">Pilih Barang:</label>
                        <select name="barang" id="selected_barang" class="form-control">
                            <?php foreach($data_stok_barang as $item): ?>
                                <option value="<?php echo $item['idbarang']; ?>" data-status="<?php echo $item['status']; ?>"><?php echo $item['namabarang']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="qty">Jumlah barang cm:</label>
                        <input type="number" name="qty" id="qty" placeholder="Jumlah barang cm" min="1" class="form-control" required />
                    </div>

                    <div class="form-group">
                        <label for="penerima">Penerima:</label>
                        <input type="text" name "penerima" id="penerima" placeholder="Penerima" class="form-control" required />
                    </div>

                    <div class="form-group">
                        <label for="foto">Unggah Foto:</label>
                        <input type="file" class="form-control-file" id="foto" name="foto_yang_mau_dicetak" required>
                    </div>
                </form>

                <div style="background-color: #FFCCCC; padding: 10px;" id="belum_terverifikasi_message">
                    <p style="color: red; font-weight: bold;">Maaf, Anda tidak dapat mencetak karena status belum terverifikasi.</p>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Cetak</button>
            </div>
        </div>
    </div>
</div>

<script>
    const selectedBarang = document.getElementById('selected_barang');
    const belumTerverifikasiMessage = document.getElementById('belum_terverifikasi_message');

    selectedBarang.addEventListener('change', () => {
        const selectedOption = selectedBarang.options[selectedBarang.selectedIndex];
        const status = selectedOption.getAttribute('data-status');

        if (status === 'belum_terverifikasi') {
            belumTerverifikasiMessage.style.display = 'block';
        } else {
            belumTerverifikasiMessage.style.display = 'none';
        }
    });
</script>
