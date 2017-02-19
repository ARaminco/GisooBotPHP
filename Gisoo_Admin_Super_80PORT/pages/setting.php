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
           تنظیمات
            <small>تنظیمات اصلی سایت و ربات ...</small>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 col-lg-6">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">فرم تغییرات سیستم</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <p>
                            برای تغییرات در سیستم از این فرم استفاده کنید .
                            همچنین میتوانید برای تغییر توکن ربات از منو داخل پیشخوان تغییرات مورد نظر خود را اعمال کنید .
                        </p>
                        <form method="post" action="">
                            <div class="form-group">
                                <label for="exampleInputEmail1">نام نمایشی سایت</label>
                                <input name="opsiename" type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $proptions->find_by_name('sitename')->text ; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">نام ربات</label>
                                <input name="opbotn" type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $proptions->find_by_name('BotName')->text ; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">آی دی ربات</label>
                                <input name="opbotid" type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $proptions->find_by_name('BotID')->text ; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">آی دی کانال ربات</label>
                                <input name="opbotchannel" type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $proptions->find_by_name('botchannel')->text ; ?>">
                                <p>برای ارسال پیام به کانال</p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">رمز عبور وب سرویس</label>
                                <input name="opwebapi" type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $proptions->find_by_name('webapi')->text ; ?>">
                                <p>بهتر است برای امنیت بیشتر ترکیبی از 20 حرف کوچک و بزرگ و عدد باشد.</p>
                                <p>لینک وبسرویس شما : <?php echo "$gs_url_base"."/Bot/api.php"?></p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">دریافت شماره تلفن</label>
                                <input name="oprphone" type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $proptions->find_by_name('rphone')->int ; ?>">
                                <p>عدد ۱ یعنی فعال و عدد ۰ یعنی غیر فعال<br>توجه داشته باشید که برای استفاده از وب سرویس حتما باید این گزینه فعال باشد.</p>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">آیدی مدیر ربات</label>
                                <input name="opadmintid" type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $proptions->find_by_name('TelegramAdminID')->text ; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">شناسه مدیر ربات</label>
                                <input name="opadminuid" type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $proptions->find_by_name('TelegramAdminUID')->text ; ?>">
                            </div>
                            <div class="form-group">
                                <label>عیب یاب ربات</label>
                                <select name="opdebug" class="form-control">
                                    <option value="1">روشن</option>
                                    <option value="0" selected>خاموش</option>
                                </select>
                            </div>
                            <div class="box-footer">
                                <input name="M" value="editsetting" hidden>
                                <button type="submit" class="btn btn-primary" >تایید</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.box -->
            </div>
                <div class="col-xs-12 col-lg-6">
                    <div class="col-xs-12 col-lg-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">تغییر اطلاعات مدیر</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">

                                <form method="post" action="">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">نام مدیر</label>
                                        <input name="adminname" type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $prousers->find_by_id('1')->name ; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">نام کاربری مدیر</label>
                                        <input name="adminuser" type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $prousers->find_by_id('1')->user ; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">ایمیل مدیر</label>
                                        <input name="adminemail" type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $prousers->find_by_id('1')->email ; ?>">
                                    </div>
                                    <div class="box-footer">
                                        <input name="M" value="editadmin" hidden>
                                        <button type="submit" class="btn btn-primary" >تایید</button>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.box -->
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">تغییر رمز عبور</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">

                                <form method="post" action="">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">رمز عبور جدید</label>
                                        <input name="adminpass" type="text" class="form-control" id="exampleInputEmail1" >
                                    </div>
                                    <div class="box-footer">
                                        <input name="M" value="editadminpass" hidden>
                                        <button type="submit" class="btn btn-primary" >تایید</button>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.box -->
                    </div>

                </div>
            </div>
    </section>
</div>









