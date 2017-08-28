<?php 

class Files
{
	private $file;
	private $msg = '';

	public function getFile()
	{
		return $this->file;
	} 

	public function setFile($file)
	{
		$this->file = $file;
	}

	private function verifiFile()
	{
		if(empty($this->getFile()['tmp_name'])){
			return $this->msg = 'Nenhum arquivo enviado!';
		}
	}

	private function extensions()
	{
		if(!empty($this->getFile()['name'])){
			$extensions = explode('.', $this->getFile()['name']);
			return $extensions[1];
		}
	}

	private function validateFile()
	{
		$extension = ['png', 'jpg', 'jpeg'];
		if(!in_array($this->extensions(), $extension)){
			return $this->msg = 'Formato inválido';
		}
		
	}

	private function renameFile()
	{
		if(!$this->verifiFile() && !$this->validateFile()){
			return md5(time() . rand(0, 99)) . '.' . $this->extensions();
		}
	}

	public function moveFile()
	{
		if($this->renameFile()){
			move_uploaded_file($this->getFile()['tmp_name'], 'files/' . $this->renameFile());
		}else{
			return $this->msg;
		}
	}
}