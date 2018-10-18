<?php 

class aliCrawler{

	private $content;
	private $productId;
	public $images;

	public function __construct($productId)
	{
		$this->productId = $productId;
		$this->getFeedbackSrc();
	}

	public function getFeedbackSrc()
	{
		$this->content = file_get_contents('http://feedback.aliexpress.com/display/productEvaluation.htm?productId=' . $this->productId . '&ownerMemberId=225684771&companyId=239204537&memberType=seller&startValidDate=&i18n=true');
	}

	public function getImages()
	{
		preg_match_all('/data-src="(.*?)"/', $this->content, $images);

		$this->images = $images[1];
	}

	public function saveImages()
	{
		if( file_exists('photo/' . $this->productId) ){
			return 'Folder istnieje';
		}

		mkdir('photo/' . $this->productId);

		foreach ($this->images as $image) {
			
			$file = file_get_contents($image);
			
			file_put_contents(__DIR__ . '\/photo/' . $this->productId . '/' . uniqid() . '.jpg', $file);

		}

		return 'Pobieranie zakończone';
	}

}