<?php
declare(strict_types=1);
namespace ParagonIE\MultiFactor;

use ParagonIE\MultiFactor\OTP\{
    OTPInterface,
    TOTP
};

class OneTime implements MultiFactorInterface
{
    protected OTPInterface $otp;
    protected string $secretKey;

    public function __construct(string $secretKey = '', ?OTPInterface $otp = null)
    {
        $this->secretKey = $secretKey;

        if ($otp === null) {
            $otp = new TOTP();
        }

        $this->otp = $otp;
    }

    /**
     * Generate a TOTP code for 2FA
     */
    public function generateCode(int $counterValue = 0): string
    {
        return $this->otp->getCode(
            $this->secretKey,
            $counterValue
        );
    }

    /**
     * Validate a user-provided code
     */
    public function validateCode(string $code, int $counterValue = 0): bool
    {
        $expected = $this->generateCode($counterValue);
        return \hash_equals($code, $expected);
    }
}
