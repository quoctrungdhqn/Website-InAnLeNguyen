<?php
date_default_timezone_set("Asia/Bangkok");
$CI =& get_instance();
$userlog = $CI->session->userdata('userLogged');
?>
<?php $count = 1; ?>
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="text-muted bootstrap-admin-box-title">
                <?php echo $pageTitle; ?>

                <?php if ($userlog->role == '777'): ?>
                    <a href="<?php echo base_url() ?>admin/user/edit" title="Thêm mới thành viên"
                       class="btn btn-default"><i class="glyphicon glyphicon-plus"></i> Thêm
                        mới</a>
                <?php endif; ?>
            </div>
        </div>
        <div class="bootstrap-admin-panel-content">
            <table class="table table-striped table-bordered" id="example">
                <thead>
                <tr>
                    <th>Thứ tự</th>
                    <th>Tên đăng nhập</th>
                    <th>Họ tên</th>
                    <th>Nhóm</th>
                    <th>Ngày tạo</th>
                    <th>Hiển thị</th>
                    <th>Tác vụ</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($list as $user): ?>
                    <tr class="odd gradeX">
                        <td><?php echo $count; ?></td>
                        <td>
                            <a href="<?php echo base_url() ?>admin/user/edit/<?php echo $user->id; ?>"><?php echo $user->username; ?></a>
                        </td>
                        <td><?php echo $user->firstname . ' ' . $user->lastname ?></td>
                        <td>
                                    <span class="<?php if ($user->role == '777') echo 'label label-danger';
                                    else if ($user->role == '755') echo 'label label-warning';
                                    else if ($user->role == '644') echo 'label label-info';
                                    else if ($user->role == '444') echo 'label label-success'; ?>"><?php echo $user->groupName; ?></span>
                        </td>
                        <td><?php echo date("d/m/Y", strtotime($user->createdDate)); ?></td>
                        <td>
                            <?php
                            if ($user->state == '1') {
                                echo "<a class='btn btn-success'><i class='glyphicon glyphicon-ok'></i> Bật</a>";
                            } else {
                                echo "<a class='btn btn-warning'><i class='glyphicon glyphicon-off'></i> Tắt</a>";
                            }
                            ?>
                        </td>
                        <td class="actions">
                            <a class="btn btn-sm btn-primary"
                               href="<?php echo base_url() ?>admin/user/edit/<?php echo $user->id; ?>">
                                <i class="glyphicon glyphicon-pencil"></i>
                                Sửa
                            </a>

                            <a class="btn btn-sm btn-danger" href="#">
                                <i class="glyphicon glyphicon-trash"></i>
                                Xóa
                            </a>
                        </td>
                    </tr>
                    <?php $count++; endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>templates/admin/js/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>templates/admin/js/bootstrap.min.js">
</script>
<script type="text/javascript"
        src="<?php echo base_url(); ?>templates/admin/js/twitter-bootstrap-hover-dropdown.min.js">
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>templates/admin/js/bootstrap-admin-theme-change-size.js">
</script>
<script type="text/javascript"
        src="<?php echo base_url(); ?>templates/admin/vendors/datatables/js/jquery.dataTables.min.js">
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>templates/admin/js/DT_bootstrap.js">
</script>
