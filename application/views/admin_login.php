<div class="container" style="margin-top:70px; margin-bottom: 70px; max-width: 500px;">
    <div class="panel panel-default">
        <div class="panel-heading text-center">
            <h4 style="font-family:'Sarabun', sans-serif;">เข้าสู่ระบบผู้ดูแลทุนการศึกษา</h4>
        </div>
        <div class="panel-body">
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success">
                    <?= $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>

            <?php echo form_open('admin/do_login'); ?>

                <div class="form-group" style="font-family:'Sarabun', sans-serif;">
                    <label for="username">ชื่อผู้ใช้</label>
                    <input type="text" name="username" class="form-control"
                           value="<?= set_value('username'); ?>">
                    <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                </div>

                <div class="form-group" style="font-family:'Sarabun', sans-serif;">
                    <label for="password">รหัสผ่าน</label>
                    <input type="password" name="password" class="form-control">
                    <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                </div>

                <button type="submit" class="btn btn-primary btn-block" 
                        style="font-family:'Sarabun', sans-serif;">
                    เข้าสู่ระบบ
                </button>

            <?php echo form_close(); ?>
        </div>
    </div>
</div>
