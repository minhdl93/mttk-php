<?php /* Smarty version Smarty-3.1.18, created on 2014-10-02 14:07:52
         compiled from "application\views\templates\myform.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1142542d40189633a5-94786266%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '49144c6ed7cc2be2618deb805eb8d5ae798f5ede' => 
    array (
      0 => 'application\\views\\templates\\myform.tpl',
      1 => 1411915230,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1142542d40189633a5-94786266',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_542d4018a54825_24821580',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_542d4018a54825_24821580')) {function content_542d4018a54825_24821580($_smarty_tpl) {?><html>
<head>
<title>My Form</title>
<link rel="stylesheet" type="text/css" href="<?php echo asset_url();?>
css/main.css">
</head>
<body>
<?php echo validation_errors();?>

<?php echo form_open('form/register');?>


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


<?php echo form_open('form/login1');?>

<h5>email name</h5>
<input type="text" name="email_login"/>

<h5>ps</h5>
<input type="text" name="pass_login"/>
<div><input type="submit" value="Login" /></div>
<?php echo form_close();?>

</body>
</html>
<?php }} ?>