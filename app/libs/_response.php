<?php
class _response
{

    function success($value, $path)
    {
        return '<div class="alert alert-success mt-5">' . $value . '</div>'
            . header("Refresh:3; url=" . URL . $path);
    }
    function error($value = false, $path)
    {
        return '<div class="alert alert-danger mt-5">' . $value . '</div>'
            . header("Refresh:3; url=" . URL . $path);
    }


    function res($type, $text)
    {


        return '<div class="alert alert-' . $type . ' mt-2 p-3">' . $text . '</div>';
    }

    function redirect($path)
    {


        return  header("Location:" . URL . $path);
    }
}
