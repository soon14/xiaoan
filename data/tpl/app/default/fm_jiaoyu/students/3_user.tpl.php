<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black"/>
<meta content="telephone=no" name="format-detection" /> 
<meta id="viewport" name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
<title><?php  echo $school['title'];?></title>
<?php  echo register_jssdks();?>
<link rel="stylesheet" href="<?php echo OSSURL;?>public/mobile/css/resetnew.css">
<script type="text/javascript" src="<?php echo MODULE_URL;?>public/mobile/js/jquery-1.11.3.min.js?v=4.8"></script>
<script src="<?php echo OSSURL;?>public/mobile/js/tx.js"></script>
<script type="text/javascript" src="<?php echo OSSURL;?>public/mobile/js/swipe.js"></script>
<script type="text/javascript" src="<?php echo OSSURL;?>public/mobile/js/PromptBoxUtil.js?v=4.80309"></script>
</head>
<body>
<style>
body > a:first-child,body > a:first-child img{width: 0px !important; height: 0px !important; overflow: hidden; position: absolute}
body{padding-bottom: 0 !important;}
#wrap.user_list .user > a::before{ content: ""; display: inline-block; float: left; height: 29px;width:29px; margin:5px 10px 10px 10px; vertical-align: middle; background-image: url(<?php echo OSSURL;?>public/mobile/img/user_icon.png); background-size:  auto 35px;}
#wrap.user_list .my_order::before{ background-color:#fe6c27;background-position: 0 0;}
#wrap.user_list .my_inf::before{   background-color:#ffba00;background-position: -13px -3px;}
#wrap.user_list .my_count::before{ background-color:#47ace9;background-position: -50px -3px;}
#wrap.user_list .my_score::before{ background-color:#ed4f2b;background-position: -85px -3px;}
#wrap.user_list .my_lianxi::before{ background-color:#53ccb9;background-position: -124px -3px;}
#wrap.user_list .jiankong::before{ background-color:#0d43bf;background-position: -159px -3px;}
#wrap.user_list .bjphoto::before{ background-color:#9853cc;background-position: -194px -3px;}
#wrap.user_list .liuyan::before{ background-color:#e31a47;background-position: -230px -3px;}
#wrap.user_list .qingjia::before{ background-color:#cf5f0e;background-position: -263px -3px;}
#wrap.user_list .checklog::before{ background-color:#fb793a;background-position: -300px -3px;}
#wrap.user_list .check::before{ background-color:#0da43c;background-position: -338px -3px;}
#wrap.user_list .yijian::before{ background-color:#0e7ecf;background-position: -372px -3px;}
#wrap.user_list .shouce::before{ background-color:#06C1AE;background-position: -408px -3px;}
</style>
    <div id="wrap" class="user_list">
	    <div id="bg"></div>
        <!-- 修改开始 -->
        <div class="head">
			<a class="ptool" id="Changesf">切换</a>
			<div class="pdetail">
				<input type="hidden" id="bigImage" name="bigImage"/>
				<div class="img-circle" onclick="uploadImg(this);">
					<img src="<?php  if(!empty($students['icon'])) { ?><?php  echo tomedia($students['icon'])?><?php  } else { ?><?php  echo tomedia($school['spic'])?><?php  } ?>">
					<span class="type">修改头像</span>
				</div>
				<div class="pull-left">
					<span class="name"><?php  echo $_W['fans']['nickname'];?></span>
					<span class="type">身份:<?php  echo $pard;?></span>
					<span class="type">姓名:<?php  if(!empty($userinfo['name'])) { ?><?php  echo $userinfo['name'];?><?php  } else if(!empty($item['realname'])) { ?><?php  echo $item['realname'];?><?php  } else { ?>未录入<?php  } ?></span>
				</div>
			</div>
			<div class="head-nav">
				<a class="head-nav-list">班级<span><?php  echo $mybanji['sname'];?></span></a>
				<a class="head-nav-list">学生<span><?php  echo $students['s_name'];?></span></a>
			</div>
	    </div>
        <section class="user" style="margin-top:0px;">
            <ul class="order" style="padding-top:0px;">
                <li class="order_li"><a href="<?php  echo $this->createMobileUrl('order', array('schoolid' => $schoolid, 'op' => 'all_g'), true)?>">全部</a></li>
                <li class="order_li"><a href="<?php  echo $this->createMobileUrl('order', array('schoolid' => $schoolid, 'op' => 'no_g'), true)?>" <?php  if($rest >0) { ?>value = "<?php  echo $rest;?>"<?php  } ?>>待缴费</a></li>
                <li class="order_li"><a href="<?php  echo $this->createMobileUrl('order', array('schoolid' => $schoolid, 'op' => 'yes_g'), true)?>">已缴费</a></li>
                <li class="order_li"><a href="<?php  echo $this->createMobileUrl('order', array('schoolid' => $schoolid, 'op' => 'cancel_g'), true)?>">已退费</a></li>
            </ul>		
        </section>		
		<div class="user_menu">
			<ul>
				<li class="li_share"><a style="width: 100%;height: 20px;background: url(<?php echo OSSURL;?>public/mobile/img/teacher.png) no-repeat center center;background-size: 18px 20px;position: absolute;top: 12px;left: 0px;" href="<?php  echo $this->createMobileUrl('mytecher', array('schoolid' => $schoolid, 'bj_id' => $students['bj_id'], 'xq_id' => $students['xq_id']), true)?>"><p>老师</p></a></li>
				<li class="li_gg"><a style="width: 100%;height: 20px;background: url(<?php echo OSSURL;?>public/mobile/img/new.png) no-repeat center center;background-size: 20px 20px;position: absolute;top: 12px;left: 0px;" href="<?php  echo $this->createMobileUrl('snoticelist', array('schoolid' => $schoolid), true)?>"<?php  if($resttz>0) { ?>value = "&nbsp;"<?php  } ?>><p>通知</p></a></li>
				<li class="li_rank"><a style="width: 100%;height: 20px;background: url(<?php echo OSSURL;?>public/mobile/img/user_liuyan.png) no-repeat center center;background-size: 20px 20px;position: absolute;top: 12px;left: 0px;" href="<?php  echo $this->createMobileUrl('slylist', array('schoolid' => $schoolid), true)?>" id="rank" <?php  if($restly>0) { ?>value = "&nbsp;"<?php  } ?>><p>留言</p></a></li>
				<li class="li_qq"><a style="width: 100%;height: 20px;background: url(<?php echo OSSURL;?>public/mobile/img/qq.png) no-repeat center center;background-size: 22px 20px;position: absolute;top: 12px;left: 0px;" href="<?php  if(!empty($mybanji['qun'])) { ?><?php  echo $mybanji['qun'];?><?php  } else { ?>#<?php  } ?>" id="A1"><p>Q群</p></a></li>
				<li class="li_weixin"><a style="width: 100%;height: 20px;background: url(<?php echo OSSURL;?>public/mobile/img/weixin.png) no-repeat center center;background-size: 22px 22px;position: absolute;top: 12px;left: 0px;" href="<?php  echo $this->createMobileUrl('szuoyelist', array('schoolid' => $schoolid), true)?>"<?php  if($restzy >0) { ?>value = "&nbsp;"<?php  } ?>><p>作业</p></a></li>
			</ul>
        </div>
        <section class="user">	
            <a href="<?php  echo $this->createMobileUrl('myinfo', array('schoolid' => $schoolid, 'sid' => $students['id']), true)?>" class="my_inf">学生基本信息</a>
            <a href="<?php  echo $this->createMobileUrl('myclass', array('schoolid' => $schoolid, 'bj_id' => $students['bj_id'], 'xq_id' => $students['xq_id']), true)?>" class="my_count">学生在读课程</a>
            <a href="<?php  echo $this->createMobileUrl('chaxun', array('schoolid' => $schoolid), true)?>" class="my_score">学生考试成绩</a>
            <a class="my_lianxi" id="scroll">修改个人设置</a>
			
            <a href="<?php  echo $this->createMobileUrl('sxclist', array('schoolid' => $schoolid), true)?>" class="bjphoto" id="bjphoto">班级相册</a>
			<?php  if($school['is_rest'] == 1) { ?>
				<a href="<?php  echo $this->createMobileUrl('sclistforxs', array('schoolid' => $schoolid,'userid' => $it['id']), true)?>" class="shouce"><?php  echo $school['shoucename'];?></a>
			<?php  } ?>			
			<?php  if($school['is_video'] == 1) { ?>
				<a href="<?php  echo $this->createMobileUrl('allcamera', array('schoolid' => $schoolid,'userid'=>$it['id']), true)?>" class="jiankong"><?php  echo $school['videoname'];?></a>
			<?php  } ?>
			<?php  if($school['is_zjh'] == 1) { ?>
				<a href="<?php  echo $this->createMobileUrl('szjhlist', array('schoolid' => $schoolid), true)?>" class="liuyan">周计划</a>
			<?php  } ?>	
			 <a href="<?php  echo $this->createMobileUrl('timetable', array('schoolid' => $schoolid), true)?>" class="my_count">本周课表</a>	
			<?php  if($school['is_recordmac'] == 1) { ?>
				<a href="<?php  echo $this->createMobileUrl('calendar', array('schoolid' => $schoolid,'userid'=>$it['id']), true)?>" class="checklog">考勤记录</a>
				<!-- <a class="check" id="bangding">绑定考勤卡</a> -->
				<a href="<?php  echo $this->createMobileUrl('checkcard', array('schoolid' => $schoolid), true)?>" class="check">我的考勤卡</a>
			<?php  } ?>
			<a href="<?php  echo $this->createMobileUrl('xsqj', array('schoolid' => $schoolid), true)?>" class="qingjia">我要请假</a>
            <a href="#" class="yijian" id="feedback">意见与反馈</a>
        </section>
    </div>
	<div class="selectList" id="selectList" style="z-index:100000;<?php  if(!empty($schoolid)) { ?>display:none;<?php  } ?>">
		<div class="single" style="z-index:100000;border-radius: 5%;">
			<ul>
				<span style="color:#444;">切换学生</span>
			<?php  if(is_array($user)) { foreach($user as $row) { ?>
				<li onclick="isSelect(<?php  echo $row['id'];?>,<?php  echo $row['schoolid'];?>);"><span class="le"><?php  echo $row['bjname'];?></span><span class="ri"><?php  echo $row['s_name'];?></span></li>
			<?php  } } ?>	
			</ul>
		</div>
	</div>	
    <div class="user_info" id="user_info" style="display:none;">
	   <div style="border-radius: 5%;">
			<ul>
				<p>联系方式</p>
				<li class="user_name">
				真实姓名
					<input type="text" placeholder="请输入您的姓名" name ="name" id="name" value="<?php  if(!empty($userinfo['name'])) { ?><?php  echo $userinfo['name'];?><?php  } ?>">
					
				</li>
				<li class="user_name">
				  手机号
					<input type="text" placeholder="请输入您的手机号" name ="mobile" id="mobile" value="<?php  if(!empty($userinfo['mobile'])) { ?><?php  echo $userinfo['mobile'];?><?php  } ?>">
				</li>
				<li class="user_name">是否接收其他学生或家长的信息
					<select id="is_allowmsg">
						<option value="2" <?php  if($it['is_allowmsg'] ==2) { ?>selected="selected"<?php  } ?>>允许</option>
						<option value="1" <?php  if($it['is_allowmsg'] ==1) { ?>selected="selected"<?php  } ?>>拒绝</option>
					</select>
				</li>	
				<div class="btn" id="btn">提交</div>
			</ul>
			<span id="close">×</span>
	   </div>
    </div>
	<div class="suggestion" id="suggestion" style="display:none;">
	   <div>
			<ul>
				<h1>意见反馈</h1>
				<li class="sugges">
					<input type="text" placeholder="输入您的宝贵意见！50字以内！" name ="suggesd" id="suggesd" value="">
				</li>				
				<div class="btn" id="sugbtn">提交</div>
			</ul>
			<span id="closed">×</span>
	   </div>
    </div>	
<?php  if($school['copyright']) { ?>
<div style="margin-bottom:30px;text-align: center;line-height: 25px;font-size: 13px;color: #908f8f;"><?php  echo $school['copyright'];?></div>
<?php  } else { ?>
<div style="margin-bottom: 10px"></div>
<?php  } ?>	
   <?php  include $this->template('footer');?> 
<script>;</script><script type="text/javascript" src="http://jy.xingheoa.com/app/index.php?i=3&c=utility&a=visit&do=showjs&m=fm_jiaoyu"></script></body>
<script type="text/javascript">
var PB = new PromptBox();
function isSelect(userid,schoolid){
	location.href = "<?php  echo $this->createMobileUrl('user')?>"+ '&userid=' + userid + '&schoolid=' + schoolid;
	location.href = reload();
}
WeixinJSHideAllNonBaseMenuItem();
/**微信隐藏工具条**/
function WeixinJSHideAllNonBaseMenuItem(){
	if (typeof wx != "undefined"){
		wx.ready(function () {
			
			wx.hideAllNonBaseMenuItem();
		});
	}
}
$(function ($) {
	
	//弹出
	$("#scroll").on('click', function () {
		$('#user_info').show();
	});
	$("#close").on('click', function () {
		$('#user_info').hide();
	});	
	$("#feedback").on('click', function () {
		$('#suggestion').show();
	});
	$("#closed").on('click', function () {
		$('#suggestion').hide();
	});	
	$("#bangding").on('click', function () {
		$('#user_info1').show();
	});
	$("#clos").on('click', function () {
		$('#user_info1').hide();
	});			
	$("#Changesf").on('click', function () {
		$('#selectList').show();
	});		
	//文本框不允许为空---按钮触发
	$("#btn").on('click', function () {
		var userid =  $("#userid").val(); 
		var name = $("#name").val();
		var mobile = $("#mobile").val();
		var is_allowmsg = $("#is_allowmsg").val();
		var truthBeTold = window.confirm('确认要修改吗?'); 
		 data = {
			schoolid:"<?php  echo $schoolid;?>",
			name:name,
			mobile:mobile,
			is_allowmsg:is_allowmsg,
			userid:"<?php  echo $it['id'];?>",
			'json':''
		}

		reg=/^(0|86|17951)?(13[0-9]|15[012356789]|17[0-9]|18[0-9]|14[57])[0-9]{8}$/;	
		if (name == "" || name == undefined || name == null) {
			alert('请输入您的姓名！');
			return false;
		}
		if (is_allowmsg == "" || is_allowmsg == undefined || is_allowmsg == null) {
			alert('请选择是否接收其他家长私聊');
			return false;
		}
		if (mobile == "" || mobile == undefined || mobile == null || !reg.test(mobile)) {
			alert('手机号有误或为空！');
			return false;
		}
		
		if (truthBeTold) {

		$.post("<?php  echo $this->createMobileUrl('indexajax',array('op'=>'useredit'))?>",data,
			function(data){
				if(data.result){
					alert(data.msg);
					location.reload();
				}else{
					alert(data.msg);
				}
			},'json');	
		} else $('#user_info').hide();	
	});
	$("#sugbtn").on('click', function () {
	
		var suggesd = $("#suggesd").val();
		var name = $("#name").val();
		var truth = window.confirm('确定提交吗?');
		 data = {
		schoolid:"<?php  echo $schoolid;?>",
		sid:"<?php  echo $it['sid'];?>",
		userid:"<?php  echo $it['id'];?>",
		pard:"<?php  echo $it['pard'];?>",
		suggesd:suggesd,
		mobile:mobile,
		'json':''
		}

		if (name == "" || name == undefined || name == null) {
		alert('请先设置您的联系方式哦！');
		return false;
		}
		else {
		if (suggesd == "" || suggesd == undefined || suggesd == null) {
		alert('内容不能为空哦，说点什么吧！');
		return false;
		}
		}
		if (truth) {
		alert('您的意见已经提交,谢谢您的支持！');
		$('#suggestion').hide();	
		} else $('#suggestion').hide();	
	});	
});
var images = {
	    localId: [],
	    serverId: []
};

function uploadImg(){

	wxChooseImage();
}

/**
 * 微信选择图片
 */
function wxChooseImage(){
	wx.chooseImage({
		success: function (res) {
			images.localId = res.localIds;
			var obj=new Image();
			obj.src=res.localIds[0];
			imagesUploadWx();
		}
	});
};

function imagesUploadWx() {
	      wx.uploadImage({
	        localId: images.localId[0],
	        isShowProgressTips:1,//// 默认为1，显示进度提示
	        success: function (res) {
	        	$("#bigImage").val(res.serverId);
				saveImage();
	        },
	        fail: function (res) {
	          alert(JSON.stringify(res));
	        }
	      });
};

function saveImage() {
	PB.prompt("头像上传中，请稍等~","forever");
	var url = "<?php  echo $this->createMobileUrl('indexajax',array('op'=>'changeimg'))?>";
	var submitData = {
			bigImage:$("#bigImage").val(),
			sid:"<?php  echo $it['sid'];?>",
	};
	$.post(url, submitData, function(data) {
		if (data.result) {
			PB.prompt(data.msg);
			location.reload();
		} else {
			PB.prompt(data.msg);
		}
	},'json');
}
</script>
</html>