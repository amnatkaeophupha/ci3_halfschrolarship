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
								<?php $this->load->view('title_head_layout'); ?>
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
						<div class="row" style="margin-top:50px;">
							<div class="col-md-12">
								<?php if (validation_errors()): ?>
								<div class="alert alert-danger">
									<?php echo validation_errors(); ?>
								</div>
								<?php endif; ?>

								<?php if($this->session->flashdata('success')): ?>
									<div class="alert alert-success">
										<?= $this->session->flashdata('success'); ?>
									</div>
								<?php endif; ?>

								<?php if($this->session->flashdata('error')): ?>
									<div class="alert alert-danger">
										<?= $this->session->flashdata('error'); ?>
									</div>
								<?php endif; ?>
							</div>
						<form action="<?php echo base_url('index.php/welcome/submit_registration'); ?>" method="post" enctype="multipart/form-data">
							
							<div class="col-md-6">
								<div class="form-group">
									<label>สมัครจากโรงเรียน/สถาบันเครือข่าย</label><span style="color:red;">*</span>
									<input type="text" name="school_name" class="form-control" style="width:100%;" placeholder="บังคับกรอก">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group"><label>จังหวัด</label>
									<select name="school_province" class="form-control">
										<option value="">-- เลือกจังหวัด --</option>
										<?php if (!empty($provinces)): ?>
											<?php foreach($provinces as $p): ?>
												<option value="<?= $p->province_code; ?>">
													<?= $p->province_name_th; ?>
												</option>
											<?php endforeach; ?>
										<?php endif; ?>
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="alert alert-success" role="alert" style="font-family: 'Sarabun', sans-serif;font-size:16px;padding:6px;">ข้อมูลส่วนตัว</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>ชื่อ นาย/นาง/นางสาว</label><span style="color:red;">*</span>
									<input type="text" name="full_name" class="form-control" style="width:100%;" placeholder="บังคับกรอก">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>วัน/เดือน/ปีเกิด</label><span style="color:red;">* บังคับกรอก</span>
									<div class="row">
										<div class="col-xs-4">
											<?php 
												echo form_dropdown(
													'birth_day',
													$day_options,
													set_value('birth_day'),
													'class="form-control"'
												);
											?>
										</div>
										<div class="col-xs-4">
											<?php 
												echo form_dropdown(
													'birth_month',
													$month_options,
													set_value('birth_month'),
													'class="form-control"'
												);
											?>
										</div>
										<div class="col-xs-4">
											<?php 
												echo form_dropdown(
													'birth_year',
													$year_options,
													set_value('birth_year'),
													'class="form-control"'
												);
											?>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>เลขประจำตัวประชาชน</label><span style="color:red;">*</span>
									<input type="text" name="cid" class="form-control" style="width:100%;" placeholder="บังคับกรอกเลข 13 หลัก">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>เชื้อชาติ</label><span style="color:red;">*</span>
									<input type="text" name="ethnicity" class="form-control" style="width:100%;" placeholder="บังคับกรอก">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>สัญชาติ</label><span style="color:red;">*</span>
									<input type="text" name="nationality" class="form-control" style="width:100%;" placeholder="บังคับกรอก">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>ศาสนา</label><span style="color:red;">*</span>
									<input type="text" name="religion" class="form-control" style="width:100%;" placeholder="บังคับกรอก">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group"><label>ที่อยู่ตามทะเบียนบ้าน เลขที่</label><input type="text" name="address_number" class="form-control" style="width:100%;"></div>
							</div>
							<div class="col-md-2">
								<div class="form-group"><label>หมู่ที่</label><input type="text" name="address_moo" class="form-control" style="width:100%;"></div>
							</div>
							<div class="col-md-2">
								<div class="form-group"><label>ซอย</label><input type="text" name="address_soi" class="form-control" style="width:100%;"></div>
							</div>
							<div class="col-md-2">
								<div class="form-group"><label>ถนน</label><input type="text" name="address_road" class="form-control" style="width:100%;"></div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>จังหวัด</label><span style="color:red;">*</span>
									<select name="address_province" id="address_province" class="form-control">
										<option value="">-- เลือกจังหวัด --</option>
										<?php if (!empty($provinces)): ?>
											<?php foreach($provinces as $p): ?>
												<option value="<?= $p->province_code; ?>">
													<?= $p->province_name_th; ?>
												</option>
											<?php endforeach; ?>
										<?php endif; ?>
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>อำเภอ/เขต</label><span style="color:red;">*</span>
									<select name="address_district" id="address_amphoe" class="form-control">
										<option value="">-- เลือกอำเภอ/เขต --</option>
									</select>
								</div>
							</div>														
							<div class="col-md-3">
								<div class="form-group">
									<label>ตำบล/แขวง</label><span style="color:red;">*</span>
									<select name="address_subdistrict" id="address_district" class="form-control">
										<option value="">-- เลือกตำบล/แขวง --</option>
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group"><span style="color:red;">*</span>
									<label>รหัสไปรษณีย์</label>
									<input type="text" name="address_zipcode" id="address_zipcode"
										class="form-control" style="width:100%;" readonly>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>เบอร์โทรศัพท์</label><span style="color:red;">*</span>
									<input type="text" name="phone" class="form-control" style="width:100%;" placeholder="บังคับกรอก">
								</div>
							</div>
							<div class="col-md-12">
								<div class="alert alert-danger" role="alert" style="font-family: 'Sarabun', sans-serif;font-size:16px;padding:6px;">ข้อมูลการศึกษาปัจุบัน</div>
							</div>
							<div class="col-md-12">
								<div class="form-group"><label>ระดับการศึกษาปัจจุบัน : </label><span style="color:red;">*</span>
									<label class="radio-inline">
									<input type="radio" name="education_level" value="มัธยมศึกษาตอนปลาย">มัธยมศึกษาตอนปลาย
									</label>
									<label class="radio-inline">
									<input type="radio" name="education_level" value="ประกาศนียบัตรวิชาชีพ (ปวช.)"> ประกาศนียบัตรวิชาชีพ (ปวช.)
									</label>
									<label class="radio-inline">
									<input type="radio" name="education_level" value="ประกาศนียบัตรวิชาชีพชั้นสูง (ปวส.)"> ประกาศนียบัตรวิชาชีพชั้นสูง (ปวส.)
									</label>							
								</div>
							</div>
							<div class="col-md-12 form-inline" style="margin-bottom:20px;">
								<label>ผลการเรียนสะสม 5 ภาคเรียน</label><span style="color:red;">*</span>
								<div class="form-group">
									<input type="text" name="gpa" class="form-control" style="width:100%;" placeholder="บังคับกรอก เช่น 3.25">
								</div>
							</div>
							<div class="col-md-12">
								<div class="alert alert-success" role="alert" style="font-family: 'Sarabun', sans-serif;font-size:16px;padding:6px;">ข้อมูลการสมัคร</div>
							</div>
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-12">
										<p>สาขาวิชาที่ต้องการสมัครขอรับทุนการศึกษา "ทุนคนละครึ่ง" สามารถเลือกได้เพียงสาขาวิชาเดียวเท่านั้น</p>
									</div>
									<div class="col-md-12">
										<?php $program = $this->db->query('SELECT * FROM program'); ?>
										<div class="form-group"><label>เลือกสาขา</label><span style="color:red;">*</span>
										<select name="pro_id" id="pro_id" class="form-control">
											<option value="">-- เลือกสาขา --</option>
											<?php foreach ($program->result()  as $pro): ?>
											<option value="<?= $pro->pro_id ?>">สาขา<?= $pro->pro_name ?></option>
											<?php endforeach; ?>
										</select>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="alert alert-warning" role="alert" style="font-family: 'Sarabun', sans-serif;font-size:16px;padding:6px;">ข้อมูลเพิ่มเติมเพื่อพิจารณา</div>
							</div>
							<div class="col-md-12" style="margin-bottom:20px;">
								<div class="row">
									<div class="col-md-4">
										<label>เป็นผู้ขาดแคลนทุนทรัพย์ มีรายได้ครอบครัว </label>
										<div class="form-group"><input type="text" name="family_income" class="form-control" placeholder="ระบุเป็นตัวเลข บาท/ปี" style="width:100%;"></div>
									</div>										
									<div class="col-md-4">
										<label>เป็นผู้มีความสามารถพิเศษ ระบุ</label>
										<div class="form-group"><input type="text" name="special_ability" class="form-control" style="width:100%;"></div>
									</div>
									<div class="col-md-4">
										<label>มีผลงานเป็นที่ประจักษ์ คือ</label>
										<div class="form-group"><input type="text" name="achievements" class="form-control" style="width:100%;"></div>
									</div>
								</div>
							</div>
							<div class="col-md-12" style="margin-bottom:30px;">
								<p style="text-indent: 30px">ข้าพเจ้าขอรับรองข้อมูลข้างต้นดังนี้ เป็นความจริงทุกประการ หากมีข้อมูลอันเป็นเท็จ ข้าพเจ้ายินยอมให้ตัดสิทธิ์การสมัครทุน สถาบันเครือข่ายมหาวิทยาลัยราชภัฏพระนครศรีอยุธยา ปีการศึกษา 2568 ทันที</p>
							</div>	
							<div class="col-md-12 text-center">
								<button type="submit" class="btn btn-primary" style="font-family: 'Sarabun', sans-serif;font-size:16px;padding:6px 20px;">ต่อไป</button>
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
