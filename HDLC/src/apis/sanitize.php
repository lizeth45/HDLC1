<?php
    function sanitizeValue($unsafeValue) {
        $safeValue = strip_tags($unsafeValue);
        $safeValue = htmlspecialchars($safeValue);
        return $safeValue;
    }
?>