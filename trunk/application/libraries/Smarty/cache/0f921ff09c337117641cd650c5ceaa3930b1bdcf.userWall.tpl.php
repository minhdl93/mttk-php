<?php /*%%SmartyHeaderCode:26279544ef3d2504f21-21243342%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0f921ff09c337117641cd650c5ceaa3930b1bdcf' => 
    array (
      0 => 'application\\views\\templates\\userWall.tpl',
      1 => 1414460300,
      2 => 'file',
    ),
    'ab578d0f78d25a33237b48cbf4455ea57a89a476' => 
    array (
      0 => 'application\\views\\templates\\common\\header.tpl',
      1 => 1414400665,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26279544ef3d2504f21-21243342',
  'variables' => 
  array (
    'items' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_544ef3d285feb6_06665253',
  'cache_lifetime' => 120,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544ef3d285feb6_06665253')) {function content_544ef3d285feb6_06665253($_smarty_tpl) {?><!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Music</title>
  <link rel="stylesheet" type="text/css" href="http://localhost:81/mttk-php/assets/css/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="http://localhost:81/mttk-php/assets/css/jplayer.blue.monday.playlist.css">
  <link rel="stylesheet" type="text/css" href="http://localhost:81/mttk-php/assets/css/wall.css">
  <link rel="stylesheet" type="text/css" href="http://localhost:81/mttk-php/assets/css/jquery.qtip.css">
  <link rel="stylesheet" type="text/css" href="http://localhost:81/mttk-php/assets/css/colorbox.css">
  <script type="text/javascript" src="http://localhost:81/mttk-php/assets/js/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="http://localhost:81/mttk-php/assets/js/jquery-ui.js"></script>
  <script type="text/javascript" src="http://localhost:81/mttk-php/assets/js/jquery.autogrowtextarea.min.js"></script>
  <script type="text/javascript" src="http://localhost:81/mttk-php/assets/js/masonry.pkgd.min.js"></script>
  <script type="text/javascript" src="http://localhost:81/mttk-php/assets/js/jquery.colorbox-min.js"></script>
  <script type="text/javascript" src="http://localhost:81/mttk-php/assets/js/jquery.timeago.js"></script>
  <script type="text/javascript" src="http://localhost:81/mttk-php/assets/js/jquery.livequery.js"></script>
  <script type="text/javascript" src="http://localhost:81/mttk-php/assets/js/jquery.qtip.js"></script>
  <script type="text/javascript" src="http://localhost:81/mttk-php/assets/js/imagesloaded.pkgd.min.js"></script>
  <script type="text/javascript" src="http://localhost:81/mttk-php/assets/js/jquery.jplayer.min.js"></script>
  <script type="text/javascript" src="http://localhost:81/mttk-php/assets/js/jplayer.playlist.min.js"></script>
  <script type="text/javascript" src="http://localhost:81/mttk-php/assets/js/wall.js"></script>
  <script type="text/javascript">
  window.emotionsFolder="http://localhost:81/mttk-php/assets/img/emotions-fb/";
  </script>
  <script type="text/javascript" src="http://localhost:81/mttk-php/assets/js/jquery.emotions.js"></script>
  <script type="text/javascript">
  window.notifyStatus="http://localhost:81/mttk-php/statusController/hienThiNotiStatus";
  window.cretePlaylist="http://localhost:81/mttk-php/playlistController/viewPlaylist";
  window.profilePic="http://localhost:81/mttk-php/uploads/img/profilePic.jpg";
  window.userPic="http://localhost:81/mttk-php/uploads/img/";
  window.userWall="http://localhost:81/mttk-php/statusController/layDSWallStatus";
  window.userLogin="duongphuocloc@gmail.com";
  window.friendController="http://localhost:81/mttk-php/friendController";
  window.userPicCmt="http://localhost:81/mttk-php/uploads/img/a6551.jpg";
  window.compare=0;
  window.compareStatus=0;
  window.currentChatPosition=-1;
  window.userChat="";


function waitForMsg() {
  $.ajax({
    type: "post",

    url: "http://localhost:81/mttk-php/notiController/getOldNotify",

    async: true,
    /* If set to non-async, browser shows page as "Loading.."*/
    cache: false,
    timeout: 50000,
    /* Timeout in ms */
    success: function(data) { /* called when request to barge.php completes */
      $.ajax({
        type: "post",

        url: "http://localhost:81/mttk-php/notiController/getNewNotifyNumber",

        cache: false,
        success: function(times) {
          addmsg(data, times);
        }
      });
    }
  });
}

function getFriendList() {
  $.ajax({
    type: "post",

    url: "http://localhost:81/mttk-php/friendController/getAllFriends",

    async: true,
    /* If set to non-async, browser shows page as "Loading.."*/
    cache: false,
    timeout: 50000,
    /* Timeout in ms */
    success: function(data) { /* called when request to barge.php completes */
     addFriendList(data);
    }
  });
}

function getConversation(userEmail) {
  if(typeof userEmail !== 'undefined'){
    if( window.userChat!=userEmail){
      $("#inline_content ol").empty();
        window.userChat = userEmail;
    }
  }
  var dataString = 'email=' + window.userChat;
  $.ajax({
    type: "post",

    url: "http://localhost:81/mttk-php/messageController/getFirstMessages",

    data: dataString,
    async: true,
    /* If set to non-async, browser shows page as "Loading.."*/
    cache: false,
    timeout: 50000,
    success: function(data) { /* called when request to barge.php completes */
      addConversation(data); /* Add response to a .msg div (with the "new" class)*/
      setTimeout(
        getConversation, /* Request next message */
        2000 /* ..after 1 seconds */
      );
    }
  });
}

function getMoreConversation(userEmail,last_id) {
  var dataString = 'email=' + userEmail+'&started='+last_id;
  $.ajax({
    type: "post",

    url: "http://localhost:81/mttk-php/messageController/getMoreMessages",

    data: dataString,
    async: true,
    /* If set to non-async, browser shows page as "Loading.."*/
    cache: false,
    timeout: 50000,
    success: function(data) { /* called when request to barge.php completes */
      addMoreConversation(data); /* Add response to a .msg div (with the "new" class)*/
    }
  });
}

function getPlaylist() {
  $.ajax({
    type: "post",

    url: "http://localhost:81/mttk-php/playlistController/getDSPlaylist",

    async: true,
    /* If set to non-async, browser shows page as "Loading.."*/
    cache: false,
    timeout: 50000,
    /* Timeout in ms */
    success: function(data) { /* called when request to barge.php completes */
      addPlaylist(data);
    }
  });
}

function friendRequest() {
  $.ajax({
    type: "post",

    url: "http://localhost:81/mttk-php/friendController/getFriendRequest",

    async: true,
    /* If set to non-async, browser shows page as "Loading.."*/
    cache: false,
    timeout: 50000,
    /* Timeout in ms */
    success: function(data) { /* called when request to barge.php completes */
      addFriendRequest(data);
    }
  });
}

$(document).on('click', '.comment_submit', function() {
  var element = $(this);
  var Id = element.attr("id");
  var test = $("#textboxcontent" + Id).val();
  var dataString = 'textcontent=' + test + '&com_msgid=' + Id;
  if (test == '') {
    alert("Please Enter Some Text");
  } else {
    $("#flash" + Id).show();

    $("#flash" + Id).fadeIn(400).html('<img src="http://localhost:81/mttk-php/assets/img/ajax-loader.gif" align="absmiddle"> loading.....');
    
    $.ajax({
      type: "post",

      url: "http://localhost:81/mttk-php/commentController/themComment",

      data: dataString,
      cache: false,
      success: function(html) {
        $("#loadplace" + Id).append(html);
        $("#flash" + Id).hide();
      }
    });
  }
  return false;
});

$(document).on('click', '.delete_button', function() {
  var id = $(this).attr("id");
  var dataString = 'id=' + id;
  var parent = $(this).parent();
  $.ajax({
    type: "POST",

    url: "http://localhost:81/mttk-php/commentController/xoaComment",

    data: dataString,
    cache: false,
    success: function() {
      if (id % 2) {
        parent.fadeOut('slow', function() {
          $(this).remove();
        });
      } else {
        parent.slideUp('slow', function() {
          $(this).remove();
        });
      }
    }
  });
  return false;
});

$(document).on('click', '.like', function() {
  var ID = $(this).attr("id");
  var sid = ID.split("like");
  var New_ID = sid[1];
  var REL = $(this).attr("rel");
  var dataString = 'status_id=' + New_ID + '&rel=' + REL;
  $.ajax({
    type: "POST",

    url: "http://localhost:81/mttk-php/thumb_up_downController/themXoaLike",

    data: dataString,
    cache: false,
    success: function(data) {
      if (REL == 'Like') {
        if ($('#youlike' + New_ID).children().length > 0) {
          $("#youlike" + New_ID).slideDown('fast').prepend("<span id='you" + New_ID + "'><a href='#'>You</a></span>,&nbsp;");
          $("#likes" + New_ID).html("<span id='you" + New_ID + "'><a href='#'>You </a></span>");
          $('#' + ID).html('Unlike').attr('rel', 'Unlike').attr('title', 'Unlike');
        } else {
          $("#youlike" + New_ID).slideDown('fast').html("<span id='you" + New_ID + "'><a href='#'>You </a></span>&nbsp;like this");
          $('#' + ID).html('Unlike').attr('rel', 'Unlike').attr('title', 'Unlike');
        }
        
      } else {
        if ($('#youlike' + New_ID).children().length > 1) {
          $("#you" + New_ID).slideUp('fast');
          $("#you" + New_ID).remove();
          $('#' + ID).attr('rel', 'Like').attr('title', 'Like').html('Like');
        } else {
          $("#youlike" + New_ID).slideUp('fast');
          $("#you" + New_ID).remove();
          $('#' + ID).attr('rel', 'Like').attr('title', 'Like').html('Like');
        }
      }
    }
  });
  return false;
});

function savePlaylist(id,title,url) {
  var dataString = 'playlist_id=' + id+'&title='+title+'&music='+url;
  $.ajax({
    type: "post",

    url: "http://localhost:81/mttk-php/playlistController/addMusic",

    data: dataString,
    cache: false,
    success: function() {
      alert("ok");
      }
    });
}

function getComment(status) {
  var dataString = 'status_id=' + status;
  $.ajax({
    type: "post",

    url: "http://localhost:81/mttk-php/commentController/layComment",

    data: dataString,
    async: true,
    /* If set to non-async, browser shows page as "Loading.."*/
    cache: false,
    success: function(data) { /* called when request to barge.php completes */
      var obj = JSON.parse(data);
      if (obj.length > 0) {
        $.each(obj, function(i, val) {
          var is_delete="";
          if(val.email==window.userLogin){
            is_delete="delete_button";
          }
          $("#loadplace" + val.status_id).append('<li class="load_comment"><span id="' + val.name + '"></span><img id="'+val.email+'" style="width:33px;height:33px;vertical-align:middle;margin-right:7px;float:left" src="' + window.userPic + val.picture + '"/><span>' + val.message + '</span><a href="#" id="' + val.comment_id + '" class="'+is_delete+'"></a><br/><abbr class="timeago" title="' + val.created_at + '"></abbr></li>');
        });
      }
    }
  });
}

function getLike(status) {
  var dataString = 'status_id=' + status;
  var isLike = 0;
  $.ajax({
    type: "post",

    url: "http://localhost:81/mttk-php/thumb_up_downController/layLikeUser",

    data: dataString,
    async: true,
    /* If set to non-async, browser shows page as "Loading.."*/
    cache: false,
    success: function(data) { /* called when request to barge.php completes */
      var obj = JSON.parse(data);
      if (obj.length > 0) {
        isLike = 1;
        $("#like" + status).replaceWith('<a href="#" class="like like_button" id="like' + status + '" title="UnLike" rel="UnLike">UnLike</a>');
        $("#loadplace" + status).prev('div').append('<div class="likeUsers" id="youlike' + status + '"></div>');
      } else {
        $("#like" + status).replaceWith('<a href="#" class="like like_button" id="like' + status + '" title="Like" rel="Like">Like</a>');
        $("#loadplace" + status).prev('div').append('<div class="likeUsers" id="youlike' + status + '"></div>');
      }
    }
  }).done(function() {
    $.ajax({
      type: "post",

      url: "http://localhost:81/mttk-php/thumb_up_downController/layLike",

      data: dataString,
      async: true,
      /* If set to non-async, browser shows page as "Loading.."*/
      cache: false,
      success: function(data) {
        var obj = JSON.parse(data);
        var new_like_count = obj.length - 3;
        if (obj.length > 0) {
          $.each(obj, function(i, val) {
            if (isLike == 1) {
              if (obj.length > 1) {
                $("#youlike" + status).append('<span id="you' + status + '"><a href="' + val.email + '">You,&nbsp;</a></span>');
              } else {
                $("#youlike" + status).append('<span id="you' + status + '"><a href="' + val.email + '">You</a></span>');
              }
              isLike = 0;
            } else {
              $("#youlike" + status).append('<a href="' + window.userWall + "/" + val.email  + '">' + val.name + '</a>');
            }
            if (new_like_count > 0) {
              $("#youlike" + status).append(' and ' + new_like_count + ' other friends like this');
            }
          });
          $("#youlike" + status).append(' like this');
        }
      }
    }).done(function() {
      $('#container').masonry({
        itemSelector: '.item',
      });
      Arrow_Points();
      $(".timeago").livequery(function() // LiveQuery 
        {
          $(this).timeago(); // Calling Timeago Funtion 
        });
    });
  });
}

function getSong(name, inter, songUrl) {
  var dataString="playlist_id="+songUrl;
  $.ajax({
    type: "post",
    data:dataString,

    url: "http://localhost:81/mttk-php/playlistController/getDSSongs",

    async: true,
    /* If set to non-async, browser shows page as "Loading.."*/
    cache: false,
    timeout: 50000,
    /* Timeout in ms */
    success: function(data) { /* called when request to barge.php completes */
      displaySong(name, inter,data);
    }
  });
}


function getStatus(){
      var data;
        /* This requests the url "msgsrv.php"
        When it complete (or errors)*/

      data=[{"status_id":"26","music":"1","title":"","message":"dasdas","created_at":"2014-10-25 15:08:18","thumbs_up":"2","privacy_type_id":"1","email":"duongphuocloc@gmail.com","picture":"a6551.jpg","name":"phuoc loc"},{"status_id":"6","music":"http:\/\/j.ginggong.com\/jDownload.ashx?id=ZWZABB9W&h=mp3.zing.vn","title":"Jar Of Hearts + Christina Perri","message":"how a nice day","created_at":"2014-10-18 21:19:25","thumbs_up":"4","privacy_type_id":"1","email":"duongphuocloc@gmail.com","picture":"a6551.jpg","name":"phuoc loc"},{"status_id":"2","music":"http:\/\/localhost:81\/mttk-php\/uploads\/15.Forever_Friends_3.mp3","title":"Forever friend","message":"I'm feeling lucky hehe","created_at":"2014-10-16 21:44:18","thumbs_up":"1","privacy_type_id":"1","email":"duongphuocloc@gmail.com","picture":"a6551.jpg","name":"phuoc loc"}]

    addStatusUserWall(data);
    }
  </script>
  <script>
  $(document).ready(function() {
    waitForMsg();
    friendRequest();
    getStatus();
    getPlaylist();

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

    $('#savePlaylist').click(function(){
      var id=$(this).parent().find('select').find(":selected").val();
      var title=$(this).parent().find('#titleMusic').val();
      var music=$(this).parent().find('#urlMusic').val();
      savePlaylist(id,title,music);
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
    <div id="container">
      <div class="timeline_container">
        <div class="timeline">
          <div class="plus"></div>
        </div>
      </div>
    </div>
    <div id="pop">
      <img/>
      <h2></h2>
    </div>
</body>
</html><?php }} ?>
