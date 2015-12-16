<div class="slidemenu slidemenu-left">
    <div class="slidemenu-header">
		<div>Menu</div>
    </div>

    <div class="slidemenu-body">
		<ul class="slidemenu-content">


        <li><a class="menu-item" href="/mypage/<?php echo $this->session->userdata('member_id'); ?>">マイページ</a></li>
        <li><a class="menu-item" href="/project">案件一覧</a></li>



      <?php  if ($this->session->userdata('member_id')){ ?>
        <li><a class="menu-item" href="/logout">ログアウト</a></li>
      <?php } ?>


		</ul>
	</div>
</div>

<script>
(function() {

  if (localStorage)
  {
    $('#option').show();
  }else{
    $('#option').hide();
  }

})();
</script>
