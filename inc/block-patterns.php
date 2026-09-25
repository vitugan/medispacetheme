<?php
/**
 * Medispace Theme: Block Patterns
 *
 * @package Medispace
 */

if (!function_exists("medispace_register_block_patterns")):
    function medispace_register_block_patterns()
    {
        $block_pattern_categories = [
            "medispace-medical" => [
                "label" => __("MediSpace: Medical", "medispace"),
            ],
            "medispace-construction" => [
                "label" => __("MediSpace: Construction", "medispace"),
            ],
        ];

        /**
         * Filters the theme block pattern categories.
         *
         * @param array $block_pattern_categories Array of block pattern categories.
         */
        $block_pattern_categories = apply_filters(
            "medispace_block_pattern_categories",
            $block_pattern_categories,
        );

        foreach (
            $block_pattern_categories
            as $slug => $block_pattern_category
        ) {
            register_block_pattern_category($slug, $block_pattern_category);
        }

        // Auto-discovery: every inc/patterns/<flow>/<slug>.php file is a pattern.
        // There is no manual list to keep in sync anymore — drop a file in and
        // it registers itself on the next request. A file that isn't ready yet
        // (missing title/content) is skipped rather than fataling the site.
        $pattern_files = glob(get_theme_file_path("/inc/patterns/*/*.php"));

        /**
         * Filters the discovered pattern file paths before they're required.
         *
         * @param array $pattern_files Absolute paths to pattern files.
         */
        $pattern_files = apply_filters(
            "medispace_block_pattern_files",
            $pattern_files ?: [],
        );

        foreach ($pattern_files as $pattern_path) {
            // inc/patterns/<flow>/<slug>.php -> registered as medispace/<flow>-<slug>.
            $relative = str_replace(
                get_theme_file_path("/inc/patterns/"),
                "",
                $pattern_path,
            );
            $block_pattern = str_replace(["/", ".php"], ["-", ""], $relative);

            $pattern = require $pattern_path;

            if (
                !is_array($pattern) ||
                empty($pattern["title"]) ||
                empty($pattern["content"])
            ) {
                continue;
            }

            register_block_pattern("medispace/" . $block_pattern, $pattern);
        }
    }
endif;

add_action("init", "medispace_register_block_patterns", 9);
