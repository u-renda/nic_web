<div id="member_shop_page" class="tab-pane">
    <div class="alert alert-info">Daftar pembelian barang merchandise NIC.</div>
    <div class="panel-group panel-group-sm" id="accordion4">
        <?php
        foreach ($order as $row) { ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion4" href="#collapse4<?php echo $row->no; ?>">
                        <?php echo '#'.$row->id_order.' - '.$row->status; ?>
                    </a>
                </h4>
            </div>
            <div id="collapse4<?php echo $row->no; ?>" class="accordion-body collapse">
                <div class="panel-body">
                    <form class="form-horizontal">
                        <div class="form-group marginbottom0">
                            <label class="col-md-3 control-label fontbold">Tanggal Pemesanan</label>
                            <div class="col-md-3">
                                <p class="form-control-static"><?php echo $row->created_date; ?></p>
                            </div>
                            <label class="col-md-3 control-label fontbold">Harga Barang</label>
                            <div class="col-md-3">
                                <p class="form-control-static"><?php echo 'Rp ' . number_format($row->total_product, 0, ',', '.'); ?></p>
                            </div>
                        </div>
                        <div class="form-group marginbottom0">
                            <label class="col-md-3 control-label fontbold">Resi</label>
                            <div class="col-md-3">
                                <p class="form-control-static"><?php echo $row->resi; ?></p>
                            </div>
                            <label class="col-md-3 control-label fontbold">Ongkos Kirim</label>
                            <div class="col-md-3">
                                <p class="form-control-static"><?php echo 'Rp ' . number_format($row->shipment_total, 0, ',', '.'); ?></p>
                            </div>
                        </div>
                        <div class="form-group marginbottom0">
                            <label class="col-md-3 col-md-offset-6 control-label fontbold">Kode Unik</label>
                            <div class="col-md-3">
                                <p class="form-control-static"><?php echo 'Rp ' . number_format($row->unique_trf, 0, ',', '.'); ?></p>
                            </div>
                        </div>
                        <div class="form-group marginbottom0">
                            <label class="col-md-3 col-md-offset-6 control-label fontbold">Total Pembayaran</label>
                            <div class="col-md-3">
                                <p class="form-control-static fontbold"><?php echo 'Rp ' . number_format($row->total, 0, ',', '.'); ?></p>
                            </div>
                        </div>
                        <div class="form-group marginbottom0">
                            <label class="col-md-3 control-label fontbold">Alamat Tujuan</label>
                            <div class="col-md-9">
                                <p class="form-control-static"><?php echo ucwords($this->session->userdata('name')); ?></p>
                                <p class="form-control-static"><?php echo $row->shipment_address; ?></p>
                            </div>
                        </div>
                    </form>
                    <hr class="tall">
                    <h5>Daftar Produk:</h5>
                    <?php foreach ($row->product as $row2) { ?>
                    <div class="row mb-sm">
                        <div class="col-md-1">
                            <img src="<?php echo $row2['product_image']; ?>" alt="<?php echo $row2['product_name']; ?>" class="img-responsive">
                        </div>
                        <div class="col-md-8">
                            <a href="<?php echo $this->config->item('link_shop_detail').'/'.$row2['product_slug']; ?>"><?php echo $row2['product_name']; ?></a>
                        </div>
                        <div class="col-md-3">
                            Jumlah: <?php echo $row2['product_quantity']; ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>