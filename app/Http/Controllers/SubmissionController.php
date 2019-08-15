<?php

namespace App\Http\Controllers;

use App\Domain;
use App\Endpoint;
use App\Mail\SubmissionNotificationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;

class SubmissionController extends Controller
{
    public function create(Request $request, $endpoint)
    {
        $endpoint = Endpoint::where('key', $endpoint)->first();
        /*
         * Check if endpoint exists and it is valid
         * */
        if (!$endpoint || ($endpoint && !$endpoint->is_active)) {
            return $this->handleFailedSubmission($request);
        }
        /*
         * Check if the referer (domain) is associated with the endpoint,
         * and also that the domain is active.
         * */
        $domain = $endpoint->domains()
            ->where('name', $this->getHostAndScheme($request))
            ->first();
        if(!$domain || ($domain && !$domain->is_active)) {
            return $this->handleFailedSubmission($request);
        }
        /*
         * Handle empty requests i.e requests with no form names
         * */
        if (empty($request->toArray())) {
            return $this->handleEmptyRequest();
        }

        $data = [
            'name' => $request->get('name', ''),
            'email' => $request->get('email', ''),
            'data' => json_encode($request->toArray()),
            'domain_id' => $domain->id,
        ];
        $endpoint->submissions()->create($data);
        $this->notifyEndpointUser($endpoint, $domain, $request->toArray());

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

    protected function handleFailedSubmission(Request $request)
    {
        /*
         * Return a 404 not found error.
         * */
        return Response::view('errors.404', [], 404);
    }

    protected function handleEmptyRequest()
    {
        return [];
    }

    public function notifyEndpointUser(Endpoint $endpoint, Domain $domain, $formData)
    {
        /*
         * Send a mail to the endpoint user, notifying them
         * about the new submission they have.
         * */
        Mail::to($domain->email_primary)
            ->send(new SubmissionNotificationMail(
                $endpoint,
                $domain,
                $formData
            ));
    }
}
