<div class="page_wrapper_link">
  <div id="hzmt">
		<div class="hzhb">
      <div class="link_title">
        行业/话题
      </div>
      <div class="link_con">
				<?php $data = db_query("SELECT * FROM {fields_term} WHERE pid = ? ORDER BY weight DESC", array('345'));if($data){foreach($data as $val){?>
        <li>
          <a href="/tags/<?php echo $val->name;?>" target="_blank">
            <?php echo $val->name;?>
          </a>
        </li>
				<?php }};?>
      </div>
    </div>
		<div class="hzhb">
      <div class="link_title">
        技术/产品
      </div>
      <div class="link_con">
				<?php $data = db_query("SELECT * FROM {fields_term} WHERE pid = ? ORDER BY weight DESC", array(321));if($data){foreach($data as $val){
					$sonterms = get_sonterm_bytid($val->tid);if($sonterms){
						foreach($sonterms as $mval){;?>
						<li>
							<a href="/tags/<?php echo $mval->name;?>" target="_blank">
								<?php echo $mval->name;?>
							</a>
						</li>
				<?php }}else{;?>
					<li>
						<a href="/tags/<?php echo $val->name;?>" target="_blank">
							<?php echo $val->name;?>
						</a>
					</li>
				<?php };?>
				<?php }};?>
      </div>
    </div>
    <div class="hzhb">
      <div class="link_title">
        汽车主机厂
      </div>
      <div class="link_con">
				<?php $data = db_query("SELECT * FROM {fields_term} WHERE pid = ? ORDER BY weight DESC", array(103));if($data){foreach($data as $val){?>
        <li>
          <a href="/tags/<?php echo $val->name;?>" target="_blank">
            <?php echo $val->name;?>
          </a>
        </li>
				<?php }};?>
      </div>
    </div>
		<div class="hzhb">
      <div class="link_title">
        其它企业
      </div>
      <div class="link_con">
				<?php $data = db_query("SELECT * FROM {fields_term} WHERE pid = ? ORDER BY weight DESC", array(291));if($data){foreach($data as $val){?>
        <li>
          <a href="/tags/<?php echo $val->name;?>" target="_blank">
            <?php echo $val->name;?>
          </a>
        </li>
				<?php }};?>
      </div>
    </div>
		<div class="hzhb">
      <div class="link_title">
        汽车零部件厂
      </div>
      <div class="link_con">
				<?php $data = db_query("SELECT * FROM {fields_term} WHERE pid = ? ORDER BY weight DESC", array(260));if($data){foreach($data as $val){?>
        <li>
          <a href="/tags/<?php echo $val->name;?>" target="_blank">
            <?php echo $val->name;?>
          </a>
        </li>
				<?php }};?>
      </div>
    </div>
		<div class="hzhb">
      <div class="link_title">
        人物
      </div>
      <div class="link_con">
				<?php $data = db_query("SELECT * FROM {fields_term} WHERE pid = ? ORDER BY weight DESC", array('294'));if($data){foreach($data as $val){?>
        <li>
          <a href="/tags/<?php echo $val->name;?>" target="_blank">
            <?php echo $val->name;?>
          </a>
        </li>
				<?php }};?>
      </div>
    </div>
		
  </div>
</div>