<?php
$category['area'] = array('全部', '东校区', '西校区', '集贸', '东小门外', '南大门外'
, '西小门外', '光谷', '光谷天地');
?>
<div id="content">
<div class="list">
    <div class="list-number"><img src="<?=base_url('img/1.png')?>"/></div>
    <a href="<?=base_url('dininghall/dhdetail/'.$dhhot[0]['dhid'])?>" target="_blank" class="img"><img src="<?=base_url($dhhot[0]['image']) ?>" /></a>

    <div class="first">
        <h5 class="recommend-name">
            [<?=$category['area'][$dhhot[0]['area']]?>]<?=$dhhot[0]['name']?>
							<span class="rate little-rate">评分：
							<span class="star-rate-all">
								<span class="star-rate-score" style="width: <?=($dhhot[0]['rate']*14)?>px;"></span>
							</span>
							</span>
        </h5>

        <p><span class="blue">餐厅简介:</span><?=mb_substr($dhhot[0]['intro'], 0, 300) ?></p>
    </div>
    <div class="first"><p><span class="blue">上榜理由:</span>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
        </p></div>
</div>
<div class="list">
    <div class="list-number"><img src="<?=base_url('img/2.png')?>"/></div>
    <a href="<?=base_url('dininghall/dhdetail/'.$dhhot[1]['dhid'])?>" target="_blank" class="img"><img src="<?=base_url($dhhot[1]['image']) ?>" /></a>

    <div class="first">
        <h5 class="recommend-name">
            [<?=$category['area'][$dhhot[1]['area']]?>]<?=$dhhot[1]['name']?>
							<span class="rate little-rate">评分：
							<span class="star-rate-all">
								<span class="star-rate-score" style="width: <?=($dhhot[1]['rate']*14)?>px;"></span>
							</span>
							</span>
        </h5>

        <p><span class="green">餐厅简介:</span><?=mb_substr($dhhot[1]['intro'], 0, 300) ?></p>
    </div>
    <div class="first"><p><span class="green">上榜理由:</span>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
        </p></div>
</div>
<div class="list">
    <div class="list-number"><img src="<?=base_url('img/3.png')?>"/></div>
    <a href="<?=base_url('dininghall/dhdetail/'.$dhhot[2]['dhid'])?>" target="_blank" class="img"><img src="<?=base_url($dhhot[2]['image']) ?>" /></a>

    <div class="first">
        <h5 class="recommend-name">
            [<?=$category['area'][$dhhot[1]['area']]?>]<?=$dhhot[1]['name']?>
							<span class="rate little-rate">评分：
							<span class="star-rate-all">
								<span class="star-rate-score" style="width: <?=($dhhot[1]['rate']*14)?>px;"></span>
							</span>
							</span>
        </h5>

        <p><span class="red">餐厅简介:</span><?=mb_substr($dhhot[2]['intro'], 0, 300) ?></p>
    </div>
    <div class="first"><p><span class="red">上榜理由:</span>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</p>
    </div>
</div>
</div>