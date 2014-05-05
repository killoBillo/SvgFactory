<?php
class RegularPolygon extends Polygon
{
    public function getHTML() {
        $numSides = isset($this->htmlAttributes['numSides']) ? $this->htmlAttributes['numSides'] : 6 ;
        $x = isset($this->htmlAttributes['cx']) ? $this->htmlAttributes['cx'] : 100 ;
        $y = isset($this->htmlAttributes['cy']) ? $this->htmlAttributes['cy'] : 100 ;
        $r = isset($this->htmlAttributes['r']) ? $this->htmlAttributes['r'] : 100 ;

        $points = '';

        for ($i = 0; $i < $numSides; $i++) {
            $points.= sprintf("%f,%f ",$x + $r * cos(2 * M_PI * $i / $numSides), $y + $r * sin(2 * M_PI * $i / $numSides));
        }

        unset($this->htmlAttributes['numSides'], $this->htmlAttributes['cx'], $this->htmlAttributes['cy'], $this->htmlAttributes['r']);
        $this->htmlAttributes['points'] = $points;

        return parent::getHTML();
    }
}