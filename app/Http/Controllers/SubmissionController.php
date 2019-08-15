<?php

namespace App\Http\Controllers;

use App\Endpoint;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function create(Request $request, $endpoint)
    {
        $endpoint = Endpoint::where('key', $endpoint)->first();
        /*
         * Check if endpoint exists and it is valid
         * */
        if (!$endpoint || ($endpoint && !$endpoint->is_active)) {
            return 'Endpoint is not available';
        }
        /*
         * Check if the referer (domain) is associated with the endpoint,
         * and also that the domain is active.
         * */
        $domain = $endpoint->domains()
            ->where('name', $this->getHostAndScheme($request))
            ->first();
        if(!$domain || ($domain && !$domain->is_active)) {
            return 'Domain is not address or not active';
        }

        $data = [
            'name' => $request->get('name', ''),
            'email' => $request->get('email', ''),
            'data' => json_encode($request->toArray()),
            'domain_id' => $domain->id,
        ];
        $endpoint->submissions()->create($data);

        return view('submission.success')
            ->with('callbackUrl', $domain->name);
    }

    /**
     * Get the referer scheme and host (the domain).
     *
     * @param Request $request
     * @return string
     */
    protected function getHostAndScheme(Request $request)
    {
        $url = $request->header('referer', null);
        if (!$url || !is_string($url))
            return '';

        $scheme = parse_url($url, PHP_URL_SCHEME);
        $host = parse_url($url, PHP_URL_HOST);

        return $scheme.'://'.$host;
    }
}
