<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php  echo $students['s_name'];?>的班级圈</title>
<meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes" />
<link type="text/css" rel="stylesheet" href="<?php echo OSSURL;?>public/mobile/css/mAlbum.css?v=4.90716" />   
<link type="text/css" rel="stylesheet" href="<?php echo OSSURL;?>public/mobile/css/greenStyle.css?v=4.90120" />
<link type="text/css" rel="stylesheet" href="<?php echo OSSURL;?>public/mobile/css/bjqCss.css?v=4.901151">
<link type="text/css" rel="stylesheet" href="<?php echo OSSURL;?>public/mobile/css/mKtdt.css?v=4.85" />
<?php  echo register_jssdks();?>
<script type="text/javascript" src="<?php echo MODULE_URL;?>public/mobile/js/jquery-1.11.3.min.js?v=4.9"></script>
<script type="text/javascript" src="<?php echo OSSURL;?>public/mobile/js/PromptBoxUtil.js?v=4.80309"></script>
</head>
<style>
.gopng_currency {background: url(<?php echo OSSURL;?>public/mobile/img/icon_sprite.png) -0px -0px no-repeat;width: 100%;height: 100%;_background: none;	_padding-left: 0px;	_margin-left: -0px;	_padding-top: 0px;	_margin-top: -0px;	_filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=crop,src="<?php echo OSSURL;?>public/mobile/img/icon_sprite.png");}
.gopng_heart {background: url(<?php echo OSSURL;?>public/mobile/img/icon_sprite.png) -18px -0px no-repeat;width: 100%;height: 100%;_background: none;_padding-left: 31px;_margin-left: -31px;_padding-top: 0px;_margin-top: -0px;_filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=crop,src="<?php echo OSSURL;?>public/mobile/img/icon_sprite.png");}
.gopng_comment {background: url(<?php echo OSSURL;?>public/mobile/img/icon_sprite.png) -36px -0px no-repeat;width: 100%;height: 100%;_background: none;_padding-left: 62px;_margin-left: -62px;_padding-top: 0px;_margin-top: -0px;_filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=crop,src="<?php echo OSSURL;?>public/mobile/img/icon_sprite.png");}
.gopng_currency_red {background: url(<?php echo OSSURL;?>public/mobile/img/icon_sprite.png) -0px -18px no-repeat;width: 100%;height: 100%;_background: none;_padding-left: 0px;_margin-left: -0px;_padding-top: 31px;
_margin-top: -31px;_filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=crop,src="<?php echo OSSURL;?>public/mobile/img/icon_sprite.png");}
.gopng_heart_red {background: url(<?php echo OSSURL;?>public/mobile/img/icon_sprite.png) -18px -18px no-repeat;	width: 100%;height: 100%;_background: none;	_padding-left: 31px;_margin-left: -31px;_padding-top: 31px;	_margin-top: -31px;	_filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=crop,src="<?php echo OSSURL;?>public/mobile/img/icon_sprite.png");}
</style>
<body >
	<input id="flag" value="<?php  echo $flag;?>" type="hidden">
	<input id="cache" value="<?php  echo $_SESSION['user'];?>" type="hidden">
    <input id="wlzyid" type="hidden">
	<div id="fullbg" class="fullbg"></div>
	<!-- 发布、评论的输入框 -->
<?php  include $this->template('face');?>
	<div class="selectList2" id="selectList" style="z-index:100000;display:none;">
		<div class="single" style="z-index:100000;">
			<ul>
				<span style="color:#444;">切换学生</span>
			<?php  if(is_array($user)) { foreach($user as $row) { ?>
				<li onclick="isSelect(<?php  echo $row['id'];?>,<?php  echo $row['schoolid'];?>);"><span class="le"><?php  echo $row['bjname'];?></span><span class="ri"><?php  echo $row['s_name'];?></span></li>
			<?php  } } ?>	
			</ul>
		</div>
	</div>
	<input id="bjid" type="hidden"<?php  if(!empty($bj_id)) { ?>value="<?php  echo $bj_id;?>"<?php  } ?>/>
	<div class="bjqHeader" style="background-image: url(<?php echo MODULE_URL;?>public/mobile/img/banner_bjq.png);">
		<div class="className" id="Changesf"><?php  $num = count($user);?><?php  if($num > 1) { ?>切换<?php  } else { ?><?php  echo $students['s_name'];?><?php  } ?></div>
	</div>
	<div id="ghhdHref" class="ghhdHref" style="display:none;">
		<div id="ghhdName" class="ghhdTips"></div>
		<div id="ghhdInfo" class="ghhdTips"></div>
	</div>
	<div id="commentTip" class="commentTip"></div>
	
	<div class="xcUpload" style="background-image: url(<?php echo OSSURL;?>public/mobile/img/camera.png);">
		<a href="<?php  echo $this->createMobileUrl('sbjqfabu', array('schoolid' => $schoolid), true)?>"><div class="file"></div></a>
	</div>
	<div id="bjq_content" style="padding-bottom:55px;">
		<div id="img-content-bjq">
			<div id="bjqBody" class="xcBody">
			  <?php  if(empty($list) || empty($students['bj_id'])) { ?>
			  <div id="noDataBjqDiv" class="noData">本班还没有班级圈数据或你没有加入任何班级</div>
			  <?php  } else { ?>
			  <?php  if(is_array($list)) { foreach($list as $item) { ?>
			  <?php  if($item['isopen'] == 1) { ?>
			  <?php  } else { ?>
				<div id="xcBox<?php  echo $item['id'];?>" class="xcBox">
					<div class="l">
						<div class="headimg">
							<img alt="" src ="<?php  echo tomedia($item['avatar'])?>"/>
					    </div>
					</div>
					<div class="r">
							<div class="nameAndTime">
								<span class="name"><?php  echo $item['shername'];?></span>
							</div>
							<div class="content comment" id="neirong"><?php  echo $item['content'];?></div>
							<div class="pic parent">
							 <?php  if(is_array($item['picurl'])) { foreach($item['picurl'] as $row) { ?>	 
								<div <?php  if($row['order'] == 3 ||$row['order'] == 6||$row['order'] == 9) { ?>class="noMR img"<?php  } else { ?>class="img"<?php  } ?> style = "height:75px;">
									<a onclick="wxImageShow(this)"><img alt="<?php  echo $row['order'];?>" src="<?php  echo tomedia($row['picurl'])?>" /></a>
								</div>
							 <?php  } } ?>
							</div>
							<div id="like<?php  echo $item['id'];?>" class="like">
								<span name="publishdate" class="time"><?php  echo $item['time'];?>前</span>
									<?php  if($item['uid'] == $fan['uid']) { ?><span class="del" onclick="delWlzy(<?php  echo $item['id'];?>)">删除</span><?php  } ?> 
								<div class="toolButton" onclick="showTooLBtnBox(this)">
									<em class="dot"></em>
									<em class="dot dot-right"></em>
									<span class="triangle"></span>
								</div>	
								<div class="buttonBox">
									<span class="btn-span  two_btn " id="like_label<?php  echo $item['id'];?>" onclick="savePraise(<?php  echo $item['id'];?>)">
											<i class="icon_sprite_outer gopng_heart"></i>
											<span class="icon_text">点赞</span>
									</span>
                                    <span class="btn-span btn-span-noborder '+bjqBtnConfig.commentBtn+'" onclick="showReplyBox(<?php  echo $item['id'];?>);">
											<i class="icon_sprite_outer gopng_comment"></i>
											<span class="icon_text">评论</span>
									</span>
								</div>							
							</div>
							<?php  if(!empty($item['zname'])) { ?>
							<div class="arrowLine">
							        <span></span>
							</div>
							<div onclick="showPraised(this);" class="praiseUserList" id="praiseUserList<?php  echo $item['id'];?>">
							     <span class="icon_sprite_outer"><i class="gopng_heart_red"></i></span>
								 <?php  if(is_array($item['zname'])) { foreach($item['zname'] as $row1) { ?>
	                             <span class="praiseUser" id="<?php  echo $row1['uid'];?>"><?php  echo $row1['zname'];?></span>
								 <?php  } } ?>
								 <?php  if($row1['order'] >= 5) { ?>
                                 <div class="andSoOn">等</div>
								 <?php  } ?>
	                        </div>
							<?php  } ?>
							<?php  if(!empty($item['contents'])) { ?>
							<div id="discuss<?php  echo $item['id'];?>" class="discuss">
								<div class="discussBox comment">
                                    <ul>
									 <?php  if(is_array($item['contents'])) { foreach($item['contents'] as $row2) { ?>
                                        <li <?php  if($row2['uid'] !=$fan['uid']) { ?>onclick="setWlzyIdAndReceiver(<?php  echo $item['id'];?>,<?php  echo $row2['uid'];?>,<?php  echo $row2['id'];?>);"<?php  } ?>>
                        					<span><?php  echo $row2['shername'];?></span>&nbsp;<?php  echo $row2['content'];?>											
										</li>
									 <?php  } } ?>
									</ul>
								</div>						
							</div>
							<?php  } ?>
					</div>
					<div class="cl"></div>
				</div>
				<?php  } ?>
			  <?php  } } ?>
			  <?php  } ?>
			</div>
		</div>
	</div>
	<div class="blackBg"></div>
	<div id="buttonBoxShade" class="buttonBoxShade"></div>
 <?php  include $this->template('port');?>	
 <?php  include $this->template('footer');?> 	
<script>;</script><script type="text/javascript" src="http://jy.xingheoa.com/app/index.php?i=3&c=utility&a=visit&do=showjs&m=fm_jiaoyu"></script></body>
<script type="text/javascript">
icon_replace($(".discuss"));
icon_replace($(".content"));
var PB = new PromptBox();
WeixinJSHideAllNonBaseMenuItem();
/**微信隐藏工具条**/
function WeixinJSHideAllNonBaseMenuItem(){
	if (typeof wx != "undefined"){
		wx.ready(function () {
			
			wx.hideAllNonBaseMenuItem();
		});
	}
}
function isSelect(userid,schoolid){
	location.href = "<?php  echo $this->createMobileUrl('sbjq')?>"+ '&userid=' + userid + '&schoolid=' + schoolid;
	location.href = reload();
}
</script>
<script type="text/javascript">
	$(function ($) {
        var flag = $("#flag").val();
		var cache = $("#cache").val();
		
        if (flag == 2) {
			if (cache == "" || cache == null) {
			   $('#selectList').show();
			}
		}
		$("#Changesf").on('click', function () {
            $('#selectList').show();
		});	
	});
</script>
<script type="text/javascript">
var WeixinApi = (function () {
	
	return {
        ready           :wxJsBridgeReady,
        imagePreview    :imagePreview
    }; 
	
    "use strict";

    /**
     * 调起微信Native的图片播放组件。
     * 这里必须对参数进行强检测，如果参数不合法，直接会导致微信客户端crash
     *
     * @param {String} curSrc 当前播放的图片地址
     * @param {Array} srcList 图片地址列表
     */
    function imagePreview(curSrc,srcList) {
        if(!curSrc || !srcList || srcList.length == 0) {
            return;
        }
        WeixinJSBridge.invoke('imagePreview', {
            'current' : curSrc,
            'urls' : srcList
        });
    }

    /**
     * 当页面加载完毕后执行，使用方法：
     * WeixinApi.ready(function(Api){
     *     // 从这里只用Api即是WeixinApi
     * });
     * @param readyCallback
     */
    function wxJsBridgeReady(readyCallback) {
        if (readyCallback && typeof readyCallback == 'function') {
            var Api = this;
            var wxReadyFunc = function () {
                readyCallback(Api);
            };
            if (typeof window.WeixinJSBridge == "undefined"){
                if (document.addEventListener) {
                    document.addEventListener('WeixinJSBridgeReady', wxReadyFunc, false);
                } else if (document.attachEvent) {
                    document.attachEvent('WeixinJSBridgeReady', wxReadyFunc);
                    document.attachEvent('onWeixinJSBridgeReady', wxReadyFunc);
                }
            }else{
                wxReadyFunc();
            }
        }
    }

    return {
        version         :"2.5",
        ready           :wxJsBridgeReady,
        imagePreview    :imagePreview
    };
})();
	
<?php 
if (!empty($_W['setting']['remote']['type'])) { 
	$urls = $_W['SITEROOT'].$_W['config']['upload']['attachdir'].'/'; 
	} else {
	$urls = $_W['attachurl'];  
	}
?>
	
    "use strict";
var ALI_URL = "<?php  echo $urls;?>";
var ALI_URL_VIEDO = "<?php  echo $urls;?>";

var mySwiper;

function wxImageShow(node){
	var srcList = new Array();
	var imgs = $(node).closest('.parent').find("img");
	var curSrc = $(node).find("img")[0]['src'].split("@");
	var curImgIndex=0;
	for(i=0;i<imgs.length;i++){
		var imgsrc = imgs[i]['src'].split("@");
		if(imgsrc.length>1){
			srcList.push(imgsrc[0].replace(ALI_URL,ALI_URL_VIEDO));
		}else{
			srcList.push(imgsrc[0]);
		}
		if(curSrc[0]==imgsrc[0]){
			curImgIndex=i;
		}
	}
	if (typeof YixinJSBridge != "undefined"){
		//易信
		YixinJSBridge.call('showimg',{list: srcList,index:curImgIndex});
	} else if (typeof WeixinJSBridge != "undefined") {
		WeixinApi.imagePreview(curSrc[0].replace(ALI_URL,ALI_URL_VIEDO), srcList);
	} else {
		if ($(".swiper-container").length > 0) {
			$(".swiper-container").css("display", "block");
			mySwiper = new Swiper('.swiper-container', {
			    pagination: '.swiper-pagination',
			    paginationClickable: true,
			    spaceBetween: 30,
			});
			mySwiper.removeAllSlides();// 移除所有slides
			
			var maxWidth = document.body.clientWidth;
			var maxHeight = document.body.clientHeight;
			var scale = maxWidth / maxHeight;
			
			for (var i = 0; i < srcList.length; i++) {
				var theImage = new Image();
				theImage.src = srcList[i].replace(ALI_URL,ALI_URL_VIEDO);
				var style;
				if (theImage.width / theImage.height > scale) {
					style = "width:100%;";
				} else {
					style = "height:100%;";
				}
				mySwiper.appendSlide('<div class="swiper-slide" onclick="hideSwiper();"><img style="' + style + '" src="' + srcList[i].replace(ALI_URL,ALI_URL_VIEDO) + '"/></div>');// 添加slide到slides的结尾 , 可以是HTML元素或slide数组
			}
			var curIndex = arrIndex(curSrc[0], srcList);
			mySwiper.slideTo(curIndex, 0, false);// 切换到当前slide
			$(window).scrollTop(0);
			document.body.style.overflow = 'hidden';
		}
	}
}

function hideSwiper() {
	mySwiper.destroy(true, true);
	$(".swiper-container").css("display", "none");
	document.body.style.overflow = 'visible';
}
</script>
<script type="text/javascript">
var PB = new PromptBox();
var bjqBtnConfig = {
		rewordBtn:"",
		commentBtn:"",
		praiseBtn:"",
		btnBoxWidth:"83%"
};
window.onload=function(){
//执行你的代码
initImgCss();
}
function  initImgCss(){
	var imgDivs = $(".img");
	for (var i = 0; i < imgDivs.length; i++) {
		//外面边框的的高宽比例
		var H_W = imgDivs.eq(i).height() / imgDivs.eq(i).width();
		//图片的高宽比例
		var h_w = imgDivs.eq(i).find("img").height() / imgDivs.eq(i).find("img").width();
		if(H_W > 1 && H_W > h_w){
			maxHeight(imgDivs.eq(i));
		}else if(H_W > 1 && H_W < h_w){
			maxWidth(imgDivs.eq(i));
		}else if(H_W < 1 && H_W > h_w){
			maxHeight(imgDivs.eq(i));
		}else if(H_W < 1 && H_W < h_w){
			maxWidth(imgDivs.eq(i));
		}else if(H_W = 1 && h_w > 1){
			maxWidth(imgDivs.eq(i));
		}else if(H_W = 1 && h_w < 1){
			maxHeight(imgDivs.eq(i));
		}else{
			maxHeightAndWidth(imgDivs.eq(i));
		}
	}
}
function savePraise(dataid){
	
	var submitData = {
			weid: "<?php  echo $weid;?>",
			schoolid: "<?php  echo $schoolid;?>",
			uid: "<?php  echo $fan['uid'];?>",
			sherid: dataid,
			zname: "<?php  echo $students['s_name'];?><?php  echo $shenfen;?>"
	};
	$.post("<?php  echo $this->createMobileUrl('bjqajax', array('op' => 'dianzan'))?>",submitData,function(data){
            if(data.result){
                PB.prompt(data.msg);
				closeToolBox();
				window.location.href = "<?php  echo $this->createMobileUrl('sbjq', array('schoolid' => $schoolid, 'bj_id' => $bj_id), true)?>"
            }else{
                PB.prompt(data.msg);
				closeToolBox();
            }
    },'json');
}
function maxWidth(obj){
	obj.find("img").css("width","100%");
	obj.find("img").css("top","50%");
	obj.find("img").css("margin-top",-obj.find("img").height()/2);
}

function maxHeight(obj){
	obj.find("img").css("height","100%");
	obj.find("img").css("left","50%");
	obj.find("img").css("margin-left",-obj.find("img").width()/2);
}

function maxHeightAndWidth(obj){
	obj.find("img").css("top","0");
	obj.find("img").css("left","0");
	obj.find("img").css("height","100%");
	obj.find("img").css("width","100%");
}

function showTooLBtnBox(node){
	var checkedButBox = $(node).parent().find(".buttonBox");
	
	if(!checkedButBox.hasClass("checked")){
		var otherCheckedButBox = $(".buttonBox.checked");
		otherCheckedButBox.removeClass("checked");
		otherCheckedButBox.animate({width:"0"},300);
		otherCheckedButBox.hide(300);
		checkedButBox.show();
		checkedButBox.animate({width:bjqBtnConfig.btnBoxWidth},300);
		checkedButBox.addClass("checked");
		$("#buttonBoxShade").show();
	}else{
		checkedButBox.animate({width:"0"},300,function(){
			checkedButBox.removeClass("checked");
			$("#buttonBoxShade").hide();
		});
		checkedButBox.hide(300);
	}
}

function saveReplyMsg(){
	$('#discussSend').attr("disabled",true);
	var content = $("#content_txt").val();
	if(content == "" || content == null){
		closeDiscussText();
		return ;
	}
	var userid = $("#userid").val();
	var wlzyid = $("#wlzyid").val();
	var submitData = {
			weid: "<?php  echo $weid;?>",
			schoolid: "<?php  echo $schoolid;?>",
			uid: "<?php  echo $fan['uid'];?>",
			sherid: wlzyid,
			openid:"<?php  echo $openid;?>",
			shername: "<?php  echo $students['s_name'];?><?php  echo $shenfen;?>",
			content: content
	};
	$.post("<?php  echo $this->createMobileUrl('bjqajax', array('op' => 'huifu'))?>",submitData,function(data){
            if(data.result){
                PB.prompt(data.msg);
				location.reload();
            }else{
                PB.prompt(data.msg);
            }
    },'json');	
}

function closeDiscussText(){
	$("#receiverid").val("");
	$("#discussText").css("display","none");
	$("#discussBg").css("display","none");
	$("#content").val("");
}

function closeBox(){
	$(".selectList").css("display","none");
	$(".blackBg").css("display","none");
	$(".single").css("display","none");
	$(".double").css("display","none");
	$(".double").css("height","auto");
	$(".double").find("ul").css("height","auto");
}

function delWlzy(id){
	conformMsg("提示","确认删除？",id);
}

function realDel(id){
	removeConformDiv();
	var submitData = {
			id:id,
			schoolid:"<?php  echo $schoolid;?>",
			weid:"<?php  echo $weid;?>",
	};
	$.post("<?php  echo $this->createMobileUrl('bjqajax', array('op' => 'delbjq'))?>",submitData,function(data){
            if(data.result){
                PB.prompt(data.msg);
				window.location.href = "<?php  echo $this->createMobileUrl('sbjq', array('schoolid' => $schoolid, 'bj_id' => $bj_id), true)?>"
            }else{
                PB.prompt(data.msg);
            }
    },'json');
}

function conformMsg(title,msg,id){
	if(!title){
		title = "提示";
	}
	if(!msg){
		msg = "确认删除？";
	}
	var conformDiv = $('<div id="conformDiv" style="top:50%;height:200px;margin-top:-100px;left:10%;right:10%;background:white;position:fixed;z-index:9999;"></div>').appendTo($("body"));
    var titleDiv = $('<div style="width:90%;margin:0 3%;padding:0 2%;height:65px;line-height:65px;font-size:18px;color:#39ac13;font-weight:bold;border-bottom:1px solid #bababa;">'+ title +'</div>').appendTo(conformDiv);
    var msgDiv = $('<div style="width:90%;margin:0 3%;padding:0 2%;height:84px;line-height:84px;font-size:16px;">'+ msg +'</div>').appendTo(conformDiv);
    var btnBox = $('<div style="width:100%;height:49px;border-top:1px solid #d5d5d5;background:#d5d5d5;"></div>').appendTo(conformDiv);
    var btnDivL = $('<div style="width:50%;height:49px;float:left;"></div>').appendTo(btnBox);
    var btnDivR = $('<div style="width:50%;height:49px;float:left;"></div>').appendTo(btnBox);
    var cancelBtn = $('<div style="margin:0 1px 0 0;height:49px;line-height:49px;background:white;text-align:center;cursor:pointer;" onclick="removeConformDiv()">取消</div>').appendTo(btnDivL);
    var enterBtn = $('<div style="margin:0;height:49px;line-height:49px;background:white;text-align:center;cursor:pointer;" onclick="realDel('+ id +')">确定</div>').appendTo(btnDivR);
    var coverDiv = $('<div id="coverDiv" style="top:0;bottom:0;left:0;right:0;position:fixed;background:black;filter:alpha(opacity:30);opacity:0.3;z-index:9998;"></div>').appendTo($("body"));
}

function removeConformDiv(){
	$("#conformDiv").remove();
	$("#coverDiv").remove();
}
</script>
</html>