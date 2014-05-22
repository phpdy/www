
<div id="mainbody">
	<div class="topimg">
		<div class="topimg_text" style="background: url(<?php echo $hd['bigimg']; ?>)"><?php echo $hd['text']; ?></div>
	</div>
	<div id="mainc">
		<div>
			<div class="main-left">
				<div class="main-left-title"><?php echo $hd['title']; ?></div>
				<?php echo $hd['info']; ?>
			</div>
			<div class="main-right">
				<img src="<?php echo $hd['img']; ?>">
			</div>
		</div>
	</div>
</div>


<?php if($t!=3) {?>
<div id="mainbody2">
	<div id="mainc2">
		<div class="mainc_title"><?php echo $title1 ; ?></div>
			<?php 
			if(!empty($list)){?>
				<div class="mainc_img">
				<?php 
				foreach ($list as $news){
					$id		= $news['id'] ;
					$imgurl	= $news['imgurl'] ;
					$info 	= $news['title'] ;
					$times 	= $news['startdate'] ;
					?>
					<ul>
						<a href="news.php?t=<?php echo $t;?>&id=<?php echo $id;?>">
						<li class="shey_img"><img src="<?php echo $imgurl ;?>" /></li>
						<li class="shey_txt"><?php echo $info ;?> >></li>
						</a>
						<li>&nbsp; <?php echo $times ;?></li>
					</ul>
				<?php }?>
				</div>
			<?php }	?>
	</div>
</div>
<?php }	?>

<div id="mainbody2">
	<div id="mainc2">
		<div class="mainc_title"><?php echo $title2 ; ?></div>
		<div class="mainc_img" id="html"></div>
		<div class="hasmore" id="hasmore"><img src="images/more.gif" alt="more"/></div>
	</div>
</div>

<script src="js/jquery-1.9.1.min.js" type="text/javascript" charset="utf-8"></script>
<script language="javascript">
$(function(){

	var p = 0 ;
	$("#hasmore").click(function(){
		//var p = $('#p').val() ;
//		alert(p) ;

		$.get("./index.php",{action:"more",o:"json", t:<?php echo $t;?>, p:p},
			function(result){
//			alert(result) ;

			var data = eval("["+result+"]") ;
			var list = data[0]["list"] ;
			for(var i=0;i<list.length;i++){
				var item = list[i] ;
				var html = "<ul>"+
				"<a href='news.php?t=<?php echo $t;?>&id="+item["id"]+"'>"+
				"<li class='shey_img'><img src='"+item["imgurl"]+"'  alt='more'/></li>"+
				"<li class='shey_txt'>"+item["title"]+" >></li>"+
				"</a>"+
				"<li>&nbsp; "+item["startdate"]+"</li>"+
				"</ul>" ;
//				alert(html) ;
				$('#html').append(html) ;
			}
			p++ ;
//			alert(data[0]["page"]) ;
//			alert(data[0]["hasmore"]) ;
//			if(data[0]["hasmore"]){
				//$('#p').val(parseInt(p)+1) ;
//				$('#hasmore').show() ;
//			} else {
//				$('#hasmore').hide() ;
//			}
			
		});
		
		return true ;
	});
	$("#hasmore").click() ;

	
});
</script>
