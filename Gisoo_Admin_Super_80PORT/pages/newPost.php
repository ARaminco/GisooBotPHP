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
            افزودن پست جدید 
            <small>افزودن پست جدید</small>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">اطلاعات پست خود را وارد کنید ...</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="pages" class="table table-bordered table-striped text-center">
                            <thead>
                            <tr>
                                <th>شناسه</th>
                                <th>عنوان</th>
                                <th>تاریخ ایجاد</th>
                                <th>آدرس صفحه</th>
                                <th>امکانات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $gs_pages_table = $proposts -> find_by_type('NEWS');
                            //var_dump($gs_pages_table);
                            $json = json_encode($gs_pages_table,JSON_PRETTY_PRINT);
                            //echo $json;
                            $obj = json_decode($json);
                            //var_dump($obj);
                            foreach ($obj as $row)
                            {
                                $gs_page_id = $row->id;
                                $gs_page_title = $row->title;
                                $gs_page_edit = $row->edit ;
                                $gs_page_date = $row->date ;
                                if ($gs_page_edit=="YES"){

                                }else{
                                    $gs_page_edit_menu = "امکانات برای این پست غیر فعال است !";
                                }
                                $gs_page_link = "$gs_url_base/?T=page&P=$gs_page_id";
                                echo "
                                <tr>
                                    <td>$gs_page_id</td>
                                    <td class='text-center'><a href='$gs_page_link'> $gs_page_title </a></td>
                                    <td>$gs_page_date</td>
                                    <td>$gs_page_link</td>
                                    <td>$gs_page_edit_menu</td>
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









