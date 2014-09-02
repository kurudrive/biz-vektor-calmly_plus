<?php
/*
Plugin Name: BizVektor Calmly Plus
Plugin URI:
Description: このプラグインはBizVektorテーマ「Calmly」の派生デザインを追加する事が出来ます。
Author: Vektor,Inc,
Author URI: http://bizvektor.com
Version: 2.0
*/

/*-------------------------------------------*/
/*
/*-------------------------------------------*/

/*-------------------------------------------*/
/*	今適応されているテーマが Calmly Brace かどうかの判定
/*-------------------------------------------*/
function is_calmlyBrace(){
	if (function_exists('biz_vektor_theme_styleSetting')) {
		$options = biz_vektor_get_theme_options();
		if ($options['theme_style'] == 'calmlyBrace' || $options['theme_style'] == 'calmlyBraceFlat') {
			return true;
		}
	}
}
/*-------------------------------------------*/
/*	今適応されているテーマが Calmly Flat かどうかの判定
/*-------------------------------------------*/
function is_calmlyFlat(){
	if (function_exists('biz_vektor_theme_styleSetting')) {
		$options = biz_vektor_get_theme_options();
		if ($options['theme_style'] == 'calmlyFlat' || $options['theme_style'] == 'calmlyBraceFlat') {
			return true;
		}
	}
}

/*-------------------------------------------*/
/*	プルダウン項目の追加
/*-------------------------------------------*/
add_filter('biz_vektor_themePlus','themePlusCalmlyPlus');
function themePlusCalmlyPlus($biz_vektor_theme_styles){
	$biz_vektor_theme_styles['calmlyBrace']['label'] = 'Calmly Brace';
	$biz_vektor_theme_styles['calmlyBrace']['cssPath'] = get_template_directory_uri().'/design_skins/002/002.css';
	$biz_vektor_theme_styles['calmlyBrace']['cssPathOldIe'] = get_template_directory_uri().'/design_skins/002/002_oldie.css';
	$biz_vektor_theme_styles['calmlyFlat']['label'] = 'Calmly Flat';
	$biz_vektor_theme_styles['calmlyFlat']['cssPath'] = get_template_directory_uri().'/design_skins/002/002.css';
	$biz_vektor_theme_styles['calmlyFlat']['cssPathOldIe'] = get_template_directory_uri().'/design_skins/002/002_oldie.css';
	$biz_vektor_theme_styles['calmlyBraceFlat']['label'] = 'Calmly Brace & Flat';
	$biz_vektor_theme_styles['calmlyBraceFlat']['cssPath'] = get_template_directory_uri().'/design_skins/002/002.css';
	$biz_vektor_theme_styles['calmlyBraceFlat']['cssPathOldIe'] = get_template_directory_uri().'/design_skins/002/002_oldie.css';
	return $biz_vektor_theme_styles;
}

/*-------------------------------------------*/
/*	Brace head出力
/*-------------------------------------------*/
add_action( 'wp_head','calmlyBraceHead' , 155 );
function calmlyBraceHead(){
	if (is_calmlyBrace()){
	$calmlyOptions = biz_vektor_get_theme_options_calmly(); ?>
<!-- [ BizVektor CalmlyBrace ] -->
<style type="text/css">
#headerTop	{ border-top:none;background-color:<?php echo $calmlyOptions['theme_plusKeyColor'] ?>;box-shadow:0px 1px 3px rgba(0,0,0,0.2);}
#site-description	{ color:#fff; opacity:0.8; }
@media (min-width: 770px) {
#footMenu		{ background-color:<?php echo $calmlyOptions['theme_plusKeyColor'] ?>;border:none;box-shadow:none;box-shadow:0px 1px 3px rgba(0,0,0,0.2); }
#footMenu .menu li a			{ border-right-color:#fff;color:#fff;opacity:0.8; }
#footMenu .menu li.firstChild a	{ border-left-color:#fff;}
#footMenu .menu li a:hover	{ color:#fff !important; text-decoration:underline; }
}
</style>
<!--[if lte IE 8]>
<style type="text/css">
#footMenu		{ background-color:<?php echo $calmlyOptions['theme_plusKeyColor'] ?>;border:none;box-shadow:none;box-shadow:0px 1px 3px rgba(0,0,0,0.2); }
#footMenu .menu li a			{ border-right-color:#fff;color:#fff;opacity:0.8; }
#footMenu .menu li.firstChild a	{ border-left-color:#fff;}
#footMenu .menu li a:hover	{ color:#fff !important; text-decoration:underline; }
</style>
<![endif]-->
<!-- / [ BizVektor CalmlyBrace ] -->
	<?php }
}
/*-------------------------------------------*/
/*	Flat head出力
/*-------------------------------------------*/
add_action( 'wp_head','calmlyFlatHead' , 155);
function calmlyFlatHead(){
	if (is_calmlyFlat()){
	$calmlyOptions = biz_vektor_get_theme_options_calmly();
	?>
<!-- [ BizVektor CalmlyFlat ] -->
<style type="text/css">
@media (min-width: 770px) {
#gMenu	{ background:none;-ms-filter: "progid:DXImageTransform.Microsoft.gradient(enabled=false)" !important; }
}
</style>
<!--[if lte IE 8]>
<style type="text/css">
#gMenu	{
background:none;
-ms-filter: "progid:DXImageTransform.Microsoft.gradient(enabled=false)" !important;
-pie-background:none; }
</style>
<![endif]-->
<!-- / [ BizVektor CalmlyFlat ] -->
	<?php }
}