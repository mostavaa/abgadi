<style>
            #mobilesidebar {
                float:left;
            position: fixed;
            height: 100%;
            width: 40%;
            background-color: #eeeded;
            z-index: 3;
            overflow:auto;
        }
            #mobilesidebarright{
                   float:right;
            height: 100%;
            width: 60%;
            z-index: 3;
            overflow:auto;
            }
</style>
<?php
$username = isset($this->session->userdata["username"]) && !empty($this->session->userdata["username"])?$this->session->userdata["username"]:"";
?>   
<div id="mobilesidebarContainer" style="position:fixed;height:100%;width:100%;z-index:2;overflow:auto;display:none">
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
            <a class="list-group-item" href="<?php echo site_url("homecontroller/content")?>">التحكم</a>

            <?php
            }
            ?>

        </div>
    </div>
<div id="mobilesidebarright">

</div>
</div>
 