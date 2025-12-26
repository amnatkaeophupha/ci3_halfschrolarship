<!-- <div style="margin-bottom:20px;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<img src="<?php echo base_url('public'); ?>/poster.jpg" class="img-responsive" />
			</div>
		</div>
	</div>
</div> -->

<div style="margin-bottom:10px;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="jumbotron" style="font-family: 'Sarabun', sans-serif; font-weight: 400;">
				<h2>Hello, world!</h2>
				<p>...</p>
				<p><a class="btn btn-primary btn-lg" href="<?php echo base_url('index.php/welcome/register_form'); ?>" role="button">สมัครเรียน</a></p>
				</div>
			</div>
		</div>
	</div>
</div>

<style>
	.search-box {
		background: #ffffff;
		border: 1px solid #ddd;
		border-radius: 6px;
		padding: 20px;
		margin-top: 10px;
		font-family: 'Sarabun', sans-serif;
		font-size: 15px;
		font-weight: 400; /* หรือใช้ normal */
		box-shadow: 0 2px 4px rgba(0,0,0,0.1); /* เพิ่มเงาเบาๆ */
	}
</style>

<div style="margin-bottom:20px;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="search-box">
				<div class="alert alert-success" role="alert">
					<h4 class="alert-heading">ตรวจสอบข้อมูลผู้สมัคร</h4>
					<p>โปรดระบุเลขประจำตัวประชาชน 13 หลัก เพื่อค้นหาข้อมูลการสมัครทุน</p>
				</div>	
				<?php if($this->session->flashdata('error')): ?>
				<div class="alert alert-danger">
					<?= $this->session->flashdata('error'); ?>
				</div>
				<?php endif; ?>				
					<form class="form-horizontal" action="<?= base_url('index.php/member/search'); ?>" method="post">
						<div class="form-group">
							<label class="col-sm-3 control-label">เลขประจำตัวประชาชน</label>
							<div class="col-sm-6">
								<input type="text" name="cid" maxlength="13" class="form-control"
									placeholder="ตัวอย่าง: 1234567890123" required>
							</div>
							<div class="col-sm-3">
								<button type="submit" class="btn btn-success">
									<span class="glyphicon glyphicon-search"></span> ค้นหา
								</button>
							</div>
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>
</div>



<div style="margin-bottom:20px;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-success" role="alert">...</div>
				<div class="alert alert-info" role="alert">...</div>
				<div class="alert alert-warning" role="alert">...</div>
				<div class="alert alert-danger" role="alert">...</div>
			</div>
		</div>
	</div>
</div>
