<div role="main" class="main" id="page_status_membership">
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo $this->config->item('link_index'); ?>" class="a-default">Home</a></li>
                        <li class="active">Status Membership</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h1>Status Membership</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
		<h2>Informasi sementara status membership</h2>
		<div class="row">
			<div class="col-md-12">
				<ol class="list list-ordened list-ordened-style-2">
					<li>Data yang tertera disini adalah nama-nama yang sudah mendaftar dan paketnya belum dikirim.</li>
					<li>Data ini hanya bersifat sementara. Data akan hilang dari website ketika paket sudah dikirim.</li>
					<li>Keterangan status:</li>
				</ol>
				<ul class="list-unstyled" style="margin-left: 75px;">
					<li><strong>Awaiting Review</strong>: Data kalian belum di validasi oleh crew. Mohon kesabarannya dalam menunggu email dari crew.<br></li>
					<li><strong>Awaiting Transfer</strong>: Data kalian sudah valid. Silahkan cek email kalian untuk melihat informasi selanjutnya.<br></li>
					<li><strong>Invalid</strong>: Data kalian invalid atau terdapat kesalahan dalam mendaftar. Silahkan cek email kalian untuk melihat informasi selanjutnya.<br></li>
					<li><strong>Awaiting Approval</strong>: Data konfirmasi pembayaran kalian sudah diterima. Mohon kesabarannya dalam menunggu balasan dari crew.<br></li>
				</ul>
			</div>
		</div>
		<hr class="tall">
		<div class="row">
			<div class="col-md-12">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Nama</th>
							<th>Email</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
						foreach ($result as $row) { ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo ucwords($row->name); ?></td>
							<td><?php echo $row->email; ?></td>
							<td><?php echo $code_member_status[$row->status]; ?></td>
						</tr>
						<?php
						$i++;
						} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>