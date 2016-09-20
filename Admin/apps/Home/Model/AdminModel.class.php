<?php
namespace Home\Model;
use Think\Model;
class AdminModel extends Model {
	protected $tableName = 'notice';

	public function getNotice() {
		return M('notice')->select();
	}
}