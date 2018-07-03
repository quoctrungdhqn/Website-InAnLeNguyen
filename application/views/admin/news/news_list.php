<?php
date_default_timezone_set("Asia/Bangkok");
?>
<?php $count = 1; ?>
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="text-muted bootstrap-admin-box-title">
                <?php echo $page_title; ?>
                <a href="<?php echo base_url() ?>admin/news/edit" title="Thêm mới bài viết" class="btn btn-default"><i
                            class="glyphicon glyphicon-plus"></i> Thêm mới</a>
            </div>
        </div>
        <?php echo $this->session->flashdata('message'); ?>
        <div class="bootstrap-admin-panel-content">
            <table class="table table-striped table-bordered" id="example">
                <thead>
                <tr>
                    <th>Thứ tự</th>
                    <th>Tên bài viết</th>
                    <th>Hình ảnh</th>
                    <th>Ngày đăng</th>
                    <th>Bật/Tắt</th>
                    <th>Tác vụ</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($list as $items): ?>
                    <tr class="odd gradeX">
                        <td><?php echo $count; ?></td>
                        <td width="30%">
                            <a href="<?php echo base_url() ?>admin/news/edit/<?php echo $items->id ?>"><?php echo $items->title; ?></a>
                        </td>
                        <td>
                            <?php
                            if (@$items->images != '') {
                                $img = explode(',', $items->images);

                                ?>
                                <img width="150" height="100"
                                     src="<?php echo base_url(); ?>uploads/news/<?php echo $img[0]; ?>"/>
                            <?php } else {
                                ?>
                                <img width="150" height="100"
                                     src="<?php echo base_url(); ?>uploads/no_image.jpg"/>
                            <?php } ?>
                        </td>
                        <td><?php echo date("d/m/Y", strtotime($items->created)); ?></td>
                        <td>
                            <?php
                            if ($items->published == '1') {
                                echo "<a class='btn btn-success'><i class='glyphicon glyphicon-ok'></i> Bật</a>";
                            } else {
                                echo "<a class='btn btn-warning'><i class='glyphicon glyphicon-off'></i> Tắt</a>";
                            }
                            ?>
                        </td>
                        <td class="actions">
                            <a class="btn btn-sm btn-primary"
                               href="<?php echo base_url() ?>admin/news/edit/<?php echo $items->id; ?>">
                                <i class="glyphicon glyphicon-pencil"></i>
                                Sửa
                            </a>

                            <a class="btn btn-sm btn-danger"
                               href="<?php echo base_url() ?>admin/news/delete/<?php echo $items->id; ?>">
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
<script type="text/javascript">
    $(function () {
        $(".alert-success").fadeTo(2000, 500).slideUp(500, function () {
            $(".alert-success").alert('close');
        });
    });
</script>