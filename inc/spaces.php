<?php
/**
 * Medical spaces (the msc_space post type of MediSpace Core).
 *
 * @package Medispace
 */

/**
 * The design calls the spaces archive "Spaces" (breadcrumbs "Home → Spaces"), not core's
 * "Space Archives".
 */
function medispace_spaces_archive_label($labels)
{
    $labels->archives = __("Spaces", "medispace");
    return $labels;
}
add_filter("post_type_labels_msc_space", "medispace_spaces_archive_label", 20);
