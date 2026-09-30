<?php

class OneMapHelper
{
    public static function lookup($postalCode)
    {
        if ( ! jaithai_outbound_enabled()) {
            throw new RuntimeException('OneMap requests are disabled in this environment.');
        }

        $apiToken = jaithai_env('JAITHAI_ONEMAP_API_TOKEN', '');

        if ($apiToken === '') {
            throw new RuntimeException('OneMap is not configured.');
        }

        $baseUrl = "https://www.onemap.gov.sg/api/common/elastic/search";
        $queryParams = http_build_query([
            'searchVal'      => $postalCode,
            'returnGeom'     => 'N',
            'getAddrDetails' => 'Y',
            'pageNum'        => '1'
        ]);

        $url = "$baseUrl?$queryParams";

        $headers = [
            "Authorization: $apiToken",
            "Accept: */*",
            "Cache-Control: no-cache",
            "Connection: keep-alive",
            "Accept-Encoding: gzip, deflate, br",
            "User-Agent: PHP-cURL/1.0"
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            $error = curl_error($ch);
            curl_close($ch);
            throw new Exception("cURL error occurred: $error");
        }

        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($statusCode !== 200) {
            throw new Exception("API returned status code $statusCode with response: $response");
        }

        $responseData = json_decode($response, true);

        if ( ! isset($responseData[ 'results' ]) || empty($responseData[ 'results' ])) {
            throw new Exception("No results found for postal code {$postalCode}.");
        }

        return $responseData[ 'results' ];
    }
}
