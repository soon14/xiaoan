<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header-base', TEMPLATE_INCLUDEPATH)) : (include template('common/header-base', TEMPLATE_INCLUDEPATH));?>
<link href="<?php  echo $_W['siteroot'];?>addons/fm_jiaoyu/admin/resource/css/login_new_css.css" rel="stylesheet">
<style>
html,body{background-color: <?php  if($item['bgcolor']) { ?><?php  echo $item['bgcolor'];?><?php  } else { ?>#02c493<?php  } ?>;}
.paddgin_box{text-align: center;width: 100%;}
</style>
<body>
    <div id="bg">
        <i><?php  echo $item['banquan'];?></i>
    </div>
    <div id="main_content">
        <div id="main_content_inner">
            <img src="<?php  echo $urls;?><?php  echo $item['newcenteriocn'];?>" id="icon" ondragstart="return false" />
            <div id="login_wrap">
                <img src="<?php  echo $_W['siteroot'];?>addons/fm_jiaoyu/admin/resource/images/user_bg.png" id="login_bg" ondragstart="return false" />
                <div id="login_info_wrap">
                    <div id="login_info_inner" style="">
                        <div class="login_title"><?php  if($item['htname']) { ?><?php  echo $item['htname'];?><?php  } else { ?>微教育校园管理系统<?php  } ?></div>
						<form class="" action="" method="post" role="form" id="form1">
                            <div class="input_wrap">
                                <input type="text" title="用户名" name="username" placeholder="用户名" class="user_info" id="account" />
                            </div>
                            <div class="input_wrap">
                                <input type="password" title="登录密码" name="password" placeholder="密码" class="user_info" id="password" />
                            </div>
							<?php  if(!empty($_W['setting']['copyright']['verifycode'])) { ?>
                            <div class="input_wrap" style="overflow: hidden;">
                                <input id="captcha" name="verify" placeholder="请输入验证码" maxlength="4" class="user_info login_input verification_input " type="text" />
                                <div class="verification_box">
                                     <img id="imgverify" src="<?php  echo $_W['siteroot'].'web/'.url('utility/code')?>" title="点击刷新验证码" style="cursor: pointer;width: 80.5px;height: 37px;" align="absmiddle" border="0">
                                </div>
                            </div>
							<?php  } ?>
                            <div class="help">
                                <div class="pull_left remeber checked" title="记住账号">记住账号</div>
                            </div>
							<div class="paddgin_box">
								<button class="submit_btn" type="submit" id="submit" name="submit" value="登录">登录</button>
							</div>
							<input name="token" value="<?php  echo $_W['token'];?>" type="hidden" />
                        </form>
                        <div id="line"></div>
                        <div class="input_wrap">
                            <div id="tips">推荐使用以下浏览器(点击下载):</div>
                            <div class="brower_wrap">
                                <a href="http://sw.bos.baidu.com/sw-search-sp/software/3d03c3764837b/ChromeStandalone_52.0.2743.116_Setup.exe">
                                    <img src="<?php  echo $_W['siteroot'];?>addons/fm_jiaoyu/admin/resource/images/google.png" ondragstart="return false" class="mr_35" /></a>
                                <a href="http://down.360safe.com/cse/360cse_8.7.0.306.exe">
                                    <img src="<?php  echo $_W['siteroot'];?>addons/fm_jiaoyu/admin/resource/images/360.png" ondragstart="return false" /></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="error_info"></div>
            </div>
        </div>
    </div>
</body>
</html>
