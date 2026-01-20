<?php

use Livewire\Component;
use App\Models\Invoicestatus;
use App\Models\Trackstatus;
new class extends Component {
    public $invoice = '';
    public $results = [];

    public function search()
    {
        $this->results = Invoicestatus::where('generated_invoice', '=', $this->invoice)->orderBy('date_update')->get();
        // dd($this->results);
    }
    public function resetPage()
    {
        // Resets $invoice to '' and $result to null
        $this->invoice = '';
        $this->results = collect(); // This resets the collection properly

        // Optional: If you use a 'searchPerformed' flag, reset that too
        // $this->reset('searchPerformed');
    }
};
?>

<div>


    <div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">

        <div class="max-w-3xl mx-auto text-center mb-2">
            <h1 class="text-4xl font-extrabold text-gray-900 mb-4">
                Track Your Balikbayan Box
            </h1>
            <p class="text-lg text-gray-600 mb-8">Enter your invoice number to see the status of your shipment to the
                Philippines.</p>

            <div class="flex flex-col sm:flex-row gap-3">
                <form wire:submit.prevent="search">
                    <input autofocus type="text" wire:model="invoice" placeholder="Invoice Number" x-ref="searchInput"
                        class="block w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500 p-4 text-lg border">
                    {{-- <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg transition-all">
                    Track Status
                </button> --}}
                </form>
            </div>
        </div>
        @if (empty($invoice))
            <div class="max-w-2xl mx-auto mt-8 animate-fade-in">
                <div
                    class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden p-8 flex flex-col items-center text-center">
                    <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center shadow-sm mb-4">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800">Track Your Shipment</h2>
                    <p class="text-gray-600 mt-2 max-w-sm">
                        Please enter your invoice number above to track the status of your shipment to the Philippines.
                    </p>
                </div>
            </div>
        @elseif($results->isEmpty())
            {{-- //  <p>No invoices found.</p> --}}
            <div class="max-w-2xl mx-auto mt-8 animate-fade-in">
                <div class="bg-white rounded-2xl shadow-sm border border-red-100 overflow-hidden">

                    <div class="bg-red-50 p-8 flex flex-col items-center text-center">
                        <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center shadow-sm mb-4">
                            <svg class="w-10 h-10 text-red-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">Invoice Not Found</h2>
                        <p class="text-gray-600 mt-2 max-w-sm">
                            We couldn't find any record for <span
                                class="font-mono font-bold text-red-600">{{ $invoice }}</span>. Please check the
                            number and try again.
                        </p>
                    </div>

                    <div class="p-8 bg-white">
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-widest text-center mb-6">Need
                            Assistance?</p>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <a href="mailto:support@yourcompany.com"
                                class="group flex items-center gap-4 p-4 rounded-xl border border-gray-100 hover:border-blue-200 hover:bg-blue-50 transition-all">
                                <div
                                    class="w-12 h-12 bg-gray-50 group-hover:bg-white rounded-lg flex items-center justify-center text-gray-500 group-hover:text-blue-600 transition-colors">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <span class="block text-xs text-gray-400 font-bold uppercase">Email Us</span>
                                    <p class="text-sm font-bold text-gray-800">support@cargo.com</p>
                                </div>
                            </a>
                            <a href="tel:+123456789"
                                class="group flex items-center gap-4 p-4 rounded-xl border border-gray-100 hover:border-green-200 hover:bg-green-50 transition-all">
                                <div
                                    class="w-12 h-12 bg-gray-50 group-hover:bg-white rounded-lg flex items-center justify-center text-gray-500 group-hover:text-green-600 transition-colors">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <span class="block text-xs text-gray-400 font-bold uppercase">Call Center</span>
                                    <p class="text-sm font-bold text-gray-800">+1 (800) 123-4567</p>
                                </div>
                            </a>
                        </div>
                        <div class="text-center w-full mt-8">
                            <button onclick="window.location.reload();" class="cursor-pointer underline">
                                Clear search and try again
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        @else
            <div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">


                <div class="max-w-5xl mx-auto bg-white rounded-2xl shadow-xl overflow-hidden">

                    <div class="bg-blue-600 p-6 text-white flex flex-wrap justify-between items-center">
                        <div>
                            <p class="text-blue-100 text-sm uppercase tracking-wider font-semibold">Tracking Number
                            </p>
                            <h2 class="text-2xl font-mono font-bold">INV-{{ $invoice }}</h2>
                        </div>
                        <div class="mt-4 sm:mt-0 text-right">
                            <p class="text-blue-100 text-sm uppercase tracking-wider font-semibold">Current Status
                            </p>
                            <span class="bg-blue-500 px-3 py-1 rounded-full text-sm font-bold border border-blue-400">IN
                                TRANSIT</span>
                        </div>
                    </div>

                    <div class="p-4 lg:p-4">

                        @foreach ($results as $result)
                            @php  $data = Trackstatus::where('id', '=', $result->trackstatus_id)->first(); @endphp

                            <div class=" p-6flex flex-col md:flex-row justify-between text-sm text-gray-600 gap-4">
                            </div>
                            <div class="flex items-center gap-3">
                                <div
                                    class="flex-shrink-0 w-15 h-25  text-blue-600 rounded-full flex items-center justify-center">
                                    <svg class="w-15 h-15" fill="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>

                                </div>
                                <div
                                    class=" p-6  flex flex-col md:flex-row justify-between text-sm text-gray-600 gap-4">
                                    <div>
                                        <span
                                            class="font-semibold block text-indigo-800 uppercase lg:text-lg text-xs">{{ $data->description }}</span>
                                        <p class="text-gray-800 lg:text-base md:text-sm">{{ $result->date_update }}</p>
                                        @isset($result->waybill)
                                            <p class="text-gray-800 lg:text-base md:text-sm">{{ $result->waybill }}</p>
                                        @endisset
                                        @isset($result->remarks)
                                            <p class="text-gray-800 lg:text-base md:text-sm">{{ $result->remarks }}</p>
                                        @endisset
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>


                </div>
        @endif
    </div>
