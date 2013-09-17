<?php
$category['type'] = array('全部', '火锅', '川湘菜', '江浙菜'
, '烧烤烤肉', '香锅烤鱼', '西北菜', '东北菜', '清真菜'
, '汤/粥/炖菜', '家常菜', '自助餐', '西餐', '蛋糕', '韩国料理', '日本料理'
, '甜点饮品', '小吃快餐', '咖啡酒吧', '学生食堂');
$category['area'] = array('全部', '东校区', '西校区', '集贸', '东小门外', '南大门外'
, '西小门外', '光谷', '光谷天地');
$category['eater'] = array('全部', '单人餐', '双人餐', '3-4人餐', '多人餐');
$category['price'] = array('全部', '10元以下', '10-20元', '20-50元', '50-80元', '80元以上');
?>
<div id="class">
    <div class="category">
        <p><b>分类:</b></p>
        <b>中餐</b>
        <?php for ($i = 0; $i < 11; $i++): ?>
            <?php if ($current['type'] == ($i)): ?>
                <span class='current'><?= $category['type'][$i] ?></span>
            <?php else: ?>
                <a href="<?php echo base_url('dininghall/dhlist/' . ($i) . '/' . $current['area'] . '/' . $current['eater']
                . '/' . $current['price'])?>"><?= $category['type'][$i] ?></a>
            <?php endif ?>
        <?php endfor ?>
        <br/>
        <br/>

        <b>非中餐</b>
        <?php for ($i = 11; $i < 20; $i++): ?>
            <?php if ($current['type'] == ($i)): ?>
                <span href="#" class='current'><?= $category['type'][$i] ?></span>
            <?php else: ?>
                <a href="<?php echo base_url('dininghall/dhlist/' . ($i) . '/' . $current['area'] . '/' . $current['eater']
                . '/' . $current['price'])?>"><?= $category['type'][$i] ?></a>
            <?php endif ?>
        <?php endfor ?>
    </div>
    <div class="district">
        <b>地域</b>
        <?php for ($i = 0; $i < 8; $i++): ?>
            <?php if ($current['area'] == ($i)): ?>
                <span class='current'><?= $category['area'][$i] ?></span>
            <?php else: ?>
                <a href="<?php echo base_url('dininghall/dhlist/' . $current['type'] . '/' . ($i) . '/' . $current['eater']
                . '/' . $current['price'])?>"><?= $category['area'][$i] ?></a>
            <?php endif ?>
        <?php endfor ?>
    </div>
    <div class="number">
        <b>人数</b>
        <?php for ($i = 0; $i < 5; $i++): ?>
            <?php if ($current['eater'] == ($i)): ?>
                <span class='current'><?= $category['eater'][$i] ?></span>
            <?php else: ?>
                <a href="<?php echo base_url('dininghall/dhlist/' . $current['type'] . '/' . $current['area'] . '/' . ($i)
                . '/' . $current['price'])?>"><?= $category['eater'][$i] ?></a>
            <?php endif ?>
        <?php endfor ?>
    </div>
    <div class="value">
        <b>人均消费</b>
        <?php for ($i = 0; $i < 6; $i++): ?>
            <?php if ($current['price'] == ($i)): ?>
                <span class='current'><?= $category['price'][$i] ?></span>
            <?php else: ?>
                <a href="<?php echo base_url('dininghall/dhlist/' . $current['type'] . '/' . $current['area'] . '/' . $current['eater']
                . '/' . ($i))?>"><?= $category['price'][$i] ?></a>
            <?php endif ?>
        <?php endfor ?>
    </div>
</div>