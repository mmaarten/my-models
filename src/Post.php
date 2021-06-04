<?php

namespace My\Models;

class Post
{
    private $post = null;

    public function __construct($post = null)
    {
        $this->post = get_post($post);
    }

    public function __get($key)
    {
        if (property_exists($this->post, $key)) {
            return $this->post->$key;
        }

        return null;
    }

    public function __set($key, $value)
    {
        if (property_exists($this->post, $key)) {
            $this->post->$key = $value;
        }
    }

    public function getMeta($key = '', $single = false)
    {
        return get_post_meta($this->ID, $key, $single);
    }

    public function addMeta($meta_key, $meta_value, $unique = false)
    {
        return add_post_meta($this->ID, $meta_key, $meta_value, $unique);
    }

    public function updateMeta($meta_key, $meta_value, $prev_value = '')
    {
        return update_post_meta($this->ID, $meta_key, $meta_value, $prev_value);
    }

    public function deleteMeta($meta_key, $meta_value)
    {
        return delete_post_meta($this->ID, $meta_key, $meta_value);
    }

    public function hasMeta($meta_key)
    {
        return metadata_exists('post', $this->ID, $meta_key);
    }

    public function getThumbnailID()
    {
        return get_post_thumbnail_id($this->ID);
    }

    public function getThumbnail($size = 'post-thumbnail', $attr = '')
    {
        return get_the_post_thumbnail($this->ID, $size, $attr);
    }

    public function getThumbnailURL($size = 'post-thumbnail')
    {
        return get_the_post_thumbnail_url($this->ID, $size);
    }

    public function hasThumbnail()
    {
        return has_post_thumbnail($this->ID);
    }

    public function getTerms($taxonomies, $args = [])
    {
        return wp_get_object_terms($this->ID, $taxonomies, $args);
    }

    public function setTerms($terms, $taxonomy, $append = false)
    {
        return wp_set_object_terms($this->ID, $terms, $taxonomy, $append);
    }

    public function hasTerm($term = '', $taxonomy = '')
    {
        return has_term($term, $taxonomy, $this->ID);
    }

    public function theTerms($taxonomy, $before = '', $sep = ', ', $after = '')
    {
        return the_terms($this->ID, $taxonomy, $before, $sep, $after);
    }

    public function getTheTermList($taxonomy, $before = '', $sep = '', $after = '')
    {
        return get_the_term_list($this->ID, $taxonomy, $before, $sep, $after);
    }

    public function getField($selector, $format_value = true)
    {
        if (function_exists('get_field')) {
            return get_field($selector, $this->ID, $format_value);
        }

        return null;
    }

    public function updateField($selector, $value)
    {
        if (function_exists('update_field')) {
            return update_field($selector, $value, $this->ID);
        }

        return false;
    }

    public function deleteField($selector)
    {
        if (function_exists('delete_field')) {
            return delete_field($selector, $this->ID);
        }

        return false;
    }
}
