<?php

namespace pintofbeer\utils;

class SitemapCrawler{

	private $stack;
	private $urls;

	function __construct($url){
		$this->stack = [];
		$this->urls = [];
		$this->parse($url);
		while(count($this->stack) > 0){
			$url = array_pop($this->stack);
			$this->parse($url);
		}
	}

	private function parse($url){
		$xml = simplexml_load_file($url);
		$json = json_encode($xml);
		$array = json_decode($json,TRUE);
		if(isset($array['sitemap'])){
			foreach($array['sitemap'] as $new_index){
				$this->stack[] = $new_index['loc'];
			}
		}
		if(isset($array['url'])){
			foreach ($array['url'] as $new_url) {
				if(!in_array($new_url, $this->urls)){
					$this->urls[] = $new_url;
				}		
			}
		}
	}

	function getUrls(){ return $this->urls; }
}
