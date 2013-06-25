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
