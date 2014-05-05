<?php
class Star extends Polygon {
    public function getHTML(){
        $numPoints = isset($this->htmlAttributes['numPoints']) ? $this->htmlAttributes['numPoints'] : 5 ;
        $outerRadius = isset($this->htmlAttributes['outerRadius']) ? $this->htmlAttributes['outerRadius'] : 100;
        $innerRadius = isset($this->htmlAttributes['innerRadius']) ? $this->htmlAttributes['innerRadius'] : -100;
        $cx = isset($this->htmlAttributes['cx']) ? $this->htmlAttributes['cx'] : $outerRadius;
        $cy = isset($this->htmlAttributes['cy']) ? $this->htmlAttributes['cy'] : $outerRadius;;

        $points = "";
        $angle = M_PI / $numPoints;

        for ($i = 0; $i < 2 * $numPoints; $i++) {
            $r = (($i & 1) == 0) ? $outerRadius : $innerRadius;
            $points.= sprintf('%f,%f ', $cx + cos($i * $angle) * $r, $cy + sin($i * $angle) * $r);
        }

        unset($this->htmlAttributes['numPoints'], $this->htmlAttributes['outerRadius'], $this->htmlAttributes['innerRadius'], $this->htmlAttributes['cx'], $this->htmlAttributes['cy']);
        $this->htmlAttributes['points'] = $points;

        return parent::getHTML();
    }
}