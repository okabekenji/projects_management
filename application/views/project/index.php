<!DOCTYPE html>
<html lang="ja">
<head>
<?php $this->load->view('layout/head'); ?>
</head>

<body>
	<?php $this->load->view('layout/sidebar'); ?>
	<?php $this->load->view('layout/header'); ?>


	<div id="page">


		<section class="clearfix mypage" id="Content">

	<input type="hidden" id="loading_flg" value="0">
	<input type="hidden" id="offset" value="0">


			<h2>案件一覧</h2>

			<article id="mainCont">

			<form method="post" action="" >
				<div  class="search" style="text-align:left;">
					<input type="text" class="small search_input" id="search_input" placeholder="Search">
				</div>
				<p style="padding-bottom:30px;"><input type="submit" value="検索" id="search_input_submit"></p>
				<div class="clear"></div>
			</form>

				<div id="dataReocrd"></div>

			<!-- #mainCont --></article>
		<!-- #Content --></section>

		<div id="loading"></div>

	</div>


	<?php $this->load->view('layout/footer'); ?>


<script>
(function() {



if (localStorage){
	$('#search_input').val(localStorage.getItem("project_search_input"));
}


$('#search_input_submit').click(function()
{

$('#loading_flg').val(0);
		$("#search_input_submit").prop("disabled", true);
	$('#dataReocrd').empty();
	offset_reset();
	search();
	setTimeout(function() {
	$("#search_input_submit").prop("disabled", false);
	}, 500);
});


$(window).bottom({proximity: 0.01});
$(window).bind('bottom', function()
{
	// 「loading」がfalseの時に実行
	var loading_flg = $('#loading_flg').val();
	if (loading_flg == 0) {
		// console.log('window bottom');
		// ローディング画像を表示
		$('#loading').html('<div style="text-align:center;"><img src="/assets/images/loading.gif" /></div>');

		setTimeout(function() {
		search();
		}, 300);
	}
});

function offset_reset()
{
	$('#offset').val(0);
}

function offset_countup(param)
{
	if (!param){
		return;
	}
	var offset = $('#offset').val();
	offset = parseInt(offset) + parseInt(param);
	$('#offset').val(parseInt(offset));
}

function search()
{

	var loading_flg = $('#loading_flg').val();
	// 「loading」がfalseの時に実行





	if (loading_flg == 1) {
		// console.log(" no action");
		// return;
		//ローディング画像を削除
	  $('#loading').html('');
	}


	// 「loading」をtrueにする
	$('#loading_flg').val(1);

	var params = {
	    "search_input":  $('#search_input').val(),
	    "offset":  $('#offset').val(),
	}
// console.log(params);

	if (localStorage){
		localStorage.setItem("project_search_input",$('#search_input').val());
	}


	$.ajax({
		type: "POST",
		cache: false,
		scriptCharset: 'utf-8',
		dataType: 'json',
		url: '/api/projects/find_by_condition',
		data: params,
		success: function(data){
			console.log(data);

			if (data.status && data.projects_list) {

				bind_view(data);
				offset_countup();

				//ローディング画像を削除
			  $('#loading').html('');

  	// 処理が完了したら「loading」をfalseにする
  	$('#loading_flg').val(0);

			}
			else {
				// console.log("Notfound");

				//ローディング画像を削除
			  $('#loading').html('');

  	// 処理が完了したら「loading」をfalseにする
  	//$('#loading_flg').val(0);

			}

		}

	});
}

		function bind_view(data)
		{
			if (!data || !data.projects_list || !data.projects_list.length)
			{
				return;
			}

			offset_countup(data.projects_list.length);

			for (i=0; i<data.projects_list.length; i++) {

				var rec = $('<div class="dataReocrd">');
				var a = $('<a href="/project/show/' + data.projects_list[i].id + '">');

				if (data.projects_list[i].del_flg == 0)
				{
					var project = $('<div class="member" >');
				}else{
					var project = $('<div class="member" >');
				}


				if (data.projects_list[i].del_flg == 0){
					var span_membername = $('<p class="mail">'+ '' + data.projects_list[i].status_name + '</p>');
					var span_content = $('<br><p class="comment" > '+ data.projects_list[i].project_content + '</p>');
					var span_name = $('<br><p class="created_at" style="font-size:13px;text-align:right;">責任者: '+ data.projects_list[i].last_name + ' '  + data.projects_list[i].first_name + '</p>');
					var span_created_at = $('<p class="created_at" style="font-size:12px;text-align:right;">更新日: '+ data.projects_list[i].updated_at + '</p>');
				}else{
					var span_membername = $('<p class="decided_mail">'+ data.projects_list[i].last_name + ' '  + data.projects_list[i].first_name  + ' ( ' + data.projects_list[i].status + ')</p>');
					var span_comment = $('<br><p class="comment" > '+ data.projects_list[i].project_content + '</p>');
					var span_name = $('<br><p class="created_at" style="font-size:13px;text-align:right;">責任者: '+ data.projects_list[i].last_name + ' '  + data.projects_list[i].first_name + '</p>');
					var span_created_at = $('<p class="decided_created_at" style="font-size:12px;text-align:right;">更新日: '+ data.projects_list[i].updated_at + '</p>');
				}



				project.append(span_membername);
				project.append(span_content);
				project.append(span_name);
				project.append(span_created_at);
				a.append(project);
				rec.append(a);


				$('#dataReocrd').append(rec);
				$('#dataReocrd').append('<div class="clear"></div>');

			}

		}



		//初回検索時
		offset_reset();
		$('#dataReocrd').empty();
		search();








})();




</script>





</body>
</html>




