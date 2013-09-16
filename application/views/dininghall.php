<h1>
    <span id="name-area">［
        <?php
            $category['area'] = array('全部', '东校区', '西校区', '集贸', '东小门外', '南大门外'
            , '西小门外', '光谷', '光谷天地');
            echo $category['area'][$area];
        ?>
    ］</span><?=$name?><span class="rate bigtitle-star">评分：
						<span class="star-rate-all">
							<span class="star-rate-score" style="width: <?=($rate*14)?>px;"></span>
						</span>
					</span> <a class="reding" href="#" id="getcheap">领取优惠券</a>
</h1>

<div id="leftbar">
    <div class="img-holder">
        <div class="lxfscroll">
            <div class="lxfscroll-alt"></div>
            <ul>
                <?php foreach($dhimg as $item):?>
                <li><img src="<?=base_url($item['path'])?>" width="640" height="320" alt="餐厅环境"/></li>
                <?php endforeach ?>
            </ul>
        </div>
        <div class="lxfscroll-title">
            <ul>
                <li class="cur">1</li>
                <?php for($i = 2; $i <= count($dhimg); $i++):?>
                    <li><?=$i?></li>
                <?php endfor ?>
            </ul>
        </div>
    </div>
    <div id="introduce">
        <h4 class="title">餐厅简介</h4>
        <p>
            <?=$intro?>
        </p>
        <h4 class="title">饭菜一览</h4>
        <?php foreach($cuisine as $item):?>
        <div class="food">
            <img src="<?=base_url($item['image'])?>" />
            <p class="food-introduce"><?=$item['intro']?></p>
        </div>
        <?php endforeach ?>
    </div>
    <h4 class="title">参谋评论</h4>
    <div id="res-comment-hold">
        <?php foreach($comment[0]['comment'] as $item):?>
        <div class="res-comment">
            <a href="#" class="res-head"><img src="<?=$item['userinfo']['image']?>"/></a>
            <div class="res-comment_content">
                <p><a href="#"><?=$item['userinfo']['usrname']?></a></a>:<?=$item['content'] ?></p>
                <p class="date"><?=$item['date'] ?></p>
            </div>
        </div>
        <?php endforeach ?>
        <a href="#" id="comment-in">参与评论</a>
    </div>
    <div id="i-comment">
        <form id="comment-dh" method="post" action="<?=base_url("comment/add/$dhid")?>">
        <h4 class="title">我来说几句</h4>
        <h5 class="i-rate-holder-1"><span>口味评分：</span>
            <input name="tastestar" class="star-holder-1" value="5" style="display: none">
            <div class="star-holder-1" value="5">
                <a href="" class="i-rate"></a>
                <a href="" class="i-rate"></a>
                <a href="" class="i-rate"></a>
                <a href="" class="i-rate"></a>
                <a href="" class="i-rate"></a>
            </div>
        </h5>
        <h5 class="i-rate-holder-2"><span>服务评分：</span>
            <input name="serstar" class="star-holder-2" value="5" style="display: none">
            <div class="star-holder-2" value="5">
                <a href="" class="i-rate"></a>
                <a href="" class="i-rate"></a>
                <a href="" class="i-rate"></a>
                <a href="" class="i-rate"></a>
                <a href="" class="i-rate"></a>
            </div>
        </h5>
        <h5 class="i-rate-holder-3"><span>环境评分：</span>
            <input name="envstar" class="star-holder-3" value="5" style="display: none">
            <div class="star-holder-3" value="5">
                <a href="" class="i-rate"></a>
                <a href="" class="i-rate"></a>
                <a href="" class="i-rate"></a>
                <a href="" class="i-rate"></a>
                <a href="" class="i-rate"></a>
            </div>
        </h5>
        <textarea name="content" id="wanna-comment" ></textarea>
        <button type="submit" id="i-comment-button">评论</button>
        </form>
    </div>
</div>
<div id="rightbar">
    <div id="map-holder">
        <h4 class="title">餐厅地图</h4>
        <div id="map">
        </div>
        <p id="address">
            <span>地址：</span><?=$map?>
        </p>
    </div>
    <div id="recommend-holder">
        <h4 class="title">同类餐厅</h4>
        <div class="recommend">
            <div class="recommend-img"></div>
            <h5 class="recommend-name">
                [光谷/鲁巷]牛家庄
							<span class="rate little-rate">评分：
							<span class="star-rate-all">
								<span class="star-rate-score"></span>
							</span>
							</span>
            </h5>

        </div>
    </div>


</div>


</div>