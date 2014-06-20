<style>
#lists{
	 margin:0 auto; 
	 width:960px;
	 border-top:none;
	 padding-top:0px;
	 margin-bottom:0px;
}
</style>
<div id="lists">
<br/>
<br/>
<div style="align:center;font-size:20;"><b><?php echo $info['title'] ;?></b></div>
<div style="align:center;"><?php echo date("Y-m-d H:m:i",$info['inputtime']) ;?></div>
<?php
//print_r($list) ;
if(!empty($info) && sizeof($info)>0){
	echo $info['content'] ;
}
?>
</div>