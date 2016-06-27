<select class="form-control" title="Mohon pilih salah satu." name="id_kota" id="id-kota" required>
    <option value="">-- Kota --</option>
    <?php
    foreach ($kota_lists as $row)
    {
        echo '<option value="'.$row->id_kota.'">'.$row->kota.'</option>';
    }
    ?>
</select>