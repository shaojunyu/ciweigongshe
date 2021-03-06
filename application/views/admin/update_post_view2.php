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
    <link href="<?php echo base_url();?>/umeditor/themes/default/_css/umeditor.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url();?>/umeditor/third-party/jquery.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>/umeditor/umeditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>/umeditor/editor_api2.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>/umeditor/lang/zh-cn/zh-cn.js"></script>

</head>

<body>

<?php $this->load->view('admin/public_nav',['title'=>'文章编辑']);?>

    <div id="page-wrapper">
        <form class="compose-info" role="form" method="POST" action="<?php echo base_url('admin/update_post')?>">
          <div class="form-group">
            <label for="inputTitle" class="control-label">标题</label>
            <input type="text" name="title" class="form-control" id="inputTitle" placeholder="文章标题" value="<?php echo $post['title']; ?>">
          </div>
          <div class="form-group">
            <label for="inputAuthor" class="control-label">作者</label>
            <input type="text" name="author" class="form-control" id="inputAuthor" placeholder="文章作者" value="<?php echo $post['author']; ?>">
          </div>
          <div class="form-group">
            <label for="inputImg" class="control-label">封面图地址</label>
            <input type="text" name="image_url" class="form-control" id="inputImg" placeholder="输入封面图地址" value="<?php echo $post['image_url']; ?>">
            <button type="button" class="btn btn-primary view-img">查看封面图片</button>
          </div>
          <label class="control-label">文章摘要</label>
          <textarea class="form-control summary" name="abstract" rows="4"><?php echo $post['abstract']; ?></textarea>

            <div><label class="control-label" style="padding: 7px 10px 0 0; vertical-align: middle;">文章分类</label></div>
            <?php 
            $this->db->where('post_id',$post['post_id']);
            $res = $this->db->get('post_category')->result_array();
            $category_array = [];
            foreach($res as $category){
              $category_array[] = $category['category_id'];
            }
            ?>
           <div class="category-box">
<?php
$res = $this->db->get('category')->result_array();
foreach ($res as $c) {
?>
            <label class="checkbox-inline">
              <input type="checkbox" <?php echo in_array($c['category_id'],$category_array)?'checked':''; ?> name="category[]" value="<?php echo $c['category_id']; ?>"> <?php echo $c['name']; ?>
            </label>

<?php 
}
?>
<!--             <label class="checkbox-inline">
              <input type="checkbox" <?php echo in_array('1',$category_array)?'checked':''; ?> name="category[]" value="1"> FEED流
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" <?php echo in_array('2',$category_array)?'checked':''; ?> name="category[]" value="2"> 深报道
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" <?php echo in_array('3',$category_array)?'checked':''; ?> name="category[]" value="3"> 热公司
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" <?php echo in_array('4',$category_array)?'checked':''; ?> name="category[]" value="4"> 新闻学院
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" <?php echo in_array('5',$category_array)?'checked':''; ?> name="category[]" value="5"> 未来内容
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" <?php echo in_array('6',$category_array)?'checked':''; ?> name="category[]" value="6"> 会议/培训
            </label> -->
           </div>
          <div>  
            <div><label class="control-label" style="padding: 7px 10px 0 0; vertical-align: middle;">展示选择</label></div>
            <label class="checkbox-inline">
              <input type="checkbox" <?php echo ($post['type'] == 'slide')?'checked':''; ?>  id="inlineCheckbox7" name="type" value=""> 首页轮播展示
            </label>
          </div>

<script type="text/plain" id="myEditor" style="width:800px;height:400px;">
<?php echo $post['content']; ?>
</script>

          <input type="text" class="hide" name="content" style="display: none;">
          <input type="hidden" name="post_id" value="<?php echo $post['post_id']?>">
          <input type="hidden" name="status" value="<?php echo $post['status']?>">
          <button type="button" class="btn btn-primary compose-artical">更新文章</button>
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



</body>

</html>
