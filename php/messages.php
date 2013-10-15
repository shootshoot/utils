<?php
    function lpu_get_errors() { return lpu_get_messages(); }
    function lpu_get_error($__key, $__default = NULL) { return lpu_get_message($__key, $__default); }
    function lpu_set_error($__key = NULL, $__value = NULL) { return lpu_set_message($__key, $__value); }

    function lpu_get_messages() {
        $errors = lpu_set_error();
        foreach($errors as $key => $value) {
            if ($value === NULL) {
                unset($errors[$key]);
            }
        }
        return $errors;
    }

    function lpu_get_message($__key, $__default = NULL) {
        $errors = lpu_get_errors();
        if (array_key_exists($__key, $errors)) {
            return $errors[$__key];
        }
        else {
            return $__default;
        }
    }

    function lpu_set_message($__key = NULL, $__value = NULL) {
        static $errors;

        if ($errors == null) {
            $errors = array();
        }

        if ($__key == NULL && $__value == NULL) {
            return $errors;
        }

        $errors[$__key] = $__value;

        return $errors;
    }
