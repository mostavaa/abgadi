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
                <a class="list-group-item active" href="<?php echo site_url("login") ?>">تسجيل الدخول</a>
                <?php
                }else{
                ?>
                <div class="">
                    <p class="list-group-item active"><?php echo $username?></p>
                </div>
                <a class="list-group-item" href="<?php echo site_url("logout") ?>">تسجيل الخروج</a>
                <?php
                }
                ?>

            </div>

            <a class="list-group-item" href="<?php echo base_url()?>">الصفحة الرئيسية</a>
            <a class="list-group-item" href="<?= base_url()?>index.php/institutes">دوريات وأبحاث</a>
            <a class="list-group-item" href="<?= base_url()?>index.php/add">أضف إلي المكتبة</a>
            
            <?php
            if ($username!=""){
            ?>
            <a class="list-group-item" href="<?php echo site_url("admin/manage")?>">التحكم</a>

            <?php
            }
            ?>

        </div>
    </div>
<div id="mobilesidebarright">

</div>
</div>
 