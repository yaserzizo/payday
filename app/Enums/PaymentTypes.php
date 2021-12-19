<?php

namespace App\Enums;

use App\Models\Employee;
use App\PaymentTypes\Concerns\PaymentType;
use App\PaymentTypes\HourlyRate;
use App\PaymentTypes\Salary;

enum PaymentTypes: string
{
    case SALARY = 'salary';
    case HOURLY_RATE = 'hourly-rate';

    public function makePaymentType(Employee $employee): PaymentType
    {
        return match ($this) {
            self::SALARY => new Salary($employee),
            self::HOURLY_RATE => new HourlyRate($employee),
        };
    }

    public function getPaymentTypeClass(): string
    {
        return match ($this) {
            self::SALARY => Salary::class,
            self::HOURLY_RATE => HourlyRate::class,
        };
    }
}
