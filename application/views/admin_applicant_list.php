<div class="container" style="margin-top:30px; margin-bottom: 30px;">
    <div class="row">
        <div class="col-md-12">

            <div class="clearfix" style="margin-bottom:15px;">
                <div class="pull-left">
                    <h4 style="font-family:'Sarabun', sans-serif;">รายชื่อผู้สมัครทุนการศึกษา</h4>
                    <p style="font-family:'Sarabun', sans-serif;">
                        ผู้ดูแลระบบ: <?= $this->session->userdata('admin_name'); ?>
                    </p>
                </div>
                <div class="pull-right">
                    <a href="<?php echo site_url('admin/logout'); ?>" class="btn btn-danger"
                       style="font-family:'Sarabun', sans-serif;">
                        ออกจากระบบ
                    </a>
                </div>
            </div>

            <table class="table table-bordered" style="font-family:'Sarabun', sans-serif;font-size:15px;">
                <thead>
                    <tr class="info">
                        <th width="5%">ลำดับ</th>
                        <th width="20%">ชื่อ - นามสกุล</th>
                        <th width="32%">สาขาวิชา</th>
                        <th width="15%">สถานะเอกสาร</th>
                        <th width="17%">เอกสาร</th>
                        <th width="10%">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($applicants)): ?>
                        <?php $i=1; foreach($applicants as $row): ?>

                        <?php
                            // ตรวจเอกสาร
                            $has_cid        = !empty($row->file_cid);
                            $has_transcript = !empty($row->file_transcript);
                            $has_portfolio  = !empty($row->file_portfolio);
                            $uploaded_count = $has_cid + $has_transcript + $has_portfolio;

                            if ($uploaded_count == 0) {
                                $status = '<span class="text-danger">ยังไม่ส่งเอกสาร</span>';
                            } elseif ($uploaded_count == 3) {
                                $status = '<span class="text-success">ส่งเอกสารครบถ้วน</span>';
                            } else {
                                $status = '<span class="text-warning">เอกสารยังไม่ครบ ('.$uploaded_count.'/3)</span>';
                            }
                        ?>

                        <tr>
                            <td class="text-center"><?= $i++; ?></td>
                            <td><?= $row->full_name; ?></td>
                            <td>สาขา<?= $row->pro_name; ?></td>
                            <td><?= $status; ?></td>

                            <!-- คอลัมน์ดูเอกสาร -->
                            <td>
                                <!-- บัตรประชาชน -->
                                <div style="margin-bottom:5px;">
                                    <strong>บัตร ปชช.:</strong>
                                    <?php if($has_cid): ?>
                                        <a href="<?= base_url('uploads/applicant/'.$row->file_cid); ?>" 
                                           target="_blank" class="btn btn-xs btn-default">
                                            ดูไฟล์
                                        </a>
                                    <?php else: ?>
                                        <span class="text-danger">ยังไม่อัปโหลด</span>
                                    <?php endif; ?>
                                </div>

                                <!-- Transcript -->
                                <div style="margin-bottom:5px;">
                                    <strong>Transcript:</strong>
                                    <?php if($has_transcript): ?>
                                        <a href="<?= base_url('uploads/applicant/'.$row->file_transcript); ?>" 
                                           target="_blank" class="btn btn-xs btn-default">
                                            ดูไฟล์
                                        </a>
                                    <?php else: ?>
                                        <span class="text-danger">ยังไม่อัปโหลด</span>
                                    <?php endif; ?>
                                </div>

                                <!-- Portfolio -->
                                <div>
                                    <strong>Portfolio:</strong>
                                    <?php if($has_portfolio): ?>
                                        <a href="<?= base_url('uploads/applicant/'.$row->file_portfolio); ?>" 
                                           target="_blank" class="btn btn-xs btn-default">
                                            ดูไฟล์
                                        </a>
                                    <?php else: ?>
                                        <span class="text-danger">ยังไม่อัปโหลด</span>
                                    <?php endif; ?>
                                </div>
                            </td>

                            <!-- จัดการ -->
                            <td class="text-center">
                                <a href="<?php echo site_url('member/view/'.$row->id); ?>" 
                                   class="btn btn-xs btn-info" style="margin-bottom:5px;">
                                    ดูรายละเอียด
                                </a>
                                <br>
                                <a href="<?php echo site_url('welcome/register_upload_form/'.$row->id); ?>" 
                                   class="btn btn-xs btn-warning">
                                    จัดการเอกสาร
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center text-danger">ยังไม่มีข้อมูลผู้สมัคร</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
