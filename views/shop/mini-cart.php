
<?php if ($cart['items'] > 0):?>
    <?php foreach ($cart['contents'] as $item):?>
    <li>
        <a href="<?php echo $item['options']['url']?>" class="photo"><img src="<?php echo $item['options']['pic']?>" class="cart-thumb"></a>
        <h6><a href="<?php echo $item['options']['url']?>"><?php echo $item['options']['title']?></a></h6>
        <p><?php echo $item['qty']?>x - <span class="price"><?php echo $item['subtotal']?></span></p>
    </li>
    <?php endforeach;?>
    <li class="total" id="mini-cart-items" data-count="<?php echo $cart['items']?>">
        <span class="pull-right">
            <strong>总计</strong>: <span id="mini-cart-total"><?php echo $cart['total']?></span>
        </span>
        <a href="<?php echo URL::site('cart/checkout')?>" class="btn btn-default btn-cart">去结算</a>
    </li>
<?php else:?>
    <li class="total">
        <a href="<?php echo URL::site('product')?>" class="btn btn-default btn-block">去选购</a>
    </li>
<?php endif;?>