<?php 
	if(arg(0) == 'category'){
		$terms = get_sonterm_bytid(arg(1));
		if($terms){
;?>
<div>
<h3>下级栏目</h3>
<ul>
<?php foreach($terms as $sonterm){;?>
<li><a href="/category/<?php echo $sonterm->tid;?>"><?php echo $sonterm->name;?></a></li>
<?php };?>
</ul>
</div>
<?php  }};?>