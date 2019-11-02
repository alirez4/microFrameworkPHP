<?php

namespace Core;

class Controller
{

    /** identify $data and send to sho it
     * @param $data
     * @param $type
     */
    public function show($data)
    {
        if (gettype($data) == "array") {
            if (isset($data['view'])) {
                return [$data, "view"];
            }
            return [$data, "array"];
        } else {
            return [$data, "str"];
        }
    }
}