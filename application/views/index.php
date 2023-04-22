<style> .alert{margin:0 0 5px}</style>
<?php if (! $this->session->userdata('logged_in')): ?>
<?php elseif ($this->session->userdata('activated')): ?>
	<div class="alert alert-success">您已成功激活。请按照激活邮件中的信息联系对应地区负责来报名。</div>
	<div class="alert alert-info">注意！本网站仅用作学校及领队信息统计，不用做报名。</div>
<?php elseif ($this->session->userdata('start_register')): ?>
	<div class="alert alert-info">您的信息已审核通过。请在邮箱中查看激活邮件，以及对应地区负责的联系方式。</div>
<?php elseif ($this->session->userdata('rejected')):?>
	<div class="alert alert-danger">非常抱歉，您的信息未通过审核！请点击网页右上角“欢迎”处的下拉菜单，点击其中的“修改信息”。</div>
<?php else: ?>
	<div class="alert alert-warning">您的信息正在被审核，请稍候。请关注本网站以及时获悉您的审核状态。</div>
<?php endif; ?>
<!-- <a href="<?//=site_url('registration')?>"> -->
	<img src="<?=base_url()?>/assets/images/essentials/content.png" width="1100">
<!-- </a> -->
