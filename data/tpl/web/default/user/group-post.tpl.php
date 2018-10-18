<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="new-keyword" id="js-user-group-post" ng-controller="UserGroupPost" ng-cloak>
	<ol class="breadcrumb we7-breadcrumb">
		<a href="<?php  echo url('user/group/display')?>"><i class="wi wi-back-circle"></i> </a>
		<li><a href="<?php  echo url('user/group/display')?>">用户组管理</a></li>
		<li>添加用户组</li>
	</ol>
	<form class="we7-form user-group-edit" method="post" action="">
		<div class="form-group">
			<label for="" class="control-label col-sm-2">用户权限组名</label>
			<div class="form-controls col-sm-8">
				<input type="text" name="name" class="form-control" ng-model="groupInfo.name">
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-2">创建公众号数量</label>
			<div class="form-controls col-sm-8">
				<input type="text" name="maxaccount" class="form-control" ng-model="groupInfo.maxaccount">
				<span class="help-block">限制公众号的数量，为0则不允许添加。</span>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-2">创建微信小程序数量</label>
			<div class="form-controls col-sm-8">
				<input type="text" name="maxwxapp" class="form-control" ng-model="groupInfo.maxwxapp">
				<span class="help-block">限制微信小程序的数量，为0则不允许添加。</span>
			</div>
		</div>

		<div class="form-group">
			<label for="" class="control-label col-sm-2">创建PC数量</label>
			<div class="form-controls col-sm-8">
				<input type="text" name="maxwebapp" class="form-control" ng-model="groupInfo.maxwebapp">
				<span class="help-block">限制PC的数量，为0则不允许添加。</span>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-2">创建APP数量</label>
			<div class="form-controls col-sm-8">
				<input type="text" name="maxphoneapp" class="form-control" ng-model="groupInfo.maxphoneapp">
				<span class="help-block">限制APP的数量，为0则不允许添加。</span>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-2">创建熊掌号数量</label>
			<div class="form-controls col-sm-8">
				<input type="text" name="maxxzapp" class="form-control" ng-model="groupInfo.maxxzapp">
				<span class="help-block">限制熊掌号的数量，为0则不允许添加。</span>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-2">创建支付宝小程序数量</label>
			<div class="form-controls col-sm-8">
				<input type="text" name="maxaliapp" class="form-control" ng-model="groupInfo.maxaliapp">
				<span class="help-block">限制支付宝小程序的数量，为0则不允许添加。</span>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-2">有效期</label>
			<div class="form-controls col-sm-8">
				<div class="input-group">
					<input type="text" name="timelimit" class="form-control" ng-model="groupInfo.timelimit">
					<span class="input-group-addon font-default">天</span>
				</div>
			<span class="help-block">设置用户组的有效期限。0为不限制期限。到期后，该用户下的所有公众号只能使用 "基础服务"</span>
			</div>
		</div>
		<div class="panel we7-panel">
			<div class="panel-heading">
				选择应用权限套餐组
				<a href="<?php  echo url('module/group/post')?>" class="color-default pull-right">新建应用权限套餐组</a>
			</div>
			<div class="panel-heading">
				<style>
					.btn-group-item{margin: 5px 10px 5px auto;}
					.hover-border-color{color: #888;}
					.hover-border-color:hover{border-color: #e7e7eb;}
					.remove-hover:hover{background-color: white;border-color: #e7e7eb}
				</style>
				<div class="btn-group btn-group-item" role="group" ng-repeat="item in checkedGroup">
					<span class="btn btn-default remove-hover">{{item.name}}</span>
					<input type="hidden" name="package[]" value="{{item.id}}"/>
					<span type="button" class="btn btn-default hover-border-color" ng-click="removeCheckedGroupItem(item.id)">x</span>
				</div>
			</div>
			<div class="panel-heading">
				<div class="input-group" style="width: 400px;">
					<input class="form-control" ng-model="searchKeywords" type="text" placeholder="输入套餐组名">
					<div class="input-group-btn" ng-click="loadMore('', 1)">
						<span class="btn btn-primary"><i class="fa fa-search"></i></span>
					</div>
				</div>
			</div>
			<div class="panel-body user-permission">
				<?php  if(permission_check_account_user('see_account_manage_module_tpl_all_permission')) { ?>
				<div ng-hide="hideCheckAll">
					<div class="permission-heading">
						<input id="checkbox-0" type="checkbox" value="-1" name='' ng-checked="groupInfo.check_all" ng-click="checkAllGroup($event)">
						<label for="checkbox-0">所有服务</label>
						<div class="pull-right permission-edit">
							<a href="javascript:;" class="color-default js-unfold" data-toggle="collapse" data-target="#demo-0" ng-click="changeText($event)">展开</a>
						</div>
					</div>
					<div class="collapse" id="demo-0">
						<table  class="table we7-table table-hover">
							<col width="90px" />
							<col />
							<tr class="permission-apply">
								<td class="vertical-middle">应用</td>
								<td><ul><li><span class="label label-danger">系统所有模块</span></li></ul></td>
							</tr>
							<tr class="permission-template">
								<td class="vertical-middle">模板</td>
								<td><ul><li><span class="label label-danger">系统所有模板</span></li></ul></td>
							</tr>
						</table>
					</div>
				</div>
				<?php  } ?>
				<div ng-repeat="pack in packages">
					<div class="permission-heading">
						<input id="checkbox-{{pack.id}}" type="checkbox" name='' value="{{pack.id}}" ng-checked="pack.checked" ng-click="pushCheckedGroupItem(pack, $event)">
						<label for="checkbox-{{pack.id}}" ng-bind="pack.name"></label>
						<div class="pull-right permission-edit">
							<a href="javascript:;" class="color-default js-unfold" data-toggle="collapse" data-target="#demo-{{pack.id}}" ng-click="changeText($event)">展开</a>
						</div>
					</div>
					<div class="collapse" id="demo-{{pack.id}}">
						<table class="table we7-table table-hover">
							<col width="90px" />
							<col />
							<tr class="permission-apply">
								<td class="vertical-middle">公众号应用</td>
								<td>
									<ul>
										<li ng-repeat="module in pack.modules" class="col-sm-2 text-over text-left">
											<div ng-if="module.name != 'all'">
												<img ng-src="{{ module.logo }}" alt="">
												{{ module.title }}
											</div>
										</li>
									</ul>
								</td>
							</tr>
							<tr class="permission-apply">
								<td class="vertical-middle">小程序应用</td>
								<td>
									<ul>
										<li ng-repeat="wxapp in pack.wxapp">
											<span class="label label-info" ng-bind="wxapp.title"></span>
										</li>
									</ul>
								</td>
							</tr>
							<tr class="permission-apply">
								<td class="vertical-middle">PC应用</td>
								<td>
									<ul>
										<li ng-repeat="pc in pack.pc">
											<span class="label label-info" ng-bind="pc.title"></span>
										</li>
									</ul>
								</td>
							</tr>
							<tr class="permission-apply">
								<td class="vertical-middle">熊掌号应用</td>
								<td>
									<ul>
										<li ng-repeat="pc in pack.xzapp">
											<span class="label label-info" ng-bind="pc.title"></span>
										</li>
									</ul>
								</td>
							</tr>
							<tr class="permission-apply">
								<td class="vertical-middle">支付宝小程序应用</td>
								<td>
									<ul>
										<li ng-repeat="aliapp in pack.aliapp">
											<span class="label label-info" ng-bind="aliapp.title"></span>
										</li>
									</ul>
								</td>
							</tr>
							<tr class="permission-template">
								<td class="vertical-middle">模板</td>
								<td><ul><li ng-repeat="tpl in pack.templates"><span class="label label-info" ng-bind="tpl.title"></span></li></ul></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="pull-left">
			<input type="submit" name="submit" value="保存" class="btn btn-primary" ng-style="{'padding': '6px 50px'}" />
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>">
		</div>
		<div class="pull-right js-pager">
			<?php  echo $pager;?>
		</div>
	</form>
</div>
<script>
	angular.module('userGroup').value('config', {
		groupInfo: <?php echo !empty($group_info) ? json_encode($group_info) : 'null'?>,
		packages: <?php echo !empty($packages) ? json_encode($packages) : 'null'?>,
    	checkedGroup: <?php echo !empty($checked_groups) ? json_encode($checked_groups) : '[]'?>,
    	pagesize: <?php  echo $pagesize;?>,
	});
	angular.bootstrap($('#js-user-group-post'), ['userGroup']);
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>