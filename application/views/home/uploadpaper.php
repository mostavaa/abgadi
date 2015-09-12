<?php 
$success = $this->session->flashdata('success');
function renderSelect($label ,$inputValue , $id , $errors , $required=false , $values=array()){

?>
<div class="row formElement">

    <div class="col-md-12">
        <div class="col-md-9">
            <select  class="" name="<?php echo $id?>" id="<?php echo $id?>">
                <option value="-2222"></option>
                <?php 
    foreach($values as $value => $name ){
        if ($inputValue == $value){
            
            echo "<option selected='selected' value='{$value}'>{$name}</option>";
        }else{
            
            echo "<option value='{$value}'>{$name}</option>";
        }
    }
                ?>
            </select>

        </div>
        <div class="col-md-3">
            <h4 class="form-label"><?php echo $label?></h4>
        </div>

    </div>
    <div class="row">
        <div class="col-md-3">
            <span class="inputError">
                <?php 
    foreach($errors as $error){
        echo "<h4>{$error}</h4>";
    }
                ?>
            </span>
        </div>

    </div>
</div>
<?php
}

function renderTextAreaOther($label , $others ,$inputValue , $id , $errors , $required=false , $values = array()){
    $language = "arabic";
    if($language=="arabic"){
        $add = "اضافة";
    }else if($language=="english"){
        $add = "Add";        
    }
?>
<div class="row formElement">

    <div class="col-md-12">
        <div class="col-md-9">

            <select  class="select" name="<?php echo $id?>" id="<?php echo $id?>">
                <option value="-2222"></option>
                <?php 
    foreach($values as $value => $name ){
        if ($inputValue == $value){
            
            echo "<option selected='selected' value='{$value}'>{$name}</option>";
        }else{
            
            echo "<option value='{$value}'>{$name}</option>";
        }
    }
                ?>
                <option value="-1"><?php echo $others?></option>
            </select>

            <input type="hidden" value="<?php echo $inputValue?>" class="otherText" />
            <a style="display: none; width: 100%" class="btn btn-default addBtn" data-type="<?php echo $id?>"><?php echo $add?></a>

        </div>
        <div class="col-md-3">
            <h4 class="form-label"><?php echo $label?></h4>
        </div>

    </div>
    <div class="row">
        <div class="col-md-3">

            <span class="inputError">
                <?php 
    foreach($errors as $error){
        echo "<h4>{$error}</h4>";
    }
                ?>
            </span>
        </div>
    </div>
</div>
<?php
}
function renderTextArea($label , $inputValue , $id , $errors,$required=false){
?>
<div class="row formElement">

    <div class="col-md-12">
        <div class="col-md-9">
            <textarea  class="" cols="38" rows="3" name="<?php echo $id?>" id="<?php echo $id?>"><?php echo $inputValue?></textarea>
        </div>
        <div class="col-md-3">
            <h4 class="form-label"><?php echo $label?></h4>
        </div>

    </div>
    <div class="row">
        <div class="col-md-3">

            <span class="inputError">
                <?php 
    foreach($errors as $error){
        echo "<h4>{$error}</h4>";
    }
                ?>
            </span>
        </div>
    </div>
</div>
<?php
}
function renderInput($label , $inputValue , $id , $errors , $inputType , $required=false)
{
?>
<div class="row formElement">

    <div class="col-md-12">
        <div class="col-md-9">
            <input type="<?php echo $inputType?>"  value="<?php echo $inputValue?>" class="" name="<?php echo $id?>" id="<?php echo $id?>" />
        </div>
        <div class="col-md-3">
            <h4 class="form-label"><?php echo $label?></h4>
        </div>

    </div>
    <div class="row">
        <div class="col-md-3">

            <span class="inputError">
                <?php 
    foreach($errors as $error){
        echo "<h4>{$error}</h4>";                
    }
                ?>
            </span>
        </div>
    </div>
</div>
<?php
}
$language = "arabic";
if ($language=="english"){
    $others= "other";
    
    $formLabels = array(
        "file"=>"Upload Paper*",
        "arabicHeading"=>"Paper Arabic Heading*",
        "englishHeading"=>"Paper English Heading",
        "arabicDescription"=>"Paper Arabic Description",
        "englishDescription"=>"Paper English Description",
        "keyword"=>"Key Words*",
        "researchNumber"=>"English Publish Number*",
        
        "publishDate"=>"Publish Year*",
        "publishCountry"=>"Publish Country*",
        "researchType"=>"Research Type*",
        "specialization"=>"Specialization",
        "accurateSpecialization"=>"Accurate Specialization",

        "pagesCount"=>"Pages Count*",
        "pagesFrom"=>"Pages From",
        "pagesTo"=>"Pages To",
        
        "publisherInstitute"=>"Publisher Institute*",
        "publisher"=>"Publisher*",
        
        "mainAuthorName"=>"Main Author Name*",
        "AuthorscientificDegree"=>"Main Author Scientific Degree*",
        "AuthorInstitute"=>"Main Author Institute*",
        "AuthorJob"=>"Main Author Job*",
        
        "AuthorSpecialization"=>"Specialization",
        "AuthorAccurateSpecialization"=>"Accurate Specialization",
        "AuthorJobAddress"=>"Job Address",
        "AuthorJobPhone"=>"Job Phone",
        "AuthorMobileNumber"=>"Mobile Number",
        "AuthorMail"=>"E-Mail",
               

        
        "firstAuthorName"=>"first Author Name",
        "firstAuthorscientificDegree"=>"first Author Scientific Degree",
        "firstAuthorInstitute"=>"first Author Institute",
        "firstAuthorJob"=>"first Author Job",
        
        "secondAuthorName"=>"second Author Name",
        "secondAuthorscientificDegree"=>"second Author Scientific Degree",
        "secondAuthorInstitute"=>"second Author Institute",
        "secondAuthorJob"=>"second Author Job",
        
        
        "thirdAuthorName"=>"third Author Name",
        "thirdAuthorscientificDegree"=>"third Author Scientific Degree",
        "thirdAuthorInstitute"=>"third Author Institute",
        "thirdAuthorJob"=>"third Author Job",
        
        
        "fourthAuthorName"=>"fourth Author Name",
        "fourthAuthorscientificDegree"=>"fourth Author Scientific Degree",
        "fourthAuthorInstitute"=>"fourth Author Institute",
        "fourthAuthorJob"=>"fourth Author Job",
        
        
        "fifthAuthorName"=>"fifth Author Name",
        "fifthAuthorscientificDegree"=>"fifth Author Scientific Degree",
        "fifthAuthorInstitute"=>"fifth Author Institute",
        "fifthAuthorJob"=>"fifth Author Job",
        
        
        "sixthAuthorName"=>"sixth Author Name",
        "sixthAuthorscientificDegree"=>"sixth Author Scientific Degree",
        "sixthAuthorInstitute"=>"sixth Author Institute",
        "sixthAuthorJob"=>"sixth Author Job",
        
        
        "seventhAuthorName"=>"seventh Author Name",
        "seventhAuthorscientificDegree"=>"seventh Author Scientific Degree",
        "seventhAuthorInstitute"=>"seventh Author Institute",
        "seventhAuthorJob"=>"seventh Author Job",
        
        
        "eighthAuthorName"=>"eighth Author Name",
        "eighthAuthorscientificDegree"=>"eighth Author Scientific Degree",
        "eighthAuthorInstitute"=>"eighth Author Institute",
        "eighthAuthorJob"=>"eighth Author Job",
        
        
        "ninthAuthorName"=>"ninth Author Name",
        "ninthAuthorscientificDegree"=>"ninth Author Scientific Degree",
        "ninthAuthorInstitute"=>"ninth Author Institute",
        "ninthAuthorJob"=>"ninth Author Job",
        
                
        "tenthAuthorName"=>"tenth Author Name",
        "tenthAuthorscientificDegree"=>"tenth Author Scientific Degree",
        "tenthAuthorInstitute"=>"tenth Author Institute",
        "tenthAuthorJob"=>"tenth Author Job",
        "submit"=>"Enter",
        
        );
    
    
}
else if ($language=="arabic"){
    /*
    $others= "اخرى");
    $formLabels = array(
    "file"=>"اختر البحث*"),
    "arabicHeading"=>"عنوان البحث باللغة العربية*"),
    "englishHeading"=>"عنوان البحث باللغة الانجليزية"),
    "arabicDescription"=>"ملخص البحث باللغة العربية"),
    "englishDescription"=>"ملخص البحث باللغة الانجليزية"),
    "keyword"=>"الكلمات المفتاحية*"),
    "researchNumber"=>"العدد المنشور به البحث*"),
    "publishDate"=>"سنة النشر*"),
    "publishCountry"=>"بلد النشر*"),
    "researchType"=>"نوع البحث*"),
    "specialization"=>"التخصص"),
    "accurateSpecialization"=>"التخصص الدقيق"),


    "pagesCount"=>"عدد الصفحات*"),
    "pagesFrom"=>"الصفحات من"),
    "pagesTo"=>"الصفحات الى"),
    
    "publisherInstitute"=>"الهيئة التابع لها البحث*"),
    "publisher"=>"الناشر*"),
    
    "mainAuthorName"=>"اسم الباحث الرئيسي*"),
    "AuthorscientificDegree"=>"الدرجة العلمية للباحث الرئيسي*"),
    "AuthorInstitute"=>"الهيئة التابع لها الباحث الرئيسي*"),
    "AuthorJob"=>"وظيفة الباحث الرئيسي*"),
    
    "AuthorSpecialization"=>"تخصص الباحث الرئيسي"),
    "AuthorAccurateSpecialization"=>"التخصص الدقيق للباحث الرئيسي"),
    "AuthorJobAddress"=>"عنوان وظيفة الباحث الرئيسي"),
    "AuthorJobPhone"=>"رقم هاتف وظيفة الباحث الرئيسي"),
    "AuthorMobileNumber"=>"الهاتف الشخصي للباحث الرئيسي"),
    "AuthorMail"=>"البريد الالكتروني للباحث الرئيسي"),
    

    
    "firstAuthorName"=>"اسم الباحث الاول"),
    "firstAuthorscientificDegree"=>"الدرجة العلمية للباحث الاول"),
    "firstAuthorInstitute"=>"الهيئة التابع لها الباحث الاول"),
    "firstAuthorJob"=>"وظيفة الباحث الاول"),
    
    "secondAuthorName"=>"اسم الباحث الثاني"),
    "secondAuthorscientificDegree"=>"الدرجة العلمية للباحث الثاني"),
    "secondAuthorInstitute"=>"الهيئة التابع لها الباحث الثاني"),
    "secondAuthorJob"=>"وظيفة الباحث الثاني"),
    
    
    "thirdAuthorName"=>"اسم الباحث الثالث"),
    "thirdAuthorscientificDegree"=>"الدرجة العلمية للباحث الثالث"),
    "thirdAuthorInstitute"=>"الهيئة التابع لها الباحث الثالث"),
    "thirdAuthorJob"=>"وظيفة الباحث الثالث"),
    
    
    "fourthAuthorName"=>"اسم الباحث الرابع"),
    "fourthAuthorscientificDegree"=>"الدرجة العلمية للباحث الرابع"),
    "fourthAuthorInstitute"=>"الهيئة التابع لها الباحث الرابع"),
    "fourthAuthorJob"=>"وظيفة الباحث الرابع"),
    
    
    "fifthAuthorName"=>"اسم الباحث الخامس"),
    "fifthAuthorscientificDegree"=>"الدرجة العلمية للباحث الخامس"),
    "fifthAuthorInstitute"=>"الهيئة التابع لها الباحث الخامس"),
    "fifthAuthorJob"=>"وظيفة الباحث الخامس"),
    
    
    "sixthAuthorName"=>"اسم الباحث السادس"),
    "sixthAuthorscientificDegree"=>"الدرجة العلمية للباحث السادس"),
    "sixthAuthorInstitute"=>"الهيئة التابع لها الباحث السادس"),
    "sixthAuthorJob"=>"وظيفة الباحث السادس"),
    
    "seventhAuthorName"=>"اسم الباحث السابع"),
    "seventhAuthorscientificDegree"=>"الدرجة العلمية للباحث السابع"),
    "seventhAuthorInstitute"=>"الهيئة التابع لها الباحث السابع"),
    "seventhAuthorJob"=>"وظيفة الباحث السابع"),
    
    "eighthAuthorName"=>"اسم الباحث الثامن"),
    "eighthAuthorscientificDegree"=>"الدرجة العلمية للباحث الثامن"),
    "eighthAuthorInstitute"=>"الهيئة التابع لها الباحث الثامن"),
    "eighthAuthorJob"=>"وظيفة الباحث الثامن"),
    
    
    "ninthAuthorName"=>"اسم الباحث التاسع"),
    "ninthAuthorscientificDegree"=>"الدرجة العلمية للباحث التاسع"),
    "ninthAuthorInstitute"=>"الهيئة التابع لها الباحث التاسع"),
    "ninthAuthorJob"=>"وظيفة الباحث التاسع"),
    
    
    
    "tenthAuthorName"=>"اسم الباحث العاشر"),
    "tenthAuthorscientificDegree"=>"الدرجة العلمية للباحث العاشر"),
    "tenthAuthorInstitute"=>"الهيئة التابع لها الباحث العاشر"),
    "tenthAuthorJob"=>"وظيفة الباحث العاشر"),
    "submit"=>"ادخال"),
    );
     */
    $others= "اخرى";
    $formLabels = array(
        "file"=>"اختر البحث*",
        "arabicHeading"=>"عنوان البحث باللغة العربية*",
        "englishHeading"=>"عنوان البحث باللغة الانجليزية",
        "arabicDescription"=>"ملخص البحث باللغة العربية",
        "englishDescription"=>"ملخص البحث باللغة الانجليزية",
        "keyword"=>"الكلمات المفتاحية*",
        "researchNumber"=>"العدد المنشور به البحث*",
            "publishDate"=>"سنة النشر*",
        "publishCountry"=>"بلد النشر*",
        "researchType"=>"نوع البحث*",
        "specialization"=>"التخصص",
        "accurateSpecialization"=>"التخصص الدقيق",


        "pagesCount"=>"عدد الصفحات*",
        "pagesFrom"=>"الصفحات من",
        "pagesTo"=>"الصفحات الى",
        
        "publisherInstitute"=>"الهيئة التابع لها البحث*",
        "publisher"=>"الناشر*",
        
        "mainAuthorName"=>"اسم الباحث الرئيسي*",
        "AuthorscientificDegree"=>"الدرجة العلمية للباحث الرئيسي*",
        "AuthorInstitute"=>"الهيئة التابع لها الباحث الرئيسي*",
        "AuthorJob"=>"وظيفة الباحث الرئيسي*",
        
        "AuthorSpecialization"=>"تخصص الباحث الرئيسي",
        "AuthorAccurateSpecialization"=>"التخصص الدقيق للباحث الرئيسي",
        "AuthorJobAddress"=>"عنوان وظيفة الباحث الرئيسي",
        "AuthorJobPhone"=>"رقم هاتف وظيفة الباحث الرئيسي",
        "AuthorMobileNumber"=>"الهاتف الشخصي للباحث الرئيسي",
        "AuthorMail"=>"البريد الالكتروني للباحث الرئيسي",
               

        
        "firstAuthorName"=>"اسم الباحث الاول",
        "firstAuthorscientificDegree"=>"الدرجة العلمية للباحث الاول",
        "firstAuthorInstitute"=>"الهيئة التابع لها الباحث الاول",
        "firstAuthorJob"=>"وظيفة الباحث الاول",
        
        "secondAuthorName"=>"اسم الباحث الثاني",
        "secondAuthorscientificDegree"=>"الدرجة العلمية للباحث الثاني",
        "secondAuthorInstitute"=>"الهيئة التابع لها الباحث الثاني",
        "secondAuthorJob"=>"وظيفة الباحث الثاني",
       
        
        "thirdAuthorName"=>"اسم الباحث الثالث",
        "thirdAuthorscientificDegree"=>"الدرجة العلمية للباحث الثالث",
        "thirdAuthorInstitute"=>"الهيئة التابع لها الباحث الثالث",
        "thirdAuthorJob"=>"وظيفة الباحث الثالث",
          
        
        "fourthAuthorName"=>"اسم الباحث الرابع",
        "fourthAuthorscientificDegree"=>"الدرجة العلمية للباحث الرابع",
        "fourthAuthorInstitute"=>"الهيئة التابع لها الباحث الرابع",
        "fourthAuthorJob"=>"وظيفة الباحث الرابع",
       
        
        "fifthAuthorName"=>"اسم الباحث الخامس",
        "fifthAuthorscientificDegree"=>"الدرجة العلمية للباحث الخامس",
        "fifthAuthorInstitute"=>"الهيئة التابع لها الباحث الخامس",
        "fifthAuthorJob"=>"وظيفة الباحث الخامس",
            
     
        "sixthAuthorName"=>"اسم الباحث السادس",
        "sixthAuthorscientificDegree"=>"الدرجة العلمية للباحث السادس",
        "sixthAuthorInstitute"=>"الهيئة التابع لها الباحث السادس",
        "sixthAuthorJob"=>"وظيفة الباحث السادس",
            
        "seventhAuthorName"=>"اسم الباحث السابع",
        "seventhAuthorscientificDegree"=>"الدرجة العلمية للباحث السابع",
        "seventhAuthorInstitute"=>"الهيئة التابع لها الباحث السابع",
        "seventhAuthorJob"=>"وظيفة الباحث السابع",
             
        "eighthAuthorName"=>"اسم الباحث الثامن",
        "eighthAuthorscientificDegree"=>"الدرجة العلمية للباحث الثامن",
        "eighthAuthorInstitute"=>"الهيئة التابع لها الباحث الثامن",
        "eighthAuthorJob"=>"وظيفة الباحث الثامن",
              
        
        "ninthAuthorName"=>"اسم الباحث التاسع",
        "ninthAuthorscientificDegree"=>"الدرجة العلمية للباحث التاسع",
        "ninthAuthorInstitute"=>"الهيئة التابع لها الباحث التاسع",
        "ninthAuthorJob"=>"وظيفة الباحث التاسع",
               
                
        
          "tenthAuthorName"=>"اسم الباحث العاشر",
        "tenthAuthorscientificDegree"=>"الدرجة العلمية للباحث العاشر",
        "tenthAuthorInstitute"=>"الهيئة التابع لها الباحث العاشر",
        "tenthAuthorJob"=>"وظيفة الباحث العاشر",
       "submit"=>"ادخال",)
          ;
}

$file = isset($file)&&!empty($file)?$file:"";
$arabicHeading = isset($arabicHeading)&&!empty($arabicHeading)?$arabicHeading:"";
$englishHeading = isset($englishHeading)&&!empty($englishHeading)?$englishHeading:"";
$arabicDescription = isset($arabicDescription)&&!empty($arabicDescription)?$arabicDescription:"";
$englishDescription = isset($englishDescription)&&!empty($englishDescription)?$englishDescription:"";
$keyword = isset($keyword)&&!empty($keyword)?$keyword:"";
$researchNumber= isset($researchNumber)&&!empty($researchNumber)?$researchNumber:"";
$publishDate= isset($publishDate)&&!empty($publishDate)?$publishDate:"";
$publishCountry= isset($publishCountry)&&!empty($publishCountry)?$publishCountry:"";
$researchType= isset($researchType)&&!empty($researchType)?$researchType:"";
$specialization= isset($specialization)&&!empty($specialization)?$specialization:"";
$accurateSpecialization= isset($accurateSpecialization)&&!empty($accurateSpecialization)?$accurateSpecialization:"";
$pagesCount= isset($pagesCount)&&!empty($pagesCount)?$pagesCount:"";
$pagesFrom= isset($pagesFrom)&&!empty($pagesFrom)?$pagesFrom:"";
$pagesTo= isset($pagesTo)&&!empty($pagesTo)?$pagesTo:"";
$publisherInstitute= isset($publisherInstitute)&&!empty($publisherInstitute)?$publisherInstitute:"";
$publisher= isset($publisher)&&!empty($publisher)?$publisher:"";
$mainAuthorName= isset($mainAuthorName)&&!empty($mainAuthorName)?$mainAuthorName:"";
$AuthorscientificDegree= isset($AuthorscientificDegree)&&!empty($AuthorscientificDegree)?$AuthorscientificDegree:"";
$AuthorInstitute= isset($AuthorInstitute)&&!empty($AuthorInstitute)?$AuthorInstitute:"";
$AuthorJob= isset($AuthorJob)&&!empty($AuthorJob)?$AuthorJob:"";
$AuthorSpecialization= isset($AuthorSpecialization)&&!empty($AuthorSpecialization)?$AuthorSpecialization:"";
$AuthorAccurateSpecialization= isset($AuthorAccurateSpecialization)&&!empty($AuthorAccurateSpecialization)?$AuthorAccurateSpecialization:"";
$AuthorJobAddress= isset($AuthorJobAddress)&&!empty($AuthorJobAddress)?$AuthorJobAddress:"";
$AuthorJobPhone= isset($AuthorJobPhone)&&!empty($AuthorJobPhone)?$AuthorJobPhone:"";
$AuthorMobileNumber= isset($AuthorMobileNumber)&&!empty($AuthorMobileNumber)?$AuthorMobileNumber:"";
$AuthorMail= isset($AuthorMail)&&!empty($AuthorMail)?$AuthorMail:"";
$firstAuthorName= isset($firstAuthorName)&&!empty($firstAuthorName)?$firstAuthorName:"";
$firstAuthorscientificDegree= isset($firstAuthorscientificDegree)&&!empty($firstAuthorscientificDegree)?$firstAuthorscientificDegree:"";
$firstAuthorInstitute= isset($firstAuthorInstitute)&&!empty($firstAuthorInstitute)?$firstAuthorInstitute:"";
$firstAuthorJob= isset($firstAuthorJob)&&!empty($firstAuthorJob)?$firstAuthorJob:"";
$secondAuthorName= isset($secondAuthorName)&&!empty($secondAuthorName)?$secondAuthorName:"";
$secondAuthorscientificDegree= isset($secondAuthorscientificDegree)&&!empty($secondAuthorscientificDegree)?$secondAuthorscientificDegree:"";
$secondAuthorInstitute= isset($secondAuthorInstitute)&&!empty($secondAuthorInstitute)?$secondAuthorInstitute:"";
$secondAuthorJob= isset($secondAuthorJob)&&!empty($secondAuthorJob)?$secondAuthorJob:"";
$thirdAuthorName= isset($thirdAuthorName)&&!empty($thirdAuthorName)?$thirdAuthorName:"";
$thirdAuthorscientificDegree= isset($thirdAuthorscientificDegree)&&!empty($thirdAuthorscientificDegree)?$thirdAuthorscientificDegree:"";
$thirdAuthorInstitute= isset($thirdAuthorInstitute)&&!empty($thirdAuthorInstitute)?$thirdAuthorInstitute:"";
$thirdAuthorJob= isset($thirdAuthorJob)&&!empty($thirdAuthorJob)?$thirdAuthorJob:"";
$fourthAuthorName= isset($fourthAuthorName)&&!empty($fourthAuthorName)?$fourthAuthorName:"";
$fourthAuthorscientificDegree= isset($fourthAuthorscientificDegree)&&!empty($fourthAuthorscientificDegree)?$fourthAuthorscientificDegree:"";
$fourthAuthorInstitute= isset($fourthAuthorInstitute)&&!empty($fourthAuthorInstitute)?$fourthAuthorInstitute:"";
$fourthAuthorJob= isset($fourthAuthorJob)&&!empty($fourthAuthorJob)?$fourthAuthorJob:"";
$fifthAuthorName= isset($fifthAuthorName)&&!empty($fifthAuthorName)?$fifthAuthorName:"";
$fifthAuthorscientificDegree= isset($fifthAuthorscientificDegree)&&!empty($fifthAuthorscientificDegree)?$fifthAuthorscientificDegree:"";
$fifthAuthorInstitute= isset($fifthAuthorInstitute)&&!empty($fifthAuthorInstitute)?$fifthAuthorInstitute:"";
$fifthAuthorJob= isset($fifthAuthorJob)&&!empty($fifthAuthorJob)?$fifthAuthorJob:"";
$sixthAuthorName= isset($sixthAuthorName)&&!empty($sixthAuthorName)?$sixthAuthorName:"";
$sixthAuthorscientificDegree= isset($sixthAuthorscientificDegree)&&!empty($sixthAuthorscientificDegree)?$sixthAuthorscientificDegree:"";
$sixthAuthorInstitute= isset($sixthAuthorInstitute)&&!empty($sixthAuthorInstitute)?$sixthAuthorInstitute:"";
$sixthAuthorJob= isset($sixthAuthorJob)&&!empty($sixthAuthorJob)?$sixthAuthorJob:"";
$seventhAuthorName= isset($seventhAuthorName)&&!empty($seventhAuthorName)?$seventhAuthorName:"";
$seventhAuthorscientificDegree= isset($seventhAuthorscientificDegree)&&!empty($seventhAuthorscientificDegree)?$seventhAuthorscientificDegree:"";
$seventhAuthorInstitute= isset($seventhAuthorInstitute)&&!empty($seventhAuthorInstitute)?$seventhAuthorInstitute:"";
$seventhAuthorJob= isset($seventhAuthorJob)&&!empty($seventhAuthorJob)?$seventhAuthorJob:"";
$eighthAuthorName= isset($eighthAuthorName)&&!empty($eighthAuthorName)?$eighthAuthorName:"";
$eighthAuthorscientificDegree= isset($eighthAuthorscientificDegree)&&!empty($eighthAuthorscientificDegree)?$eighthAuthorscientificDegree:"";
$eighthAuthorInstitute= isset($eighthAuthorInstitute)&&!empty($eighthAuthorInstitute)?$eighthAuthorInstitute:"";
$eighthAuthorJob= isset($eighthAuthorJob)&&!empty($eighthAuthorJob)?$eighthAuthorJob:"";
$ninthAuthorName= isset($ninthAuthorName)&&!empty($ninthAuthorName)?$ninthAuthorName:"";
$ninthAuthorscientificDegree= isset($ninthAuthorscientificDegree)&&!empty($ninthAuthorscientificDegree)?$ninthAuthorscientificDegree:"";
$ninthAuthorInstitute= isset($ninthAuthorInstitute)&&!empty($ninthAuthorInstitute)?$ninthAuthorInstitute:"";
$ninthAuthorJob= isset($ninthAuthorJob)&&!empty($ninthAuthorJob)?$ninthAuthorJob:"";
$tenthAuthorName= isset($tenthAuthorName)&&!empty($tenthAuthorName)?$tenthAuthorName:"";
$tenthAuthorscientificDegree= isset($tenthAuthorscientificDegree)&&!empty($tenthAuthorscientificDegree)?$tenthAuthorscientificDegree:"";
$tenthAuthorInstitute= isset($tenthAuthorInstitute)&&!empty($tenthAuthorInstitute)?$tenthAuthorInstitute:"";
$tenthAuthorJob= isset($tenthAuthorJob)&&!empty($tenthAuthorJob)?$tenthAuthorJob:"";

$researchNumberErrors=
$publishDateErrors=
$publishCountryErrors=
$researchTypeErrors=
$specializationErrors=
$accurateSpecializationErrors=
$pagesCountErrors=
$pagesFromErrors=
$pagesToErrors=
$publisherInstituteErrors=
$publisherErrors=
$mainAuthorNameErrors=
$AuthorscientificDegreeErrors=
$AuthorInstituteErrors=
$AuthorJobErrors=
$AuthorSpecializationErrors=
$AuthorAccurateSpecializationErrors=
$AuthorJobAddressErrors=
$AuthorJobPhoneErrors=
$AuthorMobileNumberErrors=
$AuthorMailErrors=
$firstAuthorNameErrors=
$firstAuthorscientificDegreeErrors=
$firstAuthorInstituteErrors=
$firstAuthorJobErrors=
$secondAuthorNameErrors=
$secondAuthorscientificDegreeErrors=
$secondAuthorInstituteErrors=
$secondAuthorJobErrors=
$thirdAuthorNameErrors=
$thirdAuthorscientificDegreeErrors=
$thirdAuthorInstituteErrors=
$thirdAuthorJobErrors=
$fourthAuthorNameErrors=
$fourthAuthorscientificDegreeErrors=
$fourthAuthorInstituteErrors=
$fourthAuthorJobErrors=
$fifthAuthorNameErrors=
$fifthAuthorscientificDegreeErrors=
$fifthAuthorInstituteErrors=
$fifthAuthorJobErrors=
$sixthAuthorNameErrors=
$sixthAuthorscientificDegreeErrors=
$sixthAuthorInstituteErrors=
$sixthAuthorJobErrors=
$seventhAuthorNameErrors=
$seventhAuthorscientificDegreeErrors=
$seventhAuthorInstituteErrors=
$seventhAuthorJobErrors=
$eighthAuthorNameErrors=
$eighthAuthorscientificDegreeErrors=
$eighthAuthorInstituteErrors=
$eighthAuthorJobErrors=
$ninthAuthorNameErrors=
$ninthAuthorscientificDegreeErrors=
$ninthAuthorInstituteErrors=
$ninthAuthorJobErrors=
$tenthAuthorNameErrors=
$tenthAuthorscientificDegreeErrors=
$tenthAuthorInstituteErrors=
$tenthAuthorJobErrors=
$englishDescriptionErrors = 
$arabicDescriptionErrors= 
$englishHeadingErrors = 
$arabicHeadingErrors  = 
$fileErrors = array();

if($language == "arabic"){
    $keywordErrors = array("كل كلمة في سطر");   
}
else if ($language=="english"){
    $keywordErrors = array("Line in Each");            
}


if (isset($errors) && !empty($errors)){
    $fileErrors = isset($errors["file"])&&!empty($errors["file"])?$errors["file"]:$fileErrors;
    $arabicHeadingErrors = isset($errors["arabicHeading"])&&!empty($errors["arabicHeading"])?$errors["arabicHeading"]:$arabicHeadingErrors;
    $englishHeadingErrors = isset($errors["englishHeading"])&&!empty($errors["englishHeading"])?$errors["englishHeading"]:$englishHeadingErrors;
    $arabicDescriptionErrors = isset($errors["arabicDescription"])&&!empty($errors["arabicDescription"])?$errors["arabicDescription"]:$arabicDescriptionErrors;
    $englishDescriptionErrors = isset($errors["englishDescription"])&&!empty($errors["englishDescription"])?$errors["englishDescription"]:$englishDescriptionErrors;
    $keywordErrors = isset($errors["keyword"])&&!empty($errors["keyword"])?$errors["keyword"]:$keywordErrors;
    $researchNumberErrors=isset($errors["researchNumber"])&&!empty($errors["researchNumber"])?$errors["researchNumber"]:$researchNumberErrors;
    $publishDateErrors=isset($errors["publishDate"])&&!empty($errors["publishDate"])?$errors["publishDate"]:$publishDateErrors;
    $publishCountryErrors=isset($errors["publishCountry"])&&!empty($errors["publishCountry"])?$errors["publishCountry"]:$publishCountryErrors;
    $researchTypeErrors=isset($errors["researchType"])&&!empty($errors["researchType"])?$errors["researchType"]:$researchTypeErrors;
    $specializationErrors=isset($errors["specialization"])&&!empty($errors["specialization"])?$errors["specialization"]:$specializationErrors;
    $accurateSpecializationErrors=isset($errors["accurateSpecialization"])&&!empty($errors["accurateSpecialization"])?$errors["accurateSpecialization"]:$accurateSpecializationErrors;
    $pagesCountErrors=isset($errors["pagesCount"])&&!empty($errors["pagesCount"])?$errors["pagesCount"]:$pagesCountErrors;
    $pagesFromErrors=isset($errors["pagesFrom"])&&!empty($errors["pagesFrom"])?$errors["pagesFrom"]:$pagesFromErrors;
    $pagesToErrors=isset($errors["pagesTo"])&&!empty($errors["pagesTo"])?$errors["pagesTo"]:$pagesToErrors;
    $publisherInstituteErrors=isset($errors["publisherInstitute"])&&!empty($errors["publisherInstitute"])?$errors["publisherInstitute"]:$publisherInstituteErrors;
    $publisherErrors=isset($errors["publisher"])&&!empty($errors["publisher"])?$errors["publisher"]:$publisherErrors;
    $mainAuthorNameErrors=isset($errors["mainAuthorName"])&&!empty($errors["mainAuthorName"])?$errors["mainAuthorName"]:$mainAuthorNameErrors;
    $AuthorscientificDegreeErrors=isset($errors["AuthorscientificDegree"])&&!empty($errors["AuthorscientificDegree"])?$errors["AuthorscientificDegree"]:$AuthorscientificDegreeErrors;
    $AuthorInstituteErrors=isset($errors["AuthorInstitute"])&&!empty($errors["AuthorInstitute"])?$errors["AuthorInstitute"]:$AuthorInstituteErrors;
    $AuthorJobErrors=isset($errors["AuthorJob"])&&!empty($errors["AuthorJob"])?$errors["AuthorJob"]:$AuthorJobErrors;
    $AuthorSpecializationErrors=isset($errors["AuthorSpecialization"])&&!empty($errors["AuthorSpecialization"])?$errors["AuthorSpecialization"]:$AuthorSpecializationErrors;
    $AuthorAccurateSpecializationErrors=isset($errors["AuthorAccurateSpecialization"])&&!empty($errors["AuthorAccurateSpecialization"])?$errors["AuthorAccurateSpecialization"]:$AuthorAccurateSpecializationErrors;
    $AuthorJobAddressErrors=isset($errors["AuthorJobAddress"])&&!empty($errors["AuthorJobAddress"])?$errors["AuthorJobAddress"]:$AuthorJobAddressErrors;
    $AuthorJobPhoneErrors=isset($errors["AuthorJobPhone"])&&!empty($errors["AuthorJobPhone"])?$errors["AuthorJobPhone"]:$AuthorJobPhoneErrors;
    $AuthorMobileNumberErrors=isset($errors["AuthorMobileNumber"])&&!empty($errors["AuthorMobileNumber"])?$errors["AuthorMobileNumber"]:$AuthorMobileNumberErrors;
    $AuthorMailErrors=isset($errors["AuthorMail"])&&!empty($errors["AuthorMail"])?$errors["AuthorMail"]:$AuthorMailErrors;
    $firstAuthorNameErrors=isset($errors["firstAuthorName"])&&!empty($errors["firstAuthorName"])?$errors["firstAuthorName"]:$firstAuthorNameErrors;
    $firstAuthorscientificDegreeErrors=isset($errors["firstAuthorscientificDegree"])&&!empty($errors["firstAuthorscientificDegree"])?$errors["firstAuthorscientificDegree"]:$firstAuthorscientificDegreeErrors;
    $firstAuthorInstituteErrors=isset($errors["firstAuthorInstitute"])&&!empty($errors["firstAuthorInstitute"])?$errors["firstAuthorInstitute"]:$firstAuthorInstituteErrors;
    $firstAuthorJobErrors=isset($errors["firstAuthorJob"])&&!empty($errors["firstAuthorJob"])?$errors["firstAuthorJob"]:$firstAuthorJobErrors;
    $secondAuthorNameErrors=isset($errors["secondAuthorName"])&&!empty($errors["secondAuthorName"])?$errors["secondAuthorName"]:$secondAuthorNameErrors;
    $secondAuthorscientificDegreeErrors=isset($errors["secondAuthorscientificDegree"])&&!empty($errors["secondAuthorscientificDegree"])?$errors["secondAuthorscientificDegree"]:$secondAuthorscientificDegreeErrors;
    $secondAuthorInstituteErrors=isset($errors["secondAuthorInstitute"])&&!empty($errors["secondAuthorInstitute"])?$errors["secondAuthorInstitute"]:$secondAuthorInstituteErrors;
    $secondAuthorJobErrors=isset($errors["secondAuthorJob"])&&!empty($errors["secondAuthorJob"])?$errors["secondAuthorJob"]:$secondAuthorJobErrors;
    $thirdAuthorNameErrors=isset($errors["thirdAuthorName"])&&!empty($errors["thirdAuthorName"])?$errors["thirdAuthorName"]:$thirdAuthorNameErrors;
    $thirdAuthorscientificDegreeErrors=isset($errors["thirdAuthorscientificDegree"])&&!empty($errors["thirdAuthorscientificDegree"])?$errors["thirdAuthorscientificDegree"]:$thirdAuthorscientificDegreeErrors;
    $thirdAuthorInstituteErrors=isset($errors["thirdAuthorInstitute"])&&!empty($errors["thirdAuthorInstitute"])?$errors["thirdAuthorInstitute"]:$thirdAuthorInstituteErrors;
    $thirdAuthorJobErrors=isset($errors["thirdAuthorJob"])&&!empty($errors["thirdAuthorJob"])?$errors["thirdAuthorJob"]:$thirdAuthorJobErrors;
    $fourthAuthorNameErrors=isset($errors["fourthAuthorName"])&&!empty($errors["fourthAuthorName"])?$errors["fourthAuthorName"]:$fourthAuthorNameErrors;
    $fourthAuthorscientificDegreeErrors=isset($errors["fourthAuthorscientificDegree"])&&!empty($errors["fourthAuthorscientificDegree"])?$errors["fourthAuthorscientificDegree"]:$fourthAuthorscientificDegreeErrors;
    $fourthAuthorInstituteErrors=isset($errors["fourthAuthorInstitute"])&&!empty($errors["fourthAuthorInstitute"])?$errors["fourthAuthorInstitute"]:$fourthAuthorInstituteErrors;
    $fourthAuthorJobErrors=isset($errors["fourthAuthorJob"])&&!empty($errors["fourthAuthorJob"])?$errors["fourthAuthorJob"]:$fourthAuthorJobErrors;
    $fifthAuthorNameErrors=isset($errors["fifthAuthorName"])&&!empty($errors["fifthAuthorName"])?$errors["fifthAuthorName"]:$fifthAuthorNameErrors;
    $fifthAuthorscientificDegreeErrors=isset($errors["fifthAuthorscientificDegree"])&&!empty($errors["fifthAuthorscientificDegree"])?$errors["fifthAuthorscientificDegree"]:$fifthAuthorscientificDegreeErrors;
    $fifthAuthorInstituteErrors=isset($errors["fifthAuthorInstitute"])&&!empty($errors["fifthAuthorInstitute"])?$errors["fifthAuthorInstitute"]:$fifthAuthorInstituteErrors;
    $fifthAuthorJobErrors=isset($errors["fifthAuthorJob"])&&!empty($errors["fifthAuthorJob"])?$errors["fifthAuthorJob"]:$fifthAuthorJobErrors;
    $sixthAuthorNameErrors=isset($errors["sixthAuthorName"])&&!empty($errors["sixthAuthorName"])?$errors["sixthAuthorName"]:$sixthAuthorNameErrors;
    $sixthAuthorscientificDegreeErrors=isset($errors["sixthAuthorscientificDegree"])&&!empty($errors["sixthAuthorscientificDegree"])?$errors["sixthAuthorscientificDegree"]:$sixthAuthorscientificDegreeErrors;
    $sixthAuthorInstituteErrors=isset($errors["sixthAuthorInstitute"])&&!empty($errors["sixthAuthorInstitute"])?$errors["sixthAuthorInstitute"]:$sixthAuthorInstituteErrors;
    $sixthAuthorJobErrors=isset($errors["sixthAuthorJob"])&&!empty($errors["sixthAuthorJob"])?$errors["sixthAuthorJob"]:$sixthAuthorJobErrors;
    $seventhAuthorNameErrors=isset($errors["seventhAuthorName"])&&!empty($errors["seventhAuthorName"])?$errors["seventhAuthorName"]:$seventhAuthorNameErrors;
    $seventhAuthorscientificDegreeErrors=isset($errors["seventhAuthorscientificDegree"])&&!empty($errors["seventhAuthorscientificDegree"])?$errors["seventhAuthorscientificDegree"]:$seventhAuthorscientificDegreeErrors;
    $seventhAuthorInstituteErrors=isset($errors["seventhAuthorInstitute"])&&!empty($errors["seventhAuthorInstitute"])?$errors["seventhAuthorInstitute"]:$seventhAuthorInstituteErrors;
    $seventhAuthorJobErrors=isset($errors["seventhAuthorJob"])&&!empty($errors["seventhAuthorJob"])?$errors["seventhAuthorJob"]:$seventhAuthorJobErrors;
    $eighthAuthorNameErrors=isset($errors["eighthAuthorName"])&&!empty($errors["eighthAuthorName"])?$errors["eighthAuthorName"]:$eighthAuthorNameErrors;
    $eighthAuthorscientificDegreeErrors=isset($errors["eighthAuthorscientificDegree"])&&!empty($errors["eighthAuthorscientificDegree"])?$errors["eighthAuthorscientificDegree"]:$eighthAuthorscientificDegreeErrors;
    $eighthAuthorInstituteErrors=isset($errors["eighthAuthorInstitute"])&&!empty($errors["eighthAuthorInstitute"])?$errors["eighthAuthorInstitute"]:$eighthAuthorInstituteErrors;
    $eighthAuthorJobErrors=isset($errors["eighthAuthorJob"])&&!empty($errors["eighthAuthorJob"])?$errors["eighthAuthorJob"]:$eighthAuthorJobErrors;
    $ninthAuthorNameErrors=isset($errors["ninthAuthorName"])&&!empty($errors["ninthAuthorName"])?$errors["ninthAuthorName"]:$ninthAuthorNameErrors;
    $ninthAuthorscientificDegreeErrors=isset($errors["ninthAuthorscientificDegree"])&&!empty($errors["ninthAuthorscientificDegree"])?$errors["ninthAuthorscientificDegree"]:$ninthAuthorscientificDegreeErrors;
    $ninthAuthorInstituteErrors=isset($errors["ninthAuthorInstitute"])&&!empty($errors["ninthAuthorInstitute"])?$errors["ninthAuthorInstitute"]:$ninthAuthorInstituteErrors;
    $ninthAuthorJobErrors=isset($errors["ninthAuthorJob"])&&!empty($errors["ninthAuthorJob"])?$errors["ninthAuthorJob"]:$ninthAuthorJobErrors;
    $tenthAuthorNameErrors=isset($errors["tenthAuthorName"])&&!empty($errors["tenthAuthorName"])?$errors["tenthAuthorName"]:$tenthAuthorNameErrors;
    $tenthAuthorscientificDegreeErrors=isset($errors["tenthAuthorscientificDegree"])&&!empty($errors["tenthAuthorscientificDegree"])?$errors["tenthAuthorscientificDegree"]:$tenthAuthorscientificDegreeErrors;
    $tenthAuthorInstituteErrors=isset($errors["tenthAuthorInstitute"])&&!empty($errors["tenthAuthorInstitute"])?$errors["tenthAuthorInstitute"]:$tenthAuthorInstituteErrors;
    $tenthAuthorJobErrors=isset($errors["tenthAuthorJob"])&&!empty($errors["tenthAuthorJob"])?$errors["tenthAuthorJob"]:$tenthAuthorJobErrors;
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="utf-8" />
    <title>Upload Paper | <?php echo SITENAME?></title>

    <?php 
    $this->load->view('shared/css');
    ?>
    <style>
        .error {
            border-color: red !important;
        }
        /* BTW alt-shift will pop a color picker 
  example color: followed  by alt shift will pop it
*/
        /*
Hide the label if placeholder is supported
*/

        .inputError {
            color: red;
        }

        body {
        }

        #registration-form {
            font-family: 'Open Sans Condensed', sans-serif;
            width: 100%;
            min-width: 250px;
            /*margin: 40px auto;*/
            position: relative;
            direction: rtl;
        }

            #registration-form .fieldset {
                /*background-color: #f7f3f4;*/
                /*border-radius: 3px;*/
            }

            #registration-form legend {
                text-align: center;
                background: #364351;
                width: 100%;
                padding: 30px 0;
                border-radius: 3px 3px 0 0;
                color: white;
                font-size: 2em;
            }

        .fieldset form {
            font-family: 'Droid Arabic Kufi', serif;
            margin: 0 auto;
            display: block;
            width: 100%;
            /*
            padding: 30px 20px;
            
            box-sizing: border-box;
            border-radius: 3px;
            border: 1px solid silver;
            
            -webkit-box-shadow: inset 0 1px 5px rgba(0,0,0,0.2);
            box-shadow: inset 0 1px 5px rgba(0,0,0,0.2), 0 1px rgba(255,255,255,.8);
            width: 100%;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            -ms-box-sizing: border-box;
            box-sizing: border-box;
            -webkit-transition: background-color .5s ease;
            -moz-transition: background-color .5s ease;
            -o-transition: background-color .5s ease;
            -ms-transition: background-color .5s ease;
            transition: background-color .5s ease;
                */
        }

        .placeholder #registration-form label {
            display: none;
        }

        .no-placeholder #registration-form label {
            margin-left: 5px;
            position: relative;
            display: block;
            color: grey;
            text-shadow: 0 1px white;
            font-weight: bold;
        }
        /* all */
        ::-webkit-input-placeholder {
            text-shadow: 1px 1px 1px white;
            font-weight: bold;
        }

        ::-moz-placeholder {
            text-shadow: 0 1px 1px white;
            font-weight: bold;
        }
        /* firefox 19+ */
        :-ms-input-placeholder {
            text-shadow: 0 1px 1px white;
            font-weight: bold;
        }
        /* ie */
        #registration-form input.upload {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0;
            font-size: 20px;
            width: 100%;
            height: 50px;
            cursor: pointer;
            opacity: 0;
            filter: alpha(opacity=0);
        }

        #registration-form .uploadDiv {
            border-radius: 1px;
            margin: 5px auto;
            color: black !important;
            background-color: #f7f7f7;
            border: 1px solid silver;
            -webkit-box-shadow: inset 0 1px 5px rgba(0,0,0,0.2);
            box-shadow: inset 0 1px 5px rgba(0,0,0,0.2), 0 1px rgba(255,255,255,.8);
            width: 100%;
            overflow: hidden;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            -ms-box-sizing: border-box;
            box-sizing: border-box;
            -webkit-transition: background-color .5s ease;
            -moz-transition: background-color .5s ease;
            -o-transition: background-color .5s ease;
            -ms-transition: background-color .5s ease;
            transition: background-color .5s ease;
        }
        /*
        {
            padding: 15px 20px;
            border-radius: 1px;
            margin: 5px auto;
            background-color: #f7f7f7;
            border: 1px solid silver;
            -webkit-box-shadow: inset 0 1px 5px rgba(0,0,0,0.2);
            box-shadow: inset 0 1px 5px rgba(0,0,0,0.2), 0 1px rgba(255,255,255,.8);
            width: 100%;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            -ms-box-sizing: border-box;
            box-sizing: border-box;
            -webkit-transition: background-color .5s ease;
            -moz-transition: background-color .5s ease;
            -o-transition: background-color .5s ease;
            -ms-transition: background-color .5s ease;
            transition: background-color .5s ease;
        }
        */

        #registration-form input[type=text], #registration-form select, #registration-form textarea, #registration-form input[type=number], input[type=email] {
            padding: 10px 15px;
            border-radius: 1px;
            margin: 5px auto;
            background-color: #f7f7f7;
            border: 1px solid silver;
            -webkit-box-shadow: inset 0 1px 5px rgba(0,0,0,0.2);
            box-shadow: inset 0 1px 5px rgba(0,0,0,0.2), 0 1px rgba(255,255,255,.8);
            width: 100%;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            -ms-box-sizing: border-box;
            box-sizing: border-box;
            -webkit-transition: background-color .5s ease;
            -moz-transition: background-color .5s ease;
            -o-transition: background-color .5s ease;
            -ms-transition: background-color .5s ease;
            transition: background-color .5s ease;
        }

            #registration-form textarea#arabicDescription, #registration-form textarea#englishDescription, #registration-form textarea#keyword {
                min-height: 200px;
            }

        .no-placeholder #registration-form input[type=text] {
            padding: 10px 20px;
        }

        #registration-form input[type=text]:active, .placeholder #registration-form input[type=text]:focus {
            outline: none;
            border-color: silver;
            background-color: white;
        }

        #registration-form input[type=submit] {
            font-family: 'Open Sans Condensed', sans-serif;
            text-transform: uppercase;
            outline: none;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            -ms-box-sizing: border-box;
            box-sizing: border-box;
            width: 100%;
            background-color: #5C8CA7;
            padding: 10px;
            color: white;
            border: 1px solid #3498db;
            border-radius: 3px;
            font-size: 1.5em;
            font-weight: bold;
            margin-top: 5px;
            cursor: pointer;
            position: relative;
            top: 0;
        }

            #registration-form input[type=submit]:hover {
                background-color: #2980b9;
            }

            #registration-form input[type=submit]:active {
                background: #5C8CA7;
            }


        .parsley-error-list {
            background-color: #C34343;
            padding: 5px 11px;
            margin: 0;
            list-style: none;
            border-radius: 0 0 3px 3px;
            margin-top: -5px;
            margin-bottom: 5px;
            color: white;
            border: 1px solid #870d0d;
            border-top: none;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            position: relative;
            top: -1px;
            text-shadow: 0px 1px 1px #460909;
            font-weight: 700;
            font-size: 12px;
        }

        .parsley-error {
            border-color: #870d0d !important;
            border-bottom: none;
        }

        #registration-form select {
            width: 100%;
            padding: 5px;
        }

        ::-moz-focus-inner {
            border: 0;
        }
    </style>
</head>

<body>
    <?php
    $this->load->view('shared/header');
    ?>
    <div class="main_bg">
        <div class="wrap">
            <div class="main">
                <div class="content">


                    <div id="registration-form">
                        <div class='fieldset'>
                            <form class="form form-inline"  method="post" action="<?php echo site_url("homecontroller/upload") ?>" enctype="multipart/form-data" id="myform">


                                <div class="row formElement">


                                    <div class="col-md-12">
                                        <div class="col-md-9">
                                            <div class="uploadDiv btn btn-default" id="file">
                                                <span><?php echo $formLabels["file"]?></span>
                                                <input type="file" class="upload" name="file" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <h4 class="form-label"><?php echo $formLabels["file"]?></h4>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                        
                                        <span class="inputError">
                                            <?php 
                                            foreach($fileErrors as $fileError){
                                                echo "<h4>{$fileError}</h4>";
                                            }
                                            ?>
                                        </span>
                                            </div>
                                    </div>
                                </div>
                                <hr />

                                <?php 
                                renderInput($formLabels["arabicHeading"] ,$arabicHeading , "arabicHeading" , $arabicHeadingErrors ,"text" , true );
                                renderInput($formLabels["englishHeading"] ,$englishHeading , "englishHeading" , $englishHeadingErrors ,"text" , true );
                                renderTextArea($formLabels["arabicDescription"] , $arabicDescription ,"arabicDescription" ,$arabicDescriptionErrors );
                                renderTextArea($formLabels["englishDescription"] , $englishDescription ,"englishDescription" ,$englishDescriptionErrors );
                                renderTextArea($formLabels["keyword"] , $keyword,"keyword" ,$keywordErrors  , true);
                                
                                ?>
                                <hr />
                                <div class="row">
                                    <div class="col-md-6">

                                
                                <?php
                                
                                renderInput($formLabels["researchNumber"] ,$researchNumber , "researchNumber" , $researchNumberErrors ,"number" , true );
                                renderInput($formLabels["publishDate"] ,$publishDate , "publishDate" , $publishDateErrors ,"number" , true );
                                renderInput($formLabels["publishCountry"] ,$publishCountry , "publishCountry" , $publishCountryErrors ,"text" , true );
                             
                                $select = array();
                                if (isset($researchtypes) && !empty($researchtypes)){
                                    
                                    foreach($researchtypes as $type){
                                        $select[$type->id] = $type->name;    
                                    }
                                }
                                
                                renderTextAreaOther($formLabels["researchType"]   , $others, $researchType , "researchType" ,$researchTypeErrors ,true  , $select);
                                
                                
                         
                                ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php 
                             
                                        $select = array();
                                        if (isset($specializatons) && !empty($specializatons)){
                                            
                                            foreach($specializatons as $spe){
                                                $select[$spe->id] = $spe->name;    
                                            }
                                        }
                                        renderTextAreaOther($formLabels["specialization"] ,$others , $specialization , "specialization" ,$specializationErrors  ,false , $select);
                                        
                         
                                        $select = array();
                                        if (isset($accurateSpecializations) && !empty($accurateSpecializations)){
                                            
                                            foreach($accurateSpecializations as $spe){
                                                $select[$spe->id] = $spe->name;    
                                            }
                                        }
                                        
                                renderTextAreaOther($formLabels["accurateSpecialization"]  , $others,  $accurateSpecialization, "accurateSpecialization" ,$accurateSpecializationErrors ,false,$select );
                                
                                renderInput($formLabels["pagesCount"] ,$pagesCount , "pagesCount" , $pagesCountErrors ,"number" , true );
                                renderInput($formLabels["pagesFrom"] ,$pagesFrom , "pagesFrom" , $pagesFromErrors ,"number"  );
                                renderInput($formLabels["pagesTo"] ,$pagesTo , "pagesTo" , $pagesToErrors ,"number"  );
                                        ?>
                                    </div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-md-6">
                                        <?php 
                                        
                                        $auth= array();
                                        if (isset($authors) && !empty($authors)){
                                            foreach($authors as $authorr){
                                                $auth[$authorr->id] = $authorr->name;
                                            }
                                        }
                                        renderSelect($formLabels["fifthAuthorName"]  , $fifthAuthorName, "fifthAuthorName" ,$fifthAuthorNameErrors ,false,$auth  );
                                        renderSelect($formLabels["sixthAuthorName"]  , $sixthAuthorName, "sixthAuthorName" ,$sixthAuthorNameErrors  ,false,$auth );
                                        renderSelect($formLabels["seventhAuthorName"]  , $seventhAuthorName, "seventhAuthorName" ,$seventhAuthorNameErrors,false,$auth   );
                                        renderSelect($formLabels["eighthAuthorName"]  , $eighthAuthorName, "eighthAuthorName" ,$eighthAuthorNameErrors ,false ,$auth );
                                        renderSelect($formLabels["ninthAuthorName"]  , $ninthAuthorName, "ninthAuthorName" ,$ninthAuthorNameErrors ,false,$auth  );
                                        renderSelect($formLabels["tenthAuthorName"]  , $tenthAuthorName, "tenthAuthorName" ,$tenthAuthorNameErrors  ,false,$auth );
                                        
                                        
                                        /*
                                        renderTextAreaOther($formLabels["AuthorscientificDegree"] ,$others , $AuthorscientificDegree, "AuthorscientificDegree" ,$AuthorscientificDegreeErrors , true  );
                                        renderTextAreaOther($formLabels["AuthorInstitute"] ,$others , $AuthorInstitute, "AuthorInstitute" ,$AuthorInstituteErrors  , true);
                                        renderTextAreaOther($formLabels["AuthorJob"] ,$others , $AuthorJob, "AuthorJob" ,$AuthorJobErrors ,true );
                                         */
                                        ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php 
                                        $pub = array();
                                        if (isset($publishers) && !empty($publishers)){
                                            foreach($publishers as $publisherr){
                                                $pub[$publisherr->id] = $publisherr->publisherName;
                                            }
                                        }
                                 
                                        
                                        //renderTextAreaOther($formLabels["publisherInstitute"] ,$others , $publisherInstitute, "publisherInstitute" ,$publisherInstituteErrors  , true);
                                        renderSelect($formLabels["publisher"] , $publisher ,"publisher" , $publisherErrors , true ,$pub  );
                                        renderSelect($formLabels["mainAuthorName"]  , $mainAuthorName, "mainAuthorName" ,$mainAuthorNameErrors , true ,$auth );
                                        renderSelect($formLabels["firstAuthorName"]  , $firstAuthorName, "firstAuthorName" ,$firstAuthorNameErrors  ,false ,$auth);            
                                        renderSelect($formLabels["secondAuthorName"]  , $secondAuthorName, "secondAuthorName" ,$secondAuthorNameErrors ,false,$auth  );
                                        renderSelect($formLabels["thirdAuthorName"]  , $thirdAuthorName, "thirdAuthorName" ,$thirdAuthorNameErrors ,false,$auth  );
                                        renderSelect($formLabels["fourthAuthorName"]  , $fourthAuthorName, "fourthAuthorName" ,$fourthAuthorNameErrors ,false  ,$auth);
                                        
                                        ?>
                                    </div>
                                </div>
                                <?php 
                                
                             
                                ?>
                                <input type="submit" value="<?php echo $formLabels["submit"]?>" />
                            </form>
                            <hr />
                            <div>

                                <div class="row">
                                    <div class="col-md-3 col-md-offset-8">
                                        <input type="button" class="btn btn-default" value="اضافة باحث او ناشر" id="institutes" />
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-md-3">
                                        <div class="row formElement">

                                            <div class="col-md-12">
                                                <div class="col-md-9">

                                                    <select class="pub">
                                                        <option value="-2222"></option>
                                                        <option value="-1"><?php echo $others?></option>
                                                    </select>

                                                    <input type="hidden" value="" class="otherPub" />
                                                    <a style="display: none; width: 100%" class="btn btn-default addPub">اضافة</a>

                                                </div>
                                                <div class="col-md-3">
                                                    <h4 class="form-label">ناشر</h4>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="row formElement">

                                            <div class="col-md-12">
                                                <div class="col-md-9">

                                                    <select class="auth">
                                                        <option value="-2222"></option>
                                                        <option value="-1"><?php echo $others?></option>
                                                    </select>


                                                </div>
                                                <div class="col-md-3">
                                                    <h4 class="form-label">باحث</h4>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="row formElement">

                                            <div class="col-md-12">
                                                <div class="col-md-9">

                                                    <select  class="institutes" name="<?php echo $publisherInstitute?>" id="<?php echo $publisherInstitute?>">
                                                        <option value="-2222"></option>
                                                        <?php 
                                                        foreach($institutes as $instit ){
                                                            echo "<option value='{$instit->id}'>{$instit->instituteName}</option>";
                                                        }
                                                        ?>
                                                        <option value="-1"><?php echo $others?></option>
                                                    </select>

                                                    <input type="hidden" value="" class="otherInstitute" name="<?php echo $publisherInstitute?>" />
                                                    <a style="display: none; width: 100%" class="btn btn-default addInstitute">اضافة</a>

                                                </div>
                                                <div class="col-md-3">
                                                    <h4 class="form-label">الهيئة</h4>
                                                </div>

                                            </div>

                                        </div>
                                    </div>


                                </div>
                                <div class="row addNewAuthor" style="display: none">
                                    <?php
                                    
                                    renderInput("اسم الباحث*" , "" , "newAuthName" , array() , "text" );
                                    
                                    $select = array();
                                    if (isset($jobs) && !empty($jobs)){
                                        
                                        foreach($jobs as $spe){
                                            $select[$spe->id] = $spe->name;    
                                        }
                                    }
                                    renderTextAreaOther("*الدرجة الوظيفية" , $others , "" , "newJob" ,array() ,false ,$select );
                                    
                                    
                                           $select = array();
                                    if (isset($specializatons) && !empty($specializatons)){
                                        
                                        foreach($specializatons as $spe){
                                            $select[$spe->id] = $spe->name;    
                                        }
                                    }
                                    
                                    renderTextAreaOther("التخصص" , $others , "" , "newAuthSpecialization" ,array() ,false , $select);
                                

                                        $select = array();
                                        if (isset($accurateSpecializations) && !empty($accurateSpecializations)){
                                            
                                            foreach($accurateSpecializations as $spe){
                                                $select[$spe->id] = $spe->name;    
                                            }
                                        }
                                    renderTextAreaOther("التخصص الدقيق" , $others , "" , "newAuthAccurateSpecialization" ,array() , false , $select );
                                    
                      
                                    
                                    $select = array();
                                    if (isset($scs) && !empty($scs)){
                                        
                                        foreach($scs as $spe){
                                            $select[$spe->id] = $spe->name;    
                                        }
                                    }
                                    renderTextAreaOther("الدرجة العلمية*" , $others , "" , "sientificDegree" ,array() , false , $select );
                                    renderTextArea("عنوان العمل" , "" , "AuthJobAddress" , array() );
                                    renderInput("هاتف العمل" , "" , "AuthJobPhone" , array() , "text" );
                                    renderInput("الهاتف الشخصي" , "" , "AuthMobile" , array() , "text" );
                                    renderInput("البريد الالكتروني" , "" , "AuthMail" , array() , "email" );
                                    
                                    ?>
                                    <div class="col-md-4 col-md-offset-4">

                                        <input type="button" value="اضافة" class="btn btn-default addAuth" style="" />
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- Modal -->
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <div class="modal-title">
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <p>Some text in the modal.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="modal-foot">
                                        </div>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    $this->load->view('shared/footer');
    ?>
    <?php 

    $this->load->view('shared/scripts');
    ?>
    <script charset="UTF-8">
        $(document).ready(function () {
            <?php 
            if($success!=""){
            ?>
            $(".modal-title").html("نجاح");

            $(".modal-body").html("تمت الاضافة بنجاح");

            $("#myModal").modal();
        <?php
            }
        ?>

            requiredFields =
            [
    "arabicHeading",
    "researchNumber",
        "keyword",
    "publishDate",
        "publishCountry",
    "researchType",
    "pagesCount",
    //"publisherInstitute",
        "publisher",
    "mainAuthorName",
    //"AuthorscientificDegree",
    //    "AuthorInstitute",
   // "AuthorJob",
            ];

            Errors = [];
            language = "arabic";
            function appendError(arabicMsg, englishMsg) {
                if (language == "arabic") {
                    Errors.push(arabicMsg);
                } else if (language == "english") {
                    Errors.push(englishMsg);
                }
            }
            $("#myform").submit(function (e) {

                valid = true;
                tempValid = true;
                Errors = [];


                for (var i = 0; i < requiredFields.length; i++) {
                    if (requiredFields[i] == "keyword") {

                        val = $("#" + requiredFields[i]).val();

                    } else {
                        val = $("#" + requiredFields[i]).val();
                    }
                    if (val == ""
                        || val == "-2222"
                        || val == null
                        ) {
                        valid = false;
                        tempValid = false;
                        $("#" + requiredFields[i]).addClass("error");
                        if (language == "arabic") {
                            //$("#" + requiredFields[i]).parents(".formElement").find(".inputError").html("مطلوب".replace(/&#(\d+);/g));
                            //alert(str.replace(/&#(\d+);/g));
                        }
                        //break;
                    }
                }
                if (!valid) {
                    appendError("اكمل البيانات المطلوبة !", "Please Fill In Required Fields !");
                    e.preventDefault();
                }
                error = "";
                for (var i = 0; i < Errors.length; i++) {
                    error += "<p>" + Errors[i] + "<p>";
                }
                if (language == "arabic") {
                    $(".modal-title").html("خطأ");
                }
                if (!valid) {
                    $(".modal-body").html(error);
                    $("#myModal").modal();
                }

            });
            $(".addBtn").click(function () {
                textVal = $(this).parents(".formElement").find(".otherText").val();
                type = $(this).attr("data-type");
                if (textVal != null && textVal != "") {
                    res = confirm("هل انت متأكد من اضاقة " + textVal);
                    if (res == true) {


                        if (type == "sientificDegree") {
                            $.post("<?php echo site_url("homecontroller/addsientificDegree")?>", "val=" + textVal, function (res) {
                                if (res.split(",")[0] == "success") {
                                    $("#sientificDegree option:last").before("<option selected='selected' value='" + res.split(",")[1] + "'>" + textVal + "</option>");
                                    //$(".sientificDegree").attr("value", res.split(",")[1]).text(textVal);

                                    $(".otherText").attr("type", "hidden");
                                    $(".addBtn").hide();
                                }
                            });
                        } else if (type == "newAuthAccurateSpecialization" || type == "accurateSpecialization") {
                            $.post("<?php echo site_url("homecontroller/addaccurateSpecialization")?>", "val=" + textVal, function (res) {
                                if (res.split(",")[0] == "success") {
                                    $("#accurateSpecialization option:last").before("<option selected='selected' value='" + res.split(",")[1] + "'>" + textVal + "</option>");
                                    //$(".accurateSpecialization").attr("value", res.split(",")[1]).text(textVal);
                                    $("#newAuthAccurateSpecialization option:last").before("<option selected='selected' value='" + res.split(",")[1] + "'>" + textVal + "</option>");
                                    //$(".newAuthAccurateSpecialization").attr("value", res.split(",")[1]).text(textVal);

                                    $(".otherText").attr("type", "hidden");
                                    $(".addBtn").hide();
                                }
                            });
                        } else if (type == "newAuthSpecialization" || type == "specialization") {
                            $.post("<?php echo site_url("homecontroller/addspecialization")?>", "val=" + textVal, function (res) {
                                if (res.split(",")[0] == "success") {
                                    $("#specialization option:last").before("<option selected='selected' value='" + res.split(",")[1] + "'>" + textVal + "</option>");
                                    $("#newAuthSpecialization option:last").before("<option selected='selected' value='" + res.split(",")[1] + "'>" + textVal + "</option>");
                                    //$(".newAuthSpecialization").attr("value", res.split(",")[1]).text(textVal);
                                    //$(".specialization").attr("value", res.split(",")[1]).text(textVal);

                                    $(".otherText").attr("type", "hidden");
                                    $(".addBtn").hide();
                                }
                            });
                        } else if (type == "newJob") {
                            $.post("<?php echo site_url("homecontroller/addnewJob")?>", "val=" + textVal, function (res) {
                                if (res.split(",")[0] == "success") {
                                    $("#newJob option:last").before("<option selected='selected' value='" + res.split(",")[1] + "'>" + textVal + "</option>");
                                    //$(".newJob").attr("value", res.split(",")[1]).text(textVal);

                                    $(".otherText").attr("type", "hidden");
                                    $(".addBtn").hide();
                                }
                            });
                        } else if (type == "researchType") {
                            $.post("<?php echo site_url("homecontroller/addresearchType")?>", "val=" + textVal, function (res) {
                                if (res.split(",")[0] == "success") {
                                    $("#researchType option:last").before("<option selected='selected' value='" + res.split(",")[1] + "'>" + textVal + "</option>");
                                    //$(".researchType").attr("value", res.split(",")[1]).text(textVal);

                                    $(".otherText").attr("type", "hidden");
                                    $(".addBtn").hide();
                                }
                            });
                        }
                        
                        /*
                        select = $(this).parents(".formElement").find(".select");
                        $(select).append($("<option selected='selected'></option>")
                        .attr("value", textVal)
                        .text(textVal));
                        */
                     


                    }


                }

            });





            $(".addInstitute").click(function () {
                val = $(".otherInstitute").val();
                if (val != null && val != "") {
                    res = confirm("هل انت متأكد من اضاقة " + val);
                    if (res == true) {
                        $.post("<?php echo site_url("homecontroller/addInstitute") ?>", "val=" + val, function (res) {
                    if (res.split(",")[0] == "success") {
                        $(".institutes option:last").before("<option selected='selected' value='" + res.split(",")[1] + "'>" + val + "</option>");
                        $(".otherInstitute").attr("type", "hidden");

                        $('.pub').find('option').remove().end().append('<option value="-2222"></option>').append('<option value="-1">اخرى</option>').val("-2222");
                        $('.auth').find('option').remove().end().append('<option value="-2222"></option>').append('<option value="-1">اخرى</option>').val("-2222");

                        $(".addInstitute").hide();
                    }
                });
            }
        }
            });






            $(".addAuth").click(function () {
                name = $("#newAuthName").val();
                job = $("#newJob").val();
                specification = $("#newAuthSpecialization").val();
                accurateSpecification = $("#newAuthAccurateSpecialization").val();
                sientificDegree = $("#sientificDegree").val();
                jobAddress = $("#AuthJobAddress").val();
                jobPhone = $("#AuthJobPhone").val();
                mobile = $("#AuthMobile").val();
                mail = $("#AuthMail").val();

                id = $(".institutes").val();

                if (name == null || name == "" || job == null || job == "" || job == "-1" || job == "-2222" || sientificDegree == null || sientificDegree == "" || sientificDegree == "-1" || sientificDegree == "-2222") {
                    alert("اكمل البيانات اولا");
                    return;
                }
                if (id != null && id != "" && id != "-1" && id != "-2222") {
                    $.post("<?php echo site_url("homecontroller/addAuthor") ?>",
                        "newAuthName=" + name
                        + "&newJob=" + job
                        + "&newAuthSpecialization=" + specification
                        + "&newAuthAccurateSpecialization=" + accurateSpecification
                        + "&sientificDegree=" + sientificDegree
                        + "&AuthJobAddress=" + jobAddress
                        + "&AuthJobPhone=" + jobPhone
                        + "&AuthMobile=" + mobile
                        + "&AuthMail=" + mail
                        + "&id=" + id
                        , function (res) {

                            if (res.split(",")[0] == "success") {

                                $(".auth option:last").before("<option selected='selected' value='" + res.split(",")[1] + "'>" + name + "</option>");
                                $(".addNewAuthor").fadeOut();

                                $("#mainAuthorName option:last").before("<option value='" + res.split(",")[1] + "'>" + name + "</option>");
                                $("#firstAuthorName option:last").before("<option value='" + res.split(",")[1] + "'>" + name + "</option>");
                                $("#secondAuthorName option:last").before("<option value='" + res.split(",")[1] + "'>" + name + "</option>");
                                $("#thirdAuthorName option:last").before("<option value='" + res.split(",")[1] + "'>" + name + "</option>");
                                $("#fourthAuthorName option:last").before("<option value='" + res.split(",")[1] + "'>" + name + "</option>");
                                $("#fifthAuthorName option:last").before("<option value='" + res.split(",")[1] + "'>" + name + "</option>");
                                $("#sixthAuthorName option:last").before("<option value='" + res.split(",")[1] + "'>" + name + "</option>");
                                $("#seventhAuthorName option:last").before("<option value='" + res.split(",")[1] + "'>" + name + "</option>");
                                $("#eighthAuthorName option:last").before("<option value='" + res.split(",")[1] + "'>" + name + "</option>");
                                $("#ninthAuthorName option:last").before("<option value='" + res.split(",")[1] + "'>" + name + "</option>");
                                $("#tenthAuthorName option:last").before("<option value='" + res.split(",")[1] + "'>" + name + "</option>");
                            }
                        });
                } else {
                    alert("اختر هيئة اولا");
                }

            });


            $(".addPub").click(function () {
                val = $(".otherPub").val();
                if (val != null && val != "") {

                    id = $(".institutes").val();
                    if (id != null && id != "" && id != "-1" && id != "-2222") {
                        res = confirm("هل انت متأكد من اضاقة " + val);
                        if (res == true) {
                            $.post("<?php echo site_url("homecontroller/addPublisher") ?>", "val=" + val + "&id=" + id, function (res) {
                                if (res.split(",")[0] == "success") {
                                    $(".pub option:last").before("<option selected='selected' value='" + res.split(",")[1] + "'>" + val + "</option>");

                                    $(".otherPub").attr("type", "hidden");

                                    $(".addPub").hide();

                                    $("#publisher option:last").before("<option value='" + res.split(",")[1] + "'>" + val + "</option>");
                                }
                            });
                        }
                    } else {
                        alert("اختر هيئة اولا");
                    }

                } else {
                    alert("ادخل اسم ناشر");
                }

            });
            $(".institutes").change(function () {
                val = $(this).val();

                $('.pub').find('option').remove().end().append('<option value="-2222"></option>').append('<option value="-1">اخرى</option>').val("-2222");
                $('.auth').find('option').remove().end().append('<option value="-2222"></option>').append('<option value="-1">اخرى</option>').val("-2222");
                if (val == "-1") {
                    text = $(this).parents(".formElement").find(".otherInstitute");
                    $(text).attr("type", "text");


                    button = $(this).parents(".formElement").find(".addInstitute");
                    $(button).show();
                } else {
                    if (val != "-2222") {

                        $.post("<?php echo site_url("homecontroller/getInstituteAuthors") ?>", "id=" + val, function (res) {
                            authors = res.split("&");
                            for (var i = 0; i < authors.length - 1; i++) {
                                author = authors[i].split(",");
                                id = author[0];
                                name = author[1];
                                $(".auth option:last").before("<option value='" + id + "'>" + name + "</option>");
                            }
                        });

                        $.post("<?php echo site_url("homecontroller/getInstitutePublishers") ?>", "id=" + val, function (res) {
                            publishers = res.split("&");
                            for (var i = 0; i < publishers.length - 1; i++) {
                                publiser = publishers[i].split(",");
                                id = publiser[0];
                                name = publiser[1];
                                $(".pub option:last").before("<option value='" + id + "'>" + name + "</option>");
                            }
                        });
                    }
                    {
                        text = $(this).parents(".formElement").find(".otherInstitute");
                        $(text).attr("type", "hidden");


                        button = $(this).parents(".formElement").find(".addInstitute");
                        $(button).hide();


                    }
                }

            });

            $(".auth").change(function () {
                val = $(this).val();
                if (val == "-1") {
                    $(".addNewAuthor").fadeIn();
                } else {
                    $(".addNewAuthor").fadeOut();

                }
            });

            $(".pub").change(function () {
                val = $(this).val();
                if (val == "-1") {
                    text = $(this).parents(".formElement").find(".otherPub");
                    $(text).attr("type", "text");


                    button = $(this).parents(".formElement").find(".addPub");
                    $(button).show();
                } else {
                    text = $(this).parents(".formElement").find(".otherPub");
                    $(text).attr("type", "hidden");


                    button = $(this).parents(".formElement").find(".addPub");
                    $(button).hide();

                }
            });
            $(".select").change(function () {
                val = $(this).val();
                if (val == "-1") {
                    text = $(this).parents(".formElement").find(".otherText");
                    $(text).attr("type", "text");


                    button = $(this).parents(".formElement").find(".addBtn");
                    $(button).show();
                } else {
                    text = $(this).parents(".formElement").find(".otherText");
                    $(text).attr("type", "hidden");


                    button = $(this).parents(".formElement").find(".addBtn");
                    $(button).hide();
                }
            });

            $("#myform input,#myform select ,#myform textarea").change(function () {
                if ($(this).val() != "") {
                    $(this).parents(".formElement").find(".inputError").html("");
                    $(this).removeClass("error");
                }
                // $(this).addClass(".valid");
            });
            $("#myform input,#myform select ,#myform textarea").keydown(function () {
                if ($(this).val() != "") {
                    $(this).parents(".formElement").find(".inputError").html("");
                    $(this).removeClass("error");
                }
                //$(this).addClass("valid");
            });
            $(".upload").change(function () {
                if ($(this).val() != "" && $(this).val() != null) {
                    $("#file").removeClass("error");
                    var fileNameIndex = $(this).val().lastIndexOf("\\") + 1;
                    //var fileNameIndex = $(this).val().lastIndexOf("/") + 1;
                    var filename = $(this).val().substr(fileNameIndex);
                    $(".uploadDiv span").html(filename);
                }
            });


        });
    </script>
</body>
</html>


