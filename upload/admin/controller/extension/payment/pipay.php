<?php
class ControllerExtensionPaymentPipay extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('extension/payment/pipay');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('payment_pipay', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true));
		}

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['mid'])) {
			$data['error_mid'] = $this->error['mid'];
		} else {
			$data['error_mid'] = '';
		}

		if (isset($this->error['sid'])) {
			$data['error_sid'] = $this->error['sid'];
		} else {
			$data['error_sid'] = '';
		}

		if (isset($this->error['did'])) {
			$data['error_did'] = $this->error['did'];
		} else {
			$data['error_did'] = '';
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/payment/pipay', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['action'] = $this->url->link('extension/payment/pipay', 'user_token=' . $this->session->data['user_token'], true);

		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true);

		if (isset($this->request->post['payment_pipay_mid'])) {
			$data['payment_pipay_mid'] = $this->request->post['payment_pipay_mid'];
		} else {
			$data['payment_pipay_mid'] = $this->config->get('payment_pipay_mid');
		}

		if (isset($this->request->post['payment_pipay_sid'])) {
			$data['payment_pipay_sid'] = $this->request->post['payment_pipay_sid'];
		} else {
			$data['payment_pipay_sid'] = $this->config->get('payment_pipay_sid');
		}

		if (isset($this->request->post['payment_pipay_did'])) {
			$data['payment_pipay_did'] = $this->request->post['payment_pipay_did'];
		} else {
			$data['payment_pipay_did'] = $this->config->get('payment_pipay_did');
		}

		if (isset($this->request->post['payment_pipay_test'])) {
			$data['payment_pipay_test'] = $this->request->post['payment_pipay_test'];
		} else {
			$data['payment_pipay_test'] = $this->config->get('payment_pipay_test');
		}

		if (isset($this->request->post['payment_pipay_order_status_id'])) {
			$data['payment_pipay_order_status_id'] = $this->request->post['payment_pipay_order_status_id'];
		} else {
			$data['payment_pipay_order_status_id'] = $this->config->get('payment_pipay_order_status_id');
		}

		$this->load->model('localisation/order_status');

		$data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();

		if (isset($this->request->post['payment_pipay_status'])) {
			$data['payment_pipay_status'] = $this->request->post['payment_pipay_status'];
		} else {
			$data['payment_pipay_status'] = $this->config->get('payment_pipay_status');
		}

		if (isset($this->request->post['payment_pipay_sort_order'])) {
			$data['payment_pipay_sort_order'] = $this->request->post['payment_pipay_sort_order'];
		} else {
			$data['payment_pipay_sort_order'] = $this->config->get('payment_pipay_sort_order');
		}

		if (isset($this->request->post['payment_pipay_cancelTimer'])) {
			$data['payment_pipay_cancelTimer'] = $this->request->post['payment_pipay_cancelTimer'];
		} else {
			$data['payment_pipay_cancelTimer'] = $this->config->get('payment_pipay_cancelTimer');
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/payment/pipay', $data));
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/payment/pipay')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (!$this->request->post['payment_pipay_mid']) {
			$this->error['mid'] = $this->language->get('error_mid');
		}

		if (!$this->request->post['payment_pipay_sid']) {
			$this->error['sid'] = $this->language->get('error_sid');
		}

		if (!$this->request->post['payment_pipay_did']) {
			$this->error['did'] = $this->language->get('error_did');
		}

		return !$this->error;
	}
}
