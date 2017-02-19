
<!-- Content Wrapper. Contains page content -->
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
            پیشخوان
            <small>پنل مدیریت</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green-active">
                    <div class="inner">
                        <h3><?php echo $proptions->find_by_name('botin')->int ;?></h3>
                        <p>پیام های دریافتی ربات</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-download"></i>
                    </div>
                    <a href="#" class="small-box-footer">شمارنده</a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-olive-active">
                    <div class="inner">
                        <h3><?php echo $proptions->find_by_name('botout')->int ;?></h3>
                        <p>پیام های ارسالی ربات</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-upload"></i>
                    </div>
                    <a href="#" class="small-box-footer">شمارنده</a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red-active">
                    <div class="inner">
                        <h3><?php echo $BotCommandCunt ;?></h3>
                        <p>دستور های ربات</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-comment"></i>
                    </div>
                    <a href="index.php?T=commands" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua-active">
                    <div class="inner">
                        <h3><?php echo $BotUserCunt ; ?><sup style="font-size: 20px"></sup></h3>
                        <p>کاربران تلگرام</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <a href="index.php?T=users" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
                </div>
            </div><!-- ./col -->
        </div><!-- /.row -->
        <!-- Main row -->
        <div class="row">

            <div class="col-md-6">
                <div class="box box-default collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title">ثبت توکن</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <p>از این بخش می توانید وب هوک ربات را ثبت یا غیر فعال کنید ...</p>
                        <form action="index.php" method="POST">
                            <input type="text" name="M" value="tokenset" hidden>
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control" name="token" value="<?php echo $proptions->find_by_name('TelegramBotAPI')->text ; ?>" style="direction: ltr;">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-info btn-flat" >ثبت!</button>
                                </span>
                            </div><!-- /input-group -->
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>

                <div class="col-md-6">
                    <div class="box box-default collapsed-box">
                        <div class="box-header with-border">
                            <h3 class="box-title">ارسال پیام به کانال</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <p>این بخش فقط زمانی کار میکند که ربات مدیر یک کانال باشد و آیدی کانال در تنظیمات وارد شده باشد.</p>
                            <form action="index.php" method="POST">
                                <input type="text" name="M" value="sendtochannel" hidden>
                                <div class="form-group">
                                    <label>متن یا کپشن</label>
                                    <br>
                                    <textarea class="form-group-lg" name="text" placeholder="متن خود را وارد کنید."></textarea>
                                </div>
                                <div class="form-group">
                                    <label>کیبرد</label>
                                    <br>
                                    <textarea class="form-group-lg" name="keyboard" style="direction: ltr" placeholder="کد کیبرد خود را وارد کنید."></textarea>
                                    <br>
                                    <p>در صورت نیاز فقط از کیبرد این لاین استفاده کنید در غیر این صورت پیام ارسال نمی شود .</p>
                                </div>
                                <div class="form-group">
                                    <label>لینک تصویر</label>
                                    <br>
                                    <input type="url" name="photo" placeholder="لینک تصویر" style="direction: ltr">
                                    <br>
                                    <p>درصورت وارد کردن لینک تصویر متن به عوان کپشن ارسال میشود و در صورت خالی بودن فیلد تصویر متن به عنوان پیام متنی . توجه داشته باشید در حالت کپشن تعداد کاراکتر ها محدود است و در صورت تجاوز از میزان مجاز پیام ارسال نمی شود.</p>
                                </div>

                                 <button type="submit" class="btn btn-success">ارسال</button>
                            </form>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>


        </div><!-- /.row (main row) -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
