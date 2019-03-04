<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>

<?if ($arParams['AJAX_REQ'] != 'Y'):?>
<div class="cart-box" id="cart-box">
<?endif?>
	<a href="<?=$arParams['PATH_TO_BASKET']?>" class="cart-head" title="<?=GetMessage('LODIO_CART_NAME')?>">
		<?$frame = $this->createFrame('topbutton_cart_composite_1')->begin();?><span class="cart-head__cnt" id="cart-count"><?=count($arResult['CATEGORIES']['READY'])?></span><?$frame->end();?>
	</a>
<?if ($arParams['AJAX_REQ'] != 'Y'):?>
</div>
<?endif?>