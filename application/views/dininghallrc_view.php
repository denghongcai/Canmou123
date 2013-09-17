<?php
$category['area'] = array('全部', '东校区', '西校区', '集贸', '东小门外', '南大门外'
, '西小门外', '光谷', '光谷天地');
?>
<div id="content">
    <div class="random-list">
        <div class="list1">
    <?php for($i = 0; $i < count($dininghallrc); $i++): ?>
        <div class="item">
            <a href="<?=base_url('dininghall/dhdetail/'.$dininghallrc[$i]['dhid'])?>" target="_blank" class="img"><img src="<?=base_url($dininghallrc[$i]['image']) ?>" /></a>
            <h5 class="recommend-name">
                [<?=$category['area'][$dininghallrc[$i]['area']]?>]<?=$dininghallrc[$i]['name']?>
                <span class="rate little-rate">评分：
					    	<span class="star-rate-all">
								<span class="star-rate-score" style="width: <?=($dininghallrc[$i]['rate']*14)?>px;"></span>
							</span>
							</span>
            </h5>
            <p class="intro"><?=mb_substr($dininghallrc[$i]['intro'], 0, 150)?><a href="<?=base_url('dininghall/dhdetail/'.$dininghallrc[$i]['dhid'])?>">详情</a></p>

            <div class="comment">
                <?php foreach ($dininghallrc[$i]['comment'] as $comment): ?>
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
    <?php endfor ?>
        </div>
    </div>
    <?php if($i == 9):?>
        <a class="change" href="<?=base_url('dininghall/index/'.($this->uri->segment(3, 0) + 1))?>">换一批</a>
    <?php else:?>
        <a class="change" href="<?=base_url('dininghall/index/0')?>">换一批</a>
    <?php endif ?>
</div>