<style>
            #mobilesidebar {
            position: fixed;
            height: 100%;
            width: 40%;
            background-color: #eeeded;
            z-index: 3;
            overflow:auto;
            display:none;
        }
</style>
<?php
$username = isset($this->session->userdata["username"]) && !empty($this->session->userdata["username"])?$this->session->userdata["username"]:"";
?>   
 <div id="mobilesidebar" style="">
        <div class="list-group">

            <div class="loginDiv">

                <?php
                if ($username==""){
                ?>
                <a class="list-group-item active" href="<?php echo site_url("usercontroller/loginview") ?>">تسجيل الدخول</a>
                <?php
                }else{
                ?>
                <div class="">
                    <p class="list-group-item active"><?php echo $username?></p>
                </div>
                <a class="list-group-item" href="<?php echo site_url("usercontroller/logout") ?>">تسجيل الخروج</a>
                <?php
                }
                ?>

            </div>

            <a class="list-group-item" href="<?php echo base_url()?>">الصفحة الرئيسية</a>
            <a class="list-group-item" href="#">دوريات وأبحاث</a>
            <a class="list-group-item" href="#">أضف إلي المكتبة</a>
            <a class="list-group-item" href="#">أحداث</a>
            <a class="list-group-item" href="#">أبجدي</a>
            <?php
            if ($username!=""){
            ?>
            <a class="list-group-item" href="<?php echo site_url("homecontroller/uploadpaperview")?>">اضافة محتوى</a>
            <a class="list-group-item"href="<?php echo site_url("homecontroller/bulkaddpapers")?>" >اضافة قائمة ابحاث</a>
            <a class="list-group-item" href="<?php echo site_url("homecontroller/displaydata")?>">عرض قاعدة البيانات</a>
            <a class="list-group-item" href="<?php echo site_url("homecontroller/manipulateone")?>">تعديل البيانات</a>

            <?php
            }
            ?>
            <a class="list-group-item active" id="closeMenu" href="#">اغلاق</a>

        </div>





    </div>