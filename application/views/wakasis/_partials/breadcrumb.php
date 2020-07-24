<?php
$sector2 = $this->uri->segment(2);
if(empty($sector2)){
  $sector2 = "beranda";
}
?>
<section class="content-header">
    <h1>
        <!-- Dashboard -->
        <small><?php echo ucfirst($sector2)?></small>
      </h1>
      <ol class="breadcrumb">
        <li><?php echo ucfirst($this->uri->segment(1))?></li>
        <li><?php echo ucfirst($sector2)?></li>
      </ol>
</section>