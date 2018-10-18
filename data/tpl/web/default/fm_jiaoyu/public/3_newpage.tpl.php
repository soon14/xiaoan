<?php defined('IN_IA') or exit('Access Denied');?><style>
.parent_notify{padding: 12px 0 12px 25px;background:url(<?php echo MODULE_URL;?>public/mobile/img/parent_notify_icon.png) no-repeat #fff;background-size:19px 15px;background-position:15px center;color:#999;border-top: 1px solid #f0f0f2;margin-bottom: 10px;text-indent: 1em;}
.school_option li:after{content: "";width:9px;height:16px;position:absolute;right:15px;top:15px;background: url(<?php echo MODULE_URL;?>public/mobile/img/right_arrow.png) no-repeat;background-position: center center;background-size: 9px 16px;}
.head {position: relative;width: 100%;<?php  if($stutop['status'] == 0) { ?>background: #1071b7;<?php  } else if($stutop['status'] == 1 ) { ?>background: <?php  echo $stutop['color'];?>;<?php  } else if($stutop['status'] == 2) { ?>background:url(<?php  echo tomedia($stutop['icon'])?>);<?php  } ?>background-size: 100% auto;-moz-background-size: 100% auto;-webkit-background-size: 100% auto;}
.head .ptool {float: right;display: inline-block;text-decoration: none;height: 50px;line-height: 50px;width: 50px;text-align: center;font-size: 15px;color: #e86414;font-weight: bold;}
.head .pdetail {height: 120px;padding: 30px 0 0 20px;-webkit-box-sizing: border-box;}
.head .pdetail .img-circle {float: left;width: 66px;height: 86px;overflow: hidden;margin-right: 10px;}
.head .pdetail .img-circle img {border-radius: 50%;width: 66px;height: 66px;}
.head .pdetail .img-circle span {font-size: 14px;line-height: 10px;padding-left: 5px;color: #E8ECF1;font-weight: bolder;}
.head .pdetail .pull-left span.name {font-size: 20px;display: inline-block;max-width: 150px;height: 25px;line-height: 25px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;word-break: keep-all;}
.head .pdetail .pull-left span {display: block;color: #FFF;line-height: 20px;}
.head .pdetail .pull-left span.type {font-size: 14px;}
.head .head-nav {height: 50px;line-height: 20px;padding-top: 7px;background: rgba(0,0,0,0.2);}
.head .head-nav .head-nav-list:first-child {background: none;}
.head .head-nav .head-nav-list > span {font-weight: bold;display: block;font-size: 14px;}
.head .head-nav .head-nav-list {display: inline-block;float: left;text-decoration: none;color: #FFF;width: 50%;text-align: center;font-size: 16px;background: -webkit-gradient(linear, 0 0, 0 100, from(rgba(255,255,255,0.5)), to(rgba(255,255,255,0.5)) ) no-repeat left center;-webkit-background-size: 1px 75%;}
.user {font-size: 15px;color: #666;}
.order {height: 45px;border-bottom: 1px solid #ccc;}
.order_li {float: left;height: 45px;text-align: center;line-height: 45px;background-color: #fbfbfb;width: 25%;-webkit-box-sizing: border-box;box-sizing: border-box;}
.order_li + .order_li {border-left: 1px solid #ccc;}
.selectList {position: fixed;left: 0;right: 0;top: 0;bottom: 0;-webkit-box-sizing: border-box;box-sizing: border-box;background-color: rgba(0,0,0,.53);
text-align: center;z-index: 30;font-size: 20px;color: #fe6700;}
.selectList .single {position: absolute;left: 6%;right: 6%;top: 5%;padding: 0 20px;background-color: #fff;padding-bottom: 33px;padding-top: 10px;}
.selectList ul {width: 100%;height: auto;overflow: auto;}
.selectList ul li {height: 50px;line-height: 50px;border-bottom: 1px solid #e9e9e9;padding: 0 10px;}
.selectList ul li span.le {height: 50px;line-height: 50px;float: left;font-size: 16px;}
.selectList ul li span.ri {float: right;height: 50px;line-height: 50px;font-size: 16px;}
.click {content: "";width: 20px;height: 30px;position: absolute;right: 15px;top: 60px;background: url(<?php echo MODULE_URL;?>public/mobile/img/right_arrow.png) no-repeat;background-position: center center;background-size: 18px 32px;}
.bubbling_wrap {position: relative;margin: 0 auto;width: 55px;height: 55px;}
.item a img {width: 55px;height: 55px;margin: 0 auto;}
.order_li> a[value]::after {display: inline-block;left: -webkit-calc( 100% - 8px );left: calc( 100% - 8px );top: 6px;content: attr(value);font-size: 12px;line-height: 16px;padding: 0 5px;height: 16px;-webkit-border-radius: 8px;border-radius: 8px;background-color: #dd1f1f;color: #fff;-webkit-transform: scale(.8);transform: scale(.8);}
</style>
				<div class="app-content only-one-page">
					<!--若只有一个页面，就给app-content添加class: only-one-page; 内部样式定义它的高度：height: 1136px * N-->
					<div class="modules">
						<div>
		<div class="head">
		<a class="ptool" id="Changesf">切换</a>
		<div class="pdetail"  id="stuhead">
			<input type="hidden" id="bigImage" name="bigImage"/>
			<div class="img-circle" onclick="uploadImg(this);">
				<img src="<?php  echo tomedia($logo['spic'])?>">
				<span class="type">修改头像</span>
			</div>
			<div class="pull-left">
				<span class="name"><?php  echo $_W['fans']['nickname'];?></span>
				<span class="type">身份:<?php  echo $pard;?></span>
				<span class="type">姓名:<?php  if(!empty($userinfo['name'])) { ?><?php  echo $userinfo['name'];?><?php  } else if(!empty($item['realname'])) { ?><?php  echo $item['realname'];?><?php  } else { ?>未录入<?php  } ?></span>
				
				<span class="type"><?php  if($school['Is_point'] == 1) { ?>积分:<?php  echo $students['points'];?>分<?php  } ?>&nbsp;&nbsp;&nbsp;<?php  if($school['is_chongzhi'] == 1) { ?>余额:<?php  echo $students['chongzhi'];?>元<?php  } ?></span>
				
				<a class="click"></a>
			</div>
		</div> 
		<div class="head-nav">
			<a class="head-nav-list">班级<span><?php  echo $mybanji['sname'];?></span></a>
			<a class="head-nav-list">学生<span><?php  echo $students['s_name'];?></span></a>
		</div>
			<script type="text/javascript">
										
										$(document).ready(function() {
											$("#stutop").hide();
										});
										$("#stuhead").click(function(){
											$(".editor").hide();
											$("#stutop").show();
										});
									</script>
    </div>
							<div class="banner">
								<ul class="item_list">
									<?php  if(is_array($icons1)) { foreach($icons1 as $row) { ?>
									<li class="item" id="icon<?php  echo $row['id'];?>">
										<a>
											<div class="bubbling_wrap">
												<img id="iconpic<?php  echo $row['id'];?>" src="<?php  echo tomedia($row['icon'])?>">
												<!-- <span class="tips_bubbling">1<span> -->
												<span class="deleteImage"  title="删除" onclick="del(this,<?php  echo $row['id'];?>,1)"></span>
											</div>
											<p id ="iconname<?php  echo $row['id'];?>" style="font-size: 12px; color: #666"><?php  echo $row['name'];?></p>
										</a>
									</li>
									<script type="text/javascript">
										var btnid = "#icon<?php  echo $row['id'];?>";
										var btneditor = "#iconeditor<?php  echo $row['id'];?>";
										$(document).ready(function() {
											$("#iconeditor<?php  echo $row['id'];?>").hide();
										});
										$("#icon<?php  echo $row['id'];?>").click(function(){
											$(".editor").hide();
											$("#iconeditor<?php  echo $row['id'];?>").show();
										});
									</script>
									<?php  } } ?>
								</ul>
							</div>
						</div>
						<div class="banner">				
							<div class="parent_notify" style="padding: 12px 0 12px 35px; margin: 0;">
								<p style="height: 16px; font-size: 12px; color: #999999">
									<a style="color:#999;font-size:12px" style="display:block;color:#999">通知</a>
								</p>
							</div>
							<div style="margin-bottom: 10px"></div>
							<div class="parent_option">
							<?php  if(is_array($icons2)) { foreach($icons2 as $row) { ?>
								<a class="mofang" id="mofang<?php  echo $row['id'];?>" style="background: url(<?php  echo tomedia($row['icon'])?>) no-repeat;   background-size: 38px 40px;background-position: 90% center;" onclick="shouweditor(<?php  echo $row['id'];?>)">
									<span class="deleteImages"  title="删除" onclick="del(this,<?php  echo $row['id'];?>,2)"></span>
									<h3 id ="iconname<?php  echo $row['id'];?>" style="font-size: 16px;color:<?php  echo $row['color'];?>"><?php  echo $row['name'];?></h3>
									<p id ="mfbz<?php  echo $row['id'];?>" style="color: #999; font-size: 11px" class="pull_left"><?php  echo $row['beizhu'];?></p>
								</a>
								<script type="text/javascript">
									$(document).ready(function() {
										$("#iconeditor<?php  echo $row['id'];?>").hide();
									});
									$("#mofang<?php  echo $row['id'];?>").click(function(){
										$(".editor").hide();
										$("#iconeditor<?php  echo $row['id'];?>").show();
									});
								</script>
							<?php  } } ?>	
							</div>
						</div>
						<div class="banner">					
							<div class="school_option">
								<ul class="school_option_list">
								<?php  if(is_array($icons3)) { foreach($icons3 as $row) { ?>
									<li id="list<?php  echo $row['id'];?>" class="parent_weekPlan" style="background: url(<?php  echo tomedia($row['icon'])?>) no-repeat;background-size: 17px 15px;background-position: 15px center;">
										<span class="deleteImage"  title="删除" onclick="del(this,<?php  echo $row['id'];?>,3)"></span>
										<a id="iconname<?php  echo $row['id'];?>" style="color: #666;display: block"><?php  echo $row['name'];?></a>		
									</li>
									<script type="text/javascript">
										$(document).ready(function() {
											$("#iconeditor<?php  echo $row['id'];?>").hide();
										});
										$("#list<?php  echo $row['id'];?>").click(function(){
											$(".editor").hide();
											$("#iconeditor<?php  echo $row['id'];?>").show();
										});
									</script>									
								<?php  } } ?>	
								</ul>
							</div>
						</div>
					</div>
				</div>