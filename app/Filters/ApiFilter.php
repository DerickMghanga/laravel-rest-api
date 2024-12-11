<?php

namespace App\Filters;

use Illuminate\Http\Request;

class ApiFilter {
    // NEVER TRUST USER INPUT😀. 
    // List ONLY the allowed fields and operators, ie greater than, equal tp...
    // we can filter data with
    protected $safeParams = [];

    protected $columnMap = [];

    protected $operatorMap = [];

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