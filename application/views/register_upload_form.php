<div style="margin-bottom:20px;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-info" role="alert">
					<div class="panel panel-default" style="color: #333;">
						<!-- <div class="panel-heading">Panel heading without title</div> -->
						<div class="panel-body" style="padding-top: 30px;">
							<div class="row">
								<div class="col-md-12">
									<img 
										src="<?php echo base_url('public/aru_logo_title.png') ?>" 
										class="img-responsive center-block"
										style="width:20%; height:auto;"
									/>
								</div>
								<div class="col-md-12">
								<h3 class="text-center" style="font-size:24px;">ใบสมัครทุนการศึกษา "ทุนคนละครึ่ง"</h3>
								<h4 class="text-center" style="font-size:20px;">มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา ประจำปีการศึกษา 2569</h4>
								<h4 class="text-center" style="font-size:18px;">ระหว่างวันที่ 6 มกราคม 2569 - 27 กุมภาพันธ์ 2569</h4>
								</div>
							</div>
							<style>
								label, p,
								.form-control {
									font-family: 'Sarabun', sans-serif;
									font-size: 15px;
									padding: 3px;
									font-weight: 400; /* หรือใช้ normal */
								}
							</style>						
							<div class="row" style="margin-top:30px;">
								<div class="col-md-12 text-center">
									<h2 class="text-danger" style="font-family: 'Sarabun', sans-serif;font-size:24px;padding:6px;margin-bottom:20px; text-success">
										ข้อมูลผู้สมัคร: <?= $applicant->full_name; ?>
									</h2>
								</div>
								<div class="col-md-12">
									<?php if (validation_errors()): ?>
									<div class="alert alert-danger" style="font-family: 'Sarabun', sans-serif;">
										<?php echo validation_errors(); ?>
									</div>
									<?php endif; ?>

									<?php if($this->session->flashdata('success')): ?>
										<div class="alert alert-success" style="font-family: 'Sarabun', sans-serif;">
											<?= $this->session->flashdata('success'); ?>
										</div>
									<?php endif; ?>

									<?php if($this->session->flashdata('error')): ?>
										<div class="alert alert-danger" style="font-family: 'Sarabun', sans-serif;">
											<?= $this->session->flashdata('error'); ?>
										</div>
									<?php endif; ?>
								</div>
								<form action="<?php echo site_url('member/upload'); ?>" method="post" enctype="multipart/form-data">
									<div class="col-md-12">
										<div class="alert alert-success" role="alert" style="font-family: 'Sarabun', sans-serif;font-size:16px;padding:6px;">เอกสารแนบท้าย</div>
									</div>
									<div class="col-md-12">
										<table class="table table-bordered">
											<thead>
												<tr class="text-center" style="font-family: 'Sarabun', sans-serif;font-size:16px;">
													<th style="width:10%;text-align:center;">ลำดับ</th>
													<th style="width:40%;text-align:center;">รายการเอกสาร</th>
													<th style="width:30%;text-align:center;">ไฟล์เอกสาร</th>
													<th style="width:20%;text-align:center;">แนบไฟล์เอกสาร</th>
												</tr>
											</thead>
											<style>
												.file-small {
													padding: 2px 6px !important;
													height: 28px !important;
													font-size: 13px !important;
													line-height: 20px !important;
												}
												.file-link {
													color: #007bff;
													text-decoration: none;			
												}
												.file-link:hover {
													color: #0056b3;
													text-decoration: none;
												}
											</style>
											<tbody style="font-family: 'Sarabun', sans-serif;font-size:15px;">
												<tr>
													<td class="text-center">1</td>
													<td>สำเนาบัตรประจำตัวประชาชน</td>
													<td>
														<?php if (!empty($applicant->file_cid)): ?>
															<a href="<?= base_url('uploads/applicant/'.$applicant->file_cid); ?>" target="_blank" class="file-link">
																ดูไฟล์
															</a>
														<?php else: ?>
															<span class="text-danger">ยังไม่อัปโหลด</span>
														<?php endif; ?>
													</td>
													<td><input type="file" name="file_cid" class="form-control file-small" style="width:100%;"></td>
												</tr>
												<tr>
													<td class="text-center">2</td>
													<td>สำเนาทะเบียนบ้าน</td>
													<td>
														<?php if (!empty($applicant->file_house)): ?>
															<a href="<?= base_url('uploads/applicant/'.$applicant->file_house); ?>" target="_blank" class="file-link">
																ดูไฟล์
															</a>
														<?php else: ?>
															<span class="text-danger">ยังไม่อัปโหลด</span>
														<?php endif; ?>
													</td>
													<td><input type="file" name="file_house" class="form-control file-small" style="width:100%;"></td>
												</tr>
												<tr>
													<td class="text-center">3</td>
													<td>สำเนาใบแสดงผลการเรียน (Transcript) 5 ภาคเรียน</td>
													<td>
														<?php if (!empty($applicant->file_transcript)): ?>
															<a href="<?= base_url('uploads/applicant/'.$applicant->file_transcript); ?>" target="_blank" class="file-link">
																ดูไฟล์
															</a>
														<?php else: ?>
															<span class="text-danger">ยังไม่อัปโหลด</span>
														<?php endif; ?>
													</td>
													<td><input type="file" name="file_transcript" class="form-control file-small" style="width:100%;"></td>
												</tr>
												<tr>
													<td class="text-center">4</td>
													<td>สำเนาเอกสาร Portfolio</td>
													<td>
														<?php if (!empty($applicant->file_portfolio)): ?>
															<a href="<?= base_url('uploads/applicant/'.$applicant->file_portfolio); ?>" target="_blank" class="file-link">
																ดูไฟล์
															</a>
														<?php else: ?>
															<span class="text-danger">ยังไม่อัปโหลด</span>
														<?php endif; ?>
													</td>
													<td><input type="file" name="file_portfolio" class="form-control file-small" style="width:100%;"></td>
												</tr>
											</tbody>
										</table>
									</div>			
									<div class="col-md-12 text-center">
										<input type="text" name="id" value="<?= $applicant->id; ?>" hidden>
										<input type="text" name="goto_pages" value="welcome/register_upload_form" hidden>
										<button type="submit" class="btn btn-primary" style="font-family: 'Sarabun', sans-serif;font-size:16px;padding:6px 20px;">อัปโหลด</button>
									</div>
								</form>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div style="margin-bottom:20px;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-warning text-center" role="alert">
					<p class="text-danger" style="font-family: 'Sarabun', sans-serif;font-size:16px;margin-bottom:10px;">ข้อมูลและเอกสารครบถ้วนแล้ว</p>
					<a href="<?= base_url(); ?>" class="btn btn-warning" aria-label="Left Align">กลับหน้าหลัก</a>
				</div>
			</div>
		</div>
	</div>
</div>
