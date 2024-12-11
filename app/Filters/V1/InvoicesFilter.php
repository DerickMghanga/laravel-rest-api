<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class InvoicesFilter extends ApiFilter {
    // NEVER TRUST USER INPUT😀. 
    // List ONLY the allowed fields and operators, ie greater than, equal tp...
    // we can filter data with
    protected $safeParams = [
        'customerId' => ['eq'],
        'amount' => ['eq', 'lt', 'gt', 'lte', 'gte'],
        'status' => ['eq', 'ne'],
        'billedDate' => ['eq', 'lt', 'gt', 'lte', 'gte'],
        'paidDate' => ['eq', 'lt', 'gt', 'lte', 'gte'],
    ];

    protected $columnMap = [
        "customerId" => "customer_id",
        "billedDate" => "billed_date",
        "paidDate" => "paid_date",
    ];

    protected $operatorMap = [
        'eq' => "=",
        'lt' => "<",
        'lte' => "<=",
        'gt' => ">",
        'gte' => ">=",
        'ne' => '!='
    ];

}

?>