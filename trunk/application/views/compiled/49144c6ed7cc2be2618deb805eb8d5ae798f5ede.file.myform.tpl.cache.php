<?php /* Smarty version Smarty-3.1.18, created on 2014-11-16 20:41:44
         compiled from "application\views\templates\myform.tpl" */ ?>
<?php /*%%SmartyHeaderCode:284635468a99885aa24-41565851%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '49144c6ed7cc2be2618deb805eb8d5ae798f5ede' => 
    array (
      0 => 'application\\views\\templates\\myform.tpl',
      1 => 1414459575,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '284635468a99885aa24-41565851',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5468a9989c08b9_83516309',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5468a9989c08b9_83516309')) {function content_5468a9989c08b9_83516309($_smarty_tpl) {?><html>
<head>
<title>My Form</title>
<link rel="stylesheet" type="text/css" href="<?php echo asset_url();?>
css/main.css">
</head>
<body>
<?php echo validation_errors();?>

<?php echo form_open('userController/register');?>


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


<?php echo form_open('userController/login1');?>

<h5>email name</h5>
<input type="text" name="email_login"/>

<h5>ps</h5>
<input type="text" name="pass_login"/>
<div><input type="submit" value="Login" /></div>
<?php echo form_close();?>

</body>
</html>
<?php }} ?>