<link type="text/css" href="./css/order.css" rel="stylesheet">

<div id="mainbody">
	<div class="main_new">
	<div class="main_new_nav">
		<span><a href="index.php">首页</a></span>&nbsp;&nbsp;>>&nbsp;&nbsp;
		<span><a href="index.php?t=5">会员中心</a></span>&nbsp;&nbsp;>>&nbsp;&nbsp;
		<span>订单</span>
	</div>
	<div class="main_content">
	<table class="order">
		<tr><td>订单信息</td><td>&nbsp;</td></tr>
		<tr><td>订单号：</td><td><?php echo $order['orderid']; ?></td>	</tr>
		<tr><td>金额：</td><td><?php echo $order['money']; ?></td>	</tr>
		<tr><td>订单日期：</td><td><?php echo $order['paydate'] ; ?></td></tr>
		<tr><td>支付方式：</td><td><?php echo $order['paytype'] ; ?></td></tr>
	</table>
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
			<td>账  号：</td><td>0200 1486 0900 0008 609</td>
		</tr>
		<tr>
			<td colspan="2">特别提示：</td>
		</tr>
		<tr>
			<td colspan="2">为避免汇款混淆，请务必在汇款附言中注明是参加哪个活动的费用，并将汇款凭证通过电子邮件（club@nyip.cn）提交给我们。对公账户汇款查询时间约为收到汇款凭证后2个工作日，假期期间（包括国家法定节假日）无法查询，给你带来的不便之处敬请谅解。</td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2">为了方便您的汇款，你也可以将款项汇入纽摄俱乐部负责人潘晓蓓的个人专项银行卡内（可以随时查询付款情况）。无论你采用哪种汇款方式，我们都会为你开具培训费的正式发票。</td>
		</tr>
		<tr>
			<td colspan="2"><b>中国工商银行</b></td>
		</tr>
		<tr>
			<td>开户行：</td><td>中国工商银行海淀西区苏州街支行</td>
		</tr>
		<tr>
			<td>户  名：</td><td>潘晓蓓</td>
		</tr>
		<tr>
			<td>账  号：</td><td>9558 8102 0011 3322 857</td>
		</tr>
		<tr>
			<td colspan="2"><b>中国光大银行</b></td>
		</tr>
		<tr>
			<td>开户行：</td><td>中国光大银行北京宣武支行</td>
		</tr>
		<tr>
			<td>户  名：</td><td>潘晓蓓</td>
		</tr>
		<tr>
			<td>账  号：</td><td>6226 6602 0261 1873</td>
		</tr>
		<tr>
			<td colspan="2"><b>招商银行</b></td>
		</tr>
		<tr>
			<td>开户行：</td><td>招商银行北京世纪城支行</td>
		</tr>
		<tr>
			<td>户  名：</td><td>潘晓蓓</td>
		</tr>
		<tr>
			<td>账  号：</td><td>6225 8801 7358 0235</td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2">我们建议您在使用银行卡汇款时，务必认真核对户名及账号，以免延误。同时仔细阅读下面的提示，以免给您造成不必要的麻烦与损失。</td>
		</tr>
		<tr>
			<td colspan="2">1、汇款之后，请保留好您的汇款记录，以便查询。同时：<br/>（1）请立即将汇款回单和报名表发送到：club@nyip.cn邮箱中。<br/>（2）请使用您的手机向中国联通手机13911456892发送一条短信，注明您的姓名，汇款金额、汇款目的。我们将在2个工作日内及时与您联系，处理相关事宜。</td>
		</tr>
		<tr>
			<td colspan="2">2、跨行汇款由于不能查询汇款人信息，为避免难于查询，在汇款的时候金额可以留有零数。可以少汇0.01——0.99元，以便查询。<br>例如：您汇款100元的话，实际可以汇款99.98元，我们依然会为您开具整数的发票。</td>
		</tr>
		<tr>
			<td colspan="2">3、如果汇款人不是参加活动的会员本人，请在您的汇款回单上注明会员姓名，并通过邮件发送给我们。</td>
		</tr>
		<tr>
			<td colspan="2">4、为防止诈骗行为，我们不会通过短信方式提供银行账号。<br/>任何通过短信方式发送的汇款信息都可能存在诈骗的可能。请一定慎重！！我们建议在您确认汇款操作前可以通过学校电话010-57026445 再次确认。</td>
		</tr>
		<tr>
			<td colspan="2">5、千万不要向上述账号之外的银行卡汇款，否则可能导致您的财产损失。<br/>一旦遭遇诈骗行为，请立即向发卡银行和当地警方报警。（无论是固话和手机均可拨打报警电话：110）</td>
		</tr>
	</table>
	</div>
	
	<div class="main_daily">
		<?php include 'daily.php';?>
	</div>
	</div>
</div>
