<?php

namespace HTTP;

use Form\Handler as Handler;
use Tags\Link as Link;
use Tags\Meta as Meta;

class HTTPHelper {
    
    public $charset = "UTF-8";
    public $html;

    private $config = [];
    
    public function __construct( $config = [] )
    {
        $this->setConfig( $config );
    }

    public function setConfig( array $config = [] ){
        $this->config = $config;
    }

    public function setConfigParameter( string $configPart, string $configSetting ){
        $this->config[ $configPart ] = $configSetting;
    }

    public function getConfig(){
        return $this->config;
    }

    public function getConfigSetting( string $configPart ){
        return $this->config[ $configPart ];
    }


}