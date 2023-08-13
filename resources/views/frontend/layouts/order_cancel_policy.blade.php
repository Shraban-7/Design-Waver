@extends('frontend.layouts.master')
@section('title', 'Order Cancelation Policy')
@section('meta_keywords', 'DesignWavers')
@section('meta_description', 'DesignWavers')


@section('refund_policy')
    <section id="refund-policy">
        <div class="max-w-6xl mx-auto mt-10 px-6">
            <h2 class="underline text-2xl font-semibold mb-4">Design Waver - Order Cancellation Policy:</h2>
            <p class="text-sm text-gray-700">Please read these Order Cancellation Policy carefully before using our website or engaging our design services.</p>
        </div>

        <ol class="divide-y divide-gray-300 max-w-6xl mt-16 mx-auto px-6 border">

            <li class="py-4">

                <div class="flex items-center space-x-4">
                    <span class="text-lg font-bold">Cancellation Timeframe:</span>
                </div>

                <ol class="divide-y divide-gray-300 bg-gray-50 rounded-md px-4 py-2 mt-4 list-decimal">
                    <li class="py-2">
                        <div class="flex items-center space-x-4">
                            <span class="text-md font-medium">Customers can request order cancellation within  3 Days of placing the order. Beyond this timeframe, cancellation requests may not be accepted.</span>
                        </div>
                    </li>
                </ol>

            </li>

        </ol>
        <ol class="divide-y divide-gray-300 max-w-6xl mt-16 mx-auto px-6 border">

            <li class="py-4">

                <div class="flex items-center space-x-4">
                    <span class="text-lg font-bold">Cancellation Procedure:</span>
                </div>

                <ol class="divide-y divide-gray-300 bg-gray-50 rounded-md px-4 py-2 mt-4 list-decimal">
                    <li class="py-2">
                        <div class="flex items-center space-x-4">
                            <span class="text-md font-medium"> To cancel an order, customers must contact Design Waver's customer support team via email at infodesignwaver@gmail.com or call our toll-free number +8801868471647. Cancellation requests made through other channels may not be considered valid.</span>
                        </div>
                    </li>

                </ol>

            </li>

        </ol>
        <ol class="divide-y divide-gray-300 max-w-6xl mt-16 mx-auto px-6 border">

            <li class="py-4">

                <div class="flex items-center space-x-4">
                    <span class="text-lg font-bold">Eligible Orders: </span>
                </div>

                <ol class="divide-y divide-gray-300 bg-gray-50 rounded-md px-4 py-2 mt-4 list-decimal">
                    <li class="py-2">
                        <div class="flex items-center space-x-4">
                            <span class="text-md font-medium">Orders that have not yet entered the production phase or are not already completed can be canceled. Custom orders or orders with extensive personalization may not be eligible for cancellation.</span>
                        </div>
                    </li>

                    

                </ol>

            </li>

        </ol>
        <ol class="divide-y divide-gray-300 max-w-6xl mt-16 mx-auto px-6 border">

            <li class="py-4">

                <div class="flex items-center space-x-4">
                    <span class="text-lg font-bold">Cancellation Confirmation:</span>
                </div>

                <ol class="divide-y divide-gray-300 bg-gray-50 rounded-md px-4 py-2 mt-4 list-decimal">
                    <li class="py-2">
                        <div class="flex items-center space-x-4">
                            <span class="text-md font-medium">Once a cancellation request is received and processed, Design Waver will send a confirmation email to the customer. If the customer does not receive a cancellation confirmation within 48 hours of the request, they should reach out to customer support again.</span>
                        </div>
                    </li>
                </ol>
            </li>

        </ol>
        <ol class="divide-y divide-gray-300 max-w-6xl mt-16 mx-auto px-6 border">

            <li class="py-4">

                <div class="flex items-center space-x-4">
                    <span class="text-lg font-bold">Refund Policy:</span>
                </div>

                <ol class="divide-y divide-gray-300 bg-gray-50 rounded-md px-4 py-2 mt-4 list-decimal">
                    <li class="py-2">
                        <div class="flex items-center space-x-4">
                            <span class="text-md font-medium">If the order is canceled within the eligible timeframe and criteria, Design Waver will process a full refund to the original payment method within 5-7 business days. Please note that refunds may take additional time to appear in the customer's account depending on the payment provider's policies.</span>
                        </div>
                    </li>
                </ol>

            </li>

        </ol>
        <ol class="divide-y divide-gray-300 max-w-6xl mt-16 mx-auto px-6 border mb-6">

            <li class="py-4">

                <div class="flex items-center space-x-4">
                    <span class="text-lg font-bold">Non-Cancellable Services:</span>
                </div>

                <ol class="divide-y divide-gray-300 bg-gray-50 rounded-md px-4 py-2 mt-4 list-decimal">
                    <li class="py-2">
                        <div class="flex items-center space-x-4">
                            <span class="text-md font-medium"> Some services offered by Design Waver, such as immediate digital downloads or services that require immediate initiation, may not be canceled once the work has started. In such cases, the customer will be duly informed before proceeding with the service.</span>
                        </div>
                    </li>
                </ol>
            </li>

        </ol>
        <ol class="divide-y divide-gray-300 max-w-6xl mt-16 mx-auto px-6 border mb-6">

            <li class="py-4">

                <div class="flex items-center space-x-4">
                    <span class="text-lg font-bold">Partial Cancellation:</span>
                </div>

                <ol class="divide-y divide-gray-300 bg-gray-50 rounded-md px-4 py-2 mt-4 list-decimal">
                    <li class="py-2">
                        <div class="flex items-center space-x-4">
                            <span class="text-md font-medium">Design Waver may consider partial cancellations for orders with multiple items or services. The customer should contact customer support to discuss the possibility and implications of partial cancellation..</span>
                        </div>
                    </li>
                </ol>
            </li>

        </ol>
        <ol class="divide-y divide-gray-300 max-w-6xl mt-16 mx-auto px-6 border mb-6">

            <li class="py-4">

                <div class="flex items-center space-x-4">
                    <span class="text-lg font-bold">Changes to the Policy:</span>
                </div>

                <ol class="divide-y divide-gray-300 bg-gray-50 rounded-md px-4 py-2 mt-4 list-decimal">
                    <li class="py-2">
                        <div class="flex items-center space-x-4">
                            <span class="text-md font-medium">Design Waver reserves the right to modify or update this cancellation policy at any time. Customers will be notified of any changes to the policy on the company's website or through email communication.</span>
                        </div>
                    </li>
                </ol>
            </li>

        </ol>
        <ol class="divide-y divide-gray-300 max-w-6xl mt-16 mx-auto px-6 border mb-6">

            <li class="py-4">

                <div class="flex items-center space-x-4">
                    <span class="text-lg font-bold">Communication Channels:</span>
                </div>

                <ol class="divide-y divide-gray-300 bg-gray-50 rounded-md px-4 py-2 mt-4 list-decimal">
                    <li class="py-2">
                        <div class="flex items-center space-x-4">
                            <span class="text-md font-medium">Customers are encouraged to use the official communication channels provided by Design Waver to ensure the accuracy and validity of their cancellation requests.</span>
                        </div>
                       
                    </li>
                </ol>
            </li>

        </ol>
        <ol class="divide-y divide-gray-300 max-w-6xl mt-16 mx-auto px-6 border mb-6">

            <li class="py-4">

                <div class="flex items-center space-x-4">
                    <span class="text-lg font-bold">Exceptional Circumstances</span>
                </div>

                <ol class="divide-y divide-gray-300 bg-gray-50 rounded-md px-4 py-2 mt-4 list-decimal">
                    <li class="py-2">
                        <div class="flex items-center space-x-4">
                            <span class="text-md font-medium">In rare cases of unforeseen circumstances or events beyond Design Waver's control, the company may consider exceptions to the cancellation policy. Such situations will be handled on a case-by-case basis.</span>
                        </div>
                       
                    </li>
                </ol>
            </li>

        </ol>

    </section>
@endsection

