<style> .alert{margin:0 0 5px}</style>
<?php if (! $this->session->userdata('logged_in')): ?>
<?php elseif ($this->session->userdata('activated')): ?>
	<div class="alert alert-success">邮箱验证成功！请按照验证邮件中的信息加入交流赛领队全国总群。</div>
	<div class="alert alert-info">注意！本网站仅用作学校及领队信息统计，不用做报名。</div>
<?php elseif ($this->session->userdata('start_register')): ?>
	<div class="alert alert-info">
		您的信息已审核通过。请在邮箱中查看验证（激活）邮件，我们的联系方式等相关信息将通过邮箱发送。
		<br>
		若您收不到邮件，请查看您邮箱的垃圾箱等文件夹。
		<br>
		若提示示成功激活后仍显示本条信息，请尝试退出并重新登录。
	</div>
<?php elseif ($this->session->userdata('rejected')):?>
	<div class="alert alert-danger">非常抱歉，您的信息未通过审核！请点击网页右上角“欢迎”处的下拉菜单，点击其中的“修改资料”，其中会显示未通过原因。</div>
<?php else: ?>
	<div class="alert alert-warning">
		您的信息正在被审核，请稍候。请关注本网站以及时获悉您的审核状态。同时，审核通过后，我们会向您的邮箱发送验证（激活）信息。
		<br>
		若网站已提示审核通过但收不到邮件，请查看您邮箱的垃圾箱等文件夹。
		<br>
		我们完成审核后，页面可能仍会显示“审核中”，您需要退出并重新登录才能刷新首页显示的信息。
	</div>
<?php endif; ?>
<!-- <a href="<?//=site_url('registration')?>"> -->
	<img src="<?=base_url()?>/assets/images/essentials/content.png" width="1100">
<!-- </a> -->
