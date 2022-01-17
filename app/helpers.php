<?php

use App\Exceptions\ActionFailedException;
use App\Exceptions\ICustomException;
use App\Models\TransportCommand;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

//use App\Content;
//use App\Notification;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

if (!function_exists('actionWrapper')) {

    /**
     * @param callable $callback
     * @return \Illuminate\Http\JsonResponse
     */
    function actionWrapper(callable $callback)
    {
        DB::beginTransaction();
        try {
            $ret = $callback();
            DB::commit();
            return $ret;
        } catch (ICustomException $e) {
//            if (!app()->environment('production')) {
//                dd($e);
//            }
            DB::rollback();
            throw $e;
//            throw new ActionFailedException($e->getMessage());
//        return response()->json(['error' => $e->getMessage()], 500);
        } catch (Throwable $e) {
//            if (!app()->environment('production')) {
//                dd($e);
//            }
            DB::rollback();
            throw new ActionFailedException($e->getMessage());
//        return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}


if (!function_exists('deleteEmptyFolders')) {
    /**
     * @param $topPath
     * @return bool
     */
    function deleteEmptyFolders($topPath)
    {
        foreach (array_reverse(explode('/', $topPath)) as $part) {

            //TODO: funkcia pracuje zatial iba pre myDisk disk
//            dump($topPath,File::glob(storage_path() . "/app/uploads/" . $topPath . "/*"),File::exists(storage_path('app/uploads/'.$topPath)));
            if (!empty(File::glob(storage_path() . "/app/uploads/" . $topPath . "/*"))) {
                return true;
            }

            if (!File::exists(storage_path('app/uploads/' . $topPath)) || !File::deleteDirectory(storage_path('app/uploads/' . $topPath))) {
                return false;
            }

            $topPath = substr($topPath, 0, -(strlen($part) + 1));
        }

        return true;
    }
}

if (!function_exists('generateTopPath')) {
    //TODO: nefunguje generovanie
    /**
     * @param $path
     * @return false|string
     */
    function generateTopPath($path)
    {
        $fileNameArray = explode('/', $path);
        return str_replace("/" . end($fileNameArray), "", $path);
    }
}
//if (!function_exists('sendNotification')) {
//
//    /**
//     * @param String $header
//     * @param String $text
//     * @param String $type
//     * @param int|String $for
//     * @return false
//     */
//    function sendNotification($header, $text, $type, $for = "")
//    {
//        if (!in_array($type, ["order", "files"])) {
//            return false;
//        }
//        $notification = Notification::create(['type' => $type]);
//        $cont = new Content();
//        $cont->header = $header;
//        $cont->main_text = $text;
//        if (!$notification->content()->save($cont)) {
//            abort(500);
//        }
//        if (is_numeric($for)) {
//            //Posielam konkrétnemu uživateľovi
//            $affectedUsers = [User::find($for)];
//        } else if (strlen($for) > 0) {
//            //Posielam uživateľom s určitou permisiou
//            $affectedUsers = User::whereHas('permission', $for)->get();
//            //TODO: skús, či funguje where
//        } else {
//            // posielam všetkým
//            $affectedUsers = User::all();
//        }
//        $affectedUsers = $affectedUsers->filter(function ($item) {
//            //Sám sebe nechcem posielať notifikácie
//            return $item->id != auth()->user()->id;
//            //TODO: skús
//        });
//
//        foreach ($affectedUsers as $user) {
//            $user->NotificationsCustom()->attach($notification);
//        }
//
//    }
//}

if (!function_exists('replaceAccents')) {
    function replaceAccents($str)
    {
        $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ', 'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ');
        $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o');
        return str_replace($a, $b, $str);
    }
}

if (!function_exists('checkActionAllowed')) {
    /**
     * @param string $action
     * @param array $params
     * @return string|null
     */
    function checkActionAllowed($action, $params)
    {
        return Gate::inspect($action, $params)->message();
    }
}


if (!function_exists('substrInArray')) {
    /**
     * @param string $action
     * @param array<string> $params
     * @return bool
     */
    function substrInArray(string $haystack, array $needles)
    {
        foreach ($needles as $substr) {
            if (strpos($haystack, $substr) !== false) {
                return true;
            }
        }
        return false;
    }
}



