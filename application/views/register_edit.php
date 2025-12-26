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
							<form action="<?php echo base_url('index.php/member/update_member'); ?>" method="post" enctype="multipart/form-data">
								<input type="text" name="id" value="<?= $applicant->id; ?>" hidden>
								<div class="col-md-6">
									<div class="form-group"><label>สมัครจากโรงเรียน/สถาบันเครือข่าย</label><input type="text" name="school_name" value="<?= $applicant->school_name; ?>" class="form-control" style="width:100%;"></div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>จังหวัด</label>
										<select name="school_province" class="form-control">
										<option value="">-- เลือกจังหวัด --</option>
										<?php if (!empty($provinces)): ?>
											<?php 
												$school_province_selected = set_value('school_province', $applicant->school_province);
												foreach($provinces as $p): 
											?>
												<option value="<?= $p->province_code; ?>"
													<?= ($p->province_code == $school_province_selected) ? 'selected' : ''; ?>>
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
										<label>ชื่อ นาย/นาง/นางสาว</label>
										<input type="text" name="full_name" value="<?= set_value('full_name', $applicant->full_name); ?>" class="form-control" style="width:100%;">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>วัน/เดือน/ปีเกิด</label>
										<div class="row">
											<div class="col-xs-4">
											<?php 
												echo form_dropdown(
													'birth_day',
													$day_options,
													set_value('birth_day', $applicant->birth_day),
													'class="form-control"'
												);
											?>
											</div>
											<div class="col-xs-4">
											<?php 
												echo form_dropdown(
													'birth_month',
													$month_options,
													set_value('birth_month', $applicant->birth_month),
													'class="form-control"'
												);
											?>
											</div>
											<div class="col-xs-4">
											<?php 
												echo form_dropdown(
													'birth_year',
													$year_options,
													set_value('birth_year', $applicant->birth_year),
													'class="form-control"'
												);
											?>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>เลขประจำตัวประชาชน</label>
										<input type="text" name="cid" value="<?= set_value('cid', $applicant->cid); ?>" class="form-control" style="width:100%;">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>เชื้อชาติ</label>
										<input type="text" name="ethnicity" value="<?= set_value('ethnicity', $applicant->ethnicity); ?>" class="form-control" style="width:100%;">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>สัญชาติ</label>
										<input type="text" name="nationality" value="<?= set_value('nationality', $applicant->nationality); ?>" class="form-control" style="width:100%;">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>ศาสนา</label>
										<input type="text" name="religion" value="<?= set_value('religion', $applicant->religion); ?>" class="form-control" style="width:100%;">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>ที่อยู่ตามทะเบียนบ้าน เลขที่</label>
										<input type="text" name="address_number" value="<?= set_value('address_number', $applicant->address_number); ?>" class="form-control" style="width:100%;" >
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group"><label>หมู่ที่</label><input type="text" name="address_moo" value="<?= set_value('address_moo', $applicant->address_moo); ?>" class="form-control" style="width:100%;"></div>
								</div>
								<div class="col-md-2">
									<div class="form-group"><label>ซอย</label><input type="text" name="address_soi" value="<?= set_value('address_soi', $applicant->address_soi); ?>" class="form-control" style="width:100%;"></div>
								</div>
								<div class="col-md-2">
									<div class="form-group"><label>ถนน</label><input type="text" name="address_road" value="<?= set_value('address_road', $applicant->address_road); ?>" class="form-control" style="width:100%;"></div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>จังหวัด</label>
										<select name="address_province" id="address_province" class="form-control">
										<option value="">-- เลือกจังหวัด --</option>
										<?php 
											$address_province_selected = set_value('address_province', $applicant->address_province);
											if (!empty($provinces)): 
												foreach($provinces as $p):
										?>
											<option value="<?= $p->province_code; ?>"
												<?= ($p->province_code == $address_province_selected) ? 'selected' : ''; ?>>
												<?= $p->province_name_th; ?>
											</option>
										<?php 
												endforeach;
											endif; 
										?>
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>อำเภอ/เขต</label>
										<select name="address_district" id="address_amphoe" class="form-control">
										<option value="">-- เลือกอำเภอ/เขต --</option>
										<?php 
											$address_amphoe_selected = set_value('address_district', $applicant->address_district);
											if (!empty($amphoes)):
												foreach($amphoes as $a):
										?>
											<option value="<?= $a->amphoe_code; ?>"
												<?= ($a->amphoe_code == $address_amphoe_selected) ? 'selected' : ''; ?>>
												<?= $a->amphoe_name_th; ?>
											</option>
										<?php
												endforeach;
											endif;
										?>
									</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>ตำบล/แขวง</label>
									<select name="address_subdistrict" id="address_district" class="form-control">
										<option value="">-- เลือกตำบล/แขวง --</option>
											<?php 
												$address_district_selected = set_value('address_subdistrict', $applicant->address_subdistrict);
												if (!empty($districts)):
													foreach($districts as $d):
											?>
												<option value="<?= $d->district_code; ?>"
													data-zip="<?= $d->zip_code; ?>"
													<?= ($d->district_code == $address_district_selected) ? 'selected' : ''; ?>>
													<?= $d->district_name_th; ?>
												</option>
											<?php
													endforeach;
												endif;
											?>
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>รหัสไปรษณีย์</label>
										<input type="text" name="address_zipcode" id="address_zipcode"
										class="form-control" style="width:100%;" readonly
										value="<?= set_value('address_zipcode', $applicant->address_zipcode); ?>">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>เบอร์โทรศัพท์</label>
										<input type="text" name="phone" value="<?= set_value('phone', $applicant->phone); ?>" class="form-control" style="width:100%;">
									</div>
								</div>
								<div class="col-md-12">
									<div class="alert alert-danger" role="alert" style="font-family: 'Sarabun', sans-serif;font-size:16px;padding:6px;">ข้อมูลการศึกษาปัจุบัน</div>
								</div>
								<div class="col-md-12">
									<div class="form-group"><label>ระดับการศึกษาปัจจุบัน : </label>
										<?php $edu = set_value('education_level', $applicant->education_level); ?>
										<label class="radio-inline">
										<input type="radio" name="education_level" value="มัธยมศึกษาตอนปลาย" <?= ($edu == 'มัธยมศึกษาตอนปลาย') ? 'checked' : ''; ?>>มัธยมศึกษาตอนปลาย
										</label>
										<label class="radio-inline">
										<input type="radio" name="education_level" value="ประกาศนียบัตรวิชาชีพ (ปวช.)" <?= ($edu == "ประกาศนียบัตรวิชาชีพ (ปวช.)") ? 'checked' : '' ?>> ประกาศนียบัตรวิชาชีพ (ปวช.)
										</label>
										<label class="radio-inline">
										<input type="radio" name="education_level" value="ประกาศนียบัตรวิชาชีพชั้นสูง (ปวส.)" <?= ($edu == "ประกาศนียบัตรวิชาชีพชั้นสูง (ปวส.)") ? 'checked' : '' ?>> ประกาศนียบัตรวิชาชีพชั้นสูง (ปวส.)
										</label>							
									</div>
								</div>
								<div class="col-md-12 form-inline" style="margin-bottom:20px;">
									<label>ผลการเรียนสะสม 5 ภาคเรียน</label>
									<div class="form-group"><input type="text" name="gpa" value="<?= set_value('gpa', $applicant->gpa); ?>" class="form-control" style="width:100%;"></div>
								</div>
								<div class="col-md-12">
									<div class="alert alert-info" role="alert" style="font-family: 'Sarabun', sans-serif;font-size:16px;padding:6px;">ข้อมูลการสมัคร</div>
								</div>
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-12">
										<p>สาขาวิชาที่สมัคร “ทุนคนละครึ่ง” (เลือกได้เพียงสาขาเดียว)</p>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label>เลือกสาขา</label>
											<select name="pro_id" id="pro_id" class="form-control">
												<option value="">-- เลือกสาขา --</option>
												<?php 
													$pro_selected = set_value('pro_id', $applicant->pro_id);
													foreach ($program->result() as $pro): 
												?>
													<option value="<?= $pro->pro_id; ?>"
														<?= ($pro->pro_id == $pro_selected) ? 'selected' : ''; ?>>
														สาขา<?= $pro->pro_name; ?>
													</option>
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
											<div class="form-group"><input type="text" name="family_income" value="<?= set_value('family_income', $applicant->family_income); ?>" class="form-control" placeholder="ระบุเป็นตัวเลข บาท/ปี" style="width:100%;"></div>
										</div>										
										<div class="col-md-4">
											<label>เป็นผู้มีความสามารถพิเศษ ระบุ</label>
											<div class="form-group"><input type="text" name="special_ability" value="<?= set_value('special_ability', $applicant->special_ability); ?>" class="form-control" style="width:100%;"></div>
										</div>
										<div class="col-md-4">
											<label>มีผลงานเป็นที่ประจักษ์ คือ</label>
											<div class="form-group"><input type="text" name="achievements" value="<?= set_value('achievements', $applicant->achievements); ?>" class="form-control" style="width:100%;"></div>
										</div>
									</div>
								</div>
								<div class="col-md-12" style="margin-bottom:30px;">
									<p style="text-indent: 30px">
										ข้าพเจ้าขอรับรองว่าข้อมูลที่แก้ไขข้างต้นเป็นความจริงทุกประการ หากมีข้อมูลอันเป็นเท็จ ข้าพเจ้ายินยอมให้ตัดสิทธิ์การสมัครทุนทันที
									</p>
								</div>

								<div class="col-md-12 text-center">
									<button type="submit" class="btn btn-primary" style="font-family: 'Sarabun', sans-serif;font-size:16px;padding:6px 20px;">
										บันทึกการแก้ไข
									</button>
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
<!-- JS ดึงอำเภอ / ตำบล / Zip เหมือนฟอร์มสมัคร -->
<script type="text/javascript">
$(document).ready(function(){

	// เมื่อเลือกจังหวัด
	$('#address_province').on('change', function(){
		var province_code = $(this).val();

		$('#address_amphoe').html('<option value="">-- เลือกอำเภอ/เขต --</option>');
		$('#address_district').html('<option value="">-- เลือกตำบล/แขวง --</option>');
		$('#address_zipcode').val('');

		if(province_code !== ''){
			$.ajax({
				url: '<?= site_url("welcome/get_amphoe"); ?>',
				type: 'POST',
				dataType: 'json',
				data: {province_code: province_code},
				success: function(response){
					var options = '<option value="">-- เลือกอำเภอ/เขต --</option>';
					$.each(response, function(index, item){
						options += '<option value="'+ item.amphoe_code +'">'+ item.amphoe_name_th +'</option>';
					});
					$('#address_amphoe').html(options);
				},
				error: function(){
					alert('ไม่สามารถดึงข้อมูลอำเภอได้');
				}
			});
		}
	});

	// เมื่อเลือกอำเภอ
	$('#address_amphoe').on('change', function(){
		var amphoe_code = $(this).val();

		$('#address_district').html('<option value="">-- เลือกตำบล/แขวง --</option>');
		$('#address_zipcode').val('');

		if(amphoe_code !== ''){
			$.ajax({
				url: '<?= site_url("welcome/get_district"); ?>',
				type: 'POST',
				dataType: 'json',
				data: {amphoe_code: amphoe_code},
				success: function(response){
					var options = '<option value="">-- เลือกตำบล/แขวง --</option>';
					$.each(response, function(index, item){
						options += '<option value="'+ item.district_code +'" data-zip="'+ item.zip_code +'">'+ item.district_name_th +'</option>';
					});
					$('#address_district').html(options);
				},
				error: function(){
					alert('ไม่สามารถดึงข้อมูลตำบลได้');
				}
			});
		}
	});

	// เมื่อเลือกตำบล → ใส่ Zip
	$('#address_district').on('change', function(){
		var zip = $('#address_district option:selected').data('zip');
		$('#address_zipcode').val(zip ? zip : '');
	});

});
</script>

/* มีปัญหา up แก้ไขไม่ได้ */
<?php include_once 'layout_upload.php'; ?>

