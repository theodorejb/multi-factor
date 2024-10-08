<?php
declare(strict_types=1);
namespace ParagonIE\MultiFactor\OTP;

use ParagonIE\ConstantTime\Hex;

class TOTP implements OTPInterface
{
    protected string $algo;
    protected int $length;
    protected int $timeStep;
    protected int $timeZero;

    /**
     * @param int $timeZero        The start time for calculating the TOTP
     * @param int $timeStep        How many seconds should each TOTP live?
     * @param int $length          How many digits should each TOTP be?
     * @param string $algo         Hash function to use
     */
    public function __construct(
        int $timeZero = 0,
        int $timeStep = 30,
        int $length = 6,
        string $algo = 'sha1'
    ) {
        $this->timeZero = $timeZero;
        $this->timeStep = $timeStep;
        $this->length = $length;
        $this->algo = $algo;
    }

    /**
     * Generate a TOTP secret in accordance with RFC 6238
     *
     * @ref https://tools.ietf.org/html/rfc6238
     * @param string $sharedSecret The key to use for determining the TOTP
     * @param int $counterValue    Current time or HOTP counter
     * @throws \OutOfRangeException
     */
    public function getCode(string $sharedSecret, int $counterValue): string
    {
        $msg = $this->getTValue($counterValue);
        return HOTP::generateHOTPValue($this->length, $sharedSecret, $this->algo, $msg);
    }

    public function getLength(): int
    {
        return $this->length;
    }

    public function getTimeStep(): int
    {
        return $this->timeStep;
    }

    /**
     * Get the binary T value
     */
    protected function getTValue(int $unixTimestamp): string
    {
        $value = \intdiv(
            $unixTimestamp - $this->timeZero,
            $this->timeStep !== 0 ? $this->timeStep : 1
        );

        $hex = \str_pad(\dechex($value), 16, '0', STR_PAD_LEFT);

        return Hex::decode($hex);
    }
}
