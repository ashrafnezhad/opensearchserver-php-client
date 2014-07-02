<?php
namespace OpenSearchServer\Crawler\File\Repository\Ftp;

use OpenSearchServer\Crawler\File\Repository\Repository;

class Insert extends Repository
{
    public function username($username) {
        $this->parameters['username'] = $username;
        return $this;
    }

    public function password($password) {
        $this->parameters['password'] = $password;
        return $this;
    }

    public function host($host) {
        $this->parameters['host'] = $host;
        return $this;
    }

    public function ssl($ssl) {
        if($ssl === true) {
            $this->parameters['ssl'] = 'true';
        } elseif($ssl === false) {
            $this->parameters['ssl'] = 'false';
        } else {
            $this->parameters['ssl'] = $ssl;
        }
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
        return self::METHOD_PUT;
    }

    /**
     * {@inheritdoc}
     */
    public function getPath()
    {
        $this->checkPathIndexNeeded();
        return 'crawler/file/repository/inject/ftp/'.rawurlencode($this->options['index']).'/json';
    }
}