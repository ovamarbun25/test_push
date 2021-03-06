<?php

namespace PhpOffice\PhpSpreadsheet\Calculation\MathTrig;

use Exception;
use PhpOffice\PhpSpreadsheet\Calculation\Functions;

class Floor
{
    private static function floorCheck1Arg(): void
    {
        $compatibility = Functions::getCompatibilityMode();
        if ($compatibility === Functions::COMPATIBILITY_EXCEL) {
            throw new Exception('Excel requires 2 arguments for FLOOR');
        }
    }

    /**
     * FLOOR.
     *
     * Rounds number down, toward zero, to the nearest multiple of significance.
     *
     * Excel Function:
     *        FLOOR(number[,significance])
     *
     * @param mixed $number Expect float. Number to round
     * @param mixed $significance Expect float. Significance
     *
     * @return float|string Rounded Number, or a string containing an error
     */
    public static function evaluate($number, $significance = null)
    {
        if ($significance === null) {
            self::floorCheck1Arg();
        }

        try {
            $number = Helpers::validateNumericNullBool($number);
            $significance = Helpers::validateNumericNullSubstitution($significance, ($number < 0) ? -1 : 1);
        } catch (Exception $e) {
            return $e->getMessage();
        }

        return self::argumentsOk((float) $number, (float) $significance);
    }

    /**
     * Avoid Scrutinizer problems concerning complexity.
     *
     * @return float|string
     */
    private static function argumentsOk(float $number, float $significance)
    {
        if ($significance == 0.0) {
            return Functions::DIV0();
        }
        if ($number == 0.0) {
            return 0.0;
        }
        if (Helpers::returnSign($significance) == 1) {
            return floor($number / $significance) * $significance;
        }
        if (Helpers::returnSign($number) == -1 && Helpers::returnSign($significance) == -1) {
            return floor($number / $significance) * $significance;
        }

        return Functions::NAN();
    }
}
