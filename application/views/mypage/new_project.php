<!DOCTYPE html>
<html lang="ja">
<head>
<?php $this->load->view('layout/head'); ?>
</head>



<body>
	<?php $this->load->view('layout/sidebar'); ?>
	<?php $this->load->view('layout/header'); ?>


	<div id="page">

<h2>案件登録</h2>

<span class="btn_back" id="back_to_requestlist" style="margin:10px 0;"><input type="button" value="戻る"  onclick="location.href='/mypage/<?php echo $this->session->userdata('member_id'); ?>'"></span>



<br><br>


<form method="post" id="entry_form" action="/mypage/insert">

<input type="submit" value="登録" id="submit_btn">

<br><br><br><br>

タイトル：<input maxlength="100" placeholder="タイトル" name="content" value="<?php echo set_value('content'); ?>"><br>
<br>

ステータス：<?php echo $status['status'];?><br>
セグメント：
<?php
// $segments += array(
//                   ''  => '',
//                 );
echo form_dropdown('segment', $segments);
?>
<br>
<br>
受注日：<input id="datepicker01" name="order_date" style="font-size:11px;" readonly="readonly" value="<?php echo set_value('order_date'); ?>"><br>
見積日：<input id="datepicker02" name="estimate_date" style="font-size:11px;" readonly="readonly" value="<?php echo set_value('estimate_date'); ?>"><br>
見積提出日：<input id="datepicker03" name="estimate_active_date" style="font-size:11px;" readonly="readonly" value="<?php echo set_value('estimate_active_date'); ?>"><br>
委託元：
<?php
// $segments += array(
//                   ''  => '',
//                 );
echo form_dropdown('consignment', $consignments);
?>

<br>
<br>

責任者：<?php echo ($this->session->userdata('last_name'));?> <?php echo ($this->session->userdata('first_name'));?><br>


営業担当者：
<?php
// $segments += array(
//                   ''  => '',
//                 );
echo form_dropdown('sales_member', $sales_members);
?>
<br>


<!-- =====================追加可能項目====================== -->


開発担当者：
<?php
// $segments += array(
//                   ''  => '',
//                 );
echo form_dropdown('develop_member', $develop_members);
?>
<br>
　役割：<input name="develop_member_role" maxlength="100" value="<?php echo set_value('develop_member_role'); ?>"><br>

<div id="develop_add"></div>

<br>

<!-- =====================追加可能項目====================== -->




検収予定日：<input id="datepicker04" name="acceptance_plan_month" style="font-size:11px;" readonly="readonly" value="<?php echo set_value('acceptance_plan_month'); ?>"><br>
検収日：<input id="datepicker05" name="acceptance_month" style="font-size:11px;" readonly="readonly" value="<?php echo set_value('acceptance_month'); ?>"><br>
検収金額：¥<input id="acceptance_amount"  name="acceptance_amount" class="money" maxlength="100" value="<?php echo set_value('acceptance_amount'); ?>"><br>
　税込金額：¥<input id = "tax_in" name="acceptance_tax_in" type = "text" readonly="readonly" value="<?php echo set_value('acceptance_tax_in'); ?>"></input><br>
<br>





<!-- =====================追加可能項目====================== -->

委託会社：<?php
$partner_names += array(
                  ''  => '',
                );
echo form_dropdown('partner_name', $partner_names);
?>
<br>
　役割：<input name="partner_role" maxlength="100" value="<?php echo set_value('partner_role'); ?>"><br>
委託料(原価)：¥<input id="partner_amount" name="partner_amount" class="money" maxlength="100" value="<?php echo set_value('partner_amount'); ?>"><br>

<div id="consignment_add"></div>

<br>

<!-- =====================追加可能項目====================== -->



原価率：<input id = "cost_rate" name="cost_rate" type = "text" readonly="readonly" value="<?php echo set_value('cost_rate'); ?>">%</input><br>
利益率：<input id = "profit_rate" name="profit_rate" type = "text" readonly="readonly" value="<?php echo set_value('profit_rate'); ?>">%</input><br>
<br>

コメント：<textarea name="comment" maxlength="100" value="<?php echo set_value('comment'); ?>"></textarea><br>
<br>

<br><br><br><br>

</form>




<button onclick="develop_add();">開発担当追加</button>





<button onclick="consignment_add();">委託会社追加</button>





	</div>


	<?php $this->load->view('layout/footer'); ?>

<script type="text/javascript">

	$("#datepicker01").datepicker({ dateFormat: 'yy年mm月dd日' });
	$("#datepicker02").datepicker({ dateFormat: 'yy年mm月dd日' });
	$("#datepicker03").datepicker({ dateFormat: 'yy年mm月dd日' });
	$("#datepicker04").datepicker({ dateFormat: 'yy年mm月dd日' });
	$("#datepicker05").datepicker({ dateFormat: 'yy年mm月dd日' });

</script>

<script type="text/javascript">


function develop_add()
{
    var div_element = document.createElement("div");
    div_element.innerHTML = '開発担当者：<input type="text" name="title" value=""><br>　役割：<input type="text" name="contents" value=""><br>';
    var parent_object = document.getElementById("develop_add");
    parent_object.appendChild(div_element);
}


function consignment_add()
{
    var div_element = document.createElement("div");
    div_element.innerHTML = '委託会社：<input type="text" name="title" value=""><br>　役割：<input type="text" name="contents" value=""><br>委託料(原価)：<input type="text" name="contents" value=""><br>';
    var parent_object = document.getElementById("consignment_add");
    parent_object.appendChild(div_element);
}






function addFigure(n) {
	var l, m='';
	var mark = (n < 0) ? '-' : '';
	var flt = '';
	n = Math.abs(n);
	if (n % 1) {
		flt  = n + '';
		flt = flt.substr(flt.indexOf('.'));
		}
		n = Math.floor(n) + '';
	while ( (l = n.length) > 3 ) {
		m = "," + n.substr( l - 3, 3 ) + m;
		n = n.substr( 0, l - 3 );
	}
	return mark + n + m + flt;
}


window.onload = function() {



  $( "acceptance_amount" ).onkeyup = function () {


    var acceptance_tax_in = parseInt( $( "acceptance_amount" ).value, 10 );
    var cost_rate_in = (parseInt( $( "partner_amount" ).value, 10 )/parseInt( $( "acceptance_amount" ).value, 10 ));
    var profit_rate_in = (parseInt( $( "acceptance_amount" ).value, 10 )-parseInt( $( "partner_amount" ).value, 10 ))/(parseInt($( "acceptance_amount" ).value, 10));


    var acceptance_tax_in_locale = isNaN( acceptance_tax_in ) ? "" : Math.round( acceptance_tax_in * 1.08 );
    var cost_rate_in_locale = isNaN( cost_rate_in ) ? "" : Math.round(cost_rate_in * 100);
    var profit_rate_in_locale = isNaN( profit_rate_in ) ? "" : Math.round( profit_rate_in * 100);




    $( "tax_in" ).value = addFigure(acceptance_tax_in_locale);
    $( "cost_rate" ).value = cost_rate_in_locale;
    $( "profit_rate" ).value = profit_rate_in_locale;
    document.getElementById( acceptance_tax_in );
    document.getElementById( cost_rate_in );
    document.getElementById( profit_rate_in );


  };

  $( "partner_amount" ).onkeyup = function () {
    var cost_rate_in = (parseInt( $( "partner_amount" ).value, 10 )/parseInt( $( "acceptance_amount" ).value, 10 ));
    var profit_rate_in = (parseInt( $( "acceptance_amount" ).value, 10 )-parseInt( $( "partner_amount" ).value, 10 ))/(parseInt($( "acceptance_amount" ).value, 10));

    $( "cost_rate" ).value = isNaN( cost_rate_in ) ? "" : Math.round( cost_rate_in * 100 );
    $( "profit_rate" ).value = isNaN( profit_rate_in ) ? "" : Math.round( profit_rate_in * 100);
    document.getElementById( cost_rate_in );
    document.getElementById( profit_rate_in );

  };



//   $( "acceptance_amount" ).onblur = function () {
//   	var acceptance_tax_in = parseInt( $( "acceptance_amount" ).value, 10 );
// $( "acceptance_amount" ).value = addFigure(acceptance_tax_in);
//   };
//   $( "partner_amount" ).onblur = function () {
//   	var partner_amount = parseInt( $( "partner_amount" ).value, 10 );
// $( "partner_amount" ).value = addFigure(partner_amount);
//   };







}

function $( acceptance_tax_in ) {
  return document.getElementById( acceptance_tax_in );
  // return document.getElementById( cost_rate_in );
  // return document.getElementById( profit_rate_in );

}

</script>






</body>
</html>


