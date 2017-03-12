<nav data-am-widget="header" class="am-header am-header-default">
  <ul class="am-menu-nav">
      <li class="nav-list">
        <a href="<?php echo base_url(''); ?>">首页</a>
      </li>
<?php
$res = $this->db->get('category')->result_array();
foreach ($res as $c) {
?>      
      <li class="nav-list">
        <a href="<?php echo base_url('post/category/'.$c['category_id']); ?>"><?php echo $c['name'] ?></a>
      </li>
<?php } ?>
  </ul>
</nav>