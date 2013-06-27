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

/**
 * @author  Thierry Poinot - Les Poilus <t@lespoilus.net>
 * Simplify sending mails
 *
 * @param string|array $_to must be a string or an array of string formatted like : "Name <email@domain.com>"
 * @param string $_subject A string containing the mail subject
 * @param string|array $_message A string, or an array of string
 *        if array, elements' array will be join with a new line
 * @param string $_from a string formatted like : "Name <email@domain.com>"
 * @param string|array $_cc see $_to param
 * @param string|array $_bcc see $_to param
 *
 * Example :
 * <code>
 * _mail(
 *     // TO
 *     array(
 *         'FirstName LastName <user@domain.tld>',
 *     ),
 *     // Subject
 *     "Mail subject example",
 *     // Message
 *     array(
 *         "Mail example",
 *         "", // empty line
 *         "Hello word,",
 *         "This is a simple mail example.",
 *         "",
 *         "Regards,",
 *     ),
 *     // From
 *     sprintf('%s <%s>', "My Name",  "<my@email.com>")
 * );
 * </code>
 */
function _mail($_to, $_subject, $_message, $_from, $_cc = array(), $_bcc = array(), $_headers = array())  {
    $to = is_array($_to) ? implode(', ', $_to) : $to;
    $subject = $_subject;
    $message = is_array($_message) ? implode("\r\n", $_message) : $_message;
    $from = is_array($_from) ? implode(", ", $_from) : $_from;
    $cc = is_array($_cc) ? implode(", ", $_cc) : $_cc;
    $bcc = is_array($_bcc) ? implode(", ", $_bcc) : $_bcc;

    $headers = array();
    if (strlen($from) > 0) {
        $headers[] = sprintf('From: %s', $from);
    }
    if (strlen($cc) > 0) {
        $headers[] = sprintf('Cc: %s', $cc);
    }
    if (strlen($bcc) > 0) {
        $headers[] = sprintf('Bcc: %s', $bcc);
    }
    $headers = array_merge($_headers, $headers);


    return mail($to, $subject, $message, implode("\r\n", $headers));
}
