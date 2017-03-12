<?php
$_category = isset($category)?$category:'0';
?>
<header>
    <div class="top">刺猬公社</div>
    <nav class="clearfix">
        <ul class="clearfix">
         <li><a <?php echo ($_category=='0')?'class="nav-active"':''; ?> href="<?php echo base_url();?>">首页</a></li>
<?php
$res = $this->db->get('category')->result_array();
foreach ($res as $c) {
?>
            <li><a <?php echo ($_category==$c['category_id'])?'class="nav-active"':''; ?> href="<?php echo base_url('post/category/'.$c['category_id']);?>"><?php echo $c['name'] ?></a></li>
<?php } ?>
        </ul>
    </nav>
</header>