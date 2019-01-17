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

  public function __construct()
  {

  }

  public function cleanURLs($html, $urlreplace = null)
  {

    foreach ($this->linkAttr as $attr) {
      $html = str_replace("{$attr}=\"//", "{$attr}=\"##", $html);

      if ($urlreplace) {
        $html = str_replace("{$attr}=\"/", "{$attr}=\"{$urlreplace}", $html);
      }
      $html = str_replace("{$attr}=\"##", "{$attr}=\"//", $html);
    }

    return $html;
  }

  public function createElement($tag, $attr = [], $selfClosing = false, $close = false)
  {
    $element = "<" . (($close) ? "/" : "");
    $element .= "$tag";
    if (!empty($attr)) {
      foreach ($attr as $ak => $av) {
        $element .= " {$ak}=\"{$av}\" ";
      }
    }
    $element .= (($selfClosing) ? "/" : "") . ">";
    return $element;
  }

  public function output($options = [])
  {
    if (!isset($options["tag"])) {
      throw new Exception("No Tag defined");
    }

    if (!isset($options["attr"])) {
      $options["attr"] = [];
    }

    if (!isset($options["selfClosing"])) {
      $options["selfClosing"] = false;
    }

    if (!isset($options["close"])) {
      $options["close"] = false;
    }

    ob_start();
    echo $this->createElement($options["tag"], $options["attr"], $options['selfClosing'], $options["close"]);
    echo ob_get_clean();
  }

}
