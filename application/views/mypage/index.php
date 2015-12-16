<!DOCTYPE html>
<html lang="ja">
<head>
<?php $this->load->view('layout/head'); ?>

</head>

<body>
	<?php $this->load->view('layout/sidebar'); ?>
	<?php $this->load->view('layout/header'); ?>

	<div id="page">

<h2>マイページ</h2>

		<section class="clearfix mypage" id="Content">

			<p>会員ID :<?php echo $member['id'];?></p>
			<p>名前 :<?php echo $member['last_name'];?><?php echo $member['first_name'];?></p>
			<p>mail :<?php echo $member['mail'];?></p>


<br/><br/>

			<input type="button" value="案件登録"  onclick="location.href='/mypage/new_project'" style="width:250px;">


<br/><br/><br/>



				<div class="clear"></div>

<form name="chbox">
<input type="checkbox" id="master" value="責任者" checked>責任者
<input type="checkbox" id="sales" value="営業担当" checked>営業担当
<input type="checkbox" id="develop" value="開発担当" checked>開発担当<br>
</form>

<br/><br/>
<div id="check_int"></div>



						<div id="dataRecord"></div>

</div>

			<!-- #mainCont --></article>
		<!-- #Content --></section>



	<?php $this->load->view('layout/footer'); ?>





	<script>
	(function() {


		function search()
		{





      var params = {
          "member_id":  <?php echo $member['id'];?>
      }

			$.ajax({
				type: "POST",
				cache: false,
				scriptCharset: 'utf-8',
				dataType: 'json',
				url: '/api/projects/find_by_user',
				data: params,
				success: function(data){
					console.log(data);

					// ------------ 責任者/営業担当/開発者担当チェック ------------

					var master = document.getElementById("master").checked;
					var sales = document.getElementById("sales").checked;
					var develop = document.getElementById("develop").checked;


					if(master == true){
					console.log(master);
					}

					if(sales == true){
					console.log(sales);
					}

					if(develop == true){
					console.log(develop);
					}

					function countChecked() {
						var master = document.getElementById("master").checked;
						var sales = document.getElementById("sales").checked;
						var develop = document.getElementById("develop").checked;

					var n = $("input:checked").length;
					$("#check_int").text(n + (n == 1 ? " is" : " are") + " checked!");
					}
					// countChecked();
					$(":checkbox").click(countChecked);




					// ------------ 責任者/営業担当/開発者担当チェック ------------


					if (master == true && data.status && data.projects_list) {
						// console.log(data.users_list[0]);
						$('#dataRecord').empty();


						for (i=0; i<data.projects_list.length; i++) {

								var rec = $('<div class="dataRecord">');
								var a = $('<a href="/project/show/' + data.projects_list[i].id + '#mypage">');

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
								var span_membername = $('<p class="mail">'+ '' + data.projects_list[i].status_name + '</p>');
								var span_content = $('<br><p class="comment" > '+ data.projects_list[i].project_content + '</p>');
								var span_name = $('<br><p class="created_at" style="font-size:13px;text-align:right;">責任者: '+ data.projects_list[i].last_name + ' '  + data.projects_list[i].first_name + '</p>');
								var span_created_at = $('<p class="created_at" style="font-size:12px;text-align:right;">更新日: '+ data.projects_list[i].updated_at + '</p>');
							}

								project.append(span_membername);
								project.append(span_content);
								project.append(span_name);
								project.append(span_created_at);
								a.append(project);
								rec.append(a);

								$('#dataRecord').append(rec);
								$('#dataRecord').append('<div class="clear"></div>');

						}

					}
					else {
						$('#dataRecord').empty();
					}





				}
			});
		}

		 search();

	})();
	</script>





</body>
</html>
