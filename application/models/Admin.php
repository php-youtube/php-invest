<?php

namespace application\models;

use application\core\Model;

class Admin extends Model {

	public function loginValidate($post) {
		$config = require 'application/config/admin.php';
		if ($config['login'] != $post['login'] or $config['password'] != $post['password']) {
			$this->error = 'Логин или пароль указан неверно';
			return false;
		}
		return true;
	}

	public function historyCount() {
		return $this->db->column('SELECT COUNT(id) FROM history');
	}

	public function historyList($route) {
		$max = 10;
		$params = [
			'max' => $max,
			'start' => ((($route['page'] ?? 1) - 1) * $max),
		];
		$arr = [];
		$result = $this->db->row('SELECT * FROM history ORDER BY id DESC LIMIT :start, :max', $params);
		if (!empty($result)) {
			foreach ($result as $key => $val) {
				$arr[$key] = $val;
				$params = [
					'id' => $val['uid'],
				];
				$account = $this->db->row('SELECT login, email FROM accounts WHERE id = :id', $params)[0];
				$arr[$key]['login'] = $account['login'];
				$arr[$key]['email'] = $account['email'];
			}
		}
		return $arr;
	}

	public function withdrawRefList() {
		$arr = [];
		$result = $this->db->row('SELECT * FROM ref_withdraw ORDER BY id DESC');
		if (!empty($result)) {
			foreach ($result as $key => $val) {
				$arr[$key] = $val;
				$params = [
					'id' => $val['uid'],
				];
				$account = $this->db->row('SELECT login, wallet FROM accounts WHERE id = :id', $params)[0];
				$arr[$key]['login'] = $account['login'];
				$arr[$key]['wallet'] = $account['wallet'];
			}
		}
		return $arr;
	}

	public function withdrawTariffsList() {
		$arr = [];
		$result = $this->db->row('SELECT * FROM tariffs WHERE UNIX_TIMESTAMP() >= unixTimeFinish AND sumOut != 0 ORDER BY id DESC');
		if (!empty($result)) {
			foreach ($result as $key => $val) {
				$arr[$key] = $val;
				$params = [
					'id' => $val['uid'],
				];
				$account = $this->db->row('SELECT login, wallet FROM accounts WHERE id = :id', $params)[0];
				$arr[$key]['login'] = $account['login'];
				$arr[$key]['wallet'] = $account['wallet'];
			}
		}
		return $arr;
	}

	public function withdrawRefComplete($id) {
		$params = [
			'id' => $id,
		];
		$data = $this->db->row('SELECT uid, amount FROM ref_withdraw WHERE id = :id', $params);
		if (!$data) {
			return false;
		}
		$this->db->query('DELETE FROM ref_withdraw WHERE id = :id', $params);
		$data = $data[0];
		$params = [
			'id' => '',
			'uid' => $data['uid'],
			'unixTime' => time(),
			'description' => 'Выплата реферального вознаграждения произведена, сумма '.$data['amount'].' $',
		];
		$this->db->query('INSERT INTO history VALUES (:id, :uid, :unixTime, :description)', $params);
		return true;
	}

	public function withdrawTariffsComplete($id) {
		$params = [
			'id' => $id,
		];
		$data = $this->db->row('SELECT uid, sumOut FROM tariffs WHERE id = :id', $params);
		if (!$data) {
			return false;
		}
		$this->db->query('UPDATE tariffs SET sumOut = 0 WHERE id = :id', $params);
		$data = $data[0];
		$params = [
			'id' => '',
			'uid' => $data['uid'],
			'unixTime' => time(),
			'description' => 'Выплата по тарифу # '.$id.' произведена, сумма '.$data['sumOut'].' $',
		];
		$this->db->query('INSERT INTO history VALUES (:id, :uid, :unixTime, :description)', $params);
		return true;
	}

	public function tariffsCount() {
		return $this->db->column('SELECT COUNT(id) FROM tariffs');
	}

	public function tariffsList($route) {
		$max = 10;
		$params = [
			'max' => $max,
			'start' => ((($route['page'] ?? 1) - 1) * $max),
		];
		$arr = [];
		$result = $this->db->row('SELECT * FROM tariffs ORDER BY id DESC LIMIT :start, :max', $params);
		if (!empty($result)) {
			foreach ($result as $key => $val) {
				$arr[$key] = $val;
				$params = [
					'id' => $val['uid'],
				];
				$account = $this->db->row('SELECT login, email FROM accounts WHERE id = :id', $params)[0];
				$arr[$key]['login'] = $account['login'];
				$arr[$key]['email'] = $account['email'];
			}
		}
		return $arr;
	}

}