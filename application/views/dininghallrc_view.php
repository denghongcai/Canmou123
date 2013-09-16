<?php
$category['area'] = array('全部', '东校区', '西校区', '集贸', '东小门外', '南大门外'
, '西小门外', '光谷', '光谷天地');
?>
<div id="content">
    <div class="list-how">
        <a href="#" class="list-how-chosen">价格升序</a>
        <a href="#">价格降序</a>
        <a href="#">评分</a>
    </div>
    <?php foreach ($dininghallrc as $item): ?>
        <div class="item">
            <a href="<?=base_url('dininghall/dhdetail/'.$item['dhid'])?>" target="_blank" class="img"><img src="<?=base_url($item['image']) ?>" /></a>
            <h5 class="recommend-name">
                [<?=$category['area'][$item['area']]?>]<?=$item['name']?>
                <span class="rate little-rate">评分：
					    	<span class="star-rate-all">
								<span class="star-rate-score" style="width: <?=($item['rate']*14)?>px;"></span>
							</span>
							</span>
            </h5>
            <p class="intro"><?=mb_substr($item['intro'], 0, 150)?><a href="<?=base_url('dininghall/dhdetail/'.$item['dhid'])?>">详情</a></p>

            <div class="comment">
                <?php foreach ($item['comment'] as $comment): ?>
                    <div class="commnt_hold">
                        <a href="#" class="head"><img src="<?php echo $comment['userinfo']['image']?>"/></a>

                        <div class="comment_content">
                            <p><a href="#"><?php echo $comment['userinfo']['usrname'] ?></a>:<?=mb_substr($comment['content'], 0, 15) ?></p>

                            <p class="date"><?php echo $comment['date'] ?></p>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    <?php endforeach ?>
</div>