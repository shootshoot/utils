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

function lpu_print_block($module, $delta, $render = false){
    $block = block_load($module, $delta);
    $block_content = _block_render_blocks(array($block));
    $build = _block_get_renderable_array($block_content);
    if(!$render) return $build;
    return drupal_render($build);
}
