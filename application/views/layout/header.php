
<div id="main">

<div id="header">

  <?php  if ($this->session->userdata('member_id')){ ?>
    <span class="button menu-button-left"></span>

    <ul>
      <li><?php echo ($this->session->userdata('last_name'));?> <?php echo ($this->session->userdata('first_name'));?>　でログイン中</li>
    </ul>


<!--     <ul>
      <li><a href="/logout">aaa</a></li>
    </ul> -->


  <?php }else{ ?>

  <?php } ?>



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

div#header ul li {
  width: 240px;
  display: block;
  text-align: center;
  line-height: 70px;
  font-size: 15px;
  font-weight: bold;
  color: #4078c0;
  text-decoration: none;
}

div#header ul li a:hover {
  width: 240px;
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
  margin-top: 10px;
}
</style>
