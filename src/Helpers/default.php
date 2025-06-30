<?php


if (!function_exists('clean_request')) {
    function clean_request($rules = [])
    {
        $formData = request()->all();

        foreach ($rules as $key => $value) {

            if (!isset($formData[$key])) {
                continue;
            }

            switch ($value) {
                case "phone":
                    $formData[$key] = str($formData['phone'])->replace(' ', '')->toString();
                    break;
                case "email":
                    $formData[$key] = str($formData['email'])->replace(' ', '')->lower()->toString();
                    break;
            }
        }

        return $formData;
    }
}


if (!function_exists('notification')) {
    function notification($action = null)
    {
        return (new twa\apiutils\Classes\Notification($action));
    }
}
