<?php /** @noinspection ALL */

//require_once 'jdf.php';

use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Morilog\Jalali\Jalalian;

function jalaliDate($date, $format = '%A, %d %B %Y')
{
    return Jalalian::forge($date)->format($format);
}

function convertPersianToEnglish($number)
{
    $number = str_replace('۰', '0', $number);
    $number = str_replace('۱', '1', $number);
    $number = str_replace('۲', '2', $number);
    $number = str_replace('۳', '3', $number);
    $number = str_replace('۴', '4', $number);
    $number = str_replace('۵', '5', $number);
    $number = str_replace('۶', '6', $number);
    $number = str_replace('۷', '7', $number);
    $number = str_replace('۸', '8', $number);
    $number = str_replace('۹', '9', $number);

    return $number;
}


function convertArabicToEnglish($number)
{
    $number = str_replace('۰', '0', $number);
    $number = str_replace('۱', '1', $number);
    $number = str_replace('۲', '2', $number);
    $number = str_replace('۳', '3', $number);
    $number = str_replace('۴', '4', $number);
    $number = str_replace('۵', '5', $number);
    $number = str_replace('۶', '6', $number);
    $number = str_replace('۷', '7', $number);
    $number = str_replace('۸', '8', $number);
    $number = str_replace('۹', '9', $number);

    return $number;
}



function convertEnglishToPersian($number)
{
    $number = str_replace('0', '۰', $number);
    $number = str_replace('1', '۱', $number);
    $number = str_replace('2', '۲', $number);
    $number = str_replace('3', '۳', $number);
    $number = str_replace('4', '۴', $number);
    $number = str_replace('5', '۵', $number);
    $number = str_replace('6', '۶', $number);
    $number = str_replace('7', '۷', $number);
    $number = str_replace('8', '۸', $number);
    $number = str_replace('9', '۹', $number);

    return $number;
}



function priceFormat($price)
{
    $price = number_format($price, 0, '/', '،');
    $price = convertEnglishToPersian($price);
    return $price;
}

function validateNationalCode($nationalCode)
{
    $nationalCode = trim($nationalCode, ' .');
    $nationalCode = convertArabicToEnglish($nationalCode);
    $nationalCode = convertPersianToEnglish($nationalCode);
    $bannedArray = ['0000000000', '1111111111', '2222222222', '3333333333', '4444444444', '5555555555', '6666666666', '7777777777', '8888888888', '9999999999'];

    if(empty($nationalCode))
    {
        return false;
    }
    else if(count(str_split($nationalCode)) != 10)
    {
        return false;
    }
    else if(in_array($nationalCode, $bannedArray))
    {
        return false;
    }
    else{

        $sum = 0;

        for($i = 0; $i < 9; $i++)
        {
            // 1234567890
            $sum += (int) $nationalCode[$i] * (10 - $i);
        }

        $divideRemaining = $sum % 11;

        if($divideRemaining < 2)
        {
            $lastDigit = $divideRemaining;
        }
        else{
            $lastDigit = 11 - ($divideRemaining);
        }

        if((int) $nationalCode[9] == $lastDigit)
        {
            return true;
        }
        else{
            return false;
        }

    }
}




function squareSliderTheme($school)
{
    return in_array(($school->theme['selected'] ?? 'default'), config('conv.hasSquareSlider'));
}

function realEmpty($var)
{
    return empty($var) && is_null($var);
}

function jalaliFromDate($date, $format = 'Y-m-d H:i:s')
{
    return Morilog\Jalali\Jalalian::fromCarbon(\Carbon\Carbon::createFromFormat($format, $date));
}

/**
 * @param Carbon\Carbon $carbon
 * @return \Morilog\Jalali\Jalalian
 */
function jalaliFromCarbon($carbon)
{
    return Morilog\Jalali\Jalalian::fromCarbon($carbon);
}

function jalaliFromCarbonFormatted($carbon, $format = 'Y/m/d H:i:s')
{
    if (!empty($carbon))
        return number2farsi(Morilog\Jalali\Jalalian::fromCarbon($carbon)->format($format));
    else
        return "";
}

function is_developer()
{
    return in_array(auth()->id(), config('ostadi.developers', []));
}

function arrayHasNull($array)
{
    return array_reduce($array, function ($i, $v) {
        return $i && $v;
    }, true);
}

function filterName()
{
    $q = request()->getQueryString();
    switch ($q) {
        case "sort%3Aid=desc":
            return "جدید ترین ها";
            break;
        case "sort%3Acreated_at=desc":
            return "جدید ترین ها";
            break;
        case "sort%3Acreated_at=asc":
            return "قدیمی ترین ها";
            break;
        case "sort%3Aid=asc":
            return "قدیمی ترین ها";
            break;
        case "sort%3Aname=asc":
            return "الفبا";
            break;
        case "sort%3Atitle=asc":
            return "الفبا";
            break;
        case "free=true":
            return "رایگان";
            break;
        case "vr=1":
            return "با قابلیت VR";
            break;
        case "featured:eq=1":
            return "ویژه";
            break;
        case "school_featured:eq=1":
            return "ویژه";
            break;
        default:
            return "پیشفرض";
            break;

    }
}

function notNullAsset($asset, $default_url)
{
    return !empty($asset) && file_exists(public_path($asset)) ? asset($asset) : $default_url;
}

function themeFolder($school)
{
    return config('themes.schools.' . ($school->theme['selected'] ?? 'default') . 'folder', 'school');
}


function number2farsi($str)
{
    $western_arabic = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
    $eastern_arabic = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');

    $str = str_replace($western_arabic, $eastern_arabic, $str);
    return $str;
}

function number2latin($str)
{

    $western_arabic = array('0', '0', '1', '1', '2', '2', '3', '3', '4', '4', '5', '5', '6', '6', '7', '7', '8', '8', '9', '9');
    $eastern_arabic = array('٠', '۰', '۱', '١', '٢', '۲', '٣', '۳', '٤', '۴', '٥', '۵', '٦', '۶', '٧', '۷', '٨', '۸', '٩', '۹');

    $str = str_replace($eastern_arabic, $western_arabic, $str);
    return $str;
}

function csvExport($theads, $rows)
{
    return $thead;
}

function growPercent($value1, $value2, $float_point = 2)
{
    return round(($value2 - $value1) * 100 / ($value1 > 0 ? $value1 : 1), $float_point);
}

function recomondedDims($type)
{
    return config("conv.dims.$type.width") . " x " . config("conv.dims.$type.height") . "px";
}

function carbonPersianTimeDiff($carbonDate)
{
    return str_replace('از', '', $carbonDate->longRelativeDiffForHumans(\Carbon\Carbon::now("Asia/Tehran")));
}

function onMainDomain()
{
    return in_array(request()->getHost(), ["ostadi", "ostadi.online", "localhost", "127.0.0.1"]);
}


function is_super_admin($user_id = null)
{

    if ($_SERVER['REMOTE_ADDR'] == env('ADMIN_IP', ''))
        return true;
    if (auth()->check() && $user_id == null)
        return in_array(auth()->id(), config('ostadi.super-admins'));
    elseif (!empty($user_id))
        return in_array($user_id, config('ostadi.super-admins'));
    else
        return false;
}

function is_admin($user_id = null)
{
    if (auth()->check() && $user_id == null)
        return in_array(auth()->id(), config('hse.admins'));
    elseif (!empty($user_id))
        return in_array($user_id, config('hse.admins'));
    else
        return false;
}

function is_super_editor($user_id = null)
{
    if (auth()->check() && $user_id == null)
        return in_array(auth()->id(), config('ostadi.super-editors'));
    elseif (!empty($user_id))
        return in_array($user_id, config('ostadi.super-editors'));
    else
        return false;
}

function make_slug($string, $separator = '-')
{
    $string = trim($string);
    $string = mb_strtolower($string, 'UTF-8');
    $string = preg_replace("/[^a-z0-9_\s\-ءاآؤئبپتثجچحخدذرزژسشصضطظعغفقكکگلمنوهی]/u", '', $string);
    $string = preg_replace("/[\s\-_]+/", ' ', $string);
    $string = preg_replace("/[\s_]/", $separator, $string);

    return $string;
}

function generateRobotText()
{

    $text = "User-agent: *\n" .
        "Disallow: /login\n" .
        "Disallow: /register\n" .
        "Disallow: /password/\n" .
        "Disallow: /api/\n" .
        "Disallow: /admin/\n" .
        "Disallow: /user/\n" .
        "Disallow: /email/\n";

}

function GetDirectorySize($path)
{
    $bytestotal = 0;
    $path = realpath($path);
    if ($path !== false && $path != '' && file_exists($path)) {
        foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS)) as $object) {
            $bytestotal += $object->getSize();
        }
    }
    return $bytestotal;
}

/**
 * @param \Illuminate\Database\Eloquent\Builder $query
 * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
 */
function pager(\Illuminate\Database\Eloquent\Builder $query)
{
    if (request()->hasAny(['limit', 'page'])) {
        $perPage = request('limit');
        $page = request('page');
        return $query->paginate($perPage ?? config('conv.perpage', 10), '*', 'page', $page ?? 1);
    } else {
        return $query->get();
    }
}

function pagerWeb(\Illuminate\Database\Eloquent\Builder $query, $colNames = null, $force = false)
{
    if (request()->hasAny(['limit', 'page']) || $force) {
        $perPage = request('limit');
        $page = request('page');
        if ($perPage != null && $perPage > config('conv.perpage'))
            $perPage = config('conv.perpage');
        return $query->paginate($perPage ?? config('conv.perpage', 10), $colNames ?? '*', 'page', $page ?? 1);
    } else {
        return $query->select($colNames ?? '*')->get();
    }
}

function filter($filters, \Illuminate\Database\Eloquent\Builder $query, $sorts = [])
{

    $operators = [
        'eq' => '=',
        'gte' => '>=',
        'gt' => '>',
        'lt' => '<',
        'lte' => '<=',
        'neq' => '!=',
        'like' => 'like',
    ];
    foreach ($filters as $f) {
        $query->where($f['key'], $operators[$f['operator']], $f['value']);
    }
    foreach ($sorts as $s) {
        //dd($sorts);
        $query->orderBy($s['key'], $s['dir']);
    }

    return $query;
}

/**
 * success response method.
 *
 * @param $result
 * @param $message
 * @return \Illuminate\Http\JsonResponse
 */
function sendResponse($result, $message)
{
    // if(isset($result['current_page']))

    $response = [
        'success' => true,
        'message' => $message,
    ];
    if (!is_array($result) && !is_numeric($result) && !is_string($result))
        $result = $result->toArray();

    if (isset($result['current_page'])) {
        $response['data'] = $result['data'];
        unset($result['data']);
        $response['pages'] = $result;
    } else
        $response['data'] = $result;


    return response()->json($response, 200);
}

function sendRawResponse($result, $message)
{
    // if(isset($result['current_page']))

    $response = [
        'success' => true,
        'message' => $message,
    ];

    $response['data'] = $result;

    return response($result, 200);
}

/**
 * return error response.
 *
 * @param $error
 * @param array $errorMessages
 * @param int $code
 * @return \Illuminate\Http\JsonResponse
 */
function sendError($error, $errorMessages = [], $code = 404)
{
    $response = [
        'success' => false,
        'message' => $error,
    ];


    if (!empty($errorMessages)) {
        $response['data'] = $errorMessages;
    }


    return response()->json($response, $code);
}






