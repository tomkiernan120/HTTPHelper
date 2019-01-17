<?php

namespace HTTPFriend;


use HTTPFriend\Form\Handler as Handler;
use HTTPFriend\Tags\Tag as Tag;
use HTTPFriend\Tags\Link as Link;
use HTTPFriend\Tags\Meta as Meta;
use HTTPFriend\Tags\Js as Js;
use HTTPFriend\Tags\Css as Css;


class HTTPHelper {
    
    public $charset = "UTF-8";
    public $html;

    private $config = [];
    
    public function __construct( $config = [] )
    {
        $this->setConfig( $config );
        $this->tag = $this->tag ?: new Tag;
        $this->CSS = $this->CSS ?: new Css;
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