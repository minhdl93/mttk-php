<?php /* Smarty version Smarty-3.1.18, created on 2014-10-31 16:36:06
         compiled from "application\views\templates\test404.tpl" */ ?>
<?php /*%%SmartyHeaderCode:223595453ac6673ac30-77565882%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '105cb0b913e8536e5b05a014dc2c201cb3c8fe9e' => 
    array (
      0 => 'application\\views\\templates\\test404.tpl',
      1 => 1414769515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '223595453ac6673ac30-77565882',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5453ac668425d6_03220253',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5453ac668425d6_03220253')) {function content_5453ac668425d6_03220253($_smarty_tpl) {?><html>
<head>
<style type="text/css">
.frame {
max-width: 980px;
margin: 0 auto;
min-width: 268px;
}
.tpp-heading {
text-align: center;
color: #fff;
line-height: 35px;
font-size: 28px;
padding: 0 0 26px;
font-family: 'roboto-light-webfont', sans-serif;
}
.top-page-panel-visible {
display: block !important;
}
.top-page-panel {
position: relative;
margin-top: -12px;
padding: 42px 0 12px;
background-color: black;
}
</style>
</head>
<div class="content_holder">
 <div class="top-page-panel top-page-panel-visible">
    <div class="frame clearfix">
        <div class="tpp-heading">
            <h1 class="orange">Oops! That page couldn't be found.</h1>
            <strong>
                Want to play some Pacman instead?
            </strong>
        </div>
    </div>
</div>
<div class="frame holder-404">
    <div class="flexible-frame">
        <object type="application/x-shockwave-flash" name="name" data="<?php echo asset_url();?>
/pacman.swf" width="977" height="500" id="flash-404" style="visibility: visible;"><param name="quality" value="high"><param name="wmode" value="transparent"></object>
    </div>
    
</div>
</div>
</html><?php }} ?>