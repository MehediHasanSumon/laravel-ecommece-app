@extends('layouts.admin')

@section('title', 'Settings')

@section('content')
<!-- Page Header -->
<div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
    <div>
        <h2 class="text-2xl font-bold">Settings</h2>
        <p class="mt-1 text-sm text-gray-500">Manage your store settings</p>
    </div>
    <div class="mt-4 md:mt-0">
        <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-save mr-2"></i> Save Changes
        </button>
    </div>
</div>

<!-- Settings Navigation -->
<div class="bg-white rounded-lg shadow-sm overflow-hidden mb-6">
    <div class="flex flex-wrap border-b">
        <button class="px-4 py-3 font-medium text-sm border-b-2 border-indigo-600 text-indigo-600">
            General
        </button>
        <button class="px-4 py-3 font-medium text-sm text-gray-500 hover:text-gray-700">
            Store
        </button>
        <button class="px-4 py-3 font-medium text-sm text-gray-500 hover:text-gray-700">
            Shipping
        </button>
        <button class="px-4 py-3 font-medium text-sm text-gray-500 hover:text-gray-700">
            Payment
        </button>
        <button class="px-4 py-3 font-medium text-sm text-gray-500 hover:text-gray-700">
            Tax
        </button>
        <button class="px-4 py-3 font-medium text-sm text-gray-500 hover:text-gray-700">
            Notifications
        </button>
        <button class="px-4 py-3 font-medium text-sm text-gray-500 hover:text-gray-700">
            Users & Permissions
        </button>
        <button class="px-4 py-3 font-medium text-sm text-gray-500 hover:text-gray-700">
            Integrations
        </button>
    </div>
</div>

<!-- General Settings Form -->
<div class="bg-white rounded-lg shadow-sm p-6 mb-6">
    <h3 class="text-lg font-medium mb-6">General Settings</h3>
    
    <div class="space-y-6">
        <!-- Store Information -->
        <div>
            <h4 class="text-md font-medium mb-4">Store Information</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Store Name</label>
                    <input type="text" value="Your Store Name" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Store Email</label>
                    <input type="email" value="contact@yourstore.com" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Store Phone</label>
                    <input type="text" value="+1 (555) 123-4567" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Store Currency</label>
                    <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        <option value="USD">USD - US Dollar</option>
                        <option value="EUR">EUR - Euro</option>
                        <option value="GBP">GBP - British Pound</option>
                        <option value="CAD">CAD - Canadian Dollar</option>
                        <option value="AUD">AUD - Australian Dollar</option>
                    </select>
                </div>
            </div>
        </div>
        
        <!-- Address Information -->
        <div class="pt-6 border-t">
            <h4 class="text-md font-medium mb-4">Address Information</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Address Line 1</label>
                    <input type="text" value="123 Store Street" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Address Line 2</label>
                    <input type="text" value="Suite 101" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">City</label>
                    <input type="text" value="New York" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">State/Province</label>
                    <input type="text" value="NY" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Postal/ZIP Code</label>
                    <input type="text" value="10001" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Country</label>
                    <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        <option value="US">United States</option>
                        <option value="CA">Canada</option>
                        <option value="UK">United Kingdom</option>
                        <option value="AU">Australia</option>
                        <option value="DE">Germany</option>
                    </select>
                </div>
            </div>
        </div>
        
        <!-- Localization -->
        <div class="pt-6 border-t">
            <h4 class="text-md font-medium mb-4">Localization</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Default Language</label>
                    <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        <option value="en">English</option>
                        <option value="es">Spanish</option>
                        <option value="fr">French</option>
                        <option value="de">German</option>
                        <option value="it">Italian</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Timezone</label>
                    <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        <option value="UTC-8">Pacific Time (UTC-8)</option>
                        <option value="UTC-7">Mountain Time (UTC-7)</option>
                        <option value="UTC-6">Central Time (UTC-6)</option>
                        <option value="UTC-5">Eastern Time (UTC-5)</option>
                        <option value="UTC+0">UTC</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Date Format</label>
                    <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        <option value="MM/DD/YYYY">MM/DD/YYYY</option>
                        <option value="DD/MM/YYYY">DD/MM/YYYY</option>
                        <option value="YYYY-MM-DD">YYYY-MM-DD</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Time Format</label>
                    <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        <option value="12">12-hour (AM/PM)</option>
                        <option value="24">24-hour</option>
                    </select>
                </div>
            </div>
        </div>
        
        <!-- Store Logo & Favicon -->
        <div class="pt-6 border-t">
            <h4 class="text-md font-medium mb-4">Store Logo & Favicon</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Store Logo</label>
                    <div class="flex items-center space-x-4">
                        <div class="w-16 h-16 bg-gray-100 rounded-md flex items-center justify-center">
                            <i class="fas fa-store text-gray-400 text-2xl"></i>
                        </div>
                        <div>
                            <button class="bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 px-3 py-2 rounded-lg text-sm">
                                Change Logo
                            </button>
                            <p class="text-xs text-gray-500 mt-1">Recommended size: 250x100px</p>
                        </div>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Favicon</label>
                    <div class="flex items-center space-x-4">
                        <div class="w-8 h-8 bg-gray-100 rounded-md flex items-center justify-center">
                            <i class="fas fa-store text-gray-400 text-xs"></i>
                        </div>
                        <div>
                            <button class="bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 px-3 py-2 rounded-lg text-sm">
                                Change Favicon
                            </button>
                            <p class="text-xs text-gray-500 mt-1">Recommended size: 32x32px</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Save Button -->
<div class="flex justify-end mb-6">
    <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg flex items-center">
        <i class="fas fa-save mr-2"></i> Save Changes
    </button>
</div>
@endsection