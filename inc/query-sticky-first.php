<?php
/**
 * Medispace Theme: "sticky first" Query Loops.
 *
 * Core's "Include" sticky mode prepends sticky posts on top of perPage (3 cards + 1 sticky
 * = 4), which breaks fixed grids. A Query Loop whose query has "medispaceStickyFirst": true
 * instead shows sticky posts first and fills the rest with the latest posts, keeping the
 * total at perPage. Meant for non-paginated teasers (e.g. the home "Latest news" section).
 *
 * @package Medispace
 */

add_filter(
    "query_loop_block_query_vars",
    function ($query, $block) {
        if (empty($block->context["query"]["medispaceStickyFirst"])) {
            return $query;
        }

        $per_page = (int) ($query["posts_per_page"] ?? get_option("posts_per_page"));
        $sticky = get_option("sticky_posts");
        $base = array_merge($query, [
            "fields" => "ids",
            "ignore_sticky_posts" => true,
            "no_found_rows" => true,
            "offset" => 0,
        ]);

        $ids = [];
        if ($sticky) {
            $ids = get_posts(array_merge($base, [
                "post__in" => $sticky,
                "posts_per_page" => $per_page,
            ]));
        }

        $remaining = $per_page - count($ids);
        if ($remaining > 0) {
            $ids = array_merge($ids, get_posts(array_merge($base, [
                "post__not_in" => array_merge($query["post__not_in"] ?? [], $ids),
                "posts_per_page" => $remaining,
            ])));
        }

        $query["post__in"] = $ids ?: [0];
        $query["orderby"] = "post__in";
        $query["ignore_sticky_posts"] = true;
        unset($query["offset"]);

        return $query;
    },
    10,
    2,
);
