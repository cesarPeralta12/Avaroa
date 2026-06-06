<?php

use App\Models\Category;

use App\Models\Currency;

use App\Models\GeneralSetting;
use App\Models\Language;
use App\Models\Meta;

use App\Models\User;

use Illuminate\Database\Eloquent\HigherOrderBuilderProxy;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;



/**
 * @return HigherOrderBuilderProxy|mixed
 */
function getCurrentLanguageName()
{
    static $language;

    if (!empty($language)) {
        return $language;
    }

    $language = 'esp';

    return $language;
}
// Function to retrieve the default language
function get_default_language()
{
  $language = Language::where('default_language', 'on')->first();
  if ($language) {
    $iso_code = $language->iso_code;
    return $iso_code;
  }

  return 'en';
}

// Function to retrieve all active languages
function appLanguages()
{
  return Language::where('status', 1)->get();
}

// Improved function for selected language with persistence
function selectedLanguage($ln)
{
    $language = Language::where('iso_code', $ln)->first();
    if (!$language) {
        $language = Language::where('default_language', 'on')->first();
        if (!$language) {
            $language = Language::find(1);
        }
        $ln = $language->iso_code;
    }

    session(['local' => $ln]);
    App::setLocale($ln);
    return $language;
}

function adminNotifications()
{
    return \App\Models\Notification::where('user_type', 1)->where('is_seen', 'no')->orderBy('created_at', 'DESC')->paginate(5);
}
function userNotifications()
{
    return DB::table('old_notifications')
    ->where('user_type', 2)     // 2 = instructor
    ->where('is_seen', 'no')
    ->orderByDesc('created_at')
    ->paginate(5);

}
function toastrMessage($type, $message)
{
    Session::flash('toastr_message', [
        'type' => $type,
        'message' => $message
    ]);
}
if (!function_exists('getTimeZone')) {
    function getTimeZone()
    {
        return DateTimeZone::listIdentifiers(
            DateTimeZone::ALL
        );
    }
}
if (!function_exists('str_slug')) {
    /**
     * Generate a URL friendly "slug" from a given string.
     *
     * @param  string  $title
     * @param  string  $separator
     * @param  string  $language
     * @return string
     */
    function str_slug($title, $separator = '-', $language = 'en')
    {
        return Str::slug($title, $separator, $language);
    }
}
if (!function_exists('getMeta')) {
    function getMeta($slug)
    {
        $metaData = [
            'meta_title' => null,
            'meta_description' => null,
            'meta_keyword' => null,
            'og_image' => null,
        ];

        $meta = Meta::where('slug', $slug)->select([
            'meta_title',
            'meta_description',
            'meta_keyword',
            'og_image',
        ])->first();

        if(!is_null($meta)){
                $metaData = $meta->toArray();
        }else{
            $meta = Meta::where('slug', 'default')->select([
                'meta_title',
                'meta_description',
                'meta_keyword',
                'og_image',
            ])->first();

            if(!is_null($meta)){
                $metaData = $meta->toArray();
            }
        }

        $metaData['meta_title'] = $metaData['meta_title'] != NULL ? $metaData['meta_title'] : get_option('app_name');
        $metaData['meta_description'] = $metaData['meta_description'] != NULL ? $metaData['meta_description'] : get_option('app_name');
        $metaData['meta_keyword'] = $metaData['meta_keyword'] != NULL ? $metaData['meta_keyword'] : get_option('app_name');
        $metaData['og_image'] = $metaData['og_image'] != NULL ? getImageFile($metaData['og_image']) : getImageFile(get_option('app_logo'));

        return $metaData;
    }
}
// Status
const STATUS_PENDING = 0;
const STATUS_ACCEPTED = 1;
const STATUS_SUCCESS = 1;
const STATUS_APPROVED = 1;
const STATUS_REJECTED = 2;
const STATUS_HOLD = 3;
const STATUS_SUSPENDED = 4;
const STATUS_DELETED = 5;
const STATUS_UPCOMING_REQUEST = 6;
const STATUS_UPCOMING_APPROVED = 7;

// withdrawal Status
const WITHDRAWAL_STATUS_PENDING = 0;
const WITHDRAWAL_STATUS_COMPLETE = 1;
const WITHDRAWAL_STATUS_REJECTED = 2;
const PAYPAL = 'paypal';
const STRIPE = 'stripe';
const BANK = 'bank';
const MOLLIE = 'mollie';
const COINBASE = 'coinbase';
const INSTAMOJO = 'instamojo';
const PAYSTAC = 'paystack';
const SSLCOMMERZ = 'sslcommerz';
const MERCADOPAGO = 'mercadopago';
const FLUTTERWAVE = 'flutterwave';
const ZITOPAY = 'zitopay';
const IYZIPAY = 'iyzipay';
const BITPAY = 'bitpay';
const BRAINTREE = 'braintree';

function get_currency_symbol()
{
    $currency = Currency::where('current_currency', 'on')->first();
    if ($currency) {
        $symbol = $currency->symbol;
        return $symbol;
    }

    return '';
}
if (!function_exists('updateEnv')) {
    function updateEnv($values)
    {
        if (count($values) > 0) {
            foreach ($values as $envKey => $envValue) {
                setEnvironmentValue($envKey,$envValue);
            }
            return true;
        }
    }
}
function setEnvironmentValue($envKey, $envValue)
{
    try {
        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);
        $str .= "\n"; // In case the searched variable is in the last line without \n
        $keyPosition = strpos($str, "{$envKey}=");
        if($keyPosition) {
            if (PHP_OS_FAMILY === 'Windows') {
                $endOfLinePosition = strpos($str, "\n", $keyPosition);
            } else {
                $endOfLinePosition = strpos($str, PHP_EOL, $keyPosition);
            }
            $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);
            $envValue = str_replace(chr(92), "\\\\", $envValue);
            $envValue = str_replace('"', '\"', $envValue);
            $newLine = "{$envKey}=\"{$envValue}\"";
            if ($oldLine != $newLine) {
                $str = str_replace($oldLine, $newLine, $str);
                $str = substr($str, 0, -1);
                $fp = fopen($envFile, 'w');
                fwrite($fp, $str);
                fclose($fp);
            }
        }else if(strtoupper($envKey) == $envKey){
            $envValue = str_replace(chr(92), "\\\\", $envValue);
            $envValue = str_replace('"', '\"', $envValue);
            $newLine = "{$envKey}=\"{$envValue}\"\n";
            $str .= $newLine;
            $str = substr($str, 0, -1);
            $fp = fopen($envFile, 'w');
            fwrite($fp, $str);
            fclose($fp);
        }
        return true;
    }catch (\Exception $e){
        return false;
    }


}
function getPaymentMethodName($input = null)
{
    $output = [
        PAYPAL => 'paypal',
        STRIPE => 'stripe',
        BANK => 'bank',
        MOLLIE => 'mollie',
        INSTAMOJO => 'instamojo',
        PAYSTAC => 'paystack',
        SSLCOMMERZ => 'sslcommerz',
        MERCADOPAGO => 'mercadopago',
        FLUTTERWAVE => 'flutterwave',
        COINBASE => 'coinbase',
        ZITOPAY => 'zitopay',
        IYZIPAY => 'iyzipay',
        BITPAY => 'bitpay',
        BRAINTREE => 'braintree',
    ];
    if (is_null($input)) {
        return $output;
    } else {
        return $output[$input] ?? '';
    }
}

function getPaymentMethodNameForApi($input = null)
{
    $output = [
        PAYPAL => 'Paypal',
        STRIPE => 'Stripe',
        BANK => 'Bank',
        MOLLIE => 'Mollie',
        INSTAMOJO => 'Instamojo',
        PAYSTAC => 'Paystack',
        SSLCOMMERZ => 'Sslcommerz',
        MERCADOPAGO => 'Mercadopago',
        FLUTTERWAVE => 'Flutterwave',
        COINBASE => 'Coinbase',
        ZITOPAY => 'Zitopay',
        IYZIPAY => 'Iyzipay',
        BITPAY => 'Bitpay',
        BRAINTREE => 'Braintree',
    ];
    if (is_null($input)) {
        return $output;
    } else {
        return $output[$input] ?? '';
    }
}

function getPaymentMethodId($input = null)
{
    $output = [
        'paypal' => PAYPAL,
        'stripe' => STRIPE,
        'bank' => BANK,
        'mollie' => MOLLIE,
        'instamojo' => INSTAMOJO,
        'paystack' => PAYSTAC,
        'sslcommerz' => SSLCOMMERZ,
        'mercadopago' => MERCADOPAGO,
        'flutterwave' => FLUTTERWAVE,
        'coinbase' => COINBASE,
        'zitopay' => ZITOPAY,
        'iyzipay' => IYZIPAY,
        'bitpay' => BITPAY,
        'braintree' => BRAINTREE,
    ];
    if (is_null($input)) {
        return $output;
    } else {
        return $output[$input] ?? '';
    }
}
function getCurrency($input = null)
{
    $output = array (
        "AFA" => "Afghan Afghani(؋)",
        "ALL" => "Albanian Lek(Lek)",
        "DZD" => "Algerian Dinar(دج)",
        "AOA" => "Angolan Kwanza(Kz)",
        "ARS" => "Argentine Peso($)",
        "AMD" => "Armenian Dram(֏)",
        "AWG" => "Aruban Florin(ƒ)",
        "AUD" => "Australian Dollar($)",
        "AZN" => "Azerbaijani Manat(m)",
        "BSD" => "Bahamian Dollar(B$)",
        "BHD" => "Bahraini Dinar(.د.ب)",
        "BDT" => "Bangladeshi Taka(৳)",
        "BBD" => "Barbadian Dollar(Bds$)",
        "BYR" => "Belarusian Ruble(Br)",
        "BEF" => "Belgian Franc(fr)",
        "BZD" => "Belize Dollar($)",
        "BMD" => "Bermudan Dollar($)",
        "BTN" => "Bhutanese Ngultrum(Nu.)",
        "BTC" => "Bitcoin(฿)",
        "BOB" => "Bolivian Boliviano(Bs.)",
        "BAM" => "Bosnia(KM)",
        "BWP" => "Botswanan Pula(P)",
        "BRL" => "Brazilian Real(R$)",
        "GBP" => "British Pound Sterling(£)",
        "BND" => "Brunei Dollar(B$)",
        "BGN" => "Bulgarian Lev(Лв.)",
        "BIF" => "Burundian Franc(FBu)",
        "KHR" => "Cambodian Riel(KHR)",
        "CAD" => "Canadian Dollar($)",
        "CVE" => "Cape Verdean Escudo($)",
        "KYD" => "Cayman Islands Dollar($)",
        "XOF" => "CFA Franc BCEAO(CFA)",
        "XAF" => "CFA Franc BEAC(FCFA)",
        "XPF" => "CFP Franc(₣)",
        "CLP" => "Chilean Peso($)",
        "CNY" => "Chinese Yuan(¥)",
        "COP" => "Colombian Peso($)",
        "KMF" => "Comorian Franc(CF)",
        "CDF" => "Congolese Franc(FC)",
        "CRC" => "Costa Rican ColÃ³n(₡)",
        "HRK" => "Croatian Kuna(kn)",
        "CUC" => "Cuban Convertible Peso($, CUC)",
        "CZK" => "Czech Republic Koruna(Kč)",
        "DKK" => "Danish Krone(Kr.)",
        "DJF" => "Djiboutian Franc(Fdj)",
        "DOP" => "Dominican Peso($)",
        "XCD" => "East Caribbean Dollar($)",
        "EGP" => "Egyptian Pound(ج.م)",
        "ERN" => "Eritrean Nakfa(Nfk)",
        "EEK" => "Estonian Kroon(kr)",
        "ETB" => "Ethiopian Birr(Nkf)",
        "EUR" => "Euro(€)",
        "FKP" => "Falkland Islands Pound(£)",
        "FJD" => "Fijian Dollar(FJ$)",
        "GMD" => "Gambian Dalasi(D)",
        "GEL" => "Georgian Lari(ლ)",
        "DEM" => "German Mark(DM)",
        "GHS" => "Ghanaian Cedi(GH₵)",
        "GIP" => "Gibraltar Pound(£)",
        "GRD" => "Greek Drachma(₯, Δρχ, Δρ)",
        "GTQ" => "Guatemalan Quetzal(Q)",
        "GNF" => "Guinean Franc(FG)",
        "GYD" => "Guyanaese Dollar($)",
        "HTG" => "Haitian Gourde(G)",
        "HNL" => "Honduran Lempira(L)",
        "HKD" => "Hong Kong Dollar($)",
        "HUF" => "Hungarian Forint(Ft)",
        "ISK" => "Icelandic KrÃ³na(kr)",
        "INR" => "Indian Rupee(₹)",
        "IDR" => "Indonesian Rupiah(Rp)",
        "IRR" => "Iranian Rial(﷼)",
        "IQD" => "Iraqi Dinar(د.ع)",
        "ILS" => "Israeli New Sheqel(₪)",
        "ITL" => "Italian Lira(L,£)",
        "JMD" => "Jamaican Dollar(J$)",
        "JPY" => "Japanese Yen(¥)",
        "JOD" => "Jordanian Dinar(ا.د)",
        "KZT" => "Kazakhstani Tenge(лв)",
        "KES" => "Kenyan Shilling(KSh)",
        "KWD" => "Kuwaiti Dinar(ك.د)",
        "KGS" => "Kyrgystani Som(лв)",
        "LAK" => "Laotian Kip(₭)",
        "LVL" => "Latvian Lats(Ls)",
        "LBP" => "Lebanese Pound(£)",
        "LSL" => "Lesotho Loti(L)",
        "LRD" => "Liberian Dollar($)",
        "LYD" => "Libyan Dinar(د.ل)",
        "LTL" => "Lithuanian Litas(Lt)",
        "MOP" => "Macanese Pataca($)",
        "MKD" => "Macedonian Denar(ден)",
        "MGA" => "Malagasy Ariary(Ar)",
        "MWK" => "Malawian Kwacha(MK)",
        "MYR" => "Malaysian Ringgit(RM)",
        "MVR" => "Maldivian Rufiyaa(Rf)",
        "MRO" => "Mauritanian Ouguiya(MRU)",
        "MUR" => "Mauritian Rupee(₨)",
        "MXN" => "Mexican Peso($)",
        "MDL" => "Moldovan Leu(L)",
        "MNT" => "Mongolian Tugrik(₮)",
        "MAD" => "Moroccan Dirham(MAD)",
        "MZM" => "Mozambican Metical(MT)",
        "MMK" => "Myanmar Kyat(K)",
        "NAD" => "Namibian Dollar($)",
        "NPR" => "Nepalese Rupee(₨)",
        "ANG" => "Netherlands Antillean Guilder(ƒ)",
        "TWD" => "New Taiwan Dollar($)",
        "NZD" => "New Zealand Dollar($)",
        "NIO" => "Nicaraguan CÃ³rdoba(C$)",
        "NGN" => "Nigerian Naira(₦)",
        "KPW" => "North Korean Won(₩)",
        "NOK" => "Norwegian Krone(kr)",
        "OMR" => "Omani Rial(.ع.ر)",
        "PKR" => "Pakistani Rupee(₨)",
        "PAB" => "Panamanian Balboa(B/.)",
        "PGK" => "Papua New Guinean Kina(K)",
        "PYG" => "Paraguayan Guarani(₲)",
        "PEN" => "Peruvian Nuevo Sol(S/.)",
        "PHP" => "Philippine Peso(₱)",
        "PLN" => "Polish Zloty(zł)",
        "QAR" => "Qatari Rial(ق.ر)",
        "RON" => "Romanian Leu(lei)",
        "RUB" => "Russian Ruble(₽)",
        "RWF" => "Rwandan Franc(FRw)",
        "SVC" => "Salvadoran ColÃ³n(₡)",
        "WST" => "Samoan Tala(SAT)",
        "SAR" => "Saudi Riyal(﷼)",
        "RSD" => "Serbian Dinar(din)",
        "SCR" => "Seychellois Rupee(SRe)",
        "SLL" => "Sierra Leonean Leone(Le)",
        "SGD" => "Singapore Dollar($)",
        "SKK" => "Slovak Koruna(Sk)",
        "SBD" => "Solomon Islands Dollar(Si$)",
        "SOS" => "Somali Shilling(Sh.so.)",
        "ZAR" => "South African Rand(R)",
        "KRW" => "South Korean Won(₩)",
        "XDR" => "Special Drawing Rights(SDR)",
        "LKR" => "Sri Lankan Rupee(Rs)",
        "SHP" => "St. Helena Pound(£)",
        "SDG" => "Sudanese Pound(.س.ج)",
        "SRD" => "Surinamese Dollar($)",
        "SZL" => "Swazi Lilangeni(E)",
        "SEK" => "Swedish Krona(kr)",
        "CHF" => "Swiss Franc(CHf)",
        "SYP" => "Syrian Pound(LS)",
        "STD" => "São Tomé and Príncipe Dobra(Db)",
        "TJS" => "Tajikistani Somoni(SM)",
        "TZS" => "Tanzanian Shilling(TSh)",
        "THB" => "Thai Baht(฿)",
        "TOP" => "Tongan pa'anga($)",
        "TTD" => "Trinidad & Tobago Dollar($)",
        "TND" => "Tunisian Dinar(ت.د)",
        "TRY" => "Turkish Lira(₺)",
        "TMT" => "Turkmenistani Manat(T)",
        "UGX" => "Ugandan Shilling(USh)",
        "UAH" => "Ukrainian Hryvnia(₴)",
        "AED" => "United Arab Emirates Dirham(إ.د)",
        "UYU" => "Uruguayan Peso($)",
        "USD" => "US Dollar($)",
        "UZS" => "Uzbekistan Som(лв)",
        "VUV" => "Vanuatu Vatu(VT)",
        "VEF" => "Venezuelan BolÃvar(Bs)",
        "VND" => "Vietnamese Dong(₫)",
        "YER" => "Yemeni Rial(﷼)",
        "ZMK" => "Zambian Kwacha(ZK)"
    );
    if (is_null($input)) {
        return $output;
    } else {
        return $output[$input] ?? '';
    }
}

function getPaymentMethodConversionRate($input = null)
{
    $output = [
        PAYPAL => 'paypal',
        STRIPE => 'stripe',
        BANK => 'bank',
        MOLLIE => 'mollie',
        INSTAMOJO => 'instamojo',
        PAYSTAC => 'paystack',
        SSLCOMMERZ => 'sslcommerz',
        MERCADOPAGO => 'mercadopago',
        FLUTTERWAVE => 'flutterwave',
        COINBASE => 'coinbase',
        ZITOPAY => 'zitopay',
        IYZIPAY => 'iyzipay',
        BITPAY => 'bitpay',
        BRAINTREE => 'braintree',
    ];
    if (is_null($input)) {
        return $output;
    } else {
        return $output[$input] ?? '';
    }
}
function get_option($option_key, $default = NULL)
{

    $system_settings = config('settings');

    if ($system_settings && isset($system_settings[$option_key])) {
        return $system_settings[$option_key];
    } elseif ($system_settings && isset($system_settings[strtolower($option_key)])) {
        return $system_settings[strtolower($option_key)];
    } elseif ($system_settings && isset($system_settings[strtoupper($option_key)])) {
        return $system_settings[strtoupper($option_key)];
    } else {
        return $default;
    }
}

function getCategory()
{
    $category = Category::orderby('id', 'desc')->take(6)->get();
    return $category;
}
function unique_slug($title = '', $model = 'Campaign')
{
    $slug = str_slug($title);
    //get unique slug...
    $nSlug = $slug;
    $i = 0;

    $model = str_replace(' ', '', "\App\Models\ " . $model);
    while (($model::whereSlug($nSlug)->count()) > 0) {
        $i++;
        $nSlug = $slug . '-' . $i;
    }
    if ($i > 0) {
        $newSlug = substr($nSlug, 0, strlen($slug)) . '-' . $i;
    } else {
        $newSlug = $slug;
    }

    return $newSlug;
}
/**
 * @return User
 */
function getLoggedInUser()
{
    $user_session = User::where('id', Session::get('LoggedIn'))->first();
    return $user_session;
}
if (!function_exists('getSlug')) {
    function getSlug($text)
    {
        if ($text) {
            $data = preg_replace("/[~`{}.'\"\!\@\#\$\%\^\&\*\(\)\_\=\+\/\?\>\<\,\[\]\:\;\|\\\]/", "", $text);
            $slug = preg_replace("/[\/_|+ -]+/", "-", $data);
            return $slug;
        }
        return '';
    }
}


function isValidURL($url)
{
    return filter_var($url, FILTER_VALIDATE_URL);
}

function getDefaultAvatar()
{
    return asset('assets/images/avatar.png');
}

/**
 * return random color.
 *
 * @param  int  $userId
 * @return string
 */
function getRandomColor($userId)
{
    $colors = ['329af0', 'fc6369', 'ffaa2e', '42c9af', '7d68f0'];
    $index = $userId % 5;

    return $colors[$index];
}

/**
 * return avatar url.
 *
 * @return string
 */
function getAvatarUrl()
{
    return 'https://ui-avatars.com/api/';
}

/**
 * return avatar full url.
 *
 * @param  int  $userId
 * @param  string  $name
 * @return string
 */
function getUserImageInitial($userId, $name)
{
    return getAvatarUrl() . "?name=$name&size=100&rounded=true&color=fff&background=" . getRandomColor($userId);
}


function getApplicationsettings()
{
    $general_setting = GeneralSetting::find('1');
    return $general_setting;
}
function getImageFile($file)
{
    if ($file != '') {
        return asset($file);
    } else {
        return asset('frontend/assets/img/no-image.png');
    }
}
