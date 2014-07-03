<div class="baseLogo">
  <div class="login"><div>
  <div style="width:960px;height:130px;background:url(http://www2.nyipcn.com/images/logo_top.gif) no-repeat;">
  </div>

</div>

<!--nav begin-->
<?php
  //$sql = "select catid,catname from v9_category order by listorder";
  $nav[0] = array("首页","http://www.newshootedu.com",0);
  $nav[1] = array("课程信息","clist.php?cid=10",10);
  $nav[2] = array("摄影天地","clist.php?cid=20",20);
  $nav[3] = array("学员中心","clist.php?cid=15",15);
  $nav[4] = array("关于我们","clist.php?cid=17",17);
  $nav[5] = array("联系我们","clist.php?cid=17",17);
  $nav[6] = array("常见问题","clist.php?cid=17",17);
  //$nav[5] = array("学员中心","clist.php?cid=100",0);
  //print_r ($nav);
?>
<div id="navDiv">
  <div class="nav_list">
<?php
$arr = $nav;
$i = 1;
foreach ($arr as $value) {
?>

    <div class="nav_sheet" onmouseover="this.className='nav_sheet2'" onmouseout="this.className='nav_sheet'">
      <a onfocus="this.blur()" class="tab_link" href="<?=$value[1];?>"><?=$value[0];?></a>
    </div>
    <?php
    if ($i<7) {
    ?>
    <div style="padding:0;float:left;color:#fff;padding-top:6px;">|</div>
    <? } ?>

<?php
  $i++;
}
?>
  <div class="slogin">[ <a href=#>登录</a> | <a href=#>注册</a> ]</div></div>
  
  <div id="nav_search"><input type="text" class="s_text"><input type="submit" id="su" value="" class="s_btn"></div>
</div>
<!--nav end-->