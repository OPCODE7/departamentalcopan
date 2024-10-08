<?php
class Routes
{
    public function Request($view)
    {

        $control = 0;
        if (isset($_GET["view"])) {

            $url = $view;
            $pathview = "app/views/" . $url . ".view.php";

            if (file_exists($pathview)) {
                $response = $pathview;
            } else {
                $request = explode("/", $url);

                $aux = "";
                for ($i = 0; $i < count($request); $i++) {

                    if ($i == 0) {
                        $aux = $request[0];
                    } else {
                        $aux = $aux . "/" . $request[$i];
                    }

                    $view = "app/views/" . $aux . ".view.php";

                    if (file_exists($view)) {
                        $control++;
                        $response = $view;
                    }
                }

                if ($control == 0) {
                    $response = "app/views/404.view.php";
                }
            }
        } else {
            $response = "app/views/home.view.php";
        }
        return $response;
    }
}
