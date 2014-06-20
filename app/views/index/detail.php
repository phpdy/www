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
<?php
//print_r($list) ;
if(!empty($list) && sizeof($list)>0){
	echo $list[0]['content'] ;
}
?>
</div>