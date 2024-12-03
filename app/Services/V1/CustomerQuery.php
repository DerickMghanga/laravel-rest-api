<?php

namespace App\Services\V1;

use Illuminate\Http\Request;

class CustomerQuery {
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

    public function transform(Request $request) {
        $eloQuery = [];

        foreach ($this->safeParams as $parm => $operators) {
            $query = $request->query($parm);

            if (!isset($query)) {
                continue;
            }

            $column = $this->columnMap[$parm] ?? $parm;

            // filter the operators per query
            foreach($operators as $operator) {
                if(isset($query[$operator])) {
                    // format => [['column', 'operator', 'value']]
                    $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
                }
            }
        }

        return $eloQuery;
    }
}

?>