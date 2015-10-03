<!DOCTYPE html>
<html>
<head>
    <title>Home | <?php echo SITENAME?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php
    $this->load->view('shared/css');
    ?>
    <style>
        .researchestable th, td {
            text-align: right;
            padding: 10px;
        }

        .content {
            direction: rtl;
        }

        .inlineheader {
            display: inline;
        }

        .frame {
            font-size: 20px;
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
                              
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-2"><a href="<?php echo site_url("homecontroller/displaydata") ?>">تاريخ الادخال</a></div>
                        <div class="col-md-1"><a href="<?php echo site_url("homecontroller/displaydataauthor") ?>">الباحثون</a></div>
                        <div class="col-md-1"><a href="<?php echo site_url("homecontroller/displaydatapublisher") ?>">الناشر</a></div>
                        <div class="col-md-1"><a href="<?php echo site_url("homecontroller/displaydatapublishdate") ?>">سنة النشر</a></div>
                        <div class="col-md-3"><a href="<?php echo site_url("homecontroller/displaydataresearch") ?>">البحث</a></div>
                    </div>
                    <hr />
                    <?php 
                    // $enterdTime  , pagination 
                    
                    if(isset($researchs)&&!empty($researchs) ){
                        
                        foreach($researchs as $research){
                            echo"<div class='parentresearch'>"; 
                            
                            echo"<div class='row'>";
                            echo "<div class=\"col-md-2\">";
                            echo "<h6><a href='".site_url("homecontroller/editpaper")."/{$research->id}' class='btn'>تعديل</a></h6>";
                            echo "</div>";

                           
                            
                            echo "<div class=\"col-md-2\">";
                            echo "<h6><button data-researchid='".$research->id."' class='btn loadmore'>المزيد</button></h6>";

                            echo "</div>";
                            
                            
                            echo "<div class=\"col-md-2\">";
                            echo "<h6>".date("Y-m-d" ,$research->enterdTime)."</h6>";  
                            echo "</div>";
                            
                            

                            
                            echo "<div class=\"col-md-1\">";
                            echo "<h6>".$research->mainAuthor->name."</h6>";                            
                            
                            echo "</div>";
                            
                            echo "<div class=\"col-md-1\">";
                            echo "<h6>{$research->publisher->publisherName}</h6>";
                            echo "</div>";
                            
                            echo "<div class=\"col-md-1\">";
                            echo "<h6>{$research->publishDate}</h6>";
                            echo "</div>";
                            
                            echo "<div class=\"col-md-3\">";
                            echo "<h6><a href='".base_url()."pdfs/{$research->researchFileName}'>{$research->originalFileName}</a></h6>";
                            echo "</div>";
                            
                            echo "</div>";//row
                    ?>

                    <div class='morediv' style="display:none">
                        <br />
                        <div class="row">
                            <div class="col-md-3">
                                <label>نوع البحث : </label>
                                <h1 class="inlineheader researchType frame"></h1>
                            </div>

                            <div class="col-md-3">
                                <label>بلد البحث : </label>
                                <h1 class="inlineheader publishCountry frame"></h1>
                            </div>

                            <div class="col-md-3">
                                <label>التخصص الدقيق : </label>
                                <h1 class="inlineheader accurateSpecialization frame"></h1>
                            </div>
                            <div class="col-md-3">
                                <label>التخصص : </label>
                                <h1 class="inlineheader specialization frame"></h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3">
                                <label>العدد : </label>
                                <h1 class="inlineheader researchNumber frame"></h1>
                            </div>

                            <div class="col-md-3">
                                <label>عدد الصفحات : </label>
                                <h1 class="inlineheader pagesCount frame"></h1>
                            </div>

                            <div class="col-md-3">
                                <label>الصفحات : من </label>
                                <h3 class="inlineheader pagesFrom frame"></h3>

                                <label>الى </label>
                                <h3 class="inlineheader pagesTo frame"></h3>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-9">
                                    <textarea readonly="readonly" class="form-control arabicDescription frame"></textarea>
                                </div>
                                <div class="col-md-3">
                                    <label>الوصف باللغة العربية : </label>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-9">
                                    <textarea readonly="readonly" class="form-control englishDescription frame"></textarea>
                                </div>
                                <div class="col-md-3">
                                    <label>الوصف باللغة الانجليزية : </label>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-9">
                                    <input readonly="readonly" class="form-control arabicHeadingName frame" />
                                </div>
                                <div class="col-md-3">
                                    <label>عنوان البحث باللغة العربية : </label>
                                </div>


                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-9">
                                    <input readonly="readonly" class="form-control englishHeadingName frame" />
                                </div>
                                <div class="col-md-3">
                                    <label>عنوان البحث باللغة الانجليزية : </label>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-9">
                                    <textarea readonly="readonly" class="form-control keyWords frame"></textarea>
                                </div>
                                <div class="col-md-3">
                                    <label>الكلمات المفتاحية : </label>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-9">
                                    <textarea readonly="readonly" class="form-control authors frame"></textarea>
                                </div>
                                <div class="col-md-3">
                                    <label> الباحثون : </label>
                                </div>

                            </div>
                        </div>
                    </div>


                    <?php
                            echo "</div>";//parent
                            echo "<hr />";
                        }
                        
                    }
                    
                    ?>

                    <br />
                    <ul class="pagination">
                        <?php
                        for($i=1;$i<$totalPages;$i++){
                            if($page==$i){
                                echo "<li class='active'><a href=\"".site_url($this->uri->segment(1)."/".$this->uri->segment(2))."/{$i}\">{$i}</a></li>";                                
                            }else{
                                echo "<li><a href=\"".site_url($this->uri->segment(1)."/".$this->uri->segment(2))."/{$i}\">{$i}</a></li>";
                            }
                        }
                        ?>
                    </ul>
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
    <script>
        $(document).ready(function () {
            $(".loadmore").click(function () {
                parent = $(this).parents(".parentresearch");
                $(this).replaceWith("<img id='loadmoregif' src='<?php echo base_url()?>/images/ajax-loader.gif'>");
                id = $(this).attr("data-researchid");
                $.post("<?php echo site_url("homecontroller/getResearchById")?>", "id=" + id, function (res) {
                   // alert(res);
                   
                    res = JSON.parse(res);
                    morediv = $(parent).find(".morediv");
                    $(morediv).find(".accurateSpecialization").html(res.accurateSpecialization);
                    $(morediv).find(".publishCountry").html(res.publishCountry);
                    $(morediv).find(".researchType").html(res.researchType);
                    $(morediv).find(".englishHeadingName").val(res.englishHeadingName);
                    $(morediv).find(".arabicHeadingName").val(res.arabicHeadingName);
                    $(morediv).find(".englishDescription").html(res.englishDescription);
                    $(morediv).find(".arabicDescription").html(res.arabicDescription);
                    $(morediv).find(".pagesTo").html(res.pagesTo);
                    $(morediv).find(".pagesFrom").html(res.pagesFrom);
                    $(morediv).find(".pagesCount").html(res.pagesCount);
                    $(morediv).find(".researchNumber").html(res.researchNumber);
                    $(morediv).find(".specialization").html(res.specialization);


                    keywords = res.keyWords.replace("br", "*");
                    keywords = keywords.replace("<", "");
                    keywords = keywords.replace(">", "");
                    keywords = keywords.replace("/", "");
                    keywords = keywords.replace("  ", " ");
                    //alert(keywords);
                    str = "";
                    keywors = keywords.trim().split("*");
                    for (var i = 0; i < keywors.length; i++) {
                        str += keywors[i] + " ";
                    }
                    $(morediv).find(".keyWords").html(str);

                    authors = res.authors;
                    disauthors = "";
                    for (var i = 0; i < authors.length; i++) {
                        disauthors += authors[i]+" , ";
                    }
                    $(morediv).find(".authors").html(disauthors);

                    $(loadmoregif).remove();
                    $(morediv).fadeIn();
                });
            });
        });
    </script>
</body>
</html>
