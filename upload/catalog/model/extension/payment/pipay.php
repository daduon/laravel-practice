<?php
class ModelExtensionPaymentPipay extends Model {
	public function getMethod($address, $total) {
		$this->load->language('extension/payment/pipay');
		$status = true;
		
		$currencies = array(
			'USD',
			'KHR',
		);

		if (!in_array(strtoupper($this->session->data['currency']), $currencies)) {
			$status = false;
		}

		$method_data = array();

		if ($status) {
			$method_data = array(
				'code'       => 'pipay',
				'title'      => $this->language->get('text_title'),
				'terms'      => '',
				'sort_order' => $this->config->get('payment_pipay_sort_order')
			);
		}

		return $method_data;
	}
}
