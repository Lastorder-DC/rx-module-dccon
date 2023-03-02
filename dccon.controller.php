<?php

/**
 * 디시콘 관리 모듈
 * 
 * Copyright (c) Lastorder-DC
 * 
 * Generated with https://www.poesis.org/tools/modulegen/
 */
class DcconController extends Dccon
{
	public function procDcconGenList()
	{
		$module_srl = $this->module_srl;
		$_idx_keyword = documentModel::getExtraVarIdxByEid($module_srl, 'keyword');
		$_idx_tag = documentModel::getExtraVarIdxByEid($module_srl, 'tag');
		
		header("Content-Type: text/javascript; charset=utf-8");
		$args = new stdClass;
		$args->module_srl =$this->module_srl;
		$args->category_srl = 111;
		$args->page_count =  1000;
		$args->sort_index = $this->module_info->order_target?$this->module_info->order_target:'list_order';
		$args->order_type = $this->module_info->order_type?$this->module_info->order_type:'asc';
		$output = documentModel::getDocumentList($args, TRUE);

		echo "dcConsData = [" . PHP_EOL;
		foreach($output->data as $dccon) {
			$condata = documentModel::getExtraVars($module_srl, $dccon->document_srl);
			$conimage = getModel('extravar_upload')->getImageFiles($dccon->document_srl);
			if(count($conimage) != 0) {
				$con = new stdClass;
				$con->name = $conimage[0]->source_filename;
				$con->keywords = array_map('trim', explode(",",$condata[$_idx_keyword]->value));
				$con->tags = array_map('trim', explode(",",$condata[$_idx_tag]->value));
				$con->url = Rhymix\Framework\Url::getCurrentDomainURL() . substr($conimage[0]->uploaded_filename, 2);

				echo "  " . json_encode($con, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "," . PHP_EOL;
			}
		}
		echo "];" . PHP_EOL;
		\Context::close();
		exit;
	}
}
