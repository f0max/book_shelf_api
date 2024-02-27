<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class BooksFilter extends ApiFilter
{
    protected $allowedParams = [
        'customer_id' => ['eq', 'gt', 'gte', 'lt', 'lte'],
        'author' => ['eq'],
        'title' => ['eq'],
        'status' => ['eq', 'neq'],
        'givenDate' => ['eq', 'gt', 'gte', 'lt', 'lte']
    ];

    protected $columnMap = [
        'customerId' => 'customer_id',
        'givenDate' => 'given_date'
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
        'neq' => '!='
    ];
}
