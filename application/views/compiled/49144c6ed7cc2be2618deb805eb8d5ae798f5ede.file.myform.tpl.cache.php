<?php /* Smarty version Smarty-3.1.18, created on 2014-10-18 16:26:01
         compiled from "application\views\templates\myform.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1804654427879b83b58-79759443%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '49144c6ed7cc2be2618deb805eb8d5ae798f5ede' => 
    array (
      0 => 'application\\views\\templates\\myform.tpl',
      1 => 1413018793,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1804654427879b83b58-79759443',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54427879cb09d0_77580793',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54427879cb09d0_77580793')) {function content_54427879cb09d0_77580793($_smarty_tpl) {?><html>
<head>
<title>My Form</title>
<link rel="stylesheet" type="text/css" href="<?php echo asset_url();?>
css/main.css">
</head>
<body>
<?php echo validation_errors();?>

<?php echo form_open('login/register');?>


<h1>Register account</h1>
<h5 class="test">Email</h5>
<input type="text" name="email"/>

<h5>Password</h5>
<input type="text" name="password"/>

<h5>First name</h5>
<input type="text" name="first_name"/>

<h5>Last name</h5>
<input type="text" name="last_name"/>

<h5>Birthday</h5>
<input type="text" name="birthday"/>


<div><input type="submit" value="Submit" /></div>

<?php echo form_close();?>


<?php echo form_open('login/login1');?>

<h5>email name</h5>
<input type="text" name="email_login"/>

<h5>ps</h5>
<input type="text" name="pass_login"/>
<div><input type="submit" value="Login" /></div>
<?php echo form_close();?>

</body>
</html>
<?php }} ?>
