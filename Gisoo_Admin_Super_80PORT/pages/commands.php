<?php
/**
 * Created by PhpStorm.
 * User: RaminCo
 * Date: 25/09/2016
 * Time: 10:59 AM
 */
?>

<div class="content-wrapper">
    <?php if ($gs_out == 1) { ?>
        <div class="pad margin no-print">
            <div class="callout callout-info" style="margin-bottom: 0!important;">
                <h4><i class="fa fa-info"></i> <?php echo $gs_out_title; ?> :</h4>
                <?php echo $gs_out_text ; ?>
            </div>
        </div>

    <?php }?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           دستورات
            <small>لیست کیبورد ها و دستورات ربات</small>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title">افزودن</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <p>از این بخش میتوانید یک دکمه جدید به ربات بی افزایید...</p>
                            <form action='' method='post'>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">دستور</label>
                                    <input name="command" type="text" class="form-control" id="exampleInputEmail1" value="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">لینک تصویر</label>
                                    <input name="photo" type="url" class="form-control" id="exampleInputEmail1" value="" style="direction: ltr">
                                    <p>در صورت پر کردن این فیلد متن پیام به صورت کپشن ارسال می شود . توجه داشته باشید در این حالت تعداد کاراکتر متن محدود میشود و اگر از محدوده آن تجاوز کند ممکن است پیام ارسال نشود.</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">لینک ویدیو</label>
                                    <input name="video" type="text" class="form-control" id="exampleInputEmail1" value="" style="direction: ltr">
                                    <p>بین لینک تصویر و ویدیو فقط یکی را باید وارد کنید .</p>
                                </div>
                                <div class='form-group'>
                                    <label>متن پیام پاسخ</label>
                                    <textarea class='form-control' rows='3' name='cmtext' placeholder='Enter ...'></textarea>
                                </div>
                                <div class='form-group'>
                                    <label>کیبرد مجازی</label>
                                    <textarea class='form-control' rows='3' name='cmkeyb' placeholder='Enter ...' style='text-align: left;direction: ltr'>{
	"keyboard": [
		[
			"1"
		],
		[
			"1",
			"2"
		]
	]
}</textarea>
                                    <p>فیلد کیبرد را در حالت تصویر خالی کنید.</p>
                                </div>
                                <label>نوع دستور</label>
                                <select name="cmtype" class="form-control">
                                    <option value="0">غیر فعال</option>
                                    <option value="1">کاربران</option>
                                    <option value="2">گروه ها</option>
                                    <option value="3">سیستمی</option>
                                </select>
                                <div class='form-group'>
                                    <input name='M' value='addcommands' hidden>
                                    <button type='submit' class='btn btn-info pull-right'>تایید</button>
                                </div>
                            </form>
                        </tr>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->


            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">لیست</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <p>توجه : لطفا در پیام های نوع 3 یعنی سیستمی تغییری ایجاد نکنید !!!</p>
                        <p>راهنمای انواع دستور :</p>

                        <select name='cmtype' class='form-control'>
                            <option value='0'>0-غیر فعال</option>
                            <option value='1'>1-کاربران</option>
                            <option value='2'>2-گروه ها</option>
                            <option value='3'>3-سیستمی</option>
                        </select>
                        <br/>
                        <table id="pages" class="table table-bordered table-striped text-center">
                            <thead>
                            <tr>
                                <th>شناسه</th>
                                <th>نوع</th>
                                <th>دستور</th>
                                <th>تصویر</th>
                                <th>ویدیو</th>
                                <th>متن پیام</th>
                                <th>کیبرد</th>
                                <th>تایید</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $gs_commands_table = $proTbotCommands -> find();
                            //var_dump($gs_pages_table);
                            $json = json_encode($gs_commands_table,JSON_PRETTY_PRINT);
                            //echo $json;
                            $obj = json_decode($json);
                            //var_dump($obj);
                            foreach ($obj as $row)
                            {
                                $gs_command_id = $row->id;
                                $gs_command_title = $row->command;
                                $gs_command_title = urldecode($gs_command_title);
                                $gs_command_type = $row->type;
                                $gs_command_text = $row->text ;
                                $gs_command_text = urldecode($gs_command_text) ;
                                $gs_command_keyboard = $row->keyboard ;
                                $gs_command_photo = $row->photo ;
                                $gs_command_video = $row->video ;
                                $gs_command_keyboard = urldecode($gs_command_keyboard) ;
                                $gs_command_keyboardjson = prettyPrint( $gs_command_keyboard );
                                $gs_command_photo = $row->photo ;
                                if ($gs_command_photo == ""){
                                    $gs_command_outphoto = "تصویر ندارد";
                                }else{
                                    $gs_command_outphoto = "<img class='img-thumbnail' src='$gs_command_photo'  href='$gs_command_photo'>";
                                }
                                echo "
                                <tr>
                                <form action='' method='post'>
                                    <td>$gs_command_id</td>
                                    <td>
                                         <input name='cmtype' type='text' class='form-control'  value='$gs_command_type'>
                                    </td>
                                    <td>
                                        <div class='form-group'>
                                            <input name='cm' type='text' class='form-control'  value='$gs_command_title'>
                                        </div>
                                    </td>
                                    <td class='text-center'>
                                        <div class='form-group'>
                                            $gs_command_outphoto
                                            <input name='cmphoto' type='url' class='form-control'  value='$gs_command_photo'>
                                        </div>
                                    </td>
                                    <td class='text-center'>
                                        <div class='form-group'>
                                            <input name='cmvideo' type='text' class='form-control'  value='$gs_command_video'>
                                        </div>
                                    </td>
                                    <td class='text-center'>
                                        <div class='form-group'>
                                            <textarea class='form-control' rows='3' name='cmtext' placeholder='Enter ...'>$gs_command_text</textarea>
                                        </div>
                                    </td>
                                    <td class='text-center'>
                                        <div class='form-group'>
                                            <textarea class='form-control' rows='3' name='cmkeyb' placeholder='Enter ...' style='text-align: left;direction: ltr'>$gs_command_keyboardjson</textarea>
                                        </div>
                                    </td>
                                    <td class='text-center' style='text-align: center'>
                                        <div class='form-group'>
                                            <input name='M' value='editcommands' hidden>
                                            <input name='cmid' value='$gs_command_id' hidden>
                                            <button type='submit' class='btn btn-info pull-right'>تایید</button>
                                        </div>
                                    </td>
                                
                                </form>
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









