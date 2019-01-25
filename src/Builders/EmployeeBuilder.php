<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 31.3.18.
 * Time: 15.37
 */

namespace KgBot\Builders;


use KgBot\Models\Employee;

class EmployeeBuilder extends Builder
{
    protected $entity = 'employees';
    protected $model  = Employee::class;
}