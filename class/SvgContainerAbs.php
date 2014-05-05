<?php
abstract class SvgContainerAbs extends SvgAbs
{
    protected $elements = array();

    public function __construct() {}

    public function append(ISvgType $element) {
        $this->elements[] = $element;

        return $element;
    }

    public function getHTML() {
        $htmlElements = '';
        $htmlAttr = '';

        foreach($this->htmlAttributes as $attr=>$val) {
            $htmlAttr.= $attr."=\"$val\"";
        }

        foreach($this->elements as $element) {
            $htmlElements.= $element->getHTML();
        }

        return sprintf(static::HTML_OUTPUT, $htmlAttr, $htmlElements);
    }
}