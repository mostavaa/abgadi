<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Manipulate | <?php echo SITENAME?></title>

    <?php
    $this->load->view('shared/css');
    ?>
    <style>
        .menuuWrapper {
            position: relative;
            margin: 0 auto;
            text-align: center;
        }

        .mainNav {
            position: relative;
            display: block;
        }

            .mainNav li {
            }
    </style>

</head>

<body>
    <?php 
    $this->load->view('shared/sidebar');
    ?>
    <div class="container">
        <div class="row page">
            <?php
            $this->load->view('shared/header');
            ?>

            <div class="content">
                <div class="row">
                    <div class="menuuWrapper">
                        <ul class="mainNav">
                            <li class="btn edits" data-div="specializations">التخصصات</li>
                            <li class="btn edits" data-div="accSpecializations">التخصصات الدقيقة</li>
                            <li class="btn edits" data-div="scientificDegrees">الدرجات العلمية</li>
                            <li class="btn edits" data-div="researchTypes">انواع الورقات البحثية</li>
                            <li class="btn edits" data-div="institutes">الهيئات العلمية</li>
                            <li class="btn edits" data-div="jobs">وظائف الباحث</li>
                            <li class="btn edits" data-div="publishers">الناشرون</li>
                            <li class="btn edits" data-div="authors">الباحثون</li>
                        </ul>
                    </div>
                </div>
                <div class="allEdits" id="specializations">
                    <div class="alert alert-success">
                        <div class="row parent" data-type="specialization">
                            <div class="col-md-3"></div>

                            <div class="col-md-3"></div>

                            <div class="col-md-3">
                                <input type="button" class="btn addBtn" value="اضافة" />
                            </div>

                            <div class="col-md-3">
                                <input type="text" class="form-control inputText" />
                            </div>
                        </div>
                    </div>

                    <div class="old">
                        <?php 
                        if(isset($specializations) && !empty($specializations)){
                            foreach($specializations as $spec){
                        ?>
                        <div class="alert alert-info">
                            <div class="row parent" data-type="specialization">
                                <div class="col-md-3"></div>

                                <div class="col-md-3">
                                    <input type="button" class="btn deleteBtn" value="مسح" />
                                </div>

                                <div class="col-md-3">
                                    <input type="button" class="btn editBtn" value="تعديل" />
                                    <input type="button" style="display: none" class="btn saveEditBtn" value="حفظ" />
                                </div>

                                <div class="col-md-3">
                                    <input type="text" data-id="<?php echo $spec->id?>" readonly class="form-control inputText" value="<?php echo $spec->name ?>"/>
                                </div>
                            </div>
                        </div>

                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>

                <div class="allEdits" id="accSpecializations">
                    <div class="alert alert-success">
                        <div class="row parent" data-type="accSpecialization">
                            <div class="col-md-3"></div>

                            <div class="col-md-3"></div>

                            <div class="col-md-3">
                                <input type="button" class="btn addBtn" value="اضافة" />
                            </div>

                            <div class="col-md-3">
                                <input type="text" class="form-control inputText" />
                            </div>
                        </div>
                    </div>

                    <div class="old">
                        <?php 
                        if(isset($accSpecializations) && !empty($accSpecializations)){
                            foreach($accSpecializations as $obj){
                        ?>
                        <div class="alert alert-info">
                            <div class="row parent" data-type="accSpecialization">
                                <div class="col-md-3"></div>

                                <div class="col-md-3">
                                    <input type="button" class="btn deleteBtn" value="مسح" />
                                </div>

                                <div class="col-md-3">
                                    <input type="button" class="btn editBtn" value="تعديل" />
                                    <input type="button" style="display: none" class="btn saveEditBtn" value="حفظ" />
                                </div>

                                <div class="col-md-3">
                                    <input type="text" data-id="<?php echo $obj->id?>" readonly class="form-control inputText" value="<?php echo $obj->name ?>"/>
                                </div>
                            </div>
                        </div>

                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>


                <div class="allEdits" id="scientificDegrees">
                    <div class="alert alert-success">
                        <div class="row parent" data-type="scientificDegree">
                            <div class="col-md-3"></div>

                            <div class="col-md-3"></div>

                            <div class="col-md-3">
                                <input type="button" class="btn addBtn" value="اضافة" />
                            </div>

                            <div class="col-md-3">
                                <input type="text" class="form-control inputText" />
                            </div>
                        </div>
                    </div>

                    <div class="old">
                        <?php 
                        if(isset($scientificDegrees) && !empty($scientificDegrees)){
                            foreach($scientificDegrees as $obj){
                        ?>
                        <div class="alert alert-info">
                            <div class="row parent" data-type="scientificDegree">
                                <div class="col-md-3"></div>

                                <div class="col-md-3">
                                    <input type="button" class="btn deleteBtn" value="مسح" />
                                </div>

                                <div class="col-md-3">
                                    <input type="button" class="btn editBtn" value="تعديل" />
                                    <input type="button" style="display: none" class="btn saveEditBtn" value="حفظ" />
                                </div>

                                <div class="col-md-3">
                                    <input type="text" data-id="<?php echo $obj->id?>" readonly class="form-control inputText" value="<?php echo $obj->name ?>"/>
                                </div>
                            </div>
                        </div>

                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>


                <div class="allEdits" id="researchTypes">
                    <div class="alert alert-success">
                        <div class="row parent" data-type="researchType">
                            <div class="col-md-3"></div>

                            <div class="col-md-3"></div>

                            <div class="col-md-3">
                                <input type="button" class="btn addBtn" value="اضافة" />
                            </div>

                            <div class="col-md-3">
                                <input type="text" class="form-control inputText" />
                            </div>
                        </div>
                    </div>

                    <div class="old">
                        <?php 
                        if(isset($researchTypes) && !empty($researchTypes)){
                            foreach($researchTypes as $obj){
                        ?>
                        <div class="alert alert-info">
                            <div class="row parent" data-type="researchType">
                                <div class="col-md-3"></div>

                                <div class="col-md-3">
                                    <input type="button" class="btn deleteBtn" value="مسح" />
                                </div>

                                <div class="col-md-3">
                                    <input type="button" class="btn editBtn" value="تعديل" />
                                    <input type="button" style="display: none" class="btn saveEditBtn" value="حفظ" />
                                </div>

                                <div class="col-md-3">
                                    <input type="text" data-id="<?php echo $obj->id?>" readonly class="form-control inputText" value="<?php echo $obj->name ?>"/>
                                </div>
                            </div>
                        </div>

                        <?php
                            }
                        }
                        ?>
                    </div>

                </div>

                <div class="allEdits" id="institutes">
                    <div class="alert alert-success">
                        <div class="row parent" data-type="institute">
                            <div class="col-md-3"></div>

                            <div class="col-md-3"></div>

                            <div class="col-md-3">
                                <input type="button" class="btn addBtn" value="اضافة" />
                            </div>

                            <div class="col-md-3">
                                <input type="text" class="form-control inputText" />
                            </div>
                        </div>
                    </div>

                    <div class="old">

                        <?php 
                        if(isset($institutes) && !empty($institutes)){
                            foreach($institutes as $obj){
                        ?>
                        <div class="alert alert-info">
                            <div class="row parent" data-type="institute">
                                <div class="col-md-3"></div>

                                <div class="col-md-3">
                                    <input type="button" class="btn deleteBtn" value="مسح" />
                                </div>

                                <div class="col-md-3">
                                    <input type="button" class="btn editBtn" value="تعديل" />
                                    <input type="button" style="display: none" class="btn saveEditBtn" value="حفظ" />
                                </div>

                                <div class="col-md-3">
                                    <input type="text" data-id="<?php echo $obj->id?>" readonly class="form-control inputText" value="<?php echo $obj->instituteName ?>"/>
                                </div>
                            </div>
                        </div>

                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>



                <div class="allEdits" id="jobs">
                    <div class="alert alert-success">
                        <div class="row parent" data-type="job">
                            <div class="col-md-3"></div>

                            <div class="col-md-3"></div>

                            <div class="col-md-3">
                                <input type="button" class="btn addBtn" value="اضافة" />
                            </div>

                            <div class="col-md-3">
                                <input type="text" class="form-control inputText" />
                            </div>
                        </div>
                    </div>

                    <div class="old">
                        <?php 
                        if(isset($jobs) && !empty($jobs)){
                            foreach($jobs as $obj){
                        ?>
                        <div class="alert alert-info">
                            <div class="row parent" data-type="job">
                                <div class="col-md-3"></div>

                                <div class="col-md-3">
                                    <input type="button" class="btn deleteBtn" value="مسح" />
                                </div>

                                <div class="col-md-3">
                                    <input type="button" class="btn editBtn" value="تعديل" />
                                    <input type="button" style="display: none" class="btn saveEditBtn" value="حفظ" />
                                </div>

                                <div class="col-md-3">
                                    <input type="text" data-id="<?php echo $obj->id?>" readonly class="form-control inputText" value="<?php echo $obj->name ?>"/>
                                </div>
                            </div>
                        </div>

                        <?php
                            }
                        }
                        ?>

                    </div>
                </div>


                <div class="allEdits" id="publishers">
                    <div class="alert alert-success">
                        <div class="row parent" data-type="publisher">
                            <div class="col-md-3"></div>

                            <div class="col-md-3">
                                <input type="button" class="btn addBtn" value="اضافة" />
                            </div>

                            <div class="col-md-3">
                                <select class="form-control institute">
                                    <option value="0">الهيئة العلمية</option>

                                    <?php 
                                    if(isset($institutes) && !empty($institutes)){
                                        foreach($institutes as $institute){ 
                                            echo "<option value='{$institute->id}'>{$institute->instituteName}</option>";                                                                                        
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <input type="text" placeholder="اسم الناشر" class="form-control inputText" />
                            </div>
                        </div>
                    </div>

                    <div class="old">
                        <?php
                        if(isset($publishers) && !empty($publishers)){
                            foreach($publishers as $obj){
                        ?>
                        <div class="alert alert-info">
                            <div class="row parent" data-type="publisher">
                                <div class="col-md-3">
                                    <input type="button" class="btn deleteBtn" value="مسح" />
                                </div>

                                <div class="col-md-3">
                                    <input type="button" class="btn editBtn" value="تعديل" />
                                    <input type="button" style="display: none" class="btn saveEditBtn" value="حفظ" />
                                </div>

                                <div class="col-md-3">
                                    <select disabled="disabled" class="form-control institute">
                                        <option value="0">الهيئة العلمية</option>

                                        <?php 
                                if(isset($institutes) && !empty($institutes)){
                                    foreach($institutes as $institute){ 
                                        if(isset($obj->institute) && !empty($obj->institute)){
                                            if($institute->id == $obj->institute->id){ 
                                                echo "<option selected='selected' value='{$institute->id}'>{$institute->instituteName}</option>";                                          
                                            }else{
                                                echo "<option value='{$institute->id}'>{$institute->instituteName}</option>";                                                                                        
                                            }
                                        }else{
                                            echo "<option value='{$institute->id}'>{$institute->instituteName}</option>";                                          
                                        }
                                    }
                                }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <input type="text" data-id="<?php echo $obj->id?>" readonly class="form-control inputText" value="<?php echo $obj->publisherName ?>"/>
                                </div>
                            </div>
                        </div>
                        <?php 
                            }
                        }
                        ?>
                    </div>
                </div>

                <div class="allEdits" id="authors">
                    <div class="alert alert-success">
                        <div class="row parent" data-type="author">
                            <div class="col-md-3"></div>

                            <div class="col-md-3">
                                <input type="button" class="btn addBtn" value="اضافة" />
                            </div>

                            <div class="col-md-3">
                                <select class="form-control institute">
                                    <option value="0">الهيئة العلمية</option>

                                    <?php 
                                    if(isset($institutes) && !empty($institutes)){
                                        foreach($institutes as $institute){ 
                                            echo "<option value='{$institute->id}'>{$institute->instituteName}</option>";
                                        }
                                    }
                                    ?>
                                </select>

                                <select class="form-control currentScientificDegree">
                                    <option value="0">الدرجة العلمية</option>

                                    <?php 

                                    if(isset($scientificDegrees) && !empty($scientificDegrees)){
                                        foreach($scientificDegrees as $scs){ 
                                            echo "<option value='{$scs->id}'>{$scs->name}</option>";                                          

                                        }
                                    }
                                    
                                    ?>
                                </select>


                                <select class="form-control specialization">
                                    <option value="0">التخصص</option>

                                    <?php 

                                    if(isset($specializations) && !empty($specializations)){
                                        foreach($specializations as $ob){ 
                                            echo "<option value='{$ob->id}'>{$ob->name}</option>";                                          

                                        }
                                    }
                                    
                                    ?>
                                </select>
                                <select class="form-control accurateSpecialization">
                                    <option value="0">التخصص الدقيق</option>

                                    <?php 

                                    if(isset($accSpecializations) && !empty($accSpecializations)){
                                        foreach($accSpecializations as $ob){ 
                                            echo "<option value='{$ob->id}'>{$ob->name}</option>";                                          

                                        }
                                    }
                                    
                                    ?>
                                </select>


                                <select class="form-control job">
                                    <option value="0">الوظيفة الحالية</option>

                                    <?php 

                                    if(isset($jobs) && !empty($jobs)){
                                        foreach($jobs as $ob){ 
                                            echo "<option value='{$ob->id}'>{$ob->name}</option>";                                          
                                        }
                                    }
                                    
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <input type="text" placeholder="اسم الناشر" class="form-control inputText" />
                                <input type="text" placeholder="البريد الالكتروني" class="form-control mail" />
                                <input type="text" placeholder="الهاتف الشخصي" class="form-control mobileNumber" />
                                <input type="text" placeholder="هاتف العمل" class="form-control jobPhone" />
                                <input type="text" placeholder="عنوان العمل" class="form-control jobAddress" />

                            </div>
                        </div>
                    </div>

                    <div class="old">
                        <?php
                        if(isset($authors) && !empty($authors)){
                            foreach($authors as $obj){
                        ?>
                        <div class="alert alert-info">
                            <div class="row parent" data-type="author">
                                <div class="col-md-3">
                                    <input type="button" class="btn deleteBtn" value="مسح" />
                                </div>

                                <div class="col-md-3">
                                    <input type="button" class="btn editBtn" value="تعديل" />
                                    <input type="button" style="display: none" class="btn saveEditBtn" value="حفظ" />
                                </div>

                                <div class="col-md-3">
                                    <select disabled="disabled" class="form-control institute">
                                        <option value="0">الهيئة العلمية</option>

                                        <?php 
                                if(isset($institutes) && !empty($institutes)){
                                    foreach($institutes as $institute){ 
                                        if(isset($obj->institute) && !empty($obj->institute)){
                                            if($institute->id == $obj->institute->id){ 
                                                echo "<option selected='selected' value='{$institute->id}'>{$institute->instituteName}</option>";                                          
                                            }else{
                                                echo "<option value='{$institute->id}'>{$institute->instituteName}</option>";                                                                                        
                                            }
                                        }else{
                                            echo "<option value='{$institute->id}'>{$institute->instituteName}</option>";                                          
                                        }
                                    }
                                }
                                        ?>
                                    </select>

                                    <select disabled="disabled" class="form-control currentScientificDegree">
                                        <option value="0">الدرجة العلمية</option>

                                        <?php 

                                if(isset($scientificDegrees) && !empty($scientificDegrees)){
                                    foreach($scientificDegrees as $scs){ 
                                        if(isset($obj->currentScientificDegree) && !empty($obj->currentScientificDegree)){
                                            if($scs->id == $obj->currentScientificDegree->id){ 
                                                echo "<option selected='selected' value='{$scs->id}'>{$scs->name}</option>";                                          
                                            }else{
                                                echo "<option value='{$scs->id}'>{$scs->name}</option>";                                                                                        
                                            }
                                        }else{
                                            echo "<option value='{$scs->id}'>{$scs->name}</option>";                                          
                                        }
                                    }
                                }
                                
                                        ?>
                                    </select>


                                    <select disabled="disabled" class="form-control specialization">
                                        <option value="0">التخصص</option>

                                        <?php 

                                if(isset($specializations) && !empty($specializations)){
                                    foreach($specializations as $ob){ 
                                        if(isset($obj->specialization) && !empty($obj->specialization)){
                                            if($ob->id == $obj->specialization->id){ 
                                                echo "<option selected='selected' value='{$ob->id}'>{$ob->name}</option>";                                          
                                            }else{
                                                echo "<option value='{$ob->id}'>{$ob->name}</option>";                                                                                        
                                            }
                                        }else{
                                            echo "<option value='{$ob->id}'>{$ob->name}</option>";                                          
                                        }
                                    }
                                }
                                
                                        ?>
                                    </select>

                                    <select disabled="disabled" class="form-control accurateSpecialization">
                                        <option value="0">التخصص الدفيق</option>

                                        <?php 

                                if(isset($accSpecializations) && !empty($accSpecializations)){
                                    foreach($accSpecializations as $ob){ 
                                        if(isset($obj->accurateSpecialization) && !empty($obj->accurateSpecialization)){
                                            if($ob->id == $obj->accurateSpecialization->id){ 
                                                echo "<option selected='selected' value='{$ob->id}'>{$ob->name}</option>";                                          
                                            }else{
                                                echo "<option value='{$ob->id}'>{$ob->name}</option>";                                                                                        
                                            }
                                        }else{
                                            echo "<option value='{$ob->id}'>{$ob->name}</option>";                                          
                                        }
                                    }
                                }
                                
                                        ?>
                                    </select>


                                    <select disabled="disabled" class="form-control job">
                                        <option value="0">الوظيفة الحالية</option>

                                        <?php 

                                if(isset($jobs) && !empty($jobs)){
                                    foreach($jobs as $ob){ 
                                        if(isset($obj->job) && !empty($obj->job)){
                                            if($ob->id == $obj->job->id){ 
                                                echo "<option selected='selected' value='{$ob->id}'>{$ob->name}</option>";                                          
                                            }else{
                                                echo "<option value='{$ob->id}'>{$ob->name}</option>";                                                                                        
                                            }
                                        }else{
                                            echo "<option value='{$ob->id}'>{$ob->name}</option>";                                          
                                        }
                                    }
                                }
                                
                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <input type="text" data-id="<?php echo $obj->id?>" readonly class="form-control inputText" value="<?php echo $obj->name ?>"/>
                                    <input type="text" readonly placeholder="البريد الالكتروني" class="form-control mail" value="<?php echo $obj->mail?>" />
                                    <input type="text" readonly placeholder="الهاتف الشخصي" class="form-control mobileNumber" value="<?php echo $obj->mobileNumber?>" />
                                    <input type="text" readonly placeholder="هاتف العمل" class="form-control jobPhone" value="<?php echo $obj->jobPhone?>" />
                                    <input type="text" readonly placeholder="عنوان العمل" class="form-control jobAddress" value="<?php echo $obj->jobAddress?>" />

                                </div>
                            </div>
                        </div>
                        <?php 
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    //$this->load->view('shared/footer');
    ?>



    <?php
    $this->load->view('shared/scripts');
    ?>
    <script>
        $(document).ready(function () {

            $(".allEdits").hide();

            $(".editBtn").click(function () {
                parent = $(this).parents(".parent");

                $(parent).find(".inputText").removeAttr("readonly");
                $(parent).find(".saveEditBtn").show();
                $(this).hide();
                $(parent).find(".institute").removeAttr("disabled");
                $(parent).find(".currentScientificDegree").removeAttr("disabled");
                $(parent).find(".specialization").removeAttr("disabled");
                $(parent).find(".accurateSpecialization").removeAttr("disabled");
                $(parent).find(".job").removeAttr("disabled");

                $(parent).find(".mail").removeAttr("readonly");
                $(parent).find(".mobileNumber").removeAttr("readonly");
                $(parent).find(".jobPhone").removeAttr("readonly");
                $(parent).find(".jobAddress").removeAttr("readonly");

            });

            $(".saveEditBtn").click(function () {
                saveBtn = this;
                parent = $(this).parents(".parent");
                inputText = $(parent).find(".inputText").val();
                inputId = $(parent).find(".inputText").attr("data-id");
                table = $(parent).attr("data-type");
                instituteId = $(parent).find(".institute").val();
                if (instituteId === undefined) {
                    instituteId = 0;
                }

                currentScientificDegree = $(parent).find(".currentScientificDegree").val();
                if (currentScientificDegree === undefined) {
                    currentScientificDegree = 0;
                }

                specialization = $(parent).find(".specialization").val();
                if (specialization === undefined) {
                    specialization = 0;
                }

                accurateSpecialization = $(parent).find(".accurateSpecialization").val();
                if (accurateSpecialization === undefined) {
                    accurateSpecialization = 0;
                }

                job = $(parent).find(".job").val();
                if (job === undefined) {
                    job = 0;
                }

                jobAddress = $(parent).find(".jobAddress").val();
                if (jobAddress === undefined) {
                    jobAddress = 0;
                }

                jobPhone = $(parent).find(".jobPhone").val();
                if (jobPhone === undefined) {
                    jobPhone = 0;
                }

                mobileNumber = $(parent).find(".mobileNumber").val();
                if (mobileNumber === undefined) {
                    mobileNumber = 0;
                }

                mail = $(parent).find(".mail").val();
                if (mail === undefined) {
                    mail = 0;
                }

                var tables = ["specialization", "accSpecialization", "scientificDegree", "researchType", "institute", "job", "publisher", "author"];
                if (table == "" || table == null || tables.indexOf(table) == -1) {
                    alert("error");
                } else {
                    if (inputId == "" || inputId == null || isNaN(inputId)) {
                        alert("Error Loading Scripts , please reload page or use a new browser");
                    } else {
                        if (inputText == "" || inputText == null) {
                            alert("Please enter value");
                        } else {
                            res = confirm("هل انت متأكد من التعديل ؟");
                            if (res == true) {
                                $.post("<?php echo site_url("admin/editonetable") ?>", "table=" + table
                                    + "&inputId=" + inputId
                                    + "&inputText=" + inputText
                            + "&instituteId=" + instituteId
                                    + "&currentScientificDegree=" + currentScientificDegree
                                    + "&specialization=" + specialization
                                    + "&accurateSpecialization=" + accurateSpecialization
                                    + "&job=" + job
                                    + "&jobPhone=" + jobPhone
                                    + "&jobAddress=" + jobAddress
                                    + "&mobileNumber=" + mobileNumber
                                    + "&mail=" + mail, function (res) {
                                        if (res == "success") {
                                            alert("تم التعديل بنجاح");
                                            $(parent).find(".editBtn").show();
                                            $(parent).find(".inputText").attr("readonly", "readonly");
                                            $(saveBtn).hide();
                                            $(parent).find(".institute").attr("disabled", "disabled");
                                            $(parent).find(".currentScientificDegree").attr("disabled", "disabled");
                                            $(parent).find(".specialization").attr("disabled", "disabled");
                                            $(parent).find(".accurateSpecialization").attr("disabled", "disabled");
                                            $(parent).find(".job").attr("disabled", "disabled");

                                            $(parent).find(".mail").attr("readonly", "readonly");
                                            $(parent).find(".mobileNumber").attr("readonly", "readonly");
                                            $(parent).find(".jobPhone").attr("readonly", "readonly");
                                            $(parent).find(".jobAddress").attr("readonly", "readonly");

                                        }
                                    });
                            }

                        }
                    }
                }
            });


            $(".deleteBtn").click(function () {
                parent = $(this).parents(".parent");
                inputText = $(parent).find(".inputText").val();
                inputId = $(parent).find(".inputText").attr("data-id");
                table = $(parent).attr("data-type");
                var tables = ["specialization", "accSpecialization", "scientificDegree", "researchType", "institute", "job", "publisher", "author"];
                if (table == "" || table == null || tables.indexOf(table) == -1) {
                    alert("error");
                } else {
                    if (inputId == "" || inputId == null || isNaN(inputId)) {
                        alert("Error Loading Scripts , please reload page or use a new browser");
                    } else {

                        res = confirm("هل انت متأكد من مسح " + inputText + " ? ");
                        if (res == true) {
                            $.post("<?php echo site_url("admin/deleteontable") ?>", "table=" + table
                                    + "&inputId=" + inputId
                                    , function (res) {
                                        if (res == "success") {
                                            alert("تم المسح بنجاح");
                                            $(parent).remove();
                                        }
                                    });
                        }
                    }
                }
            });

            $(".addBtn").click(function () {
                parent = $(this).parents(".parent");
                inputText = $(parent).find(".inputText").val();
                table = $(parent).attr("data-type");
                instituteId = $(parent).find(".institute").val();
                if (instituteId === undefined) {
                    instituteId = 0;
                }

                currentScientificDegree = $(parent).find(".currentScientificDegree").val();
                if (currentScientificDegree === undefined) {
                    currentScientificDegree = 0;
                }

                specialization = $(parent).find(".specialization").val();
                if (specialization === undefined) {
                    specialization = 0;
                }

                accurateSpecialization = $(parent).find(".accurateSpecialization").val();
                if (accurateSpecialization === undefined) {
                    accurateSpecialization = 0;
                }

                job = $(parent).find(".job").val();
                if (job === undefined) {
                    job = 0;
                }

                jobAddress = $(parent).find(".jobAddress").val();
                if (jobAddress === undefined) {
                    jobAddress = 0;
                }

                jobPhone = $(parent).find(".jobPhone").val();
                if (jobPhone === undefined) {
                    jobPhone = 0;
                }

                mobileNumber = $(parent).find(".mobileNumber").val();
                if (mobileNumber === undefined) {
                    mobileNumber = 0;
                }

                mail = $(parent).find(".mail").val();
                if (mail === undefined) {
                    mail = 0;
                }



                var tables = ["specialization", "accSpecialization", "scientificDegree", "researchType", "institute", "job", "publisher", "author"];;
                if (table == "" || table == null || tables.indexOf(table) == -1) {
                    alert("error");
                } else {
                    if (inputText == "" || inputText == null) {
                        alert("Please enter value");
                    } else {
                        res = confirm("هل انت متأكد من اضاقة " + inputText + " ؟");
                        if (res == true) {
                            $.post("<?php echo site_url("admin/addonetable") ?>", "table=" + table
                                    + "&inputText=" + inputText
                                    + "&instituteId=" + instituteId
                                    + "&currentScientificDegree=" + currentScientificDegree
                                    + "&specialization=" + specialization
                                    + "&accurateSpecialization=" + accurateSpecialization
                                    + "&job=" + job
                                    + "&jobPhone=" + jobPhone
                                    + "&jobAddress=" + jobAddress
                                    + "&mobileNumber=" + mobileNumber
                                    + "&mail=" + mail
                                    , function (res) {
                                        if (res == "success") {
                                            alert("تم الاضافة بنجاح");
                                            window.location.reload();
                                        }
                                    });
                        }
                    }
                }
            });

            $(".edits").click(function () {
                $(".allEdits").fadeOut();
                div = $(this).attr("data-div");
                $("#" + div).fadeIn();
                $(".edits").css("background-color", "#19bd9b");
                $(this).css("background-color", "#34495e");
                $(this).css("color", "white");

            });
        });
    </script>
</body>

</html>
