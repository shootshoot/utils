function lpu_get_param($__name, $__default = NULL, $__type = 'post') {
    $type = (in_array($__type, array('get', 'globals', 'server', 'cookies', 'post', 'session'))) ? $__type : 'post';
    switch ($type) {
        case 'get':
            $container = &$_GET;
        break;
        case 'post':
            $container = &$_POST;
        break;
        case 'server':
            $container = &$_SERVER;
        break;
        case 'cookies':
            $container = &$_COOKIE;
        break;
        case 'globals':
            $container = &$GLOBALS;
        break;
        case 'session':
            $container = &$_SESSION;
        break;
        default: 
            $container = &$_POST;
        break;
    }
    if (array_key_exists($__name, $container) && $container[$__name] !== NULL && $container[$__name] !== '') {
        return $container[$__name];
    }
    else {
        return $__default;
    }
}

function lpu_set_param($__name, $__value = NULL, $__type = 'post') {
    $type = (in_array($__type, array('get', 'globals', 'server', 'cookies', 'post', 'session'))) ? $__type : 'post';
    switch ($type) {
        case 'get':
            $container = &$_GET;
        break;
        case 'post':
            $container = &$_POST;
        break;
        case 'server':
            $container = &$_SERVER;
        break;
        case 'cookies':
            $container = &$_COOKIE;
        break;
        case 'globals':
            $container = &$GLOBALS;
        break;
        case 'session':
            $container = &$_SESSION;
        break;
        default: 
            $container = &$_POST;
        break;
    }
    return $container[$__name] = $__value;
}
