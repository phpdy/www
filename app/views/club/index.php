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
		if(is_array($list)){
			foreach($list as $key=>$item){
		?>
		<div class="fenlei">
			<ul>
			<?php 
				foreach ($item as $k=>$club){
					//第一个是大图
					if($k==0){
			?>
				<a href="index.php?control=news&t=<?php echo $key;?>&id=<?php echo $club['id'];?>">
				<li style="background:#000;color:#fff">
					<div class="tj_img"><img src="<?php echo $club['thumb'] ;?>"/></div>
					<div class="tj_desc"><?php echo $club['description'] ;?></div>
				</li>
				</a>
				
				<?php 
					} else {
				?>
				<li>
					<a href="index.php?control=news&t=<?php echo $key;?>&id=<?php echo $club['id'];?>">
					<div class="list">
						<div class="list_img"><img src="<?php echo $club['thumb'] ;?>"/></div>
						<div class="list_text"><?php echo $club['description'] ;?></div>
					</div>
					</a>
				</li>
				<?php }
				}?>
				<li style="float:right;margin-left:50px;margin-bottom: 0px;">
					<a href="index.php?control=list&type=<?php echo $key;?>"><img src="images/more.gif" alt="more"/></a>
				</li>
			</ul>
		</div>
		<?php }
		} ?>
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

<script src="./js/jquery-1.9.1.min.js" type="text/javascript" charset="utf-8"></script>
<script language="javascript">
$(function(){
	<?php for($i=0;$i<2;$i++){?>
	var page<?php echo $i;?> =0 ;
	$("#more<?php echo $i;?>").click(function(){
		//alert(p) ;

		$.get("./index.php",{control:"json", t:<?php echo $i+4;?>, p:page<?php echo $i;?>},
			function(data){
//			alert(data) ;

			var data = eval("["+data+"]") ;
			var list = data[0]["list"] ;
			for(var i=0;i<list.length;i++){
				var item = list[i] ;
				html = "<a href='index.php?control=news&t=0&id="+item["id"]+"'>"+
				"<ul><li class='shey_img'><img src='"+item["thumb"]+"' /></li>"+
				"<li class='shey_txt'>"+item["description"]+" >></li>"+
				"<li>&nbsp;</li>"+
				"</ul></a>";
//				alert(html) ;
				$('#img_<?php echo $i;?>').append(html) ;
			}
			page<?php echo $i;?> ++ ;
			
		});
		return true ;
	});
	
	$("#more<?php echo $i;?>").click();
	<?php }?>
});

//轮播
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