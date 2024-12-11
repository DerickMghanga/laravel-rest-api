<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class CustomersFilter extends ApiFilter {
    // NEVER TRUST USER INPUT😀. 
    // List ONLY the allowed fields and operators, ie greater than, equal tp...
    // we can filter data with
    protected $safeParams = [
        'name' => ['eq'],
        'type' => ['eq'],
        'email' => ['eq'],
        'address' => ['eq'],
        'city' => ['eq'],
        'state' => ['eq'],
        'postalCode' => ['eq', 'gt', 'lt']
    ];

    protected $columnMap = [
        "postalCode" => "postal_code"
    ];

    protected $operatorMap = [
        'eq' => "=",
        'lt' => "<",
        'lte' => "<=",
        'gt' => ">",
        'gte' => ">=",
    ];

}

?>