<!DOCTYPE html>
<html lang="ja">
<head>
<?php $this->load->view('layout/head'); ?>

</head>

<body>
  <?php $this->load->view('layout/sidebar'); ?>
  <?php $this->load->view('layout/header'); ?>

  <div id="page">

<h2>案件詳細</h2>

    <section class="clearfix mypage" id="Content">


      <article id="mainCont">


         <span class="btn_back" id="back_to_projectlist" style="margin:10px 0;display:none;"><input type="button" value="戻る"  onclick="location.href='/project'"></span>
        <span class="btn_back" id="back_to_mypage" style="margin:10px 0;display:none;"><input type="button" value="戻る"  onclick="location.href='/mypage/<?php echo $project['member_id'];?>'"></span>

<br/><br/>
         <input type="button" value="編集する"  onclick="location.href='/project/edit/<?php echo $project_id;?>'" style="width:250px;">

<br/><br/><br/><br/>



タイトル：<?php echo $project['project_content'];?><br/>
<br/>
ステータス：<?php echo $project['status_name'];?><br/>
セグメント：<?php echo $project['segment_name'];?><br/>
<br/>
受注日：<?php echo $project['order_date'];?><br/>
見積日：<?php echo $project['estimate_date'];?><br/>
見積提出日：<?php echo $project['estimate_active_date'];?><br/>
委託元：<?php echo $project['consignment_name'];?><br/>
<br/>
責任者：<?php echo $project['last_name'];?><?php echo $project['first_name'];?><br/>
営業担当者：<?php echo $project_member['sales_member_last_name'];?><?php echo $project_member['sales_member_first_name'];?><br/>
開発担当者：<?php echo $project_member['development_member_last_name'];?><?php echo $project_member['development_member_first_name'];?><br/>
　役割：<?php echo $project_member['development_member_role'];?><br/>
<br/>

検収予定日：<?php echo $project['acceptance_plan_month'];?><br/>
検収日：<?php echo $project['acceptance_month'];?><br/>
検収金額：<?php echo $project['acceptance_amount'];?><br/>
　税込金額：<?php echo $project['acceptance_tax_included'];?><br/>
<br/>
委託会社：<?php echo $project_partner['partner_name'];?><br/>
　役割：<?php echo $project_partner['partner_comment'];?><br/>
　形態：<?php echo $project_partner['partner_form'];?><br/>
委託料(原価)：<?php echo $project_partner['consignment_amount'];?><br/>
<br/>
原価率：<?php echo $project['cost_rate'];?><br/>
利益率：<?php echo $project['profit_rate'];?><br/>
<br/>
説明：<?php echo $project['projects_comment'];?><br/>
<br/>
<br/>



         <input type="button" value="見積書"  onclick="location.href='/project/estimate/<?php echo $project_id;?>'" style="width:250px;">
<br/><br/>
         <input type="button" value="請求書"  onclick="location.href='/project/bill/<?php echo $project_id;?>'" style="width:250px;">


      <!-- #mainCont --></article>
    <!-- #Content --></section>


  </div>

  <?php $this->load->view('layout/footer'); ?>




<script type="text/javascript">





  if (location.hash == "#mypage"){
    $('#back_to_projectlist').hide();
    $('#back_to_mypage').show();
  }else{
    $('#back_to_projectlist').show();
    $('#back_to_mypage').hide();
  }


</script>

</body>
</html>
