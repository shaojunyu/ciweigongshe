<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>刺猬公社——内容产业第一报道媒体</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url();?>vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="<?php echo base_url();?>vendor/ckeditor/neo.css" rel="stylesheet">

    <link href="<?php echo base_url();?>dist/css/compose.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>/dist/css/unite.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- 编辑器 -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="../umeditor/themes/default/_css/umeditor.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="../umeditor/third-party/jquery.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="../umeditor/umeditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="../umeditor/editor_api.js"></script>
    <script type="text/javascript" src="../umeditor/lang/zh-cn/zh-cn.js"></script>

</head>

<body>

<?php $this->load->view('admin/public_nav',['title'=>'文章编辑']);?>

    <div id="page-wrapper">
        <form class="compose-info" role="form" method="POST" action="<?php echo base_url('admin/store_post')?>" enctype="multipart/form-data">
          <div class="form-group">
            <label for="inputTitle" class="control-label">标题</label>
            <input type="text" name="title" class="form-control" id="inputTitle" placeholder="文章标题">
          </div>
          <div class="form-group">
            <label for="inputAuthor" class="control-label">作者</label>
            <input type="text" name="author" class="form-control" id="inputAuthor" placeholder="文章作者">
          </div>
          <div class="form-group">
            <label for="inputImg" class="control-label" style="display: block;">封面图</label>
            <!-- <input type="text" name="image_url" class="form-control" id="inputImg" placeholder="输入封面图地址" style="display: none;"> -->
            <figure class="img-wrap" style="width:500px;display: none;"><img src="" alt="封面图" class="img-responsive" alt="Responsive image" id="upload-img"></figure>
            <input id="imgFile" type="file" accept="image/*" name="upfile" value="上传封面图片" style="display: none;" />
            <label for="imgFile" class="btn btn-primary upload-img">选择封面图片</label>
          </div>
          <label class="control-label">文章摘要</label>
          <textarea class="form-control summary" name="abstract" rows="4"></textarea>

            <div><label class="control-label" style="padding: 7px 10px 0 0; vertical-align: middle;">文章分类</label></div>
           <div class="category-box">
<?php
$res = $this->db->get('category')->result_array();
foreach ($res as $c) {
?>
            <label class="checkbox-inline">
              <input type="checkbox" name="category[]" value="<?php echo $c['category_id']; ?>"> <?php echo $c['name']; ?>
            </label>

<?php 
}
?>
<!--             <label class="checkbox-inline">
              <input type="checkbox" name="category[]" value="1"> FEED流
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="category[]" value="2"> 深报道
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="category[]" value="3"> 热公司
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="category[]" value="4"> 新闻学院
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="category[]" value="5"> 未来内容
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" name="category[]" value="6"> 会议/培训
            </label> -->
           </div>
          <div>  
            <div><label class="control-label" style="padding: 7px 10px 0 0; vertical-align: middle;">展示选择</label></div>
            <label class="checkbox-inline">
              <input type="checkbox" id="inlineCheckbox7" name="type" value=""> 首页轮播展示
            </label>
          </div>

          <div class="adjoined-bottom">
            <div class="grid-container">
                <div class="grid-width-100">
                    <div id="editor">
                        
                    </div>
                </div>
            </div>
          </div>

<script type="text/plain" id="myEditor" style="width:800px;height:400px;">
</script>

          <input type="text" class="hide" name="content" style="display: none;">
          <button type="button" class="btn btn-primary compose-artical">存储文章</button>
        </form>
    </div>

    <div class="cover"></div>
    <div class="img-box">
        
    </div>

    <div class="modal fade bs-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel"></h4>
          </div>
          <div class="modal-body">
            <p class="show-msg"></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

<script type="text/javascript">
    //实例化编辑器
    var um = UM.getEditor('myEditor');
</script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>dist/js/sb-admin-2.js"></script>

    <script src="<?php echo base_url();?>dist/js/compose.js"></script>
    <script type="text/javascript">
        function getImgURL(node) {    
            var imgURL = "";      
            try{     
                var file = null;  
                if(node.files && node.files[0] ){  
                    file = node.files[0];   
                }else if(node.files && node.files.item(0)) {                                  
                    file = node.files.item(0);     
                }     
                //Firefox 因安全性问题已无法直接通过input[file].value 获取完整的文件路径  
                try{  
                    //Firefox7.0   
                    imgURL =  file.getAsDataURL();    
                    //alert("//Firefox7.0"+imgRUL);                           
                }catch(e){  
                    //Firefox8.0以上                                
                    imgRUL = window.URL.createObjectURL(file);  
                    //alert("//Firefox8.0以上"+imgRUL);  
                }  
             }catch(e){      //这里不知道怎么处理了，如果是遨游的话会报这个异常                   
                //支持html5的浏览器,比如高版本的firefox、chrome、ie10  
                if (node.files && node.files[0]) {                            
                    var reader = new FileReader();   
                    reader.onload = function (e) {                                        
                        imgURL = e.target.result;    
                    };  
                    reader.readAsDataURL(node.files[0]);   
                }    
             }  
            //imgurl = imgURL;
            return imgURL;  
        }
    </script>

</body>

</html>
