<?php /* Smarty version Smarty-3.1.18, created on 2014-10-05 15:31:23
         compiled from "application\views\templates\player.tpl" */ ?>
<?php /*%%SmartyHeaderCode:236465431482bd845e3-47882839%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5d2298516359daed9e5fce41eb91a2edfdb4ee2' => 
    array (
      0 => 'application\\views\\templates\\player.tpl',
      1 => 1412515881,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '236465431482bd845e3-47882839',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5431482be94177_30769310',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5431482be94177_30769310')) {function content_5431482be94177_30769310($_smarty_tpl) {?><html>
<head>
	<title>Page test</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<link rel="stylesheet" type="text/css" href="<?php echo asset_url();?>
css/jplayer.blue.monday.css">
	<script type="text/javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="<?php echo asset_url();?>
js/jquery.jplayer.min.js"></script>
	
	<script type="text/javascript">
		function testXem(guid){
			$("#jquery_jplayer_1").jPlayer( "destroy" );
	        var player = $("#jquery_jplayer_1");
	        player.jPlayer({
	        ready: function (event) {
						$(this).jPlayer("setMedia", {
							title: "Bubble",
							mp3: guid
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
	    }
	</script>
	<script type="text/javascript">
	$(document).ready(function(){
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

		$("#music_name").keyup(function(){

		$.ajax({
			type: "post",
			url: "http://localhost:81/mttk-php/index.php/upload/chooseMusic",
			cache: false,
			data:'music_name='+$("#music_name").val(),
			success: function(response){
				$('#finalResult').html("");
				var obj = JSON.parse(response);
				if(obj.length>0){
					try{
						var items=[];
						$.each(obj, function(i,val){
						    items.push('<li><a href="#" onclick="testXem('  +"'"+ val.UrlJunDownload +"'"+ ')">' + val.Title+ '</a></li>');
						});
						$('#finalResult').append.apply($('#finalResult'), items);
					}catch(e) {
						alert('Exception while request..');
					}
				}else{
					$('#finalResult').html($('<li/>').text("No Data Found"));
				}
			},
			error: function(){
				alert('Error while request..');
			}

		});
	  });
	});

	</script>
	
</head>
<body>
		<!--<input type="text" name="music_name"/>
		<input type="submit" value="search"/>-->
	<input type="text" name="music_name" id="music_name" />
	<ul id="finalResult"></ul>
	<div id="jquery_jplayer_1" class="jp-jplayer"></div>
		<div id="jp_container_1" class="jp-audio">
			<div class="jp-type-single">
				<div class="jp-gui jp-interface">
					<ul class="jp-controls">
						<li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
						<li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
						<li><a href="javascript:;" class="jp-stop" tabindex="1">stop</a></li>
						<li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
						<li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
						<li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>
					</ul>
					<div class="jp-progress">
						<div class="jp-seek-bar">
							<div class="jp-play-bar"></div>
						</div>
					</div>
					<div class="jp-volume-bar">
						<div class="jp-volume-bar-value"></div>
					</div>
					<div class="jp-time-holder">
						<div class="jp-current-time"></div>
						<div class="jp-duration"></div>

						<ul class="jp-toggles">
							<li><a href="javascript:;" class="jp-repeat" tabindex="1" title="repeat">repeat</a></li>
							<li><a href="javascript:;" class="jp-repeat-off" tabindex="1" title="repeat off">repeat off</a></li>
						</ul>
					</div>
				</div>
				<div class="jp-details">
					<ul>
						<li><span class="jp-title"></span></li>
					</ul>
				</div>
				<div class="jp-no-solution">
					<span>Update Required</span>
					To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
				</div>
			</div>
		</div>
</body>
</html><?php }} ?>
