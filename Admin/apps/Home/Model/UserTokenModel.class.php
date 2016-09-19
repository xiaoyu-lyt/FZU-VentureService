<?php
namespace Home\Model;
use Think\Model;
class UserTokenModel extends Model {

	/**
	 * 生成随机 token 码
	 * @param int $uid 用户id
	 * @param int $groupid 用户组
	 * @return string
	 */
	public function createToken($uid,$groupid,$token_expire = 0 ){
		$token_expire = $token_expire > 0  ? (time() + $token_expire ) : (time() + 60*60*24*90 );
		$token = md5(md5($uid.$token_expire.time().rand()."venture")."rdgtrd12367hghf54t");
		$data['uid'] = $uid;
		$data['groupid'] = $groupid;
		$data['token'] = $token;
		$data['token_expire'] = $token_expire;
		$data['addtime'] = time() ;

		$ret = $this->add($data);
		if ($ret) {
			//删除过期的token 
			$this->where( "token_expire < ".time() )->delete();
			return $token ;
		}
		return false ;
	}

	/**
	 * 获取 token 记录信息
	 * @param string $token
	 * @param array
	 */
	public function getToken($token){
		return $this->where(array('token'=>$token))->find();
	}
}