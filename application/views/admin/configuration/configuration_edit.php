<!-- form start -->
<form role="form" action="<?php echo base_url() ?>admin/configuration/saveOrUpdate/" method="post" name="form-view"
      enctype="multipart/form-data">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="text-muted bootstrap-admin-box-title">Cấu hình website
                </div>
            </div>
            <div class="bootstrap-admin-panel-content">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tiêu đề</label>
                            <input type="text" value="<?php echo @$list->title ?>" class="form-control"
                                   placeholder="Tiêu đề" name="title" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mã cấu hình</label> <input disabled type="text"
                                                                                       value="<?php echo @$list->code ?>"
                                                                                       class="form-control"
                                                                                       placeholder="Mã cấu hình"
                                                                                       name="code">

                        </div>
                        <div class="form-group">
                            <label>Giá trị</label>
                            <textarea class="form-control" name="value" rows="7"
                                      placeholder="Nhập giá trị ..."><?php echo @$list->value; ?></textarea>
                        </div>


                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>&nbsp;&nbsp;
                        <button type="button" class="btn btn-danger"
                                onclick="location.href='<?php echo base_url() ?>admin/configuration/view'">Hủy
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="id" value="<?php echo (@$list->id == null) ? 0 : @$list->id ?>" id="avatar_images"/>
    <input type="hidden" name="ids" value=""/>
</form>
<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>assets/admin/js/bootstrap.min.js" type="text/javascript"></script>
<!-- DATA TABES SCRIPT -->
<script src="<?php echo base_url(); ?>assets/admin/js/plugins/datatables/jquery.dataTables.js"
        type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/plugins/datatables/dataTables.bootstrap.js"
        type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/admin/js/AdminLTE/app.js" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/admin/js/AdminLTE/demo.js" type="text/javascript"></script>