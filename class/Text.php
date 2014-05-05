<?php
class Text extends SvgContainerAbs
{
    const HTML_OUTPUT = '<text %s>%s</text>';

    public function appendText($text) {
        $this->elements[] = $text;

        return $this;
    }

    public function getHtml(){
        $htmlElements = '';
        $htmlAttr = '';

        foreach($this->htmlAttributes as $attr=>$val) {
            $htmlAttr.= $attr."=\"$val\"";
        }

        foreach($this->elements as $element) {
            if(is_object($element) && is_subclass_of($element, 'ISvgType'))
                $htmlElements.= $element->getHTML();
            else
                $htmlElements.= $element;
        }

        return sprintf(static::HTML_OUTPUT, $htmlAttr, $htmlElements);
    }
}