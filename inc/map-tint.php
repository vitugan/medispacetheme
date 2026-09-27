<?php
/**
 * Map tint: recolors the OpenStreetMap tiles of the MediSpace Core cover map to the design's
 * light-blue palette.
 *
 * An SVG filter (luminance -> color lookup) is printed next to every cover map block; the CSS
 * (assets/css/patterns.css, "Contact us") applies it to the Leaflet tile pane only, so the marker
 * keeps its own colors. Tune the look by editing the stops below.
 *
 * @package Medispace
 */

/**
 * Luminance stops (0 = black, 1 = white) and the colors they map to. With the weighting in
 * medispace_map_tint_render() OSM land is ~0.94, residential areas ~0.87, buildings ~0.83,
 * motorways ~0.78 (light-blue roads), water ~0.735 (grey-blue), labels dark.
 *
 * @return array<array{0:float,1:string}>
 */
function medispace_map_tint_stops()
{
    return apply_filters("medispace_map_tint_stops", [
        [0.0, "#5A7285"],
        [0.5, "#8CA2B3"],
        [0.745, "#9DB2C2"],
        [0.765, "#B9D3E6"],
        [0.8, "#C6DDED"],
        [0.85, "#E3F2FA"],
        [0.88, "#EAF6FC"],
        [1.0, "#EAF6FC"],
    ]);
}

/**
 * Lookup tables (one per RGB channel) sampled evenly from the stops.
 *
 * @return string[] Three space-separated tableValues strings.
 */
function medispace_map_tint_tables()
{
    $stops = medispace_map_tint_stops();
    $rgb = function ($hex) {
        $hex = ltrim($hex, "#");
        return [hexdec(substr($hex, 0, 2)) / 255, hexdec(substr($hex, 2, 2)) / 255, hexdec(substr($hex, 4, 2)) / 255];
    };
    $samples = 101;
    $tables = [[], [], []];
    for ($k = 0; $k < $samples; $k++) {
        $x = $k / ($samples - 1);
        $color = $rgb(end($stops)[1]);
        for ($i = 0; $i < count($stops) - 1; $i++) {
            [$a, $ca] = $stops[$i];
            [$b, $cb] = $stops[$i + 1];
            if ($x >= $a && $x <= $b) {
                $t = $b > $a ? ($x - $a) / ($b - $a) : 0;
                $from = $rgb($ca);
                $to = $rgb($cb);
                $color = [];
                for ($c = 0; $c < 3; $c++) {
                    $color[] = $from[$c] + ($to[$c] - $from[$c]) * $t;
                }
                break;
            }
        }
        for ($c = 0; $c < 3; $c++) {
            $tables[$c][] = round($color[$c], 3);
        }
    }
    return array_map(fn($table) => implode(" ", $table), $tables);
}

/**
 * Appends the filter definition to the first cover map block on the page.
 */
function medispace_map_tint_render($block_content)
{
    static $printed = false;
    if ($printed) {
        return $block_content;
    }
    $printed = true;

    [$r, $g, $b] = medispace_map_tint_tables();
    // Grey by a red-heavy weighting so OSM's blue water lands darker than the land around it.
    $svg = '<svg class="medispace-map-tint" width="0" height="0" aria-hidden="true" focusable="false" style="position:absolute">'
        . '<filter id="medispace-map-tint" color-interpolation-filters="sRGB">'
        . '<feColorMatrix type="matrix" values="0.6 0.3 0.1 0 0  0.6 0.3 0.1 0 0  0.6 0.3 0.1 0 0  0 0 0 1 0"/>'
        . '<feComponentTransfer>'
        . '<feFuncR type="table" tableValues="' . esc_attr($r) . '"/>'
        . '<feFuncG type="table" tableValues="' . esc_attr($g) . '"/>'
        . '<feFuncB type="table" tableValues="' . esc_attr($b) . '"/>'
        . "</feComponentTransfer></filter></svg>";

    return $block_content . $svg;
}
add_filter("render_block_medisapce-core/cover-map-block", "medispace_map_tint_render");
