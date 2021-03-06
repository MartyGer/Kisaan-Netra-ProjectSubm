<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Conversations\V1;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
abstract class ConversationOptions {
    /**
     * @param string $friendlyName The human-readable name of this conversation.
     * @param \DateTime $dateCreated The date that this resource was created.
     * @param \DateTime $dateUpdated The date that this resource was last updated.
     * @param string $messagingServiceSid The unique id of the SMS Service this
     *                                    conversation belongs to.
     * @param string $attributes An optional string metadata field you can use to
     *                           store any data you wish.
     * @return CreateConversationOptions Options builder
     */
    public static function create(string $friendlyName = Values::NONE, \DateTime $dateCreated = Values::NONE, \DateTime $dateUpdated = Values::NONE, string $messagingServiceSid = Values::NONE, string $attributes = Values::NONE): CreateConversationOptions {
        return new CreateConversationOptions($friendlyName, $dateCreated, $dateUpdated, $messagingServiceSid, $attributes);
    }

    /**
     * @param string $friendlyName The human-readable name of this conversation.
     * @param \DateTime $dateCreated The date that this resource was created.
     * @param \DateTime $dateUpdated The date that this resource was last updated.
     * @param string $attributes An optional string metadata field you can use to
     *                           store any data you wish.
     * @param string $messagingServiceSid The unique id of the SMS Service this
     *                                    conversation belongs to.
     * @return UpdateConversationOptions Options builder
     */
    public static function update(string $friendlyName = Values::NONE, \DateTime $dateCreated = Values::NONE, \DateTime $dateUpdated = Values::NONE, string $attributes = Values::NONE, string $messagingServiceSid = Values::NONE): UpdateConversationOptions {
        return new UpdateConversationOptions($friendlyName, $dateCreated, $dateUpdated, $attributes, $messagingServiceSid);
    }
}

class CreateConversationOptions extends Options {
    /**
     * @param string $friendlyName The human-readable name of this conversation.
     * @param \DateTime $dateCreated The date that this resource was created.
     * @param \DateTime $dateUpdated The date that this resource was last updated.
     * @param string $messagingServiceSid The unique id of the SMS Service this
     *                                    conversation belongs to.
     * @param string $attributes An optional string metadata field you can use to
     *                           store any data you wish.
     */
    public function __construct(string $friendlyName = Values::NONE, \DateTime $dateCreated = Values::NONE, \DateTime $dateUpdated = Values::NONE, string $messagingServiceSid = Values::NONE, string $attributes = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['dateCreated'] = $dateCreated;
        $this->options['dateUpdated'] = $dateUpdated;
        $this->options['messagingServiceSid'] = $messagingServiceSid;
        $this->options['attributes'] = $attributes;
    }

    /**
     * The human-readable name of this conversation, limited to 256 characters. Optional.
     *
     * @param string $friendlyName The human-readable name of this conversation.
     * @return $this Fluent Builder
     */
    public function setFriendlyName(string $friendlyName): self {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * The date that this resource was created.
     *
     * @param \DateTime $dateCreated The date that this resource was created.
     * @return $this Fluent Builder
     */
    public function setDateCreated(\DateTime $dateCreated): self {
        $this->options['dateCreated'] = $dateCreated;
        return $this;
    }

    /**
     * The date that this resource was last updated.
     *
     * @param \DateTime $dateUpdated The date that this resource was last updated.
     * @return $this Fluent Builder
     */
    public function setDateUpdated(\DateTime $dateUpdated): self {
        $this->options['dateUpdated'] = $dateUpdated;
        return $this;
    }

    /**
     * The unique id of the [SMS Service](https://www.twilio.com/docs/sms/services/api) this conversation belongs to.
     *
     * @param string $messagingServiceSid The unique id of the SMS Service this
     *                                    conversation belongs to.
     * @return $this Fluent Builder
     */
    public function setMessagingServiceSid(string $messagingServiceSid): self {
        $this->options['messagingServiceSid'] = $messagingServiceSid;
        return $this;
    }

    /**
     * An optional string metadata field you can use to store any data you wish. The string value must contain structurally valid JSON if specified.  **Note** that if the attributes are not set "{}" will be returned.
     *
     * @param string $attributes An optional string metadata field you can use to
     *                           store any data you wish.
     * @return $this Fluent Builder
     */
    public function setAttributes(string $attributes): self {
        $this->options['attributes'] = $attributes;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $options = [];
        foreach ($this->options as $key => $value) {
            if ($value !== Values::NONE) {
                $options[] = "$key=$value";
            }
        }
        return '[Twilio.Conversations.V1.CreateConversationOptions ' . \implode(' ', $options) . ']';
    }
}

class UpdateConversationOptions extends Options {
    /**
     * @param string $friendlyName The human-readable name of this conversation.
     * @param \DateTime $dateCreated The date that this resource was created.
     * @param \DateTime $dateUpdated The date that this resource was last updated.
     * @param string $attributes An optional string metadata field you can use to
     *                           store any data you wish.
     * @param string $messagingServiceSid The unique id of the SMS Service this
     *                                    conversation belongs to.
     */
    public function __construct(string $friendlyName = Values::NONE, \DateTime $dateCreated = Values::NONE, \DateTime $dateUpdated = Values::NONE, string $attributes = Values::NONE, string $messagingServiceSid = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['dateCreated'] = $dateCreated;
        $this->options['dateUpdated'] = $dateUpdated;
        $this->options['attributes'] = $attributes;
        $this->options['messagingServiceSid'] = $messagingServiceSid;
    }

    /**
     * The human-readable name of this conversation, limited to 256 characters. Optional.
     *
     * @param string $friendlyName The human-readable name of this conversation.
     * @return $this Fluent Builder
     */
    public function setFriendlyName(string $friendlyName): self {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * The date that this resource was created.
     *
     * @param \DateTime $dateCreated The date that this resource was created.
     * @return $this Fluent Builder
     */
    public function setDateCreated(\DateTime $dateCreated): self {
        $this->options['dateCreated'] = $dateCreated;
        return $this;
    }

    /**
     * The date that this resource was last updated.
     *
     * @param \DateTime $dateUpdated The date that this resource was last updated.
     * @return $this Fluent Builder
     */
    public function setDateUpdated(\DateTime $dateUpdated): self {
        $this->options['dateUpdated'] = $dateUpdated;
        return $this;
    }

    /**
     * An optional string metadata field you can use to store any data you wish. The string value must contain structurally valid JSON if specified.  **Note** that if the attributes are not set "{}" will be returned.
     *
     * @param string $attributes An optional string metadata field you can use to
     *                           store any data you wish.
     * @return $this Fluent Builder
     */
    public function setAttributes(string $attributes): self {
        $this->options['attributes'] = $attributes;
        return $this;
    }

    /**
     * The unique id of the [SMS Service](https://www.twilio.com/docs/sms/services/api) this conversation belongs to.
     *
     * @param string $messagingServiceSid The unique id of the SMS Service this
     *                                    conversation belongs to.
     * @return $this Fluent Builder
     */
    public function setMessagingServiceSid(string $messagingServiceSid): self {
        $this->options['messagingServiceSid'] = $messagingServiceSid;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $options = [];
        foreach ($this->options as $key => $value) {
            if ($value !== Values::NONE) {
                $options[] = "$key=$value";
            }
        }
        return '[Twilio.Conversations.V1.UpdateConversationOptions ' . \implode(' ', $options) . ']';
    }
}