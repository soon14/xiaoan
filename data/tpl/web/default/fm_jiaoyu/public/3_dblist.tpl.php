<?php defined('IN_IA') or exit('Access Denied');?><script type="text/javascript"> 
var dbclisid = <?php  echo $lastid['id'];?>;
var dividsss = dbclisid + 80;
	$('#dibu').click(function(){
		dividsss++;
		//alert ("iconpic"+divid);
		var htmldb =   '<li id="list'+dividsss+'" onclick="shouweditor('+dividsss+')" class="parent_weekPlan" style="background: url('+imgruls+'weekPlan_Ico.png) no-repeat;    background-size: 17px 15px;background-position: 15px center;">'+
					   '		 <a id="iconname'+dividsss+'" style="color: #666;display: block">列表式菜单</a>'+
					   '	<span class="deleteImage" title="删除" onclick="deleteclass(this,'+dividsss+',3)"></span>'+
					   '</li>';
				    ;
		$('.school_option_list').append(htmldb);
		var imgurlss = "url"+dividsss;
		var imgurls = "'"+imgurlss+"'";
		var htmldbs =   '<div id="iconeditor'+dividsss+'" class="editor" style="top: 300px !important;">'+
						'	<div class="ng-scope">'+
						'		<div class="app-header-setting">'+
						'			<div class="arrow-left"></div>'+
						'			<div class="app-header-setting-inner">'+
						'				<div class="panel panel-default">'+
						'					<div class="panel-body form-horizontal">'+
						'						<input type="hidden" name="type['+dividsss+']" value="2" />'+
						'						<input type="hidden" name="place['+dividsss+']" value="5" />'+
						'						<div class="form-group">'+
						'							<label class="col-xs-3 control-label"><span class="red">*</span>显示状态</label>'+
						'							<div class="col-xs-9">'+
					'									<input type="checkbox" value="1" name="status['+dividsss+']" checked>'+
					'									<span class="help-block">新增按钮默认显示，修改请提交后再次编辑</span>'+
						'							</div>'+
						'						</div>'+
						'						<div class="form-group">'+
						'							<label class="col-xs-3 control-label"><span class="red">*</span>按钮名称</label>'+
						'							<div class="col-xs-9">'+
						'								<input type="text" id="btnname'+dividsss+'" name="btnname['+dividsss+']" onkeyup="SwapTxt1('+dividsss+')" placeholder="按钮名称" value="列表式菜单" class="form-control ng-pristine ng-untouched ng-valid">'+
						'							</div>'+
						'						</div>'+
						'						<div class="form-group ng-scope">'+
						'							<label class="control-label col-xs-3">链接地址</label>'+
						'							<div class="col-xs-9">'+
						'							<div class="ng-isolate-scope">'+
						'								<div class="dropdown link">'+
						'									<div class="input-group">'+
						'										<input type="text" value="" id = "url'+dividsss+'" name="url['+dividsss+']" class="form-control" autocomplete="off">'+
					'												<span class="input-group-btn">'+
					'													<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button" aria-haspopup="true" aria-expanded="false">选择链接 <span class="caret"></span></button>'+
					'													<ul class="dropdown-menu">'+
					'														<li><a href="javascript:" data-type="jiaoyu" onclick="showJiaoyuDialog('+imgurls+',2);">微教育菜单</a></li>'+
					'														<li><a href="javascript:" data-type="system" onclick="showLinkDialog(this);">系统菜单</a></li>'+
					'														<li><a href="javascript:" data-type="page" onclick="pageLinkDialog(this);">微页面</a></li>'+
					'														<li><a href="javascript:" data-type="article" onclick="articleLinkDialog(this)">文章及分类</a></li>'+
					'														<li><a href="javascript:" data-type="news" onclick="newsLinkDialog(this)">图文回复</a></li>'+
					'														<li><a href="javascript:" data-type="map" onclick="mapLinkDialog(this)">一键导航</a></li>'+
					'														<li><a href="javascript:" data-type="phone" onclick="phoneLinkDialog(this)">一键拨号</a></li>'+
					'													</ul>'+
					'												</span>	'+
						'									</div>'+
						'								</div>'+
						'							</div>'+
						'							</div>'+
						'						</div>'+									
						'						<div class="form-group">'+
						'							<label class="control-label col-xs-3"><span class="red">*</span>图标</label>'+
						'							<div class="col-xs-9">'+
						'								<div class="input-group ">'+
						'									<input type="text" name="iconpics['+dividsss+']" id="iconpics'+dividsss+'" value="'+imgruls+'weekPlan_Ico.png" class="form-control" autocomplete="off" filename="" url="">'+
						'									<span class="input-group-btn">'+
						'										<button class="btn btn-default" type="button" data_id="list'+dividsss+'" onclick="showImageDialoglb(this);">选择图片</button>'+
						'									</span>'+
						'								</div>'+
						'								<div class="input-group " style="margin-top:.5em;">'+
						'									<img src="'+imgruls+'weekPlan_Ico.png" onerror="" class="img-responsive img-thumbnail" width="150">'+
						'									<em class="close" style="position:absolute; top: 0px; right: -14px;" title="删除这张图片" onclick="deleteImage(this)">×</em>'+
						'								</div>'+
						'								<span class="help-block">推荐尺寸25*25左右,正方形透明底图标</span>'+
						'							</div>'+
						'						</div>'+
						'					</div>'+
						'				</div>'+
						'			</div>'+
						'		</div>'+
						'	</div>'+	
				        '</div>';
				    ;
		$('.app-side').append(htmldbs);			
	});
</script> 