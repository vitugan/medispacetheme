<?php
/**
 * Map tint: recolors the OpenStreetMap tiles of the MediSpace Core cover map to the flow's design.
 *
 * SVG filters (luminance -> color lookup), one per palette, are printed next to the first cover
 * map block on the page; the CSS (assets/css/patterns.css, "Contact us" and "Location - Medical")
 * applies one to the Leaflet tile pane only, so the marker keeps its own colors:
 * url(#medispace-map-tint) - Construction light blue, url(#medispace-map-tint-medical) - Medical
 * grey with blue-grey water. Tune the look by editing the stops below.
 *
 * @package Medispace
 */

/**
 * Palettes: the RGB weights that turn a tile pixel into one grey value (0 = black, 1 = white)
 * and the color stops that value maps to.
 *
 * @return array<string, array{weights: float[], stops: array<array{0:float,1:string}>}> Filter id => palette.
 */
function medispace_map_tint_palettes()
{
    return apply_filters("medispace_map_tint_palettes", [
        // Construction: everything light blue, roads a shade darker. With these weights OSM land
        // is ~0.94, residential areas ~0.87, buildings ~0.83, motorways ~0.78, water ~0.735.
        "medispace-map-tint" => [
            "weights" => [0.6, 0.3, 0.1],
            "stops" => apply_filters("medispace_map_tint_stops", [
                [0.0, "#5A7285"],
                [0.5, "#8CA2B3"],
                [0.745, "#9DB2C2"],
                [0.765, "#B9D3E6"],
                [0.8, "#C6DDED"],
                [0.85, "#E3F2FA"],
                [0.88, "#EAF6FC"],
                [1.0, "#EAF6FC"],
            ]),
        ],
        // Medical: the design's grey street map with blue-grey water. The red channel alone keeps
        // water (~0.67) clear of the building outlines (~0.77); parks ~0.78, buildings ~0.85,
        // residential ~0.88, motorways ~0.91, land ~0.95, main and minor roads white.
        "medispace-map-tint-medical" => [
            "weights" => [1, 0, 0],
            "stops" => [
                [0.0, "#4F5B66"],
                [0.55, "#7D8792"],
                [0.62, "#AFC6D4"],
                [0.7, "#B7CEDB"],
                [0.73, "#D3D7DC"],
                [0.775, "#D8DCDF"],
                [0.8, "#DFE5DC"],
                [0.84, "#E6E7E8"],
                [0.87, "#EDECE9"],
                [0.92, "#E9E9EA"],
                [0.935, "#F2F1EE"],
                [0.965, "#F4F3F0"],
                [0.98, "#FFFFFF"],
                [1.0, "#FFFFFF"],
            ],
        ],
    ]);
}

/**
 * Lookup tables (one per RGB channel) sampled evenly from the stops.
 *
 * @param array<array{0:float,1:string}> $stops
 * @return string[] Three space-separated tableValues strings.
 */
function medispace_map_tint_tables(array $stops)
{
    $rgb = function ($hex) {
        $hex = ltrim($hex, "#");
        return [hexdec(substr($hex, 0, 2)) / 255, hexdec(substr($hex, 2, 2)) / 255, hexdec(substr($hex, 4, 2)) / 255];
    };
    $samples = 201;
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

    $filters = "";
    foreach (medispace_map_tint_palettes() as $filter_id => $palette) {
        [$r, $g, $b] = medispace_map_tint_tables($palette["stops"]);
        // Grey by a red-heavy weighting so OSM's blue water lands darker than the land around it.
        $row = implode(" ", $palette["weights"]) . " 0 0  ";
        $filters .= '<filter id="' . esc_attr($filter_id) . '" color-interpolation-filters="sRGB">'
            . '<feColorMatrix type="matrix" values="' . esc_attr($row . $row . $row . "0 0 0 1 0") . '"/>'
            . '<feComponentTransfer>'
            . '<feFuncR type="table" tableValues="' . esc_attr($r) . '"/>'
            . '<feFuncG type="table" tableValues="' . esc_attr($g) . '"/>'
            . '<feFuncB type="table" tableValues="' . esc_attr($b) . '"/>'
            . "</feComponentTransfer></filter>";
    }
    $svg = '<svg class="medispace-map-tint" width="0" height="0" aria-hidden="true" focusable="false" style="position:absolute">'
        . $filters . "</svg>";

    return $block_content . $svg;
}
add_filter("render_block_medisapce-core/cover-map-block", "medispace_map_tint_render");
