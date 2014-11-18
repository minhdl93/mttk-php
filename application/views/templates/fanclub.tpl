{include file='common/header.tpl'}
{literal}
function getStatus(){
      var data;
        /* This requests the url "msgsrv.php"
        When it complete (or errors)*/
{/literal}
      data={$items}
{literal}
    addStatusUserWall(data);
  }
  </script>
  <script>
{/literal}
  window.fanclub="{$fanclub}";
  window.fanclubName="{$fanclubName}";
  window.fanclubDesc="{$fanclubDesc}";
{literal}
  $(document).ready(function() {
    waitForMsg();
    friendRequest();
    getStatus();
    getPlaylist();
    getSuggest();
    getPlaylistUpdateStatus();
    getFanclub();
    getMembers(window.fanclub);
    $("input[name='fanclub_id']").val(window.fanclub);
    $("#target").autoGrow();
    $('#tabs').tabs({
      activate: function(event, ui) {
        $('#container').masonry({
          itemSelector: '.item'
        });
        var msnry = $('#container').data('masonry');
        msnry.on( 'layoutComplete', masonry_refresh );
        function masonry_refresh(){
          Arrow_Points();
        }
      }
    });

    $('#notificationsBody ul').bind('scroll', function() {
        if($(this).scrollTop() + $(this).innerHeight() >= this.scrollHeight) {
          var id=$(this).find('li:last').attr("id");
          moreNotify(id.substring(4));
        }
    });


    $('#fanclubCover').append('<div class="fanclubCoverName"><b><a href="#">' + window.fanclubName + '</a></b></div><div class="fanclubCoverDesc"><b><a href="#">' + window.fanclubDesc + '</a></b></div>');
    $('#aboutFanclubDesc').append('<p>'+window.fanclubDesc+'</p>');
    $('#headlineFanclub').append('<span>'+window.fanclubName+'</span>');
      $("#jquery_jplayer_1").jPlayer({
        ready: function (event) {
          $(this).jPlayer("setMedia", {
            title: "",
            mp3: ""
          }).jPlayer("play");
        },
        swfPath: "js",
        supplied: "mp3",
        wmode: "window",
        smoothPlayBar: true,
        keyEnabled: true,
        remainingDuration: true,
        toggleDuration: true
      });

   $('#headlineFanclub').click(function(){
        $('#fanclubContainer').find('#view1').show();
        $('#fanclubContainer').find('#view1').siblings('div').hide();
        $('#container').masonry({
          itemSelector: '.item'
        });
        Arrow_Points();
      });
      $('#headlineMembers').click(function(){
        $('#fanclubContainer').find('#view2').show();
        $('#fanclubContainer').find('#view2').siblings('div').hide();
      });

  });

  $(document).on('click', '#displayUserFanclubBox .searchUserBox a', function() {
    var user=$(this).attr('rel');
    var parent=$(this).parent();
    $.ajax({
          type: "post",
    {/literal}
          url:"{base_url('fanclubController/themFanclubUser')}",
    {literal}
          cache: false,
          data:'fanclub_id='+window.fanclub+'&user='+user,
          success: function(response){
            parent.fadeOut('slow');
          }
    });
    return false;
  });
  $(document).on('keyup', '.searchUser', function() {
      if($(".searchUser").val()!=''){
        $.ajax({
        type: "post",
  {/literal}
        url:"{base_url('fanclubController/searchFanclub')}",
  {literal}
        cache: false,
        data:'search='+$(".searchUser").val()+'&fanclub='+window.fanclub,
        success: function(response){
          $('#displayUserFanclubBox').html(response).show();
        }
      });
    }
});
  $(document).on('click', '.removeMember', function() {
    var parent=$(this).parent();
    var email=parent.find('button').val();
        $.ajax({
        type: "post",
  {/literal}
        url:"{base_url('fanclubController/removeMember')}",
  {literal}
        cache: false,
        data:'email='+email+'&fanclub_id='+window.fanclub,
        success: function(response){
          parent.fadeOut('slow');
        }
      });
});

  $(document).on('click', '#headlineLeave', function() {
      if (confirm("Are your sure?")) {
        $.ajax({
        type: "post",
  {/literal}
        url:"{base_url('fanclubController/tuRemoveKhoiFanlub')}",
  {literal}
        cache: false,
        data:'fanclub_id='+window.fanclub,
        success: function(response){
          window.location.href = window.homePage;
        }
      });
      }
});
  
  </script>
 {/literal}
</head>
<body>
    {include file='common/notificationPart.tpl'}
    <div id="coverContainer">
    <div id="fanclubCover">
    </div>
    <div id="headline">
      <div class="headlineRight">
        <a id="headlineFanclub" href="#"></a>
        <a id="headlineMembers" href="#">Members</a>
        <a id="headlineEvent" href="#">Events</a>
        <a id="headlineLeave" href="#">Leave group</a>
      </div>
    </div>
  </div>
  <div id="fanclubContainer">
  <div id="view1">
    {include file='common/mainPart.tpl' postStatus={form_open_multipart('statusController/themFanclubStatus')}}
  </div>
  <div id="view2" style="display:none;">
        <div id="friendListContainer"><ul></ul></div>
  </div>
  <div id="view3" style="display:none;">
        <div id="playlistContainer">
          <ul></ul>
        </div>
  </div>
</div>
</body>
</html>