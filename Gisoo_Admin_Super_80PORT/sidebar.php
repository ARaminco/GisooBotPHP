
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-right image">
                <img src="<?php echo $gs_user_online_avatar ; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $gs_user_online_name ; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> آنلاین</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header"><?php echo $gs_lang_homemenu; ?></li>
            <li class=" treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span><?php echo $gs_lang_pishkhan; ?></span> <i class="fa fa-angle-left pull-left"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="index.html"><i class="fa fa-dashboard"></i><?php echo $gs_lang_pishkhan; ?></a></li>
                    <li class="active"><a href="/?T=setting"><i class="fa fa-gears"></i>تنظیمات اصلی</a></li>
                </ul>
            </li>
            <li class=" treeview">
                <a href="#">
                    <i class="fa  fa-edit"></i> <span>ربات تلگرام</span> <i class="fa fa-angle-left pull-left"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="/?T=commands"><i class="fa fa-edit"></i> ویرایش دستورها </a></li>
                </ul>
            </li>
            <li class=" treeview">
                <a href="#">
                    <i class="fa  fa-users"></i> <span><?php echo $gs_lang_userManager; ?></span> <i class="fa fa-angle-left pull-left"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="index.php?T=users"><i class="fa fa-users"></i>لیست کاربران</a></li>
                </ul>
            </li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa  fa-link"></i> <span>لینک های مفید</span> <i class="fa fa-angle-left pull-left"></i>
                </a>
                <ul class="treeview-menu">
                    <?php
                    $ad = ads(2);
                    $ad_photo = $ad->photo;
                    $ad_link = $ad->link;
                    $ad_title = $ad->title;
                    echo "<li class='active'><a href='$ad_link' target='_blank'><i class='fa fa-search'></i>$ad_title</a></li>";
                    ?>
                    <?php
                    $ad = ads(2);
                    $ad_photo = $ad->photo;
                    $ad_link = $ad->link;
                    $ad_title = $ad->title;
                    echo "<li class='active'><a href='$ad_link' target='_blank'><i class='fa fa-search'></i>$ad_title</a></li>";
                    ?>
                    <?php
                    $ad = ads(2);
                    $ad_photo = $ad->photo;
                    $ad_link = $ad->link;
                    $ad_title = $ad->title;
                    echo "<li class='active'><a href='$ad_link' target='_blank'><i class='fa fa-search'></i>$ad_title</a></li>";
                    ?>
                    <?php
                    $ad = ads(2);
                    $ad_photo = $ad->photo;
                    $ad_link = $ad->link;
                    $ad_title = $ad->title;
                    echo "<li class='active'><a href='$ad_link' target='_blank'><i class='fa fa-search'></i>$ad_title</a></li>";
                    ?>
                </ul>
            </li>
            <br>

            <div class="center-block treeview" style="width: 150px">

                <br>
                <?php
                $ad = ads(100);
                $ad_photo = $ad->photo;
                $ad_link = $ad->link;
                $ad_title = $ad->title;
                echo "<a href='$ad_link' target='_blank' ><img src='$ad_photo' alt='$ad_title' class='img-responsive center-block'></a>";
                ?>
                <br>
            </div>
        </ul>
        
    </section>
    <!-- /.sidebar -->
</aside>