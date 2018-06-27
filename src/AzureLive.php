<?php
/*
 * @author Sabri El Gueder <sabri.elgueder@satoripop.com>
 * @version 1.0 
 * @package AjaxAzureBlob
 */

use WindowsAzure\Common\ServicesBuilder;
use WindowsAzure\Common\Internal\MediaServicesSettings;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\MediaServices\Models\Asset;
use WindowsAzure\MediaServices\Models\AccessPolicy;
use WindowsAzure\MediaServices\Models\Locator;
use WindowsAzure\MediaServices\Models\Task;
use WindowsAzure\MediaServices\Models\Job;
use WindowsAzure\MediaServices\Models\TaskOptions;
// Live Features
use WindowsAzure\MediaServices\Models\Channel;
use WindowsAzure\MediaServices\Models\ChannelInput;
use WindowsAzure\MediaServices\Models\ChannelOutput;
use WindowsAzure\MediaServices\Models\ChannelPreview;
use WindowsAzure\MediaServices\Models\ChannelEncoding;
use WindowsAzure\MediaServices\Models\ChannelEndpoint;
use WindowsAzure\MediaServices\Models\ChannelInputAccessControl;
use WindowsAzure\MediaServices\Models\ChannelPreviewAccessControl;
use WindowsAzure\MediaServices\Models\ChannelOutputHls;
use WindowsAzure\MediaServices\Models\ChannelSlate;
use WindowsAzure\MediaServices\Models\ChannelState;
use WindowsAzure\MediaServices\Models\StreamingProtocol;
use WindowsAzure\MediaServices\Models\EncodingType;
use WindowsAzure\MediaServices\Models\IPAccessControl;
use WindowsAzure\MediaServices\Models\IPRange;
use WindowsAzure\MediaServices\Models\Operation;
use WindowsAzure\MediaServices\Models\OperationState;
use WindowsAzure\MediaServices\Models\CrossSiteAccessPolicies;
use WindowsAzure\MediaServices\Models\AudioStream;
use WindowsAzure\MediaServices\Models\VideoStream;
use WindowsAzure\MediaServices\Models\ChannelEncodingPresets;
use WindowsAzure\MediaServices\Models\AdMarkerSources;
use WindowsAzure\MediaServices\Models\Program;
use WindowsAzure\MediaServices\Models\ProgramState;
// Content Protection
use WindowsAzure\MediaServices\Models\ContentKey;
use WindowsAzure\MediaServices\Models\ProtectionKeyTypes;
use WindowsAzure\MediaServices\Models\ContentKeyTypes;
use WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicy;
use WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicyOption;
use WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicyRestriction;
use WindowsAzure\MediaServices\Models\ContentKeyDeliveryType;
use WindowsAzure\MediaServices\Models\ContentKeyRestrictionType;
use WindowsAzure\MediaServices\Models\AssetDeliveryPolicy;
use WindowsAzure\MediaServices\Models\AssetDeliveryProtocol;
use WindowsAzure\MediaServices\Models\AssetDeliveryPolicyType;
use WindowsAzure\MediaServices\Models\AssetDeliveryPolicyConfigurationKey;
use WindowsAzure\MediaServices\Templates\SymmetricVerificationKey;
use WindowsAzure\MediaServices\Templates\TokenRestrictionTemplateSerializer;
use WindowsAzure\MediaServices\Templates\TokenRestrictionTemplate;
use WindowsAzure\MediaServices\Templates\TokenClaim;
use WindowsAzure\MediaServices\Templates\TokenType;


define("PHP_EOLLOCAL", "<br>");
set_time_limit(0);

class AzureLive  {
	
}