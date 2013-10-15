
/**
 * 
 * @param  [type] $__name          [description]
 * @param  [type] $__default       [description]
 * @param  string $__whereToSearch GET|POST|SERVER
 * @return [type]                  [description]
 */
function _get_global($__name, $__default = null, $__whereToSearch = null) {
    $globalsVar = array(
        'post' => $_POST,
        'get' => $_GET,
        'server' => $_SERVER,
    );
    if ($__whereToSearch == null) {

        foreach ($globalsVar as $search) {
            if (is_array($search)) {
                if (array_key_exists($__name, $search)) {
                    return $search[$__name];
                }
            }
        }
    }
    else {
        switch($__whereToSearch) {
            case 'GET':
            case 'get':
            case 'g':
                $search = $globalsVar['get'];
                break;
            case 'POST':
            case 'post':
            case 'p':
                $search = $globalsVar['post'];
                break;
            case 'SERVER':
            case 'server':
            case 's':
                $search = $globalsVar['server'];
                break;
        }
        if (is_array($search)) {
            if (array_key_exists($__name, $search)) {
                return $search[$__name];
            }
        }
    }
    
    return $__default;
}


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
