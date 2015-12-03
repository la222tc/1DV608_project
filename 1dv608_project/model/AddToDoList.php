<?php

/**
* 
*/
class AddToDoList
{
	private $itemPath;
    private $userPath;

    private $itemdata = array();
    
     public function __construct(){
        $this->itemPath = 'data';
        $this->userPath = 'users';
        

        if(!file_exists($this->itemPath)){
            mkdir($this->itemPath, 0777);
        }
        if(!file_exists($this->itemPath . '/' . $this->userPath)){
            mkdir($this->itemPath . '/' . $this->userPath, 0777);
        }
    }
    public function deleteFromList($userName)
    {
        
        if ($this->itemdata !== null) {
            unset($this->itemdata);
            $serializedData = serialize(array());
            file_put_contents($this->itemPath . '/'. $this->userPath . '/' . $userName . '.user', $serializedData);
        }
       
    }

	public function getItems($userName){

		unset($this->itemdata);
		$path = $this->itemPath . '/' . $this->userPath . '/' . $userName . '.user';

        if(file_exists($path)){
            $recoveredData = file_get_contents($path);

	        if ($recoveredData == null){

	            return null;
	        }

        $items = unserialize($recoveredData);

        $this->itemdata = $items;

        return $this->itemdata;

        }

        return null;
	}

	public function saveItem($userName, $itemToSave)
	{
		$this->getItems($userName);
		$this->itemdata[] = $itemToSave;
		$serializedData = serialize($this->itemdata);
        file_put_contents($this->itemPath . '/'. $this->userPath . '/' . $userName . '.user', $serializedData);
	}
}
