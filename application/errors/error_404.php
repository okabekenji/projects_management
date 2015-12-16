
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="apple-touch-icon" href="/apple-touch-icon-precomposed.png" />
<link href="/assets/css/reset.css?1418908362" rel="stylesheet">
<link href="/assets/css/layout.css?1418908362" rel="stylesheet">
<link href="/assets/css/sidebar.css?1418908362" rel="stylesheet">
<link href="/assets/css/common.css?1418908362" rel="stylesheet">
<script type="text/javascript" src="/assets/js/jquery-1.9.0.min.js?1418908362"></script>
<script type="text/javascript" src="/assets/js/api.js?1418908362"></script>
<title>ebisu案件管理システム</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0" />


</head>

<body>
	<div class="slidemenu slidemenu-left">
    <div class="slidemenu-header">
		<div>Menu</div>
    </div>

    <div class="slidemenu-body">
		<ul class="slidemenu-content">



<li><a class="menu-item" href="/">トップへ</a></li>

		</ul>
	</div>
</div>



<div id="main">



<div id="header">

      <span class="button menu-button-left"></span>




    <ul>
      <li><a href="/logout">ログアウト</a></li>
    </ul>




</div>

<style>

div#header ul {
  margin: 0 0 0 120px;
  padding: 0;
  list-style-type: none;
  float:right;
}

div#header li {
  display: inline-block;
  vertical-align: top;
}

div#header ul li a {
  width: 120px;
  display: block;
  text-align: center;
  line-height: 70px;
  font-size: 17px;
  font-weight: bold;
  color: #4078c0;
  text-decoration: none;
}

div#header ul li a:hover {
  width: 120px;
  display: block;
  text-align: center;
  line-height: 70px;
  font-size: 17px;
  font-weight: bold;
  color: #4078c0;
  text-decoration: underline;
}

div#header img {
  max-width:50px;
  max-height:50px;
  margin-top: 5px;
}
</style>

	<div id="page">

		<section class="clearfix" id="Content">

							<h2><?php echo $heading; ?></h2>
							<?php echo $message; ?>



			<!-- #mainCont --></article>

		<!-- #Content --></section>


	</div>





<div class="clear"></div>

<div id="footer" >
	<p id="copyright">こぴーらいと</p>
</div><!-- /#footer -->

  <script type="text/javascript" src="/assets/js/sp-slidemenu.js"></script>
<script>
var menu = SpSlidemenu({
	main : '#main',
	button: '.menu-button-left',
	slidemenu : '.slidemenu-left',
	direction: 'left'
});


</script>

</div><!-- /#main -->





</body>
</html>

