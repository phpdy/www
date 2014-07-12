<link type="text/css" href="./css/order.css" rel="stylesheet">
<div id="channel_nav">
	<a href="index.php">首页</a>&nbsp;&nbsp;<img src="images/nav-breadcrumb.png" border="0" width="6" height="12" align=absmiddle>&nbsp;&nbsp;
	汇款报名
</div>

<div id="channel_main">

  <!--left begin-->
  <div class="dt_left">
    <div id="dt_main">
      <div style="clear:both"></div>
      <div class="dt_title">订单信息</div>
      <div class="dt_content">
	      <table class="order">
			<tr><td colspan=2><b><font color="red"><?php echo @$text; ?></font></b></td></tr>
			<tr><td>订单号：</td><td><?php echo @$order['orderid']; ?></td>	</tr>
			<tr><td>订单金额：</td><td>￥ <?php echo @$order['money']; ?> 元</td></tr>
			<tr><td>订单日期：</td><td><?php echo @$order['paydate'] ; ?></td></tr>
			<tr><td>支付方式：</td><td><?php echo @$order['paytype'] ; ?></td></tr>
		  </table>
	  </div>

	  <br>
	  <div style="clear:both"></div>
	  <div class="dt_title">汇款方式</div>
      <div class="dt_content">
      	
	<table class="order">
		<tr>
			<td colspan="2"><b>如果您希望通过银行汇款，可将学习费用汇入纽摄教育公司账户：</b></td>
		</tr>
		<tr>
			<td colspan="2">中国工商银行</td>
		</tr>
		<tr>
			<td>开户行：</td><td>中国工商银行北京学清路支行</td>
		</tr>
		<tr>
			<td>户  名：</td><td>北京纽摄教育科技有限公司</td>
		</tr>
		<tr>
			<td>账  号：</td><td>0200148609000008609</td>
		</tr>
		<tr>
			<td colspan="2">特别提示：</td>
		</tr>
		<tr>
			<td colspan="2">为避免汇款混淆，请务必在汇款附言中注明是参加哪个活动的费用，并将汇款凭证通过电子邮件（100602915@qq.com）提交给我们。对公账户汇款查询时间约为收到汇款凭证后2个工作日，假期期间（包括国家法定节假日）无法查询，给你带来的不便之处敬请谅解。</td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2">为了方便您的汇款，你也可以将款项汇入纽摄俱乐部主任王效海的个人专项银行卡内（可以随时查询付款情况）。无论你采用哪种汇款方式，我们都会为你开具培训费的正式发票。</td>
		</tr>
		<tr>
			<td colspan="2"><b>中国工商银行</b></td>
		</tr>
		<tr>
			<td>开户行：</td><td>中国工商银行北京分行中关村支行成府路分理处</td>
		</tr>
		<tr>
			<td>户  名：</td><td>王效海</td>
		</tr>
		<tr>
			<td>账  号：</td><td>9558880200004818950</td>
		</tr>
		<tr>
			<td colspan="2"><b>中国农业银行</b></td>
		</tr>
		<tr>
			<td>开户行：</td><td>中国农业银行北京昌平支行西三旗分理处</td>
		</tr>
		<tr>
			<td>户  名：</td><td>王效海</td>
		</tr>
		<tr>
			<td>账  号：</td><td>6228480010544634412</td>
		</tr>
		<tr>
			<td colspan="2"><b>招商银行</b></td>
		</tr>
		<tr>
			<td>开户行：</td><td>招商银行北京西三环支行</td>
		</tr>
		<tr>
			<td>户  名：</td><td>王效海</td>
		</tr>
		<tr>
			<td>账  号：</td><td>6225800101305240</td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2">我们建议您在使用银行卡汇款时，务必认真核对户名及账号，以免延误。同时仔细阅读下面的提示，以免给您造成不必要的麻烦与损失。</td>
		</tr>
		<tr>
			<td colspan="2">1、汇款之后，请保留好您的汇款记录，以便查询。同时：<br/>（1）请立即将汇款回单和报名表发送到：100602915@qq.com邮箱中。<br/>（2）请使用您的手机向中国联通手机15601050585发送一条短信，注明您的姓名，汇款金额、汇款目的。我们将在2个工作日内及时与您联系，处理相关事宜。</td>
		</tr>
		<tr>
			<td colspan="2">2、跨行汇款由于不能查询汇款人信息，为避免难于查询，在汇款的时候金额可以留有零数。可以少汇0.01——0.99元，以便查询。<br>例如：您汇款100元的话，实际可以汇款99.98元，我们依然会为您开具整数的发票。</td>
		</tr>
		<tr>
			<td colspan="2">3、如果汇款人不是参加活动的会员本人，请在您的汇款回单上注明会员姓名，并通过邮件发送给我们。</td>
		</tr>
		<tr>
			<td colspan="2">4、为防止诈骗行为，我们不会通过短信方式提供银行账号。<br/>任何通过短信方式发送的汇款信息都可能存在诈骗的可能。请一定慎重！！我们建议在您确认汇款操作前可以通过学校电话010-82755840 再次确认。</td>
		</tr>
		<tr>
			<td colspan="2">5、千万不要向上述账号之外的银行卡汇款，否则可能导致您的财产损失。<br/>一旦遭遇诈骗行为，请立即向发卡银行和当地警方报警。（无论是固话和手机均可拨打报警电话：110）</td>
		</tr>
	</table>
      </div>
      
    </div>
  </div>
  <!--left end-->

  <!--right begin-->
  <div class="dt_right">

    <!--sina weibo begin-->
    <div class="dt_wb"><h2 class="widgettitle">纽摄微博</h2>
      <div class="textwidget"><iframe id="sina_widget_1930141335" style="width:100%; height:575px;" frameborder="0" scrolling="no" src="http://v.t.sina.com.cn/widget/widget_blog.php?uid=2722123761&height=575&skin=wd_02&showpic=1"></iframe></div>
    </div>
    <!--sina weibo end-->
    
  </div>
  <!--right end-->

</div>
