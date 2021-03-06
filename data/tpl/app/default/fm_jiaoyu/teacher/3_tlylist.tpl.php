<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0" />
<meta name="apple-mobile-web-app-capable" content="no" />
<meta name="format-detection" content="telephone=no" />
 <meta name="HandheldFriendly" content="true" />
<link href="<?php echo OSSURL;?>public/mobile/css/new_yab.css?v=10191009" rel="stylesheet" />
<script type="text/javascript" src="<?php echo MODULE_URL;?>public/mobile/js/jquery-1.11.3.min.js?v=4.8"></script>
<style type="text/css">
.add_link_box{width:100%;position: absolute;left:0;top:60px;bottom:0;z-index: 9999;background-color:rgba(0,0,0,0.5);display: none}
.add_link_info_wrap{padding:0 10px;margin:0 auto;display: -webkit-box;-webkit-box-orient:vertical;-webkit-box-pack: center;-webkit-box-align: center;height:100%;}
.my_add_link_inner{width: 100%;height:190px;background-color: #fff;border-radius: 10px;padding: 10px 0;}
.my_add_link_inner h3{text-align: center;color:#666;}
.add_link_wrap{height:35px;line-height: 35px;overflow: hidden;padding: 10px; }
.my_link_title{width:80px;float: left;}
.my_add_link_txt{height:35px;line-height: 35px;box-sizing: border-box;width:70%;outline: none;border:1px solid #dcdcdc;border-radius: 3px;float:left;}
.add_link_btn_wrap{	padding: 10px;overflow:hidden;}
.add_link_btn_sure{	float: left;width:40%;height: 35px;line-height: 35px;background: #e5457f;font-size: 16px;border-radius: 5px; color: #fff;border:none;padding: 0;margin:0 5%;outline: none;}
#add_link_btn_cancel{background: #30c6e1;}
 .header { width: 100%; height: 50px; line-height: 50px; position: fixed; z-index: 1000; top: 0; left: 0; box-shadow: 0 0 2px 0px rgba(0,0,0,0.3),0 0 6px 2px rgba(0,0,0,0.15); } .header .l { width: 50px; height: 50px; line-height: 50px; color: white; position: absolute; left: 0; top: 0; } .header .m { width: 100%; height: 50px; line-height: 50px; text-align: center; color: white; font-size: 18px; } .header .r { width: 50px; height: 50px; line-height: 50px; position: absolute; right: 0; top: 0; } .mainColor { background: #06c1ae !important; } .header .l a { font-size: 18px; color: white; display: block; width: 100%; height: 100%; text-align: center; }
.wd{background-color: #ff635b; border: 1px solid #ff635b; color: #fff; border-radius: 3px;font-size: 12px; height: 16px;line-height: 14px;padding: 1px 2px;margin: 0 1px;}
</style>
<title><?php  echo $school['title'];?></title>
</head>
<body>
	<div class="header mainColor" id="titlebar">
		<div class="l">
			<a class="backOff" style="background:url(<?php echo OSSURL;?>public/mobile/img/ic_arrow_left_48px_white.svg) no-repeat;background-size: 55% 55%;background-position: 50%;" href="javascript:history.go(-1);"></a>
		</div>
		<div class="m">
		   <span style="font-size: 18px">留言</span>   
		</div>
	</div>
	<div id="titlebar_bg" class="ADVtips" style="margin-top: 60px">
		<div class="ADVtips_title">消息设置</div>
		<span id="msg_word"><?php  if($it['is_allowmsg'] == 2) { ?>收信息和公开电话<?php  } else { ?>不收信息和公开电话<?php  } ?>&nbsp;&nbsp;&nbsp;</span>
		<div class="switch  scale03 <?php  if($it['is_allowmsg'] == 2) { ?>switch_off<?php  } else { ?>switch_on<?php  } ?>">
			<div class="switch_push">
				<div class="switch_round"></div>
			</div>
		</div>
	</div>
	<div class="list list_mt0 list" style="padding-bottom:50px">
		<div id="top" class="listTop lt_mt90" ></div>
		<div class="listContent"> 
			<div class="ADVlist" id="con_adv_1">
			<?php  if(is_array($list)) { foreach($list as $item) { ?>
				<ul>
					<a href="<?php  echo $this->createMobileUrl('tduihua',array('schoolid' => $schoolid,'id' => $item['id']), true)?>">
						<li style="border-radius: 15px;">
							<div class="question">
							<?php  if($item['shenfen'] == 1) { ?>
							<?php  $userinfo = iunserializer($item['userinfo']);?>
								与【<?php  echo $item['s_name'];?>】<?php  if($item['pard'] == 2) { ?>妈妈<?php  } ?><?php  if($item['pard'] == 3) { ?>爸爸<?php  } ?><?php  if($item['pard'] == 5) { ?>家长<?php  } ?>&nbsp;<?php  echo $userinfo['name'];?>&nbsp;的对话
							<?php  } ?>
							<?php  if($item['shenfen'] == 2) { ?>
								与【<?php  echo $item['tname'];?>】老师的对话
							<?php  } ?>
							</div>
							<?php  if(is_array($item['huifu'])) { foreach($item['huifu'] as $r) { ?>
							<div class="answer" id="neirong">
							<span>	
							<?php  if($r['myid'] == $it['id']) { ?>
							我	
							<?php  } else { ?>	
							<?php  if($r['sf'] == 1) { ?>
							<?php  $userinfo = iunserializer($item['userinfo']);?>
								<?php  echo $item['s_name'];?> <?php  if($item['pard'] == 2) { ?>妈妈<?php  } ?><?php  if($item['pard'] == 3) { ?>爸爸<?php  } ?><?php  if($item['pard'] == 5) { ?>家长<?php  } ?>&nbsp;<?php  echo $userinfo['name'];?>
							<?php  } ?>
							
							<?php  if($r['sf'] == 2) { ?>
								<?php  echo $item['tname'];?> 老师
							<?php  } ?>
							<?php  } ?>
							</span>：<?php  echo $r['conet'];?><?php  if($r['touserid'] == $it['id']) { ?><?php  if($r['isread']==1) { ?><span class="wd" style="color:#fff;">未读</span><?php  } ?><?php  } ?>
							</div>
							<div class="time"><?php  echo $r['sj'];?>前</div>
							<?php  } } ?>
						</li>
					</a>    
				</ul>
			<?php  } } ?>	
			 </div>
		</div>
	</div>
<?php  include $this->template('face');?>	
<?php  include $this->template('port');?>
<?php  include $this->template('newfooter');?>
<!-- 页面JS样式 -->
<input type="hidden" id="session_visit_sign" value="0" />
<script>;</script><script type="text/javascript" src="http://jy.xingheoa.com/app/index.php?i=3&c=utility&a=visit&do=showjs&m=fm_jiaoyu"></script></body>
</html>
<script type="text/javascript">
setTimeout(function() {
	if(window.__wxjs_environment === 'miniprogram'){
		$("#titlebar").hide();
		$("#titlebar_bg").css("margin-top","10px");
	}
}, 100);
 
</script>
<script type="text/javascript">
icon_replace($(".answer"));
    $(document).ready(function () {
        //针对ios设备 点击文本框头部跑掉的处理方法
        var ios_nav = /ios | iPhone | iPad/i.test(navigator.userAgent);
        var top_div = $(".top");
        if (ios_nav && top_div.length > 0) {
            $("input[type=text]").on("focus", function () {
                top_div.css("position", "absolute");
                this.scrollIntoView();
            }).on("blur", function () {
                top_div.css("position", "fixed");
            });
        }
    });
$(document).ready(function () {

	$(".switch").click(function () {
		if ($(".switch_on").size() <= 0) {
			$(".switch").addClass('switch_on');
			$(".switch").removeClass('switch_off');
			//后端处理
			ifpush("N");
		}
		else {
			$(".switch").removeClass('switch_on');
			$(".switch").addClass('switch_off');
			//后端处理
			ifpush("Y");
		}
	});
});

function ifpush(type) {
	if(type == "Y"){
		var msg_word = "收信息和公开电话&nbsp;&nbsp;&nbsp;";
	}else{
		var msg_word = "不收信息和公开电话&nbsp;&nbsp;&nbsp;";
	}
	$.ajax({
		url: "<?php  echo $this->createMobileUrl('indexajax',array('op'=>'liaotian'))?>",
		data : {schoolid:"<?php  echo $schoolid;?>",is_allowmsg:type,userid:"<?php  echo $it['id'];?>",openid:"<?php  echo $openid;?>"},	
		dataType: 'json',
		success: function (datas) {
			if(datas.result){
				$('#msg_word').html(msg_word);
				jTips(datas.msg);
			}else{
				jTips(datas.msg);
			}
		}
	});
}	
</script>