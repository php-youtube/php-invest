<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Pagination;

class DashboardController extends Controller {

	public function investAction() {
		$vars = [
			'tariff' => $this->tariffs[$this->route['id']],
		];
		$this->view->render('Инвестировать', $vars);
	}

	public function tariffsAction() {
		$pagination = new Pagination($this->route, $this->model->tariffsCount());
		$vars = [
			'pagination' => $pagination->get(),
			'list' => $this->model->tariffsList($this->route),
		];
		$this->view->render('Тарифы', $vars);
	}

	public function historyAction() {
		$pagination = new Pagination($this->route, $this->model->historyCount());
		$vars = [
			'pagination' => $pagination->get(),
			'list' => $this->model->historyList($this->route),
		];
		$this->view->render('История', $vars);
	}

	public function referralsAction() {
		if (!empty($_POST)) {
			if ($_SESSION['account']['refBalance'] <= 0) {
				$this->view->message('success', 'Реферальный баланс пуст');
			}
			$this->model->creatRefWithdraw();
			$this->view->message('success', 'Заявка на вывод создана');
		}
		$pagination = new Pagination($this->route, $this->model->referralsCount());
		$vars = [
			'pagination' => $pagination->get(),
			'list' => $this->model->referralsList($this->route),
		];
		$this->view->render('Рефералы', $vars);
	}

}