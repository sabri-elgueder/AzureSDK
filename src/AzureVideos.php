<?php
/*
 * @author Sabri El Gueder <sabri.elgueder@satoripop.com>
 * @version 1.0 
 * @package AjaxAzureBlob
 */

namespace SatoripopAzure;

use WindowsAzure\Common\ServicesBuilder;
use WindowsAzure\Common\Internal\MediaServicesSettings;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\MediaServices\MediaServicesRestProxy;
use WindowsAzure\MediaServices\Models\Asset;
use WindowsAzure\MediaServices\Models\AccessPolicy;
use WindowsAzure\MediaServices\Models\Locator;
use WindowsAzure\MediaServices\Models\Task;
use WindowsAzure\MediaServices\Models\Job;
use WindowsAzure\MediaServices\Models\TaskOptions;
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
use WindowsAzure\MediaServices\Templates\FairPlayConfiguration;
use MicrosoftAzure\Storage\Blob\Models\BlobType;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Validate;
use WindowsAzure\Common\Internal\Http\HttpCallContext;
use WindowsAzure\Common\Internal\ServiceRestProxy;
use WindowsAzure\MediaServices\Internal\IMediaServices;
use WindowsAzure\MediaServices\Models\AssetFile;
use WindowsAzure\MediaServices\Models\MediaProcessor;
use WindowsAzure\MediaServices\Models\JobTemplate;
use WindowsAzure\MediaServices\Models\TaskTemplate;
use WindowsAzure\MediaServices\Internal\ContentPropertiesSerializer;
use WindowsAzure\Common\Internal\Atom\Feed;
use WindowsAzure\Common\Internal\Atom\Entry;
use WindowsAzure\Common\Internal\Atom\Content;
use WindowsAzure\Common\Internal\Atom\AtomLink;
use WindowsAzure\Common\Internal\Http\HttpClient;
use WindowsAzure\Common\Internal\Http\Url;
use WindowsAzure\Common\Internal\Http\BatchRequest;
use WindowsAzure\Common\Internal\Http\BatchResponse;
use WindowsAzure\MediaServices\Models\StorageAccount;
use WindowsAzure\MediaServices\Models\IngestManifest;
use WindowsAzure\MediaServices\Models\IngestManifestAsset;
use WindowsAzure\MediaServices\Models\IngestManifestFile;
use WindowsAzure\MediaServices\Models\EncodingReservedUnit;
use WindowsAzure\MediaServices\Models\Operation;
use WindowsAzure\MediaServices\Models\OperationState;
use WindowsAzure\MediaServices\Models\Channel;
use WindowsAzure\MediaServices\Models\Program;

class AzureVideos {
	private $asureCardinals;
	const BLOCK_ID_PREFIX = 'block-';
	const MAX_BLOCK_SIZE = 4194304; // 4 Mb
	const BLOCK_ID_PADDING = 6;

	private $restProxy;

	
}
