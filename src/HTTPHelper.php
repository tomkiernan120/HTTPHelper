<?php

namespace HTTPHelper;


use HTTPHelper\Form\Handler as Handler;
use HTTPHelper\Tags\Tag as Tag;
use HTTPHelper\Tags\Link as Link;
use HTTPHelper\Tags\Meta as Meta;


class HTTPHelper {
    
    public $charset = "UTF-8";
    public $html;

    private $config = [];
    
    public function __construct( $config = [] )
    {
        $this->setConfig( $config );
        $this->tag = $this->tag ?: new Tag;
    }

    public function setConfig( $config = [] ){
        $this->config = $config;
    }

    public function setConfigParameter( $configPart, $configSetting ){
        $this->config[ $configPart ] = $configSetting;
    }

    public function getConfig(){
        return $this->config;
    }

    public function getConfigSetting( $configPart ){
        return $this->config[ $configPart ];
    }
    
    public function setHTML( $html = null ) 
    {
        $this->html = $html;
    }

    public function getHTML() {
        return $this->html;
    }

    public function parseHTML(){
        if( isset( $this->html ) ){

            if( $this->getConfigSetting( "baseURL" ) ){

                $baseURL = $this->getConfigSetting( "baseURL" );

                $this->setHTML( $this->tag->cleanURLs( $this->getHTML(), $baseURL ) );

            }   
        } 


    }
}