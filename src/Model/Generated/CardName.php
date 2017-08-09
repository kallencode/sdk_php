<?php
namespace bunq\Model\Generated;

use bunq\Context\ApiContext;
use bunq\Http\ApiClient;
use bunq\Model\BunqModel;
use bunq\Model\BunqResponse;

/**
 * Endpoint for getting all the accepted card names for a user. As bunq do
 * not allow total freedom in choosing the name that is going to be printed
 * on the card, the following formats are accepted: Name Surname, N.
 * Surname, N Surname or Surname.
 *
 * @generated
 */
class CardName extends BunqModel
{
    /**
     * Endpoint constants.
     */
    const ENDPOINT_URL_LISTING = 'user/%s/card-name';

    /**
     * Object type.
     */
    const OBJECT_TYPE = 'CardUserNameArray';

    /**
     * All possible variations (of suitable length) of user's legal name for the
     * debit card.
     *
     * @var string[]
     */
    protected $possibleCardNameArray;

    /**
     * Return all the accepted card names for a specific user.
     *
     * This method is called "listing" because "list" is a restricted PHP word
     * and cannot be used as constants, class names, function or method names.
     *
     * @param ApiContext $apiContext
     * @param int $userId
     * @param string[] $customHeaders
     *
     * @return BunqResponse<BunqModel[]|CardName[]>
     */
    public static function listing(ApiContext $apiContext, $userId, array $customHeaders = [])
    {
        $apiClient = new ApiClient($apiContext);
        $responseRaw = $apiClient->get(
            vsprintf(
                self::ENDPOINT_URL_LISTING,
                [$userId]
            ),
            $customHeaders
        );

        return static::fromJsonList($responseRaw, self::OBJECT_TYPE);
    }

    /**
     * All possible variations (of suitable length) of user's legal name for the
     * debit card.
     *
     * @return string[]
     */
    public function getPossibleCardNameArray()
    {
        return $this->possibleCardNameArray;
    }

    /**
     * @param string[] $possibleCardNameArray
     */
    public function setPossibleCardNameArray(array$possibleCardNameArray)
    {
        $this->possibleCardNameArray = $possibleCardNameArray;
    }
}
