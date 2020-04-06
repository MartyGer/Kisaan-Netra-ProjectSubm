<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Preview\Understand\Assistant\Task;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Options;
use Twilio\Stream;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class SampleList extends ListResource {
    /**
     * Construct the SampleList
     *
     * @param Version $version Version that contains the resource
     * @param string $assistantSid The unique ID of the Assistant.
     * @param string $taskSid The unique ID of the Task associated with this Sample.
     */
    public function __construct(Version $version, string $assistantSid, string $taskSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = ['assistantSid' => $assistantSid, 'taskSid' => $taskSid, ];

        $this->uri = '/Assistants/' . \rawurlencode($assistantSid) . '/Tasks/' . \rawurlencode($taskSid) . '/Samples';
    }

    /**
     * Streams SampleInstance records from the API as a generator stream.
     * This operation lazily loads records as efficiently as possible until the
     * limit
     * is reached.
     * The results are returned as a generator, so this operation is memory
     * efficient.
     *
     * @param array|Options $options Optional Arguments
     * @param int $limit Upper limit for the number of records to return. stream()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param mixed $pageSize Number of records to fetch per request, when not set
     *                        will use the default value of 50 records.  If no
     *                        page_size is defined but a limit is defined, stream()
     *                        will attempt to read the limit with the most
     *                        efficient page size, i.e. min(limit, 1000)
     * @return Stream stream of results
     */
    public function stream(array $options = [], int $limit = null, $pageSize = null): Stream {
        $limits = $this->version->readLimits($limit, $pageSize);

        $page = $this->page($options, $limits['pageSize']);

        return $this->version->stream($page, $limits['limit'], $limits['pageLimit']);
    }

    /**
     * Reads SampleInstance records from the API as a list.
     * Unlike stream(), this operation is eager and will load `limit` records into
     * memory before returning.
     *
     * @param array|Options $options Optional Arguments
     * @param int $limit Upper limit for the number of records to return. read()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param mixed $pageSize Number of records to fetch per request, when not set
     *                        will use the default value of 50 records.  If no
     *                        page_size is defined but a limit is defined, read()
     *                        will attempt to read the limit with the most
     *                        efficient page size, i.e. min(limit, 1000)
     * @return SampleInstance[] Array of results
     */
    public function read(array $options = [], int $limit = null, $pageSize = null): array {
        return \iterator_to_array($this->stream($options, $limit, $pageSize), false);
    }

    /**
     * Retrieve a single page of SampleInstance records from the API.
     * Request is executed immediately
     *
     * @param array|Options $options Optional Arguments
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return SamplePage Page of SampleInstance
     */
    public function page(array $options = [], $pageSize = Values::NONE, string $pageToken = Values::NONE, $pageNumber = Values::NONE): SamplePage {
        $options = new Values($options);
        $params = Values::of([
            'Language' => $options['language'],
            'PageToken' => $pageToken,
            'Page' => $pageNumber,
            'PageSize' => $pageSize,
        ]);

        $response = $this->version->page(
            'GET',
            $this->uri,
            $params
        );

        return new SamplePage($this->version, $response, $this->solution);
    }

    /**
     * Retrieve a specific page of SampleInstance records from the API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return SamplePage Page of SampleInstance
     */
    public function getPage(string $targetUrl): SamplePage {
        $response = $this->version->getDomain()->getClient()->request(
            'GET',
            $targetUrl
        );

        return new SamplePage($this->version, $response, $this->solution);
    }

    /**
     * Create a new SampleInstance
     *
     * @param string $language An ISO language-country string of the sample.
     * @param string $taggedText The text example of how end-users may express this
     *                           task. The sample may contain Field tag blocks.
     * @param array|Options $options Optional Arguments
     * @return SampleInstance Newly created SampleInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create(string $language, string $taggedText, array $options = []): SampleInstance {
        $options = new Values($options);

        $data = Values::of([
            'Language' => $language,
            'TaggedText' => $taggedText,
            'SourceChannel' => $options['sourceChannel'],
        ]);

        $payload = $this->version->create(
            'POST',
            $this->uri,
            [],
            $data
        );

        return new SampleInstance(
            $this->version,
            $payload,
            $this->solution['assistantSid'],
            $this->solution['taskSid']
        );
    }

    /**
     * Constructs a SampleContext
     *
     * @param string $sid A 34 character string that uniquely identifies this
     *                    resource.
     */
    public function getContext(string $sid): SampleContext {
        return new SampleContext(
            $this->version,
            $this->solution['assistantSid'],
            $this->solution['taskSid'],
            $sid
        );
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        return '[Twilio.Preview.Understand.SampleList]';
    }
}