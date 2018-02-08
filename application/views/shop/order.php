<div role="main" class="main" id="order_page">
    <div class="container margintop15">
		<h2>Order <strong>Berhasil</strong></h2>
		<div class="row">
			<div class="col-md-12">
				<p class="lead">
					<h4>Terima kasih sudah melakukan pemesanan merchandise di NEZindaCLUB.</h4><br />
				</p>
				<div class="featured-boxes">
					<div class="row">
						<div class="col-md-12">
							<div class="featured-box featured-box-primary align-left mt-none">
								<div class="box-content">
									<h4 class="heading-primary text-uppercase mb-md">Rincian Pesanan</h4>
									<table class="table table-hover">
                                        <tbody>
                                            <tr>
                                                <td><strong>Order ID</strong></td>
                                                <td><?php echo '#'.$id_order; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Total Pembelian</strong></td>
                                                <td><?php echo 'Rp '.number_format($cart_total->total,0,',','.'); ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <hr class="tall">
									<h4 class="heading-primary text-uppercase mb-md">Informasi Transfer</h4>
                                    Silahkan transfer dengan jumlah di atas dan cantumkan order ID di bagian catatan transfer.<br /><br />
									<strong>Rekening Bank BCA:<br />
                                    No Rek : 650.013.349.8<br />
                                    A/N : Theresia Sisca Parmenas</strong>
									<hr class="tall">
									<span class="fontblue">* Semua info order akan ada di bagian profile dan di email Anda</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>