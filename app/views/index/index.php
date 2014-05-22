<!--main begin-->
<div id="mainbody">
	<div class="topimg">
		<?php foreach($piclist as $key=>$item){ ?>
		<div class="djimg" id="flash<?php echo $key+1 ;?>" style="display: none;background: url(<?php echo $item['imgurl'];?>);">
			<div class="djimg_text">
				<a href="<?php echo $item['url'];?>">
				<div class="djimg_title"><?php echo $item['title'];?></div>
				<div class="djimg_info"><?php echo $item['description'];?></div>
				</a>
			</div>
		</div>
		<?php }?>
		<div class="flash_bar">
			<div class="no" id="f1" onclick="changeflash(1)"></div>
			<div class="dq" id="f2" onclick="changeflash(2)"></div>
			<div class="no" id="f3" onclick="changeflash(3)"></div>
			<div class="no" id="f4" onclick="changeflash(4)"></div>
        </div>
	</div>
	<div id="mainc">
		<?php 
		for($i=1;$i<=3;$i++){
			$item = @$list[$i] ;
			$first = $item[0] ;
		?>
		<div class="fenlei">
			<ul>
				<a href="news.php?t=<?php echo $i;?>&id=<?php echo $first['id'];?>">
				<li style="background:#000;color:#fff">
					<div class="tj_img"><img src="<?php echo $first['imgurl'] ;?>"/></div>
					<div class="tj_desc"><?php echo $first['desc'] ;?></div>
				</li>
				</a>
				
				<?php 
				for($h=1;$h<=3 && $h<sizeof($item);$h++){
					$club = $item[$h] ;
				?>
				<li>
					<a href="news.php?t=<?php echo $i;?>&id=<?php echo $club['id'];?>">
					<div class="list">
						<div class="list_img"><img src="<?php echo $club['imgurl'] ;?>"/></div>
						<div class="list_text"><?php echo $club['desc'] ;?></div>
					</div>
					</a>
				</li>
				<?php }?>
			</ul>
		</div>
		<?php } ?>
	</div>
</div>


<div id="mainbody2">
<div id="mainc2">
	<div class="mainc_title">和我们一起探索美妙的摄影世界</div>
	<div class="mainc_img" id="img_0"></div>
	<div class="more" id="more0"><b>更多摄影作品展示</b>></div>
	
	<div class="mainc_img" id="img_1"></div>
	<div class="more" id="more1"><b>更多过往活动花絮</b>></div>
	
</div>
</div>

<!--main end-->

<script src="js/jquery-1.9.1.min.js" type="text/javascript" charset="utf-8"></script>
<script language="javascript">
$(function(){
	<?php for($i=0;$i<2;$i++){?>
	var p<?php echo $i;?> =0 ;
	$("#more<?php echo $i;?>").click(function(){
		//alert(p) ;

		$.get("./index.php",{action:"more",o:"json", t:<?php echo $i+4;?>, p:p<?php echo $i;?>},
			function(data){
//			alert(data) ;

			var data = eval("["+data+"]") ;
			var list = data[0]["list"] ;
			for(var i=0;i<list.length;i++){
				var item = list[i] ;
				html = "<a href='news.php?t=0&id="+item["id"]+"'>"+
				"<ul><li class='shey_img'><img src='"+item["imgurl"]+"' /></li>"+
				"<li class='shey_txt'>"+item["desc"]+" >></li>"+
				"<li>&nbsp;</li>"+
				"</ul></a>";
//				alert(html) ;
				$('#img_<?php echo $i;?>').append(html) ;
			}
			p<?php echo $i;?> ++ ;
//			if(data[0]["hasmore"]){
				//$('#p<?php echo $i;?>').val(parseInt(p)+1) ;
//			} else {
//				$('#more<?php echo $i;?>').hide() ;
//			}
			
		});
		return true ;
	});
	
	$("#more<?php echo $i;?>").click();
	<?php }?>
});

function changeflash(i) {
	currentindex=i;
	for (j=1;j<=4;j++){
		if (j==i) {
			$("#flash"+j).fadeIn("normal");
			$("#flash"+j).css("display","block");
			$("#f"+j).removeClass();
			$("#f"+j).addClass("dq");
			//$("#flashBg").css("background-color",$("#flash"+j).attr("name"));
		}else{
			$("#flash"+j).css("display","none");
			$("#f"+j).removeClass();
			$("#f"+j).addClass("no");
		}
	}
}
changeflash(1);
function startAm(){
	timerID = setInterval("timer_tick()",5000);
}
function stopAm(){
	clearInterval(timerID);
}
function timer_tick() {
    currentindex=currentindex>=4?1:currentindex+1;
	changeflash(currentindex);
}
$(document).ready(function(){
	$(".flash_bar div").mouseover(function(){stopAm();}).mouseout(function(){startAm();});
	startAm();
});

</script>