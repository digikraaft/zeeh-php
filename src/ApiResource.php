<?php

namespace Digikraaft\Zeeh;


class ApiResource
{
    const OBJECT_NAME = null;

    use ApiOperations\Request;


    public static function baseUrl(): string
    {
        return Zeeh::$apiBaseUrl;
    }

    public static function classUrl(): string
    {
        $url = static::OBJECT_NAME;
        return  $url? "{$url}/" : '';
    }

    public static function endPointUrl(string $slug, bool $hasPublicKey = true): string
    {
        $slug = Util\Util::utf8($slug);
        $base = static::classUrl();

        return $hasPublicKey ? "{$base}{$slug}/". Zeeh::getPublicKey() : "{$base}{$slug}";
    }

    public static function buildQueryString(string $slug, array $params = null): string
    {
        $url = self::endPointUrl($slug);
        if (! empty($params)) {
            $url .= '?'.http_build_query($params);
        }

        return $url;
    }

    public static function resourceUrl(string $id): string
    {
        $id = Util\Util::utf8($id);
        $base = static::classUrl();
        $extn = urlencode($id);

        return "{$base}{$extn}/". Zeeh::getPublicKey();
    }
}
