/**
 * Fonction retournant l'alias d'url propre correspondant à une langue
 */
function urlt($path, $lang = null) {
    global $language;
    if($lang === null) {
        $lang = $language->language;
    }

    $urls = translation_path_get_translations($path);
    if (isset($urls[$language->language])) {
        return url($urls[$lang]);
    }
    return url($path);
}

/**
 * Function to render a block
 * @param string $module (e.g.: views or block)
 * @param string $delta (e.g.: for views module, the delta is #ViewId-#displayName, for block module, the delta is a number 18)
 * @param boolean $render if true, the return value is an html string, if false, the return value is a renderable array
 * @param string|array
 */
function lpu_print_block($module, $delta, $render = false){
    $block = block_load($module, $delta);
    $block_content = _block_render_blocks(array($block));
    $build = _block_get_renderable_array($block_content);
    if(!$render) return $build;
    return drupal_render($build);
}

/**
 * Return value or safe_value of a field
 * If no value, return NULL
 * @param string $entity_type : node, user, taxonomy_term, file
 * @param object $entity : the entity object
 * @param string $field_name: The field name to get value
 * @param string $langcode : the lang_code, default NULL
 * @param integer $index : the key of the item's values, default 0
 * @param boolean $safe_value : return the safe value or the value, default true
 * @param boolean $full : return the entire item, with the format, safe_value and value, default false, override the $safe_value param
 * @use field_get_items()
 * @return mixed value
 */
function _field_get_value($entity_type, $entity, $field_name, $langcode = NULL, $index = 0, $safe_value = true, $full = false) {
    $items = field_get_items($entity_type, $entity, $field_name, $langcode);
    if ($items && count($items) > 0) {
        if (array_key_exists($index, $items)) {
            $item = $items[$index];
            if ($full === true) {
                return $item;
            }
            if ($safe_value === false) {
                return $item['value'];
            }
        }
    }
    return NULL;
}



function lpu_print_node_form($node_type, $node = null, $render = false) {
    module_load_include('inc', 'node', 'node.pages');
    if (!isset($node->nid)) {
        global $user;
        $node = new stdClass();
        $node->uid = $user->uid;
        $node->type = $node_type;
        node_object_prepare($node);
    }
    $form = drupal_get_form($node_type . "_node_form", $node);
    $form['#action'] = url(sprintf('node/add/%s', $node_type));
    if ($render === true) {
        return drupal_render($form);
    }
    else {
        return $form;
    }
}
