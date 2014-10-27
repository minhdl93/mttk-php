{include file='common/header.tpl'}
{literal}
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
{/literal}
                 url: "{base_url('messageController/addMessage')}",
{literal}
                 data: dataString,
                 cache: false,
                 success: function(html) {
                     $(html).appendTo('#inline_content ol').emotions();
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

     $('#inline_content ol').emotions();
  });
  </script>
 {/literal}
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
          <audio id="chatAudio"><source src="{asset_url()}sound/notify.ogg" type="audio/ogg"><source src="{asset_url()}sound/notify.mp3" type="audio/mpeg"><source src="{asset_url()}sound/notify.wav" type="audio/wav"></audio>
          <div>
              <div align="left">
              <table>
              <tr>
                <td>
                  <input type='text' class="textbox" name="content" id="content" maxlength="200" placeholder="Message"/>
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
</html>