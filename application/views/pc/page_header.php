<?php
$_category = isset($category)?$category:'0';
?>

<header>
    <div class="top">刺猬公社</div>
    <nav class="clearfix">
        <ul class="clearfix">
            <li><a <?php echo ($_category=='0')?'class="nav-active"':''; ?> href="<?php echo base_url();?>">首页</a></li>
            <li><a <?php echo ($_category=='1')?'class="nav-active"':''; ?> href="<?php echo base_url();?>post/category/1">FEED流</a></li>
            <li><a <?php echo ($_category=='2')?'class="nav-active"':''; ?> href="<?php echo base_url();?>post/category/2">深报道</a></li>
            <li><a <?php echo ($_category=='3')?'class="nav-active"':''; ?> href="<?php echo base_url();?>post/category/3">热公司</a></li>
            <li><a <?php echo ($_category=='4')?'class="nav-active"':''; ?> href="<?php echo base_url();?>post/category/4">新闻学院</a></li>
            <li><a <?php echo ($_category=='5')?'class="nav-active"':''; ?> href="<?php echo base_url();?>post/category/5">未来内容</a></li>
            <li><a <?php echo ($_category=='6')?'class="nav-active"':''; ?> href="<?php echo base_url();?>post/category/6">会议/培训</a></li>
        </ul>
    </nav>
</header>