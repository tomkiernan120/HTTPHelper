<?php

namespace HTTPFriend\Tags;


class Tag
{
    public $linkAttr = [
      "href",
      "codebase",
      "cite",
      "background",
      "action",
      "longdesc",
      "src",
      "usemap",
      "classid",
      "data",
      "formaction",
      "icon",
      "manifest",
      "poster",
    ];

    public function __construct( )
    {
        
    }

    public function cleanURLs( $html, $urlreplace = null )
    {

      foreach ( $this->linkAttr as $attr ) {
        $html = str_replace( "{$attr}=\"//", "{$attr}=\"##", $html );

        if( $urlreplace ){
          $html = str_replace( "{$attr}=\"/", "{$attr}=\"{$urlreplace}", $html );
        }
        $html = str_replace( "{$attr}=\"##", "{$attr}=\"//", $html );
      }

      return $html;
    }

}
