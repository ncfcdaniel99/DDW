<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit36c33ea3def3fc3de3e63c4880b82374
{
    public static $classMap = array (
        'Stripe' => __DIR__ . '/..' . '/stripe/stripe-php/lib/Stripe/Stripe.php',
        'Stripe_Account' => __DIR__ . '/..' . '/stripe/stripe-php/lib/Stripe/Account.php',
        'Stripe_ApiConnectionError' => __DIR__ . '/..' . '/stripe/stripe-php/lib/Stripe/ApiConnectionError.php',
        'Stripe_ApiError' => __DIR__ . '/..' . '/stripe/stripe-php/lib/Stripe/ApiError.php',
        'Stripe_ApiRequestor' => __DIR__ . '/..' . '/stripe/stripe-php/lib/Stripe/ApiRequestor.php',
        'Stripe_ApiResource' => __DIR__ . '/..' . '/stripe/stripe-php/lib/Stripe/ApiResource.php',
        'Stripe_ApplicationFee' => __DIR__ . '/..' . '/stripe/stripe-php/lib/Stripe/ApplicationFee.php',
        'Stripe_ApplicationFeeRefund' => __DIR__ . '/..' . '/stripe/stripe-php/lib/Stripe/ApplicationFeeRefund.php',
        'Stripe_AttachedObject' => __DIR__ . '/..' . '/stripe/stripe-php/lib/Stripe/AttachedObject.php',
        'Stripe_AuthenticationError' => __DIR__ . '/..' . '/stripe/stripe-php/lib/Stripe/AuthenticationError.php',
        'Stripe_Balance' => __DIR__ . '/..' . '/stripe/stripe-php/lib/Stripe/Balance.php',
        'Stripe_BalanceTransaction' => __DIR__ . '/..' . '/stripe/stripe-php/lib/Stripe/BalanceTransaction.php',
        'Stripe_BitcoinReceiver' => __DIR__ . '/..' . '/stripe/stripe-php/lib/Stripe/BitcoinReceiver.php',
        'Stripe_BitcoinTransaction' => __DIR__ . '/..' . '/stripe/stripe-php/lib/Stripe/BitcoinTransaction.php',
        'Stripe_Card' => __DIR__ . '/..' . '/stripe/stripe-php/lib/Stripe/Card.php',
        'Stripe_CardError' => __DIR__ . '/..' . '/stripe/stripe-php/lib/Stripe/CardError.php',
        'Stripe_Charge' => __DIR__ . '/..' . '/stripe/stripe-php/lib/Stripe/Charge.php',
        'Stripe_Coupon' => __DIR__ . '/..' . '/stripe/stripe-php/lib/Stripe/Coupon.php',
        'Stripe_Customer' => __DIR__ . '/..' . '/stripe/stripe-php/lib/Stripe/Customer.php',
        'Stripe_Error' => __DIR__ . '/..' . '/stripe/stripe-php/lib/Stripe/Error.php',
        'Stripe_Event' => __DIR__ . '/..' . '/stripe/stripe-php/lib/Stripe/Event.php',
        'Stripe_FileUpload' => __DIR__ . '/..' . '/stripe/stripe-php/lib/Stripe/FileUpload.php',
        'Stripe_InvalidRequestError' => __DIR__ . '/..' . '/stripe/stripe-php/lib/Stripe/InvalidRequestError.php',
        'Stripe_Invoice' => __DIR__ . '/..' . '/stripe/stripe-php/lib/Stripe/Invoice.php',
        'Stripe_InvoiceItem' => __DIR__ . '/..' . '/stripe/stripe-php/lib/Stripe/InvoiceItem.php',
        'Stripe_List' => __DIR__ . '/..' . '/stripe/stripe-php/lib/Stripe/List.php',
        'Stripe_Object' => __DIR__ . '/..' . '/stripe/stripe-php/lib/Stripe/Object.php',
        'Stripe_Plan' => __DIR__ . '/..' . '/stripe/stripe-php/lib/Stripe/Plan.php',
        'Stripe_RateLimitError' => __DIR__ . '/..' . '/stripe/stripe-php/lib/Stripe/RateLimitError.php',
        'Stripe_Recipient' => __DIR__ . '/..' . '/stripe/stripe-php/lib/Stripe/Recipient.php',
        'Stripe_Refund' => __DIR__ . '/..' . '/stripe/stripe-php/lib/Stripe/Refund.php',
        'Stripe_RequestOptions' => __DIR__ . '/..' . '/stripe/stripe-php/lib/Stripe/RequestOptions.php',
        'Stripe_SingletonApiResource' => __DIR__ . '/..' . '/stripe/stripe-php/lib/Stripe/SingletonApiResource.php',
        'Stripe_Subscription' => __DIR__ . '/..' . '/stripe/stripe-php/lib/Stripe/Subscription.php',
        'Stripe_Token' => __DIR__ . '/..' . '/stripe/stripe-php/lib/Stripe/Token.php',
        'Stripe_Transfer' => __DIR__ . '/..' . '/stripe/stripe-php/lib/Stripe/Transfer.php',
        'Stripe_Util' => __DIR__ . '/..' . '/stripe/stripe-php/lib/Stripe/Util.php',
        'Stripe_Util_Set' => __DIR__ . '/..' . '/stripe/stripe-php/lib/Stripe/Util/Set.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit36c33ea3def3fc3de3e63c4880b82374::$classMap;

        }, null, ClassLoader::class);
    }
}
