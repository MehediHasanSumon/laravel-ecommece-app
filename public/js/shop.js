/**
 * Shop page functionality
 */

// Update query parameters for sorting and filtering
function updateQueryParam(param, value) {
    const url = new URL(window.location.href);
    url.searchParams.set(param, value);
    
    // Update browser history without reloading the page
    window.history.pushState({}, '', url.toString());
    
    // Fetch products with the updated filters
    fetchFilteredProducts();
}

// Function to handle form submission for filters
function initFilterForm() {
    const filterForm = document.getElementById('filter-form');
    if (!filterForm) return;
    
    filterForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(filterForm);
        const url = new URL(window.location.href);
        
        // Clear existing parameters except view and per_page
        const view = url.searchParams.get('view');
        const perPage = url.searchParams.get('per_page');
        const sort = url.searchParams.get('sort');
        
        url.search = '';
        
        if (view) url.searchParams.set('view', view);
        if (perPage) url.searchParams.set('per_page', perPage);
        if (sort) url.searchParams.set('sort', sort);
        
        // Add form parameters to URL
        for (const [key, value] of formData.entries()) {
            if (value) {
                url.searchParams.set(key, value);
            }
        }
        
        // Update browser history
        window.history.pushState({}, '', url.toString());
        
        // Fetch products with the updated filters
        fetchFilteredProducts();
    });
    
    // Handle reset button
    const resetButton = document.getElementById('reset-filters');
    if (resetButton) {
        resetButton.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Reset form fields
            filterForm.reset();
            
            // Clear URL parameters except view and per_page
            const url = new URL(window.location.href);
            const view = url.searchParams.get('view');
            const perPage = url.searchParams.get('per_page');
            const sort = url.searchParams.get('sort');
            
            url.search = '';
            
            if (view) url.searchParams.set('view', view);
            if (perPage) url.searchParams.set('per_page', perPage);
            if (sort) url.searchParams.set('sort', sort);
            
            // Update browser history
            window.history.pushState({}, '', url.toString());
            
            // Fetch products with reset filters
            fetchFilteredProducts();
        });
    }
}

// Function to fetch filtered products via AJAX
function fetchFilteredProducts() {
    const url = new URL(window.location.href);
    url.searchParams.set('ajax', 'true');
    
    // Show loading state
    const productsContainer = document.getElementById('products-container');
    if (productsContainer) {
        productsContainer.classList.add('opacity-50');
    }
    
    // Fetch products using the shop route
    fetch('/shop?' + url.searchParams.toString(), {
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
        .then(response => response.json())
        .then(data => {
            // Update products container with new HTML
            if (productsContainer) {
                productsContainer.innerHTML = data.html;
                productsContainer.classList.remove('opacity-50');
            }
            
            // Update pagination info
            updatePaginationInfo(data);
            
            // Reinitialize event listeners for the new content
            initProductEventListeners();
        })
        .catch(error => {
            console.error('Error fetching products:', error);
            if (productsContainer) {
                productsContainer.classList.remove('opacity-50');
            }
            showToast('Error loading products. Please try again.', 'error');
        });
}

// Function to update pagination information
function updatePaginationInfo(data) {
    const paginationInfo = document.getElementById('pagination-info');
    if (paginationInfo) {
        paginationInfo.textContent = `Showing ${data.products?.length || 0} of ${data.totalProducts} products`;
    }
    
    // Update load more button visibility
    const loadMoreBtn = document.getElementById('load-more-btn');
    if (loadMoreBtn) {
        if (data.hasMorePages) {
            loadMoreBtn.classList.remove('hidden');
            loadMoreBtn.dataset.page = data.currentPage + 1;
        } else {
            loadMoreBtn.classList.add('hidden');
        }
    }
}

// Initialize product event listeners
function initProductEventListeners() {
    // Quick view buttons
    document.querySelectorAll('[onclick^="openQuickView"]').forEach(button => {
        const productId = button.getAttribute('onclick').match(/\d+/)[0];
        button.onclick = null;
        button.addEventListener('click', function() {
            openQuickView(productId);
        });
    });
    
    // Add to cart buttons
    document.querySelectorAll('[onclick^="addToCart"]').forEach(button => {
        const match = button.getAttribute('onclick').match(/addToCart\((\d+),\s*(\d+)\)/);
        if (match) {
            const productId = match[1];
            const quantity = match[2];
            button.onclick = null;
            button.addEventListener('click', function() {
                addToCart(productId, quantity);
            });
        }
    });
    
    // Add to wishlist buttons
    document.querySelectorAll('[onclick^="addToWishlist"]').forEach(button => {
        const productId = button.getAttribute('onclick').match(/\d+/)[0];
        button.onclick = null;
        button.addEventListener('click', function() {
            addToWishlist(productId);
        });
    });
}

// Quick View Modal Functionality
function openQuickView(productId) {
    // Show loading state
    document.getElementById('quick-view-modal').classList.remove('hidden');
    document.getElementById('quick-view-loading').classList.remove('hidden');
    document.getElementById('quick-view-content').classList.add('hidden');
    
    // Fetch product data
    fetch(`/api/products/${productId}/quick-view`)
        .then(response => response.json())
        .then(data => {
            // Populate modal with product data
            document.getElementById('qv-product-image').src = data.image || 'https://via.placeholder.com/400x400';
            document.getElementById('qv-product-title').textContent = data.name;
            document.getElementById('qv-product-category').textContent = data.category?.name || 'Uncategorized';
            document.getElementById('qv-product-description').textContent = data.short_description;
            
            // Handle price display
            if (data.sale_price && data.sale_price < data.price) {
                document.getElementById('qv-product-price').innerHTML = `
                    <span class="text-indigo-600 font-bold text-xl">$${parseFloat(data.sale_price).toFixed(2)}</span>
                    <span class="text-gray-400 line-through ml-2">$${parseFloat(data.price).toFixed(2)}</span>
                `;
            } else {
                document.getElementById('qv-product-price').innerHTML = `
                    <span class="text-indigo-600 font-bold text-xl">$${parseFloat(data.price).toFixed(2)}</span>
                `;
            }
            
            // Handle rating stars
            const ratingContainer = document.getElementById('qv-product-rating');
            ratingContainer.innerHTML = '';
            
            for (let i = 1; i <= 5; i++) {
                const star = document.createElement('i');
                if (i <= Math.floor(data.rating)) {
                    star.className = 'fas fa-star text-yellow-400';
                } else if (i - 0.5 <= data.rating) {
                    star.className = 'fas fa-star-half-alt text-yellow-400';
                } else {
                    star.className = 'far fa-star text-yellow-400';
                }
                ratingContainer.appendChild(star);
            }
            
            const ratingText = document.createElement('span');
            ratingText.className = 'text-gray-500 ml-1';
            ratingText.textContent = parseFloat(data.rating).toFixed(1);
            ratingContainer.appendChild(ratingText);
            
            // Handle sizes
            const sizesContainer = document.getElementById('qv-product-sizes');
            if (data.sizes && data.sizes.length > 0) {
                sizesContainer.classList.remove('hidden');
                const sizesList = document.getElementById('qv-sizes-list');
                sizesList.innerHTML = '';
                
                data.sizes.forEach(size => {
                    const sizeItem = document.createElement('div');
                    sizeItem.className = 'size-option border border-gray-300 rounded-md px-3 py-1 cursor-pointer hover:border-indigo-500 text-center';
                    sizeItem.textContent = size;
                    sizeItem.addEventListener('click', function() {
                        document.querySelectorAll('.size-option').forEach(el => {
                            el.classList.remove('border-indigo-500', 'bg-indigo-50');
                        });
                        this.classList.add('border-indigo-500', 'bg-indigo-50');
                    });
                    sizesList.appendChild(sizeItem);
                });
            } else {
                sizesContainer.classList.add('hidden');
            }
            
            // Handle colors
            const colorsContainer = document.getElementById('qv-product-colors');
            if (data.colors && data.colors.length > 0) {
                colorsContainer.classList.remove('hidden');
                const colorsList = document.getElementById('qv-colors-list');
                colorsList.innerHTML = '';
                
                data.colors.forEach(color => {
                    const colorItem = document.createElement('div');
                    colorItem.className = 'color-option w-8 h-8 rounded-full border-2 border-transparent cursor-pointer hover:opacity-90';
                    colorItem.style.backgroundColor = color;
                    colorItem.addEventListener('click', function() {
                        document.querySelectorAll('.color-option').forEach(el => {
                            el.classList.remove('border-indigo-500');
                        });
                        this.classList.add('border-indigo-500');
                    });
                    colorsList.appendChild(colorItem);
                });
            } else {
                colorsContainer.classList.add('hidden');
            }
            
            // Set add to cart button with product ID
            document.getElementById('qv-add-to-cart-btn').setAttribute('data-product-id', data.id);
            
            // Show content, hide loading
            document.getElementById('quick-view-loading').classList.add('hidden');
            document.getElementById('quick-view-content').classList.remove('hidden');
        })
        .catch(error => {
            console.error('Error fetching product data:', error);
            closeQuickView();
            // Show error toast
            showToast('Error loading product details. Please try again.');
        });
}

function closeQuickView() {
    document.getElementById('quick-view-modal').classList.add('hidden');
}

// Infinite Scroll Implementation
let currentPage = 1;
let isLoading = false;
let hasMorePages = true;

function initInfiniteScroll() {
    const loadMoreBtn = document.getElementById('load-more-btn');
    const loadMoreSpinner = document.getElementById('load-more-spinner');
    
    if (!loadMoreBtn) return;
    
    // Check if there are more pages
    hasMorePages = loadMoreBtn.parentElement.classList.contains('hidden') ? false : true;
    
    loadMoreBtn.addEventListener('click', loadMoreProducts);
    
    // Optional: Auto-load on scroll near bottom
    window.addEventListener('scroll', function() {
        if (window.innerHeight + window.scrollY >= document.body.offsetHeight - 500) {
            // Only load more if we're not already loading and there are more pages
            if (!isLoading && hasMorePages) {
                loadMoreProducts();
            }
        }
    });
}

function loadMoreProducts() {
    if (isLoading || !hasMorePages) return;
    
    isLoading = true;
    currentPage++;
    
    // Show loading spinner
    const loadMoreBtn = document.getElementById('load-more-btn');
    const loadMoreSpinner = document.getElementById('load-more-spinner');
    loadMoreBtn.classList.add('loading');
    loadMoreBtn.querySelector('span').textContent = 'Loading...';
    loadMoreSpinner.classList.remove('hidden');
    
    // Get current URL and add page parameter
    const url = new URL(window.location.href);
    url.searchParams.set('page', currentPage);
    url.searchParams.set('ajax', 'true'); // Flag for AJAX request
    
    // Fetch next page
    fetch(url.toString())
        .then(response => response.json())
        .then(data => {
            // Extract product elements from the HTML
            const tempDiv = document.createElement('div');
            tempDiv.innerHTML = data.html;
            
            // Find the product grid container in the response
            const productGrid = tempDiv.querySelector('.grid') || tempDiv.querySelector('.space-y-6');
            
            if (productGrid) {
                // Append new products to container
                const productsContainer = document.getElementById('products-container');
                const existingGrid = productsContainer.querySelector('.grid') || productsContainer.querySelector('.space-y-6');
                if (existingGrid) {
                    const productItems = productGrid.children;
                    Array.from(productItems).forEach(item => {
                        existingGrid.appendChild(item);
                    });
                }
            }
            
            // Update pagination info
            const paginationInfo = document.getElementById('pagination-info');
            if (paginationInfo) {
                const totalShowing = document.querySelectorAll('.product-card').length;
                paginationInfo.textContent = `Showing ${totalShowing} of ${data.totalProducts} products`;
            }
            
            // Update hasMorePages flag
            hasMorePages = data.hasMorePages;
            
            // Hide load more button if no more pages
            if (!hasMorePages) {
                document.getElementById('load-more-container').classList.add('hidden');
            }
            
            // Reset loading state
            isLoading = false;
            loadMoreBtn.classList.remove('loading');
            loadMoreBtn.querySelector('span').textContent = 'Load More Products';
            loadMoreSpinner.classList.add('hidden');
            
            // Initialize event listeners for new products
            initProductEventListeners();
        })
        .catch(error => {
            console.error('Error loading more products:', error);
            isLoading = false;
            loadMoreBtn.classList.remove('loading');
            loadMoreBtn.querySelector('span').textContent = 'Load More Products';
            loadMoreSpinner.classList.add('hidden');
            showToast('Error loading more products. Please try again.', 'error');
        });
}

// Toast notification
function showToast(message, type = 'error') {
    const toast = document.createElement('div');
    toast.className = `fixed bottom-4 right-4 px-4 py-2 rounded-lg text-white ${type === 'error' ? 'bg-red-500' : 'bg-green-500'} shadow-lg z-50 transition-opacity duration-300`;
    toast.textContent = message;
    
    document.body.appendChild(toast);
    
    setTimeout(() => {
        toast.classList.add('opacity-0');
        setTimeout(() => {
            document.body.removeChild(toast);
        }, 300);
    }, 3000);
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    // Initialize filter form
    initFilterForm();
    
    // Initialize product event listeners
    initProductEventListeners();
    
    // Initialize infinite scroll
    initInfiniteScroll();
    
    // Close quick view when clicking outside or on close button
    document.addEventListener('click', function(event) {
        const quickViewModal = document.getElementById('quick-view-modal');
        const quickViewContent = document.getElementById('quick-view-content');
        
        if (quickViewModal && !quickViewModal.classList.contains('hidden')) {
            if (
                event.target.id === 'quick-view-modal' || 
                event.target.id === 'qv-close-btn' ||
                event.target.closest('#qv-close-btn')
            ) {
                closeQuickView();
            }
        }
    });
    
    // Add to cart functionality from quick view
    const addToCartBtn = document.getElementById('qv-add-to-cart-btn');
    if (addToCartBtn) {
        addToCartBtn.addEventListener('click', function() {
            const productId = this.getAttribute('data-product-id');
            const quantity = document.getElementById('qv-quantity').value || 1;
            
            // Add to cart logic
            fetch('/api/cart/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    product_id: productId,
                    quantity: quantity
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showToast('Product added to cart!', 'success');
                    closeQuickView();
                    
                    // Update cart count if available
                    if (data.cartCount && document.getElementById('cart-count')) {
                        document.getElementById('cart-count').textContent = data.cartCount;
                    }
                } else {
                    showToast(data.message || 'Failed to add product to cart', 'error');
                }
            })
            .catch(error => {
                console.error('Error adding to cart:', error);
                showToast('Error adding product to cart. Please try again.', 'error');
            });
        });
    }
    
    // Handle sort and per page dropdowns
    const sortSelect = document.getElementById('sort');
    if (sortSelect) {
        sortSelect.addEventListener('change', function() {
            updateQueryParam('sort', this.value);
        });
    }
    
    const perPageSelect = document.getElementById('per-page');
    if (perPageSelect) {
        perPageSelect.addEventListener('change', function() {
            updateQueryParam('per_page', this.value);
        });
    }
    
    // Handle view mode toggles
    const viewModeButtons = document.querySelectorAll('[data-view]');
    viewModeButtons.forEach(button => {
        button.addEventListener('click', function() {
            updateQueryParam('view', this.dataset.view);
        });
    });
});