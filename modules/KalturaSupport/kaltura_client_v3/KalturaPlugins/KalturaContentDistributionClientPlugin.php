<?php
// ===================================================================================================
//                           _  __     _ _
//                          | |/ /__ _| | |_ _  _ _ _ __ _
//                          | ' </ _` | |  _| || | '_/ _` |
//                          |_|\_\__,_|_|\__|\_,_|_| \__,_|
//
// This file is part of the Kaltura Collaborative Media Suite which allows users
// to do with audio, video, and animation what Wiki platfroms allow them to do with
// text.
//
// Copyright (C) 2006-2011  Kaltura Inc.
//
// This program is free software: you can redistribute it and/or modify
// it under the terms of the GNU Affero General Public License as
// published by the Free Software Foundation, either version 3 of the
// License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU Affero General Public License for more details.
//
// You should have received a copy of the GNU Affero General Public License
// along with this program.  If not, see <http://www.gnu.org/licenses/>.
//
// @ignore
// ===================================================================================================

require_once(dirname(__FILE__) . "/../KalturaClientBase.php");
require_once(dirname(__FILE__) . "/../KalturaEnums.php");
require_once(dirname(__FILE__) . "/../KalturaTypes.php");
require_once(dirname(__FILE__) . "/KalturaMetadataClientPlugin.php");

class KalturaConfigurableDistributionProfileOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const CREATED_AT_DESC = "-createdAt";
	const UPDATED_AT_ASC = "+updatedAt";
	const UPDATED_AT_DESC = "-updatedAt";
}

class KalturaDistributionAction
{
	const SUBMIT = 1;
	const UPDATE = 2;
	const DELETE = 3;
	const FETCH_REPORT = 4;
}

class KalturaDistributionErrorType
{
	const MISSING_FLAVOR = 1;
	const MISSING_THUMBNAIL = 2;
	const MISSING_METADATA = 3;
	const INVALID_DATA = 4;
}

class KalturaDistributionFieldRequiredStatus
{
	const NOT_REQUIRED = 0;
	const REQUIRED_BY_PROVIDER = 1;
	const REQUIRED_BY_PARTNER = 2;
}

class KalturaDistributionProfileActionStatus
{
	const DISABLED = 1;
	const AUTOMATIC = 2;
	const MANUAL = 3;
}

class KalturaDistributionProfileOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const CREATED_AT_DESC = "-createdAt";
	const UPDATED_AT_ASC = "+updatedAt";
	const UPDATED_AT_DESC = "-updatedAt";
}

class KalturaDistributionProfileStatus
{
	const DISABLED = 1;
	const ENABLED = 2;
	const DELETED = 3;
}

class KalturaDistributionProtocol
{
	const FTP = 1;
	const SCP = 2;
	const SFTP = 3;
	const HTTP = 4;
	const HTTPS = 5;
}

class KalturaDistributionProviderOrderBy
{
}

class KalturaDistributionProviderType
{
	const GENERIC = "1";
	const SYNDICATION = "2";
	const YOUTUBE_API = "youtubeApiDistribution.YOUTUBE_API";
	const IDETIC = "ideticDistribution.IDETIC";
}

class KalturaDistributionValidationErrorType
{
	const CUSTOM_ERROR = 0;
	const STRING_EMPTY = 1;
	const STRING_TOO_LONG = 2;
	const STRING_TOO_SHORT = 3;
	const INVALID_FORMAT = 4;
}

class KalturaEntryDistributionFlag
{
	const NONE = 0;
	const SUBMIT_REQUIRED = 1;
	const DELETE_REQUIRED = 2;
	const UPDATE_REQUIRED = 3;
	const ENABLE_REQUIRED = 4;
	const DISABLE_REQUIRED = 5;
}

class KalturaEntryDistributionOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const CREATED_AT_DESC = "-createdAt";
	const UPDATED_AT_ASC = "+updatedAt";
	const UPDATED_AT_DESC = "-updatedAt";
	const SUBMITTED_AT_ASC = "+submittedAt";
	const SUBMITTED_AT_DESC = "-submittedAt";
	const SUNRISE_ASC = "+sunrise";
	const SUNRISE_DESC = "-sunrise";
	const SUNSET_ASC = "+sunset";
	const SUNSET_DESC = "-sunset";
}

class KalturaEntryDistributionStatus
{
	const PENDING = 0;
	const QUEUED = 1;
	const READY = 2;
	const DELETED = 3;
	const SUBMITTING = 4;
	const UPDATING = 5;
	const DELETING = 6;
	const ERROR_SUBMITTING = 7;
	const ERROR_UPDATING = 8;
	const ERROR_DELETING = 9;
	const REMOVED = 10;
	const IMPORT_SUBMITTING = 11;
	const IMPORT_UPDATING = 12;
}

class KalturaEntryDistributionSunStatus
{
	const BEFORE_SUNRISE = 1;
	const AFTER_SUNRISE = 2;
	const AFTER_SUNSET = 3;
}

class KalturaGenericDistributionProfileOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const CREATED_AT_DESC = "-createdAt";
	const UPDATED_AT_ASC = "+updatedAt";
	const UPDATED_AT_DESC = "-updatedAt";
}

class KalturaGenericDistributionProviderActionOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const CREATED_AT_DESC = "-createdAt";
	const UPDATED_AT_ASC = "+updatedAt";
	const UPDATED_AT_DESC = "-updatedAt";
}

class KalturaGenericDistributionProviderOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const CREATED_AT_DESC = "-createdAt";
	const UPDATED_AT_ASC = "+updatedAt";
	const UPDATED_AT_DESC = "-updatedAt";
}

class KalturaGenericDistributionProviderParser
{
	const XSL = 1;
	const XPATH = 2;
	const REGEX = 3;
}

class KalturaGenericDistributionProviderStatus
{
	const ACTIVE = 2;
	const DELETED = 3;
}

class KalturaSyndicationDistributionProfileOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const CREATED_AT_DESC = "-createdAt";
	const UPDATED_AT_ASC = "+updatedAt";
	const UPDATED_AT_DESC = "-updatedAt";
}

class KalturaSyndicationDistributionProviderOrderBy
{
}

class KalturaDistributionThumbDimensions extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $width = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $height = null;


}

abstract class KalturaDistributionProfile extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $createdAt = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $updatedAt = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $partnerId = null;

	/**
	 * 
	 *
	 * @var KalturaDistributionProviderType
	 * @insertonly
	 */
	public $providerType = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * 
	 *
	 * @var KalturaDistributionProfileStatus
	 */
	public $status = null;

	/**
	 * 
	 *
	 * @var KalturaDistributionProfileActionStatus
	 */
	public $submitEnabled = null;

	/**
	 * 
	 *
	 * @var KalturaDistributionProfileActionStatus
	 */
	public $updateEnabled = null;

	/**
	 * 
	 *
	 * @var KalturaDistributionProfileActionStatus
	 */
	public $deleteEnabled = null;

	/**
	 * 
	 *
	 * @var KalturaDistributionProfileActionStatus
	 */
	public $reportEnabled = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $autoCreateFlavors = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $autoCreateThumb = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $optionalFlavorParamsIds = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $requiredFlavorParamsIds = null;

	/**
	 * 
	 *
	 * @var array of KalturaDistributionThumbDimensions
	 */
	public $optionalThumbDimensions;

	/**
	 * 
	 *
	 * @var array of KalturaDistributionThumbDimensions
	 */
	public $requiredThumbDimensions;

	/**
	 * 
	 *
	 * @var int
	 */
	public $sunriseDefaultOffset = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $sunsetDefaultOffset = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $recommendedStorageProfileForDownload = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $recommendedDcForDownload = null;


}

abstract class KalturaDistributionProfileBaseFilter extends KalturaFilter
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $idEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $idIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $createdAtGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $createdAtLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $updatedAtGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $updatedAtLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var KalturaDistributionProfileStatus
	 */
	public $statusEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $statusIn = null;


}

class KalturaDistributionProfileFilter extends KalturaDistributionProfileBaseFilter
{

}

class KalturaDistributionProfileListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var array of KalturaDistributionProfile
	 * @readonly
	 */
	public $objects;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $totalCount = null;


}

abstract class KalturaDistributionValidationError extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var KalturaDistributionAction
	 */
	public $action = null;

	/**
	 * 
	 *
	 * @var KalturaDistributionErrorType
	 */
	public $errorType = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $description = null;


}

class KalturaEntryDistribution extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $createdAt = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $updatedAt = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $submittedAt = null;

	/**
	 * 
	 *
	 * @var string
	 * @insertonly
	 */
	public $entryId = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $partnerId = null;

	/**
	 * 
	 *
	 * @var int
	 * @insertonly
	 */
	public $distributionProfileId = null;

	/**
	 * 
	 *
	 * @var KalturaEntryDistributionStatus
	 * @readonly
	 */
	public $status = null;

	/**
	 * 
	 *
	 * @var KalturaEntryDistributionSunStatus
	 * @readonly
	 */
	public $sunStatus = null;

	/**
	 * 
	 *
	 * @var KalturaEntryDistributionFlag
	 * @readonly
	 */
	public $dirtyStatus = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $thumbAssetIds = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $flavorAssetIds = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $sunrise = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $sunset = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $remoteId = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $plays = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $views = null;

	/**
	 * 
	 *
	 * @var array of KalturaDistributionValidationError
	 */
	public $validationErrors;

	/**
	 * 
	 *
	 * @var KalturaBatchJobErrorTypes
	 * @readonly
	 */
	public $errorType = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $errorNumber = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $errorDescription = null;

	/**
	 * 
	 *
	 * @var KalturaNullableBoolean
	 * @readonly
	 */
	public $hasSubmitResultsLog = null;

	/**
	 * 
	 *
	 * @var KalturaNullableBoolean
	 * @readonly
	 */
	public $hasSubmitSentDataLog = null;

	/**
	 * 
	 *
	 * @var KalturaNullableBoolean
	 * @readonly
	 */
	public $hasUpdateResultsLog = null;

	/**
	 * 
	 *
	 * @var KalturaNullableBoolean
	 * @readonly
	 */
	public $hasUpdateSentDataLog = null;

	/**
	 * 
	 *
	 * @var KalturaNullableBoolean
	 * @readonly
	 */
	public $hasDeleteResultsLog = null;

	/**
	 * 
	 *
	 * @var KalturaNullableBoolean
	 * @readonly
	 */
	public $hasDeleteSentDataLog = null;


}

abstract class KalturaEntryDistributionBaseFilter extends KalturaFilter
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $idEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $idIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $createdAtGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $createdAtLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $updatedAtGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $updatedAtLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $submittedAtGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $submittedAtLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $entryIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $entryIdIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $distributionProfileIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $distributionProfileIdIn = null;

	/**
	 * 
	 *
	 * @var KalturaEntryDistributionStatus
	 */
	public $statusEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $statusIn = null;

	/**
	 * 
	 *
	 * @var KalturaEntryDistributionFlag
	 */
	public $dirtyStatusEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $dirtyStatusIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $sunriseGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $sunriseLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $sunsetGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $sunsetLessThanOrEqual = null;


}

class KalturaEntryDistributionFilter extends KalturaEntryDistributionBaseFilter
{

}

class KalturaEntryDistributionListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var array of KalturaEntryDistribution
	 * @readonly
	 */
	public $objects;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $totalCount = null;


}

abstract class KalturaDistributionProviderBaseFilter extends KalturaFilter
{
	/**
	 * 
	 *
	 * @var KalturaDistributionProviderType
	 */
	public $typeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $typeIn = null;


}

class KalturaDistributionProviderFilter extends KalturaDistributionProviderBaseFilter
{

}

abstract class KalturaDistributionProvider extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var KalturaDistributionProviderType
	 * @readonly
	 */
	public $type = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $scheduleUpdateEnabled = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $availabilityUpdateEnabled = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $deleteInsteadUpdate = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $intervalBeforeSunrise = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $intervalBeforeSunset = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $updateRequiredEntryFields = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $updateRequiredMetadataXPaths = null;


}

class KalturaDistributionProviderListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var array of KalturaDistributionProvider
	 * @readonly
	 */
	public $objects;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $totalCount = null;


}

class KalturaGenericDistributionProvider extends KalturaDistributionProvider
{
	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $createdAt = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $updatedAt = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $partnerId = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $isDefault = null;

	/**
	 * 
	 *
	 * @var KalturaGenericDistributionProviderStatus
	 * @readonly
	 */
	public $status = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $optionalFlavorParamsIds = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $requiredFlavorParamsIds = null;

	/**
	 * 
	 *
	 * @var array of KalturaDistributionThumbDimensions
	 */
	public $optionalThumbDimensions;

	/**
	 * 
	 *
	 * @var array of KalturaDistributionThumbDimensions
	 */
	public $requiredThumbDimensions;

	/**
	 * 
	 *
	 * @var string
	 */
	public $editableFields = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $mandatoryFields = null;


}

abstract class KalturaGenericDistributionProviderBaseFilter extends KalturaDistributionProviderFilter
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $idEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $idIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $createdAtGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $createdAtLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $updatedAtGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $updatedAtLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $partnerIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $partnerIdIn = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $isDefaultEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $isDefaultIn = null;

	/**
	 * 
	 *
	 * @var KalturaGenericDistributionProviderStatus
	 */
	public $statusEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $statusIn = null;


}

class KalturaGenericDistributionProviderFilter extends KalturaGenericDistributionProviderBaseFilter
{

}

class KalturaGenericDistributionProviderListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var array of KalturaGenericDistributionProvider
	 * @readonly
	 */
	public $objects;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $totalCount = null;


}

class KalturaGenericDistributionProviderAction extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $createdAt = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $updatedAt = null;

	/**
	 * 
	 *
	 * @var int
	 * @insertonly
	 */
	public $genericDistributionProviderId = null;

	/**
	 * 
	 *
	 * @var KalturaDistributionAction
	 * @insertonly
	 */
	public $action = null;

	/**
	 * 
	 *
	 * @var KalturaGenericDistributionProviderStatus
	 * @readonly
	 */
	public $status = null;

	/**
	 * 
	 *
	 * @var KalturaGenericDistributionProviderParser
	 */
	public $resultsParser = null;

	/**
	 * 
	 *
	 * @var KalturaDistributionProtocol
	 */
	public $protocol = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $serverAddress = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $remotePath = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $remoteUsername = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $remotePassword = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $editableFields = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $mandatoryFields = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $mrssTransformer = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $mrssValidator = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $resultsTransformer = null;


}

abstract class KalturaGenericDistributionProviderActionBaseFilter extends KalturaFilter
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $idEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $idIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $createdAtGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $createdAtLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $updatedAtGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $updatedAtLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $genericDistributionProviderIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $genericDistributionProviderIdIn = null;

	/**
	 * 
	 *
	 * @var KalturaDistributionAction
	 */
	public $actionEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $actionIn = null;


}

class KalturaGenericDistributionProviderActionFilter extends KalturaGenericDistributionProviderActionBaseFilter
{

}

class KalturaGenericDistributionProviderActionListResponse extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var array of KalturaGenericDistributionProviderAction
	 * @readonly
	 */
	public $objects;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $totalCount = null;


}

class KalturaContentDistributionSearchItem extends KalturaSearchItem
{
	/**
	 * 
	 *
	 * @var bool
	 */
	public $noDistributionProfiles = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $distributionProfileId = null;

	/**
	 * 
	 *
	 * @var KalturaEntryDistributionSunStatus
	 */
	public $distributionSunStatus = null;

	/**
	 * 
	 *
	 * @var KalturaEntryDistributionFlag
	 */
	public $entryDistributionFlag = null;

	/**
	 * 
	 *
	 * @var KalturaEntryDistributionStatus
	 */
	public $entryDistributionStatus = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $hasEntryDistributionValidationErrors = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $entryDistributionValidationErrors = null;


}

abstract class KalturaConfigurableDistributionProfileBaseFilter extends KalturaDistributionProfileFilter
{

}

class KalturaConfigurableDistributionProfileFilter extends KalturaConfigurableDistributionProfileBaseFilter
{

}

abstract class KalturaGenericDistributionProfileBaseFilter extends KalturaDistributionProfileFilter
{

}

class KalturaGenericDistributionProfileFilter extends KalturaGenericDistributionProfileBaseFilter
{

}

abstract class KalturaSyndicationDistributionProfileBaseFilter extends KalturaDistributionProfileFilter
{

}

class KalturaSyndicationDistributionProfileFilter extends KalturaSyndicationDistributionProfileBaseFilter
{

}

abstract class KalturaSyndicationDistributionProviderBaseFilter extends KalturaDistributionProviderFilter
{

}

class KalturaSyndicationDistributionProviderFilter extends KalturaSyndicationDistributionProviderBaseFilter
{

}

class KalturaDistributionFieldConfig extends KalturaObjectBase
{
	/**
	 * Field enum class should be returned by the provider's getFieldEnumClass function.
	 *
	 * @var string
	 */
	public $fieldName = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $userFriendlyFieldName = null;

	/**
	 * An XSLT string that extracts the right value from the Kaltura entry MRSS XML.
	 * The value of the current connector field will be the one that is returned from transforming the Kaltura entry MRSS XML using this XSLT string.
	 *
	 * @var string
	 */
	public $entryMrssXslt = null;

	/**
	 * 
	 *
	 * @var KalturaDistributionFieldRequiredStatus
	 */
	public $isRequired = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $updateOnChange = null;

	/**
	 * 
	 *
	 * @var array of KalturaString
	 */
	public $updateParams;

	/**
	 * 
	 *
	 * @var bool
	 * @readonly
	 */
	public $isDefault = null;


}

abstract class KalturaConfigurableDistributionProfile extends KalturaDistributionProfile
{
	/**
	 * 
	 *
	 * @var array of KalturaDistributionFieldConfig
	 */
	public $fieldConfigArray;

	/**
	 * 
	 *
	 * @var array of KalturaString
	 */
	public $itemXpathsToExtend;


}

class KalturaGenericDistributionProfileAction extends KalturaObjectBase
{
	/**
	 * 
	 *
	 * @var KalturaDistributionProtocol
	 */
	public $protocol = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $serverUrl = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $serverPath = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $username = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $password = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $ftpPassiveMode = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $httpFieldName = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $httpFileName = null;


}

class KalturaGenericDistributionProfile extends KalturaDistributionProfile
{
	/**
	 * 
	 *
	 * @var int
	 * @insertonly
	 */
	public $genericProviderId = null;

	/**
	 * 
	 *
	 * @var KalturaGenericDistributionProfileAction
	 */
	public $submitAction;

	/**
	 * 
	 *
	 * @var KalturaGenericDistributionProfileAction
	 */
	public $updateAction;

	/**
	 * 
	 *
	 * @var KalturaGenericDistributionProfileAction
	 */
	public $deleteAction;

	/**
	 * 
	 *
	 * @var KalturaGenericDistributionProfileAction
	 */
	public $fetchReportAction;

	/**
	 * 
	 *
	 * @var string
	 */
	public $updateRequiredEntryFields = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $updateRequiredMetadataXPaths = null;


}

class KalturaSyndicationDistributionProfile extends KalturaDistributionProfile
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $xsl = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $feedId = null;


}

class KalturaDistributionValidationErrorInvalidData extends KalturaDistributionValidationError
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $fieldName = null;

	/**
	 * 
	 *
	 * @var KalturaDistributionValidationErrorType
	 */
	public $validationErrorType = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $validationErrorParam = null;


}

class KalturaDistributionValidationErrorInvalidMetadata extends KalturaDistributionValidationErrorInvalidData
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $metadataProfileId = null;


}

class KalturaDistributionValidationErrorMissingFlavor extends KalturaDistributionValidationError
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $flavorParamsId = null;


}

class KalturaDistributionValidationErrorMissingMetadata extends KalturaDistributionValidationError
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $fieldName = null;


}

class KalturaDistributionValidationErrorMissingThumbnail extends KalturaDistributionValidationError
{
	/**
	 * 
	 *
	 * @var KalturaDistributionThumbDimensions
	 */
	public $dimensions;


}

class KalturaSyndicationDistributionProvider extends KalturaDistributionProvider
{

}


class KalturaDistributionProfileService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	function add(KalturaDistributionProfile $distributionProfile)
	{
		$kparams = array();
		$this->client->addParam($kparams, "distributionProfile", $distributionProfile->toParams());
		$this->client->queueServiceActionCall("contentdistribution_distributionprofile", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDistributionProfile");
		return $resultObject;
	}

	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("contentdistribution_distributionprofile", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDistributionProfile");
		return $resultObject;
	}

	function update($id, KalturaDistributionProfile $distributionProfile)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "distributionProfile", $distributionProfile->toParams());
		$this->client->queueServiceActionCall("contentdistribution_distributionprofile", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDistributionProfile");
		return $resultObject;
	}

	function updateStatus($id, $status)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "status", $status);
		$this->client->queueServiceActionCall("contentdistribution_distributionprofile", "updateStatus", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDistributionProfile");
		return $resultObject;
	}

	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("contentdistribution_distributionprofile", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	function listAction(KalturaDistributionProfileFilter $filter = null, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("contentdistribution_distributionprofile", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDistributionProfileListResponse");
		return $resultObject;
	}

	function listByPartner(KalturaPartnerFilter $filter = null, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("contentdistribution_distributionprofile", "listByPartner", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDistributionProfileListResponse");
		return $resultObject;
	}
}

class KalturaEntryDistributionService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	function add(KalturaEntryDistribution $entryDistribution)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entryDistribution", $entryDistribution->toParams());
		$this->client->queueServiceActionCall("contentdistribution_entrydistribution", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEntryDistribution");
		return $resultObject;
	}

	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("contentdistribution_entrydistribution", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEntryDistribution");
		return $resultObject;
	}

	function validate($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("contentdistribution_entrydistribution", "validate", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEntryDistribution");
		return $resultObject;
	}

	function update($id, KalturaEntryDistribution $entryDistribution)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "entryDistribution", $entryDistribution->toParams());
		$this->client->queueServiceActionCall("contentdistribution_entrydistribution", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEntryDistribution");
		return $resultObject;
	}

	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("contentdistribution_entrydistribution", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	function listAction(KalturaEntryDistributionFilter $filter = null, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("contentdistribution_entrydistribution", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEntryDistributionListResponse");
		return $resultObject;
	}

	function submitAdd($id, $submitWhenReady = false)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "submitWhenReady", $submitWhenReady);
		$this->client->queueServiceActionCall("contentdistribution_entrydistribution", "submitAdd", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEntryDistribution");
		return $resultObject;
	}

	function submitUpdate($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("contentdistribution_entrydistribution", "submitUpdate", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEntryDistribution");
		return $resultObject;
	}

	function submitFetchReport($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("contentdistribution_entrydistribution", "submitFetchReport", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEntryDistribution");
		return $resultObject;
	}

	function submitDelete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("contentdistribution_entrydistribution", "submitDelete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEntryDistribution");
		return $resultObject;
	}

	function retrySubmit($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("contentdistribution_entrydistribution", "retrySubmit", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEntryDistribution");
		return $resultObject;
	}

	function serveSentData($id, $actionType)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "actionType", $actionType);
		$this->client->queueServiceActionCall('contentdistribution_entrydistribution', 'serveSentData', $kparams);
		$resultObject = $this->client->getServeUrl();
		return $resultObject;
	}

	function serveReturnedData($id, $actionType)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "actionType", $actionType);
		$this->client->queueServiceActionCall('contentdistribution_entrydistribution', 'serveReturnedData', $kparams);
		$resultObject = $this->client->getServeUrl();
		return $resultObject;
	}
}

class KalturaDistributionProviderService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	function listAction(KalturaDistributionProviderFilter $filter = null, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("contentdistribution_distributionprovider", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDistributionProviderListResponse");
		return $resultObject;
	}
}

class KalturaGenericDistributionProviderService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	function add(KalturaGenericDistributionProvider $genericDistributionProvider)
	{
		$kparams = array();
		$this->client->addParam($kparams, "genericDistributionProvider", $genericDistributionProvider->toParams());
		$this->client->queueServiceActionCall("contentdistribution_genericdistributionprovider", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaGenericDistributionProvider");
		return $resultObject;
	}

	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("contentdistribution_genericdistributionprovider", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaGenericDistributionProvider");
		return $resultObject;
	}

	function update($id, KalturaGenericDistributionProvider $genericDistributionProvider)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "genericDistributionProvider", $genericDistributionProvider->toParams());
		$this->client->queueServiceActionCall("contentdistribution_genericdistributionprovider", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaGenericDistributionProvider");
		return $resultObject;
	}

	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("contentdistribution_genericdistributionprovider", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	function listAction(KalturaGenericDistributionProviderFilter $filter = null, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("contentdistribution_genericdistributionprovider", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaGenericDistributionProviderListResponse");
		return $resultObject;
	}
}

class KalturaGenericDistributionProviderActionService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	function add(KalturaGenericDistributionProviderAction $genericDistributionProviderAction)
	{
		$kparams = array();
		$this->client->addParam($kparams, "genericDistributionProviderAction", $genericDistributionProviderAction->toParams());
		$this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaGenericDistributionProviderAction");
		return $resultObject;
	}

	function addMrssTransform($id, $xslData)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "xslData", $xslData);
		$this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction", "addMrssTransform", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaGenericDistributionProviderAction");
		return $resultObject;
	}

	function addMrssTransformFromFile($id, $xslFile)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$kfiles = array();
		$this->client->addParam($kfiles, "xslFile", $xslFile);
		$this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction", "addMrssTransformFromFile", $kparams, $kfiles);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaGenericDistributionProviderAction");
		return $resultObject;
	}

	function addMrssValidate($id, $xsdData)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "xsdData", $xsdData);
		$this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction", "addMrssValidate", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaGenericDistributionProviderAction");
		return $resultObject;
	}

	function addMrssValidateFromFile($id, $xsdFile)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$kfiles = array();
		$this->client->addParam($kfiles, "xsdFile", $xsdFile);
		$this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction", "addMrssValidateFromFile", $kparams, $kfiles);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaGenericDistributionProviderAction");
		return $resultObject;
	}

	function addResultsTransform($id, $transformData)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "transformData", $transformData);
		$this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction", "addResultsTransform", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaGenericDistributionProviderAction");
		return $resultObject;
	}

	function addResultsTransformFromFile($id, $transformFile)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$kfiles = array();
		$this->client->addParam($kfiles, "transformFile", $transformFile);
		$this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction", "addResultsTransformFromFile", $kparams, $kfiles);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaGenericDistributionProviderAction");
		return $resultObject;
	}

	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaGenericDistributionProviderAction");
		return $resultObject;
	}

	function getByProviderId($genericDistributionProviderId, $actionType)
	{
		$kparams = array();
		$this->client->addParam($kparams, "genericDistributionProviderId", $genericDistributionProviderId);
		$this->client->addParam($kparams, "actionType", $actionType);
		$this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction", "getByProviderId", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaGenericDistributionProviderAction");
		return $resultObject;
	}

	function updateByProviderId($genericDistributionProviderId, $actionType, KalturaGenericDistributionProviderAction $genericDistributionProviderAction)
	{
		$kparams = array();
		$this->client->addParam($kparams, "genericDistributionProviderId", $genericDistributionProviderId);
		$this->client->addParam($kparams, "actionType", $actionType);
		$this->client->addParam($kparams, "genericDistributionProviderAction", $genericDistributionProviderAction->toParams());
		$this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction", "updateByProviderId", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaGenericDistributionProviderAction");
		return $resultObject;
	}

	function update($id, KalturaGenericDistributionProviderAction $genericDistributionProviderAction)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "genericDistributionProviderAction", $genericDistributionProviderAction->toParams());
		$this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaGenericDistributionProviderAction");
		return $resultObject;
	}

	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	function deleteByProviderId($genericDistributionProviderId, $actionType)
	{
		$kparams = array();
		$this->client->addParam($kparams, "genericDistributionProviderId", $genericDistributionProviderId);
		$this->client->addParam($kparams, "actionType", $actionType);
		$this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction", "deleteByProviderId", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	function listAction(KalturaGenericDistributionProviderActionFilter $filter = null, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaGenericDistributionProviderActionListResponse");
		return $resultObject;
	}
}
class KalturaContentDistributionClientPlugin extends KalturaClientPlugin
{
	/**
	 * @var KalturaContentDistributionClientPlugin
	 */
	protected static $instance;

	/**
	 * @var KalturaDistributionProfileService
	 */
	public $distributionProfile = null;

	/**
	 * @var KalturaEntryDistributionService
	 */
	public $entryDistribution = null;

	/**
	 * @var KalturaDistributionProviderService
	 */
	public $distributionProvider = null;

	/**
	 * @var KalturaGenericDistributionProviderService
	 */
	public $genericDistributionProvider = null;

	/**
	 * @var KalturaGenericDistributionProviderActionService
	 */
	public $genericDistributionProviderAction = null;

	protected function __construct(KalturaClient $client)
	{
		parent::__construct($client);
		$this->distributionProfile = new KalturaDistributionProfileService($client);
		$this->entryDistribution = new KalturaEntryDistributionService($client);
		$this->distributionProvider = new KalturaDistributionProviderService($client);
		$this->genericDistributionProvider = new KalturaGenericDistributionProviderService($client);
		$this->genericDistributionProviderAction = new KalturaGenericDistributionProviderActionService($client);
	}

	/**
	 * @return KalturaContentDistributionClientPlugin
	 */
	public static function get(KalturaClient $client)
	{
		if(!self::$instance)
			self::$instance = new KalturaContentDistributionClientPlugin($client);
		return self::$instance;
	}

	/**
	 * @return array<KalturaServiceBase>
	 */
	public function getServices()
	{
		$services = array(
			'distributionProfile' => $this->distributionProfile,
			'entryDistribution' => $this->entryDistribution,
			'distributionProvider' => $this->distributionProvider,
			'genericDistributionProvider' => $this->genericDistributionProvider,
			'genericDistributionProviderAction' => $this->genericDistributionProviderAction,
		);
		return $services;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return 'contentDistribution';
	}
}

