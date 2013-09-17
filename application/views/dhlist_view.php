<?php
$category['area'] = array('全部', '东校区', '西校区', '集贸', '东小门外', '南大门外'
, '西小门外', '光谷', '光谷天地');
?>
<div id="content">
    <div class="list-how">
        <?php
            $uri = $this->uri->segment_array();
            $uri[7] = '0';
            if(!array_key_exists(8, $uri))
                $uri[8] = '0';
            if(!array_key_exists(9, $uri))
                $uri[9] = '0';
            $url = '';
            $order = $uri[8];
        ?>
        <?php if($order == '2'):?>
            <a href="#" class="list-how-chosen">价格升序</a>
        <?php else: ?>
            <?php
                $uri[8] = '2';
                foreach($uri as $item){
                    $url = $url.$item.'/';
                }
            ?>
            <a href="<?=base_url($url)?>">价格升序</a>
        <?php endif ?>
        <?php if($order == '1'):?>
            <a href="#" class="list-how-chosen">价格降序</a>
        <?php else: ?>
            <?php
                $uri[8] = '1';
                $url = '';
                foreach($uri as $item){
                    $url = $url.$item.'/';
                }
            ?>
            <a href="<?=base_url($url)?>">价格降序</a>
        <?php endif ?>
        <?php if($order == '3'):?>
            <a href="#" class="list-how-chosen">评分</a>
        <?php else: ?>
            <?php
                $uri[8] = '3';
                $url = '';
                foreach($uri as $item){
                    $url = $url.$item.'/';
                }
            ?>
            <a href="<?=base_url($url)?>">评分</a>
        <?php endif ?>
    </div>
    <div class="random-list">
        <div class="list1">
    <?php for($i = 0; $i < count($dhlist); $i++): ?>
        <div class="item <?php if($i == 1 || $i ==4 || $i == 7) echo 'itemc'?>">
            <a href="<?=base_url('dininghall/dhdetail/'.$dhlist[$i]['dhid'])?>" target="_blank" class="img"><img src="<?=base_url($dhlist[$i]['image']) ?>" /></a>
            <h5 class="recommend-name">
                [<?=$category['area'][$dhlist[$i]['area']]?>]<?=$dhlist[$i]['name']?>
							<span class="rate little-rate">评分：
					    	<span class="star-rate-all">
								<span class="star-rate-score" style="width: <?=($dhlist[$i]['rate']*14)?>px;"></span>
							</span>
							</span>
            </h5>
            <p class="intro"><?=mb_substr($dhlist[$i]['intro'], 0, 150) ?><a href="<?=base_url('dininghall/dhdetail/'.$dhlist[$i]['dhid'])?>">详情</a></p>

            <div class="comment">
                <?php foreach ($dhlist[$i]['comment'] as $comment): ?>
                    <div class="commnt_hold">
                        <a href="#" class="head"><img src="<?=base_url($comment['userinfo']['image'])?>"/></a>

                        <div class="comment_content">
                            <p><a href="#"><?php echo $comment['userinfo']['usrname'] ?></a>:<?=mb_substr($comment['content'], 0, 15)?></p>

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
        <a class="change" href="<?php
                $url = '';
                $uri[8] = $order;
                ++$uri[9];
                foreach($uri as $item){
                    $url = $url.$item.'/';
                }
                echo base_url($url);
            ?>">换一批</a>
    <?php else :?>
        <a class="change" href="<?php
        $url = '';
        $uri[8] = $order;
        $uri[9] = 0;
        foreach($uri as $item){
            $url = $url.$item.'/';
        }
        echo base_url($url);
        ?>">换一批</a>
    <?php endif ?>
</div>