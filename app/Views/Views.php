<?php

namespace app\Views;

class Views
{
    public static function render($file_name)
    {

        get_template_part('app/Views/Part/'. $file_name);

    }
    public static function render_admin($file_name)
    {

        get_template_part('app/Views/admin/'. $file_name);


    }
}