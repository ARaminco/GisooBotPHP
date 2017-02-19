
<footer class="main-footer">
    <div class="center-block treeview" style="">

        <br>
        <?php
        $ad = ads(1);
        $ad_photo = $ad->photo;
        $ad_link = $ad->link;
        $ad_title = $ad->title;
        echo "<a href='$ad_link' target='_blank'><img src='$ad_photo' alt='$ad_title' class='img-responsive center-block' ></a>";
        ?>
        <br>
    </div>
    <div class="pull-left hidden-xs">
        <b>GisooBot Version</b> <?php echo $gisoo_version ; ?>
    </div>
    <p><p class="text-muted" style="color: #0a0a0a ;"><?php echo $siteFooter ;?><br> <?php echo "$gs_lang_amar : $oldviews" ; ?></p></p>
</footer>

<?php if ($gs_hf_mod=="tabel"){ ?>
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo $gs_admin_directory ;?>/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.4 -->
    <script src="<?php echo $gs_admin_directory ;?>/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo $gs_admin_directory ;?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo $gs_admin_directory ;?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?php echo $gs_admin_directory ;?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo $gs_admin_directory ;?>/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo $gs_admin_directory ;?>/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo $gs_admin_directory ;?>/dist/js/demo.js"></script>
    <!-- page script -->
    <script>
        $(function () {

            $('#pages').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,

                "language": {
                    "decimal":        "",
                    "emptyTable":     "اطلاعاتی برای نمایش نیست .",
                    "info":           "نمایش از سطر _START_ تا _END_ و تعداد کل سطر ها :  _TOTAL_ سطر",
                    "infoEmpty":      "چیزی پیدا نشد !",
                    "infoFiltered":   "(برسی شده از بین _MAX_ ردیف .)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     "تعداد هر ردیف ها در هر صفحه :  _MENU_ ",
                    "loadingRecords": "Loading...",
                    "processing":     "Processing...",
                    "search":         "جستوجو : ",
                    "zeroRecords":    "چیزی پیدا نشد !",
                    "paginate": {
                        "first":      "اولی",
                        "last":       "آخری",
                        "next":       "بعدی",
                        "previous":   "قبلی"
                    },
                    "aria": {
                        "sortAscending":  ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    }



                }

            });

        });
    </script>
<?php }else{ ?>
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div><!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
<script src="<?php echo $gs_admin_directory ;?>/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.4 -->
<script src="<?php echo $gs_admin_directory ;?>/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo $gs_admin_directory ;?>/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo $gs_admin_directory ;?>/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- DataTables -->
<script src="<?php echo $gs_admin_directory ;?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo $gs_admin_directory ;?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo $gs_admin_directory ;?>/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo $gs_admin_directory ;?>/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo $gs_admin_directory ;?>/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="<?php echo $gs_admin_directory ;?>/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo $gs_admin_directory ;?>/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo $gs_admin_directory ;?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo $gs_admin_directory ;?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo $gs_admin_directory ;?>/plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $gs_admin_directory ;?>/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo $gs_admin_directory ;?>/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $gs_admin_directory ;?>/dist/js/demo.js"></script>
<?php }; ?>
</body>
</html>