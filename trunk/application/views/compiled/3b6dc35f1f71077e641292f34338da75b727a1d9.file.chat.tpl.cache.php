<?php /* Smarty version Smarty-3.1.18, created on 2014-10-27 08:30:10
         compiled from "application\views\templates\chat.tpl" */ ?>
<?php /*%%SmartyHeaderCode:27993544df482a41205-16346471%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b6dc35f1f71077e641292f34338da75b727a1d9' => 
    array (
      0 => 'application\\views\\templates\\chat.tpl',
      1 => 1414378118,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27993544df482a41205-16346471',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_544df482b9d519_72791446',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544df482b9d519_72791446')) {function content_544df482b9d519_72791446($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>


  </script>
  <script>
  $(document).ready(function() {
    waitForMsg();
    friendRequest();
    getFriendList();

    $("#notificationLink").click(function()
    {
      $("#friendContainer").hide();
      $("#notificationContainer").fadeToggle(300);
      $("#notification_count").fadeOut("slow");
      return false;
    });

    $("#friendLink").click(function()
    {
      $("#notificationContainer").hide();
      $("#friendContainer").fadeToggle(300);
      $("#friend_count").fadeOut("slow");
      return false;
    });

    $(document).click(function()
    {
      $("#notificationContainer").hide();
      $("#friendContainer").hide();
    });

    //Popup Click
    $("#notificationContainer").click(function()
    {
      return false
    });

    $('.post').click(function() {
     var boxval = $("#content").val();
     var user = $("#toUser").val();
     var dataString = 'email=' + user + '&message=' + boxval;
     if (boxval.length > 0) {
         if (boxval.length < 200) {
             $("#flash").show();
             $("#flash").fadeIn(400).html('<img src="http://labs.9lessons.info/ajax-loader.gif" align="absmiddle">&nbsp;<span class="loading">Loading Update...</span>');
             $.ajax({
                 type: "POST",

                 url: "<?php echo base_url('messageController/addMessage');?>
",

                 data: dataString,
                 cache: false,
                 success: function(html) {
                     $("#inline_content ol").append(html);
                     $('#content').val('');
                     $('#content').focus();
                     $("#flash").hide();
                 }
             });
         } else {
             alert("Please delete some Text max 200 charts");
         }
     }
     return false;
    });


  });
  </script>
 
</head>
<body>
  <div id="noti_Container">
    <ul id="nav">
    <li id="friend_li">
      <span id="friend_count"></span>
      <a href="#" id="friendLink">Friends</a>
      <div id="friendContainer">
        <div id="friendTitle">Notifications</div>
        <div id="friendBody" class="friend">
          <ul></ul>
        </div>
        <div id="friendFooter"><a href="#">See All</a></div>
      </div>
    </li>
    <li id="notification_li">
      <span id="notification_count"></span>
      <a href="#" id="notificationLink">Notifications</a>
      <div id="notificationContainer">
        <div id="notificationTitle">Notifications</div>
        <div id="notificationsBody" class="notifications">
          <ul></ul>
        </div>
        <div id="notificationFooter"><a href="#">See All</a></div>
      </div>
    </li>
  </ul>
  </div>
    <div id="friendListContainer">
      <ul></ul>
    </div>
      <div style="width:550px; float:left; margin:30px;display:none;">
        <div id='inline_content' style='padding:10px; background:#fff;'>
          <ol id="update" style="list-style:none;">
          </ol>
          <div id="flash"></div>
          <div>
              <div align="left">
              <table>
              <tr>
                <td>
                  <input type='text' class="textbox" name="content" id="content" maxlength="145" />
                </td>
                <input type='hidden' name="toUser" id="toUser" />
                <td valign="top">
                  <input type="submit"  value="Post"  id="post" class="post" name="post"/>
                </td>
              </tr>
              </table>
              </div>
          </div>
        </div>
      </div>
</body>
</html><?php }} ?>
