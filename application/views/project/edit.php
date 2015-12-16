<!DOCTYPE html>
<html lang="ja">
<head>
<?php $this->load->view('layout/head'); ?>
</head>

<body>
	<?php $this->load->view('layout/sidebar'); ?>
	<?php $this->load->view('layout/header'); ?>


	<div id="page">



<h2>案件編集</h2>


	<span class="btn_back" id="back_to_requestlist" style="margin:10px 0;"><input type="button" value="戻る"  onclick="location.href='/project/show/<?php echo $project_id;?>'"></span>

	</div>


	<?php $this->load->view('layout/footer'); ?>





</body>
</html>


