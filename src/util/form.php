<?php

function returnFormError($group, $key) {
    if(isset($_SESSION[$group][$key])) {
        
        return $_SESSION[$group][$key];
        
    }   
}

function displayFormError($group, $key) {
    
    echo '<div class="form-error">';
    echo returnFormError($group, $key);
    $_SESSION[$group][$key] = NULL;
    echo '</div>';
}

function setFormError($group, $key, $message) {
    
    $_SESSION[$group][$key] = $message;
}
