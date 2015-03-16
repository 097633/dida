 <div class="right">
        <div class="body_right_four"><a href="<?php echo url('party/add');?>" class="accept login_msg">活动发布</a><a href="<?php echo url('article/add');?>" class="decline login_msg">资讯分享</a></div>
        <div class="body_right_six">
    <h1>慢时间部落</h1>
</div>
<div class="body_right_one">
    <h1>热门标签 　　　　<b><a href="<?php echo url('tags');?>">[所有热门标签]</a></b></h1>
        <ul>
        <span>慢生活</span>
                <?php $data = get_term_byvname('tags', 'article', 6, 0);if($data){foreach($data as $val){;?>
                <li><a href="<?php echo url('category/'.$val->tid);?>"><?php echo $val->name;?></a></li>
								<?php }};?>
    </ul>
        <ul>
        <span>慢风景</span>
                <?php $data = get_term_byvname('tags', 'article', 6, 6);if($data){foreach($data as $val){;?>
                <li><a href="<?php echo url('category/'.$val->tid);?>"><?php echo $val->name;?></a></li>
								<?php }};?>
    </ul>
        <ul>
        <span>慢文艺</span>
                <?php $data = get_term_byvname('tags', 'article', 6, 12);if($data){foreach($data as $val){;?>
                <li><a href="<?php echo url('category/'.$val->tid);?>"><?php echo $val->name;?></a></li>
								<?php }};?>
    </ul>
        <ul>
        <span>慢一族</span>
                <?php $data = get_term_byvname('tags', 'article', 6, 18);if($data){foreach($data as $val){;?>
                <li><a href="<?php echo url('category/'.$val->tid);?>"><?php echo $val->name;?></a></li>
								<?php }};?>
    </ul>
    </div>
		<div class="body_right_two">
    <h1>热门活动<b> 　　　　　　<a href="<?php echo url('party');?>">更多>></a></b></h1>
    <ul>
				<?php $data = party_list('', 0, 6);if($data){foreach($data as $val){;?>
                <li>
            <h3><a href="<?php echo $val->url;?>"><?php echo $val->title;?></a></h3>
            <div class="content">
                <div class="vip_image"><img src="<?php echo get_litpic($val);?>" width="50" height="50" /></div>
                <div class="vip_time">
                    <p>时间：11月26日 - 12月21日 </p>
                    <p>
                                                评论<span>(4)</span>
                                                                        报名人数<span>(0)</span>
                                            </p>
                </div>
            </div>
        </li>        
       <?php }};?>         
            </ul>
</div><div class="body_right_three">
    <h1>热门资讯</h1>
    <ul>
					<?php $data = article_list('', 0, 10);if($data){foreach($data as $key=>$val){;?>
                <li>
            <a href="<?php echo $val->url;?>">
                <?php echo $val->title;?> </a>
            <span><?php echo date('m月d日',$val->timestamp);?></span>
        </li>
        <?php }};?>
            </ul>
</div>    
    </div>