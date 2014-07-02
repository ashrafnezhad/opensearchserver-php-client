<?php
namespace OpenSearchServer\Synonyms;

use OpenSearchServer\Request;

class Delete extends Request
{
	/**
	 * Specify the name of synonyms list to delete
	 * @param string $name
	 * @return OpenSearchServer\Synonyms\Delete
	 */
	public function name($name) {
		$this->options['name'] = $name;
		return $this;
	}
	
	/******************************
	 * INHERITED METHODS OVERRIDDEN
	 ******************************/
    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return self::METHOD_DELETE;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getPath()
    {
    	$this->checkPathIndexNeeded();
    	if(empty($this->options['name'])) {
    		throw new \Exception('Method "name($name)" must be called before submitting request.');
    	}
        return $this->options['index'].'/synonyms/'.$this->options['name'];
    }
}