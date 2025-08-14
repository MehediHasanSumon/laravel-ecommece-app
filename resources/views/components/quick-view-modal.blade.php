<!-- Quick View Modal -->
<div id="quick-view-modal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!-- Background overlay -->
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <!-- Modal panel -->
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full">
            <!-- Loading state -->
            <div id="quick-view-loading" class="p-6 flex items-center justify-center">
                <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-indigo-600"></div>
            </div>

            <!-- Content -->
            <div id="quick-view-content" class="hidden">
                <!-- Close button -->
                <button id="qv-close-btn" type="button" class="absolute top-4 right-4 text-gray-400 hover:text-gray-500 focus:outline-none">
                    <span class="sr-only">Close</span>
                    <i class="fas fa-times text-xl"></i>
                </button>

                <div class="flex flex-col md:flex-row">
                    <!-- Product Image -->
                    <div class="md:w-1/2 p-6">
                        <img id="qv-product-image" src="" alt="Product" class="w-full h-auto object-cover rounded-lg">
                    </div>

                    <!-- Product Details -->
                    <div class="md:w-1/2 p-6">
                        <div class="mb-2">
                            <span id="qv-product-category" class="text-gray-500 text-sm"></span>
                        </div>
                        <h2 id="qv-product-title" class="text-2xl font-bold text-gray-900 mb-4"></h2>
                        
                        <div id="qv-product-rating" class="flex text-yellow-400 text-sm mb-4"></div>
                        
                        <div id="qv-product-price" class="flex items-center mb-4"></div>
                        
                        <div id="qv-product-description" class="text-gray-600 mb-6"></div>
                        
                        <!-- Sizes -->
                        <div id="qv-product-sizes" class="mb-6">
                            <h3 class="text-sm font-medium text-gray-900 mb-2">Size</h3>
                            <div id="qv-sizes-list" class="grid grid-cols-4 gap-2"></div>
                        </div>
                        
                        <!-- Colors -->
                        <div id="qv-product-colors" class="mb-6">
                            <h3 class="text-sm font-medium text-gray-900 mb-2">Color</h3>
                            <div id="qv-colors-list" class="flex flex-wrap gap-2"></div>
                        </div>
                        
                        <!-- Quantity -->
                        <div class="mb-6">
                            <h3 class="text-sm font-medium text-gray-900 mb-2">Quantity</h3>
                            <div class="flex items-center border border-gray-300 rounded-md w-32">
                                <button type="button" class="px-3 py-1 text-gray-600 hover:text-indigo-600" onclick="decrementQuantity()">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <input id="qv-quantity" type="number" min="1" value="1" class="w-full text-center border-0 focus:ring-0">
                                <button type="button" class="px-3 py-1 text-gray-600 hover:text-indigo-600" onclick="incrementQuantity()">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        
                        <!-- Add to Cart Button -->
                        <div class="flex space-x-3">
                            <button id="qv-add-to-cart-btn" type="button" class="flex-1 bg-indigo-600 text-white px-6 py-3 rounded-md font-medium hover:bg-indigo-700 transition">
                                <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
                            </button>
                            <button type="button" class="bg-gray-200 text-gray-800 px-3 py-3 rounded-md hover:bg-gray-300 transition">
                                <i class="far fa-heart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function incrementQuantity() {
        const input = document.getElementById('qv-quantity');
        input.value = parseInt(input.value) + 1;
    }
    
    function decrementQuantity() {
        const input = document.getElementById('qv-quantity');
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
        }
    }
</script>