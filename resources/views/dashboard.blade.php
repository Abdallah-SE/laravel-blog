<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row text-center text-success">
                       <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-midnight-bloom">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div style="color: purple;" class="widget-heading">Total Users</div>
                                         </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers bg-gray-100"><span style="color: black">{{ $usersCount }}</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-arielle-smile">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div style="color: green;" class="widget-heading">Total Posts</div>
                                         </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers bg-primary text-white"><span style="color: black">{{ $postsCount }}</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-grow-early">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div style="color: black;" class="widget-heading">Total Categories</div>
                                         </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers bg-secondary text-white"><span style="color: black">{{ $categoriesCount }}</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
