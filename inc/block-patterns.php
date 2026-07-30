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

        $block_patterns = [
            // Flow 3 — Medical Coworking.
            "medical/hero",

            // Flow 2 — Construction. Додавати рядок сюди тільки коли
            // відповідний файл вже реально існує в inc/patterns/construction/.
            "construction/hero",
        ];

        /**
         * Filters the theme block patterns.
         *
         * @param array $block_patterns List of block patterns by name (folder/file, без .php).
         */
        $block_patterns = apply_filters(
            "medispace_block_patterns",
            $block_patterns,
        );

        foreach ($block_patterns as $block_pattern) {
            $pattern_path = get_theme_file_path(
                "/inc/patterns/" . $block_pattern . ".php",
            );

            // Захист на час розробки: якщо файл паттерна ще не створений —
            // пропускаємо його, а не валимо весь сайт фатальною помилкою.
            if (!file_exists($pattern_path)) {
                continue;
            }

            register_block_pattern(
                "medispace/" . str_replace("/", "-", $block_pattern),
                require $pattern_path,
            );
        }
    }
endif;

add_action("init", "medispace_register_block_patterns", 9);
