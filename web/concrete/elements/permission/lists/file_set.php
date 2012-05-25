<? defined('C5_EXECUTE') or die("Access Denied."); ?>

<table class="ccm-permission-grid">
<?
$permissions = PermissionKey::getList('file_set');

foreach($permissions as $pk) { 
	$pk->setPermissionObject($fs);
	?>
	<tr>
	<td class="ccm-permission-grid-name" id="ccm-permission-grid-name-<?=$pk->getPermissionKeyID()?>"><strong><a dialog-title="<?=$pk->getPermissionKeyName()?>" data-pkID="<?=$pk->getPermissionKeyID()?>" data-paID="<?=$pk->getPermissionAccessID()?>" onclick="ccm_permissionLaunchDialog(this)" href="javascript:void(0)"><?=$pk->getPermissionKeyName()?></a></td>
	<td id="ccm-permission-grid-cell-<?=$pk->getPermissionKeyID()?>"><?=Loader::element('permission/labels', array('pk' => $pk))?></td>
</tr>
<? } ?>
</table>


	<script type="text/javascript">
	ccm_permissionLaunchDialog = function(link) {
		jQuery.fn.dialog.open({
			title: $(link).attr('dialog-title'),
			href: '<?=REL_DIR_FILES_TOOLS_REQUIRED?>/permissions/dialogs/file_set?pkID=' + $(link).attr('data-pkID') + '&paID=' + $(link).attr('data-paID'),
			modal: false,
			width: 500,
			height: 380
		});		
	}
	</script>
