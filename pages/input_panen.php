<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar_petani.php'; ?>

<div class="main-content">
    <h2>Form Input Data Panen</h2>
    <form method="POST" action="proses_input_panen.php" enctype="multipart/form-data">
        <label>Tanggal Panen:</label>
        <input type="date" name="tanggal" required>

        <label>Jumlah (kg):</label>
        <input type="number" name="jumlah" required>

        <label>Kualitas Garam:</label>
        <select name="kualitas">
            <option>A</option>
            <option>B</option>
            <option>C</option>
        </select>

        <label>Upload Dokumen Pendukung:</label>
        <input type="file" name="dokumen">

        <button type="submit">Ajukan Penawaran</button>
    </form>
</div>

<?php include '../includes/footer.php'; ?>