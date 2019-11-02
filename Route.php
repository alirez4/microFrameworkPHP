<?php

class Route
{
    public static function web($url, $request)
    {
        $url = explode("/", $url);

        if (count($url) >= 3) {
            $url = array_slice($url, 1);

            $request->Controller = ucfirst($url[0]);

            $request->Method = $url[1];

            $request->Params = array_slice($url, 2);
        }

    }
}