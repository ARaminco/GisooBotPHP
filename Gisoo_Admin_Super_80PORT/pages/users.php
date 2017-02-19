<?php
/**
 * Created by PhpStorm.
 * User: RaminCo
 * Date: 25/09/2016
 * Time: 10:59 AM
 */
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            لیست کاربر ها
            <small>لیست کاربر های ربات تلگرام</small>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">لیست </h3>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="pages" class="table table-bordered table-striped text-center">
                            <thead>
                            <tr>
                                <th>شناسه</th>
                                <th>شناسه تلگرام</th>
                                <th>نام</th>
                                <th>نام خانوادگی</th>
                                <th>تلفن</th>
                                <th>آیدی</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $gs_users_table = $proTbotUsers -> find();
                            //var_dump($gs_pages_table);
                            $json = json_encode($gs_users_table,JSON_PRETTY_PRINT);
                            //echo $json;
                            $obj = json_decode($json);
                            //var_dump($obj);
                            foreach ($obj as $row)
                            {
                                $gs_users_id = $row->ID;
                                $gs_users_fname = $row->FName;
                                $gs_users_lname = $row->LName ;
                                $gs_users_uname = $row->UName ;
                                $gs_users_uid = $row->UID ;
                                $gs_users_phone = $row->phone ;

                                $gs_users_link = "https://telegram.me/$gs_users_uname";
                                echo "
                                <tr>
                                    <td>$gs_users_id</td>
                                    <td>$gs_users_uid</td>
                                    <td class='text-center' ><a href='$gs_users_link' target=\'_blank\'> $gs_users_fname </a></td>
                                    <td>$gs_users_lname</td>
                                    <td>$gs_users_phone</td>
                                    <td style='direction: ltr'><a href='$gs_users_link' target=\'_blank\'> @$gs_users_uname </a></td>
                                   
                                </tr>
                                ";
                            }
                            ?>
                            </tfoot>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

            </div>
        </div>
    </section>
</div>









