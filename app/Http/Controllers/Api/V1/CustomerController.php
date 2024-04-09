<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\CustomerResource;
use App\Http\Resources\V1\CustomerCollection;
use App\Http\Requests\V1\StoreCustomerRequest;
use App\Http\Requests\V1\UpdateCustomerRequest;
use App\Filters\V1\CustomersFilter;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return CustomerCollection
     */
    public function index(Request $request): CustomerCollection
    {
        $filter = new CustomersFilter();
        $filterItems = $filter->transform($request);

        $includeBooks = $request->query('includeBooks');

        $customers = Customer::where($filterItems);

        if ($includeBooks) {
            $customers = $customers->with('books');
        }

        return new CustomerCollection($customers->paginate()->appends($request->query()));
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreCustomerRequest $request
     * @return CustomerResource
     */
    public function store(StoreCustomerRequest $request): CustomerResource
    {
        return new CustomerResource(Customer::create($request->all()));
    }

    /**
     * Display the specified resource.
     * @param Customer $customer
     * @return CustomerResource
     */
    public function show(Customer $customer): CustomerResource
    {
        $includeBooks = request()->query('includeBooks');

        if ($includeBooks) {
            return new CustomerResource($customer->loadMissing('books'));
        }

        return new CustomerResource($customer);
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateCustomerRequest $request
     * @param Customer $customer
     */
    public function update(UpdateCustomerRequest $request, Customer $customer): void
    {
        $customer->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
